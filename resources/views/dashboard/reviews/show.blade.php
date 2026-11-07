@extends('layouts.dashboard')

@section('title', 'Review Details')

@section('content')
    <div class="py-3 py-lg-4">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h4 class="page-title mb-0">Review Details</h4>
            </div>
            <div class="col-sm-6">
                <div class="float-end d-none d-sm-block">
                    <a href="{{ route('reviews.index') }}" class="btn btn-outline-secondary">Back to Reviews</a>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <dl class="row">
                <dt class="col-sm-3">ID</dt>
                <dd class="col-sm-9">#{{ $review->id }}</dd>

                <dt class="col-sm-3">comment</dt>
                <dd class="col-sm-9">{{ $review->comment ?? 'no review written' }}</dd>

                <dt class="col-sm-3">Product</dt>
                <dd class="col-sm-9"><a href="{{ route('products.show', $review->product->id) }}">{{ $review->product->name ?? '-' }}</a></dd>

                <dt class="col-sm-3">Reviewer</dt>
                <dd class="col-sm-9">
                    <div class="col">{{ $review->user->name ?? 'Anonymous' }}</div>
                    <div class="col">{{ $review->user->email ?? $review->email }}</div>
                    <div class="col">{{ $review->user->phone ?? $review->phone }}</div>
                </dd>

                <dt class="col-sm-3">Rating</dt>
                <dd class="col-sm-9">
                    @for ($i = 1; $i <= 5; $i++)
                        @if ($i <= $review->rating)
                            <i class="bx bxs-star text-warning"></i>
                        @else
                            <i class="bx bx-star text-muted"></i>
                        @endif
                    @endfor
                </dd>

                <dt class="col-sm-3">Approval</dt>
                <dd class="col-sm-9">
                    <div class="col">{{ $review->is_approved ? 'Approved' : 'Not Approved' }}</div>
                    <div class="col">{{ $review->approver ? 'Approved by : ' . $review->approver->name : 'No one approved yet' }}</div>
                    <div class="col">{{ $review->approved_at ? 'Approved on : ' . $review->approved_at : 'Not approved yet' }}</div>
                </dd>

                <dt class="col-sm-3">Reviewed at</dt>
                <dd class="col-sm-9">{{ $review->created_at->format('d-m-Y') }}</dd>
            </dl>
        </div>
    </div>
@endsection
