<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('products')->with('status')->get();

        return view('dashboard.categories.index', compact('categories'));
    }

    public function filter(Request $request)
    {
        $filter = $request->input('filter');
        $categories = Category::where('name', 'like', "%$filter%")
            ->orWhere('description', 'like', "%$filter%")
            ->get();

        return view('dashboard.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('dashboard.categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Category::create($validated);

        return redirect()->route('categories.index')->with('success', 'Category created successfully!');
    }

    public function show(Category $category)
    {
        return view('dashboard.categories.show', compact('category'));
    }

    public function edit(Category $category)
    {
        $title = 'Edit '.$category->name;

        return view('dashboard.categories.edit', compact('category', 'title'));
    }

    public function update(Request $request, Category $category)
    {
        $user = auth()->user()?->id ?? null;

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status_id' => 'nullable|integer|in:1,2',
            'image' => 'nullable|image|max:5120',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension() ?: 'jpg';
            $filename = 'uid'.$user.'-'.time().'-'.random_int(10, 100).'.'.$extension;
            $file->move(public_path('uploads/categories'), $filename);
            $validated['image'] = $filename;
        }

        $category->update($validated);

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
