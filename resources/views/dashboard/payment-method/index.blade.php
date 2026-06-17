@extends('layouts.dashboard')

@section('title', 'Payment Gateway Settings')

@section('content')
    <div class="py-3 py-lg-4">
        <div class="row">
            <div class="col-12">
                <h4 class="page-title">Payment Methods Settings !</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
        </div>
        @forelse($methods as $method)
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="logo w-50 mx-auto mb-3">
                            <img src="{{ asset('assets/images/payment/' . $method->logo) }}" class="card-img-top img-fluid"
                                alt="{{ $method->name }} Logo">
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span>{{ $method->name }}</span>
                            <i class="fa-solid fa-{{ $method->status->id == 1 ? 'circle-check text-success' : 'circle-xmark text-danger' }}"></span></i>
                        </div>
                        <p class="card-text">Active or Inactive your {{ $method->name }} payment method here.</p>
                        <a href="{{ route('payment-methods.toggle', $method->id) }}" class="btn {{$method->status->id == 1 ? 'btn-danger' : 'btn-primary'}} btn-sm">{{$method->status->id == 1 ? 'Deactivate' : 'Activate'}}</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">No payment methods found.</div>
            </div>
        @endforelse

    </div>
@endsection

<!-- simple page — no extra scripts -->
