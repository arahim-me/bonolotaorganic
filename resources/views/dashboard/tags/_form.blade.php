
<div class="row">

    <div class="col-md-6 mb-3">
        <label class="form-label">
            Tag Name <span class="text-danger">*</span>
        </label>

        <input type="text"
               name="name"
               class="form-control @error('name') is-invalid @enderror"
               value="{{ old('name', $tag->name ?? '') }}"
               placeholder="Enter tag name"
               required>

        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Slug</label>

        <input type="text"
               name="slug"
               class="form-control @error('slug') is-invalid @enderror"
               value="{{ old('slug', $tag->slug ?? '') }}"
               placeholder="Enter slug (optional)">

        @error('slug')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-12 mb-3">
        <label class="form-label">Description</label>

        <textarea name="description"
                  class="form-control"
                  rows="3"
                  placeholder="Enter description">{{ old('description', $tag->description ?? '') }}</textarea>
    </div>

    <div class="col-md-12 mb-3">
        <div class="form-check form-switch">

            <input type="hidden" name="is_active" value="0">

            <input type="checkbox"
                   name="is_active"
                   value="1"
                   class="form-check-input"
                   id="is_active"
                   @checked(old('is_active', $tag->is_active ?? true))>

            <label class="form-check-label" for="is_active">
                Active
            </label>
        </div>
    </div>

</div>
