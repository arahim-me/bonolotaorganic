<?php

namespace App\Http\Controllers\Dashboard;

use _PHPStan_781aefaf6\React\Http\Io\Sender;
use App\Models\Message;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $messages = Message::latest()->paginate(25);
        // return view('dashboard.messages.index', compact('title', 'messages'));
        /**
         * Show Message Inbox
         */
        $title = 'Messages';
        $messages = Message::with(['reader', 'sender'])->latest()->paginate(10);
        $totalCount = Message::count();
        return view('dashboard.messages.index', compact(['messages', 'totalCount', 'title']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:20'],
            'title' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'min:10', 'max:5000'],
            'policy_accepted' => ['required', 'accepted']

        ]);
        $user = auth()->check() ? auth()->user()->id : null;
        // Unique limiter key
        $key = 'contact-message:' . (
            $user ?? $request->ip()
        );

        // Allow one message every 5 minutes
        if (RateLimiter::tooManyAttempts($key, 1)) {
            $seconds = RateLimiter::availableIn($key);

            return back()
                ->withInput()
                ->with('error', "Please wait {$seconds} seconds before sending another message.");
        }

        // Store message
        $created = Message::create([
            'sender_id' => $user,
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'title' => $validated['title'],
            'message' => $validated['message'],
        ]);

        RateLimiter::hit($key, 300);
        if ($created) {
            return back()->with('success', 'Your message has been sent successfully!');
        } else {
            return back()->with('error', 'Your message could not sent!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message)
    {
        //
    }

    /**
     * Filter messages based on read/unread status.
     */
    // public function filter(Request $request)
    // {
    //     $title = 'Messages';
    //     if ($request->has('filter')) {
    //         $filter = $request->input('filter');
    //         if ($filter === 'read') {
    //             $messages = Message::where('is_read', true)->latest()->paginate(25);
    //         } elseif ($filter === 'unread') {
    //             $messages = Message::where('is_read', false)->latest()->paginate(25);
    //         } elseif ($filter === 'search') {
    //             $searchTerm = $request->input('search');
    //             $messages = Message::where('subject', 'like', "%{$searchTerm}%")
    //                 ->orWhere('body', 'like', "%{$searchTerm}%")
    //                 ->latest()
    //                 ->paginate(25);
    //         } else {
    //             $messages = Message::latest()->paginate(25);
    //         }
    //     } else {
    //         $messages = Message::latest()->paginate(25);
    //     }

    //     $filter = $request->input('filter');
    //     return view('dashboard.messages.index', compact('title', 'messages', 'filter'));
    // }
    /**
     * AJAX Search & Filter
     */
    public function filter(Request $request)
    {
        $validated = $request->validate([
            'search' => ['nullable', 'string', 'max:255'],
            'status' => ['nullable', 'in:all,read,unread'],
            'page' => ['nullable', 'integer', 'min:1'],
        ]);

        $search = $validated['search'] ?? '';
        $status = $validated['status'] ?? 'all';

        $query = Message::with(['sender', 'reader'])->latest();

        // Search
        if ($search !== '') {
            $query->where(function ($q) use ($search) {

                $q->whereHas('sender', function ($senderQuery) use ($search) {
                    $senderQuery->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%")
                        ->orWhere('phone', 'like', "%{$search}%");
                })

                    ->orWhere('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%")
                    ->orWhere('title', 'like', "%{$search}%")
                    ->orWhere('message', 'like', "%{$search}%");

            });
        }

        // Read / Unread Filter
        if ($status === 'read') {
            $query->where('is_read', true);
        } elseif ($status === 'unread') {
            $query->where('is_read', false);
        }

        // Pagination
        $messages = $query->paginate(15)->withQueryString();

        return response()->json([
            'html' => view('partials.inboxList', compact('messages'))->render(),

            'pagination' => $messages
                ->links('pagination::bootstrap-5')
                ->toHtml(),

            'total_count' => Message::count(),

            'unread_count' => Message::where('is_read', false)->count(),

            'filtered_count' => $messages->total(),
        ]);
    }

    /**
     * Mark Message as Read
     *
     * First reader will be recorded.
     * Existing reader information will never be overwritten.
     */
    public function markRead(Message $message)
    {
        Message::query()
            ->whereKey($message->id)
            ->where('is_read', false)
            ->update([
                'is_read' => true,
                'read_by' => auth()->id(),
                'read_at' => now(),
            ]);

        // Get the latest database information
        $message->refresh()->load('reader');

        return response()->json([
            'success' => true,

            'data' => [
                'id' => $message->id,
                'is_read' => $message->is_read,
                'read_by' => $message->read_by,
                'read_by_name' => $message->reader?->name,
                'read_at' => $message->read_at ?? '',
            ],
        ]);
    }

    public function read(Request $request, Message $message)
    {
        // Only the first admin can mark as read
        Message::whereKey($message->id)
            ->where('is_read', false)
            ->update([
                'is_read' => true,
                'read_by' => auth()->user()->id,
                'read_at' => now(),
                'updated_at' => now(),
            ]);

        $message->refresh()->load('reader');

        return response()->json([
            'success' => true,
            'message' => 'Message marked as read.',
            'data' => [
                'is_read' => (bool) $message->is_read,
                'read_by_name' => $message->reader?->name ?? '',
                'read_at' => $message->read_at
                    ? (string) $message->read_at
                    : '',
            ],
        ]);
    }
}
