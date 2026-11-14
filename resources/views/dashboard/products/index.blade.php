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

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif


    <div class="row mb-3">
        <div class="col">

            <form action="{{ route('dashboard.products.filter') }}" method="GET" class="d-flex gap-2 justify-content-end">


                {{-- Reset Button --}}
                <a href="{{ route('dashboard.products.filter') }}" class="btn btn-secondary">

                    <i class="fa-solid fa-rotate-left"></i>

                </a>
                {{-- Stock Filter --}}
                <select name="stock_status" class="form-select" onchange="this.form.submit()">

                    <option value="">All Stock</option>

                    <option value="in_stock" {{ request('stock_status') === 'in_stock' ? 'selected' : '' }}>
                        In Stock
                    </option>

                    <option value="out_of_stock" {{ request('stock_status') === 'out_of_stock' ? 'selected' : '' }}>
                        Out of Stock
                    </option>

                </select>
                {{-- Category Filter --}}
                <select name="category_id" class="form-select" onchange="this.form.submit()">

                    <option value="">All Categories</option>

                    {{-- @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach --}}

                </select>


                {{-- Published Filter --}}
                <select name="is_published" class="form-select" onchange="this.form.submit()">

                    <option value="">All Status</option>

                    <option value="1" {{ request('is_published') === '1' ? 'selected' : '' }}>
                        Published
                    </option>

                    <option value="0" {{ request('is_published') === '0' ? 'selected' : '' }}>
                        Unpublished
                    </option>

                </select>

                {{-- Minimum Price --}}
                <input type="number" name="min_price" class="form-control" placeholder="Min Price" min="0"
                    step="0.01" value="{{ request('min_price') }}">


                {{-- Maximum Price --}}
                <input type="number" name="max_price" class="form-control" placeholder="Max Price" min="0"
                    step="0.01" value="{{ request('max_price') }}">


                {{-- Search --}}
                <input type="text" name="search" class="form-control" placeholder="Search products..."
                    value="{{ request('search') }}">


                {{-- Search Button --}}
                <button type="submit" class="btn btn-primary">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>



            </form>

        </div>
    </div>


    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-centered table-striped table-nowrap mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Thumbnail</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Publishable</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $product)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <img src="{{ asset('uploads/products/thumbnails') }}/{{ $product->thumbnail ?? 'default.png' }}"
                                        class="avatar-sm">
                                </td>
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
                                    <form action="{{ route('products.togglePublished', $product->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')

                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                name="is_published" value="1" id="published_{{ $product->id }}"
                                                onchange="this.form.submit()"
                                                {{ $product->is_published ? 'checked' : '' }}>

                                            <label class="form-check-label" for="published_{{ $product->id }}">
                                                {{ $product->is_published ? 'Published' : 'Unpublished' }}
                                            </label>
                                        </div>
                                    </form>
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
                                <td colspan="7" class="text-center py-4">
                                    <p class="text-muted">No products found</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- <script>
        function togglePublished(id, element) {

            let isPublished = element.checked;

            fetch(`/admin/products/${id}/toggle-published`, {
                    method: 'PATCH',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        is_published: isPublished
                    })
                })
                .then(response => response.json())
                .then(data => {
                    element.nextElementSibling.textContent =
                        isPublished ? 'Published' : 'Unpublished';
                })
                .catch(error => {
                    element.checked = !isPublished;
                    alert('Something went wrong!');
                });
        }
    </script> --}}
@endsection
