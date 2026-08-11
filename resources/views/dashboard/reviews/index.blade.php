@extends('layouts.dashboard')

@section('title', $title ?? 'Reviews Management')

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
                            <th>Title</th>
                            <th>Product</th>
                            <th>Author</th>
                            <th>Rating</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($reviews as $review)
                            <tr>
                                <td>
                                    <strong>{{ $review->title ?? 'Untitled review' }}</strong>
                                </td>
                                <td>{{ $review->product->name ?? '-' }}</td>
                                <td>{{ $review->user->name ?? '-' }}</td>
                                <td>
                                    <span class="badge bg-warning text-dark">{{ $review->rating }}/5</span>
                                </td>
                                <td>
                                    <a href="{{ route('reviews.toggle-status', $review->id) }}" class="text-decoration-none">
                                        <button type="button" class="btn btn-sm"
                                            style="background-color: {{ $review->status_id == 1 ? '#00d084' : '#e74c3c' }}; color: white; border: none;">
                                            <i class="{{ $review->status->icon ?? 'bx bx-circle' }} me-1"></i>
                                            <span>{{ $review->status->name ?? 'Pending' }}</span>
                                        </button>
                                    </a>
                                </td>
                                <td width="100px">
                                    <div class="d-flex gap-2">
                                        <a class="dropdown-item" href="{{ route('reviews.show', $review->id) }}"><i class="fa-solid fa-eye"></i></a>
                                        <a class="dropdown-item" href="{{ route('reviews.edit', $review->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <form action="{{ route('reviews.destroy', $review->id) }}" method="POST" class="m-0"
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
