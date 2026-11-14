@extends('layouts.dashboard')

@section('title', 'Courier API Settings')

@section('content')

    @php
        $statusConfig = [
            'connected' => [
                'class' => 'bg-success',
                'icon' => 'fa-check-circle',
                'label' => 'Connected',
            ],
            'failed' => [
                'class' => 'bg-danger',
                'icon' => 'fa-times-circle',
                'label' => 'Failed',
            ],
            'untested' => [
                'class' => 'bg-secondary',
                'icon' => 'fa-clock',
                'label' => 'Untested',
            ],
        ];

        $pathaoStatus = $statusConfig[$pathao->connection_status ?? 'untested'] ?? $statusConfig['untested'];

        $steadfastStatus = $statusConfig[$steadfast->connection_status ?? 'untested'] ?? $statusConfig['untested'];

        $pathaoReady =
            filled($pathao->client_id) &&
            filled($pathao->client_secret) &&
            filled($pathao->username) &&
            filled($pathao->password);

        $steadfastReady = filled($steadfast->api_key) && filled($steadfast->secret_key);
    @endphp

    <div class="container-fluid py-4">

        {{-- PAGE HEADER --}}
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
            <div>
                <h4 class="fw-bold mb-1">
                    <i class="fas fa-truck text-primary me-2"></i>
                    Courier API Settings
                </h4>
                <p class="text-muted mb-0">
                    Manage courier services, API credentials and connections.
                </p>
            </div>
        </div>

        {{-- SUCCESS MESSAGE --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                <i class="fas fa-check-circle me-2"></i>
                {{ session('success') }}

                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- ERROR MESSAGE --}}
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show">
                <i class="fas fa-exclamation-circle me-2"></i>
                {{ session('error') }}

                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- VALIDATION ERRORS --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Please fix the following errors:</strong>

                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- INFORMATION --}}
        <div class="alert alert-info border-0 shadow-sm">
            <i class="fas fa-info-circle me-2"></i>
            Save your API credentials before testing the connection.
            Connection testing is available even when a courier is disabled.
        </div>

        <div class="row g-4">

            {{-- ================================================= --}}
            {{-- PATHAO COURIER --}}
            {{-- ================================================= --}}

            <div class="col-12 col-xl-6">

                <div class="card border-0 shadow-sm h-100">

                    {{-- CARD HEADER --}}
                    <div class="card-header bg-white py-3">
                        <div class="d-flex justify-content-between align-items-center">

                            <div class="d-flex align-items-center gap-3">
                                <div class="courier-icon bg-warning-subtle text-warning">
                                    <i class="fas fa-shipping-fast"></i>
                                </div>

                                <div>
                                    <h5 class="fw-bold mb-0">Pathao Courier</h5>
                                    <small class="text-muted">
                                        Pathao API Integration
                                    </small>
                                </div>
                            </div>

                            <span class="badge {{ $pathao->is_active ? 'bg-success' : 'bg-secondary' }}">
                                {{ $pathao->is_active ? 'Enabled' : 'Disabled' }}
                            </span>

                        </div>
                    </div>

                    <div class="card-body p-4">

                        {{-- CONNECTION STATUS --}}
                        <div class="connection-box mb-4">

                            <div>
                                <small class="text-muted d-block mb-2">
                                    API Connection Status
                                </small>

                                <span class="badge {{ $pathaoStatus['class'] }} px-3 py-2">
                                    <i class="fas {{ $pathaoStatus['icon'] }} me-1"></i>
                                    {{ $pathaoStatus['label'] }}
                                </span>
                            </div>

                            <div class="text-end">
                                <small class="text-muted d-block mb-2">
                                    Last Tested
                                </small>

                                <strong class="small">
                                    {{ $pathao->last_tested_at ? $pathao->last_tested_at->format('d M Y, h:i A') : 'Never tested' }}
                                </strong>
                            </div>

                        </div>

                        {{-- PATHAO SETTINGS FORM --}}
                        <form action="{{ route('dashboard.courier-settings.update', 'pathao') }}" method="POST">

                            @csrf
                            @method('PUT')

                            <h6 class="fw-bold mb-3">
                                <i class="fas fa-cog text-primary me-2"></i>
                                API Configuration
                            </h6>

                            {{-- BASE URL --}}
                            <div class="mb-3">
                                <label class="form-label fw-semibold">
                                    API Base URL
                                </label>

                                <input type="url" name="base_url" class="form-control"
                                    value="{{ old('base_url', $pathao->base_url) }}" placeholder="Enter API Base URL"
                                    required>
                            </div>

                            {{-- CLIENT ID --}}
                            <div class="mb-3">
                                <label class="form-label fw-semibold">
                                    Client ID
                                </label>

                                <input type="password" name="client_id" class="form-control" autocomplete="new-password"
                                    placeholder="{{ filled($pathao->client_id) ? 'Saved - leave blank to keep current' : 'Enter Client ID' }}">
                            </div>

                            {{-- CLIENT SECRET --}}
                            <div class="mb-3">
                                <label class="form-label fw-semibold">
                                    Client Secret
                                </label>

                                <input type="password" name="client_secret" class="form-control" autocomplete="new-password"
                                    placeholder="{{ filled($pathao->client_secret) ? 'Saved - leave blank to keep current' : 'Enter Client Secret' }}">
                            </div>

                            {{-- USERNAME --}}
                            <div class="mb-3">
                                <label class="form-label fw-semibold">
                                    Merchant Username / Email
                                </label>

                                <input type="text" name="username" class="form-control" autocomplete="off"
                                    placeholder="{{ filled($pathao->username) ? 'Saved - leave blank to keep current' : 'Enter Merchant Username' }}">
                            </div>

                            {{-- PASSWORD --}}
                            <div class="mb-3">
                                <label class="form-label fw-semibold">
                                    Merchant Password
                                </label>

                                <input type="password" name="password" class="form-control" autocomplete="new-password"
                                    placeholder="{{ filled($pathao->password) ? 'Saved - leave blank to keep current' : 'Enter Merchant Password' }}">
                            </div>

                            {{-- STORE ID --}}
                            <div class="mb-3">
                                <label class="form-label fw-semibold">
                                    Store ID
                                </label>

                                <input type="text" name="store_id" class="form-control"
                                    value="{{ old('store_id', $pathao->store_id) }}" placeholder="Enter Pathao Store ID">
                            </div>

                            {{-- ENABLE / DISABLE --}}
                            <div class="form-check form-switch mb-4">

                                <input class="form-check-input" type="checkbox" name="is_active" value="1"
                                    id="pathao_active" @checked($pathao->is_active)>

                                <label class="form-check-label fw-semibold" for="pathao_active">
                                    Enable Pathao Courier
                                </label>

                            </div>

                            {{-- SAVE BUTTON --}}
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="fas fa-save me-2"></i>
                                Save Pathao Settings
                            </button>

                        </form>

                        <hr class="my-4">

                        {{-- PATHAO TEST CONNECTION --}}
                        <div class="d-flex justify-content-between align-items-center mb-3">

                            <div>
                                <h6 class="fw-bold mb-1">
                                    Test API Connection
                                </h6>

                                <small class="text-muted">
                                    Verify your Pathao API credentials.
                                </small>
                            </div>

                            <i class="fas fa-plug text-primary fs-4"></i>

                        </div>

                        {{-- BUTTON ALWAYS VISIBLE --}}
                        <form action="{{ route('dashboard.courier-settings.test', 'pathao') }}" method="POST"
                            class="connection-test-form">

                            @csrf

                            <button type="submit" class="btn btn-outline-success w-100">

                                <i class="fas fa-plug me-2"></i>
                                Test Pathao Connection

                            </button>

                        </form>

                        {{-- CREDENTIAL STATUS --}}
                        @unless ($pathaoReady)
                            <div class="alert alert-warning mt-3 mb-0 small">
                                <i class="fas fa-exclamation-triangle me-1"></i>

                                Some Pathao credentials are missing.
                                Save all required credentials before testing.
                            </div>
                        @endunless

                        {{-- LAST TESTED --}}
                        <div class="mt-3">
                            <small class="text-muted">
                                Last Tested:
                            </small>

                            <strong class="small">
                                {{ $pathao->last_tested_at ? $pathao->last_tested_at->format('d M Y, h:i A') : 'Never tested' }}
                            </strong>
                        </div>

                        {{-- PATHAO ERROR --}}
                        @if ($pathao->last_error)
                            <div class="alert alert-danger mt-3 mb-0">

                                <strong>
                                    <i class="fas fa-exclamation-circle me-1"></i>
                                    Connection Error
                                </strong>

                                <p class="small mb-0 mt-2">
                                    {{ $pathao->last_error }}
                                </p>

                            </div>
                        @endif

                    </div>
                </div>
            </div>


            {{-- ================================================= --}}
            {{-- STEADFAST COURIER --}}
            {{-- ================================================= --}}

            <div class="col-12 col-xl-6">

                <div class="card border-0 shadow-sm h-100">

                    {{-- CARD HEADER --}}
                    <div class="card-header bg-white py-3">

                        <div class="d-flex justify-content-between align-items-center">

                            <div class="d-flex align-items-center gap-3">

                                <div class="courier-icon bg-primary-subtle text-primary">
                                    <i class="fas fa-shipping-fast"></i>
                                </div>

                                <div>
                                    <h5 class="fw-bold mb-0">
                                        Steadfast Courier
                                    </h5>

                                    <small class="text-muted">
                                        Steadfast API Integration
                                    </small>
                                </div>

                            </div>

                            <span class="badge {{ $steadfast->is_active ? 'bg-success' : 'bg-secondary' }}">
                                {{ $steadfast->is_active ? 'Enabled' : 'Disabled' }}
                            </span>

                        </div>
                    </div>

                    <div class="card-body p-4">

                        {{-- CONNECTION STATUS --}}
                        <div class="connection-box mb-4">

                            <div>
                                <small class="text-muted d-block mb-2">
                                    API Connection Status
                                </small>

                                <span class="badge {{ $steadfastStatus['class'] }} px-3 py-2">
                                    <i class="fas {{ $steadfastStatus['icon'] }} me-1"></i>
                                    {{ $steadfastStatus['label'] }}
                                </span>
                            </div>

                            <div class="text-end">
                                <small class="text-muted d-block mb-2">
                                    Last Tested
                                </small>

                                <strong class="small">
                                    {{ $steadfast->last_tested_at ? $steadfast->last_tested_at->format('d M Y, h:i A') : 'Never tested' }}
                                </strong>
                            </div>

                        </div>

                        {{-- STEADFAST SETTINGS FORM --}}
                        <form action="{{ route('dashboard.courier-settings.update', 'steadfast') }}" method="POST">

                            @csrf
                            @method('PUT')

                            <h6 class="fw-bold mb-3">
                                <i class="fas fa-cog text-primary me-2"></i>
                                API Configuration
                            </h6>

                            {{-- BASE URL --}}
                            <div class="mb-3">
                                <label class="form-label fw-semibold">
                                    API Base URL
                                </label>

                                <input type="url" name="base_url" class="form-control"
                                    value="{{ old('base_url', $steadfast->base_url) }}" placeholder="Enter API Base URL"
                                    required>
                            </div>

                            {{-- API KEY --}}
                            <div class="mb-3">
                                <label class="form-label fw-semibold">
                                    API Key
                                </label>

                                <input type="password" name="api_key" class="form-control" autocomplete="new-password"
                                    placeholder="{{ filled($steadfast->api_key) ? 'Saved - leave blank to keep current' : 'Enter API Key' }}">
                            </div>

                            {{-- SECRET KEY --}}
                            <div class="mb-3">
                                <label class="form-label fw-semibold">
                                    Secret Key
                                </label>

                                <input type="password" name="secret_key" class="form-control"
                                    autocomplete="new-password"
                                    placeholder="{{ filled($steadfast->secret_key) ? 'Saved - leave blank to keep current' : 'Enter Secret Key' }}">
                            </div>

                            {{-- ENABLE / DISABLE --}}
                            <div class="form-check form-switch mb-4">

                                <input class="form-check-input" type="checkbox" name="is_active" value="1"
                                    id="steadfast_active" @checked($steadfast->is_active)>

                                <label class="form-check-label fw-semibold" for="steadfast_active">
                                    Enable Steadfast Courier
                                </label>

                            </div>

                            {{-- SAVE BUTTON --}}
                            <button type="submit" class="btn btn-primary w-100">

                                <i class="fas fa-save me-2"></i>
                                Save Steadfast Settings

                            </button>

                        </form>

                        <hr class="my-4">

                        {{-- STEADFAST TEST CONNECTION --}}
                        <div class="d-flex justify-content-between align-items-center mb-3">

                            <div>
                                <h6 class="fw-bold mb-1">
                                    Test API Connection
                                </h6>

                                <small class="text-muted">
                                    Verify your Steadfast API credentials.
                                </small>
                            </div>

                            <i class="fas fa-plug text-primary fs-4"></i>

                        </div>

                        {{-- BUTTON ALWAYS VISIBLE --}}
                        <form action="{{ route('dashboard.courier-settings.test', 'steadfast') }}" method="POST"
                            class="connection-test-form">

                            @csrf

                            <button type="submit" class="btn btn-outline-success w-100">

                                <i class="fas fa-plug me-2"></i>
                                Test Steadfast Connection

                            </button>

                        </form>

                        {{-- CREDENTIAL STATUS --}}
                        @unless ($steadfastReady)
                            <div class="alert alert-warning mt-3 mb-0 small">
                                <i class="fas fa-exclamation-triangle me-1"></i>

                                Steadfast API Key or Secret Key is missing.
                                Save your credentials before testing.
                            </div>
                        @endunless

                        {{-- LAST TESTED --}}
                        <div class="mt-3">
                            <small class="text-muted">
                                Last Tested:
                            </small>

                            <strong class="small">
                                {{ $steadfast->last_tested_at ? $steadfast->last_tested_at->format('d M Y, h:i A') : 'Never tested' }}
                            </strong>
                        </div>

                        {{-- STEADFAST ERROR --}}
                        @if ($steadfast->last_error)
                            <div class="alert alert-danger mt-3 mb-0">

                                <strong>
                                    <i class="fas fa-exclamation-circle me-1"></i>
                                    Connection Error
                                </strong>

                                <p class="small mb-0 mt-2">
                                    {{ $steadfast->last_error }}
                                </p>

                            </div>
                        @endif

                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection


{{-- ================================================= --}}
{{-- CUSTOM CSS --}}
{{-- ================================================= --}}

@push('styles')
    <style>
        .courier-icon {
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            font-size: 21px;
            flex-shrink: 0;
        }

        .connection-box {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            padding: 15px;
            border: 1px solid #e9ecef;
            border-radius: 10px;
            background: #f8f9fa;
        }

        .card {
            border-radius: 12px;
            overflow: hidden;
        }

        .card-header {
            border-bottom: 1px solid #eee;
        }

        .form-control {
            min-height: 43px;
        }

        .form-label {
            font-size: 14px;
        }

        .form-check-input {
            cursor: pointer;
        }

        .connection-test-form button {
            min-height: 44px;
        }

        @media(max-width: 576px) {
            .connection-box {
                align-items: flex-start;
                flex-direction: column;
            }

            .connection-box .text-end {
                text-align: left !important;
            }
        }
    </style>
@endpush


{{-- ================================================= --}}
{{-- JAVASCRIPT --}}
{{-- ================================================= --}}

@push('scripts')
    <script>
        document.querySelectorAll('.connection-test-form').forEach(form => {

            form.addEventListener('submit', function() {

                const button = this.querySelector('button[type="submit"]');

                if (!button || button.disabled) {
                    return;
                }

                button.disabled = true;

                button.innerHTML = `
                <span class="spinner-border spinner-border-sm me-2"></span>
                Testing Connection...
            `;

            });

        });
    </script>
@endpush
