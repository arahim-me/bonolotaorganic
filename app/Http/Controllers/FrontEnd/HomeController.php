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
        $active_id = Status::where('name', 'like', '%active%')->first();
        $sections = ProductSection::where('status_id', $active_id->id)->get();
        $trending_id = Status::where('name', 'Trending')->first();
        $new_id = Status::where('name', 'New')->first();
        $featured_id = Status::where('name', 'Featured')->first();
        $title = 'Home';
        $products = Product::where('status_id', $active_id->id)->latest()->take(10)->get();
        $featured_products = Product::where('status_id', $featured_id->id)->latest()->take(10)->get();
        $trend_products = Product::where('status_id', $trending_id->id)->latest()->take(10)->get();
        $new_products = Product::where('status_id', $new_id->id)->latest()->take(10)->get();
        $categories = Category::where('is_published', true)->latest()->paginate(8);

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
