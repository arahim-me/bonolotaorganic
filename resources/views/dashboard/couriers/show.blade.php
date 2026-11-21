@extends('layouts.dashboard')
@section('title', $title ?? 'Courier Details.')
@section('content')

    <div class="container-fluid py-3">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>
                <h4 class="mb-1">{{ $courier->name }}</h4>
                <p class="text-muted mb-0">{{ $title ?? 'Courier Details.' }}</p>
            </div>

            <div class="d-flex gap-2">
                <a href="{{ route('dashboard.couriers.index') }}" class="btn btn-secondary btn-sm">
                    Back
                </a>

                <a href="{{ route('dashboard.couriers.edit', $courier) }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-edit"></i> Edit
                </a>
            </div>

        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="row g-3">

            <div class="col-lg-6">

                <div class="card shadow-sm h-100">

                    <div class="card-header bg-white">
                        <h6 class="mb-0">General Information</h6>
                    </div>

                    <div class="card-body">

                        <table class="table table-borderless">

                            <tr>
                                <th width="40%">Courier Name</th>
                                <td>{{ $courier->name }}</td>
                            </tr>

                            <tr>
                                <th>Slug</th>
                                <td>{{ $courier->slug }}</td>
                            </tr>

                            <tr>
                                <th>Base URL</th>
                                <td class="text-break">{{ $courier->base_url ?? 'N/A' }}</td>
                            </tr>

                            <tr>
                                <th>Store ID</th>
                                <td>{{ $courier->store_id ?? 'N/A' }}</td>
                            </tr>

                            <tr>
                                <th>Status</th>
                                <td>
                                    <span class="badge {{ $courier->is_active ? 'bg-success' : 'bg-danger' }}">
                                        {{ $courier->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                            </tr>

                            <tr>
                                <th>Description</th>
                                <td>{{ $courier->description ?? 'N/A' }}</td>
                            </tr>

                            <tr>
                                <th>Created At</th>
                                <td>{{ $courier->created_at->format('d M Y, h:i A') }}</td>
                            </tr>

                        </table>

                    </div>
                </div>

            </div>

            <div class="col-lg-6">

                <div class="card shadow-sm h-100">

                    <div class="card-header bg-white">
                        <h6 class="mb-0">API Credentials</h6>
                    </div>

                    <div class="card-body">

                        @foreach ([
            'api_key' => 'API Key',
            'secret_key' => 'Secret Key',
            'client_id' => 'Client ID',
            'client_secret' => 'Client Secret',
        ] as $field => $label)
                            <div class="mb-3">
                                <label class="form-label fw-semibold">
                                    {{ $label }}
                                </label>

                                <input type="password" class="form-control" value="{{ $courier->$field }}" readonly>
                            </div>
                        @endforeach

                        <div class="alert alert-warning mb-0">
                            <i class="fas fa-shield-alt me-1"></i>
                            Keep your API credentials confidential.
                        </div>

                    </div>
                </div>

            </div>

        </div>

    </div>

@endsection
