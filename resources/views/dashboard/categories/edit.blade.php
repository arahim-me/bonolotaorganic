@extends('layouts.dashboard')

@section('title', 'Edit Category')

@section('content')
    <div class="py-3 py-lg-4">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h4 class="page-title mb-0">Edit Category</h4>
            </div>
            <div class="col-sm-6">
                <div class="float-end d-none d-sm-block">
                    <a href="{{ route('categories.index') }}" class="btn btn-secondary">
                        <i class="bx bx-arrow-back"></i> Back
                    </a>
                </div>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row">
        <div class="col-xl-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('categories.update', $category->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="d-flex">
                            <img id="image-preview"
                                src="{{ asset('uploads/categories') }}/{{ $category->image ?? 'default.png' }}"
                                alt="{{ $category->name }}" class="img-thumbnail mb-3" style="max-width: 150px;">
                            <div class="d-flex justify-content-center align-items-center ms-3">
                                <div><label for="image" class="form-label">Change Image</label>
                                    <input onchange="document.getElementById('image-preview').src = window.URL.createObjectURL(this.files[0])" type="file" class="form-control" id="image" name="image">
                                </div>

                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Category Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ old('name', $category->name) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $category->description) }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Category</button>
                    </form>
                </div>
            </div>
        </div>
    @endsection
