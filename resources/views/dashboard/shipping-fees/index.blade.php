@extends('layouts.dashboard')
@section('title', $title ?? 'Create Shipping Fee')

@section('content')
    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4>{{ $title ?? 'Shipping Fees' }}</h4>

            <a href="{{ route('shipping-fees.create') }}" class="btn btn-primary">
                <i class="bx bx-plus"></i> Add Shipping Fee
            </a>
        </div>

        {{-- Success Message --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- Search and Filter --}}
        <div class="card mb-3">
            <div class="card-body">

                <form action="{{ route('shipping-fees.index') }}" method="GET">

                    <div class="row g-2">

                        <div class="col-md-6">
                            <input type="text" name="search" class="form-control" placeholder="Search shipping fee..."
                                value="{{ request('search') }}">
                        </div>

                        <div class="col-md-3">
                            <select name="is_published" class="form-select">

                                <option value="">All Status</option>

                                <option value="1" {{ request('is_published') === '1' ? 'selected' : '' }}>
                                    Published
                                </option>

                                <option value="0" {{ request('is_published') === '0' ? 'selected' : '' }}>
                                    Unpublished
                                </option>

                            </select>
                        </div>

                        <div class="col-md-3">
                            <button type="submit" class="btn btn-primary">
                                Search
                            </button>

                            <a href="{{ route('shipping-fees.index') }}" class="btn btn-secondary">
                                Reset
                            </a>
                        </div>

                    </div>
                </form>

            </div>
        </div>

        {{-- Table --}}
        <div class="card">
            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Fee</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($shippingFees as $key => $shippingFee)
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                <td>{{ $shippingFee->title }}</td>

                                <td>{{ $shippingFee->slug }}</td>

                                <td>৳{{ number_format($shippingFee->fee, 2) }}</td>

                                <td>
                                    @if ($shippingFee->is_published)
                                        <span class="badge bg-success">Published</span>
                                    @else
                                        <span class="badge bg-secondary">Unpublished</span>
                                    @endif
                                </td>

                                <td>
                                    {{ $shippingFee->created_at->format('d M, Y h:i A') }}
                                </td>

                                <td>
                                    <div class="d-flex gap-1">

                                        <a href="{{ route('shipping-fees.show', $shippingFee->id) }}"
                                            class="btn btn-sm btn-info">
                                            <i class="bx bx-show"></i>
                                        </a>

                                        <a href="{{ route('shipping-fees.edit', $shippingFee->id) }}"
                                            class="btn btn-sm btn-primary">
                                            <i class="bx bx-edit"></i>
                                        </a>

                                        <form action="{{ route('shipping-fees.destroy', $shippingFee->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this shipping fee?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="bx bx-trash"></i>
                                            </button>

                                        </form>

                                    </div>
                                </td>
                            </tr>

                        @empty

                            <tr>
                                <td colspan="7" class="text-center py-4">
                                    No Shipping Fee Found.
                                </td>
                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>
@endsection
