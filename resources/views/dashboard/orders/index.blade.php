@extends('layouts.dashboard')

@section('title', $title)

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="py-3 py-lg-4">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <h4 class="page-title mb-0">{{ $title }}</h4>
                        </div>
                        <div class="col-sm-6">
                            <div class="float-end d-none d-sm-block">
                                <a href="{{ route('dashboard.orders.create') }}" class="btn btn-primary">
                                    <i class="bx bx-plus"></i> Create New Order
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Order #</th>
                                    <th>Customer</th>
                                    <th>Phone</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                    <th>Courier</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($orders as $order)
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->order_number }}</td>
                                        <td>{{ $order->user?->name ?? '—' }}</td>
                                        <td>{{ $order->user->phone ?? '' }}</td>
                                        <td>{{ number_format((float) $order->grand_total, 2) }}</td>
                                        <td>{{ $order->status?->name ?? '—' }}</td>
                                        </td>
                                        @php
                                            $couriers = ['pathao', 'steadfast', 'redex'];
                                        @endphp
                                        <td>
                                            <a href="{{ route('dashboard.orders.show', $order) }}"
                                                class="btn btn-sm btn-primary">View</a>
                                            <form action="{{ route('dashboard.orders.destroy', $order) }}" method="POST"
                                                style="display:inline-block"
                                                onsubmit="return confirm('Delete this order?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </td>
                                        <td>
                                            <form class="form-control d-flex" action="/submit-shipping" method="POST">
                                                <select class="form-select" name="courier" id="courier-select" required>
                                                    <option value="" disabled selected><i
                                                            class="fa-solid fa-truck-fast"></i> Courier
                                                    </option>
                                                    @foreach ($couriers as $courier)
                                                        <option value="{{ $courier }}"><i
                                                                class="fa-solid fa-truck-fast"></i> {{ $courier }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <button class="btn btn-primary" type="submit">Confirm</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">No orders found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        @include('dashboard.components.pagination', ['paginator' => $orders])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
