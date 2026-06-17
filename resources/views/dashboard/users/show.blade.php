@extends('layouts.dashboard')

@section('title', 'User Profile')

@section('content')
    <div class="py-3 py-lg-4">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h4 class="page-title mb-0">User Profile</h4>
            </div>
            <div class="col-sm-6">
                <div class="float-end d-none d-sm-block">
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">
                        <i class="fa-solid fa-pen-to-square me-1"></i> Edit Profile
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body text-center">
                    <div class="mb-3">
                        @if($user->avatar)
                            <img src="{{ asset('storage/' . $user->avatar) }}" alt="{{ $user->name }}" class="rounded-circle" width="120">
                        @else
                            <div class="avatar avatar-lg" style="width: 120px; height: 120px; background: #7a08c2; color: white; display: flex; align-items: center; justify-content: center; border-radius: 50%; font-size: 48px;">
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            </div>
                        @endif
                    </div>
                    <h4 class="card-title mb-1">{{ $user->name }}</h4>
                    <p class="text-muted mb-0">{{ $user->username ?? 'No username provided' }}</p>
                </div>
            </div>
        </div>

        <div class="col-xl-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Profile Information</h5>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label text-muted">Full Name</label>
                            <p class="mb-0">{{ $user->name }}</p>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-muted">Username</label>
                            <p class="mb-0"><i class="fa-solid {{ $user->username? 'fa-user text-primary' : 'fa-user-slash text-danger'}} me-1"></i>{{ $user->username ?? 'No username provided' }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label text-muted">Email</label>
                            <p class="mb-0">{{ $user->email }}</p>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-muted">Phone</label>
                            <p class="mb-0">{{ $user->phone ?? '-' }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label text-muted">Address</label>
                            <p class="mb-0">{{ $user->address ?? '-' }}</p>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-muted">Email Verified</label>
                            <p class="mb-0">
                                @if($user->email_verified_at)
                                    <span class="badge bg-success">Verified</span>
                                @else
                                    <span class="badge bg-warning">Not Verified</span>
                                @endif
                            </p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <label class="form-label text-muted">Joined Date</label>
                            <p class="mb-0">{{ $user->created_at->format('d M, Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
