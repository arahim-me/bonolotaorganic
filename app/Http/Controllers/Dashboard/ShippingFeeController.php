<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\ShippingFee;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ShippingFeeController extends Controller
{
    // All Shipping Fees
    public function index(Request $request)
    {
        $title = 'Shipping Fees';
        $query = ShippingFee::query();

        // Search
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('slug', 'like', "%{$search}%");
            });
        }

        // Published Filter
        if ($request->filled('is_published')) {
            $query->where(
                'is_published',
                $request->is_published
            );
        }

        $shippingFees = $query->latest()
            ->paginate(10)
            ->withQueryString();

        return view(
            'dashboard.shipping-fees.index',
            compact('shippingFees', 'title')
        );
    }

    // Create Form
    public function create()
    {
        return view('dashboard.shipping-fees.create');
    }

    // Store
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'fee' => ['required', 'numeric', 'min:0'],
            'is_published' => ['nullable', 'boolean'],
        ]);

        $slug = Str::slug($validated['title']);

        // Unique slug
        $originalSlug = $slug;
        $counter = 1;

        while (ShippingFee::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter++;
        }

        ShippingFee::create([
            'title' => $validated['title'],
            'slug' => $slug,
            'description' => $validated['description'] ?? null,
            'fee' => $validated['fee'],
            'is_published' => $request->boolean('is_published'),
        ]);

        return redirect()
            ->route('shipping-fees.index')
            ->with('success', 'Shipping Fee created successfully.');
    }

    // Show
    public function show(ShippingFee $shippingFee)
    {
        return view(
            'dashboard.shipping-fees.show',
            compact('shippingFee')
        );
    }

    // Edit Form
    public function edit(ShippingFee $shippingFee)
    {
        return view(
            'dashboard.shipping-fees.edit',
            compact('shippingFee')
        );
    }

    // Update
    public function update(Request $request, ShippingFee $shippingFee)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'fee' => ['required', 'numeric', 'min:0'],
            'is_published' => ['nullable', 'boolean'],
        ]);

        $slug = Str::slug($validated['title']);

        // Unique slug except current record
        $originalSlug = $slug;
        $counter = 1;

        while (
            ShippingFee::where('slug', $slug)
                ->where('id', '!=', $shippingFee->id)
                ->exists()
        ) {
            $slug = $originalSlug . '-' . $counter++;
        }

        $shippingFee->update([
            'title' => $validated['title'],
            'slug' => $slug,
            'description' => $validated['description'] ?? null,
            'fee' => $validated['fee'],
            'is_published' => $request->boolean('is_published'),
        ]);

        return redirect()
            ->route('shipping-fees.index')
            ->with('success', 'Shipping Fee updated successfully.');
    }

    // Delete
    public function destroy(ShippingFee $shippingFee)
    {
        $shippingFee->delete();

        return redirect()
            ->route('shipping-fees.index')
            ->with('success', 'Shipping Fee deleted successfully.');
    }
}
