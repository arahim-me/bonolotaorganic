<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    // All Notifications

    public function index(Request $request)
    {
        $title = 'Notifications.';
        $user = auth()->user();

        // Global counters
        $totalCount = $user->notifications()->count();

        $unreadCount = $user->unreadNotifications()->count();

        $readCount = $totalCount - $unreadCount;

        // Base Query
        $query = $user->notifications();

        // Search Query
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('content', 'like', "%{$search}%")
                    ->orWhere('type', 'like', "%{$search}%");
            });
        }

        // Read / Unread Filter
        if ($request->status === 'unread') {
            $query->whereNull('read_at');
        } elseif ($request->status === 'read') {
            $query->whereNotNull('read_at');
        }

        // Pagination
        $notifications = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        // Selected Notification
        $selectedNotification = null;

        if ($request->filled('notification')) {
            // $selectedNotification = Notification::find($request->filled('notification'));
            $selectedNotification = $user->notifications()
                ->find($request->notification);
            $selectedNotification->update(['read_at' => now()]);

        }

        if (!$selectedNotification) {
            $selectedNotification = $notifications->first();
        }

        return view('dashboard.notifications.index', compact(
            'title',
            'notifications',
            'selectedNotification',
            'totalCount',
            'unreadCount',
            'readCount'
        ));
    }


    // Single Notification Read

    public function markAsRead($id)
    {
        $notification = auth()->user()
            ->notifications()
            ->findOrFail($id);

        // Only update if unread
        if (is_null($notification->read_at)) {
            $notification->update([
                'read_at' => now(),
            ]);
        }

        return redirect()
            ->route('dashboard.notifications.index', [
                'notification' => $notification->id,
            ])
            ->with('success', 'Notification marked as read.');
    }


    // Mark All As Read

    public function markAllAsRead()
    {
        $updated = auth()->user()
            ->unreadNotifications()
            ->update([
                'read_at' => now(),
            ]);

        return redirect()
            ->back()
            ->with('success', $updated . ' notifications marked as read.');
    }


    public function open($id)
    {
        $notification = Notification::findOrFail($id);

        if (!$notification->read_at) {
            $notification->update([
                'read_at' => now(),
            ]);
        }

        if ($notification->return_url) {
            return redirect()->to($notification->return_url);
        }

        return redirect()->route('notifications.index');
    }

    // Unread Notifications count
    public function unreadCount()
    {
        $user = auth()->user();

        return response()->json([
            'count' => $user->unreadNotifications()->count(),
        ]);
    }

    // Delete Notification
    public function destroy($id)
    {
        auth()->user()
            ->notifications()
            ->findOrFail($id)
            ->delete();

        return back()->with('success', 'Notification deleted successfully.');
    }

}
