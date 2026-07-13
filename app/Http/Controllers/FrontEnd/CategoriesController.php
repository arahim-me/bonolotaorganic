<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoriesController extends Controller
{
    public function index()
    {
        $title = 'Categories';
        $categories = Category::where('status_id', 1)->paginate(12);

        return view('frontend.categories.index', compact(['title', 'categories']));
    }
}
