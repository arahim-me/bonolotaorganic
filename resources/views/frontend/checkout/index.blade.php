@extends('layouts.master')
@section('master')
    <main id="main">
        <!-- collections start -->
        <main id="main">
            <!-- checkout start -->
            <section class="checkout-area section-ptb">
                <form method="post" action="javascript:void(0)">
                    <div class="container">
                        <div class="row row-mtm align-items-lg-start">
                            <div class="col-12 col-lg-6 col-xl-6 p-lg-sticky top-0" data-animate="animate__fadeIn">
                                <div class="checkout-summary">
                                    <div class="checkout-orderview">
                                        <h6 class="font-18 meb-25">Shopping cart</h6>
                                        <table class="col-12">
                                            <thead>
                                                <tr>
                                                    <th class="text-start">Product</th>
                                                    <th class="text-center">Price</th>
                                                    <th class="text-center">Qty</th>
                                                    <th class="text-end">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-start">
                                                        <img src="{{ asset('uploads/products/default.png') }}" class="img-fluid" style="height: 100px" alt="Product Image">
                                                        <h6 class="font-16 heading-color">Pleated skater skirt</h6>
                                                        <span class="d-block mst-7">XS / Aliceblue</span>
                                                        <span class="d-block mst-7">Polyester</span>
                                                    </td>
                                                    <td class="text-center">$79.00</td>
                                                    <td class="text-center">1</td>
                                                    <td class="text-end">$79.00</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        {{-- <div class="row row-mtm15">
                                            <div class="checkitem-content">
                                                <div class="ul-mt15">
                                                    <div class="checkitem-img width-88">
                                                        <div class="position-relative">
                                                            <img src="{{ asset('uploads/products/default.png') }}"
                                                                class="w-100 img-fluid border-radius" alt="cart-1">
                                                            <span
                                                                class="checkitem-qty extra-color font-11 position-absolute d-flex align-items-center justify-content-center secondary-bg rounded-circle lh-1">1</span>
                                                        </div>
                                                    </div>
                                                    <div class="checkitem-info width-calc-88">
                                                        <div
                                                            class="checkitem-detail h-100 d-flex flex-column justify-content-between">
                                                            <div class="checkitem-text">
                                                                <a href="product.html"
                                                                    class="primary-link heading-weight">Pleated skater
                                                                    skirt</a>
                                                                <span class="d-block mst-7">XS / Aliceblue</span>
                                                                <span class="d-block mst-7">Polyester</span>
                                                            </div>
                                                            <div>
                                                                Qty: 1
                                                            </div>

                                                            <div class="checkitem-price mst-12 text-end">
                                                                <div class="heading-color heading-weight">$79.00</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}
                                    </div>
                                    <div class="checkout-costview">
                                        <div class="checkout-cost mst-30 pst-30 bst">
                                            <h6 class="font-18 meb-21">Cost summary</h6>
                                            <div class="row row-mtm20">
                                                <div class="col-12 d-flex justify-content-between">
                                                    <span>Subtotal</span>
                                                    <span class="heading-color heading-weight">$246.00</span>
                                                </div>
                                                <div class="col-12 d-flex justify-content-between">
                                                    <span>Discount</span>
                                                    <span class="text-danger heading-weight">$11.00</span>
                                                </div>
                                                <div class="col-12 d-flex justify-content-between">
                                                    <span>Shipping</span>
                                                    <span class="text-success heading-weight">$0.00</span>
                                                </div>
                                                <div class="col-12 d-flex justify-content-between">
                                                    <span>Tax</span>
                                                    <span class="heading-color heading-weight">$10.00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="checkout-cost mst-30 pst-30 bst">
                                            <div class="row row-mtm20">
                                                <div class="col-12 d-flex justify-content-between">
                                                    <span>Total</span>
                                                    <span class="heading-color heading-weight">$245.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6 col-xl-6 p-lg-sticky top-0">
                                <div class="checkout-billview">
                                    {{-- <div class="checkout-box ptb-30 plr-15 plr-md-30 meb-30 extra-bg border-radius"
                                        data-animate="animate__fadeIn">
                                        <label class="cust-checkbox-label">
                                            <input type="checkbox" id="news-email" name="news-email"
                                                class="cust-checkbox">
                                            <span class="d-block cust-check"></span>
                                            <span>Email me with news and offers</span>
                                        </label>
                                    </div> --}}
                                    <div class="row row-mtm align-items-xl-center">
                                        <div class="col-12 col-xl-12 p-xl-sticky top-0">
                                            <div class="ptb-30 plr-15 plr-md-30 body-bg border-full border-radius"
                                                data-animate="animate__fadeIn">
                                                <div class="checkout-info">
                                                    <div class="acc-info">
                                                        <div
                                                            class="acc-title d-flex align-items-center justify-content-between">
                                                            <h6 class="font-18">Shipping address</h6>
                                                            <button type="button"
                                                                class="acc-edit d-none body-secondary-color icon-16"
                                                                aria-label="Edit"><i
                                                                    class="ri-edit-2-line d-block lh-1"></i></button>
                                                        </div>
                                                        <div class="acc-detail mst-21">
                                                            {{-- <div class="acc-detail-info d-none">
                                                                <div class="row row-mtm">
                                                                    <div class="col-12 col-sm-6 col-xl-12">
                                                                        <!-- acc-info shipping-address start -->
                                                                        <span
                                                                            class="d-inline-block heading-color heading-weight meb-22">Shipping
                                                                            address</span>
                                                                        <div class="st-label d-flex mst-4 meb-11">
                                                                            <span
                                                                                class="d-inline-block st-small-label bg-dark">Home</span>
                                                                        </div>
                                                                        <div class="ul-mtm-15">
                                                                            <span>Demo name</span>
                                                                            <span>Spacingtech infotech</span>
                                                                            <a href="mailto:demo@demo.com"
                                                                                class="body-primary-color">demo@demo.com</a>
                                                                            <a href="tel:(+00)123456789"
                                                                                class="body-primary-color">(+00)-123456789</a>
                                                                            <span>7882, Reliance GIDC</span>
                                                                            <span>Chowk bazzar</span>
                                                                            <span>Surat</span>
                                                                            <span>Gujarat 395006</span>
                                                                            <span>India</span>
                                                                        </div>
                                                                        <!-- acc-info shipping-address end -->
                                                                    </div>
                                                                    <div class="col-12 col-sm-6 col-xl-12">
                                                                        <!-- acc-info billing-address start -->
                                                                        <span
                                                                            class="d-inline-block heading-color heading-weight meb-22">Billing
                                                                            address</span>
                                                                        <div class="st-label d-flex mst-4 meb-11">
                                                                            <span
                                                                                class="d-inline-block st-small-label bg-dark">Home</span>
                                                                        </div>
                                                                        <div class="ul-mtm-15">
                                                                            <span>Demo name</span>
                                                                            <span>Spacingtech infotech</span>
                                                                            <a href="mailto:demo@demo.com"
                                                                                class="body-primary-color">demo@demo.com</a>
                                                                            <a href="tel:(+00)123456789"
                                                                                class="body-primary-color">(+00)-123456789</a>
                                                                            <span>7882, Reliance GIDC</span>
                                                                            <span>Chowk bazzar</span>
                                                                            <span>Surat</span>
                                                                            <span>Gujarat 395006</span>
                                                                            <span>India</span>
                                                                        </div>
                                                                        <!-- acc-info billing-address end -->
                                                                    </div>
                                                                </div>
                                                            </div> --}}
                                                            <div class="acc-detail-form">
                                                                <div class="acc-detail-field">
                                                                    <div class="row row-mtm">
                                                                        <div class="acc-field-box">
                                                                            <div class="acc-detail-hide">
                                                                                <div class="row field-row">
                                                                                    <div
                                                                                        class="col-12 col-md-6 col-xl-12 field-col">
                                                                                        <label for="name"
                                                                                            class="field-label">Your full
                                                                                            name (Required)</label>
                                                                                        <input type="text" id="name"
                                                                                            name="name" class="w-100"
                                                                                            placeholder="Your name"
                                                                                            autocomplete="name">
                                                                                    </div>
                                                                                    <div
                                                                                        class="col-12 col-md-6 col-xl-12 field-col">
                                                                                        <label for="email"
                                                                                            class="field-label">Email
                                                                                            (optional)</label>
                                                                                        <input type="email" id="email"
                                                                                            name="email" class="w-100"
                                                                                            placeholder="test@gmail.com"
                                                                                            autocomplete="email">
                                                                                    </div>
                                                                                    <div
                                                                                        class="col-12 col-md-6 col-xl-12 field-col">
                                                                                        <label for="phone"
                                                                                            class="field-label">Phone
                                                                                            Number (Required)</label>
                                                                                        <input type="text" id="phone"
                                                                                            name="phone" class="w-100"
                                                                                            placeholder="+8801XXXXXXXXX"
                                                                                            autocomplete="tel">
                                                                                    </div>
                                                                                    <div
                                                                                        class="col-12 col-md-6 col-xl-12 field-col">
                                                                                        <label for="address"
                                                                                            class="field-label">Address</label>
                                                                                        <input type="text" id="address"
                                                                                            name="address" class="w-100"
                                                                                            placeholder="Area, Upozila, District."
                                                                                            autocomplete="address">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="checkout-other-info">
                                                    <div class="acc-info mst-30 pst-30 bst">
                                                        <div
                                                            class="acc-title d-flex align-items-center justify-content-between">
                                                            <div class="row">
                                                                <div class="col-12 my-3">
                                                                    <h6 class="font-18">Payment Method</h6>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="row row-mtm15">
                                                                        @if ($paymentMethods)
                                                                            @foreach ($paymentMethods as $method)
                                                                                <div class="py-3 row align-items-center">
                                                                                    <div class="col-6">
                                                                                        <label class="cust-radio-label">
                                                                                            <input type="radio"
                                                                                                @if ($loop->last) checked @endif
                                                                                                @if (!$loop->last) disabled @endif
                                                                                                name="name"
                                                                                                value="{{ $method->id }}">
                                                                                            <span
                                                                                                class="d-block cust-check"></span>
                                                                                            <span>{{ $method->name }}</span>
                                                                                        </label>
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <img src="{{ asset('assets/images/payment/' . $method->logo) }}"
                                                                                            class="img-fluid"
                                                                                            style="height: 60px"
                                                                                            alt="{{ $method->name }}">
                                                                                    </div>
                                                                                </div>
                                                                            @endforeach
                                                                        @else
                                                                            <div class="col-12 col-md-6 col-xl-12">
                                                                                <label class="cust-radio-label">
                                                                                    <input type="radio"
                                                                                        name="payment_method"
                                                                                        value="cod">
                                                                                    <span
                                                                                        class="d-block cust-check"></span>
                                                                                    <span>Cash on delivery</span>
                                                                                </label>
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="acc-detail mst-21">
                                                            <div class="acc-detail-form">
                                                                <div class="acc-detail-field">
                                                                    <div class="row field-row">
                                                                        <div class="col-12 field-col">
                                                                            <label for="check-note"
                                                                                class="field-label">Order notes</label>
                                                                            <textarea rows="10" id="check-note" name="check-note" class="w-100" placeholder="Write your note here"
                                                                                autocomplete="off"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="acc-detail-button mst-20 mst-md-30">
                                                                    <div class="row btn-row">
                                                                        <div class="col-12 col-md-6 col-xl-12">
                                                                            <button type="submit"
                                                                                class="w-100 acc-save btn-style quaternary-btn">Confirm
                                                                                Order</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="col-12 col-xl-6 p-xl-sticky top-0">
                                            <div class="checkout-other-info ptb-30 plr-15 plr-md-30 body-bg border-full border-radius"
                                                data-animate="animate__fadeIn">
                                                <div class="acc-info">
                                                    <div
                                                        class="acc-title d-flex align-items-center justify-content-between">
                                                        <h6 class="font-18">Shipping method</h6>
                                                        <button type="button"
                                                            class="acc-edit d-none body-secondary-color icon-16"
                                                            aria-label="Edit"><i
                                                                class="ri-edit-2-line d-block lh-1"></i></button>
                                                    </div>
                                                    <div class="acc-detail mst-21">
                                                        <div class="acc-detail-info d-none">
                                                            <!-- acc-info shipping-method start -->
                                                            <div class="ul-mtm-15">
                                                                <span>Express delivery</span>
                                                                <span>Estimated delivery date: 01/04/2021 09:00 AM - 05:00
                                                                    PM</span>
                                                            </div>
                                                            <!-- acc-info shipping-method end -->
                                                        </div>
                                                        <div class="acc-detail-form">
                                                            <div class="acc-detail-field">
                                                                <div class="check-method">
                                                                    <span class="d-block meb-16">Choose a shipping
                                                                        method:</span>
                                                                    <div class="row row-mtm15">
                                                                        <div class="check-method-option">
                                                                            <div
                                                                                class="check-method-content ptb-15 plr-15 extra-bg border-radius">
                                                                                <div class="row">
                                                                                    <div class="col-9">
                                                                                        <div class="check-method-radio">
                                                                                            <label
                                                                                                class="cust-radio-label">
                                                                                                <input type="radio"
                                                                                                    name="delivery"
                                                                                                    checked>
                                                                                                <span
                                                                                                    class="d-block cust-check"></span>
                                                                                                <span>Express
                                                                                                    delivery</span>
                                                                                            </label>
                                                                                            <span
                                                                                                class="d-block mst-7">Overnight
                                                                                                one day shipping</span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-3 text-end">
                                                                                        <span
                                                                                            class="check-method-text text-danger">Paid</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="check-method-info mst-11">
                                                                                <div class="check-method-note">
                                                                                    <span
                                                                                        class="float-start heading-color heading-weight mer-5">Note:</span>
                                                                                    <span>Lorem Ipsum is simply dummy text
                                                                                        of the printing and typesetting
                                                                                        industry. Lorem Ipsum has been the
                                                                                        industry's standard dummy text ever
                                                                                        since the 1500s, when an unknown
                                                                                        printer took a galley of type and
                                                                                        scrambled it to make a type specimen
                                                                                        book.</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="check-method-option">
                                                                            <div
                                                                                class="check-method-content ptb-15 plr-15 extra-bg border-radius">
                                                                                <div class="row">
                                                                                    <div class="col-9">
                                                                                        <div class="check-method-radio">
                                                                                            <label
                                                                                                class="cust-radio-label">
                                                                                                <input type="radio"
                                                                                                    name="delivery">
                                                                                                <span
                                                                                                    class="d-block cust-check"></span>
                                                                                                <span>Standard
                                                                                                    delivery</span>
                                                                                            </label>
                                                                                            <span class="d-block mst-7">2-3
                                                                                                business days</span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-3 text-end">
                                                                                        <span
                                                                                            class="check-method-text text-success">Free</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="check-method-info d-none mst-11">
                                                                                <div class="check-method-note">
                                                                                    <span
                                                                                        class="float-start heading-color heading-weight mer-5">Note:</span>
                                                                                    <span>It has survived not only five
                                                                                        centuries, but also the leap into
                                                                                        electronic typesetting, remaining
                                                                                        essentially unchanged. It was
                                                                                        popularised in the 1960s with the
                                                                                        release of Letraset sheets
                                                                                        containing Lorem Ipsum passages, and
                                                                                        more recently with desktop
                                                                                        publishing software like Aldus
                                                                                        PageMaker including versions of
                                                                                        Lorem Ipsum.</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="check-method-option">
                                                                            <div
                                                                                class="check-method-content ptb-15 plr-15 extra-bg border-radius">
                                                                                <div class="row">
                                                                                    <div class="col-9">
                                                                                        <div class="check-method-radio">
                                                                                            <label
                                                                                                class="cust-radio-label">
                                                                                                <input type="radio"
                                                                                                    name="delivery">
                                                                                                <span
                                                                                                    class="d-block cust-check"></span>
                                                                                                <span>Pickup available
                                                                                                    store</span>
                                                                                            </label>
                                                                                            <span
                                                                                                class="d-block mst-7">Usually
                                                                                                ready in 24 hours <a
                                                                                                    href="#pickup-availability-modal"
                                                                                                    data-bs-toggle="modal"
                                                                                                    class="pickup-availability heading-weight">Check
                                                                                                    availability at your
                                                                                                    nearest
                                                                                                    stores</a></span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-3 text-end">
                                                                                        <span
                                                                                            class="check-method-text text-success">Free</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="check-method-info d-none mst-11">
                                                                                <div class="check-method-note">
                                                                                    <span
                                                                                        class="float-start heading-color heading-weight mer-5">Note:</span>
                                                                                    <span>It has survived not only five
                                                                                        centuries, but also the leap into
                                                                                        electronic typesetting, remaining
                                                                                        essentially unchanged. It was
                                                                                        popularised in the 1960s with the
                                                                                        release of Letraset sheets
                                                                                        containing Lorem Ipsum passages, and
                                                                                        more recently with desktop
                                                                                        publishing software like Aldus
                                                                                        PageMaker including versions of
                                                                                        Lorem Ipsum.</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="acc-detail-button mst-20 mst-md-30">
                                                                <div class="row btn-row">
                                                                    <div class="col-12 col-md-6 col-xl-12">
                                                                        <button type="submit"
                                                                            class="w-100 acc-save btn-style quaternary-btn">Save
                                                                            & continue</button>
                                                                    </div>
                                                                    <div class="col-12 col-md-6 col-xl-12">
                                                                        <button type="submit"
                                                                            class="w-100 acc-cancel btn-style secondary-btn">Cancel</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="acc-info mst-30 pst-30 bst">
                                                    <div
                                                        class="acc-title d-flex align-items-center justify-content-between">
                                                        <h6 class="font-18">Payment info</h6>
                                                        <button type="button"
                                                            class="acc-edit d-none body-secondary-color icon-16"
                                                            aria-label="Edit"><i
                                                                class="ri-edit-2-line d-block lh-1"></i></button>
                                                    </div>
                                                    <div class="acc-detail mst-21">
                                                        <div class="acc-detail-info d-none">
                                                            <!-- acc-info payment-info start -->
                                                            <div class="st-payment mst-25">
                                                                <div
                                                                    class="st-img-num d-flex flex-wrap align-items-center">
                                                                    <span class="width-40"><img
                                                                            src="assets/image/other/paying-maestro.png"
                                                                            class="w-100 img-fluid border-radius"
                                                                            alt="paying-maestro"></span>
                                                                    <span class="width-calc-40 psl-15">xxxx 0446</span>
                                                                </div>
                                                                <div class="st-date mst-11">Expire date 07/23</div>
                                                            </div>
                                                            <!-- acc-info payment-info end -->
                                                        </div>
                                                        <div class="acc-detail-form">
                                                            <div class="acc-detail-field">
                                                                <div class="check-method">
                                                                    <span class="d-block meb-16">Choose payment
                                                                        method:</span>
                                                                    <div class="row row-mtm15">
                                                                        <div class="check-method-option">
                                                                            <div
                                                                                class="check-method-content d-flex align-items-center justify-content-between ptb-15 plr-15 extra-bg border-radius">
                                                                                <div class="check-method-radio">
                                                                                    <label class="cust-radio-label">
                                                                                        <input type="radio"
                                                                                            name="pay" value="apple">
                                                                                        <span
                                                                                            class="d-block cust-check"></span>
                                                                                        <span>Apple pay</span>
                                                                                    </label>
                                                                                </div>
                                                                                <div
                                                                                    class="check-method-img ul-mt5 text-danger">
                                                                                    <span><img
                                                                                            src="assets/image/other/paying-apple.png"
                                                                                            class="width-40 img-fluid"
                                                                                            alt="paying-apple"></span>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="check-method-info d-none mst-11 meb-15">
                                                                                <div class="check-method-note">
                                                                                    <span
                                                                                        class="float-start heading-color heading-weight mer-5">Note:</span>
                                                                                    <span>After clicking on the button, you
                                                                                        will be directed to a secure gateway
                                                                                        for payment. After completing the
                                                                                        payment process, you will be
                                                                                        redirected back to the website to
                                                                                        view details of your order.</span>
                                                                                </div>
                                                                                <div class="check-method-btn mst-11">
                                                                                    <div class="row btn-row">
                                                                                        <div
                                                                                            class="col-12 col-md-6 col-lg-12">
                                                                                            <button type="button"
                                                                                                class="w-100 btn-style apple-btn">Pay
                                                                                                with <img
                                                                                                    src="assets/image/other/paying-applepay-btn.png"
                                                                                                    class="width-40 img-fluid"
                                                                                                    alt="paying-applepay-btn"></button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="check-method-option">
                                                                            <div
                                                                                class="check-method-content d-flex align-items-center justify-content-between ptb-15 plr-15 extra-bg border-radius">
                                                                                <div class="check-method-radio">
                                                                                    <label class="cust-radio-label">
                                                                                        <input type="radio"
                                                                                            name="pay" value="google">
                                                                                        <span
                                                                                            class="d-block cust-check"></span>
                                                                                        <span>Google pay</span>
                                                                                    </label>
                                                                                </div>
                                                                                <div
                                                                                    class="check-method-img ul-mt5 text-danger">
                                                                                    <span><img
                                                                                            src="assets/image/other/paying-gpay.png"
                                                                                            class="width-40 img-fluid"
                                                                                            alt="paying-gpay"></span>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="check-method-info d-none mst-11 meb-15">
                                                                                <div class="check-method-note">
                                                                                    <span
                                                                                        class="float-start heading-color heading-weight mer-5">Note:</span>
                                                                                    <span>After clicking on the button, you
                                                                                        will be directed to a secure gateway
                                                                                        for payment. After completing the
                                                                                        payment process, you will be
                                                                                        redirected back to the website to
                                                                                        view details of your order.</span>
                                                                                </div>
                                                                                <div class="check-method-btn mst-11">
                                                                                    <div class="row btn-row">
                                                                                        <div
                                                                                            class="col-12 col-md-6 col-lg-12">
                                                                                            <button type="button"
                                                                                                class="w-100 btn-style google-btn">Pay
                                                                                                with <img
                                                                                                    src="assets/image/other/paying-gpay-btn.png"
                                                                                                    class="width-40 img-fluid"
                                                                                                    alt="paying-gpay-btn"></button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="check-method-option">
                                                                            <div
                                                                                class="check-method-content d-flex align-items-center justify-content-between ptb-15 plr-15 extra-bg border-radius">
                                                                                <div class="check-method-radio">
                                                                                    <label class="cust-radio-label">
                                                                                        <input type="radio"
                                                                                            name="pay" value="bank">
                                                                                        <span
                                                                                            class="d-block cust-check"></span>
                                                                                        <span>Net banking</span>
                                                                                    </label>
                                                                                </div>
                                                                                <div
                                                                                    class="check-method-img ul-mt5 text-danger">
                                                                                    <span><img
                                                                                            src="assets/image/other/paying-bank.png"
                                                                                            class="width-40 img-fluid"
                                                                                            alt="paying-bank"></span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="check-method-info d-none mst-11">
                                                                                <div class="check-method-note">
                                                                                    <span
                                                                                        class="float-start heading-color heading-weight mer-5">Note:</span>
                                                                                    <span>After clicking on the button, you
                                                                                        will be directed to a secure gateway
                                                                                        for payment. After completing the
                                                                                        payment process, you will be
                                                                                        redirected back to the website to
                                                                                        view details of your order.</span>
                                                                                </div>
                                                                                <div
                                                                                    class="check-method-btn mst-12 meb-15">
                                                                                    <div class="row row-mtm15">
                                                                                        <div class="col-12">
                                                                                            <div class="row field-row">
                                                                                                <div
                                                                                                    class="col-12 field-col">
                                                                                                    <label for="bank"
                                                                                                        class="field-label">Bank</label>
                                                                                                    <select id="bank"
                                                                                                        name="bank"
                                                                                                        class="w-100"
                                                                                                        autocomplete="off">
                                                                                                        <option selected
                                                                                                            disabled>
                                                                                                            --Select your
                                                                                                            bank--</option>
                                                                                                        <option>Bank 1
                                                                                                        </option>
                                                                                                        <option>Bank 2
                                                                                                        </option>
                                                                                                        <option>Bank 3
                                                                                                        </option>
                                                                                                        <option>Bank 4
                                                                                                        </option>
                                                                                                        <option>Bank 5
                                                                                                        </option>
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-12">
                                                                                            <div class="row btn-row">
                                                                                                <div
                                                                                                    class="col-12 col-md-6 col-lg-12 field-col">
                                                                                                    <button type="button"
                                                                                                        class="w-100 btn-style bank-btn">Proceed
                                                                                                        payment <img
                                                                                                            src="assets/image/other/paying-bank-btn.png"
                                                                                                            class="width-40 img-fluid"
                                                                                                            alt="paying-bank-btn"></button>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="check-method-option">
                                                                            <div
                                                                                class="check-method-content d-flex align-items-center justify-content-between ptb-15 plr-15 extra-bg border-radius">
                                                                                <div class="check-method-radio">
                                                                                    <label class="cust-radio-label">
                                                                                        <input type="radio"
                                                                                            name="pay" value="paypal">
                                                                                        <span
                                                                                            class="d-block cust-check"></span>
                                                                                        <span>Paypal pay</span>
                                                                                    </label>
                                                                                </div>
                                                                                <div
                                                                                    class="check-method-img ul-mt5 text-danger">
                                                                                    <span><img
                                                                                            src="assets/image/other/paying-paypal.png"
                                                                                            class="width-40 img-fluid"
                                                                                            alt="paying-paypal"></span>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="check-method-info d-none mst-11 meb-15">
                                                                                <div class="check-method-note">
                                                                                    <span
                                                                                        class="float-start heading-color heading-weight mer-5">Note:</span>
                                                                                    <span>After clicking on the button, you
                                                                                        will be directed to a secure gateway
                                                                                        for payment. After completing the
                                                                                        payment process, you will be
                                                                                        redirected back to the website to
                                                                                        view details of your order.</span>
                                                                                </div>
                                                                                <div class="check-method-btn mst-11">
                                                                                    <div class="row">
                                                                                        <div class="col-12 mst-1 meb-16">
                                                                                            <span
                                                                                                class="d-block heading-color heading-weight meb-7">Select
                                                                                                your paypal account
                                                                                                type</span>
                                                                                            <div class="ul-mt30">
                                                                                                <label
                                                                                                    class="cust-radio-label">
                                                                                                    <input type="radio"
                                                                                                        id="domestic"
                                                                                                        name="account"
                                                                                                        value="type"
                                                                                                        checked>
                                                                                                    <span
                                                                                                        class="d-block cust-check"></span>
                                                                                                    <span>Domestic</span>
                                                                                                </label>
                                                                                                <label
                                                                                                    class="cust-radio-label">
                                                                                                    <input type="radio"
                                                                                                        id="international"
                                                                                                        name="account"
                                                                                                        value="type">
                                                                                                    <span
                                                                                                        class="d-block cust-check"></span>
                                                                                                    <span>International</span>
                                                                                                </label>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-12">
                                                                                            <div class="row btn-row">
                                                                                                <div
                                                                                                    class="col-12 col-md-6 col-lg-12 field-col">
                                                                                                    <button type="button"
                                                                                                        class="w-100 btn-style paypal-btn">Pay
                                                                                                        with <img
                                                                                                            src="assets/image/other/paying-paypal-btn.png"
                                                                                                            class="width-40 img-fluid"
                                                                                                            alt="paying-paypal-btn"></button>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="check-method-option">
                                                                            <div
                                                                                class="check-method-content d-flex align-items-center justify-content-between ptb-15 plr-15 extra-bg border-radius">
                                                                                <div class="check-method-radio">
                                                                                    <label class="cust-radio-label">
                                                                                        <input type="radio"
                                                                                            name="pay" value="card"
                                                                                            checked>
                                                                                        <span
                                                                                            class="d-block cust-check"></span>
                                                                                        <span>Card pay</span>
                                                                                    </label>
                                                                                </div>
                                                                                <div
                                                                                    class="check-method-img ul-mt5 text-danger">
                                                                                    <span><img
                                                                                            src="assets/image/other/paying-maestro.png"
                                                                                            class="width-40 img-fluid"
                                                                                            alt="paying-maestro"></span>
                                                                                    <span><img
                                                                                            src="assets/image/other/paying-visa.png"
                                                                                            class="width-40 img-fluid"
                                                                                            alt="paying-visa"></span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="check-method-info mst-11">
                                                                                <div class="check-method-note">
                                                                                    <span
                                                                                        class="float-start heading-color heading-weight mer-5">Note:</span>
                                                                                    <span>After clicking on the button, you
                                                                                        will be directed to a secure gateway
                                                                                        for payment. After completing the
                                                                                        payment process, you will be
                                                                                        redirected back to the website to
                                                                                        view details of your order.</span>
                                                                                </div>
                                                                                <div class="check-method-card mst-22">
                                                                                    <div class="card-wrapper mtb-26"></div>
                                                                                    <div class="check-method-field">
                                                                                        <div class="row field-row">
                                                                                            <div
                                                                                                class="col-12 col-md-6 col-xl-12 field-col">
                                                                                                <label for="cardnumber"
                                                                                                    class="field-label">Card
                                                                                                    number</label>
                                                                                                <input type="text"
                                                                                                    id="cardnumber"
                                                                                                    name="cardnumber"
                                                                                                    class="w-100"
                                                                                                    placeholder="Card number"
                                                                                                    autocomplete="cc-number">
                                                                                            </div>
                                                                                            <div
                                                                                                class="col-12 col-md-6 col-xl-12 field-col">
                                                                                                <label for="ccname"
                                                                                                    class="field-label">Card
                                                                                                    Name</label>
                                                                                                <input type="text"
                                                                                                    id="ccname"
                                                                                                    name="ccname"
                                                                                                    class="w-100"
                                                                                                    placeholder="Card name"
                                                                                                    autocomplete="cc-name">
                                                                                            </div>
                                                                                            <div
                                                                                                class="col-12 col-md-6 col-xl-12 field-col">
                                                                                                <label for="exp-date"
                                                                                                    class="field-label">Expire
                                                                                                    date</label>
                                                                                                <input type="text"
                                                                                                    id="exp-date"
                                                                                                    name="exp-date"
                                                                                                    class="w-100"
                                                                                                    placeholder="MM/YY"
                                                                                                    autocomplete="cc-exp">
                                                                                            </div>
                                                                                            <div
                                                                                                class="col-12 col-md-6 col-xl-12 field-col">
                                                                                                <label for="cvc"
                                                                                                    class="field-label">CVV
                                                                                                    code</label>
                                                                                                <input type="text"
                                                                                                    id="cvc"
                                                                                                    name="cvc"
                                                                                                    class="w-100"
                                                                                                    placeholder="CVV"
                                                                                                    autocomplete="cc-csc">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="acc-detail-button mst-20 mst-md-30">
                                                                <div class="row btn-row">
                                                                    <div class="col-12 col-md-6 col-xl-12">
                                                                        <button type="submit"
                                                                            class="w-100 acc-save btn-style quaternary-btn">Save
                                                                            & continue</button>
                                                                    </div>
                                                                    <div class="col-12 col-md-6 col-xl-12">
                                                                        <button type="submit"
                                                                            class="w-100 acc-cancel btn-style secondary-btn">Cancel</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="checkout-btn d-flex flex-column flex-md-row-reverse justify-content-md-between ptb-30 plr-15 plr-md-30 mst-30 extra-bg border-radius"
                            data-animate="animate__fadeIn">
                            <button type="button" onclick="window.location.href='order-complete.html'"
                                class="width-100 width-md-auto btn-style secondary-btn">Place order</button>
                            <a href="cart-page.html"
                                class="body-primary-color d-flex align-items-center justify-content-center mst-15 mst-md-0"><i
                                    class="ri-arrow-left-line d-block icon-16 mer-5 lh-1"></i>Return to
                                cart</a>
                        </div>
                    </div>
                </form>
                <!-- pickup-availability-modal start -->
                <div class="pickup-availability-modal modal fade" id="pickup-availability-modal"
                    data-bs-backdrop="static">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content body-bg border-0 br-hidden">
                            <div class="modal-body ptb-30 plr-15 plr-md-30">
                                <div
                                    class="pickup-availability-modal-header d-flex align-items-center justify-content-between meb-30">
                                    <h6 class="font-18">Store details</h6>
                                    <button type="button" class="body-secondary-color icon-16" data-bs-dismiss="modal"
                                        aria-label="Close"><i class="ri-close-large-line d-block lh-1"></i></button>
                                </div>
                                <div class="pickup-availability-modal-content">
                                    <div class="row row-mtm15">
                                        <div class="col-12 col-md-6">
                                            <div class="ul-mt15 pickup-availability-modal-info">
                                                <div class="pickup-availability-modal-img width-88">
                                                    <img src="assets/image/cart/cart-1.jpg"
                                                        class="w-100 img-fluid border-radius" alt="cart-1">
                                                </div>
                                                <div class="pickup-availability-modal-text width-calc-88">
                                                    <span class="d-block">Pleated skater skirt</span>
                                                    <span class="d-block mst-7">XS / Aliceblue</span>
                                                    <span class="d-block mst-7">Polyester</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="ul-mt15 pickup-availability-modal-info">
                                                <div class="pickup-availability-modal-img width-88">
                                                    <img src="assets/image/cart/cart-2.jpg"
                                                        class="w-100 img-fluid border-radius" alt="cart-2">
                                                </div>
                                                <div class="pickup-availability-modal-text width-calc-88">
                                                    <span class="d-block">Tailored blazer jacket</span>
                                                    <span class="d-block mst-7">38 / Azure</span>
                                                    <span class="d-block mst-7">Wool blend</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="ul-mt15 pickup-availability-modal-info">
                                                <div class="pickup-availability-modal-img width-88">
                                                    <img src="assets/image/cart/cart-3.jpg"
                                                        class="w-100 img-fluid border-radius" alt="cart-3">
                                                </div>
                                                <div class="pickup-availability-modal-text width-calc-88">
                                                    <span class="d-block">Girls floral ruffle top</span>
                                                    <span class="d-block mst-7">2Y / Aliceblue</span>
                                                    <span class="d-block mst-7">Cotton</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="ul-mt15 pickup-availability-modal-info">
                                                <div class="pickup-availability-modal-img width-88">
                                                    <img src="assets/image/cart/cart-4.jpg"
                                                        class="w-100 img-fluid border-radius" alt="cart-4">
                                                </div>
                                                <div class="pickup-availability-modal-text width-calc-88">
                                                    <span class="d-block">Classic cotton t-shirt</span>
                                                    <span class="d-block mst-7">S / Azure</span>
                                                    <span class="d-block mst-7">Cotton</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pickup-availability-warehouse mst-30 pst-30 bst">
                                        <div class="row row-mtm">
                                            <div class="col-12 col-md-6">
                                                <div class="pickup-warehouse-detail d-flex flex-column align-items-start">
                                                    <span
                                                        class="d-inline-block st-small-label bg-dark meb-11">Warehouse</span>
                                                    <div class="ul-mtm-15">
                                                        <span>603, Upper ground</span>
                                                        <span>Textile hub-a</span>
                                                        <span>Kumbharia gam</span>
                                                        <span>Surat</span>
                                                        <span>Gujarat 395010</span>
                                                        <span>India</span>
                                                    </div>
                                                    <div class="pickup-warehouse-location mst-12">
                                                        <a href="https://www.google.com/maps/place/Amazon+Warehouse+Surat/@21.1865297,72.89381,17z/data=!3m1!4b1!4m16!1m9!4m8!1m0!1m6!1m2!1s0x3be04ff9cd701dd5:0x97c4510627e193c0!2sNear,+603,Upper+Ground+Sangini+Textile+Hub-A,+Kumbharia+Gam,+Surat,+Gujarat+395010!2m2!1d72.8963849!2d21.1865247!3m5!1s0x3be04ff9cd701dd5:0x97c4510627e193c0!8m2!3d21.1865247!4d72.8963849!16s%2Fg%2F11j7dbvx1f?entry=ttu"
                                                            target="_blank"><i
                                                                class="ri-map-pin-range-line icon-16 mer-4"></i><span
                                                                class="heading-weight">Show on google map</span></a>
                                                    </div>
                                                    <div
                                                        class="pickup-warehouse-available body-bg ptb-15 plr-15 mst-20 br-hidden">
                                                        <span class="d-block primary-color">Pickup available, usually ready
                                                            in 24 hours.</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="pickup-warehouse-detail d-flex flex-column align-items-start">
                                                    <span
                                                        class="d-inline-block st-small-label bg-dark meb-11">Office</span>
                                                    <div class="ul-mtm-15">
                                                        <span>603, Lower ground</span>
                                                        <span>Textile hub-a</span>
                                                        <span>Parvat patiya</span>
                                                        <span>Surat</span>
                                                        <span>Gujarat 395010</span>
                                                        <span>India</span>
                                                    </div>
                                                    <div class="pickup-warehouse-location mst-12">
                                                        <a href="https://www.google.com/maps/place/Flipkart+office/@21.2012,72.8584772,14z/data=!4m6!3m5!1s0x3be04f27a169a48f:0xe96601a01f37955e!8m2!3d21.1945842!4d72.869188!16s%2Fg%2F11l27rf17v?entry=ttu"
                                                            target="_blank"><i
                                                                class="ri-map-pin-range-line icon-16 mer-4"></i><span
                                                                class="heading-weight">Show on google map</span></a>
                                                    </div>
                                                    <div
                                                        class="pickup-warehouse-available body-bg ptb-15 plr-15 mst-20 br-hidden">
                                                        <span class="d-block primary-color">Pickup available, usually ready
                                                            in 24 hours.</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- pickup-availability-modal end -->
            </section>
            <!-- checkout end -->
        </main>
        <!-- collections start -->
    </main>
@endsection
