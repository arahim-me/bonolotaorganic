@extends('layouts.dashboard')

@section('title', $title ?? 'Reviews')

@section('content')
    <div class="py-3 py-lg-4">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h4 class="page-title mb-0">Reviews</h4>
            </div>
            <div class="col-sm-6">
                <div class="float-end d-none d-sm-block">
                    <a href="{{ route('reviews.create') }}" class="btn btn-primary">
                        <i class="bx bx-plus"></i> Add Review
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
                            <th>Product</th>
                            <th>Review</th>
                            <th>Sender</th>
                            <th>Rating</th>
                            <th>Approval</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($reviews as $review)
                            <tr>
                                <td>
                                    <div class="col"><strong>#{{ $review->product->id ?? 'N/A' }}</strong></div>
                                    <div class="col"> <a href="{{ route('products.show', $review->product->id) }}">
                                            <strong>{{ $review->product->name ?? 'Untitled review' }}</strong>
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <p class="text-muted mb-0">{{ $review->comment ?? 'No comment written' }}</p>
                                </td>
                                <td>
                                    <strong>{{ $review->user->name ?? 'Anonymous' }}</strong>
                                    <p class="text-muted mb-0">{{ $review->user->email ?? 'No email provided' }}</p>
                                    <p class="text-muted mb-0">{{ $review->user->phone ?? 'No phone provided' }}</p>
                                </td>
                                <td>
                                    <div class="col">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $review->rating)
                                                <i class="bx bxs-star text-warning"></i>
                                            @else
                                                <i class="bx bx-star text-muted"></i>
                                            @endif
                                        @endfor
                                    </div>
                                </td>
                                <td>
                                    <a href="{{ route('reviews.toggle-status', $review->id) }}"
                                        class="text-decoration-none">
                                        <button type="button" class="btn btn-sm"
                                            style="background-color: {{ $review->is_approved == true ? '#00d084' : '#e74c3c' }}; color: white; border: none;">
                                            <i
                                                class="{{ $review->is_approved == true ? 'bx bx-check' : 'bx bx-x' }} me-1"></i>
                                            <span>{{ $review->is_approved == true ? 'Approved' : 'Not Approved' }}</span>
                                        </button>
                                    </a>
                                </td>
                                <td width="100px">
                                    <div class="d-flex gap-2">
                                        <a class="dropdown-item" href="{{ route('reviews.show', $review->id) }}"><i
                                                class="fa-solid fa-eye"></i></a>
                                        <a class="dropdown-item" href="{{ route('reviews.edit', $review->id) }}"><i
                                                class="fa-solid fa-pen-to-square"></i></a>
                                        <form action="{{ route('reviews.destroy', $review->id) }}" method="POST"
                                            class="m-0"
                                            onsubmit="return confirm('Are you sure you want to delete this review?');">
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
