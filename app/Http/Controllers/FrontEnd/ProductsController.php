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
        $products = Product::all();
        $categories = Category::all();
        return view('frontend.products.index', compact(['title', 'products', 'categories']));
    }
    public function categoryProducts($categoryId, $slug)
    {
        $title = 'Showing Products for Category ' . Category::findOrFail($categoryId)->name;
        $category = Category::findOrFail($categoryId);
        $products = Product::where('category_id', $categoryId)->get();
        $categories = Category::where('is_published', true)->get();
        return view('frontend.products.index', compact(['title', 'products', 'categories', 'category', 'slug']));
    }
    public function show($id)
    {
        $title = 'Product Details';
        $product = Product::find($id);
        $related_products = Product::where('category_id', $product->category_id)->take(6)->get();
        $reviews = Review::where('product_id', $id)->where('is_approved', true)->get();
        return view('frontend.products.show', compact(['title', 'product', 'reviews', 'related_products']));
    }
}
