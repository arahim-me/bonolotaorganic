@extends('layouts.dashboard')
@section('title', $title ?? 'Edit Shipping Fee ' . $shippingFee->title)

@section('content')
    <div class="container-fluid">

        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">{{ $title ?? 'Edit Shipping Fee ' . $shippingFee->title }}</h5>
            </div>

            <div class="card-body">

                <form action="{{ route('shipping-fees.update', $shippingFee->id) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                            value="{{ old('title', $shippingFee->title) }}">

                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="3">{{ old('description', $shippingFee->description) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Shipping Fee (৳)</label>
                        <input type="number" name="fee" class="form-control @error('fee') is-invalid @enderror"
                            value="{{ old('fee', $shippingFee->fee) }}" min="0" step="0.01">

                        @error('fee')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-check form-switch mb-3">
                        <input type="hidden" name="is_published" value="0">

                        <input class="form-check-input" type="checkbox" name="is_published" value="1" id="is_published"
                            {{ old('is_published', $shippingFee->is_published) ? 'checked' : '' }}>

                        <label class="form-check-label" for="is_published">
                            Published
                        </label>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Update Shipping Fee
                    </button>

                    <a href="{{ route('shipping-fees.index') }}" class="btn btn-secondary">
                        Back
                    </a>

                </form>

            </div>
        </div>

    </div>
@endsection
