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
        $products = Product::latest()->paginate(25);
        $categories = Category::all();
        return view('frontend.products.index', compact(['title', 'products', 'categories']));
    }
    public function categoryProducts($categoryId, $slug)
    {
        $category = Category::findOrFail($categoryId);
        $categoryId = $category->id;
        $title = 'Showing Products for Category ' . Category::findOrFail($categoryId)->name;
        $products = Product::where('category_id', $categoryId)->get();
        $categories = Category::where('is_published', true)->get();
        $slug = $category->slug;
        return view('frontend.products.index', compact(['title', 'products', 'categories', 'category', 'categoryId', 'slug']));
    }
    public function show($id)
    {
        $product = Product::find($id);
        $title = 'Product Details | ' . $product->title;
        $reviews = $product->reviews;
        $related_products = Product::where('category_id', $product->category_id)->take(6)->get();

        return view('frontend.products.show', compact(['title', 'product', 'reviews', 'related_products']));
    }
}
