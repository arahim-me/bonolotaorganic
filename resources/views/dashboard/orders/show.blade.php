@extends('layouts.dashboard')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <h4 class="page-title my-3">Order {{ $order->order_number }}</h4>

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
                        <p><strong>Shipping Address:</strong><br>{{ $order->user->address ?? 'Not Provided' }}</p>
                        <p><strong>Shipping Phone:</strong> {{ $order->user->phone ?? '—' }}</p>

                        <h5>Items</h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Qty</th>
                                    <th>Price</th>
                                    <th class="text-center">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->items as $item)
                                    <tr>
                                        <td>{{ $item->product?->name ?? '—' }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>৳{{ number_format((float) $item->price, 2) }}</td>
                                        <td class="text-end">৳{{ number_format((float) $item->total, 2) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>


                        <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">

                            {{-- Left Side: Action Buttons --}}
                            <div class="d-flex flex-wrap align-items-center gap-2">
                                @php
                                    $couriers = ['pathao', 'steadfast', 'redex'];
                                @endphp

                                @if (!$order->is_accept)
                                    {{-- Accept Order --}}
                                    <a class="btn btn-info" href="{{ route('dashboard.orders.accept', $order->id) }}">
                                        Accept Order
                                    </a>
                                @else
                                    {{-- Courier Booking --}}
                                    <form class="m-0" action="{{ route('dashboard.booking.courier', $order->id) }}"
                                        method="POST">

                                        @csrf

                                        <div class="input-group">
                                            <select class="form-select border-primary" name="courier" required>

                                                <option value="" disabled selected>Courier</option>

                                                @foreach ($couriers as $courier)
                                                    <option value="{{ $courier }}">
                                                        {{ ucfirst($courier) }}
                                                    </option>
                                                @endforeach

                                            </select>

                                            <button class="btn btn-primary" type="submit">
                                                Confirm
                                            </button>
                                        </div>

                                    </form>
                                @endif

                                {{-- Invoice --}}
                                <a href="{{ route('dashboard.invoice.show', $order->order_number) }}"
                                    class="btn btn-outline-primary">
                                    Invoice
                                </a>
                                {{-- Edit Button --}}
                                <a href="{{ route('dashboard.orders.edit', $order->id) }}" class="btn btn-warning">
                                    <i class="bx bx-edit me-1"></i>
                                    Edit
                                </a>

                                {{-- Delete Button --}}
                                <form action="{{ route('dashboard.orders.destroy', $order->id) }}" method="POST"
                                    class="m-0" onsubmit="return confirm('Are you sure you want to delete this order?')">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger">
                                        <i class="bx bx-trash me-1"></i>
                                        Delete
                                    </button>

                                </form>
                                {{-- Back Button --}}
                                <a href="{{ route('dashboard.orders.index') }}" class="btn btn-secondary">
                                    Back
                                </a>

                            </div>


                            {{-- Right Side: Total Calculation --}}
                            <div class="border rounded p-3 bg-light" style="min-width: 260px;">

                                <div class="d-flex justify-content-between gap-4 mb-2">
                                    <span class="text-muted">Subtotal:</span>
                                    <strong>{{ number_format($order->grand_total, 2) }}</strong>
                                </div>

                                <div class="d-flex justify-content-between gap-4 mb-2">
                                    <span class="text-muted">Delivery Charge:</span>
                                    <strong>{{ number_format($order->shipping_fee, 2) }}</strong>
                                </div>

                                <hr class="my-2">

                                <div class="d-flex justify-content-between gap-4">
                                    <h5 class="mb-0 fw-bold">Grand Total:</h5>
                                    <h5 class="mb-0 fw-bold text-success">
                                        {{ number_format($order->total, 2) }}
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
