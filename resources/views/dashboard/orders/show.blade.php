@extends('layouts.dashboard')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h4 class="page-title">Order {{ $order->order_number }}</h4>

                <div class="card">
                    <div class="card-body">
                        <p><strong>Customer:</strong> {{ $order->user?->name ?? '—' }}</p>
                        <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
                        <p><strong>Total:</strong> {{ number_format($order->total, 2) }}</p>
                        <p><strong>Payment Method:</strong> {{ $order->payment_method ?? '—' }}</p>
                        <p><strong>Shipping Address:</strong><br>{{ $order->shipping_address ?? '—' }}</p>

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
                                        <td>{{ number_format($item->price, 2) }}</td>
                                        <td>{{ number_format($item->total, 2) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <a href="{{ route('orders.index') }}" class="btn btn-secondary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
