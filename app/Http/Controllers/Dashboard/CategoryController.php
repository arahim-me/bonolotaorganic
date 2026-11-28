<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Throwable;

class CategoryController extends Controller
{
    private const IMAGE_DIR = 'uploads/categories';

    private const DEFAULT_IMAGE = 'default.png';


    /*
    |--------------------------------------------------------------------------
    | Category Index
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $title = 'Categories Management';

        $statuses = Status::all();

        $categories = Category::with('status')
            ->withCount('products')
            ->latest()
            ->paginate(15);

        return view(
            'dashboard.categories.index',
            compact('categories', 'title', 'statuses')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Category Filter
    |--------------------------------------------------------------------------
    */

    public function filter(Request $request)
    {
        $title = 'Category Filter';

        $request->validate([
            'is_published' => 'nullable|boolean',
            'status_id' => 'nullable|integer|exists:statuses,id',
            'search' => 'nullable|string|max:255',
            'productCount' => 'nullable|integer|min:0',
        ]);

        $categories = Category::query()

            ->with('status')

            ->withCount('products')

            // Published Filter
            ->when($request->filled('is_published'), function ($query) use ($request) {
                $query->where(
                    'is_published',
                    $request->boolean('is_published')
                );
            })

            // Status Filter
            ->when($request->filled('status_id'), function ($query) use ($request) {
                $query->where('status_id', $request->status_id);
            })

            // Search Filter
            ->when($request->filled('search'), function ($query) use ($request) {

                $search = $request->search;

                $query->where(function ($q) use ($search) {

                    $q->where('name', 'like', "%{$search}%")
                        ->orWhere('slug', 'like', "%{$search}%");

                });
            })

            // Product Count Filter
            ->when($request->filled('productCount'), function ($query) use ($request) {

                $query->having(
                    'products_count',
                    '=',
                    $request->productCount
                );

            })

            ->latest()

            ->paginate(10)

            ->withQueryString();

        $statuses = Status::all();

        return view(
            'dashboard.categories.index',
            compact('categories', 'statuses', 'title')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Create Category
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        $statuses = Status::all();

        $title = 'Create Category';

        return view(
            'dashboard.categories.create',
            compact('title', 'statuses')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Store Category
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status_id' => 'nullable|exists:statuses,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'is_published' => 'nullable|boolean',
        ]);

        $uploadedImage = null;

        try {

            if ($request->hasFile('image')) {

                $uploadedImage = $this->storeCategoryImage(
                    $request->file('image')
                );

                $validated['image'] = $uploadedImage;
            }

            $validated['is_published'] = $request->boolean('is_published');

            Category::create($validated);

            return redirect()
                ->route('dashboard.categories.index')
                ->with('success', 'Category created successfully!');

        } catch (Throwable $e) {

            if ($uploadedImage) {
                $this->deleteCategoryImage($uploadedImage);
            }

            report($e);

            return back()
                ->withInput()
                ->with('error', 'Category creation failed!');
        }
    }


    /*
    |--------------------------------------------------------------------------
    | Show Category
    |--------------------------------------------------------------------------
    */

    public function show(Category $category)
    {
        $title = 'Category Details: ' . $category->name;

        $category->load('status');

        $category->loadCount('products');

        return view(
            'dashboard.categories.show',
            compact('category', 'title')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Edit Category
    |--------------------------------------------------------------------------
    */

    public function edit(Category $category)
    {
        $title = 'Edit ' . $category->name;

        $statuses = Status::all();

        return view(
            'dashboard.categories.edit',
            compact('category', 'title', 'statuses')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Update Category
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status_id' => 'nullable|exists:statuses,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'is_published' => 'nullable|boolean',
        ]);

        $previousImage = $category->image;

        $newImage = null;

        try {

            /*
            |--------------------------------------------------------------------------
            | Upload New Image
            |--------------------------------------------------------------------------
            */

            if ($request->hasFile('image')) {

                $newImage = $this->storeCategoryImage(
                    $request->file('image')
                );

                $validated['image'] = $newImage;
            }

            $validated['is_published'] = $request->boolean('is_published');

            /*
            |--------------------------------------------------------------------------
            | Update Database
            |--------------------------------------------------------------------------
            */

            DB::transaction(function () use ($category, $validated) {

                $category->update($validated);

            });

            /*
            |--------------------------------------------------------------------------
            | Delete Previous Image
            |--------------------------------------------------------------------------
            */

            if ($newImage && $previousImage !== $newImage) {

                $this->deleteCategoryImageIfUnused(
                    $previousImage,
                    $category->id
                );
            }

            return redirect()
                ->route('dashboard.categories.index')
                ->with('success', 'Category updated successfully!');

        } catch (Throwable $e) {

            // Delete newly uploaded image if update fails
            if ($newImage) {
                $this->deleteCategoryImage($newImage);
            }

            report($e);

            return back()
                ->withInput()
                ->with('error', 'Category update failed. Please try again.');
        }
    }


    /*
    |--------------------------------------------------------------------------
    | Delete Category
    |--------------------------------------------------------------------------
    */

    public function destroy(Category $category)
    {
        $image = $category->image;

        try {

            DB::transaction(function () use ($category) {

                $category->delete();

            });

            // Delete image only if no other category uses it
            $this->deleteCategoryImageIfUnused(
                $image,
                $category->id
            );

            return redirect()
                ->route('dashboard.categories.index')
                ->with('success', 'Category deleted successfully!');

        } catch (Throwable $e) {

            report($e);

            return back()
                ->with('error', 'Category deletion failed!');
        }
    }


    /*
    |--------------------------------------------------------------------------
    | Toggle Published Status
    |--------------------------------------------------------------------------
    */

    public function toggleStatus($id)
    {
        $category = Category::findOrFail($id);

        $category->update([
            'is_published' => !$category->is_published,
        ]);

        return back()->with(
            'success',
            'Category publication status updated successfully!'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Store Category Image
    |--------------------------------------------------------------------------
    */

    private function storeCategoryImage($file): string
    {
        $extension = strtolower(
            $file->getClientOriginalExtension()
        );

        if (!in_array($extension, ['jpg', 'jpeg', 'png', 'webp'])) {
            $extension = 'jpg';
        }

        $userId = auth()->id() ?? 0;

        $filename = 'uid' . $userId
            . '-' . time()
            . '-' . rand(0, 100)
            . '.' . $extension;

        $directory = public_path(self::IMAGE_DIR);

        File::ensureDirectoryExists($directory);

        $file->move($directory, $filename);

        return $filename;
    }


    /*
    |--------------------------------------------------------------------------
    | Delete Category Image
    |--------------------------------------------------------------------------
    */

    private function deleteCategoryImage(?string $filename): void
    {
        if (!$filename) {
            return;
        }

        $filename = basename($filename);

        // Never delete default image
        if ($filename === self::DEFAULT_IMAGE) {
            return;
        }

        $imagePath = public_path(
            self::IMAGE_DIR . '/' . $filename
        );

        if (File::exists($imagePath) && File::isFile($imagePath)) {
            File::delete($imagePath);
        }
    }


    /*
    |--------------------------------------------------------------------------
    | Delete Image If Not Used By Other Categories
    |--------------------------------------------------------------------------
    */

    private function deleteCategoryImageIfUnused(
        ?string $filename,
        int $categoryId
    ): void {

        if (!$filename) {
            return;
        }

        $filename = basename($filename);

        if ($filename === self::DEFAULT_IMAGE) {
            return;
        }

        $isUsed = Category::where('image', $filename)
            ->where('id', '!=', $categoryId)
            ->exists();

        if (!$isUsed) {
            $this->deleteCategoryImage($filename);
        }
    }
}
