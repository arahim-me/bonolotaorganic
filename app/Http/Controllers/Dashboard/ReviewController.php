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
        $reviews = Review::with(['user', 'product', 'status'])->latest()->get();

        return view('dashboard.reviews.index', compact('reviews'));
    }

    public function create()
    {
        $users = User::orderBy('name')->get();
        $products = Product::orderBy('name')->get();
        $statuses = Status::orderBy('name')->get();

        return view('dashboard.reviews.create', compact('users', 'products', 'statuses'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'rating' => 'required|integer|min:1|max:5',
            'status_id' => 'nullable|integer|min:1',
        ]);

        Review::create($validated);

        return redirect()->route('reviews.index')->with('success', 'Review created successfully!');
    }

    public function show(Review $review)
    {
        $review->load(['user', 'product', 'status']);

        return view('dashboard.reviews.show', compact('review'));
    }

    public function edit(Review $review)
    {
        $review->load(['user', 'product', 'status']);
        $users = User::orderBy('name')->get();
        $products = Product::orderBy('name')->get();
        $statuses = Status::orderBy('name')->get();

        return view('dashboard.reviews.edit', compact('review', 'users', 'products', 'statuses'));
    }

    public function update(Request $request, Review $review)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'rating' => 'required|integer|min:1|max:5',
            'status_id' => 'nullable|integer|min:1',
        ]);

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
        $newStatus = $review->status_id == 1 ? 2 : 1;
        $review->update(['status_id' => $newStatus]);

        return redirect()->back()->with('success', 'Review status updated successfully!');
    }
}
