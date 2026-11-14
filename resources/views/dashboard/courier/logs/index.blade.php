@extends('layouts.dashboard')

@section('title', 'Courier Settings')

@section('content')

    <div class="container-fluid py-3">

        <div class="mb-4">
            <h4 class="mb-1">Courier Settings</h4>
            <p class="text-muted mb-0">
                Manage Pathao, Steadfast and RedX API credentials.
            </p>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @php
            $fields = [
                'pathao' => [
                    'client_id' => 'Client ID',
                    'client_secret' => 'Client Secret',
                    'username' => 'Username',
                    'password' => 'Password',
                    'store_id' => 'Store ID',
                ],
                'steadfast' => [
                    'api_key' => 'API Key',
                    'secret_key' => 'Secret Key',
                ],
                'redx' => [
                    'access_token' => 'Access Token',
                ],
            ];
        @endphp

        @foreach ($fields as $courier => $courierFields)
            @php
                $setting = $settings->get($courier);
            @endphp

            <div class="card mb-4 shadow-sm">

                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="mb-0">{{ $setting->name }}</h5>
                        <small class="text-muted">
                            Connection:
                            {{ ucfirst($setting->connection_status) }}
                        </small>
                    </div>

                    <span class="badge {{ $setting->is_active ? 'bg-success' : 'bg-secondary' }}">
                        {{ $setting->is_active ? 'Active' : 'Inactive' }}
                    </span>
                </div>

                <div class="card-body">

                    <form action="{{ route('dashboard.courier.settings.update', $courier) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">API Base URL</label>

                            <input type="url" name="base_url" class="form-control"
                                value="{{ old('base_url', $setting->base_url) }}" required>
                        </div>

                        @foreach ($courierFields as $field => $label)
                            <div class="mb-3">
                                <label class="form-label">{{ $label }}</label>

                                <input type="password" name="{{ $field }}" class="form-control"
                                    autocomplete="new-password" placeholder="Leave blank to keep existing value">

                                <small class="text-muted">
                                    Leave blank to keep the saved credential.
                                </small>
                            </div>
                        @endforeach

                        <div class="form-check form-switch mb-3">
                            <input type="checkbox" class="form-check-input" name="is_active" value="1"
                                id="active_{{ $courier }}" {{ $setting->is_active ? 'checked' : '' }}>

                            <label class="form-check-label" for="active_{{ $courier }}">
                                Enable {{ $setting->name }}
                            </label>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            <i class="bx bx-save"></i>
                            Save Settings
                        </button>

                        <div class="mt-3">
                            <small class="text-muted">
                                Last tested:
                                {{ $setting->last_tested_at?->format('d M Y h:i A') ?? 'Never' }}
                            </small>
                        </div>

                        @if ($setting->last_error)
                            <div class="alert alert-warning mt-3 mb-0">
                                {{ $setting->last_error }}
                            </div>
                        @endif

                    </form>

                </div>
            </div>
        @endforeach

    </div>

@endsection
