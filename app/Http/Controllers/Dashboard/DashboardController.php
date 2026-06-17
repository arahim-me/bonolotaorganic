<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {
        $user = auth()->user();
        $users = User::all();
        $categories = Category::all();
        $products = Product::all();
        $orders = Order::all();


        if ($user->role_id == 1 || $user->role_id == 2) {
            return view('dashboard.home.index', compact('users', 'categories', 'products', 'orders'));
        } else {
            return view('dashboard.home.index');
        }

    }
}
