<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductModel;
use App\Models\ProductVariant;
use App\Models\Size;
use App\Models\Status;
use App\Models\Tag;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Log;

class ProductController extends Controller
{
    public function index()
    {
        $title = 'Products Management';
        $categories = Category::all();
        $products = Product::latest()->paginate(15);
        return view('dashboard.products.index', compact('title', 'products', 'categories'));
    }

    public function filter(Request $request)
    {
        $title = 'Products Filter';
        // Validate Filters
        $request->validate([
            'category_id' => 'nullable|integer',
            'stock_status' => 'nullable|in:in_stock,out_of_stock',
            'is_published' => 'nullable|boolean',
            'search' => 'nullable|string|max:255',
            'min_price' => 'nullable|numeric|min:0',
            'max_price' => 'nullable|numeric|min:0|gte:min_price',
        ]);

        $products = Product::query()

            // Load Relationships
            ->with(['category', 'status'])

            // Published / Unpublished Filter
            ->when($request->filled('is_published'), function ($query) use ($request) {
                $query->where(
                    'is_published',
                    $request->boolean('is_published')
                );
            })

            // Category Filter
            ->when($request->filled('category_id'), function ($query) use ($request) {
                $query->where('category_id', $request->category_id);
            })

            // Status Filter
            ->when($request->filled('is_published'), function ($query) use ($request) {
                $query->where('is_published', $request->is_published);
            })

            // Search Filter
            ->when($request->filled('search'), function ($query) use ($request) {

                $search = $request->search;

                $query->where(function ($q) use ($search) {
                    //Product name
                    $q->where('name', 'like', "%{$search}%")
                        //Product slug
                        ->orWhere('slug', 'like', "%{$search}%")
                        // Category Name
                        ->orWhereHas('category', function ($categoryQuery) use ($search) {
                        $categoryQuery->where('name', 'like', "%{$search}%")
                            ->orWhere('slug', 'like', "%{$search}%");
                    });

                });



            })
            //Fiter by stock
            ->when($request->filled('stock_status'), function ($query) use ($request) {

                if ($request->stock_status === 'out_of_stock') {
                    $query->where('stock', '<', 5);
                }

                if ($request->stock_status === 'in_stock') {
                    $query->where('stock', '>=', 5);
                }

            })

            // Minimum Price Filter
            ->when($request->filled('min_price'), function ($query) use ($request) {
                $query->where('price', '>=', $request->min_price);
            })

            // Maximum Price Filter
            ->when($request->filled('max_price'), function ($query) use ($request) {
                $query->where('price', '<=', $request->max_price);
            })

            // Latest Products First
            ->latest()

            // Pagination
            ->paginate(10)

            ->withQueryString();

        // Filter Options
        $categories = Category::orderBy('name')->get();
        $statuses = Status::all();

        return view('dashboard.products.index', compact(
            'products',
            'categories',
            'statuses',
            'title'
        ));
    }

    public function create()
    {
        $title = 'Create new product';
        $active_status_id = Status::where('name', 'Active')->first()?->id;
        $categories = Category::where('status_id', $active_status_id)->latest()->get();
        $brands = Brand::where('is_published', true)->latest()->get();
        $models = ProductModel::where('status_id', $active_status_id)->latest()->get();
        $tags = Tag::where('is_active', true)->orderBy('name', 'asc')->get();
        return view('dashboard.products.create', compact('title', 'categories', 'brands', 'models', 'tags'));
    }


    public function store(Request $request)
    {
        $user = auth()->user();

        // 1. Validation
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'nullable|exists:categories,id',
            'type' => 'nullable|string|max:255',
            'brand_id' => 'nullable|exists:brands,id',
            'model_id' => 'nullable|exists:product_models,id',

            // Tags
            'tags' => ['nullable', 'array'],
            'tags.*' => ['integer', 'distinct', 'exists:tags,id'],

            // Colors & Sizes
            'colors' => 'nullable|string|max:1000',
            'sizes' => 'nullable|string|max:500',

            'pack_size' => 'nullable|string|max:255',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'old_price' => 'nullable|string|max:255',
            'discount' => 'nullable|string|max:50',
            'highlight' => 'nullable|string|max:255',

            'price' => 'required|numeric|min:0',
            'stock' => 'nullable|integer|min:0',

            'is_published' => 'nullable|boolean',
            'status_id' => 'nullable|exists:statuses,id',

            // Images
            'thumbnail' => 'nullable|image|max:2048',
            'images' => 'nullable|array',
            'images.*' => 'image|max:5120',
        ]);

        // 2. Extract Pivot Data
        $tagIds = $validated['tags'] ?? [];

        $colors = $request->filled('colors')
            ? array_unique(array_filter(array_map(
                fn($value) => trim($value),
                explode(',', $request->input('colors'))
            )))
            : [];

        $sizes = $request->filled('sizes')
            ? array_unique(array_filter(array_map(
                fn($value) => strtoupper(trim($value)),
                explode(',', $request->input('sizes'))
            )))
            : [];

        // Remove non-product fields
        unset(
            $validated['tags'],
            $validated['colors'],
            $validated['sizes']
        );

        // 3. Default Values
        $validated['user_id'] = $user?->id;
        $validated['status_id'] = $validated['status_id'] ?? 1;
        $validated['is_published'] = $request->boolean('is_published');
        $validated['discount'] = $validated['discount'] ?? '%';

        $validated['thumbnail'] = null;
        $validated['images'] = [];

        // 4. Thumbnail Upload
        if ($request->hasFile('thumbnail')) {

            $validated['thumbnail'] = $this->storeProductImage(
                $request->file('thumbnail'),
                'uploads/products/thumbnails',
                $user?->id ?? 0
            );

        }

        // 5. Multiple Images Upload
        if ($request->hasFile('images')) {

            $imagePaths = [];

            foreach ($request->file('images') as $file) {

                $imagePaths[] = $this->storeProductImage(
                    $file,
                    'uploads/products/images',
                    $user?->id ?? 0
                );

            }

            $validated['images'] = $imagePaths;
        }

        // 6. Create Product + Sync Relations
        $created = DB::transaction(function () use ($validated, $tagIds, $colors, $sizes) {

            // Create Product
            $product = Product::create($validated);

            // Sync Tags
            $product->tags()->sync($tagIds);

            // Save Colors
            foreach ($colors as $colorName) {

                Color::firstOrCreate([
                    'product_id' => $product->id,
                    'color' => $colorName,
                ]);

            }

            // Save Sizes
            foreach ($sizes as $sizeName) {

                Size::firstOrCreate([
                    'product_id' => $product->id,
                    'size' => $sizeName,
                ]);

            }

            // IMPORTANT: Return Product
            return $product;

        });

        // 7. Success Redirect
        if ($created) {

            return redirect()
                ->route('products.index')
                ->with('success', 'Product created successfully!');

        }

        return redirect()
            ->back()
            ->withInput()
            ->with('error', 'Product creation failed!');
    }


    public function show(Product $product)
    {
        $title = $product->name;
        $product = Product::where('id', $product->id)->first();
        $productColors = Color::where('product_id', $product->id)->get();
        $productSizes = Size::where('product_id', $product->id)->get();
        return view('dashboard.products.show', compact(['product', 'title', 'productColors', 'productSizes']));
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

        $validated = $request->validate([
            // Your existing product validation...

            'tags' => ['nullable', 'array'],
            'tags.*' => ['integer', 'distinct', 'exists:tags,id'],
        ]);

        $tagIds = $validated['tags'] ?? [];

        unset($validated['tags']);

        // Update product
        $product->update($validated);

        // Sync tags
        $product->tags()->sync($tagIds);

        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }

    public function destroy(Product $product)
    {
        // Delete product colors
        $product->colors()->delete();

        // Delete product sizes
        $product->sizes()->delete();

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
    public function togglePublished(Request $request, Product $product)
    {
        $product->update([
            'is_published' => $request->boolean('is_published'),
        ]);

        return back()->with(
            'success',
            'Product publication status updated successfully.'
        );
    }
}
