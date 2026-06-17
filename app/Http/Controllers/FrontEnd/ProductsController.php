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
    public function show($id)
    {
        $title = 'Product Details';
        $product = Product::find($id);
        return view('frontend.products.show', compact(['title', 'product']));
    }
}
