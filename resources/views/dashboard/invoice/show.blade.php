@extends('layouts.dashboard')
@section('title', 'Invoice - ' . $order->order_number)

@section('content')

    @php
        $subtotal = $order->items->sum('total');
        $shippingFee = (float) ($order->shipping_fee_amount ?? 0);
        $discount = (float) ($order->discount_amount ?? 0);
        $grandTotal = $subtotal + $shippingFee - $discount;
    @endphp

    <style>
        .invoice-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        .invoice-paper {
            width: 148mm;
            min-height: 210mm;
            padding: 10mm;
            margin: 0 auto;
            background: #fff;
            color: #252525;
            font-family: Arial, "Noto Sans Bengali", sans-serif;
            font-size: 12px;
            box-sizing: border-box;
        }

        .invoice-logo {
            max-width: 180px;
            max-height: 75px;
            object-fit: contain;
        }

        .invoice-title {
            color: #aaa;
            font-size: 34px;
            font-weight: 700;
            letter-spacing: 1px;
        }

        .invoice-meta {
            font-size: 13px;
            font-weight: 600;
            line-height: 1.8;
        }

        .invoice-section-title {
            font-size: 14px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .invoice-info {
            font-size: 13px;
            line-height: 1.8;
            overflow-wrap: anywhere;
        }

        .invoice-table {
            margin-top: 28px;
            width: 100%;
            border-collapse: collapse;
        }

        .invoice-table thead th {
            color: #aaa;
            font-size: 12px;
            font-weight: 700;
            border-bottom: 2px solid #dee2e6;
            padding: 10px 6px;
            white-space: nowrap;
        }

        .invoice-table tbody td {
            border-bottom: 1px solid #dee2e6;
            padding: 12px 6px;
            font-size: 13px;
            vertical-align: top;
        }

        .product-name {
            font-size: 14px;
            font-weight: 500;
        }

        .product-variant {
            font-size: 11px;
            margin-top: 5px;
            color: #555;
        }

        .invoice-summary {
            width: 48%;
            margin-left: auto;
            margin-top: 12px;
        }

        .invoice-summary td,
        .invoice-summary th {
            padding: 10px 6px;
            border-bottom: 1px solid #dee2e6;
            font-size: 14px;
            font-weight: 700;
        }

        .invoice-summary .final-total {
            color: #aaa;
            font-size: 16px;
        }

        .invoice-terms {
            border-top: 1px solid #ddd;
            margin-top: 30px;
            padding-top: 20px;
            text-align: center;
        }

        .invoice-terms h6 {
            color: #403a91;
            font-size: 14px;
            font-weight: 700;
            font-style: italic;
        }

        .invoice-terms p {
            font-size: 12px;
            font-style: italic;
        }

        @media print {
            @page {
                size: A5 portrait;
                margin: 0;
            }

            html,
            body {
                width: 148mm !important;
                margin: 0 !important;
                padding: 0 !important;
                background: #fff !important;
            }

            body * {
                visibility: hidden;
            }

            .invoice-paper,
            .invoice-paper * {
                visibility: visible;
            }

            .invoice-wrapper {
                overflow: visible;
            }

            .invoice-paper {
                position: absolute;
                top: 0;
                left: 0;
                width: 148mm;
                min-height: 210mm;
                margin: 0;
                padding: 9mm;
                border: none;
                box-shadow: none;
            }

            .d-print-none {
                display: none !important;
            }

            .invoice-table tr {
                page-break-inside: avoid;
            }
        }
    </style>

    <div class="container-fluid">

        {{-- Action Buttons --}}
        <div class="d-flex justify-content-between align-items-center mb-3 d-print-none">
            <div>
                <h4 class="page-title mb-1">Invoice</h4>
                <p class="text-muted mb-0">
                    #{{ $order->order_number }}
                </p>
            </div>

            <div>
                <a href="{{ route('orders.index') }}" class="btn btn-secondary btn-sm me-2">
                    Back
                </a>

                <button type="button" class="btn btn-primary btn-sm" onclick="window.print()">
                    <i class="bx bx-printer"></i> Print Invoice
                </button>
            </div>
        </div>

        <div class="invoice-wrapper">

            <div class="invoice-paper">

                {{-- Invoice Header --}}
                <div class="row align-items-start">

                    <div class="col-6">
                        @if (!empty($siteInfo?->logo))
                            <img src="{{ asset('storage/' . $siteInfo->logo) }}" class="invoice-logo"
                                alt="{{ $siteInfo->name ?? config('app.name') }}">
                        @else
                            <h4 class="fw-bold mb-0">
                                {{ $siteInfo?->name ?? config('app.name') }}
                            </h4>
                        @endif
                    </div>

                    <div class="col-6 text-end">
                        <div class="invoice-title">INVOICE</div>

                        <div class="invoice-meta mt-3">
                            <div>
                                Invoice ID : #{{ $order->order_number }}
                            </div>

                            <div>
                                Invoice Date:
                                {{ $order->created_at?->format('d-m-Y') }}
                            </div>

                            <div>
                                Payment Method:
                                {{ strtoupper($order->paymentMethod?->name ?? 'N/A') }}
                            </div>
                        </div>
                    </div>

                </div>

                {{-- Invoice From / To --}}
                <div class="row mt-4">

                    <div class="col-6">
                        <h6 class="invoice-section-title">
                            Invoice From:
                        </h6>

                        <div class="invoice-info">
                            <strong>{{ $siteInfo?->name ?? config('app.name') }}</strong>

                            <div>{{ $siteInfo?->phone[0] ?? 'N/A' }}</div>

                            <div>{{ $siteInfo?->email[0] ?? 'N/A' }}</div>

                            <div>{{ $siteInfo?->address[0] ?? 'N/A' }}</div>
                        </div>
                    </div>

                    <div class="col-6 text-end">
                        <h6 class="invoice-section-title">
                            Invoice To:
                        </h6>

                        <div class="invoice-info">
                            <strong>{{ $order->user?->name ?? 'N/A' }}</strong>

                            <div>{{ $order->shipping_phone ?? 'N/A' }}</div>

                            <div>{{ $order->shipping_address ?? 'N/A' }}</div>

                            @if ($shippingFee > 0)
                                <div class="mt-1">
                                    Shipping Charge: ৳{{ number_format($shippingFee, 2) }}
                                </div>
                            @endif
                        </div>
                    </div>

                </div>

                {{-- Product Table --}}
                <table class="invoice-table">

                    <thead>
                        <tr>
                            <th width="8%">SL</th>
                            <th width="47%">Product</th>
                            <th class="text-end" width="17%">Price</th>
                            <th class="text-center" width="10%">Qty</th>
                            <th class="text-end" width="18%">Total</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($order->items as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>

                                <td>
                                    <div class="product-name">
                                        {{ $item->product?->name ?? 'Product' }}
                                    </div>

                                    @if (!empty($item->size))
                                        <div class="product-variant">
                                            Size: {{ $item->size }}
                                        </div>
                                    @endif
                                </td>

                                <td class="text-end">
                                    ৳{{ number_format($item->price, 2) }}
                                </td>

                                <td class="text-center">
                                    {{ $item->quantity }}
                                </td>

                                <td class="text-end">
                                    ৳{{ number_format($item->total, 2) }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>

                {{-- Invoice Summary --}}
                <table class="invoice-summary">

                    <tr>
                        <th>Shipping(+)</th>
                        <td class="text-end">
                            ৳{{ number_format($shippingFee, 2) }}
                        </td>
                    </tr>

                    <tr>
                        <th>Discount(-)</th>
                        <td class="text-end">
                            ৳{{ number_format($discount, 2) }}
                        </td>
                    </tr>

                    <tr>
                        <th class="final-total">Final Total</th>
                        <td class="text-end final-total">
                            ৳{{ number_format($grandTotal, 2) }}
                        </td>
                    </tr>

                </table>

                {{-- Terms & Conditions --}}
                <div class="invoice-terms">

                    <h6>Terms & Conditions</h6>

                    <p>
                        * This is a computer generated invoice,
                        does not require any signature.
                    </p>

                </div>

            </div>

        </div>

    </div>

@endsection
