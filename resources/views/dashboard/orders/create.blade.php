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


        @php
            $searchedCustomer = session('searchedCustomer');

            $customerPhone = old('customer_phone', '');

            $customerSearched = session('customerSearched', false) || session()->has('error');
        @endphp

        <div class="card mb-3">

            <div class="card-header">
                <h5 class="mb-0">
                    <i class="bx bx-user-search me-1"></i>
                    Customer Information
                </h5>
            </div>

            <div class="card-body">

                <div class="row g-3">

                    {{-- Search Column --}}
                    <div class="col-lg-4">
                        <div class="border rounded p-3 h-100">

                            <h6 class="fw-semibold mb-3">
                                <i class="bx bx-search me-1"></i>
                                Find Customer
                            </h6>

                            <form action="{{ route('dashboard.orders.customer.lookup') }}" method="POST">

                                @csrf

                                <div class="mb-3">

                                    <label for="search_customer_phone" class="form-label">
                                        Customer Mobile Number
                                    </label>

                                    <input type="text" name="customer_phone" id="search_customer_phone"
                                        class="form-control" placeholder="Enter mobile number" value="{{ $customerPhone }}"
                                        required>

                                </div>

                                <button type="submit" class="btn btn-primary w-100">
                                    <i class="bx bx-search me-1"></i>
                                    Search Customer
                                </button>

                            </form>

                        </div>

                    </div>


                    {{-- Result Column --}}
                    <div class="col-lg-8">

                        <div class="border rounded p-3 h-100">

                            {{-- Before Search --}}
                            @if (!$customerSearched)

                                <div class="text-center py-4">

                                    <i class="bx bx-search-alt text-muted" style="font-size: 35px;"></i>

                                    <p class="text-muted mb-0 mt-2">
                                        Search a customer to see information here.
                                    </p>

                                </div>
                            @else
                                {{-- Customer Found --}}
                                @if ($searchedCustomer)
                                    <div class="d-flex align-items-center mb-3">

                                        <i class="bx bx-check-circle text-success fs-4 me-2"></i>

                                        <span class="text-success fw-semibold">
                                            Customer Found
                                        </span>

                                    </div>
                                @else
                                    {{-- Customer Not Found --}}
                                    <div class="d-flex align-items-center mb-3">

                                        <i class="bx bx-user-x text-warning fs-4 me-2"></i>

                                        <span class="text-warning fw-semibold">
                                            Customer Not Found! Create New Customer
                                        </span>

                                    </div>
                                @endif


                                {{-- Customer Information Form --}}
                                <form action="{{ route('dashboard.orders.customer.fix') }}" method="POST" class="row g-3">
                                    @csrf

                                    @if ($searchedCustomer)
                                        <input type="hidden" name="user_id" value="{{ $searchedCustomer->id }}">
                                    @endif
                                    {{-- Customer Name --}}
                                    <div class="col-md-6">

                                        <label for="customer_name" class="form-label fw-semibold">
                                            Customer Name
                                            <span class="text-danger">*</span>
                                        </label>

                                        <input type="text" name="name" id="customer_name" class="form-control"
                                            value="{{ old('name', $searchedCustomer->name ?? '') }}"
                                            placeholder="Enter customer name" required>

                                    </div>


                                    {{-- Customer Phone --}}
                                    <div class="col-md-6">

                                        <label for="customer_mobile" class="form-label fw-semibold">
                                            Customer Mobile No
                                            <span class="text-danger">*</span>
                                        </label>

                                        <input type="text" name="phone" id="customer_mobile" class="form-control"
                                            value="{{ old('phone', $searchedCustomer->phone ?? $customerPhone) }}"
                                            placeholder="Enter customer mobile no" required>

                                    </div>


                                    {{-- Customer Email --}}
                                    <div class="col-md-6">

                                        <label for="customer_email" class="form-label fw-semibold">
                                            Customer E-mail
                                            <span class="text-info">(Optional)</span>
                                        </label>

                                        <input type="email" name="email" id="customer_email" class="form-control"
                                            value="{{ old('email', $searchedCustomer->email ?? '') }}"
                                            placeholder="Enter customer email">

                                    </div>


                                    {{-- Customer Address --}}
                                    <div class="col-md-6">

                                        <label for="customer_address" class="form-label fw-semibold">
                                            Customer Shipping Address
                                            <span class="text-danger">*</span>
                                        </label>

                                        <input type="text" name="address" id="customer_address" class="form-control"
                                            value="{{ old('address', $searchedCustomer->address ?? '') }}"
                                            placeholder="Enter customer shipping address" required>

                                    </div>


                                    {{-- Customer ID --}}
                                    @if ($searchedCustomer)
                                        <input type="hidden" name="user_id" value="{{ $searchedCustomer->id }}">
                                    @endif


                                    {{-- Action Button --}}
                                    <div class="col-12">

                                        @if ($searchedCustomer)
                                            <button type="submit" class="btn btn-success">
                                                <i class="bx bx-save me-1"></i>
                                                Update Customer
                                            </button>
                                        @else
                                            <button type="submit" class="btn btn-primary">
                                                <i class="bx bx-user-plus me-1"></i>
                                                Create Customer
                                            </button>
                                        @endif

                                    </div>

                                </form>

                            @endif

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <form action="{{ route('dashboard.orders.store') }}" method="POST">
            @csrf
            <div class="card mb-3">
                <div class="card-header">
                    <h5 class="mb-0">Order Information</h5>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        @if ($searchedCustomer)
                            <input type="hidden" name="user_id" value="{{ $searchedCustomer->id }}">
                        @endif

                        <div class="col-md-4">
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

                        <div class="col-md-4">
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
                        <div class="col-md-4">
                            <label for="shipping_fee_id" class="form-label">Delivery Charge</label>
                            <select name="shipping_fee" id="shipping_fee_id" class="form-select" required>
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
