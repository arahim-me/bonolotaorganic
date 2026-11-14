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
        $title = 'Dashboard';
        $user = auth()->user();
        $hasPermit = in_array($user->role_id, [1, 2, 3, 4]);

        if ($hasPermit) {
            return view('dashboard.home.index', compact('hasPermit', 'title'));
        } else {
            return view('dashboard.home.index');
        }

    }
}
