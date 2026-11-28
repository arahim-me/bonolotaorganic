<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Brands Management';
        $brands = Brand::all();

        return view('dashboard.brands.index', compact('brands', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Create Brand';

        return view('dashboard.brands.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'is_published' => 'required|boolean',
        ]);

        $slug = Str::slug($validated['slug'] ?: $validated['name']);

        $originalSlug = $slug;
        $counter = 1;

        while (Brand::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter++;
        }

        $validated['slug'] = $slug;

        Brand::create($validated);

        return redirect()
            ->route('dashboard.brands.index')
            ->with('success', 'Brand created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        $title = 'Brand details of ' . $brand->name;
        return view('dashboard.brands.show', compact('title', 'brand'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        $title = 'Brand edit of ' . $brand->name;
        return view('dashboard.brands.edit', compact('title', 'brand'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, Brand $brand)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:brands,slug,' . $brand->id,
            'description' => 'nullable|string',
            'is_published' => 'required|boolean',
        ]);

        // Slug না থাকলে Brand Name অনুযায়ী তৈরি হবে
        $validated['slug'] = !empty($validated['slug'])
            ? Str::slug($validated['slug'])
            : Str::slug($validated['name']);

        // Slug unique কিনা পুনরায় নিশ্চিত করা
        $originalSlug = $validated['slug'];
        $counter = 1;

        while (
            Brand::where('slug', $validated['slug'])
                ->where('id', '!=', $brand->id)
                ->exists()
        ) {
            $validated['slug'] = $originalSlug . '-' . $counter++;
        }

        $brand->update($validated);

        return redirect()
            ->route('dashboard.brands.index')
            ->with('success', 'Brand updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        //
    }
    public function togglePublished(Brand $brand)
    {
        $brand->is_published = !$brand->is_published;
        $brand->save();

        return back()->with('success', 'Brand published status updated successfully.');
    }
}
