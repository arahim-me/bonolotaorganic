@extends('layouts.dashboard')

@section('title', $title ?? 'Brands Management')

@section('content')
    <div class="py-3 py-lg-4">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h4 class="page-title mb-0">Brands</h4>
            </div>
            <div class="col-sm-6">
                <div class="float-end d-none d-sm-block">
                    <a href="{{ route('brands.create') }}" class="btn btn-primary">
                        <i class="bx bx-plus"></i> Add Brand
                    </a>
                </div>
            </div>
        </div>
    </div>

    @if (session('success'))
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
                            <th>#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Product Count</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($brands as $brand)
                            <tr>
                                <td>
                                    <strong>{{ $brand->name ?? 'Unnamed brand' }}</strong>
                                </td>
                                <td>{{ $brand->description ?? '-' }}</td>
                                <td>{{ $brand->products->count() }}</td>
                                <td>
                                    <a href="{{ route('brands.toggle-status', $brand->id) }}" class="text-decoration-none">
                                        <button type="button" class="btn btn-sm"
                                            style="background-color: {{ $brand->status_id == 1 ? '#00d084' : '#e74c3c' }}; color: white; border: none;">
                                            <i class="{{ $brand->status->icon ?? 'bx bx-circle' }} me-1"></i>
                                            <span>{{ $brand->status->name ?? 'Pending' }}</span>
                                        </button>
                                    </a>
                                </td>
                                <td width="100px">
                                    <div class="d-flex gap-2">
                                        <a class="dropdown-item" href="{{ route('brands.show', $brand->id) }}"><i class="fa-solid fa-eye"></i></a>
                                        <a class="dropdown-item" href="{{ route('brands.edit', $brand->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <form action="{{ route('brands.destroy', $brand->id) }}" method="POST" class="m-0"
                                            onsubmit="return confirm('Are you sure you want to delete this brand?');">
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
                                    <p class="text-muted">No reviews found</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
