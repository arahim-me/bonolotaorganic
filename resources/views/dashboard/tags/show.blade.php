@extends('layouts.dashboard')

@section('title', 'Tag Details')

@section('content')
<div class="container-fluid py-3">

    <div class="d-flex justify-content-between mb-4">
        <h4>Tag Details</h4>

        <a href="{{ route('dashboard.tags.index') }}"
           class="btn btn-secondary">
            Back
        </a>
    </div>

    <div class="card mb-4">
        <div class="card-body">

            <h5>{{ $tag->name }}</h5>

            <p class="text-muted">{{ $tag->slug }}</p>

            <p>{{ $tag->description ?: 'No description available.' }}</p>

            <p>
                Status:
                @if($tag->is_active)
                    <span class="badge bg-success">Active</span>
                @else
                    <span class="badge bg-danger">Inactive</span>
                @endif
            </p>

            <p>Total Products: {{ $tag->products->count() }}</p>

            <a href="{{ route('dashboard.tags.edit', $tag) }}"
               class="btn btn-warning">
                Edit Tag
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Associated Products</h5>
        </div>

        <div class="card-body table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Product Name</th>
                        <th>Price</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($tag->products as $product)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ number_format($product->price, 2) }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">
                                No products associated with this tag.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
