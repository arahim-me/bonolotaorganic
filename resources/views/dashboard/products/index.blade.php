@extends('layouts.dashboard')

@section('title', 'Products Management')

@section('content')
    <div class="py-3 py-lg-4">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h4 class="page-title mb-0">Products</h4>
            </div>
            <div class="col-sm-6">
                <div class="float-end d-none d-sm-block">
                    <a href="{{ route('products.create') }}" class="btn btn-primary">
                        <i class="bx bx-plus"></i> Add Product
                    </a>
                </div>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-centered table-striped table-nowrap mb-0">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $product)
                            <tr>
                                <td>
                                    <strong>{{ $product->name ?? 'N/A' }}</strong>
                                </td>
                                <td>
                                    {{ $product->category_name ?? '-' }}
                                </td>
                                <td>
                                    ${{ number_format($product->price ?? 0, 2) }}
                                </td>
                                <td>
                                    <span class="badge bg-info">{{ $product->stock ?? 0 }}</span>
                                </td>
                                <td>
                                    <span class="badge bg-success"><i class="{{ $product->status->icon }} me-1"></i>{{ $product->status->name ?? '-' }}</span>
                                </td>
                                <td width="100px">
                                    <div class="d-flex gap-2" width="100px">
                                        <a class="dropdown-item" href="{{ route('products.show', $product->id) }}"><i
                                                class="fa-solid fa-eye"></i></a><a class="dropdown-item"
                                            href="{{ route('products.edit', $product->id) }}"><i
                                                class="fa-solid fa-pen-to-square"></i></a>
                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                            class="m-0"
                                            onsubmit="return confirm('Are you sure you want to delete this product?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item text-danger">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4">
                                    <p class="text-muted">No products found</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
