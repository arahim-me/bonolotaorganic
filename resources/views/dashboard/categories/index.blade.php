@extends('layouts.dashboard')

@section('title', 'Categories Management')

@section('content')
    <div class="py-3 py-lg-4">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h4 class="page-title mb-0">Categories</h4>
            </div>
            <div class="col-sm-6">
                <div class="float-end d-none d-sm-block">
                    <a href="{{ route('categories.create') }}" class="btn btn-primary">
                        <i class="bx bx-plus"></i> Add Category
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

    <div class="row mb-3">
        <div class="col-md-6 col-sm-12">
            <form action="{{ route('dashboard.categories.filter') }}" method="GET" class="d-flex justify-content-end">
                <input type="text" name="filter" class="form-control me-2" placeholder="Search categories"
                    value="{{ request('filter') }}">
                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-centered table-striped table-nowrap mb-0">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Category Name</th>
                            <th>Description</th>
                            <th>Products</th>
                            <th>Publishable</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($categories as $category)
                            <tr>
                                <td>
                                    <img src="{{ asset('uploads/categories') }}/{{ $category->image ?? 'default.png' }}"
                                        class="avatar-sm">
                                </td>
                                <td>
                                    <strong>{{ $category->name }}</strong>
                                </td>
                                <td>
                                    {{ Str::limit($category->description ?? '-', 50) }}
                                </td>
                                <td>
                                    <span class="badge bg-info">{{ $category->products_count ?? 0 }}</span>
                                </td>
                                <td>
                                    <a href="{{ route('dashboard.categories.toggle-status', $category->id) }}"
                                        class="text-decoration-none">
                                        <button type="button" class="btn btn-sm status-toggle-btn"
                                            style="background-color: {{ $category->is_published == 1 ? '#00d084' : '#e74c3c' }}; color: white; border: none;">
                                            <i class="fas fa-{{ $category->is_published == 1 ? 'check' : 'times'}} me-1"></i><span
                                                class="status-text">{{ $category->is_published == 1 ? 'Published' : 'Not Published' }}</span>
                                        </button>
                                    </a>
                                </td>
                                <td width="100px">
                                    <div class="d-flex gap-2" width="100px">
                                        <a class="dropdown-item" href="{{ route('categories.show', $category->id) }}"><i
                                                class="fa-solid fa-eye"></i></a><a class="dropdown-item"
                                            href="{{ route('categories.edit', $category->id) }}"><i
                                                class="fa-solid fa-pen-to-square"></i></a>
                                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
                                            class="m-0"
                                            onsubmit="return confirm('Are you sure you want to delete this category?');">
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
                                    <p class="text-muted">No categories found</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
