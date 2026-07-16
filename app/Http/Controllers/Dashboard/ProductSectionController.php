<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\ProductSection;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Product Section Management';
        $productSections = Product::all();
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductSection $productSection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductSection $productSection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductSection $productSection)
    {
        //
    }
}
