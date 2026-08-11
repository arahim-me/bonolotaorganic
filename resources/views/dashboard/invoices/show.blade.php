@extends('layouts.dashboard')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-xl-9">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <h4 class="page-title mb-1">Invoice</h4>
                        <p class="text-muted mb-0">Order {{ $order->order_number }}</p>
                    </div>
                    <div class="d-print-none">
                        <a href="{{ route('orders.show', $order) }}" class="btn btn-secondary me-2">Back</a>
                        <button class="btn btn-primary" onclick="window.print()">Print</button>
                    </div>
                </div>

                <div class="card shadow-sm">
                    <div class="card-body p-4">
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <h5 class="fw-bold mb-1">{{ $siteInfo?->name ?? config('app.name') }}</h5>
                                <p class="mb-1">{{ $siteInfo?->email[0] ?? 'hello@example.com' }}</p>
                                <p class="mb-1">{{ $siteInfo?->phone[0] ?? 'N/A' }}</p>
                                <p class="mb-0">{{ $siteInfo?->address[0] ?? 'N/A' }}</p>
                            </div>
                            <div class="col-md-6 text-md-end">
                                <h5 class="fw-bold mb-1">Invoice</h5>
                                <p class="mb-1"><strong>Order No:</strong> {{ $order->order_number }}</p>
                                <p class="mb-1"><strong>Date:</strong> {{ $order->placed_at?->format('d M Y H:i') ?? '—' }}</p>
                                <p class="mb-0"><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <h6 class="fw-bold">Bill To</h6>
                                <p class="mb-1">{{ $order->user?->name ?? 'Customer' }}</p>
                                <p class="mb-1">{{ $order->user?->email ?? '—' }}</p>
                                <p class="mb-0">{{ $order->shipping_address ?? '—' }}</p>
                            </div>
                            <div class="col-md-6">
                                <h6 class="fw-bold">Payment</h6>
                                <p class="mb-1"><strong>Method:</strong> {{ $order->payment_method ?? '—' }}</p>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>Item</th>
                                        <th class="text-center">Qty</th>
                                        <th class="text-end">Price</th>
                                        <th class="text-end">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order->items as $item)
                                        <tr>
                                            <td>{{ $item->product?->name ?? 'Product' }}</td>
                                            <td class="text-center">{{ $item->quantity }}</td>
                                            <td class="text-end">{{ number_format($item->price, 2) }}</td>
                                            <td class="text-end">{{ number_format($item->total, 2) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-md-4">
                                <table class="table table-borderless mb-0">
                                    <tr>
                                        <th class="text-start">Subtotal</th>
                                        <td class="text-end">{{ number_format($order->total, 2) }}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-start">Shipping</th>
                                        <td class="text-end">0.00</td>
                                    </tr>
                                    <tr class="border-top">
                                        <th class="text-start">Total</th>
                                        <td class="text-end fw-bold">{{ number_format($order->total, 2) }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
