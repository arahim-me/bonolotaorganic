@extends('layouts.dashboard')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h4 class="page-title">Order {{ $order->order_number }}</h4>

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <div class="card">
                    <div class="card-body">
                        <p><strong>Customer:</strong> {{ $order->user?->name ?? '—' }}</p>
                        <p><strong>Status:</strong> {{ $order->status?->name ?? '—' }}</p>
                        <p><strong>Total:</strong> ৳{{ number_format((float) $order->grand_total, 2) }}</p>
                        <p><strong>Payment Method:</strong> {{ $order->paymentMethod?->name ?? '—' }}</p>
                        <p><strong>Payment Status:</strong> {{ $order->payment_status ? 'Paid' : 'Unpaid' }}</p>
                        <p><strong>Shipping Address:</strong><br>{{ $order->shipping_address ?? '—' }}</p>
                        <p><strong>Shipping Phone:</strong> {{ $order->shipping_phone ?? '—' }}</p>

                        <h5>Items</h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Qty</th>
                                    <th>Price</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order->items as $item)
                                    <tr>
                                        <td>{{ $item->product?->name ?? '—' }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>৳{{ number_format((float) $item->price, 2) }}</td>
                                        <td>৳{{ number_format((float) $item->total, 2) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <a href="{{ route('orders.index') }}" class="btn btn-secondary me-2">Back</a>
                        <a href="{{ route('orders.invoice', $order) }}" class="btn btn-outline-primary">Invoice</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
