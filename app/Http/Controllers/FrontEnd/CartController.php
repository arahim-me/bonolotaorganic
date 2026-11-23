<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function products(Request $request)
    {
        $items = $request->input('items', []);

        if (!is_array($items) || empty($items)) {
            return response()->json([
                'success' => false,
                'message' => 'Cart is empty.',
            ], 422);
        }

        $ids = collect($items)
            ->pluck('id')
            ->filter()
            ->unique()
            ->values();

        $products = Product::whereIn('id', $ids)
            ->get([
                'id',
                'name',
                'price',
                'thumbnail',
                'slug'
            ]);

        return response()->json([
            'success' => true,
            'products' => $products,
        ]);
    }

}
