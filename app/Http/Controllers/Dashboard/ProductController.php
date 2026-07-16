<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductModel;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();

        return view('dashboard.products.index', compact('products'));
    }

    public function create()
    {
        $active_status_id = Status::where('name', 'Active')->first()?->id;
        $categories = Category::where('status_id', $active_status_id)->latest()->get();
        $brands = Brand::where('status_id', $active_status_id)->latest()->get();
        $models = ProductModel::where('status_id', $active_status_id)->latest()->get();
        $statuses = Status::all();

        return view('dashboard.products.create', compact('categories', 'brands', 'models', 'statuses'));
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'nullable|exists:categories,id',
            'type' => 'nullable|string|max:255',
            'brand_id' => 'nullable|exists:brands,id',
            'model_id' => 'nullable|exists:product_models,id',
            'colors' => 'nullable|string',
            'sizes' => 'nullable|string',
            'pack_size' => 'nullable|string|max:255',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'old_price' => 'nullable|string|max:255',
            'discount' => 'nullable|string|max:50',
            'highlight' => 'nullable|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'nullable|integer|min:0',
            'status_id' => 'nullable|exists:statuses,id',
            'thumbnail' => 'nullable|image|max:2048',
            'images.*' => 'nullable|image|max:5120',
        ]);

        $validated['user_id'] = $user?->id;
        $validated['colors'] = $request->filled('colors')
            ? array_values(array_filter(array_map('trim', explode(',', $request->input('colors')))))
            : null;
        $validated['sizes'] = $request->filled('sizes')
            ? array_values(array_filter(array_map('trim', explode(',', $request->input('sizes')))))
            : null;
        $validated['status_id'] = $validated['status_id'] ?? 1;
        $validated['discount'] = $validated['discount'] ?? '%';
        $validated['thumbnail'] = null;
        $validated['images'] = [];

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $this->storeProductImage(
                $request->file('thumbnail'),
                'uploads/products/thumbnails',
                $user?->id ?? 0,
            );
        }

        if ($request->hasFile('images')) {
            $imagePaths = [];

            foreach ($request->file('images') as $file) {
                $imagePaths[] = $this->storeProductImage(
                    $file,
                    'uploads/products/images',
                    $user?->id ?? 0,
                );
            }

            $validated['images'] = $imagePaths;
        }

        $created = Product::create($validated);
        if (!$created) {
            return redirect()->back()->with('error', 'Failed to create product. Please try again.');
        }

        return redirect()->route('products.index')->with('success', 'Product created successfully!');
    }

    public function show(Product $product)
    {
        $title = $product->name;
        $product = Product::where('id', $product->id)->first();
        return view('dashboard.products.show', compact('product', 'title'));
    }

    public function edit(Product $product)
    {
        $active_status_id = Status::where('name', 'Active')->first()?->id;
        $title = 'Edit || ' . $product->name;
        $product = Product::where('id', $product->id)->first();
        $categories = Category::where('status_id', $active_status_id)->latest()->get();

        return view('dashboard.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $product = Product::where('id', $product->id)->first();
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'nullable|exists:categories,id',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'nullable|integer|min:0',
            'thumbnail' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('thumbnail')) {
            if ($product->thumbnail && file_exists(public_path($product->thumbnail))) {
                unlink(public_path($product->thumbnail));
            }

            $validated['thumbnail'] = $this->storeProductImage(
                $request->file('thumbnail'),
                'uploads/products/thumbnails',
                $product->user_id ?? 0,
            );
        }

        $product->update($validated);

        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }

    public function destroy(Product $product)
    {
        if ($product->thumbnail && file_exists(public_path($product->thumbnail))) {
            unlink(public_path($product->thumbnail));
        }

        if (!empty($product->images) && is_array($product->images)) {
            foreach ($product->images as $img) {
                if ($img && file_exists(public_path($img))) {
                    unlink(public_path($img));
                }
            }
        }

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
    }

    /**
     * Upload product images via Dropzone
     */
    public function uploadImages(Request $request, Product $product)
    {
        $request->validate([
            'file' => 'required|image|max:5120',
        ]);

        $path = $this->storeProductImage(
            $request->file('file'),
            'uploads/products/images',
            $product->user_id ?? 0,
        );

        $images = $product->images ?? [];
        $images[] = $path;
        $product->images = $images;
        $product->save();

        return response()->json(['success' => true, 'path' => asset($path)]);
    }

    private function storeProductImage($file, string $directory, int $userId): string
    {
        $manager = new ImageManager(new Driver);
        $image = $manager->read($file);
        $image->scale(600);

        $extension = $file->getClientOriginalExtension() ?: 'jpg';
        $filename = 'uid' . $userId . '-' . time() . '-' . random_int(10, 100) . '.' . $extension;
        $absolutePath = public_path($directory . '/' . $filename);

        File::ensureDirectoryExists(dirname($absolutePath));
        $image->save($absolutePath, quality: 90);

        return $filename;
    }
}
