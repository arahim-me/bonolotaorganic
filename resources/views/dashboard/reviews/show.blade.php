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
                <dt class="col-sm-3">Title</dt>
                <dd class="col-sm-9">{{ $review->title ?? 'Untitled review' }}</dd>

                <dt class="col-sm-3">Product</dt>
                <dd class="col-sm-9">{{ $review->product->name ?? '-' }}</dd>

                <dt class="col-sm-3">Author</dt>
                <dd class="col-sm-9">{{ $review->user->name ?? '-' }}</dd>

                <dt class="col-sm-3">Rating</dt>
                <dd class="col-sm-9">{{ $review->rating }}/5</dd>

                <dt class="col-sm-3">Status</dt>
                <dd class="col-sm-9">{{ $review->status->name ?? 'Pending' }}</dd>

                <dt class="col-sm-3">Description</dt>
                <dd class="col-sm-9">{{ $review->description ?? '-' }}</dd>
            </dl>
        </div>
    </div>
@endsection
