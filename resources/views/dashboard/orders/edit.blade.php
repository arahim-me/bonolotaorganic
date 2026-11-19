 @extends('layouts.dashboard')

 @section('title', $title ?? 'Edit Order | ' . $order->order_number)

 @section('content')
     @php
         // Existing order items
         $existingItems = $order->items
             ->map(function ($item) {
                 return [
                     'product_id' => $item->product_id,
                     'quantity' => $item->quantity,
                 ];
             })
             ->toArray();

         $items = old('items', $existingItems);

         if (!is_array($items) || empty($items)) {
             $items = [['product_id' => '', 'quantity' => 1]];
         }

         $couriers = ['pathao', 'steadfast', 'redex'];
     @endphp

     <div class="container-fluid">

         {{-- Page Header --}}
         <div class="py-3 py-lg-4">
             <div class="row align-items-center">
                 <div class="col-sm-6">
                     <h4 class="page-title mb-0">
                         {{ $title ?? 'Edit Order' }}
                     </h4>
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

         {{-- Validation Errors --}}
         @if ($errors->any())
             <div class="alert alert-danger">
                 <ul class="mb-0">
                     @foreach ($errors->all() as $error)
                         <li>{{ $error }}</li>
                     @endforeach
                 </ul>
             </div>
         @endif

         {{-- Customer Information --}}
         <div class="card mb-3">
             <div class="card-header">
                 <h5 class="mb-0">
                     <i class="bx bx-user me-1"></i>
                     Customer Information
                 </h5>
             </div>

             <div class="card-body">
                 <form action="{{ route('dashboard.orders.customer.fix') }}" method="POST">
                     @csrf

                     <input type="hidden" name="user_id" value="{{ $order->user_id }}">

                     <div class="row g-3">

                         <div class="col-md-6">
                             <label class="form-label fw-semibold">Customer Name *</label>
                             <input type="text" name="name" class="form-control"
                                 value="{{ old('name', $order->user->name ?? '') }}" placeholder="Enter customer name"
                                 required>
                         </div>

                         <div class="col-md-6">
                             <label class="form-label fw-semibold">Customer Mobile No *</label>
                             <input type="text" name="phone" class="form-control"
                                 value="{{ old('phone', $order->user->phone ?? '') }}" placeholder="Enter customer mobile"
                                 required>
                         </div>

                         <div class="col-md-6">
                             <label class="form-label fw-semibold">Customer Email</label>
                             <input type="email" name="email" class="form-control"
                                 value="{{ old('email', $order->user->email ?? '') }}" placeholder="Enter customer email">
                         </div>

                         <div class="col-md-6">
                             <label class="form-label fw-semibold">Shipping Address *</label>
                             <input type="text" name="address" class="form-control"
                                 value="{{ old('address', $order->user->address ?? '') }}"
                                 placeholder="Enter shipping address" required>
                         </div>

                         <div class="col-12">
                             <button type="submit" class="btn btn-success">
                                 <i class="bx bx-save me-1"></i>
                                 Update Customer
                             </button>
                         </div>

                     </div>
                 </form>
             </div>
         </div>

         {{-- Order Update Form --}}
         <form action="{{ route('dashboard.orders.update', $order->id) }}" method="POST">
             @csrf
             @method('PUT')

             <input type="hidden" name="order_id" value="{{ $order->id }}">

             {{-- Order Information --}}
             <div class="card mb-3">
                 <div class="card-header">
                     <h5 class="mb-0">Order Information</h5>
                 </div>

                 <div class="card-body">
                     <div class="row g-3">

                         {{-- Payment Method --}}
                         <div class="col-md-4">
                             <label for="payment_method" class="form-label">Payment Method</label>

                             <select id="payment_method" name="payment_method"
                                 class="form-select @error('payment_method') is-invalid @enderror" required>

                                 <option value="">Select Payment Method</option>

                                 @foreach ($paymentMethods as $paymentMethod)
                                     <option value="{{ $paymentMethod->id }}" @selected(old('payment_method', $order->payment_method) == $paymentMethod->id)>
                                         {{ $paymentMethod->name }}
                                     </option>
                                 @endforeach
                             </select>

                             @error('payment_method')
                                 <div class="invalid-feedback">{{ $message }}</div>
                             @enderror
                         </div>

                         {{-- Payment Status --}}
                         <div class="col-md-4">
                             <label for="payment_status" class="form-label">Payment Status</label>

                             <select id="payment_status" name="payment_status" class="form-select" required>

                                 <option value="0" @selected((string) old('payment_status', $order->payment_status) === '0')>
                                     Unpaid
                                 </option>

                                 <option value="1" @selected((string) old('payment_status', $order->payment_status) === '1')>
                                     Paid
                                 </option>
                             </select>
                         </div>

                         {{-- Shipping Fee --}}
                         <div class="col-md-4">
                             <label for="shipping_fee_id" class="form-label">Delivery Charge</label>

                             <select name="shipping_fee_id" id="shipping_fee_id" class="form-select" required>

                                 <option value="">Select Shipping Fee</option>

                                 @foreach ($shippingFees as $shippingFee)
                                     <option value="{{ $shippingFee->fee }}" data-fee="{{ $shippingFee->fee }}"
                                         @selected(old('shipping_fee_id', $order->shipping_fee) == $shippingFee->fee)>
                                         {{ $shippingFee->title }} —
                                         ৳{{ number_format($shippingFee->fee, 2) }}
                                     </option>
                                 @endforeach
                             </select>
                         </div>

                     </div>
                 </div>
             </div>

             {{-- Order Items --}}
             <div class="card mb-3">
                 <div class="card-header d-flex align-items-center justify-content-between">
                     <h5 class="mb-0">Order Items</h5>

                     <button type="button" class="btn btn-sm btn-outline-primary" data-add-order-item>
                         <i class="bx bx-plus"></i> Add Product
                     </button>
                 </div>

                 <div class="card-body">

                     <div class="table-responsive">
                         <table class="table table-bordered align-middle">

                             <thead class="table-light">
                                 <tr>
                                     <th>Product</th>
                                     <th style="width: 130px;">Quantity</th>
                                     <th style="width: 150px;">Unit Price</th>
                                     <th style="width: 150px;">Line Total</th>
                                     <th style="width: 70px;">Action</th>
                                 </tr>
                             </thead>

                             <tbody data-order-items data-next-index="{{ count($items) }}">

                                 @foreach ($items as $index => $item)
                                     <tr class="order-item-row">

                                         {{-- Product --}}
                                         <td>
                                             <select name="items[{{ $index }}][product_id]" class="form-select"
                                                 data-product-select required>

                                                 <option value="" data-price="0">
                                                     Select a product
                                                 </option>

                                                 @foreach ($products as $product)
                                                     <option value="{{ $product->id }}"
                                                         data-price="{{ $product->price }}" @selected(($item['product_id'] ?? '') == $product->id)>
                                                         {{ $product->name }} —
                                                         ৳{{ number_format((float) $product->price, 2) }}
                                                     </option>
                                                 @endforeach

                                             </select>
                                         </td>

                                         {{-- Quantity --}}
                                         <td>
                                             <input type="number" name="items[{{ $index }}][quantity]"
                                                 class="form-control" value="{{ $item['quantity'] ?? 1 }}"
                                                 min="1" step="1" data-quantity required>
                                         </td>

                                         {{-- Unit Price --}}
                                         <td>
                                             <span data-unit-price>৳0.00</span>
                                         </td>

                                         {{-- Line Total --}}
                                         <td>
                                             <span data-line-total>৳0.00</span>
                                         </td>

                                         {{-- Remove --}}
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
                         <div class="alert alert-warning">
                             No products are available.
                         </div>
                     @endif

                     {{-- New Product Template --}}
                     <template id="order-item-template">
                         <tr class="order-item-row">

                             <td>
                                 <select name="items[__INDEX__][product_id]" class="form-select" data-product-select
                                     required>

                                     <option value="" data-price="0">Select a product</option>

                                     @foreach ($products as $product)
                                         <option value="{{ $product->id }}" data-price="{{ $product->price }}">
                                             {{ $product->name }} —
                                             ৳{{ number_format((float) $product->price, 2) }}
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
                                 <button type="button" class="btn btn-sm btn-outline-danger" data-remove-order-item>
                                     <i class="bx bx-trash"></i>
                                 </button>
                             </td>

                         </tr>
                     </template>

                     {{-- Actions --}}
                     <div class="mt-4">
                         <button type="submit" class="btn btn-primary" @disabled($products->isEmpty())>
                             <i class="bx bx-save me-1"></i>
                             Update Order
                         </button>

                         <a href="{{ route('dashboard.orders.index') }}" class="btn btn-outline-secondary">
                             Cancel
                         </a>
                     </div>

                 </div>
             </div>

         </form>

     </div>
 @endsection

 @push('scripts')
     <script src="{{ asset('assets/js/order-create.js') }}" defer></script>
 @endpush
