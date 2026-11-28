<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Section <span class="text-danger">*</span></label>
                    <select name="section_id" class="form-select" required>
                        <option value="">Select Section</option>
                        @foreach ($sections as $section)
                            <option value="{{ $section->id }}" @selected(old('section_id', $sectionImage->section_id ?? '') == $section->id)>
                                {{ $section->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('section_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control"
                        value="{{ old('title', $sectionImage->title ?? '') }}" placeholder="Enter title">
                    @error('title')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Slug</label>
                    <input type="text" name="slug" class="form-control"
                        value="{{ old('slug', $sectionImage->slug ?? '') }}" placeholder="Enter slug">
                    @error('slug')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Sub Title</label>
                    <input type="text" name="sub_title" class="form-control"
                        value="{{ old('sub_title', $sectionImage->sub_title ?? '') }}" placeholder="Enter sub title">
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" rows="4" class="form-control" placeholder="Enter description">{{ old('description', $sectionImage->description ?? '') }}</textarea>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Button Text</label>
                        <input type="text" name="button" class="form-control"
                            value="{{ old('button', $sectionImage->button ?? '') }}" placeholder="Shop Now">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Button URL</label>
                        <input type="text" name="return_url" class="form-control"
                            value="{{ old('return_url', $sectionImage->return_url ?? '') }}" placeholder="Enter URL">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Image</label>
                    <input type="file" name="image" class="form-control" accept="image/jpeg,image/png,image/webp">
                    @error('image')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                @if (isset($sectionImage) && $sectionImage->image)
                    <div class="mb-3">
                        <img src="{{ asset('uploads/section-images/' . $sectionImage->image) }}"
                            class="img-fluid rounded border" alt="Section Image">
                    </div>
                @endif

                <div class="form-check form-switch mb-3">
                    <input type="hidden" name="is_published" value="0">
                    <input type="checkbox" name="is_published" value="1" class="form-check-input" id="is_published"
                        @checked(old('is_published', $sectionImage->is_published ?? false))>
                    <label class="form-check-label" for="is_published">
                        Published
                    </label>
                </div>

                <button type="submit" class="btn btn-primary w-100">
                    <i class="bi bi-save"></i> {{ $buttonText }}
                </button>

                <a href="{{ route('dashboard.section-images.index') }}" class="btn btn-light w-100 mt-2">
                    Cancel
                </a>
            </div>
        </div>
    </div>
</div>
