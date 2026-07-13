<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $title = 'Home';
        $trend_products = Product::where('status_id', 1)->orderBy('views', 'desc')->take(10)->get();
        $new_products = Product::where('status_id', 1)->orderBy('created_at', 'desc')->take(10)->get();
        $categories = Category::where('status_id', 1)->paginate(10);

        return view('frontend.home.index', compact(['title', 'trend_products', 'new_products', 'categories']));
    }
}
