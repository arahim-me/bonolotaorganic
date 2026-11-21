<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $title = 'Products';
        $products = Product::latest()->paginate(15);
        $categories = Category::all();
        return view('frontend.products.index', compact(['title', 'products', 'categories']));
    }
    public function categoryProducts($categoryId, $slug)
    {
        $category = Category::findOrFail($categoryId);
        $categoryId = $category->id;
        $title = 'Showing Products for Category ' . Category::findOrFail($categoryId)->name;
        $products = $category->products()->paginate(12);
        $categories = Category::where('is_published', true)->get();
        $slug = $category->slug;
        return view('frontend.products.index', compact(['title', 'products', 'categories', 'category']));
    }
    public function show($id)
    {
        $product = Product::find($id);
        $categoryId = $product->category_id;
        $category = Category::findOrFail($categoryId);
        $title = 'Product Details | ' . $product->title;
        $reviews = $product->reviews;
        $related_products = $category->products()->paginate(6);
        return view('frontend.products.show', compact(['title', 'product', 'reviews', 'related_products']));
    }
}
