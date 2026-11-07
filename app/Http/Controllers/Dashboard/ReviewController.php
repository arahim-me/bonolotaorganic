<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Review;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $title = 'Reviews';
        $reviews = Review::latest()->paginate(25);
        return view('dashboard.reviews.index', compact('reviews', 'title'));
    }

    public function create()
    {
        $users = User::where('status_id', 1)->latest()->get();
        $products = Product::where('status_id', 1)->latest()->get();
        $statuses = Status::all();
        return view('dashboard.reviews.create', compact('users', 'products', 'statuses'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
            'comment' => 'nullable|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'is_approved' => 'nullable|boolean',
            'approved_by' => 'nullable|exists:users,id',
            'approved_at' => 'nullable|timestamp',
            'images' => 'nullable|array',
        ]);

        $created = Review::create($validated);

        if ($request->has('images')) {
            $created->images = $request->input('images');
            $created->save();
        }

        if (!$created) {
            return redirect()->back()->with('error', 'Failed to create review. Please try again.');
        } else {
            return redirect()->back()->with('success', 'Review created successfully!');
        }
    }

    public function show(Review $review)
    {
        $title = 'Review Details';
        return view('dashboard.reviews.show', compact('review', 'title'));
    }

    public function edit(Review $review)
    {
        $title = 'Edit Review';
        $users = User::orderBy('name')->paginate(25);
        $products = Product::latest()->paginate(25);

        return view('dashboard.reviews.edit', compact('review', 'users', 'products'));
    }

    public function update(Request $request, Review $review)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
            'comment' => 'nullable|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'is_approved' => 'nullable|boolean',
            'approved_by' => 'nullable|exists:users,id',
            'approved_at' => 'nullable|timestamp',
            'images' => 'nullable|array',
        ]);

        if ($request->has('images')) {
            $validated['images'] = $request->input('images');
        }

        $review->update($validated);

        return redirect()->route('reviews.index')->with('success', 'Review updated successfully!');
    }

    public function destroy(Review $review)
    {
        $review->delete();

        return redirect()->route('reviews.index')->with('success', 'Review deleted successfully!');
    }

    public function toggleStatus(Review $review)
    {
        $newStatus = !$review->is_approved;
        $review->update(['is_approved' => $newStatus, 'approved_by' => auth()->id(), 'approved_at' => now()]);

        return redirect()->back()->with('success', 'Review successfully published!');
    }
}
