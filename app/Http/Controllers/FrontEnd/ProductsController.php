<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    // public function index(Request $request)
    // {
    //     $title = 'Products';

    //     $search = trim($request->get('q', ''));

    //     $products = Product::query()
    //         ->where('is_published', true)
    //         ->when($search, function ($query) use ($search) {
    //             $query->where('name', 'LIKE', "%{$search}%");
    //         })
    //         ->latest()
    //         ->paginate(15)
    //         ->withQueryString();

    //     $categories = Category::all();

    //     return view('frontend.products.index', compact(
    //         'title',
    //         'products',
    //         'categories',
    //         'search'
    //     ));
    // }

    public function index(Request $request)
    {
        $title = 'Products';

        $search = trim($request->query('q', ''));

        $products = Product::query()
            ->where('is_published', true)
            ->when($search !== '', function ($query) use ($search) {
                $query->where('name', 'LIKE', '%' . $search . '%');
            })
            ->latest()
            ->paginate(15)
            ->withQueryString();

        $categories = Category::all();

        return view('frontend.products.index', compact(
            'title',
            'products',
            'categories',
            'search'
        ));
    }

    public function suggestions(Request $request)
    {
        $search = trim($request->query('q', ''));

        if (mb_strlen($search) < 2) {
            return response()->json([
                'success' => true,
                'products' => [],
                'total' => 0,
            ]);
        }

        $query = Product::query()
            ->where('is_published', true)
            ->where('name', 'LIKE', "%{$search}%");

        $total = (clone $query)->count();

        $products = $query->latest()
            ->limit(6)
            ->get();

        return response()->json([
            'success' => true,
            'total' => $total,

            'products' => $products->map(function ($product) {
                return [
                    'id' => $product->id,
                    'name' => $product->name,
                    'type' => $product->type,
                    'category' => $product->category?->name ?? 'Uncategorized',
                    'slug' => $product->slug,
                    'price' => $product->price,

                    'image' => $product->thumbnail
                        ? asset('uploads/products/thumbnails/' . $product->thumbnail)
                        : asset('uploads/products/thumbnails/default.png'),

                    'url' => route('products.show', $product->id),
                ];
            }),
        ]);
    }
    public function categoryProducts($categoryId, $slug)
    {
        $title = 'Showing Products for Category ' . Category::findOrFail($categoryId)->name;
        $category = Category::findOrFail($categoryId);
        $products = $category->products()->where('is_published', true)->latest()->paginate(12);
        return view('frontend.products.index', compact(['title', 'products', 'category']));
    }
    public function show($id)
    {
        $product = Product::findOrFail($id);
        $categoryId = $product->category_id;
        $category = Category::findOrFail($categoryId);
        $title = 'Product Details | ' . $product->title;
        $reviews = $product->reviews;
        $related_products = $category->products()->latest()->paginate(6);
        $views = $product->views;
        // return $product->colors->pluck('color');
        $product->update([
            'views' => $views + 1,
            'updated_at' => now()
        ]);
        return view('frontend.products.show', compact(['title', 'product', 'reviews', 'related_products']));
    }
}
