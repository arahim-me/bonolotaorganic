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
                    <div class="mb-3">
                        <label class="form-label">Select Courier</label>

                        <select name="courier" id="courier" class="form-select" required>
                            <option value="">-- Select Courier --</option>
                            <option value="pathao">Pathao</option>
                            <option value="steadfast">Steadfast</option>
                            <option value="redx">RedX</option>
                        </select>
                    </div>

                    {{-- Pathao Fields --}}
                    <div id="pathao-fields" class="courier-fields d-none">

                        <h6 class="mb-3">Pathao Information</h6>

                        <div class="mb-3">
                            <label class="form-label">Store ID</label>
                            <input type="text" name="store_id" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Item Weight (KG)</label>
                            <input type="number" step="0.1" min="0.5" name="item_weight" class="form-control"
                                value="0.5">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Special Instruction</label>
                            <textarea name="special_instruction" class="form-control"></textarea>
                        </div>

                    </div>

                    {{-- Steadfast Fields --}}
                    <div id="steadfast-fields" class="courier-fields d-none">

                        <h6 class="mb-3">Steadfast Information</h6>

                        <div class="mb-3">
                            <label class="form-label">Note</label>
                            <textarea name="note" class="form-control"></textarea>
                        </div>

                    </div>

                    {{-- RedX Fields --}}
                    <div id="redx-fields" class="courier-fields d-none">

                        <h6 class="mb-3">RedX Information</h6>

                        <div class="mb-3">
                            <label class="form-label">Pickup Store ID</label>
                            <input type="text" name="pickup_store_id" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Delivery Area</label>
                            <input type="text" name="delivery_area" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Delivery Area ID</label>
                            <input type="number" name="delivery_area_id" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Parcel Weight (KG)</label>
                            <input type="number" step="0.1" min="0.5" name="parcel_weight" class="form-control"
                                value="0.5">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Instruction</label>
                            <textarea name="instruction" class="form-control"></textarea>
                        </div>

                    </div>
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
                                @foreach ($order->items as $item)
                                    <tr>
                                        <td>{{ $item->product?->name ?? '—' }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>৳{{ number_format((float) $item->price, 2) }}</td>
                                        <td>৳{{ number_format((float) $item->total, 2) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <a href="{{ route('dashboard.orders.index') }}" class="btn btn-secondary me-2">Back</a>
                        <a href="{{ url('/dashboard/orders/' . $order->id) }}#courier-booking"
                            class="btn btn-sm btn-outline-primary">
                            <i class="bx bx-package"></i>
                            Book Courier
                        </a>
                        <a href="{{ route('dashboard.invoice.show', $order->order_number) }}"
                            class="btn btn-outline-primary">Invoice</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const courierSelect = document.getElementById('courier');

            const courierFields = {
                pathao: document.getElementById('pathao-fields'),
                steadfast: document.getElementById('steadfast-fields'),
                redx: document.getElementById('redx-fields')
            };

            function toggleCourierFields() {

                const selectedCourier = courierSelect.value;

                // Hide all courier fields
                Object.values(courierFields).forEach(function(field) {
                    field.classList.add('d-none');

                    // Disable hidden inputs
                    field.querySelectorAll('input, select, textarea')
                        .forEach(function(input) {
                            input.disabled = true;
                        });
                });

                // Show selected courier fields
                if (courierFields[selectedCourier]) {

                    const selectedFields = courierFields[selectedCourier];

                    selectedFields.classList.remove('d-none');

                    // Enable selected inputs
                    selectedFields.querySelectorAll('input, select, textarea')
                        .forEach(function(input) {
                            input.disabled = false;
                        });
                }
            }

            courierSelect.addEventListener('change', toggleCourierFields);

            // Initial load
            toggleCourierFields();

        });
    </script>
@endsection
