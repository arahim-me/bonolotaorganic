@extends('layouts.dashboard')

@section('title', 'Fraud Check Result')

@section('content')
    <div class="container-fluid py-3">

        {{-- Header --}}
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
            <div>
                <h4 class="mb-1">Fraud Check Result</h4>
                <p class="text-muted mb-0">Customer delivery history report</p>
            </div>

            <a href="{{ route('dashboard.courier.fraud-check.index') }}" class="btn btn-outline-primary">
                <i class="bx bx-arrow-back me-1"></i>
                New Fraud Check
            </a>
        </div>

        @php
            $resultData = is_array($result)
                ? $result
                : (is_object($result) && method_exists($result, 'toArray')
                    ? $result->toArray()
                    : (array) $result);

            $riskLevel = data_get($resultData, 'risk_level') ?? (data_get($resultData, 'risk') ?? 'unknown');

            $riskLevel = strtolower((string) $riskLevel);

            $riskColors = [
                'low' => 'success',
                'medium' => 'warning',
                'high' => 'danger',
                'unknown' => 'secondary',
            ];

            $riskColor = $riskColors[$riskLevel] ?? 'secondary';

            $riskScore = data_get($resultData, 'risk_score') ?? data_get($resultData, 'score');

            $summary = data_get($resultData, 'summary') ?? data_get($resultData, 'message');
        @endphp

        {{-- Customer Information --}}
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0">
                    <i class="bx bx-user me-2"></i>
                    Customer Information
                </h5>
            </div>

            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <small class="text-muted d-block">Mobile Number</small>
                        <h5 class="mb-0">{{ $phone ?? 'N/A' }}</h5>
                    </div>

                    <div class="col-md-3">
                        <small class="text-muted d-block">Risk Level</small>
                        <span class="badge bg-{{ $riskColor }} fs-6">
                            {{ strtoupper($riskLevel) }}
                        </span>
                    </div>

                    <div class="col-md-3">
                        <small class="text-muted d-block">Risk Score</small>
                        <h5 class="mb-0">
                            {{ $riskScore !== null ? $riskScore : 'N/A' }}
                        </h5>
                    </div>
                </div>

                @if ($summary)
                    <div class="alert alert-light border mt-3 mb-0">
                        <strong>Summary:</strong>
                        {{ is_scalar($summary) ? $summary : json_encode($summary) }}
                    </div>
                @endif
            </div>
        </div>

        {{-- Provider Results --}}
        <div class="row g-3 mb-4">

            @php
                $providers = [
                    'own_orders' => 'Own Store History',
                    'pathao' => 'Pathao',
                    'steadfast' => 'Steadfast',
                    'redx' => 'RedX',
                ];
            @endphp

            @foreach ($providers as $key => $title)
                @if (array_key_exists($key, $resultData))
                    @php
                        $providerResult = $resultData[$key];

                        $providerArray = is_array($providerResult)
                            ? $providerResult
                            : (is_object($providerResult) && method_exists($providerResult, 'toArray')
                                ? $providerResult->toArray()
                                : (is_object($providerResult)
                                    ? (array) $providerResult
                                    : ['result' => $providerResult]));
                    @endphp

                    <div class="col-md-6">
                        <div class="card shadow-sm h-100">
                            <div class="card-header bg-white">
                                <h6 class="mb-0">{{ $title }}</h6>
                            </div>

                            <div class="card-body">
                                @forelse($providerArray as $field => $value)
                                    <div class="d-flex justify-content-between border-bottom py-2 gap-3">
                                        <span class="text-muted">
                                            {{ ucwords(str_replace(['_', '-'], ' ', $field)) }}
                                        </span>

                                        <span class="text-end fw-semibold">
                                            @if (is_bool($value))
                                                {{ $value ? 'Yes' : 'No' }}
                                            @elseif(is_array($value) || is_object($value))
                                                <code>{{ json_encode($value, JSON_UNESCAPED_UNICODE) }}</code>
                                            @elseif($value === null || $value === '')
                                                N/A
                                            @else
                                                {{ $value }}
                                            @endif
                                        </span>
                                    </div>
                                @empty
                                    <p class="text-muted mb-0">No data available.</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach

        </div>

        {{-- Complete Result --}}
        <div class="card shadow-sm">
            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0">
                    <i class="bx bx-code-alt me-2"></i>
                    Complete API Response
                </h5>
            </div>

            <div class="card-body">
                @if (count($resultData))
                    <pre class="bg-light border rounded p-3 mb-0" style="white-space: pre-wrap; overflow-wrap: anywhere;">{{ json_encode($resultData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) }}</pre>
                @else
                    <div class="alert alert-warning mb-0">
                        No result data was returned.
                    </div>
                @endif
            </div>
        </div>

        {{-- Disclaimer --}}
        <div class="alert alert-warning mt-4">
            <i class="bx bx-info-circle me-1"></i>
            Fraud scores and delivery history are indicators, not proof of fraudulent activity.
            Review the available information before taking action.
        </div>

    </div>
@endsection
