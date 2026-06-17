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

    <div class="row">
        <div class="col-12">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
        </div>

        @foreach($providers as $key => $label)
            @php
                $method = $methods->has($key) ? $methods->get($key) : null;
                $isActive = $method && isset($statuses['active']) ? ($method->status_id == $statuses['active']) : false;
            @endphp

            <div class="col-lg-6">
                <div class="card mb-3">
                            <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">{{ $label }}</h5>
                        <form method="POST" action="{{ route('payment.settings.update') }}" class="d-inline">
                            @csrf
                            <input type="hidden" name="provider" value="{{ $key }}">
                            <input type="hidden" name="mode" value="{{ $method->mode ?? 'sandbox' }}">
                            <input type="hidden" name="api_key" value="{{ $method->api_key ?? '' }}">
                            <input type="hidden" name="secret" value="{{ $method->secret ?? '' }}">
                            <input type="hidden" name="merchant_id" value="{{ $method->merchant_id ?? '' }}">
                            <input type="hidden" name="merchant_number" value="{{ $method->merchant_number ?? '' }}">
                            <input type="hidden" name="merchant_name" value="{{ $method->merchant_name ?? '' }}">
                            <input type="hidden" name="active" value="{{ $isActive ? '0' : '1' }}">
                            <button type="submit" class="btn btn-sm {{ $isActive ? 'btn-danger' : 'btn-success' }}">
                                {{ $isActive ? 'Deactivate' : 'Activate' }}
                            </button>
                        </form>
                    </div>

                    <div class="card-body">
                                <form method="POST" action="{{ route('payment.settings.update') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="provider" value="{{ $key }}">
                                    <div class="mb-3">
                                        <label class="form-label">Merchant ID</label>
                                        <input type="text" name="merchant_id" class="form-control" value="{{ old('merchant_id', $method->merchant_id ?? '') }}" required>
                                        @error('merchant_id')<div class="text-danger">{{ $message }}</div>@enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Merchant Number</label>
                                        <input type="text" name="merchant_number" class="form-control" value="{{ old('merchant_number', $method->merchant_number ?? '') }}">
                                        @error('merchant_number')<div class="text-danger">{{ $message }}</div>@enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Merchant Name</label>
                                        <input type="text" name="merchant_name" class="form-control" value="{{ old('merchant_name', $method->merchant_name ?? '') }}">
                                        @error('merchant_name')<div class="text-danger">{{ $message }}</div>@enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Logo</label>
                                        @if($method && $method->provider_logo)
                                            <div class="mb-2"><img src="{{ asset('storage/'.$method->provider_logo) }}" alt="{{ $label }} logo" style="max-height:60px"></div>
                                        @endif
                                        <input type="file" name="logo" accept="image/*" class="form-control">
                                        @error('logo')<div class="text-danger">{{ $message }}</div>@enderror
                                    </div>

                            <div class="mb-3">
                                <label class="form-label">Mode</label>
                                <select name="mode" class="form-control">
                                    <option value="sandbox" {{ (old('mode', $method->mode ?? '')=='sandbox')? 'selected':'' }}>Sandbox</option>
                                    <option value="live" {{ (old('mode', $method->mode ?? '')=='live')? 'selected':'' }}>Live</option>
                                </select>
                                @error('mode')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>

                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" value="1" id="active-{{ $key }}" name="active" {{ $isActive ? 'checked' : '' }}>
                                <label class="form-check-label" for="active-{{ $key }}">Active</label>
                            </div>

                            <button class="btn btn-primary" type="submit">Save {{ $label }}</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

<!-- simple page — no extra scripts -->
