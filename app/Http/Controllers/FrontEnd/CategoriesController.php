<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $title = 'Categories';
        $categories = Category::all();
        return view('frontend.categories.index', compact(['title', 'categories']));
    }
}
