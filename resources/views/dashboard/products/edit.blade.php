@extends('layouts.dashboard')

@section('title', 'Edit Product')

@section('content')
    <div class="py-3 py-lg-4">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h4 class="page-title mb-0">Edit Product</h4>
            </div>
            <div class="col-sm-6">
                <div class="float-end d-none d-sm-block">
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
                    <form action="{{ route('products.update', $product->id ?? '#') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Product Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $product->name ?? '') }}" required>
                            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label for="category_id" class="form-label">Category</label>
                            <select class="form-select @error('category_id') is-invalid @enderror" id="category_id" name="category_id">
                                <option value="">Select category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4">{{ old('description', $product->description ?? '') }}</textarea>
                            @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price', $product->price ?? '') }}" required>
                                @error('price')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="stock" class="form-label">Stock</label>
                                <input type="number" class="form-control @error('stock') is-invalid @enderror" id="stock" name="stock" value="{{ old('stock', $product->stock ?? 0) }}">
                                @error('stock')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Product Image</label>
                                <input type="file" class="form-control @error('thumbnail') is-invalid @enderror" id="thumbnail" name="thumbnail" accept="image/*">
                                @error('thumbnail')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                <div class="mt-2">
                                    @if($product->thumbnail)
                                        <img id="thumbnailPreview" src="{{ asset('storage/' . $product->thumbnail) }}" alt="thumbnail" class="img-thumbnail" style="max-width:200px">
                                    @else
                                        <img id="thumbnailPreview" src="" alt="thumbnail preview" class="img-thumbnail d-none" style="max-width:200px">
                                    @endif
                                </div>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="bx bx-check"></i> Update Product
                            </button>
                            <button type="reset" class="btn btn-secondary">
                                <i class="bx bx-refresh"></i> Reset
                            </button>
                        </div>
                    </form>

                    <div class="mt-3">
                        <form action="{{ route('products.destroy', $product->id ?? '#') }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="bx bx-trash"></i> Delete Product
                            </button>
                        </form>
                    </div>

                    <div class="mt-4">
                        <h6>Gallery</h6>
                        <div id="existingImages" class="d-flex flex-wrap gap-2 mb-3">
                            @if(!empty($product->images))
                                @foreach($product->images as $img)
                                    <div class="position-relative">
                                        <img src="{{ asset('storage/' . $img) }}" class="img-thumbnail" style="max-width:120px;">
                                    </div>
                                @endforeach
                            @endif
                        </div>

                        <form action="{{ route('products.images.upload', $product->id) }}" class="dropzone" id="productDropzone">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
<!-- Dropzone CSS (CDN) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css" integrity="sha512-U2q3pJf0xjv+eV1VgZ8ZQp0kVQpK6G2D8k3s0s0Zq6cE6F5pZ5m4k5Gx9z1lq4Q5D1Z9v5r5y5+K1" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@push('scripts')
<!-- Dropzone JS (CDN) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js" integrity="sha512-something" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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

    // Configure Dropzone
    Dropzone.autoDiscover = false;
    const dz = new Dropzone('#productDropzone', {
        paramName: 'file',
        maxFilesize: 5, // MB
        acceptedFiles: 'image/*',
        headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') },
        success: function (file, res) {
            // show uploaded image thumbnail in existingImages container
            const container = document.getElementById('existingImages');
            const img = document.createElement('img');
            img.src = res.path;
            img.className = 'img-thumbnail';
            img.style.maxWidth = '120px';
            container.appendChild(img);
            this.removeFile(file);
        }
    });
</script>
@endpush
