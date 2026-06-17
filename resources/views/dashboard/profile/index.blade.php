@extends('layouts.dashboard')

@section('title', 'My Profile')

@section('content')
    <div class="py-3 py-lg-4">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h4 class="page-title mb-0">My Profile</h4>
            </div>
            <div class="col-sm-6">
                <div class="float-end d-none d-sm-block">
                    <a href="{{ route('profile.edit') }}" class="btn btn-primary">
                        <i class="bx bx-edit"></i> Edit Profile
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body text-center">
                    @if(auth()->user()->avatar)
                        <img src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="{{ auth()->user()->name }}" class="rounded-circle avatar-xl mb-3">
                    @else
                        <div class="avatar-xl rounded-circle bg-light d-inline-flex align-items-center justify-content-center mb-3">
                            <span class="text-muted fs-3">{{ strtoupper(substr(auth()->user()->name,0,1)) }}</span>
                        </div>
                    @endif

                    <h5 class="mb-1">{{ auth()->user()->name }}</h5>
                    <p class="text-muted mb-0">{{ auth()->user()->email }}</p>
                </div>
            </div>
        </div>

        <div class="col-xl-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-3">Profile Details</h5>

                    <div class="row">
                        <div class="col-md-6">
                            <p class="text-muted mb-1">Username</p>
                            <h6>{{ auth()->user()->username ?? '-' }}</h6>
                        </div>

                        <div class="col-md-6">
                            <p class="text-muted mb-1">Phone</p>
                            <h6>{{ auth()->user()->phone ?? '-' }}</h6>
                        </div>

                        <div class="col-md-12 mt-3">
                            <p class="text-muted mb-1">Address</p>
                            <h6>{{ auth()->user()->address ?? '-' }}</h6>
                        </div>

                        <div class="col-md-6 mt-3">
                            <p class="text-muted mb-1">Email Verified</p>
                            <h6>{{ auth()->user()->email_verified_at ? 'Yes' : 'No' }}</h6>
                        </div>

                        <div class="col-md-6 mt-3">
                            <p class="text-muted mb-1">Joined</p>
                            <h6>{{ auth()->user()->created_at->format('M d, Y') }}</h6>
                        </div>
                    </div>

                    <div class="mt-4 d-flex gap-2">
                        <a href="{{ route('profile.edit') }}" class="btn btn-outline-primary"><i class="bx bx-edit-alt"></i> Edit Profile</a>

                        <form action="{{ route('profile.destroy') }}" method="POST" onsubmit="return confirm('Are you sure you want to delete your account? This action cannot be undone.');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="bx bx-trash"></i> Delete Account</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
