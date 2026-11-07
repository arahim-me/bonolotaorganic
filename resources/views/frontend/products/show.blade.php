@extends('layouts.master')
@section('title', $product->name ?? '-')
@section('master')
    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area ptb-30 bg-img text-center"
        data-bgimg="{{ asset('frontend') }}/assets/image/other/breadcrumb-bgimg.jpg">
        <div class="container">
            <span class="d-block extra-color"><a href="index-2.html" class="extra-color">Products</a> /
                {{ $product->name }}</span>
            <h2 class="extra-color font-24 font-xl-32 mst-5 mst-xl-9">{{ $product->name }}</h2>
        </div>
    </div>
    <!-- breadcrumb-area end -->
    <!-- main start -->
    <main id="main">
        <!-- product-detail start -->
        <section class="product-detail section-pt">
            <div class="container">
                <div class="row row-mtm align-items-lg-start">
                    <div class="col-12 col-lg-6 p-lg-sticky top-0">
                        <!-- product-detail-slider start -->
                        <div class="product-detail-slider">
                            <div class="row ul-mt15">
                                <div class="col-12" data-animate="animate__fadeIn">
                                    <!-- product-img-big start -->
                                    <div class="product-img-big slider-big-h position-relative br-hidden">
                                        <div class="swiper" id="slider-big-h">
                                            <div class="swiper-wrapper product-swiper-wrapper">
                                                @if ($product->images)
                                                    @forelse($product->images as $img)
                                                        <div class="swiper-slide product-swiper-slide">
                                                            <div class="product-item-img position-relative">
                                                                <a href="{{ asset('uploads') }}/assets/image/product/product-1.jpg"
                                                                    class="full-view product-thumbnail heading-color position-absolute top-0 end-0 width-40 height-40 d-flex align-items-center justify-content-center body-bg z-1 mst-15 mer-15 rounded-circle box-shadow"
                                                                    aria-label="Image full view"><i
                                                                        class="ri-fullscreen-line d-block lh-1"></i></a>
                                                                <img src="{{ asset('frontend') }}/assets/image/product/product-1.jpg"
                                                                    data-zoom="{{ asset('frontend') }}/assets/image/product/product-1.jpg"
                                                                    class="w-100 img-fluid zoom" alt="product-1">
                                                            </div>
                                                        </div>
                                                    @empty
                                                        <div class="swiper-slide product-swiper-slide">
                                                            <div class="product-item-img position-relative">
                                                                <a href="{{ asset('uploads/products') }}/{{ $product->thumbnail ?? 'default.png' }}"
                                                                    class="full-view product-thumbnail heading-color position-absolute top-0 end-0 width-40 height-40 d-flex align-items-center justify-content-center body-bg z-1 mst-15 mer-15 rounded-circle box-shadow"
                                                                    aria-label="Image full view"><i
                                                                        class="ri-fullscreen-line d-block lh-1"></i></a>
                                                                <img src="{{ asset('uploads/products') }}/{{ $product->thumbnail ?? 'default.png' }}"
                                                                    data-zoom="{{ asset('uploads/products') }}/{{ $product->thumbnail ?? 'default.png' }}"
                                                                    class="w-100 img-fluid zoom" alt="product-1">
                                                            </div>
                                                        </div>
                                                    @endforelse
                                                @else
                                                    <div class="swiper-slide product-swiper-slide">
                                                        <div class="product-item-img position-relative">
                                                            <a href="{{ asset('uploads/products') }}/{{ $product->thumbnail ?? 'default.png' }}"
                                                                class="full-view product-thumbnail heading-color position-absolute top-0 end-0 width-40 height-40 d-flex align-items-center justify-content-center body-bg z-1 mst-15 mer-15 rounded-circle box-shadow"
                                                                aria-label="Image full view"><i
                                                                    class="ri-fullscreen-line d-block lh-1"></i></a>
                                                            <img src="{{ asset('uploads/products') }}/{{ $product->thumbnail ?? 'default.png' }}"
                                                                data-zoom="{{ asset('uploads/products') }}/{{ $product->thumbnail ?? 'default.png' }}"
                                                                class="w-100 img-fluid zoom" alt="product-1">
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="swiper-buttons">
                                            <button type="button"
                                                class="swiper-prev swiper-prev-big tertiary-btn icon-16 width-32 height-32 position-absolute top-50 translate-middle-y z-1 rounded-circle"
                                                aria-label="Arrow previous"><i
                                                    class="ri-arrow-left-line d-block lh-1"></i></button>
                                            <button type="button"
                                                class="swiper-next swiper-next-big tertiary-btn icon-16 width-32 height-32 position-absolute top-50 translate-middle-y z-1 rounded-circle"
                                                aria-label="Arrow next"><i
                                                    class="ri-arrow-right-line d-block lh-1"></i></button>
                                        </div>
                                    </div>
                                    <!-- product-img-big end -->
                                </div>
                                <div class="col-12" data-animate="animate__fadeIn">
                                    <!-- product-img-small start -->
                                    <div class="product-img-small slider-small-h">
                                        <div class="swiper" id="slider-small-h">
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide product-swiper-slide">
                                                    <div class="product-item-img br-hidden">
                                                        <a href="javascript:void(0)" class="d-block product-thumbnail">
                                                            <img src="{{ asset('frontend') }}/assets/image/product/product-1.jpg"
                                                                class="w-100 img-fluid" alt="product-1">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide product-swiper-slide">
                                                    <div class="product-item-img br-hidden">
                                                        <a href="javascript:void(0)" class="d-block product-thumbnail">
                                                            <img src="{{ asset('frontend') }}/assets/image/product/product-2.jpg"
                                                                class="w-100 img-fluid" alt="product-2">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide product-swiper-slide">
                                                    <div class="product-item-img br-hidden">
                                                        <a href="javascript:void(0)" class="d-block product-thumbnail">
                                                            <img src="{{ asset('frontend') }}/assets/image/product/product-3.jpg"
                                                                class="w-100 img-fluid" alt="product-3">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide product-swiper-slide">
                                                    <div class="product-item-img br-hidden">
                                                        <a href="javascript:void(0)" class="d-block product-thumbnail">
                                                            <img src="{{ asset('frontend') }}/assets/image/product/product-4.jpg"
                                                                class="w-100 img-fluid" alt="product-4">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide product-swiper-slide">
                                                    <div class="product-item-img br-hidden">
                                                        <a href="javascript:void(0)" class="d-block product-thumbnail">
                                                            <img src="{{ asset('frontend') }}/assets/image/product/product-5.jpg"
                                                                class="w-100 img-fluid" alt="product-5">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- product-img-small end -->
                                </div>
                            </div>
                        </div>
                        <!-- product-detail-slider end -->
                    </div>
                    <div class="col-12 col-lg-6 p-lg-sticky top-0">
                        <!-- product-detail-info start -->
                        <div class="product-detail-info psl-xxl-20">
                            <div class="product-info" data-animate="animate__fadeIn">
                                <div class="product-title">
                                    <h2 class="font-24 font-xl-32">{{ $product->name }}</h2>
                                </div>
                            </div>
                            <div class="product-info mst-15" data-animate="animate__fadeIn">
                                <div class="product-ratting">
                                    <div class="pro-review-write">
                                        <div class="pro-review">
                                            <span class="review-ratting">
                                                <span class="review-star icon-16">
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                </span>
                                                <span class="review-average">4.0<span class="review-caption">Based on
                                                        {{ $reviews->count() }}
                                                        reviews</span></span>
                                            </span>
                                        </div>
                                        <div class="pro-write">
                                            <a href="#reviews"><i class="ri-ball-pen-line icon-16 mer-4"></i><span
                                                    class="text-decoration-underline heading-weight">Write a
                                                    review</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="product-info mst-20" data-animate="animate__fadeIn">
                                    <div class="product-view">
                                        <span class="heading-color"><i class="ri-eye-line icon-16 mer-4 blinking"></i>Hot right now - <span class="product-live-visitor primary-color heading-weight"></span> views at this item</span>
                                    </div>
                                </div> --}}
                            {{-- <div class="product-info mst-10" data-animate="animate__fadeIn">
                                    <div class="product-timer">
                                        <div class="product-timer-countdown">
                                            <span class="heading-color"><i class="ri-timer-line text-danger icon-16 mer-4"></i>Limited time deal -
                                                <span class="countdown" data-time="2027/12/31 00:00:00">
                                                    <span class="text-danger"><span class="day heading-weight"></span>d</span>
                                                    <span class="text-danger"><span class="hrs heading-weight"></span>h</span>
                                                    <span class="text-danger"><span class="min heading-weight"></span>m</span>
                                                    <span class="text-danger"><span class="sec heading-weight"></span>s</span>
                                                </span> shop before it's over
                                            </span>
                                        </div>
                                    </div>
                                </div> --}}
                            <div class="product-info mst-10" data-animate="animate__fadeIn">
                                <div class="product-price">
                                    <div class="pro-price-box">
                                        <span
                                            class="new-price primary-color font-32 heading-weight">৳{{ number_format($product->price, 2) }}</span>
                                        <span class="old-price font-24 heading-weight">
                                            <span class="text-uppercase">M.r.p</span>
                                            <span
                                                class="text-decoration-line-through">৳{{ number_format($product->old_price, 2) }}</span>
                                        </span>
                                        <span
                                            class="discount-price text-danger font-20">{{ $product->discount ?? '' }}</span>
                                        <span class="font-12">inclusive of all taxes.</span>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="product-info mst-15" data-animate="animate__fadeIn">
                                    <div class="product-availability">
                                        <span class="d-inline-block text-success"><span class="heading-color heading-weight">Availability:</span> In stock</span>
                                    </div>
                                </div>
                                <div class="product-info mst-10" data-animate="animate__fadeIn">
                                    <div class="product-stock">
                                        <span class="d-inline-block stock-fill"><span class="text-success"><span class="available-stock">66</span> units left</span> - grab yours before it's too late</span>
                                        <div class="product-stock-bar product-stock-fill mst-8 br-hidden"></div>
                                    </div>
                                </div>
                                <div class="product-info mst-15" data-animate="animate__fadeIn">
                                    <div class="product-sold">
                                        <span class="text-danger"><i class="ri-fire-line icon-16 mer-4 blinking"></i>People are loving this - <span class="product-sold-count heading-weight"></span> sold recently in <span class="product-hours-count heading-weight"></span> hours</span>
                                    </div>
                                </div>
                                <div class="product-info mst-25" data-animate="animate__fadeIn">
                                    <div class="product-border bst"></div>
                                </div>
                                <div class="product-info mst-20" data-animate="animate__fadeIn">
                                    <div class="product-desc">
                                        <p>Twirl into style with this pleated skater skirt, designed for movement and charm. Its flattering silhouette and lightweight fabric make it a go-to piece for casual days or dressed-up moments. Comfortable, chic, and endlessly versatile.</p>
                                    </div>
                                </div>
                                <div class="product-info mst-15" data-animate="animate__fadeIn">
                                    <div class="product-offer">
                                        <span class="d-inline-block heading-color meb-11 heading-weight">Available Offers for you</span>
                                        <div class="row ul-mt5">
                                            <div class="col-12">
                                                <div class="product-offer-block ptb-8 plr-8 br-hidden">
                                                    <span class="d-block">Get up to <span class="primary-color heading-weight">50% off</span> on selected products! Limited time offer! <a href="collection.html" class="heading-color font-14 text-decoration-underline">View details</a></span>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="product-offer-block ptb-8 plr-8 br-hidden">
                                                    <span class="d-block">Buy 2 and get 15% off on all products!, Use code <span class="primary-color heading-weight">"BUY2SAVE"</span> <a href="collection.html" class="heading-color font-14 text-decoration-underline">View details</a></span>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="product-offer-block ptb-8 plr-8 br-hidden">
                                                    <span class="d-block">Get 11% off your first order!, Use code <span class="primary-color heading-weight">"11%OFF"</span> <a href="collection.html" class="heading-color font-14 text-decoration-underline">View details</a></span>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="product-offer-block ptb-8 plr-8 br-hidden">
                                                    <span class="d-block">Add 6 items to your cart and unlock a <span class="primary-color heading-weight">"50% discount"</span>  instantly at checkout! <a href="collection.html" class="heading-color font-14 text-decoration-underline">View details</a></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                            <div class="product-info mst-20" data-animate="animate__fadeIn">
                                <div class="product-variant">
                                    <div class="product-variant-option">
                                        <span class="d-inline-block meb-11"><span
                                                class="heading-color heading-weight">Size:</span> Choose a size<a
                                                href="#size-modal" data-bs-toggle="modal" class="msl-15 msl-md-30"><i
                                                    class="ri-pencil-ruler-line icon-16 mer-4"></i><span
                                                    class="text-decoration-underline heading-weight">Size
                                                    guide</span></a></span>
                                        <div class="product-option-block size">
                                            <ul class="ul-mt5">
                                                @if ($product->sizes)
                                                    @foreach ($product->sizes as $size)
                                                        <li>
                                                            <label class="cust-checkbox-label">
                                                                <input type="radio" name="size"
                                                                    @if ($loop->first) checked @endif
                                                                    class="cust-checkbox" value="{{ $size }}">
                                                                <span
                                                                    class="d-flex align-items-center justify-content-center cust-check">{{ $size }}</span>
                                                            </label>
                                                        </li>
                                                    @endforeach
                                                @else
                                                    <li>No sizes available</li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-variant-option mst-15">
                                        <span class="d-inline-block meb-11"><span
                                                class="heading-color heading-weight">Color:</span> Choose a color</span>
                                        <div class="product-option-block color">
                                            <ul class="ul-mt10">
                                                @if ($product->colors)
                                                    @foreach ($product->colors as $color)
                                                        <li>
                                                            <label class="cust-checkbox-label">
                                                                <input type="radio" name="color"
                                                                    @if ($loop->first) checked @endif
                                                                    class="cust-checkbox" value="{{ $color }}">
                                                                <span
                                                                    class="d-block cust-check {{ $color }}"></span>
                                                            </label>
                                                        </li>
                                                    @endforeach
                                                @else
                                                    <li>No colors available</li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-variant-option mst-15">
                                        <span class="d-inline-block"><span
                                                class="heading-color heading-weight">Material:</span>
                                            {{ $product->type }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="product-info mst-15" data-animate="animate__fadeIn">
                                <div class="product-quantity-action">
                                    <div class="product-quantity d-flex align-items-center">
                                        <span class="mer-4"><span
                                                class="heading-color heading-weight">Quantity:</span></span>
                                        <div class="js-qty-wrapper">
                                            <div class="js-qty-wrap d-flex body-bg border-full br-hidden">
                                                <button type="button"
                                                    class="js-qty-adjust js-qty-adjust-minus body-color icon-16"
                                                    aria-label="Remove item"><i
                                                        class="ri-subtract-line d-block lh-1"></i></button>
                                                <input type="number" name="qty"
                                                    class="js-qty-num p-0 text-center border-0" value="1"
                                                    min="1">
                                                <button type="button"
                                                    class="js-qty-adjust js-qty-adjust-plus body-color icon-16"
                                                    aria-label="Add item"><i
                                                        class="ri-add-line d-block lh-1"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-action mst-15">
                                        <div class="row btn-row15">
                                            <div class="col-12 col-md-6">
                                                <button type="submit" class="w-100 btn-style quaternary-btn add-to-cart"
                                                    data-cart-id="{{ $product->id }}"
                                                    data-cart-name="{{ $product->name }}"
                                                    data-cart-price="{{ $product->price }}" data-cart-currency="৳"
                                                    data-cart-image="{{ asset('uploads/products') }}/{{ $product->thumbnail ?? 'default.png' }}"
                                                    data-cart-url="{{ route('products.show', $product->id) }}">
                                                    <span class="product-icon">
                                                        <span class="product-bag-icon">Add to cart</span>
                                                        <span class="product-loader-icon icon-16"><i
                                                                class="ri-loader-4-line d-block lh-1"></i></span>
                                                        <span class="product-check-icon icon-16"><i
                                                                class="ri-check-line d-block lh-1"></i></span>
                                                    </span>
                                                </button>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <a href="{{ route('checkout') }}"
                                                    class="w-100 btn-style secondary-btn">Buy now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-info mst-15" data-animate="animate__fadeIn">
                                <div class="ul-row">
                                    <div class="product-wishlist">
                                        <a href="javascript:void(0)" class="add-to-wishlist heading-color"><i
                                                class="ri-heart-line icon-16 mer-4"></i><span
                                                class="heading-weight">Wishlist</span></a>
                                    </div>
                                    <div class="product-compare">
                                        <a href="product-comparison.html" class="add-to-compare heading-color"><i
                                                class="ri-stack-line icon-16 mer-4"></i><span
                                                class="heading-weight">Compare</span></a>
                                    </div>
                                    <div class="product-ask">
                                        <a href="#question-modal" data-bs-toggle="modal"
                                            class="ask-question heading-color"><i
                                                class="ri-edit-box-line icon-16 mer-4"></i><span
                                                class="heading-weight">Ask a question</span></a>
                                    </div>
                                    <div class="product-share">
                                        <a href="#share-modal" data-bs-toggle="modal" class="share heading-color"><i
                                                class="ri-share-line icon-16 mer-4"></i><span
                                                class="heading-weight">Share</span></a>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="product-info mst-20" data-animate="animate__fadeIn">
                                <div class="product-pincode">
                                    <span class="d-inline-block heading-color meb-11 heading-weight">Select delivery
                                        location</span>
                                    <div class="product-pincode-option">
                                        <form method="get" action="javascript:void(0)" class="search-form">
                                            <div class="search-bar">
                                                <div class="form-search">
                                                    <div
                                                        class="product-pincode-section d-flex extra-bg plr-15 border-radius">
                                                        <input type="text" id="product-pincode-input"
                                                            name="product-pincode-input"
                                                            class="w-100 p-0 border-0 rounded-0"
                                                            placeholder="Enter your pincode" autocomplete="postal-code">
                                                        <button type="submit"
                                                            class="body-secondary-color text-uppercase text-nowrap heading-weight rounded-0"
                                                            id="product-pincode-checkbtn">Check</button>
                                                    </div>
                                                    <div class="font-12 mst-7">(e.g, 560001, 90210, SW1A, 10001, 400050)
                                                    </div>
                                                    <div class="product-pincode-resultavailable d-none mst-10"
                                                        id="product-pincode-resultavailable">
                                                        <span><span class="text-success">Delivery available at <span
                                                                    class="heading-weight"
                                                                    id="product-pincode-available"></span></span>. Delivery
                                                            in <span class="heading-color heading-weight">4-6</span>
                                                            business days. Cash on delivery: <span
                                                                id="product-pincode-codstatus"></span></span>
                                                    </div>
                                                    <div class="product-pincode-resultunavailable d-none mst-10"
                                                        id="product-pincode-resultunavailable">
                                                        <span class="text-danger">Delivery not available at <span
                                                                class="heading-weight"
                                                                id="product-pincode-unavailable"></span></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="product-info mst-20" data-animate="animate__fadeIn">
                                <div class="product-frequent">
                                    <span class="d-inline-block heading-color meb-11 heading-weight">Pairs well with</span>
                                    <div class="frequent">
                                        <div class="frequent-group">
                                            <form method="post" action="javascript:void(0)" class="frequent-form">
                                                <div class="row row-mtm-20">
                                                    <div class="col-12">
                                                        <div class="frequent-detail">
                                                            <div class="frequent-image">
                                                                <ul class="d-flex flex-wrap">
                                                                    <li class="col-4">
                                                                        <span class="d-block freq-img active">
                                                                            <img src="{{ asset('frontend') }}/assets/image/product/frequent-1.jpg"
                                                                                class="w-100 img-fluid ptb-3 plr-3 border-full border-radius"
                                                                                alt="frequent-1"
                                                                                data-img-id="pleated-skater-skirt">
                                                                        </span>
                                                                    </li>
                                                                    <li class="col-4">
                                                                        <span class="d-block freq-img">
                                                                            <img src="{{ asset('frontend') }}/assets/image/product/frequent-2.jpg"
                                                                                class="w-100 img-fluid ptb-3 plr-3 border-full border-radius"
                                                                                alt="frequent-2"
                                                                                data-img-id="tailored-blazer-jacket">
                                                                        </span>
                                                                    </li>
                                                                    <li class="col-4">
                                                                        <span class="d-block freq-img">
                                                                            <img src="{{ asset('frontend') }}/assets/image/product/frequent-3.jpg"
                                                                                class="w-100 img-fluid ptb-3 plr-3 border-full border-radius"
                                                                                alt="frequent-3"
                                                                                data-img-id="girls-floral-ruffle-top">
                                                                        </span>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="frequent-info mst-15">
                                                                <button type="button"
                                                                    class="w-100 btn-style secondary-btn freq-select-btn meb-15">Select
                                                                    all</button>
                                                                <button type="button"
                                                                    class="w-100 btn-style secondary-btn freq-deselect-btn meb-15">Deselect
                                                                    all</button>
                                                                <div class="row row-mtm15">
                                                                    <div class="frequent-content">
                                                                        <label
                                                                            class="cust-checkbox-label heading-color disabled">
                                                                            <input type="checkbox"
                                                                                id="pleated-skater-skirt"
                                                                                name="pleated-skater-skirt"
                                                                                class="cust-checkbox"
                                                                                data-img-id="gleam-band" checked disabled>
                                                                            <span class="d-block cust-check"></span>
                                                                            <span class="freq-title">Pleated skater
                                                                                skirt</span>
                                                                            <span class="freq-price">
                                                                                <span
                                                                                    class="freq-price-box heading-weight">
                                                                                    <span
                                                                                        class="freq-new-price primary-color"
                                                                                        data-new-price="$79.00">$0.00</span>
                                                                                    <span
                                                                                        class="freq-old-price body-color text-decoration-line-through"
                                                                                        data-old-price="$89.00">$0.00</span>
                                                                                </span>
                                                                            </span>
                                                                        </label>
                                                                    </div>
                                                                    <div class="frequent-content">
                                                                        <label
                                                                            class="cust-checkbox-label heading-color float-start">
                                                                            <input type="checkbox"
                                                                                id="tailored-blazer-jacket"
                                                                                name="tailored-blazer-jacket"
                                                                                class="cust-checkbox"
                                                                                data-img-id="tailored-blazer-jacket">
                                                                            <span class="d-block cust-check"></span>
                                                                            <span class="freq-title">Tailored blazer
                                                                                jacket</span>
                                                                            <span class="freq-price">
                                                                                <span
                                                                                    class="freq-price-box heading-weight">
                                                                                    <span
                                                                                        class="freq-new-price primary-color"
                                                                                        data-new-price="$49.00">$0.00</span>
                                                                                    <span
                                                                                        class="freq-old-price body-color text-decoration-line-through"
                                                                                        data-old-price="$59.00">$0.00</span>
                                                                                </span>
                                                                            </span>
                                                                        </label>
                                                                        <a href="#tailored-blazer-jacket-collapse"
                                                                            data-bs-toggle="collapse"
                                                                            class="d-inline-flex align-items-center msl-4"
                                                                            aria-expanded="false"><span>Choose
                                                                                option</span><i
                                                                                class="ri-arrow-down-s-line d-block icon-16 lh-1"></i></a>
                                                                        <div class="frequent-collapse collapse"
                                                                            id="tailored-blazer-jacket-collapse">
                                                                            <div
                                                                                class="frequent-variant-qty psl-20 pst-15">
                                                                                <div class="frequent-variant">
                                                                                    <div class="frequent-variant-option">
                                                                                        <span
                                                                                            class="d-inline-block meb-11"><span
                                                                                                class="heading-color heading-weight">Size:</span>
                                                                                            38</span>
                                                                                        <div
                                                                                            class="product-option-block size">
                                                                                            <ul class="ul-mt5">
                                                                                                <li>
                                                                                                    <label
                                                                                                        class="cust-checkbox-label">
                                                                                                        <input
                                                                                                            type="radio"
                                                                                                            name="tailored-blazer-jacket-size"
                                                                                                            class="cust-checkbox"
                                                                                                            value="38"
                                                                                                            checked>
                                                                                                        <span
                                                                                                            class="d-flex align-items-center justify-content-center cust-check">38</span>
                                                                                                    </label>
                                                                                                </li>
                                                                                                <li>
                                                                                                    <label
                                                                                                        class="cust-checkbox-label disabled">
                                                                                                        <input
                                                                                                            type="radio"
                                                                                                            name="tailored-blazer-jacket-size"
                                                                                                            class="cust-checkbox"
                                                                                                            value="40">
                                                                                                        <span
                                                                                                            class="d-flex align-items-center justify-content-center cust-check">40</span>
                                                                                                    </label>
                                                                                                </li>
                                                                                                <li>
                                                                                                    <label
                                                                                                        class="cust-checkbox-label">
                                                                                                        <input
                                                                                                            type="radio"
                                                                                                            name="tailored-blazer-jacket-size"
                                                                                                            class="cust-checkbox"
                                                                                                            value="42">
                                                                                                        <span
                                                                                                            class="d-flex align-items-center justify-content-center cust-check">42</span>
                                                                                                    </label>
                                                                                                </li>
                                                                                                <li>
                                                                                                    <label
                                                                                                        class="cust-checkbox-label">
                                                                                                        <input
                                                                                                            type="radio"
                                                                                                            name="tailored-blazer-jacket-size"
                                                                                                            class="cust-checkbox"
                                                                                                            value="44">
                                                                                                        <span
                                                                                                            class="d-flex align-items-center justify-content-center cust-check">44</span>
                                                                                                    </label>
                                                                                                </li>
                                                                                            </ul>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div
                                                                                        class="frequent-variant-option mst-15">
                                                                                        <span
                                                                                            class="d-inline-block meb-11"><span
                                                                                                class="heading-color heading-weight">Color:</span>
                                                                                            Aliceblue</span>
                                                                                        <div
                                                                                            class="product-option-block color">
                                                                                            <ul class="ul-mt10">
                                                                                                <li>
                                                                                                    <label
                                                                                                        class="cust-checkbox-label">
                                                                                                        <input
                                                                                                            type="radio"
                                                                                                            name="tailored-blazer-jacket-color"
                                                                                                            class="cust-checkbox"
                                                                                                            value="aliceblue"
                                                                                                            checked>
                                                                                                        <span
                                                                                                            class="d-block cust-check aliceblue"></span>
                                                                                                    </label>
                                                                                                </li>
                                                                                                <li>
                                                                                                    <label
                                                                                                        class="cust-checkbox-label disabled">
                                                                                                        <input
                                                                                                            type="radio"
                                                                                                            name="tailored-blazer-jacket-color"
                                                                                                            class="cust-checkbox"
                                                                                                            value="antiquewhite">
                                                                                                        <span
                                                                                                            class="d-block cust-check antiquewhite"></span>
                                                                                                    </label>
                                                                                                </li>
                                                                                                <li>
                                                                                                    <label
                                                                                                        class="cust-checkbox-label">
                                                                                                        <input
                                                                                                            type="radio"
                                                                                                            name="tailored-blazer-jacket-color"
                                                                                                            class="cust-checkbox"
                                                                                                            value="azure">
                                                                                                        <span
                                                                                                            class="d-block cust-check azure"></span>
                                                                                                    </label>
                                                                                                </li>
                                                                                            </ul>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="frequent-quantity mst-15">
                                                                                    <div class="d-flex align-items-center">
                                                                                        <span
                                                                                            class="heading-color mer-4"><span
                                                                                                class="heading-weight">Quantity:</span></span>
                                                                                        <div class="js-qty-wrapper">
                                                                                            <div
                                                                                                class="js-qty-wrap d-flex body-bg border-full border-radius2 overflow-hidden">
                                                                                                <button type="button"
                                                                                                    class="js-qty-adjust js-qty-adjust-minus body-color icon-16"
                                                                                                    aria-label="Remove item"><i
                                                                                                        class="ri-subtract-line d-block lh-1"></i></button>
                                                                                                <input type="number"
                                                                                                    name="tailored-blazer-jacket-38-aliceblue"
                                                                                                    class="js-qty-num p-0 text-center border-0"
                                                                                                    value="1"
                                                                                                    min="1">
                                                                                                <button type="button"
                                                                                                    class="js-qty-adjust js-qty-adjust-plus body-color icon-16"
                                                                                                    aria-label="Add item"><i
                                                                                                        class="ri-add-line d-block lh-1"></i></button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="frequent-content">
                                                                        <label
                                                                            class="cust-checkbox-label heading-color float-start">
                                                                            <input type="checkbox"
                                                                                id="girls-floral-ruffle-top"
                                                                                name="girls-floral-ruffle-top"
                                                                                class="cust-checkbox"
                                                                                data-img-id="girls-floral-ruffle-top">
                                                                            <span class="d-block cust-check"></span>
                                                                            <span class="freq-title">Girls floral ruffle
                                                                                top</span>
                                                                            <span class="freq-price">
                                                                                <span
                                                                                    class="freq-price-box heading-weight">
                                                                                    <span
                                                                                        class="freq-new-price primary-color"
                                                                                        data-new-price="$69.00">$0.00</span>
                                                                                    <span
                                                                                        class="freq-old-price body-color text-decoration-line-through"
                                                                                        data-old-price="$79.00">$0.00</span>
                                                                                </span>
                                                                            </span>
                                                                        </label>
                                                                        <a href="#girls-floral-ruffle-top-collapse"
                                                                            data-bs-toggle="collapse"
                                                                            class="d-inline-flex align-items-center msl-4"
                                                                            aria-expanded="false"><span>Choose
                                                                                option</span><i
                                                                                class="ri-arrow-down-s-line d-block icon-16 lh-1"></i></a>
                                                                        <div class="frequent-collapse collapse"
                                                                            id="girls-floral-ruffle-top-collapse">
                                                                            <div
                                                                                class="frequent-variant-qty psl-20 pst-15">
                                                                                <div class="frequent-variant">
                                                                                    <div class="frequent-variant-option">
                                                                                        <span
                                                                                            class="d-inline-block meb-11"><span
                                                                                                class="heading-color heading-weight">Size:</span>
                                                                                            2Y</span>
                                                                                        <div
                                                                                            class="product-option-block size">
                                                                                            <ul class="ul-mt5">
                                                                                                <li>
                                                                                                    <label
                                                                                                        class="cust-checkbox-label">
                                                                                                        <input
                                                                                                            type="radio"
                                                                                                            name="girls-floral-ruffle-top-size"
                                                                                                            class="cust-checkbox"
                                                                                                            value="2y"
                                                                                                            checked>
                                                                                                        <span
                                                                                                            class="d-flex align-items-center justify-content-center cust-check">2Y</span>
                                                                                                    </label>
                                                                                                </li>
                                                                                                <li>
                                                                                                    <label
                                                                                                        class="cust-checkbox-label disabled">
                                                                                                        <input
                                                                                                            type="radio"
                                                                                                            name="girls-floral-ruffle-top-size"
                                                                                                            class="cust-checkbox"
                                                                                                            value="4y">
                                                                                                        <span
                                                                                                            class="d-flex align-items-center justify-content-center cust-check">4Y</span>
                                                                                                    </label>
                                                                                                </li>
                                                                                                <li>
                                                                                                    <label
                                                                                                        class="cust-checkbox-label">
                                                                                                        <input
                                                                                                            type="radio"
                                                                                                            name="girls-floral-ruffle-top-size"
                                                                                                            class="cust-checkbox"
                                                                                                            value="6y">
                                                                                                        <span
                                                                                                            class="d-flex align-items-center justify-content-center cust-check">6Y</span>
                                                                                                    </label>
                                                                                                </li>
                                                                                                <li>
                                                                                                    <label
                                                                                                        class="cust-checkbox-label">
                                                                                                        <input
                                                                                                            type="radio"
                                                                                                            name="girls-floral-ruffle-top-size"
                                                                                                            class="cust-checkbox"
                                                                                                            value="8y">
                                                                                                        <span
                                                                                                            class="d-flex align-items-center justify-content-center cust-check">8Y</span>
                                                                                                    </label>
                                                                                                </li>
                                                                                            </ul>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div
                                                                                        class="frequent-variant-option mst-15">
                                                                                        <span
                                                                                            class="d-inline-block meb-11"><span
                                                                                                class="heading-color heading-weight">Color:</span>
                                                                                            Aliceblue</span>
                                                                                        <div
                                                                                            class="product-option-block color">
                                                                                            <ul class="ul-mt10">
                                                                                                <li>
                                                                                                    <label
                                                                                                        class="cust-checkbox-label">
                                                                                                        <input
                                                                                                            type="radio"
                                                                                                            name="girls-floral-ruffle-top-color"
                                                                                                            class="cust-checkbox"
                                                                                                            value="aliceblue"
                                                                                                            checked>
                                                                                                        <span
                                                                                                            class="d-block cust-check aliceblue"></span>
                                                                                                    </label>
                                                                                                </li>
                                                                                                <li>
                                                                                                    <label
                                                                                                        class="cust-checkbox-label disabled">
                                                                                                        <input
                                                                                                            type="radio"
                                                                                                            name="girls-floral-ruffle-top-color"
                                                                                                            class="cust-checkbox"
                                                                                                            value="antiquewhite">
                                                                                                        <span
                                                                                                            class="d-block cust-check antiquewhite"></span>
                                                                                                    </label>
                                                                                                </li>
                                                                                                <li>
                                                                                                    <label
                                                                                                        class="cust-checkbox-label">
                                                                                                        <input
                                                                                                            type="radio"
                                                                                                            name="girls-floral-ruffle-top-color"
                                                                                                            class="cust-checkbox"
                                                                                                            value="azure">
                                                                                                        <span
                                                                                                            class="d-block cust-check azure"></span>
                                                                                                    </label>
                                                                                                </li>
                                                                                            </ul>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="frequent-quantity mst-15">
                                                                                    <div class="d-flex align-items-center">
                                                                                        <span
                                                                                            class="heading-color mer-4"><span
                                                                                                class="heading-weight">Quantity:</span></span>
                                                                                        <div class="js-qty-wrapper">
                                                                                            <div
                                                                                                class="js-qty-wrap d-flex body-bg border-full border-radius2 overflow-hidden">
                                                                                                <button type="button"
                                                                                                    class="js-qty-adjust js-qty-adjust-minus body-color icon-16"
                                                                                                    aria-label="Remove item"><i
                                                                                                        class="ri-subtract-line d-block lh-1"></i></button>
                                                                                                <input type="number"
                                                                                                    name="girls-floral-ruffle-top-2y-aliceblue"
                                                                                                    class="js-qty-num p-0 text-center border-0"
                                                                                                    value="1"
                                                                                                    min="1">
                                                                                                <button type="button"
                                                                                                    class="js-qty-adjust js-qty-adjust-plus body-color icon-16"
                                                                                                    aria-label="Add item"><i
                                                                                                        class="ri-add-line d-block lh-1"></i></button>
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
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="frequent-total">
                                                            <span class="d-block meb-5">Price for selected product</span>
                                                            <div class="frequent-total-price">
                                                                <div class="freq-total-box heading-weight">
                                                                    <span
                                                                        class="freq-new-total new-price primary-color font-24"
                                                                        data-new-total="$79.00">$0.00</span>
                                                                    <span class="old-price font-20">
                                                                        <span class="text-uppercase">M.r.p</span>
                                                                        <span
                                                                            class="freq-old-total text-decoration-line-through"
                                                                            data-old-total="$89.00">$0.00</span>
                                                                    </span>
                                                                </div>
                                                                <div class="freq-price-text text-danger font-18 mst-4">Save
                                                                    <span class="freq-price-save heading-weight"
                                                                        data-price-save="$10.00">$0.00</span>
                                                                </div>
                                                            </div>
                                                            <div class="frequent-action mst-15">
                                                                <button type="submit"
                                                                    class="w-100 btn-style quaternary-btn add-to-cart">
                                                                    <span class="product-icon">
                                                                        <span class="product-bag-icon">Add to cart</span>
                                                                        <span class="product-loader-icon icon-16"><i
                                                                                class="ri-loader-4-line d-block lh-1"></i></span>
                                                                        <span class="product-check-icon icon-16"><i
                                                                                class="ri-check-line d-block lh-1"></i></span>
                                                                    </span>
                                                                </button>
                                                            </div>
                                                            <span class="d-block freq-dis-text mst-10">Get a <span
                                                                    class="freq-discount-price heading-color font-18 heading-weight"
                                                                    data-discount-price="11%">0%</span> discount from
                                                                selected product while buying together</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="product-info mst-20" data-animate="animate__fadeIn">
                                <div class="product-pickup">
                                    <span class="d-inline-block heading-color meb-11 heading-weight">Skip the wait - pickup
                                        instantly!</span>
                                    <div class="product-pickup-info ptb-10 plr-15 extra-bg br-hidden">
                                        <p class="heading-color"><i
                                                class="ri-shopping-bag-2-line icon-16 mer-4"></i>Choose store pickup for
                                            faster access to your furniture favorites. Select <span
                                                class="heading-weight">pickup</span> at checkout and enjoy a smoother,
                                            time-saving experience. <a href="#pickup-modal" data-bs-toggle="modal"
                                                class="heading-color text-decoration-underline">learn more</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="product-info mst-20" data-animate="animate__fadeIn">
                                <div class="product-warranty">
                                    <span class="d-inline-block heading-color meb-11 heading-weight">Visit any partner
                                        showroom</span>
                                    <div class="product-warranty-info ptb-10 plr-15 extra-bg br-hidden">
                                        <p class="heading-color"><i class="ri-store-2-line icon-16 mer-4"></i>Explore our
                                            furniture in person at any of our trusted partner locations near you. <a
                                                href="#warranty-modal" data-bs-toggle="modal"
                                                class="heading-color text-decoration-underline">view details</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="product-info mst-30" data-animate="animate__fadeIn">
                                <div class="product-border bst"></div>
                            </div>
                            <div class="product-info mst-25" data-animate="animate__fadeIn">
                                <div class="product-delivery">
                                    <span><i class="ri-check-line heading-color icon-16 mer-4"></i><span
                                            class="heading-color heading-weight">Expected delivery:</span> 5-7 business
                                        days <a href="shipping-policy.html"
                                            class="body-secondary-color text-decoration-underline">view details</a></span>
                                </div>
                            </div>
                            <div class="product-info mst-10" data-animate="animate__fadeIn">
                                <div class="product-return">
                                    <span><i class="ri-check-line heading-color icon-16 mer-4"></i>Not satisfied? <span
                                            class="heading-color heading-weight">Return</span> it within 30 days <a
                                            href="return-policy.html"
                                            class="body-secondary-color text-decoration-underline">view details</a></span>
                                </div>
                            </div>
                            <div class="product-info mst-10" data-animate="animate__fadeIn">
                                <div class="product-checkout">
                                    <span><i class="ri-check-line heading-color icon-16 mer-4"></i>Your data is safe with
                                        bank-level <span class="heading-color heading-weight">security</span> <a
                                            href="privacy-policy.html"
                                            class="body-secondary-color text-decoration-underline">view details</a></span>
                                </div>
                            </div>
                            <div class="product-info mst-25" data-animate="animate__fadeIn">
                                <div class="product-service text-center border-full border-radius">
                                    <div class="product-service-info d-flex flex-wrap">
                                        <div class="col-3 ptb-15 plr-5">
                                            <span class="d-block heading-color icon-24"><i
                                                    class="ri-box-3-line d-block lh-1"></i></span>
                                            <span class="d-block font-14 mst-7">Return & exchange</span>
                                        </div>
                                        <div class="col-3 ptb-15 plr-5">
                                            <span class="d-block heading-color icon-24"><i
                                                    class="ri-hand-coin-line d-block lh-1"></i></span>
                                            <span class="d-block font-14 mst-7">Cash on delivery</span>
                                        </div>
                                        <div class="col-3 ptb-15 plr-5">
                                            <span class="d-block heading-color icon-24"><i
                                                    class="ri-truck-line d-block lh-1"></i></span>
                                            <span class="d-block font-14 mst-7">Free delivery</span>
                                        </div>
                                        <div class="col-3 ptb-15 plr-5">
                                            <span class="d-block heading-color icon-24"><i
                                                    class="ri-secure-payment-line d-block lh-1"></i></span>
                                            <span class="d-block font-14 mst-7">Safe payment</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-info mst-25" data-animate="animate__fadeIn">
                                <div class="product-payment">
                                    <span class="d-inline-block heading-color meb-11 heading-weight">Payment protection
                                        guaranteed</span>
                                    <ul class="payment-ul">
                                        <li class="payment-li ul-mt5 lh-0">
                                            <a href="javascript:void(0)" class="d-block"><img
                                                    src="{{ asset('frontend') }}/assets/image/other/paying-american.png"
                                                    class="width-40 img-fluid border-radius" alt="paying-american"></a>
                                            <a href="javascript:void(0)" class="d-block"><img
                                                    src="{{ asset('frontend') }}/assets/image/other/paying-club.png"
                                                    class="width-40 img-fluid border-radius" alt="paying-club"></a>
                                            <a href="javascript:void(0)" class="d-block"><img
                                                    src="{{ asset('frontend') }}/assets/image/other/paying-discover.png"
                                                    class="width-40 img-fluid border-radius" alt="paying-discover"></a>
                                            <a href="javascript:void(0)" class="d-block"><img
                                                    src="{{ asset('frontend') }}/assets/image/other/paying-maestro.png"
                                                    class="width-40 img-fluid border-radius" alt="paying-maestro"></a>
                                            <a href="javascript:void(0)" class="d-block"><img
                                                    src="{{ asset('frontend') }}/assets/image/other/paying-paypal.png"
                                                    class="width-40 img-fluid border-radius" alt="paying-paypal"></a>
                                            <a href="javascript:void(0)" class="d-block"><img
                                                    src="{{ asset('frontend') }}/assets/image/other/paying-visa.png"
                                                    class="width-40 img-fluid border-radius" alt="paying-visa"></a>
                                        </li>
                                    </ul>
                                    <p class="mst-8">Shop with confidence - all transactions are securely processed with
                                        industry-standard encryption.</p>
                                </div>
                            </div>
                            <div class="product-info mst-10" data-animate="animate__fadeIn">
                                <div class="product-sku">
                                    <span class="d-inline-block"><span class="heading-color heading-weight">SKU:</span>
                                        ER-ABC456</span>
                                </div>
                            </div>
                        </div>
                        <!-- product-detail-info end -->
                        <!-- product-detail-tab start -->
                        <div class="product-detail-tab pst-30 psl-xxl-20">
                            <div class="bst">
                                <div class="mst-30" data-animate="animate__fadeIn">
                                    <div class="heading-color heading-weight">Product details</div>
                                    <div class="product-details-info mst-30">
                                        <div class="p-mtm20">
                                            <p>{{ $product->description }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="mst-30" data-animate="animate__fadeIn">
                                    <div class="heading-color heading-weight">Product specifications</div>
                                    <div class="product-specifications-info mst-30">
                                        <ul class="ul-mtm-15">
                                            <li><span class="heading-color heading-weight">Material:
                                                </span>{{ $product->type }}</li>
                                            <li><span class="heading-color heading-weight">Category:
                                                </span>{{ $product->category->name }}</li>
                                            <li><span class="heading-color heading-weight">Product Name:
                                                </span>{{ $product->name }}</li>
                                            <li><span class="heading-color heading-weight">Fit type:</span> Regular fit,
                                                Flared hem</li>
                                            <li><span class="heading-color heading-weight">Length:</span> Above knee</li>
                                            <li><span class="heading-color heading-weight">Closure type:</span> Pull-On
                                                style</li>
                                            <li><span class="heading-color heading-weight">Care instructions:</span>
                                                Machine wash cold, Do not bleach, Hang to dry</li>
                                            <li><span class="heading-color heading-weight">Sizes:</span>
                                                @if ($product->sizes)
                                                    @foreach ($product->sizes as $size)
                                                        {{ $size }},
                                                    @endforeach
                                                @else
                                                    Not available
                                                @endif
                                            </li>
                                            <li><span class="heading-color heading-weight">Colors:</span>
                                                @if ($product->colors)
                                                    @foreach ($product->colors as $color)
                                                        {{ $color }},
                                                    @endforeach
                                                @else
                                                    Not available
                                                @endif
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                {{-- <div class="mst-30" data-animate="animate__fadeIn">
                                    <div class="heading-color heading-weight">Product vendor details</div>
                                    <div class="product-vendor-details-info mst-30">
                                        <ul class="ul-mtm-15">
                                            <li class="col-12"><span class="heading-color heading-weight">Vendor
                                                    name:</span> Urban threads co.</li>
                                            <li class="col-12"><span class="heading-color heading-weight">Country of
                                                    origin:</span> Made in india</li>
                                            <li class="col-12"><span class="heading-color heading-weight">Vendor
                                                    since:</span> 2015</li>
                                            <li class="col-12"><span
                                                    class="heading-color heading-weight">Specialty:</span> Trend-led
                                                fashion pieces with high-quality finishes</li>
                                            <li class="col-12"><span class="heading-color heading-weight">Warranty:</span>
                                                Not applicable (fabric quality guaranteed)</li>
                                        </ul>
                                    </div>
                                </div> --}}
                                <div class="mst-30" data-animate="animate__fadeIn">
                                    <div class="heading-color heading-weight">Product return and exchange policy</div>
                                    <div class="product-policy-info mst-30">
                                        <div class="p-mtm20">
                                            <p>We offer a <span class="heading-color heading-weight">14-day return and
                                                    exchange policy</span> from the date of delivery. Items must be unworn,
                                                unwashed, and returned in their original packaging with all tags attached.
                                            </p>
                                            <p>Refunds are processed within 7 business days after the returned item is
                                                received and inspected. Exchanges are subject to stock availability.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- product-detail-tab end -->
                        <!-- product-detail-video start -->
                        {{-- <div class="product-detail-video psl-xxl-20">
                                <div class="mst-30" data-animate="animate__fadeIn">
                                    <div class="product-video">
                                        <div class="video position-relative">
                                            <div class="video-loader position-absolute w-100 h-100 z-1">
                                                <span class="h-100 d-flex justify-content-center"><svg aria-hidden="true" focusable="false" role="presentation" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg"><circle fill="none" stroke="var(--heading-font-color)" stroke-width="1" cx="33" cy="33" r="30"></circle></svg></span>
                                            </div>
                                            <div class="video-img banner-img position-relative br-hidden">
                                                <button type="button" class="video-btn position-absolute top-50 start-50 translate-middle z-1" data-video-id="0Aja_yP93PY" aria-label="Video button"><span class="banner-video-icon heading-color icon-16 width-80 height-80 d-flex align-items-center justify-content-center body-bg rounded-circle"><i class="ri-play-large-fill d-block lh-1"></i></span></button>
                                                <img src="{{asset('frontend')}}/assets/image/product/video.jpg" class="w-100 img-fluid" alt="video">
                                            </div>
                                            <div class="video-frame position-absolute top-0 start-0 w-100 h-100 br-hidden"></div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        <!-- product-detail-video end -->
                        <!-- product-detail-review start -->
                        <div class="product-detail-review psl-xxl-20" id="reviews">
                            <div class="mst-30" data-animate="animate__fadeIn">
                                <div class="heading-color heading-weight">Rating & Reviews</div>
                                <div class="product-review-info mst-30">
                                    <div class="product-review">
                                        <form method="post" action="javascript:void(0)">
                                            <div class="row row-mtm">
                                                <div class="product-review-info">
                                                    <div class="row row-mtm">
                                                        <div class="col-12 col-md-6">
                                                            <div class="product-review-rating"><span
                                                                    class="heading-color fs-3"
                                                                    data-id>{{ $product->averageRating }}</span>/<span
                                                                    data-score="5">{{ $product->maxRating }}</span></div>
                                                            <div class="product-star">
                                                                <div class="product-ratting">
                                                                    <span class="review-ratting">
                                                                        <span class="review-star icon-16">
                                                                            <i class="ri-star-fill"></i>
                                                                            <i class="ri-star-fill"></i>
                                                                            <i class="ri-star-fill"></i>
                                                                            <i class="ri-star-fill"></i>
                                                                            <i class="ri-star-fill"></i>
                                                                        </span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="product-review-text mst-11">Based on <span
                                                                    data-base>{{ $reviews->count() }}</span> reviews</div>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <div class="row row-mtm15">
                                                                <div
                                                                    class="product-review-count d-flex align-items-center">
                                                                    <span
                                                                        class="product-review-stars d-flex align-items-center justify-content-md-end lh-1">5<span
                                                                            class="review-color msl-5"><i
                                                                                class="ri-star-fill d-block lh-1"></i></span></span>
                                                                    <span class="product-review-progress mlr-10">
                                                                        <span
                                                                            class="product-review-progress-width position-absolute top-0 bottom-0 start-0 secondary-bg"></span>
                                                                    </span>
                                                                    <span class="product-review-number lh-1"
                                                                        data-number="1"></span>
                                                                </div>
                                                                <div
                                                                    class="product-review-count d-flex align-items-center">
                                                                    <span
                                                                        class="product-review-stars d-flex align-items-center justify-content-md-end lh-1">4<span
                                                                            class="review-color msl-5"><i
                                                                                class="ri-star-fill d-block lh-1"></i></span></span>
                                                                    <span class="product-review-progress mlr-10">
                                                                        <span
                                                                            class="product-review-progress-width position-absolute top-0 bottom-0 start-0 secondary-bg"></span>
                                                                    </span>
                                                                    <span class="product-review-number lh-1"
                                                                        data-number="0"></span>
                                                                </div>
                                                                <div
                                                                    class="product-review-count d-flex align-items-center">
                                                                    <span
                                                                        class="product-review-stars d-flex align-items-center justify-content-md-end lh-1">3<span
                                                                            class="review-color msl-5"><i
                                                                                class="ri-star-fill d-block lh-1"></i></span></span>
                                                                    <span class="product-review-progress mlr-10">
                                                                        <span
                                                                            class="product-review-progress-width position-absolute top-0 bottom-0 start-0 secondary-bg"></span>
                                                                    </span>
                                                                    <span class="product-review-number lh-1"
                                                                        data-number="1"></span>
                                                                </div>
                                                                <div
                                                                    class="product-review-count d-flex align-items-center">
                                                                    <span
                                                                        class="product-review-stars d-flex align-items-center justify-content-md-end lh-1">2<span
                                                                            class="review-color msl-5"><i
                                                                                class="ri-star-fill d-block lh-1"></i></span></span>
                                                                    <span class="product-review-progress mlr-10">
                                                                        <span
                                                                            class="product-review-progress-width position-absolute top-0 bottom-0 start-0 secondary-bg"></span>
                                                                    </span>
                                                                    <span class="product-review-number lh-1"
                                                                        data-number="0"></span>
                                                                </div>
                                                                <div
                                                                    class="product-review-count d-flex align-items-center">
                                                                    <span
                                                                        class="product-review-stars d-flex align-items-center justify-content-md-end lh-1">1<span
                                                                            class="review-color msl-5"><i
                                                                                class="ri-star-fill d-block lh-1"></i></span></span>
                                                                    <span class="product-review-progress mlr-10">
                                                                        <span
                                                                            class="product-review-progress-width position-absolute top-0 bottom-0 start-0 secondary-bg"></span>
                                                                    </span>
                                                                    <span class="product-review-number lh-1"
                                                                        data-number="0"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <button type="button"
                                                                class="width-100 btn-style secondary-btn write-review-btn">Write
                                                                a review</button>
                                                            <button type="button"
                                                                class="d-none width-100 btn-style secondary-btn close-review-btn">Close
                                                                review</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-review-form d-none">
                                                    <div class="row field-row">
                                                        <div class="col-12 col-md-6 field-col">
                                                            <label for="review-name" class="field-label">Name</label>
                                                            <input type="text" id="review-name" name="review-name"
                                                                class="w-100" placeholder="Demo name"
                                                                autocomplete="name" required>
                                                        </div>
                                                        <div class="col-12 col-md-6 field-col">
                                                            <label for="review-email" class="field-label">Email</label>
                                                            <input type="email" id="review-email" name="review-email"
                                                                class="w-100" placeholder="Email address"
                                                                autocomplete="email" required>
                                                        </div>
                                                        <div class="col-12 field-col">
                                                            <label class="field-label">Rating</label>
                                                            <div class="product-review-ratting">
                                                                <div class="product-ratting">
                                                                    <span class="review-ratting">
                                                                        <span class="review-star icon-16">
                                                                            <i class="ri-star-line"></i>
                                                                            <i class="ri-star-line"></i>
                                                                            <i class="ri-star-line"></i>
                                                                            <i class="ri-star-line"></i>
                                                                            <i class="ri-star-line"></i>
                                                                        </span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 field-col">
                                                            <label for="review-title" class="field-label">Review
                                                                title</label>
                                                            <input type="text" id="review-title" name="review-title"
                                                                class="w-100" placeholder="Review title"
                                                                autocomplete="off" required>
                                                        </div>
                                                        <div class="col-12 field-col">
                                                            <label for="review-message" class="field-label">Review
                                                                message</label>
                                                            <textarea rows="10" id="review-message" name="review-message" class="w-100" placeholder="Review message"
                                                                autocomplete="off" required></textarea>
                                                        </div>
                                                        <div class="col-12 field-col">
                                                            <label class="field-label">Upload attachment</label>
                                                            <div
                                                                class="field-attachment ptb-30 plr-15 plr-md-30 text-center">
                                                                <div
                                                                    class="review-attachment-upload d-flex flex-column align-items-center">
                                                                    <label for="review-img"
                                                                        class="review-attachment-file-upload primary-link text-decoration-underline">Upload
                                                                        here</label>
                                                                    <div
                                                                        class="review-attachment-count d-none mst-6 meb-16">
                                                                        0 attachments</div>
                                                                    <input type="file" id="review-img"
                                                                        name="review-img"
                                                                        class="w-100 review-attachment-file" multiple
                                                                        hidden>
                                                                    <div class="field-attached">
                                                                        <ul class="ul-mt15 review-attachment-uploaded">
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="product-review-button mst-15 mst-md-30">
                                                        <div class="row btn-row">
                                                            <div class="col-12 col-md-6">
                                                                <button type="submit"
                                                                    class="w-100 btn-style quaternary-btn review-submit">Submit
                                                                    review</button>
                                                            </div>
                                                            <div class="col-12 col-md-6">
                                                                <button type="button"
                                                                    class="w-100 btn-style secondary-btn review-cancel">Cancel
                                                                    review</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-review-comment">
                                                    <div class="row row-mtm">
                                                        <div class="product-review-detail">
                                                            <div
                                                                class="product-reviewer-info d-flex flex-wrap align-items-center">
                                                                <span
                                                                    class="width-48 height-48 primary-color icon-16 d-flex align-items-center justify-content-center overflow-hidden rounded-circle"><i
                                                                        class="ri-user-line d-block lh-1"></i></span>
                                                                <h6
                                                                    class="product-reviewer-name width-calc-48 font-16 psl-15">
                                                                    Noah james</h6>
                                                            </div>
                                                            <div class="product-reviewer-date mst-11">Reviwed on Oct 30,
                                                                2021</div>
                                                            <div class="product-review-love mst-11">
                                                                <div class="product-ratting">
                                                                    <span class="review-ratting">
                                                                        <span class="review-star icon-16">
                                                                            <i class="ri-star-fill"></i>
                                                                            <i class="ri-star-fill"></i>
                                                                            <i class="ri-star-fill"></i>
                                                                            <i class="ri-star-fill"></i>
                                                                            <i class="ri-star-fill"></i>
                                                                        </span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="product-reviewer-subject heading-color heading-weight mst-11">
                                                                Very good</div>
                                                            <p class="product-reviewer-review mst-4">There are many
                                                                variations of passages of Lorem Ipsum available, but the
                                                                majority have suffered alteration in some form, by injected
                                                                humour, or randomised words which don’t look even slightly
                                                                believable. If you are going to use a passage of Lorem
                                                                Ipsum, you need to be sure there isn’t anything embarrassing
                                                                hidden in the middle of text. All the Lorem Ipsum generators
                                                                on the Internet tend to repeat predefined chunks as
                                                                necessary, making this the first true generator on the
                                                                Internet.</p>
                                                            <div class="product-reviewer-attachment mst-8">
                                                                <ul class="ul-mt5">
                                                                    <li><img src="{{ asset('frontend') }}/assets/image/product/review-product1.jpg"
                                                                            class="width-56 img-fluid ptb-4 plr-4 body-bg border-full br-hidden"
                                                                            alt="review-product1"></li>
                                                                    <li><img src="{{ asset('frontend') }}/assets/image/product/review-product2.jpg"
                                                                            class="width-56 img-fluid ptb-4 plr-4 body-bg border-full br-hidden"
                                                                            alt="review-product2"></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="product-review-detail">
                                                            <div
                                                                class="product-reviewer-info d-flex flex-wrap align-items-center">
                                                                <span
                                                                    class="width-48 height-48 primary-color icon-16 d-flex align-items-center justify-content-center overflow-hidden rounded-circle"><i
                                                                        class="ri-user-line d-block lh-1"></i></span>
                                                                <h6
                                                                    class="product-reviewer-name width-calc-48 font-16 psl-15">
                                                                    Carla houston</h6>
                                                            </div>
                                                            <div class="product-reviewer-date mst-11">Reviwed on Oct 30,
                                                                2021</div>
                                                            <div class="product-review-love mst-11">
                                                                <div class="product-ratting">
                                                                    <span class="review-ratting">
                                                                        <span class="review-star icon-16">
                                                                            <i class="ri-star-fill"></i>
                                                                            <i class="ri-star-fill"></i>
                                                                            <i class="ri-star-line"></i>
                                                                            <i class="ri-star-line"></i>
                                                                            <i class="ri-star-line"></i>
                                                                        </span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="product-reviewer-subject heading-color heading-weight mst-11">
                                                                Good</div>
                                                            <p class="product-reviewer-review mst-4">There are many
                                                                variations of passages of Lorem Ipsum available, but the
                                                                majority have suffered alteration in some form, by injected
                                                                humour, or randomised words which don’t look even slightly
                                                                believable. If you are going to use a passage of Lorem
                                                                Ipsum, you need to be sure there isn’t anything embarrassing
                                                                hidden in the middle of text. All the Lorem Ipsum generators
                                                                on the Internet tend to repeat predefined chunks as
                                                                necessary, making this the first true generator on the
                                                                Internet.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- product-detail-review end -->
                    </div>
                </div>
            </div>
            <!-- size-modal start -->
            <div class="size-modal modal fade" id="size-modal" data-bs-backdrop="static">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content body-bg border-0 br-hidden">
                        <div class="modal-body ptb-30 plr-15 plr-md-30">
                            <div class="size-modal-header d-flex align-items-center justify-content-between meb-30">
                                <h6 class="font-18">Size guide</h6>
                                <button type="button" class="body-secondary-color icon-16" data-bs-dismiss="modal"
                                    aria-label="Close"><i class="ri-close-large-line d-block lh-1"></i></button>
                            </div>
                            <div class="size-modal-content text-center">
                                <div class="table-responsive">
                                    <table class="table w-100">
                                        <thead>
                                            <tr>
                                                <th scope="row"
                                                    class="heading-color heading-weight text-nowrap border-full">Size</th>
                                                <th scope="row"
                                                    class="heading-color heading-weight text-nowrap border-full">Waist (in)
                                                </th>
                                                <th scope="row"
                                                    class="heading-color heading-weight text-nowrap border-full">Waist (cm)
                                                </th>
                                                <th scope="row"
                                                    class="heading-color heading-weight text-nowrap border-full">Length
                                                    (in)</th>
                                                <th scope="row"
                                                    class="heading-color heading-weight text-nowrap border-full">Length
                                                    (cm)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-nowrap border-full">XS</td>
                                                <td class="text-nowrap border-full">24-25</td>
                                                <td class="text-nowrap border-full">61-63.5</td>
                                                <td class="text-nowrap border-full">16</td>
                                                <td class="text-nowrap border-full">40.5</td>
                                            </tr>
                                            <tr>
                                                <td class="text-nowrap border-full">S</td>
                                                <td class="text-nowrap border-full">26-27</td>
                                                <td class="text-nowrap border-full">66-68.5</td>
                                                <td class="text-nowrap border-full">16.5</td>
                                                <td class="text-nowrap border-full">42</td>
                                            </tr>
                                            <tr>
                                                <td class="text-nowrap border-full">M</td>
                                                <td class="text-nowrap border-full">28-29</td>
                                                <td class="text-nowrap border-full">71-73.5</td>
                                                <td class="text-nowrap border-full">17</td>
                                                <td class="text-nowrap border-full">43</td>
                                            </tr>
                                            <tr>
                                                <td class="text-nowrap border-full">L</td>
                                                <td class="text-nowrap border-full">30-32</td>
                                                <td class="text-nowrap border-full">76-81</td>
                                                <td class="text-nowrap border-full">17.5</td>
                                                <td class="text-nowrap border-full">44.5</td>
                                            </tr>
                                            <tr>
                                                <td class="text-nowrap border-full">XL</td>
                                                <td class="text-nowrap border-full">33-35</td>
                                                <td class="text-nowrap border-full">84-89</td>
                                                <td class="text-nowrap border-full">18</td>
                                                <td class="text-nowrap border-full">45.5</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="table-img mx-auto">
                                    <img src="{{ asset('frontend') }}/assets/image/product/size-guide.png"
                                        class="w-100 img-fluid" alt="size-guide">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- size-modal end -->
            <!-- question-modal start -->
            <div class="question-modal modal fade" id="question-modal" data-bs-backdrop="static">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content body-bg border-0 br-hidden">
                        <div class="modal-body ptb-30 plr-15 plr-md-30">
                            <form method="post" action="javascript:void(0)">
                                <div
                                    class="question-modal-header d-flex align-items-center justify-content-between meb-30">
                                    <h6 class="font-18">Ask a question?</h6>
                                    <button type="button" class="body-secondary-color icon-16" data-bs-dismiss="modal"
                                        aria-label="Close"><i class="ri-close-large-line d-block lh-1"></i></button>
                                </div>
                                <div class="question-modal-form">
                                    <div class="row field-row">
                                        <div class="col-12 field-col">
                                            <label for="name" class="field-label">Name</label>
                                            <input type="text" id="name" name="name" class="w-100"
                                                placeholder="Full name" autocomplete="name" required>
                                        </div>
                                        <div class="col-12 field-col">
                                            <label for="email" class="field-label">Email</label>
                                            <input type="email" id="email" name="email" class="w-100"
                                                placeholder="Email" autocomplete="email" required>
                                        </div>
                                        <div class="col-12 field-col">
                                            <label for="phone" class="field-label">Phone number</label>
                                            <input type="text" id="phone" name="phone" class="w-100"
                                                placeholder="Phone number" autocomplete="tel" required>
                                        </div>
                                        <div class="col-12 field-col">
                                            <label for="message" class="field-label">Message</label>
                                            <textarea rows="5" id="message" name="message" class="w-100" placeholder="Message" autocomplete="off"
                                                required></textarea>
                                        </div>
                                    </div>
                                    <div class="question-form-btn mst-20 mst-md-30">
                                        <button type="submit"
                                            class="w-100 btn-style secondary-btn question-form-submit">Submit now</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- question-modal end -->
            <!-- share-modal start -->
            <div class="share-modal modal fade" id="share-modal" data-bs-backdrop="static">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content body-bg border-0 br-hidden">
                        <div class="modal-body ptb-30 plr-15 plr-md-30">
                            <div class="share-modal-header d-flex align-items-center justify-content-between meb-30">
                                <h6 class="font-18">Share</h6>
                                <button type="button" class="body-secondary-color icon-16" data-bs-dismiss="modal"
                                    aria-label="Close"><i class="ri-close-large-line d-block lh-1"></i></button>
                            </div>
                            <div class="share-modal-content">
                                <div class="product-link d-md-flex">
                                    <input type="text" id="copy-link"
                                        class="copy-url width-100 text-center text-md-start" readonly>
                                    <button type="button"
                                        class="copy-btn width-100 width-md-auto btn-style secondary-btn mst-15 mst-md-0 text-nowrap">Copy</button>
                                </div>
                                <div class="product-social mst-15">
                                    <ul class="social-ul ul-mt10">
                                        <li class="social-li">
                                            <a href="javascript:void(0)" class="dribbble icon-16"
                                                aria-label="Social link"><i class="ri-dribbble-fill d-block lh-1"></i></a>
                                        </li>
                                        <li class="social-li">
                                            <a href="javascript:void(0)" class="facebook icon-16"
                                                aria-label="Social link"><i class="ri-facebook-fill d-block lh-1"></i></a>
                                        </li>
                                        <li class="social-li">
                                            <a href="javascript:void(0)" class="instagram icon-16"
                                                aria-label="Social link"><i
                                                    class="ri-instagram-fill d-block instagram lh-1"></i></a>
                                        </li>
                                        <li class="social-li">
                                            <a href="javascript:void(0)" class="linkedin icon-16"
                                                aria-label="Social link"><i class="ri-linkedin-fill d-block lh-1"></i></a>
                                        </li>
                                        <li class="social-li">
                                            <a href="javascript:void(0)" class="pinterest icon-16"
                                                aria-label="Social link"><i
                                                    class="ri-pinterest-fill d-block lh-1"></i></a>
                                        </li>
                                        <li class="social-li">
                                            <a href="javascript:void(0)" class="twitter icon-16"
                                                aria-label="Social link"><i
                                                    class="ri-twitter-x-fill d-block lh-1"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- share-modal end -->
            <!-- pickup-modal start -->
            <div class="pickup-modal modal fade" id="pickup-modal" data-bs-backdrop="static">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content body-bg border-0 br-hidden">
                        <div class="modal-body ptb-30 plr-15 plr-md-30">
                            <div class="pickup-modal-header d-flex align-items-center justify-content-between meb-30">
                                <h6 class="font-18">Skip the wait - Pickup instantly!</h6>
                                <button type="button" class="body-secondary-color icon-16" data-bs-dismiss="modal"
                                    aria-label="Close"><i class="ri-close-large-line d-block lh-1"></i></button>
                            </div>
                            <div class="row row-mtm pickup-modal-content">
                                <div class="col-12">
                                    <span class="d-block heading-color meb-22 heading-weight">👉 Why choose pickup?</span>
                                    <div class="ul-mtm-15">
                                        <span><span class="heading-color heading-weight">Speedy service</span> skip the
                                            wait and grab your items on the same day.</span>
                                        <span><span class="heading-color heading-weight">No shipping fees</span> save
                                            money by picking up your order in-store.</span>
                                        <span><span class="heading-color heading-weight">Flexible pickup times</span>
                                            choose a time that suits your schedule.</span>
                                        <span><span class="heading-color heading-weight">Expert assistance</span> our
                                            friendly staff are on hand to help with any queries.</span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <span class="d-block heading-color meb-22 heading-weight">👉 How it works?</span>
                                    <div class="ul-mtm-15">
                                        <span><span class="heading-color heading-weight">Select pickup</span> during
                                            checkout, choose the pickup option.</span>
                                        <span><span class="heading-color heading-weight">Receive confirmation</span>
                                            you'll receive an email confirmation once your order is ready for pickup.</span>
                                        <span><span class="heading-color heading-weight">Visit the store</span> head to
                                            your chosen store location at your convenience.</span>
                                        <span><span class="heading-color heading-weight">Collect your order</span> present
                                            your confirmation email at the pickup point, and our team will hand over your
                                            items.</span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <span class="d-block heading-color meb-22 heading-weight">👉 Frequently asked
                                        questions?</span>
                                    <ul class="ul-mt15">
                                        <li class="d-block">
                                            <div class="ul-mtm-15">
                                                <span class="heading-color heading-weight">Is pickup available for all
                                                    items?</span>
                                                <span>Pickup is available for most items. If an item is eligible, you'll see
                                                    the pickup option during checkout.</span>
                                            </div>
                                        </li>
                                        <li class="d-block">
                                            <div class="ul-mtm-15">
                                                <span class="heading-color heading-weight">When will my order be ready for
                                                    pickup?</span>
                                                <span>Orders are typically ready for pickup within a few hours. You'll
                                                    receive an email notification once your order is ready.</span>
                                            </div>
                                        </li>
                                        <li class="d-block">
                                            <div class="ul-mtm-15">
                                                <span class="heading-color heading-weight">Can someone else pick up my
                                                    order for me?</span>
                                                <span>Yes, you can authorize someone else to pick up your order. Simply
                                                    forward them the confirmation email, and they can collect the items on
                                                    your behalf.</span>
                                            </div>
                                        </li>
                                        <li class="d-block">
                                            <div class="ul-mtm-15">
                                                <span class="heading-color heading-weight">Is there a cutoff time for
                                                    same-day pickup?</span>
                                                <span>Yes, orders placed before [insert cutoff time] are usually available
                                                    for same-day pickup. Orders placed after this time will be ready the
                                                    following day.</span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- pickup-modal end -->
            <!-- warranty-modal start -->
            <div class="warranty-modal modal fade" id="warranty-modal" data-bs-backdrop="static">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content body-bg border-0 br-hidden">
                        <div class="modal-body ptb-30 plr-15 plr-md-30">
                            <div class="warranty-modal-header d-flex align-items-center justify-content-between meb-30">
                                <h6 class="font-16">Warranty details</h6>
                                <button type="button" class="body-secondary-color icon-16" data-bs-dismiss="modal"
                                    aria-label="Close"><i class="ri-close-large-line d-block lh-1"></i></button>
                            </div>
                            <div class="warranty-modal-content">
                                <div class="row row-mtm15">
                                    <div class="col-12">
                                        <span>Walk-in service at any partner location</span>
                                    </div>
                                    <div class="col-12">
                                        <span class="d-block meb-9">This product is backed by a <span
                                                class="heading-color heading-weight">1 year walk-in service
                                                warranty</span> from the date of purchase.</span>
                                        <ul class="ul-mtm-15">
                                            <li>Service available at any authorized partner location across India.</li>
                                            <li>No appointment needed - just walk in with your product and invoice.</li>
                                            <li>Warranty covers manufacturing defects and hardware malfunctions.</li>
                                            <li>Physical damage, water damage, and unauthorized repairs are not covered.
                                            </li>
                                        </ul>
                                        <span class="d-block mst-9">For help locating your nearest partner center, visit
                                            our <a href="store.html" class="text-decoration-underline">service
                                                locator</a>.</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- warranty-modal end -->
        </section>
        <!-- product-detail end -->
        <!-- related-product start -->
        <section class="related-area section-ptb">
            <div class="container">
                <div class="collection-category">
                    <div class="section-capture text-center" data-animate="animate__fadeIn">
                        <div class="section-title">
                            <h2 class="section-heading">Related product</h2>
                        </div>
                    </div>
                    <div class="collection-wrap">
                        <div class="related-slider swiper" id="related-slider">
                            <div class="swiper-wrapper">
                                @if ($related_products)
                                    @foreach ($related_products as $product)
                                        <div class="swiper-slide" data-animate="animate__fadeIn">
                                            <div class="single-product">
                                                <div class="row single-product-wrap">
                                                    <div class="product-image-col">
                                                        <div class="product-image">
                                                            <a href="product.html" class="pro-img">
                                                                <img src="{{ asset('frontend') }}/assets/image/product/p-1.jpg"
                                                                    class="w-100 img-fluid img1" alt="p-1">
                                                                <img src="{{ asset('frontend') }}/assets/image/product/p-2.jpg"
                                                                    class="w-100 img-fluid img2" alt="p-2">
                                                            </a>
                                                            <div class="product-action-wrap">
                                                                <div class="product-action">
                                                                    <a href="javascript:void(0)" class="add-to-wishlist">
                                                                        <span class="product-icon"><i
                                                                                class="ri-heart-line d-block icon-16 lh-1"></i></span>
                                                                        <span class="tooltip-text">wishlist</span>
                                                                    </a>
                                                                    <a href="javascript:void(0)" class="add-to-cart">
                                                                        <span class="product-icon">
                                                                            <span class="product-bag-icon icon-16"><i
                                                                                    class="ri-shopping-bag-3-line d-block lh-1"></i></span>
                                                                            <span class="product-loader-icon icon-16"><i
                                                                                    class="ri-loader-4-line d-block lh-1"></i></span>
                                                                            <span class="product-check-icon icon-16"><i
                                                                                    class="ri-check-line d-block lh-1"></i></span>
                                                                        </span>
                                                                        <span class="tooltip-text">add to cart</span>
                                                                    </a>
                                                                    <a href="#quickview-modal" data-bs-toggle="modal"
                                                                        class="quick-view">
                                                                        <span class="product-icon"><i
                                                                                class="ri-eye-line d-block icon-16 lh-1"></i></span>
                                                                        <span class="tooltip-text">quickview</span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="product-content">
                                                        <div class="pro-content">
                                                            <div class="product-title">
                                                                <span class="d-block meb-7">{{ $product->type }}</span>
                                                                <span class="d-block heading-weight"><a
                                                                        href="product.html" class="primary-link">{{ $product->name }}</a></span>
                                                            </div>
                                                            <div class="product-price">
                                                                <div class="price-box heading-weight">
                                                                    <span class="new-price primary-color">${{ number_format($product->price, 2) }}</span>
                                                                    <span class="old-price"><span
                                                                            class="mer-3">~</span><span
                                                                            class="text-decoration-line-through">${{ number_format($product->old_price, 2) }}</span></span>
                                                                </div>
                                                            </div>
                                                            <div class="product-ratting">
                                                                <span class="review-ratting">
                                                                    <span class="review-star">
                                                                        <i class="ri-star-fill"></i>
                                                                        <i class="ri-star-fill"></i>
                                                                        <i class="ri-star-fill"></i>
                                                                        <i class="ri-star-fill"></i>
                                                                        <i class="ri-star-line"></i>
                                                                    </span>
                                                                    <span class="review-average">4.0<span
                                                                            class="review-caption">2
                                                                            reviews</span></span>
                                                                </span>
                                                            </div>
                                                            <div class="product-description">
                                                                <p>Lorem Ipsum is simply dummy text of the printing and
                                                                    typesetting
                                                                    industry It is a long established fact that a will be
                                                                    distracted
                                                                    by the readable of at</p>
                                                            </div>
                                                            <div class="product-action-wrap">
                                                                <div class="product-action">
                                                                    <a href="javascript:void(0)" class="add-to-wishlist">
                                                                        <span class="product-icon"><i
                                                                                class="ri-heart-line d-block icon-16 lh-1"></i></span>
                                                                        <span class="tooltip-text">wishlist</span>
                                                                    </a>
                                                                    <a href="javascript:void(0)" class="add-to-cart">
                                                                        <span class="product-icon">
                                                                            <span class="product-bag-icon icon-16"><i
                                                                                    class="ri-shopping-bag-3-line d-block lh-1"></i></span>
                                                                            <span class="product-loader-icon icon-16"><i
                                                                                    class="ri-loader-4-line d-block lh-1"></i></span>
                                                                            <span class="product-check-icon icon-16"><i
                                                                                    class="ri-check-line d-block lh-1"></i></span>
                                                                        </span>
                                                                        <span class="tooltip-text">add to cart</span>
                                                                    </a>
                                                                    <a href="#quickview-modal" data-bs-toggle="modal"
                                                                        class="quick-view">
                                                                        <span class="product-icon"><i
                                                                                class="ri-eye-line d-block icon-16 lh-1"></i></span>
                                                                        <span class="tooltip-text">quickview</span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="swiper-slide" data-animate="animate__fadeIn">
                                        <div class="single-product">
                                            <div class="row single-product-wrap">
                                                <div class="product-image-col">
                                                    <div class="product-image">
                                                        <a href="product.html" class="pro-img">
                                                            <img src="{{ asset('frontend') }}/assets/image/product/p-1.jpg"
                                                                class="w-100 img-fluid img1" alt="p-1">
                                                            <img src="{{ asset('frontend') }}/assets/image/product/p-2.jpg"
                                                                class="w-100 img-fluid img2" alt="p-2">
                                                        </a>
                                                        <div class="product-action-wrap">
                                                            <div class="product-action">
                                                                <a href="javascript:void(0)" class="add-to-wishlist">
                                                                    <span class="product-icon"><i
                                                                            class="ri-heart-line d-block icon-16 lh-1"></i></span>
                                                                    <span class="tooltip-text">wishlist</span>
                                                                </a>
                                                                <a href="javascript:void(0)" class="add-to-cart">
                                                                    <span class="product-icon">
                                                                        <span class="product-bag-icon icon-16"><i
                                                                                class="ri-shopping-bag-3-line d-block lh-1"></i></span>
                                                                        <span class="product-loader-icon icon-16"><i
                                                                                class="ri-loader-4-line d-block lh-1"></i></span>
                                                                        <span class="product-check-icon icon-16"><i
                                                                                class="ri-check-line d-block lh-1"></i></span>
                                                                    </span>
                                                                    <span class="tooltip-text">add to cart</span>
                                                                </a>
                                                                <a href="#quickview-modal" data-bs-toggle="modal"
                                                                    class="quick-view">
                                                                    <span class="product-icon"><i
                                                                            class="ri-eye-line d-block icon-16 lh-1"></i></span>
                                                                    <span class="tooltip-text">quickview</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <div class="pro-content">
                                                        <div class="product-title">
                                                            <span class="d-block meb-7">Polyester / Chic</span>
                                                            <span class="d-block heading-weight"><a href="product.html"
                                                                    class="primary-link">Pleated skater skirt</a></span>
                                                        </div>
                                                        <div class="product-price">
                                                            <div class="price-box heading-weight">
                                                                <span class="new-price primary-color">$79.00</span>
                                                                <span class="old-price"><span class="mer-3">~</span><span
                                                                        class="text-decoration-line-through">$89.00</span></span>
                                                            </div>
                                                        </div>
                                                        <div class="product-ratting">
                                                            <span class="review-ratting">
                                                                <span class="review-star">
                                                                    <i class="ri-star-fill"></i>
                                                                    <i class="ri-star-fill"></i>
                                                                    <i class="ri-star-fill"></i>
                                                                    <i class="ri-star-fill"></i>
                                                                    <i class="ri-star-line"></i>
                                                                </span>
                                                                <span class="review-average">4.0<span
                                                                        class="review-caption">2
                                                                        reviews</span></span>
                                                            </span>
                                                        </div>
                                                        <div class="product-description">
                                                            <p>Lorem Ipsum is simply dummy text of the printing and
                                                                typesetting
                                                                industry It is a long established fact that a will be
                                                                distracted
                                                                by the readable of at</p>
                                                        </div>
                                                        <div class="product-action-wrap">
                                                            <div class="product-action">
                                                                <a href="javascript:void(0)" class="add-to-wishlist">
                                                                    <span class="product-icon"><i
                                                                            class="ri-heart-line d-block icon-16 lh-1"></i></span>
                                                                    <span class="tooltip-text">wishlist</span>
                                                                </a>
                                                                <a href="javascript:void(0)" class="add-to-cart">
                                                                    <span class="product-icon">
                                                                        <span class="product-bag-icon icon-16"><i
                                                                                class="ri-shopping-bag-3-line d-block lh-1"></i></span>
                                                                        <span class="product-loader-icon icon-16"><i
                                                                                class="ri-loader-4-line d-block lh-1"></i></span>
                                                                        <span class="product-check-icon icon-16"><i
                                                                                class="ri-check-line d-block lh-1"></i></span>
                                                                    </span>
                                                                    <span class="tooltip-text">add to cart</span>
                                                                </a>
                                                                <a href="#quickview-modal" data-bs-toggle="modal"
                                                                    class="quick-view">
                                                                    <span class="product-icon"><i
                                                                            class="ri-eye-line d-block icon-16 lh-1"></i></span>
                                                                    <span class="tooltip-text">quickview</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="swiper-buttons">
                            <div class="swiper-buttons-wrap">
                                <button type="button" class="swiper-prev swiper-prev-related"
                                    aria-label="Arrow previous"><i class="ri-arrow-left-line d-block lh-1"></i></button>
                                <button type="button" class="swiper-next swiper-next-related" aria-label="Arrow next"><i
                                        class="ri-arrow-right-line d-block lh-1"></i></button>
                            </div>
                        </div>
                        <div class="swiper-dots" data-animate="animate__fadeIn">
                            <div class="swiper-pagination swiper-pagination-related"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- related-product end -->
    </main>
    <!-- main end -->
@endsection
