@extends('layouts.dashboard')

@section('title', 'Facility Details')

@section('content')
    <div class="py-3 py-lg-4">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h4 class="page-title mb-0">Facility Details</h4>
            </div>
            <div class="col-sm-6">
                <div class="float-end d-none d-sm-block">
                    <a href="{{ route('facilities.index') }}" class="btn btn-secondary">
                        <i class="bx bx-arrow-back"></i> Back
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $facility->name }}</h5>
            <p class="text-muted mb-4">{{ $facility->description ?? 'No description provided.' }}</p>

            <ul class="list-group list-group-flush mb-0">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <strong>Type</strong>
                    <span>{{ $facility->type ?? 'N/A' }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <strong>Location</strong>
                    <span>{{ $facility->location ?? 'N/A' }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <strong>Capacity</strong>
                    <span>{{ $facility->capacity }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <strong>Created At</strong>
                    <span>{{ $facility->created_at->format('M d, Y') }}</span>
                </li>
            </ul>
        </div>
    </div>
@endsection
