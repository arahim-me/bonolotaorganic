@extends('layouts.dashboard')

@section('title', 'Category Details')

@section('content')
    <div class="py-3 py-lg-4">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h4 class="page-title mb-0">Category Details</h4>
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
    <div class="card col-md-4 col-sm-12">
        <img class="card-img-top img-fluid" src="{{ asset('uploads/categories') }}/{{ $category->image ?? 'default.png' }}"
            alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">{{ $category->name }}</h5>
            <p class="card-text">{{ $category->description }}</p>
            <div class="row">
                <div class="col">
                    <p class="card-text"><small class="text-muted">Products:
                            {{ $category->products_count ?? 0 }}</small>
                    </p>
                </div>
                <div class="col">
                    <p class="card-text"><small class="text-muted">Published:
                            {{ $category->is_published ? 'Yes' : 'No' }}</small>
                    </p>
                </div>
            </div>
            <p class="card-text"><small class="text-muted">Publishable:

        </div>
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="mx-auto">
                <a href="{{ route('categories.index') }}" class="btn btn-secondary waves-effect waves-light"><i
                        class="bx bx-arrow-back"></i> Back</a>
            </div>
            <div class="mx-auto">
                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary waves-effect waves-light"><i
                        class="bx bx-edit"></i> Edit</a>
            </div>
            <div class="mx-auto">
                <a href="{{ route('categories.destroy', $category->id) }}" class="btn btn-danger waves-effect waves-light"
                    onclick="return confirm('Are you sure you want to delete this category?')"><i class="bx bx-trash"></i>
                Delete</a>
            </div>
        </div>
    </div>
    </div>
@endsection
