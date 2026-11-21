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
                                    <th>Total</th>
                                    <th>Courier</th>
                                    <th>Actions</th>
                                    <th>Courier / Accept Order</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($orders as $order)
                                    <tr>
                                        <td class="align-middle">{{ $loop->iteration }}</td>
                                        <td class="align-middle">{{ $order->order_number }}</td>
                                        <td class="align-middle">
                                            <div class="col">
                                                <div class="col">{{ $order->name }}</div>
                                                <div class="col">{{ $order->phone }} <a href="#"><i class="fa-solid fa-shield"></i></a></div>
                                                <div class="col">{{ $order->address }}</div>
                                            </div>
                                        </td>
                                        <td class="align-middle">
                                            {{ number_format((float) $order->total, 2) }}</td>
                                        <td class="align-middle">
                                            <div class="col">
                                                <div class="col">{{ $order->courier ?? '—' }}</div>
                                                <div class="col">{{ $order->tracking_number ?? '—' }}</div>
                                                <div class="d-flex gap-2">
                                                    @if ($order->courier_status != 'Deliverred')
                                                        <p class="">
                                                            {{ $order->courier_status ?? '—' }}</p> <a
                                                            href="{{ route('dashboard.check.courier.status', $order->id) }}">
                                                            <i class="fa-solid fa-arrows-rotate mt-1 text-danger"></i>
                                                        </a>
                                                    @else
                                                        <p class="">
                                                            {{ $order->courier_status ?? '—' }}</p>
                                                        <i class="fa-solid fa-circle-check mt-2 text-primary"></i>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        @php
                                            $couriers = ['pathao', 'steadfast', 'redex'];
                                        @endphp
                                        <td class="align-middle">
                                            <div class="d-flex align-items-center gap-2">
                                                <a href="{{ route('dashboard.orders.show', $order) }}"
                                                    class="btn btn-sm btn-primary"><i class="fa-solid fa-eye"></i></a>
                                                <a href="{{ route('dashboard.orders.edit', $order) }}"
                                                    class="btn btn-sm btn-info"><i
                                                        class="fa-solid fa-pen-to-square"></i></a>
                                                <form action="{{ route('dashboard.orders.destroy', $order) }}"
                                                    method="POST" style="display:inline-block"
                                                    onsubmit="return confirm('Delete this order?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger"><i
                                                            class="fa-solid fa-trash"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                        <td class="align-middle">
                                            @if (!$order->is_accept)
                                                <div class="row">
                                                    <a class="btn btn-info"
                                                        href="{{ route('dashboard.orders.accept', $order->id) }}">Accept
                                                        Order</a>
                                                </div>
                                            @else
                                                <form class="form-control d-flex gap-2"
                                                    action="{{ route('dashboard.booking.courier', $order->id) }}"
                                                    method="POST">
                                                    @csrf
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
                                            @endif
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
