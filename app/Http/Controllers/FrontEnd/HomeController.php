<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductSection;
use App\Models\Policy;
use App\Models\Status;

class HomeController extends Controller
{
    public function index()
    {
        $title = 'Home';
        $active_id = Status::where('name', 'like', '%active%')->first();
        $sections = ProductSection::where('is_published', true)->get();
        $featured_products = Product::latest()->orderBy('views', 'desc')->take(10)->get();
        $trend_products = Product::orderBy('views', 'desc')->take(10)->get();
        $new_products = Product::latest()->take(10)->get();
        $categories = Category::where('is_published', true)->latest()->take(5)->get();
        $products = Product::where('is_published', true)->latest()->take(10)->get();

        return view('frontend.home.index', compact(['title', 'sections', 'featured_products', 'trend_products', 'new_products', 'categories']));
    }

    public function showPolicy($policyType)
    {
        $policyType = \App\Models\Policy_type::where('slug', $policyType)->firstOrFail();
        $title = $policyType->name;
        $policies = Policy::where('policy_type_id', $policyType->id)->get();
        $policyTypes = \App\Models\Policy_type::where('is_published', true)->get();
        return view('frontend.policies.index', compact('title', 'policyType', 'policies', 'policyTypes'));
    }
}
