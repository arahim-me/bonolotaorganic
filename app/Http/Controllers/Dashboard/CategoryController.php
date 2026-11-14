<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Status;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $title = 'Categories Management';
        $statuses = Status::all();
        $categories = Category::latest()->paginate(15);
        return view('dashboard.categories.index', compact(['categories', 'title', 'statuses']));
    }


    public function filter(Request $request)
    {
        $title = 'Category filter';
        // Validate Filter
        $valitadate = $request->validate([
            'is_published' => 'nullable|boolean',
            'status_id' => 'nullable|integer',
            'search' => 'nullable|string|max:255',
            'productCount' => 'nullable|integer|min:0',
        ]);


        $categories = Category::query()

            // Load Relationships
            ->with('status')

            // Count Products
            ->withCount('products')

            // Published / Unpublished Filter
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

            // Product Count Filter (Exact Match)
            ->when($request->filled('productCount'), function ($query) use ($request) {

                $query->having(
                    'products_count',
                    '=',
                    $request->productCount
                );

            })

            // Latest Categories First
            ->latest()

            // Pagination
            ->paginate(10)

            ->withQueryString();

        // Get Status List
        $statuses = Status::all();

        return view('dashboard.categories.index', compact(
            'categories',
            'statuses',
            'title'
        ));
    }




    public function create()
    {
        $statuses = Status::all();
        $title = 'Create Category';
        return view('dashboard.categories.create', compact('title', 'statuses'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:5120',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->hashName();
            $file->move(public_path('uploads/categories'), $filename);
            $validated['image'] = $filename;
        }

        Category::create($validated);

        return redirect()->route('categories.index')->with('success', 'Category created successfully!');
    }

    public function show(Category $category)
    {
        $title = 'Category Details: ' . $category->name;
        return view('dashboard.categories.show', compact(['category', 'title']));
    }

    public function edit(Category $category)
    {
        $title = 'Edit ' . $category->name;
        return view('dashboard.categories.edit', compact('category', 'title'));
    }

    public function update(Request $request, Category $category)
    {
        $user = auth()->user()?->id ?? null;
        $previousImage = $category->image;

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status_id' => 'nullable|integer|in:1,2',
            'image' => 'nullable|image|max:5120',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension() ?: 'jpg';
            $filename = 'uid' . $user . '-' . time() . '-' . random_int(10, 100) . '.' . $extension;
            $file->move(public_path('uploads/categories'), $filename);
            $validated['image'] = $filename;
        }

        if (!$category->update($validated)) {
            return redirect()->back()->with('error', 'Category update failed. Please try again.');
        }

        if (
            $request->hasFile('image')
            && $previousImage
            && $previousImage !== $validated['image']
            && $previousImage !== 'default.png'
            && basename($previousImage) === $previousImage
            && !Category::where('image', $previousImage)
                ->where($category->getKeyName(), '!=', $category->getKey())
                ->exists()
        ) {
            $previousImagePath = public_path('uploads/categories/' . $previousImage);

            if (is_file($previousImagePath) && !unlink($previousImagePath)) {
                throw new \RuntimeException('Unable to delete the previous category image.');
            }
        }

        return redirect()->route('categories.index')->with('success', 'Category updated successfully!');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully!');
    }

    public function toggleStatus($id)
    {
        $category = Category::findOrFail($id);
        $category->is_published = !$category->is_published;
        $category->save();
        return redirect()->back()->with('success', 'Category publishable status updated successfully!');
    }
}
