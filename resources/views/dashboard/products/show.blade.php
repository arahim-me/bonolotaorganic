@extends('layouts.dashboard')

@section('title', 'Product Details')

@section('content')
    <div class="py-3 py-lg-4">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h4 class="page-title mb-0">Product Details</h4>
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

    <div class="card">
        <div class="card-body">
            <div class="row g-4">
                <div class="col-xl-4">
                    <div class="border rounded p-3 text-center">

                        <img src="{{ asset('uploads/products/thumbnails') }}/{{ $product->thumbnail ?? 'default.png' }}"
                            alt="{{ $product->name }}" class="img-fluid rounded mb-3">

                    </div>
                </div>
                <div class="col-xl-8">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="text-muted mb-3">{{ $product->description ?? 'No description provided.' }}</p>

                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <strong>Category</strong>
                            <p>{{ $product->category_name ?? '-' }}</p>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <strong>Price</strong>
                            <p>${{ number_format($product->price, 2) }}</p>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <strong>Stock</strong>
                            <p>{{ $product->stock }}</p>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <strong>Colors: </strong>
                            <div class="colors d-flex justify-content-start gap-2 align-items-center">
                                @if ($productColors)
                                    @foreach ($productColors as $color)
                                        <p class="d-inline-block">{{ $color->color }}</p>
                                    @endforeach
                                @else
                                    <p>{{ 'N/A' }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <strong>Sizes: </strong>
                            <div class="colors d-flex justify-content-start gap-2 align-items-center">
                                @if ($productSizes)
                                    @foreach ($productSizes as $size)
                                        <p class="d-inline-block">{{ $size->size }}</p>
                                    @endforeach
                                @else
                                    <p>{{ 'N/A' }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <strong>Created At</strong>
                            <p>{{ $product->created_at->format('M d, Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">
                    Product Tags
                </label>

                <div class="d-flex flex-wrap gap-2">

                    @forelse($product->tags as $tag)
                        <span class="badge bg-info">
                            {{ $tag->name }}
                        </span>

                    @empty

                        <span class="text-muted">
                            No tags assigned.
                        </span>
                    @endforelse

                </div>
            </div>
        </div>
    </div>
@endsection
