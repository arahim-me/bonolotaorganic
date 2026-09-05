<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $title = 'Products';
        $products = Product::all();
        $categories = Category::all();
        return view('frontend.products.index', compact(['title', 'products', 'categories']));
    }
    public function categoryProducts($categoryId)
    {
        $title = 'Products';
        $category = Category::findOrFail($categoryId);
        $products = Product::where('category_id', $categoryId)->get();
        $categories = Category::where('is_published', true)->get();
        return view('frontend.products.index', compact(['title', 'products', 'categories', 'category']));
    }
    public function show($id)
    {
        $product = Product::find($id);
        $reviews = $product->reviews()->where('is_approved', true)->get();
        $title = 'Product Details';
        return view('frontend.products.show', compact(['title', 'product', 'reviews']));
    }
}
