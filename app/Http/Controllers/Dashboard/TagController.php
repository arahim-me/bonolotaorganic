<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class TagController extends Controller
{
    public function index(Request $request)
    {
        $tags = Tag::withCount('products')
            ->when($request->filled('search'), function ($query) use ($request) {
                $search = $request->search;

                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                        ->orWhere('slug', 'like', "%{$search}%");
                });
            })
            ->when($request->filled('status'), function ($query) use ($request) {
                $query->where('is_active', $request->status);
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('dashboard.tags.index', compact('tags'));
    }

    public function create()
    {
        return view('dashboard.tags.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:tags,name'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:tags,slug'],
            'description' => ['nullable', 'string'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $slug = Str::slug($validated['slug'] ?: $validated['name']);

        if (empty($slug)) {
            $slug = 'tag-' . Str::lower(Str::random(8));
        }

        $validated['slug'] = $slug;
        $validated['is_active'] = $request->boolean('is_active');

        Tag::create($validated);

        return redirect()
            ->route('dashboard.tags.index')
            ->with('success', 'Tag created successfully.');
    }

    public function show(Tag $tag)
    {
        $tag->load('products');

        return view('dashboard.tags.show', compact('tag'));
    }

    public function edit(Tag $tag)
    {
        return view('dashboard.tags.edit', compact('tag'));
    }

    public function update(Request $request, Tag $tag)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('tags', 'name')->ignore($tag->id),
            ],
            'slug' => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('tags', 'slug')->ignore($tag->id),
            ],
            'description' => ['nullable', 'string'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $slug = Str::slug($validated['slug'] ?: $validated['name']);

        if (empty($slug)) {
            $slug = 'tag-' . Str::lower(Str::random(8));
        }

        $validated['slug'] = $slug;
        $validated['is_active'] = $request->boolean('is_active');

        $tag->update($validated);

        return redirect()
            ->route('dashboard.tags.index')
            ->with('success', 'Tag updated successfully.');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect()
            ->route('dashboard.tags.index')
            ->with('success', 'Tag deleted successfully.');
    }
}
