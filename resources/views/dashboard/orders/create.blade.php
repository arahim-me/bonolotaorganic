@extends('layouts.dashboard')

@section('title', $title)

@section('content')
    <div class="container-fluid">
        <div class="py-3 py-lg-4">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h4 class="page-title mb-0">{{ $title }}</h4>
                </div>
                <div class="col-sm-6">
                    <div class="float-end">
                        <a href="{{ route('dashboard.orders.index') }}" class="btn btn-dark">
                            <i class="bx bx-arrow-back"></i> Back to Orders
                        </a>
                    </div>
                </div>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @php
            $items = old('items', [['product_id' => '', 'quantity' => 1]]);
            $items = is_array($items) && $items !== [] ? array_values($items) : [['product_id' => '', 'quantity' => 1]];
        @endphp

        <form action="{{ route('dashboard.orders.store') }}" method="POST">
            @csrf
            <div class="card mb-3">
                <div class="card-header">
                    <h5 class="mb-0">Order Information</h5>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="user_id" class="form-label">Customer</label>
                            <select id="user_id" name="user_id" class="form-select @error('user_id') is-invalid @enderror"
                                required>
                                <option value="">Select a customer</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}" @selected(old('user_id') == $user->id)>
                                        {{ $user->name }}{{ $user->phone ? ' — ' . $user->phone : '' }}
                                    </option>
                                @endforeach
                            </select>
                            @error('user_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="status_id" class="form-label">Order Status</label>
                            <select id="status_id" name="status_id"
                                class="form-select @error('status_id') is-invalid @enderror" required>
                                @foreach ($statuses as $status)
                                    <option value="{{ $status->id }}" @selected(old('status_id', $defaultStatusId) == $status->id)>
                                        {{ $status->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('status_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="payment_method" class="form-label">Payment Method</label>
                            <select id="payment_method" name="payment_method"
                                class="form-select @error('payment_method') is-invalid @enderror" required>
                                <option value="">Select a payment method</option>
                                @foreach ($paymentMethods as $paymentMethod)
                                    <option value="{{ $paymentMethod->id }}" @selected(old('payment_method') == $paymentMethod->id)>
                                        {{ $paymentMethod->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('payment_method')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="payment_status" class="form-label">Payment Status</label>
                            <select id="payment_status" name="payment_status"
                                class="form-select @error('payment_status') is-invalid @enderror" required>
                                <option value="0" @selected(old('payment_status', '0') === '0')>Unpaid</option>
                                <option value="1" @selected(old('payment_status') === '1')>Paid</option>
                            </select>
                            @error('payment_status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="shipping_phone" class="form-label">
                                Shipping Phone
                            </label>

                            <input type="text" name="shipping_phone" id="shipping_phone"
                                class="form-control @error('shipping_phone') is-invalid @enderror"
                                value="{{ old('shipping_phone') }}" placeholder="Enter shipping phone" required>

                            @error('shipping_phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <label for="shipping_address" class="form-label">
                                Shipping Address
                            </label>

                            <textarea name="shipping_address" id="shipping_address"
                                class="form-control @error('shipping_address') is-invalid @enderror" rows="3"
                                placeholder="Enter shipping address" required>{{ old('shipping_address') }}</textarea>

                            @error('shipping_address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <select name="shipping_fee_id" id="shipping_fee_id" class="form-select"
                                required>
                                <option value="" data-fee="0">Select Shipping Fee</option>

                                @foreach ($shippingFees as $shippingFee)
                                    <option value="{{ $shippingFee->fee }}" data-fee="{{ $shippingFee->fee }}"
                                        @selected(old('shipping_fee_id') == $shippingFee->id)>
                                        {{ $shippingFee->title }} —
                                        ৳{{ number_format($shippingFee->fee, 2) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Order Items</h5>
                    <button type="button" class="btn btn-sm btn-outline-primary" data-add-order-item>
                        <i class="bx bx-plus"></i> Add Product
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-middle">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th style="width: 130px;">Quantity</th>
                                    <th style="width: 150px;">Unit Price</th>
                                    <th style="width: 150px;">Line Total</th>
                                    <th style="width: 70px;"></th>
                                </tr>
                            </thead>
                            <tbody data-order-items data-next-index="{{ count($items) }}">
                                @foreach ($items as $index => $item)
                                    <tr class="order-item-row">
                                        <td>
                                            <select name="items[{{ $index }}][product_id]"
                                                class="form-select @error('items.' . $index . '.product_id') is-invalid @enderror"
                                                data-product-select required>
                                                <option value="" data-price="0">Select a product</option>
                                                @foreach ($products as $product)
                                                    <option value="{{ $product->id }}"
                                                        data-price="{{ $product->price }}" @selected(old('items.' . $index . '.product_id', is_array($item) ? $item['product_id'] ?? '' : '') == $product->id)>
                                                        {{ $product->name }} —
                                                        ৳{{ number_format((float) $product->price, 2) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('items.' . $index . '.product_id')
                                                <div class="text-danger small mt-1">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="number" name="items[{{ $index }}][quantity]"
                                                class="form-control @error('items.' . $index . '.quantity') is-invalid @enderror"
                                                value="{{ old('items.' . $index . '.quantity', is_array($item) ? $item['quantity'] ?? 1 : 1) }}"
                                                min="1" step="1" data-quantity required>
                                            @error('items.' . $index . '.quantity')
                                                <div class="text-danger small mt-1">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td><span data-unit-price>৳0.00</span></td>
                                        <td><span data-line-total>৳0.00</span></td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-outline-danger"
                                                data-remove-order-item aria-label="Remove item">
                                                <i class="bx bx-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="3" class="text-end">Subtotal</th>
                                    <th colspan="2">
                                        <span data-order-subtotal>৳0.00</span>
                                    </th>
                                </tr>

                                <tr>
                                    <th colspan="3" class="text-end">Shipping Fee</th>
                                    <th colspan="2">
                                        <span data-shipping-fee>৳0.00</span>
                                    </th>
                                </tr>

                                <tr>
                                    <th colspan="3" class="text-end">Grand Total</th>
                                    <th colspan="2">
                                        <span data-order-total>৳0.00</span>
                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    @if ($products->isEmpty())
                        <div class="alert alert-warning mb-0">No products are available to add to this order.</div>
                    @endif

                    <template id="order-item-template">
                        <tr class="order-item-row">
                            <td>
                                <select name="items[__INDEX__][product_id]" class="form-select" data-product-select
                                    required>
                                    <option value="" data-price="0">Select a product</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}" data-price="{{ $product->price }}">
                                            {{ $product->name }} — ৳{{ number_format((float) $product->price, 2) }}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input type="number" name="items[__INDEX__][quantity]" class="form-control"
                                    value="1" min="1" step="1" data-quantity required>
                            </td>
                            <td><span data-unit-price>৳0.00</span></td>
                            <td><span data-line-total>৳0.00</span></td>
                            <td>
                                <button type="button" class="btn btn-sm btn-outline-danger" data-remove-order-item
                                    aria-label="Remove item">
                                    <i class="bx bx-trash"></i>
                                </button>
                            </td>
                        </tr>
                    </template>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary" @disabled($products->isEmpty())>Create Order</button>
                        <a href="{{ route('dashboard.orders.index') }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/order-create.js') }}" defer></script>
@endpush
