
@extends('layouts.dashboard')

@section('title', $title ?? 'Brand Details')

@section('content')
    <div class="py-3 py-lg-4">
        <div class="row align-items-center">
            <div class="col">
                <h4 class="page-title mb-0">
                    {{ $title ?? 'Brand Details' }}
                </h4>
            </div>
            <div class="col">
                <div class="float-end">
                    <a href="{{ route('dashboard.brands.index') }}" class="btn btn-secondary">
                        <i class="bx bx-arrow-back"></i> Back
                    </a>
                    <a href="{{ route('dashboard.brands.edit', $brand->id) }}" class="btn btn-primary">
                        <i class="bx bx-edit"></i> Edit Brand
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Brand Information</h5>
                </div>

                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-4 text-muted">
                            Brand Name
                        </div>
                        <div class="col-md-8 fw-semibold">
                            {{ $brand->name }}
                        </div>
                    </div>

                    <hr>

                    <div class="row mb-3">
                        <div class="col-md-4 text-muted">
                            Slug
                        </div>
                        <div class="col-md-8">
                            <code>{{ $brand->slug }}</code>
                        </div>
                    </div>

                    <hr>

                    <div class="row mb-3">
                        <div class="col-md-4 text-muted">
                            Description
                        </div>
                        <div class="col-md-8">
                            {!! $brand->description
                                ? nl2br(e($brand->description))
                                : '<span class="text-muted">No description available.</span>' !!}
                        </div>
                    </div>

                    <hr>

                    <div class="row mb-3">
                        <div class="col-md-4 text-muted">
                            Published Status
                        </div>
                        <div class="col-md-8">
                            @if ($brand->is_published)
                                <span class="badge bg-success">Published</span>
                            @else
                                <span class="badge bg-danger">Unpublished</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Additional Information</h5>
                </div>

                <div class="card-body">
                    <div class="mb-3">
                        <label class="text-muted d-block mb-1">Brand ID</label>
                        <strong>#{{ $brand->id }}</strong>
                    </div>

                    <hr>

                    <div class="mb-3">
                        <label class="text-muted d-block mb-1">Created At</label>
                        <strong>
                            {{ $brand->created_at?->format('d M Y, h:i A') ?? 'N/A' }}
                        </strong>
                    </div>

                    <hr>

                    <div class="mb-3">
                        <label class="text-muted d-block mb-1">Last Updated</label>
                        <strong>
                            {{ $brand->updated_at?->format('d M Y, h:i A') ?? 'N/A' }}
                        </strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
