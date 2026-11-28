<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductModel;
use App\Models\Size;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Throwable;

class ProductController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Image Directories
    |--------------------------------------------------------------------------
    */

    private const THUMBNAIL_DIR = 'uploads/products/thumbnails';

    private const IMAGE_DIR = 'uploads/products/images';


    /*
    |--------------------------------------------------------------------------
    | Product Index
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $title = 'Products Management';

        $categories = Category::orderBy('name')->get();

        $products = Product::with(['category', 'status'])
            ->latest()
            ->paginate(15);

        return view(
            'dashboard.products.index',
            compact('title', 'products', 'categories')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Product Filter
    |--------------------------------------------------------------------------
    */

    public function filter(Request $request)
    {
        $title = 'Products Filter';

        $request->validate([
            'category_id' => 'nullable|integer|exists:categories,id',
            'stock_status' => 'nullable|in:in_stock,out_of_stock',
            'is_published' => 'nullable|boolean',
            'search' => 'nullable|string|max:255',
            'min_price' => 'nullable|numeric|min:0',
            'max_price' => 'nullable|numeric|min:0|gte:min_price',
        ]);

        $products = Product::query()
            ->with(['category', 'status'])

            // Published Filter
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

            // Search Filter
            ->when($request->filled('search'), function ($query) use ($request) {

                $search = $request->search;

                $query->where(function ($q) use ($search) {

                    $q->where('name', 'like', "%{$search}%")
                        ->orWhere('slug', 'like', "%{$search}%")

                        ->orWhereHas('category', function ($categoryQuery) use ($search) {

                            $categoryQuery->where('name', 'like', "%{$search}%")
                                ->orWhere('slug', 'like', "%{$search}%");

                        });

                });

            })

            // Stock Filter
            ->when($request->filled('stock_status'), function ($query) use ($request) {

                if ($request->stock_status === 'out_of_stock') {
                    $query->where('stock', '<', 5);
                }

                if ($request->stock_status === 'in_stock') {
                    $query->where('stock', '>=', 5);
                }

            })

            // Minimum Price
            ->when($request->filled('min_price'), function ($query) use ($request) {
                $query->where('price', '>=', $request->min_price);
            })

            // Maximum Price
            ->when($request->filled('max_price'), function ($query) use ($request) {
                $query->where('price', '<=', $request->max_price);
            })

            ->latest()
            ->paginate(10)
            ->withQueryString();

        $categories = Category::orderBy('name')->get();

        $statuses = Status::all();

        return view(
            'dashboard.products.index',
            compact('products', 'categories', 'statuses', 'title')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Create Product
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        $title = 'Create New Product';

        $active_status_id = Status::where('name', 'Active')->value('id');

        $categories = Category::where('status_id', $active_status_id)
            ->latest()
            ->get();

        $brands = Brand::where('is_published', true)
            ->latest()
            ->get();

        $models = ProductModel::where('status_id', $active_status_id)
            ->latest()
            ->get();

        return view(
            'dashboard.products.create',
            compact('title', 'categories', 'brands', 'models')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Store Product
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $user = auth()->user();

        $validated = $request->validate([

            'name' => 'required|string|max:255',

            'category_id' => 'nullable|exists:categories,id',

            'type' => 'nullable|string|max:255',

            'brand_id' => 'nullable|exists:brands,id',

            'model_id' => 'nullable|exists:product_models,id',

            // Colors & Sizes
            'colors' => 'nullable|string|max:1000',

            'sizes' => 'nullable|string|max:500',

            // Product Information
            'pack_size' => 'nullable|string|max:255',

            'short_description' => 'nullable|string',

            'description' => 'nullable|string',

            'old_price' => 'nullable|string|max:255',

            'discount' => 'nullable|string|max:50',

            'highlight' => 'nullable|string|max:255',

            'price' => 'required|numeric|min:0',

            'stock' => 'nullable|integer|min:0',

            // Status
            'is_published' => 'nullable|boolean',

            'status_id' => 'nullable|exists:statuses,id',

            // Images
            'thumbnail' => 'nullable|image|max:2048',

            'images' => 'nullable|array',

            'images.*' => 'image|max:5120',

        ]);

        // Prepare Colors
        $colors = $request->filled('colors')
            ? array_unique(array_filter(array_map(
                fn($value) => trim($value),
                explode(',', $request->input('colors'))
            )))
            : [];

        // Prepare Sizes
        $sizes = $request->filled('sizes')
            ? array_unique(array_filter(array_map(
                fn($value) => strtoupper(trim($value)),
                explode(',', $request->input('sizes'))
            )))
            : [];

        unset(
            $validated['colors'],
            $validated['sizes']
        );

        // Default Values
        $validated['user_id'] = $user?->id;

        $validated['status_id'] = $validated['status_id'] ?? 1;

        $validated['is_published'] = $request->boolean('is_published');

        $validated['discount'] = $validated['discount'] ?? '%';

        $validated['thumbnail'] = null;

        $validated['images'] = [];

        $uploadedFiles = [];

        try {

            // Upload Thumbnail
            if ($request->hasFile('thumbnail')) {

                $thumbnail = $this->storeProductImage(
                    $request->file('thumbnail'),
                    self::THUMBNAIL_DIR,
                    $user?->id ?? 0
                );

                $uploadedFiles[] = [
                    'filename' => $thumbnail,
                    'directory' => self::THUMBNAIL_DIR,
                ];

                $validated['thumbnail'] = $thumbnail;
            }

            // Upload Multiple Images
            if ($request->hasFile('images')) {

                $imagePaths = [];

                foreach ($request->file('images') as $file) {

                    $filename = $this->storeProductImage(
                        $file,
                        self::IMAGE_DIR,
                        $user?->id ?? 0
                    );

                    $imagePaths[] = $filename;

                    $uploadedFiles[] = [
                        'filename' => $filename,
                        'directory' => self::IMAGE_DIR,
                    ];
                }

                $validated['images'] = $imagePaths;
            }

            DB::transaction(function () use ($validated, $colors, $sizes) {

                $product = Product::create($validated);

                // Save Colors
                foreach ($colors as $colorName) {

                    Color::create([
                        'product_id' => $product->id,
                        'color' => $colorName,
                    ]);
                }

                // Save Sizes
                foreach ($sizes as $sizeName) {

                    Size::create([
                        'product_id' => $product->id,
                        'size' => $sizeName,
                    ]);
                }

            });

            return redirect()
                ->route('dashboard.products.index')
                ->with('success', 'Product created successfully!');

        } catch (Throwable $e) {

            // Cleanup uploaded files if creation fails
            foreach ($uploadedFiles as $file) {

                $this->deleteProductImage(
                    $file['filename'],
                    $file['directory']
                );
            }

            report($e);

            return back()
                ->withInput()
                ->with('error', 'Product creation failed!');
        }
    }


    /*
    |--------------------------------------------------------------------------
    | Show Product
    |--------------------------------------------------------------------------
    */

    public function show(Product $product)
    {
        $title = $product->name;

        $product->load(['category', 'status', 'brand', 'model']);

        $productColors = Color::where('product_id', $product->id)->get();

        $productSizes = Size::where('product_id', $product->id)->get();

        return view(
            'dashboard.products.show',
            compact(
                'product',
                'title',
                'productColors',
                'productSizes'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Edit Product
    |--------------------------------------------------------------------------
    */

    public function edit(Product $product)
    {
        $active_status_id = Status::where('name', 'Active')->value('id');

        $title = 'Edit || ' . $product->name;

        $categories = Category::where('status_id', $active_status_id)
            ->latest()
            ->get();

        $brands = Brand::where('is_published', true)
            ->latest()
            ->get();

        $models = ProductModel::where('status_id', $active_status_id)
            ->latest()
            ->get();

        $productColors = Color::where('product_id', $product->id)->get();

        $productSizes = Size::where('product_id', $product->id)->get();

        return view(
            'dashboard.products.edit',
            compact(
                'product',
                'title',
                'categories',
                'brands',
                'models',
                'productColors',
                'productSizes'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Update Product
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([

            'name' => 'required|string|max:255',

            'category_id' => 'nullable|exists:categories,id',

            'type' => 'nullable|string|max:255',

            'brand_id' => 'nullable|exists:brands,id',

            'model_id' => 'nullable|exists:product_models,id',

            // Colors & Sizes
            'colors' => 'nullable|string|max:1000',

            'sizes' => 'nullable|string|max:500',

            // Product Information
            'pack_size' => 'nullable|string|max:255',

            'short_description' => 'nullable|string',

            'description' => 'nullable|string',

            'old_price' => 'nullable|string|max:255',

            'discount' => 'nullable|string|max:50',

            'highlight' => 'nullable|string|max:255',

            'price' => 'required|numeric|min:0',

            'stock' => 'nullable|integer|min:0',

            // Status
            'is_published' => 'nullable|boolean',

            'status_id' => 'nullable|exists:statuses,id',

            // Images
            'thumbnail' => 'nullable|image|max:2048',

            'images' => 'nullable|array',

            'images.*' => 'image|max:5120',

        ]);

        // Prepare Colors
        $colors = $request->filled('colors')
            ? array_unique(array_filter(array_map(
                fn($value) => trim($value),
                explode(',', $request->input('colors'))
            )))
            : [];

        // Prepare Sizes
        $sizes = $request->filled('sizes')
            ? array_unique(array_filter(array_map(
                fn($value) => strtoupper(trim($value)),
                explode(',', $request->input('sizes'))
            )))
            : [];

        unset(
            $validated['colors'],
            $validated['sizes']
        );

        $validated['is_published'] = $request->boolean('is_published');

        // Keep old image names
        $oldThumbnail = $product->thumbnail;

        $oldImages = $product->images ?? [];

        $uploadedFiles = [];

        try {

            /*
            |--------------------------------------------------------------------------
            | Upload New Thumbnail
            |--------------------------------------------------------------------------
            */

            if ($request->hasFile('thumbnail')) {

                $newThumbnail = $this->storeProductImage(
                    $request->file('thumbnail'),
                    self::THUMBNAIL_DIR,
                    $product->user_id ?? auth()->user()->id
                );

                $uploadedFiles[] = [
                    'filename' => $newThumbnail,
                    'directory' => self::THUMBNAIL_DIR,
                ];

                $validated['thumbnail'] = $newThumbnail;
            }

            /*
            |--------------------------------------------------------------------------
            | Upload New Multiple Images
            |--------------------------------------------------------------------------
            */

            if ($request->hasFile('images')) {

                $newImages = [];

                foreach ($request->file('images') as $file) {

                    $filename = $this->storeProductImage(
                        $file,
                        self::IMAGE_DIR,
                        $product->user_id ?? auth()->user()->id
                    );

                    $newImages[] = $filename;

                    $uploadedFiles[] = [
                        'filename' => $filename,
                        'directory' => self::IMAGE_DIR,
                    ];
                }

                $validated['images'] = $newImages;
            }

            /*
            |--------------------------------------------------------------------------
            | Update Database
            |--------------------------------------------------------------------------
            */

            DB::transaction(function () use ($product, $validated, $colors, $sizes) {

                $product->update($validated);

                // Replace Colors
                $product->colors()->delete();

                foreach ($colors as $colorName) {

                    Color::create([
                        'product_id' => $product->id,
                        'color' => $colorName,
                    ]);
                }

                // Replace Sizes
                $product->sizes()->delete();

                foreach ($sizes as $sizeName) {

                    Size::create([
                        'product_id' => $product->id,
                        'size' => $sizeName,
                    ]);
                }

            });

            /*
            |--------------------------------------------------------------------------
            | Delete Old Thumbnail
            |--------------------------------------------------------------------------
            */

            if ($request->hasFile('thumbnail')) {

                $this->deleteProductImage(
                    $oldThumbnail,
                    self::THUMBNAIL_DIR
                );
            }

            /*
            |--------------------------------------------------------------------------
            | Delete Old Multiple Images
            |--------------------------------------------------------------------------
            */

            if ($request->hasFile('images')) {

                foreach ($oldImages as $image) {

                    $this->deleteProductImage(
                        $image,
                        self::IMAGE_DIR
                    );
                }
            }

            return redirect()
                ->route('dashboard.products.index')
                ->with('success', 'Product updated successfully!');

        } catch (Throwable $e) {

            // Delete newly uploaded files if update fails
            foreach ($uploadedFiles as $file) {

                $this->deleteProductImage(
                    $file['filename'],
                    $file['directory']
                );
            }

            report($e);

            return back()
                ->withInput()
                ->with('error', 'Product update failed!');
        }
    }


    /*
    |--------------------------------------------------------------------------
    | Delete Product
    |--------------------------------------------------------------------------
    */

    public function destroy(Product $product)
    {
        try {

            // Store image filenames before deleting product
            $thumbnail = $product->thumbnail;

            $images = $product->images ?? [];

            DB::transaction(function () use ($product) {

                // Delete Colors
                $product->colors()->delete();

                // Delete Sizes
                $product->sizes()->delete();

                // Delete Reviews
                $product->reviews()->delete();

                // Delete Product
                $product->delete();

            });

            // Delete Thumbnail
            $this->deleteProductImage(
                $thumbnail,
                self::THUMBNAIL_DIR
            );

            // Delete Multiple Images
            foreach ($images as $image) {

                $this->deleteProductImage(
                    $image,
                    self::IMAGE_DIR
                );
            }

            return redirect()
                ->route('dashboard.products.index')
                ->with('success', 'Product deleted successfully!');

        } catch (Throwable $e) {

            report($e);

            return back()
                ->with('error', 'Product deletion failed!');
        }
    }


    /*
    |--------------------------------------------------------------------------
    | Dropzone Image Upload
    |--------------------------------------------------------------------------
    */

    public function uploadImages(Request $request, Product $product)
    {
        $request->validate([
            'file' => 'required|image|max:5120',
        ]);

        $filename = null;

        try {

            $filename = $this->storeProductImage(
                $request->file('file'),
                self::IMAGE_DIR,
                $product->user_id ?? auth()->user()->id
            );

            $images = $product->images ?? [];

            $images[] = $filename;

            $product->images = $images;

            $product->save();

            return response()->json([
                'success' => true,
                'filename' => $filename,
                'path' => $filename,
                'url' => asset(self::IMAGE_DIR . '/' . $filename),
                'message' => 'Image uploaded successfully!',
            ]);

        } catch (Throwable $e) {

            if ($filename) {
                $this->deleteProductImage(
                    $filename,
                    self::IMAGE_DIR
                );
            }

            report($e);

            return response()->json([
                'success' => false,
                'message' => 'Image upload failed!',
            ], 500);
        }
    }


    /*
    |--------------------------------------------------------------------------
    | Dropzone Image Delete
    |--------------------------------------------------------------------------
    */

    public function deleteImage(Request $request, Product $product)
    {
        $validated = $request->validate([
            'image' => 'required|string|max:255',
        ]);

        $filename = basename($validated['image']);

        $images = $product->images ?? [];

        if (!in_array($filename, $images, true)) {

            return response()->json([
                'success' => false,
                'message' => 'Image not found!',
            ], 404);
        }

        try {

            // Remove image from database
            $product->images = array_values(
                array_filter(
                    $images,
                    fn($image) => $image !== $filename
                )
            );

            $product->save();

            // Delete physical file
            $this->deleteProductImage(
                $filename,
                self::IMAGE_DIR
            );

            return response()->json([
                'success' => true,
                'message' => 'Image deleted successfully!',
            ]);

        } catch (Throwable $e) {

            report($e);

            return response()->json([
                'success' => false,
                'message' => 'Image deletion failed!',
            ], 500);
        }
    }


    /*
    |--------------------------------------------------------------------------
    | Store Product Image
    |--------------------------------------------------------------------------
    */

    private function storeProductImage(
        $file,
        string $directory,
        int $userId
    ): string {

        $manager = new ImageManager(new Driver);

        $image = $manager->read($file);

        $image->scale(600);

        $extension = strtolower($file->getClientOriginalExtension());

        if (!in_array($extension, ['jpg', 'jpeg', 'png', 'webp'])) {
            $extension = 'jpg';
        }

        $filename = 'uid' . $userId
            . '-' . time()
            . '-' . rand(0, 100)
            . '.' . $extension;

        $absolutePath = public_path($directory . '/' . $filename);

        File::ensureDirectoryExists(dirname($absolutePath));

        $image->save($absolutePath, quality: 90);

        // Database stores filename only
        return $filename;
    }


    /*
    |--------------------------------------------------------------------------
    | Delete Product Image
    |--------------------------------------------------------------------------
    */

    private function deleteProductImage(
        ?string $filename,
        string $directory
    ): void {

        if (!$filename) {
            return;
        }

        // Only allow filename, never arbitrary paths
        $filename = basename($filename);

        $absolutePath = public_path($directory . '/' . $filename);

        if (File::exists($absolutePath) && File::isFile($absolutePath)) {

            File::delete($absolutePath);
        }
    }


    /*
    |--------------------------------------------------------------------------
    | Toggle Published
    |--------------------------------------------------------------------------
    */

    public function togglePublished(Request $request, Product $product)
    {
        $product->update([
            'is_published' => !$product->is_published,
        ]);

        return back()->with(
            'success',
            'Product publication status updated successfully.'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Toggle Featured
    |--------------------------------------------------------------------------
    */

    public function toggleFeatured(Request $request, Product $product)
    {
        $updated = $product->update([
            'is_featured' => !$product->is_featured,
        ]);

        if ($updated) {

            return back()->with(
                'success',
                'Product Featured status updated successfully.'
            );
        }

        return back()->with(
            'error',
            'Product Featured status could not be updated.'
        );
    }
}
