<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ProductSection;
use Illuminate\Http\Request;

class ProductSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Product Section Management';
        $productSections = ProductSection::all();

        return view('dashboard.product-section.index', compact('title', 'productSections'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductSection $productSection)
    {
        $title = 'View '.$productSection->name;

        return view('dashboard.product-section.show', compact('productSection'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductSection $productSection)
    {
        $title = 'Edit '.$productSection->name;

        return view('dashboard.product-section.edit', compact('title', 'productSection'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductSection $productSection)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        $productSection->update($validated);

        return redirect()->route('product-sections.index')->with('success', 'Product Section updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductSection $productSection)
    {
        //
    }

    /**
     * Toggle the status of the specified resource.
     */
    public function toggleStatus(ProductSection $section)
    {
        $newStatus = $section->status_id === 1 ? 2 : 1;
        $section->update(['status_id' => $newStatus]);

        return redirect()->back()->with('success', 'Product Section status updated successfully.');
    }
}
