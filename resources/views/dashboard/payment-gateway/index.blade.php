@extends('layouts.dashboard')

@section('title', 'Payment Gateway Settings')

@section('content')
    <div class="py-3 py-lg-4">
        <div class="row">
            <div class="col-12">
                <h4 class="page-title">Payment Gateway Settings</h4>
            </div>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        <div class="col-lg-8">
            <div class="row">
                @if ($methods)
                    @foreach ($gateways as $method)
                        <div class="col-md-12">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <form method="POST" action="{{ route('payment-gateways.edit', $method->id) }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="provider" value="{{ $method->provider }}">

                                        <div class="mb-3">
                                            <label class="form-label">Merchant ID</label>
                                            <input type="text" name="merchant_id" class="form-control"
                                                value="{{ old('merchant_id', $method->merchant_id ?? '') }}">
                                            @error('merchant_id')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Merchant Number</label>
                                            <input type="text" name="merchant_number" class="form-control"
                                                value="{{ old('merchant_number', $method->merchant_number ?? '') }}">
                                            @error('merchant_number')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Merchant Name</label>
                                            <input type="text" name="merchant_name" class="form-control"
                                                value="{{ old('merchant_name', $method->merchant_name ?? '') }}">
                                            @error('merchant_name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Mode</label>
                                            <select name="mode" class="form-control">
                                                <option value="sandbox"
                                                    {{ old('mode', $method->mode ?? '') == 'sandbox' ? 'selected' : '' }}>
                                                    Sandbox</option>
                                                <option value="live"
                                                    {{ old('mode', $method->mode ?? '') == 'live' ? 'selected' : '' }}>Live
                                                </option>
                                            </select>
                                            @error('mode')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">API Key / Public Key</label>
                                            <input type="text" name="api_key" class="form-control"
                                                value="{{ old('api_key', $method->api_key ?? '') }}">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Secret / Private Key</label>
                                            <input type="text" name="secret" class="form-control"
                                                value="{{ old('secret', $method->secret ?? '') }}">
                                        </div>

                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" value="1"
                                                id="active-{{ $method->name }}" name="active"
                                                {{ $method->status_id == 1 ? 'checked' : '' }}>
                                            <label class="form-check-label" for="active-{{ $method->name }}">Active</label>
                                        </div>

                                        <button class="btn btn-primary" type="submit">Save {{ $method->name }}</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-12">
                        <div class="alert alert-info">No payment providers configured.</div>
                    </div>
                @endif
            </div>
        </div>

        <div class="col-lg-4">
            <h5 class="mb-3">Payment Methods</h5>
            <div class="row">
                @if ($methods)
                    @foreach ($methods as $method)
                        <div class="col-12 mb-3">
                            <div class="card">
                                <div class="card-body d-flex align-items-center">
                                    <div class="me-3" style="width:64px">
                                        @if (isset($method->logo))
                                            <img src="{{ asset('assets/images/payment/' . $method->logo) }}"
                                                class="img-fluid" alt="{{ $method->name }}">
                                        @endif
                                    </div>

                                    <div class="flex-grow-1">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <strong>{{ $method->name }}</strong>
                                            <i
                                                class="fa-solid fa-{{ $method->status->id == 1 ? 'circle-check text-primary' : 'circle-xmark text-danger' }}"></span></i>
                                            <a href="{{ route('payment-methods.toggle', $method->id) }}"
                                                class="btn btn-sm {{ $method->status->id == 1 ? 'btn-danger' : 'btn-primary' }}">
                                                {{ $method->status->id == 1 ? 'Deactivate' : 'Activate' }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-12">
                        <div class="alert alert-info">No payment methods found.</div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

<!-- simple page — no extra scripts -->
