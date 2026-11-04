<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Brands';
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
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:brands,slug',
            'description' => 'nullable|string',
        ]);

        $slug = $request->input('slug');
        if (empty($slug)) {
            $slug = \Str::slug($request->input('name'));
            $request->merge(['slug' => $slug]);
        }

        $created = Brand::create($request->only('name', 'slug', 'description'));

        if (! $created) {
            return redirect()->back()->with('error', 'Failed to create brand. Please try again.');
        } else {
            return redirect()->route('brands.index')->with('success', 'Brand created successfully.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        //
    }
}
