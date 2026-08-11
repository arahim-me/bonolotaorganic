@extends('layouts.dashboard')

@section('title', $title ?? 'Policy Types Management')

@section('content')
    <div class="py-3 py-lg-4">
        <div class="row align-items-center">
            <div class="col">
                <h4 class="page-title mb-0">{{$title ?? 'Policy Types Management'}}</h4>
            </div>
            <div class="col">
                <div class="float-end">
                    <a href="{{ route('policies.show', $policy->id) }}" class="btn btn-secondary">
                        <i class="bx bx-arrow-back"></i> Back
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

    <div class="card col-md-6 col-sm-12">
        <div class="card-body">
            <form action="{{ route('policy-types.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Policy title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                        value="{{ old('title') }}" required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <label for="description" class="form-label">Policy description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                        rows="5">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
@endsection
