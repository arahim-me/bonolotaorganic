@extends('layouts.dashboard')

@section('title', $title ?? 'Policy Type Details')

@section('content')
    <div class="py-3 py-lg-4">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h4 class="page-title mb-0">Policy Type Details</h4>
                <p class="text-muted mb-0">Review the policy type information.</p>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('policy-types.index') }}" class="btn btn-secondary">
                    <i class="bx bx-arrow-back me-1"></i> Back
                </a>
                <a href="{{ route('policy-types.edit', $policyType->id) }}" class="btn btn-primary">
                    <i class="bx bx-edit me-1"></i> Edit
                </a>
            </div>
        </div>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <div class="row g-4">
                <div class="col-md-6">
                    <h6 class="text-muted mb-2">Name</h6>
                    <p class="fw-semibold mb-0">{{ $policyType->name }}</p>
                </div>
                <div class="col-md-6">
                    <h6 class="text-muted mb-2">Slug</h6>
                    <p class="mb-0"><span class="badge bg-light text-dark">{{ $policyType->slug }}</span></p>
                </div>
                <div class="col-md-6">
                    <h6 class="text-muted mb-2">Status</h6>
                    <p class="mb-0">
                        <span class="badge {{ $policyType->is_published ? 'bg-success' : 'bg-warning text-dark' }}">
                            {{ $policyType->is_published ? 'Published' : 'Draft' }}
                        </span>
                    </p>
                </div>
                <div class="col-md-6">
                    <h6 class="text-muted mb-2">Created</h6>
                    <p class="mb-0">{{ $policyType->created_at->format('M d, Y') }}</p>
                </div>
                <div class="col-12">
                    <h6 class="text-muted mb-2">Description</h6>
                    <p class="mb-0">{{ $policyType->description ?? 'No description provided.' }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
