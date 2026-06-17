@extends('layouts.dashboard')

@section('title', 'Dashboard | Home')

@section('content')
    <div class="py-3 py-lg-4">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h4 class="page-title mb-0">Dashboard</h4>
            </div>
            <div class="col-sm-6">
                <div class="float-end d-none d-sm-block">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <a href="{{ route('users.index') }}">
                    <div class="card-body">
                        <h6 class="text-uppercase text-muted mb-3">Total Users</h6>
                        <h3 class="mb-2">{{ $users->count() }}</h3>
                        <p class="text-muted mb-0">Users registered this month</p>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <a href="{{ route('categories.index') }}">
                    <div class="card-body">
                        <h6 class="text-uppercase text-muted mb-3">Categories</h6>
                        <h3 class="mb-2">{{ $categories->count() }}</h3>
                        <p class="text-muted mb-0">Total categories in the system</p>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <a href="{{ route('orders.index') }}">
                    <div class="card-body">
                        <h6 class="text-uppercase text-muted mb-3">Orders</h6>
                        <h3 class="mb-2">{{ $orders->count() }}</h3>
                        <p class="text-muted mb-0">Orders received today</p>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <a href="{{ route('products.index') }}">
                    <div class="card-body">
                        <h6 class="text-uppercase text-muted mb-3">Products</h6>
                        <h3 class="mb-2">{{ $products->count() }}</h3>
                        <p class="text-muted mb-0">Total products in the system</p>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-8">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div>
                            <h4 class="card-title mb-1">Welcome back, {{ auth()->user()->name ?? 'User' }}</h4>
                            <p class="text-muted mb-0">Here is a quick summary of your dashboard activity.</p>
                        </div>
                    </div>
                    <div class="row gy-3">
                        <div class="col-md-4">
                            <div class="p-3 bg-light rounded">
                                <span class="badge bg-success mb-2">Growth</span>
                                <h5 class="mb-1">+24.5%</h5>
                                <p class="text-muted mb-0">Compared to last week</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-3 bg-light rounded">
                                <span class="badge bg-primary mb-2">New</span>
                                <h5 class="mb-1">56</h5>
                                <p class="text-muted mb-0">New customers today</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-3 bg-light rounded">
                                <span class="badge bg-warning mb-2">Pending</span>
                                <h5 class="mb-1">12</h5>
                                <p class="text-muted mb-0">Pending tasks</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-3">Shortcuts</h4>
                    <div class="list-group list-group-flush">
                        <a href="{{ route('profile.edit') }}" class="list-group-item list-group-item-action">Edit
                            Profile</a>
                        <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action">Dashboard Home</a>
                        <a href="{{ route('profile.edit') }}" class="list-group-item list-group-item-action">Account
                            Settings</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
