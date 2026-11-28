
@extends('layouts.dashboard')

@section('title', $title ?? 'Edit Brand')

@section('content')
    <div class="py-3 py-lg-4">
        <div class="row align-items-center">
            <div class="col">
                <h4 class="page-title mb-0">
                    {{ $title ?? 'Edit Brand' }}
                </h4>
            </div>

            <div class="col">
                <div class="float-end">
                    <a href="{{ route('dashboard.brands.index') }}" class="btn btn-secondary">
                        <i class="bx bx-arrow-back"></i> Back
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Edit Brand Information</h5>
        </div>

        <div class="card-body">
            <form action="{{ route('dashboard.brands.update', $brand->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row g-3">

                    {{-- Brand Name --}}
                    <div class="col-md-6">
                        <label class="form-label">
                            Brand Name <span class="text-danger">*</span>
                        </label>

                        <input
                            type="text"
                            name="name"
                            class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name', $brand->name) }}"
                            maxlength="255"
                            required
                        >

                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Slug --}}
                    <div class="col-md-6">
                        <label class="form-label">
                            Slug <span class="text-danger">*</span>
                        </label>

                        <input
                            type="text"
                            name="slug"
                            class="form-control @error('slug') is-invalid @enderror"
                            value="{{ old('slug', $brand->slug) }}"
                            maxlength="255"
                        >

                        @error('slug')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Description --}}
                    <div class="col-12">
                        <label class="form-label">Description</label>

                        <textarea
                            name="description"
                            rows="4"
                            class="form-control @error('description') is-invalid @enderror"
                        >{{ old('description', $brand->description) }}</textarea>

                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Published Status --}}
                    <div class="col-md-6">
                        <label class="form-label">Published Status</label>

                        <select
                            name="is_published"
                            class="form-select @error('is_published') is-invalid @enderror"
                        >
                            <option value="1"
                                {{ (string) old('is_published', $brand->is_published) === '1' ? 'selected' : '' }}>
                                Published
                            </option>

                            <option value="0"
                                {{ (string) old('is_published', $brand->is_published) === '0' ? 'selected' : '' }}>
                                Unpublished
                            </option>
                        </select>

                        @error('is_published')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="bx bx-save"></i> Update Brand
                    </button>

                    <a href="{{ route('dashboard.brands.show', $brand->id) }}"
                       class="btn btn-outline-info">
                        <i class="bx bx-show"></i> View Brand
                    </a>

                    <a href="{{ route('dashboard.brands.index') }}"
                       class="btn btn-outline-secondary">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
