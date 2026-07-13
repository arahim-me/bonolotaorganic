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
    <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="{{ asset('uploads/categories') }}/{{ $category->image ?? 'default.png' }}"
            alt="Card image cap">
        <div class="card-body">
            <h4 class="card-title">{{ $category->name }}</h4>
            <p class="card-text">{{ $category->description ?? 'No description provided.' }}</p>
        </div>
        <ul class="list-group list-group-flush mb-0">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <strong>Created At:</strong>
                <span>{{ $category->created_at->format('M d, Y') }}</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <strong>Products Count:</strong>
                <span>{{ $category->products()->count() }}</span>
            </li>
        </ul>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <strong>Status:</strong>
                <span class="{{ $category->status_id == 1 ? ' text-success' : ' text-danger' }}">
                    <i class="fa-solid {{ $category->status->icon }}"></i> {{ $category->status->name }}
                </span>
            </li>
        </ul>
        <div class="card-body">
            <a href="{{ route('categories.edit', $category->id) }}" class="card-link">Edit</a>
            <a href="{{ route('categories.index') }}" class="card-link">Back to List</a>
        </div>
    </div>
@endsection
