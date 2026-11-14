@extends('layouts.dashboard')

@section('title', 'Courier API Settings')

@section('content')
    <div class="container-fluid py-3">

        <div class="mb-4">
            <h4 class="mb-1">Courier API Settings</h4>
            <p class="text-muted mb-0">
                Manage your courier API credentials and connection status.
            </p>
        </div>

        {{-- Success Message --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- Error Message --}}
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- Validation Errors --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Please check the following errors:</strong>
                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row g-4">

            @foreach ($couriers as $key => $courier)
                @php
                    $setting = $settings->get($key);

                    $statusClass = match ($setting->connection_status) {
                        'connected' => 'success',
                        'failed' => 'danger',
                        default => 'secondary',
                    };

                    $statusText = match ($setting->connection_status) {
                        'connected' => 'Connected',
                        'failed' => 'Failed',
                        default => 'Untested',
                    };
                @endphp

                <div class="col-12 col-xl-6">

                    <div class="card shadow-sm h-100">

                        {{-- Card Header --}}
                        <div class="card-header bg-white py-3">
                            <div class="d-flex justify-content-between align-items-center">

                                <div>
                                    <h5 class="mb-1">
                                        {{ $courier['name'] }}
                                    </h5>

                                    <small class="text-muted">
                                        Courier API Configuration
                                    </small>
                                </div>

                                <span class="badge bg-{{ $statusClass }}">
                                    {{ $statusText }}
                                </span>

                            </div>
                        </div>

                        <div class="card-body">

                            {{-- Connection Information --}}
                            <div class="row mb-3">

                                <div class="col-6">
                                    <small class="text-muted d-block">
                                        Account Status
                                    </small>

                                    @if ($setting->is_active)
                                        <span class="badge bg-success">
                                            Active
                                        </span>
                                    @else
                                        <span class="badge bg-secondary">
                                            Inactive
                                        </span>
                                    @endif
                                </div>

                                <div class="col-6">
                                    <small class="text-muted d-block">
                                        Last Tested
                                    </small>

                                    <span>
                                        {{ $setting->last_tested_at ? $setting->last_tested_at->format('d M Y, h:i A') : 'Not tested yet' }}
                                    </span>
                                </div>

                            </div>

                            <hr>

                            {{-- Settings Form --}}
                            <form action="{{ route('dashboard.courier.settings.update', $key) }}" method="POST">
                                @csrf
                                @method('PUT')

                                {{-- Base URL --}}
                                <div class="mb-3">
                                    <label class="form-label">
                                        API Base URL
                                    </label>

                                    <input type="url" name="base_url" class="form-control"
                                        value="{{ old('base_url', $setting->base_url) }}" required>
                                </div>

                                {{-- Pathao Fields --}}
                                @if ($key === 'pathao')
                                    <div class="mb-3">
                                        <label class="form-label">
                                            Client ID
                                        </label>

                                        <input type="text" name="client_id" class="form-control"
                                            placeholder="Enter Pathao Client ID">

                                        <small class="text-muted">
                                            Leave blank to keep the saved value.
                                        </small>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">
                                            Client Secret
                                        </label>

                                        <input type="password" name="client_secret" class="form-control"
                                            placeholder="Enter Client Secret" autocomplete="new-password">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">
                                            Username / Email
                                        </label>

                                        <input type="text" name="username" class="form-control"
                                            placeholder="Enter Pathao Username">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">
                                            Password
                                        </label>

                                        <input type="password" name="password" class="form-control"
                                            placeholder="Enter Pathao Password" autocomplete="new-password">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">
                                            Store ID
                                        </label>

                                        <input type="text" name="store_id" class="form-control"
                                            value="{{ old('store_id', $setting->store_id) }}" placeholder="Enter Store ID">
                                    </div>
                                @endif

                                {{-- Steadfast Fields --}}
                                @if ($key === 'steadfast')
                                    <div class="mb-3">
                                        <label class="form-label">
                                            API Key
                                        </label>

                                        <input type="password" name="api_key" class="form-control"
                                            placeholder="Enter Steadfast API Key" autocomplete="new-password">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">
                                            Secret Key
                                        </label>

                                        <input type="password" name="secret_key" class="form-control"
                                            placeholder="Enter Steadfast Secret Key" autocomplete="new-password">
                                    </div>
                                @endif

                                {{-- RedX Fields --}}
                                @if ($key === 'redx')
                                    <div class="mb-3">
                                        <label class="form-label">
                                            API Access Token
                                        </label>

                                        <input type="password" name="api_key" class="form-control"
                                            placeholder="Enter RedX API Access Token" autocomplete="new-password">
                                    </div>
                                @endif

                                <hr>

                                {{-- Active / Inactive --}}
                                <div class="form-check form-switch mb-3">

                                    <input class="form-check-input" type="checkbox" name="is_active" value="1"
                                        id="active_{{ $key }}" @checked($setting->is_active)>

                                    <label class="form-check-label" for="active_{{ $key }}">
                                        Enable {{ $courier['name'] }}
                                    </label>

                                </div>

                                <button type="submit" class="btn btn-primary">
                                    <i class="bx bx-save me-1"></i>
                                    Save Settings
                                </button>

                            </form>

                            {{-- Test Connection Form --}}
                            <div class="mt-3">

                                <form action="{{ route('dashboard.courier.settings.test', $key) }}" method="POST">
                                    @csrf

                                    <button type="submit" class="btn btn-outline-success w-100">
                                        <i class="bx bx-plug me-1"></i>
                                        Test {{ $courier['name'] }} Connection
                                    </button>

                                </form>

                                <small class="text-muted d-block mt-2">
                                    Connection testing works independently of
                                    the Active / Inactive setting.
                                </small>

                            </div>

                            {{-- Last Error --}}
                            @if ($setting->connection_status === 'failed' && $setting->last_error)
                                <div class="alert alert-danger mt-3 mb-0">
                                    <strong>Connection Error:</strong>
                                    <div class="mt-1">
                                        {{ $setting->last_error }}
                                    </div>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection
