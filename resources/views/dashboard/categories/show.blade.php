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

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $category->name }}</h5>
            <p class="text-muted mb-4">{{ $category->description ?? 'No description provided.' }}</p>

            <ul class="list-group list-group-flush mb-0">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <strong>Created At</strong>
                    <span>{{ $category->created_at->format('M d, Y') }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <strong>Products Count</strong>
                    <span>{{ $category->products()->count() }}</span>
                </li>
            </ul>
        </div>
    </div>
@endsection
