@extends('layouts.dashboard')

@section('title', 'Create Product')

@section('content')
    <div class="py-3 py-lg-4">
        <div class="row align-items-center">
            <div class="col">
                <h4 class="page-title mb-0">Create Product</h4>
            </div>
            <div class="col">
                <div class="float-end">
                    <a href="{{ route('products.index') }}" class="btn btn-secondary">
                        <i class="bx bx-arrow-back"></i> Back
                    </a>
                </div>
            </div>
        </div>
    </div>

    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong>
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row">
        <div class="col-xl-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Product Information</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Product Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="category_id" class="form-label">Category</label>
                                <select class="form-select @error('category_id') is-invalid @enderror" id="category_id" name="category_id">
                                    <option value="">Select category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="type" class="form-label">Product Type</label>
                                <input type="text" class="form-control @error('type') is-invalid @enderror" id="type" name="type" value="{{ old('type') }}">
                                @error('type')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="brand_id" class="form-label">Brand</label>
                                <select class="form-select @error('brand_id') is-invalid @enderror" id="brand_id" name="brand_id">
                                    <option value="">Select brand</option>
                                    @foreach($brands as $brand)
                                        <option value="{{ $brand->id }}" {{ old('brand_id') == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                                @error('brand_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="model_id" class="form-label">Model</label>
                                <select class="form-select @error('model_id') is-invalid @enderror" id="model_id" name="model_id">
                                    <option value="">Select model</option>
                                    @foreach($models as $model)
                                        <option value="{{ $model->id }}" {{ old('model_id') == $model->id ? 'selected' : '' }}>{{ $model->name }}</option>
                                    @endforeach
                                </select>
                                @error('model_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="pack_size" class="form-label">Pack Size</label>
                                <input type="text" class="form-control @error('pack_size') is-invalid @enderror" id="pack_size" name="pack_size" value="{{ old('pack_size') }}">
                                @error('pack_size')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="old_price" class="form-label">Old Price</label>
                                <input type="text" class="form-control @error('old_price') is-invalid @enderror" id="old_price" name="old_price" value="{{ old('old_price') }}">
                                @error('old_price')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="discount" class="form-label">Discount</label>
                                <input type="text" class="form-control @error('discount') is-invalid @enderror" id="discount" name="discount" value="{{ old('discount', '%') }}">
                                @error('discount')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}" required>
                                @error('price')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="stock" class="form-label">Stock</label>
                                <input type="number" class="form-control @error('stock') is-invalid @enderror" id="stock" name="stock" value="{{ old('stock', 0) }}">
                                @error('stock')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="status_id" class="form-label">Status</label>
                                <select class="form-select @error('status_id') is-invalid @enderror" id="status_id" name="status_id">
                                    <option value="">Select status</option>
                                    @foreach($statuses as $status)
                                        <option value="{{ $status->id }}" {{ old('status_id', 1) == $status->id ? 'selected' : '' }}>{{ $status->name }}</option>
                                    @endforeach
                                </select>
                                @error('status_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="colors" class="form-label">Colors</label>
                                <input type="text" class="form-control @error('colors') is-invalid @enderror" id="colors" name="colors" value="{{ old('colors') }}" placeholder="red, blue, green">
                                <small class="form-text text-muted">Separate values with commas.</small>
                                @error('colors')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="sizes" class="form-label">Sizes</label>
                                <input type="text" class="form-control @error('sizes') is-invalid @enderror" id="sizes" name="sizes" value="{{ old('sizes') }}" placeholder="S, M, L">
                                <small class="form-text text-muted">Separate values with commas.</small>
                                @error('sizes')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="highlight" class="form-label">Highlight</label>
                            <input type="text" class="form-control @error('highlight') is-invalid @enderror" id="highlight" name="highlight" value="{{ old('highlight') }}">
                            @error('highlight')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label for="short_description" class="form-label">Short Description</label>
                            <textarea class="form-control @error('short_description') is-invalid @enderror" id="short_description" name="short_description" rows="3">{{ old('short_description') }}</textarea>
                            @error('short_description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4">{{ old('description') }}</textarea>
                            @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label for="thumbnail" class="form-label">Product Thumbnail</label>
                            <input type="file" class="form-control @error('thumbnail') is-invalid @enderror" id="thumbnail" name="thumbnail" accept="image/*">
                            @error('thumbnail')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            <div class="mt-2">
                                <img id="thumbnailPreview" src="" alt="thumbnail preview" class="img-thumbnail d-none" style="max-width:200px">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="images" class="form-label">Additional Images</label>
                            <input type="file" class="form-control" id="images" name="images[]" accept="image/*" multiple>
                            <div id="imagesPreview" class="mt-2 d-flex flex-wrap gap-2"></div>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="bx bx-check"></i> Create Product
                            </button>
                            <button type="reset" class="btn btn-secondary">
                                <i class="bx bx-refresh"></i> Reset
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    // thumbnail preview
    document.getElementById('thumbnail')?.addEventListener('change', function (e) {
        const file = e.target.files[0];
        const img = document.getElementById('thumbnailPreview');
        if (!file) { img.classList.add('d-none'); return; }
        const reader = new FileReader();
        reader.onload = function (ev) {
            img.src = ev.target.result;
            img.classList.remove('d-none');
        }
        reader.readAsDataURL(file);
    });

    // multiple images preview
    document.getElementById('images')?.addEventListener('change', function (e) {
        const container = document.getElementById('imagesPreview');
        container.innerHTML = '';
        Array.from(e.target.files).forEach(file => {
            const reader = new FileReader();
            reader.onload = function (ev) {
                const img = document.createElement('img');
                img.src = ev.target.result;
                img.className = 'img-thumbnail';
                img.style.maxWidth = '120px';
                container.appendChild(img);
            }
            reader.readAsDataURL(file);
        });
    });
</script>
@endpush
