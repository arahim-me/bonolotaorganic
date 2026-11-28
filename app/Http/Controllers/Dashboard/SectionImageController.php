<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ProductSection;
use App\Models\SectionImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class SectionImageController extends Controller
{
    private string $uploadPath = 'uploads/section-images';

    public function index()
    {
        $title = 'Section Images Management';

        $sectionImages = SectionImage::with('section')
            ->latest()
            ->paginate(15);

        return view('dashboard.section-images.index', compact(
            'sectionImages',
            'title'
        ));
    }

    public function create()
    {
        $title = 'Create Section Image';

        $sections = ProductSection::orderBy('name')->get();

        return view('dashboard.section-images.create', compact(
            'sections',
            'title'
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'section_id' => ['required', 'exists:product_sections,id'],
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255'],
            'sub_title' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'button' => ['nullable', 'string', 'max:100'],
            'image' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'return_url' => ['nullable', 'string', 'max:255'],
            'is_published' => ['nullable', 'boolean'],
        ]);

        $validated['slug'] = $this->generateSlug(
            $validated['slug'] ?? null,
            $validated['title']
        );

        $validated['is_published'] = $request->boolean('is_published');

        if ($request->hasFile('image')) {
            $validated['image'] = $this->uploadImage(
                $request->file('image')
            );
        }

        SectionImage::create($validated);

        return redirect()
            ->route('dashboard.section-images.index')
            ->with('success', 'Section image created successfully.');
    }

    public function show(SectionImage $sectionImage)
    {
        $title = 'Section Image Details';

        $sectionImage->load('section');

        return view('dashboard.section-images.show', compact(
            'sectionImage',
            'title'
        ));
    }

    public function edit(SectionImage $sectionImage)
    {
        $title = 'Edit Section Image';

        $sections = ProductSection::orderBy('name')->get();

        return view('dashboard.section-images.edit', compact(
            'sectionImage',
            'sections',
            'title'
        ));
    }

    public function update(Request $request, SectionImage $sectionImage)
    {
        $validated = $request->validate([
            'section_id' => ['required', 'exists:product_sections,id'],
            'title' => ['required', 'string', 'max:255'],
            'slug' => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('section_images', 'slug')->ignore($sectionImage->id),
            ],
            'sub_title' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'button' => ['nullable', 'string', 'max:100'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'return_url' => ['nullable', 'string', 'max:255'],
            'is_published' => ['nullable', 'boolean'],
        ]);

        $validated['slug'] = $this->generateSlug(
            $validated['slug'] ?? null,
            $validated['title'],
            $sectionImage->id
        );

        $validated['is_published'] = $request->boolean('is_published');

        if ($request->hasFile('image')) {

            // Delete old image
            $this->deleteImage($sectionImage->image);

            // Upload new image
            $validated['image'] = $this->uploadImage(
                $request->file('image')
            );
        }

        $sectionImage->update($validated);

        return redirect()
            ->route('dashboard.section-images.index')
            ->with('success', 'Section image updated successfully.');
    }

    public function destroy(SectionImage $sectionImage)
    {
        // Delete image from public folder
        $this->deleteImage($sectionImage->image);

        $sectionImage->delete();

        return redirect()
            ->route('dashboard.section-images.index')
            ->with('success', 'Section image deleted successfully.');
    }

    public function togglePublished(SectionImage $sectionImage)
    {
        $sectionImage->update([
            'is_published' => !$sectionImage->is_published,
        ]);

        return back()->with(
            'success',
            'Section image status updated successfully.'
        );
    }

    /**
     * Upload image to public/uploads/section-images
     */
    private function uploadImage($image): string
    {
        $directory = public_path($this->uploadPath);

        if (!file_exists($directory)) {
            mkdir($directory, 0755, true);
        }

        $imageName = time() . '_' . rand(1, 100) . '.' .
            $image->getClientOriginalExtension();

        $image->move($directory, $imageName);

        return $imageName;
    }

    /**
     * Delete image from public folder
     */
    private function deleteImage(?string $image): void
    {
        if (!$image) {
            return;
        }

        $imagePath = public_path($this->uploadPath . '/' . basename($image));

        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }

    /**
     * Generate unique slug
     */
    private function generateSlug(
        ?string $slug,
        string $title,
        ?int $ignoreId = null
    ): string {
        $baseSlug = Str::slug($slug ?: $title);

        if ($baseSlug === '') {
            $baseSlug = 'section-image';
        }

        $uniqueSlug = $baseSlug;
        $counter = 1;

        while (
            SectionImage::where('slug', $uniqueSlug)
                ->when(
                    $ignoreId,
                    fn($query) => $query->where('id', '!=', $ignoreId)
                )
                ->exists()
        ) {
            $uniqueSlug = $baseSlug . '-' . $counter++;
        }

        return $uniqueSlug;
    }
}
