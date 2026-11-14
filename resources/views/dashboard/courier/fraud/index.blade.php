@extends('layouts.dashboard')

@section('title', 'Courier Fraud Checker')

@section('content')
    <div class="container-fluid py-3">

        {{-- Page Header --}}
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
            <div>
                <h4 class="mb-1">Courier Fraud Checker</h4>
                <p class="text-muted mb-0">
                    Check customer delivery history using available courier information.
                </p>
            </div>

            <a href="{{ route('dashboard.courier.fraud-check.index') }}" class="btn btn-outline-secondary">
                <i class="bx bx-refresh me-1"></i> Refresh
            </a>
        </div>

        {{-- Success Message --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- Validation Errors --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Please correct the following errors:</strong>
                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row g-4">

            {{-- Fraud Check Form --}}
            <div class="col-lg-7">
                <div class="card shadow-sm h-100">
                    <div class="card-header bg-white py-3">
                        <h5 class="mb-0">
                            <i class="bx bx-shield-quarter me-2"></i>
                            Customer Fraud Check
                        </h5>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('dashboard.courier.fraud-check.check') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="phone" class="form-label fw-semibold">
                                    Customer Mobile Number
                                    <span class="text-danger">*</span>
                                </label>

                                <div class="input-group input-group-lg">
                                    <span class="input-group-text">
                                        <i class="bx bx-phone"></i>
                                    </span>

                                    <input type="tel" name="phone" id="phone"
                                        class="form-control @error('phone') is-invalid @enderror"
                                        value="{{ old('phone') }}" placeholder="01XXXXXXXXX" maxlength="14" required>
                                </div>

                                @error('phone')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror

                                <small class="text-muted">
                                    Example: 01712345678 or +8801712345678
                                </small>
                            </div>

                            <div class="alert alert-info d-flex align-items-start">
                                <i class="bx bx-info-circle fs-4 me-2"></i>
                                <div>
                                    <strong>Note:</strong>
                                    Fraud check results are indicators only.
                                    Verify customer information before making a final decision.
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg w-100">
                                <i class="bx bx-search-alt me-1"></i>
                                Check Customer History
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            {{-- Courier Connection Status --}}
            <div class="col-lg-5">
                <div class="card shadow-sm h-100">
                    <div class="card-header bg-white py-3">
                        <h5 class="mb-0">
                            <i class="bx bx-package me-2"></i>
                            Courier Connections
                        </h5>
                    </div>

                    <div class="card-body">

                        @php
                            $courierList = [
                                'pathao' => 'Pathao',
                                'steadfast' => 'Steadfast',
                                'redx' => 'RedX',
                            ];
                        @endphp

                        @foreach ($courierList as $key => $name)
                            @php
                                $setting = $settings->get($key);
                                $connection = $setting?->connection_status ?? 'untested';
                                $isActive = $setting?->is_active ?? false;
                            @endphp

                            <div class="d-flex justify-content-between align-items-center border rounded p-3 mb-3">
                                <div>
                                    <h6 class="mb-1">{{ $name }}</h6>

                                    <small class="text-muted">
                                        Connection:
                                        {{ ucfirst($connection) }}
                                    </small>
                                </div>

                                <div class="text-end">
                                    <span class="badge {{ $isActive ? 'bg-success' : 'bg-secondary' }}">
                                        {{ $isActive ? 'Active' : 'Inactive' }}
                                    </span>
                                </div>
                            </div>
                        @endforeach

                        <a href="{{ route('dashboard.courier.settings.index') }}" class="btn btn-outline-primary w-100">
                            <i class="bx bx-cog me-1"></i>
                            Manage Courier Settings
                        </a>

                    </div>
                </div>
            </div>

        </div>

        {{-- Information --}}
        <div class="card shadow-sm mt-4">
            <div class="card-body">
                <h6 class="fw-semibold">
                    <i class="bx bx-shield-alt-2 me-2"></i>
                    How Fraud Checking Works
                </h6>

                <ul class="text-muted mb-0">
                    <li>Checks matching orders from your own store history.</li>
                    <li>Uses courier information only when the required API is configured and available.</li>
                    <li>Shows available results for review by authorized administrators.</li>
                    <li>A high-risk result is not proof of fraud.</li>
                </ul>
            </div>
        </div>

    </div>
@endsection
