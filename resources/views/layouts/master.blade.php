<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>{{ $title ?? 'A beautiful Bangladeshi Fashion Website.' }}</title>
    <meta name="description"
        content="Erona is a modern fashion eCommerce HTML5 template built with Bootstrap 5, perfect for clothing stores, boutiques, and online apparel shops.">
    <meta name="keywords"
        content="fashion eCommerce template, clothing store HTML5, Bootstrap 5 fashion shop, online boutique HTML, apparel shop website, responsive fashion template">
    <meta name="author" content="spacingtech_webify">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="search-suggestions-url" content="{{ route('products.suggestions') }}">
    <meta name="cart-products-url" content="{{ route('cart.products') }}">
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.3.0/css/all.min.css"
        integrity="sha512-ApSLB1Pd3/bZN8fWB/RG9YhN/7bd9Hkf3AGaE2mPfebjrxagjuBtx2GcgdqIlJkUzwylBo61r9Xa9NmgBI0swA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- favicon -->
    <link rel="shortcut icon" type="image/favicon" href="{{ asset('frontend') }}/assets/image/index/favicon.png">
    <!-- plugin css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/assets/css/plugin.css">
    <!-- theme css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/assets/css/theme.css">
    <!-- collection css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/assets/css/collection.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/assets/css/product.css">
    <!-- blog css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/assets/css/blog.css">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/assets/css/style.css">
</head>
{{-- @include('frontend.partials.cart-script') --}}

<body>
    <!-- preloader start -->
    <div class="preloader position-fixed top-0 start-0 w-100 h-100 body-bg z-index-5">
        <div
            class="loader-img position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center">
            <img src="{{ asset('frontend') }}/assets/image/index/logo.png" class="width-88 width-xl-112 img-fluid"
                alt="logo">
        </div>
    </div>
    <!-- preloader end -->
    <!-- newsletter-modal start -->
    {{-- <div class="newsletter-modal modal fade" id="newslettermodal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content body-bg border-0 br-hidden">
                    <div class="modal-body p-0">
                        <button type="button" class="d-block secondary-btn font-12 position-absolute top-0 end-0 width-32 height-32 mst-15 mer-15 rounded-circle" data-bs-dismiss="modal" aria-label="Close"><i class="ri-close-large-line d-block lh-1"></i></button>
                        <div class="newsletter-info d-flex flex-wrap">
                            <div class="col-12 col-md-6">
                                <div class="newsletter-image">
                                    <img src="{{ asset('frontend') }}/assets/image/newsletter/newsletter-popup.jpg" class="w-100 img-fluid" alt="newsletter-popup">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 text-center ptb-30 plr-15 plr-md-30">
                                <div class="newsletter-content height-md-100 d-md-flex flex-md-column align-items-md-center justify-content-md-center">
                                    <div class="meb-26">Gift bundles for every type of person</div>
                                    <div class="w-100 pst-12 peb-16 text-uppercase bst beb">
                                        <h2 class="font-48 lh-1">20% off</h2>
                                        <span class="d-block primary-color mst-9">Limited time offers!</span>
                                    </div>
                                    <a href="collection.html" class="btn-style tertiary-btn mst-30">Collection</a>
                                    <div class="mst-26">
                                        <label class="d-inline-block cust-checkbox-label checkbox-hide">
                                            <input type="checkbox" id="popup-input" name="popup-input" class="cust-checkbox checkbox-hide-btn">
                                            <span class="d-block cust-check"></span>
                                            <span class="login-read">Don't show again</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    <!-- newsletter-modal end -->
    <!-- header start -->
    <header id="header" class="main-header">
        <!-- header-top start -->
        <div class="header-top-area">
            <!-- notification-bar start -->
            @if ($sections->contains('slug', 'top'))
                @include('layouts.sections.top-nav')
            @endif
            <!-- notification-bar end -->
            <!-- header-top-first start -->
            <div class="header-top-first ptb-10 position-relative body-bg">
                <div class="container-fluid">
                    <div class="row align-items-center header-area">
                        <!-- header-logo start -->
                        <div class="col-6 col-xl-2 header-element header-logo">
                            <div class="header-theme-logo">
                                <a href="index-2.html" class="d-inline-block theme-logo">
                                    <img src="{{ asset('frontend') }}/assets/image/index/logo.png"
                                        class="width-88 width-xl-112 img-fluid" alt="logo">
                                </a>
                            </div>
                        </div>
                        <!-- header-logo end -->
                        <!-- header-menu start -->
                        <div class="col-xl-6 col-xxl-5 d-none d-xl-block header-element header-menu">
                            <div class="mainmenu-content">
                                <div class="main-wrap">
                                    <ul class="menu-ul d-flex flex-wrap">
                                        <li class="menu-li">
                                            <a href="/" class="menu-link d-flex align-items-center ptb-5 plr-15">
                                                <span class="menu-title text-uppercase heading-weight">Home</span>
                                            </a>
                                        </li>
                                        <li class="menu-li">
                                            <a href="{{ route('products') }}"
                                                class="menu-link d-flex align-items-center ptb-5 plr-15">
                                                <span class="menu-title text-uppercase heading-weight">Products</span>
                                            </a>
                                        </li>
                                        <li class="menu-li">
                                            <a href="{{ route('categories') }}"
                                                class="menu-link d-flex align-items-center ptb-5 plr-15">
                                                <span class="menu-title text-uppercase heading-weight">Categories</span>
                                            </a>
                                        </li>
                                        <li class="menu-li">
                                            <a href="{{ route('about') }}"
                                                class="menu-link d-flex align-items-center ptb-5 plr-15">
                                                <span class="menu-title text-uppercase heading-weight">About</span>
                                            </a>
                                        </li>
                                        <li class="menu-li">
                                            <a href="{{ route('contact') }}"
                                                class="menu-link d-flex align-items-center ptb-5 plr-15">
                                                <span class="menu-title text-uppercase heading-weight">Contact</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- header-menu end -->
                        <!-- header-icon start -->
                        <div class="col-6 col-xl-4 col-xxl-5 header-element header-icon">
                            <div class="header-icon-block d-flex justify-content-end">
                                <!-- header-search start -->

                                <div class="header-search w-100 d-none d-xxl-block per-15">
                                    <div class="header-theme-search w-100">

                                        <form method="GET" action="{{ route('products') }}"
                                            class="search-form w-100">

                                            <div class="search-bar position-relative">

                                                <div class="form-search d-flex">

                                                    <input type="search" name="q" class="w-100 search-input"
                                                        value="{{ request('q') }}" placeholder="Search product..."
                                                        autocomplete="off" required>

                                                    <button type="submit"
                                                        class="d-block tertiary-btn plr-15 text-uppercase text-nowrap heading-weight search-btn"
                                                        disabled>
                                                        Search
                                                    </button>

                                                </div>

                                                <div
                                                    class="d-none search-results position-absolute top-auto start-0 end-0 body-bg z-2 border-full border-radius box-shadow">

                                                    <div class="search-for ptb-10 plr-15 beb">
                                                        Search for <span class="search-text"></span>
                                                    </div>

                                                    {{-- Dynamic Products --}}
                                                    <div class="search-products"></div>

                                                    <div class="search-more ptb-10 plr-15 bst">
                                                        <a href="{{ route('products') }}"
                                                            class="body-secondary-color text-decoration-underline">
                                                            See all results (<span class="search-total">0</span>)
                                                        </a>
                                                    </div>

                                                    <div class="search-fail ptb-10 plr-15 d-none">
                                                        Search not found
                                                    </div>

                                                </div>

                                            </div>

                                        </form>

                                    </div>
                                </div>

                                <!-- header-search end -->
                                <ul class="ul-mt15 flex-nowrap align-items-center header-icon-element">
                                    <li class="header-icon-wrap toggler-wrap d-xl-none">
                                        <div class="header-icon-wrapper">
                                            <a href="javascript:void(0)"
                                                class="d-block header-icon-toggler toggler-btn"
                                                aria-label="Menu toggler button">
                                                <span
                                                    class="d-block header-block-icon primary-link font-16 font-xl-20"><i
                                                        class="ri-menu-line"></i></span>
                                            </a>
                                        </div>
                                    </li>
                                    <li class="header-icon-wrap search-wrap d-xxl-none">
                                        <div class="header-icon-wrapper">
                                            <a href="#searchmodal" class="d-block header-icon-search"
                                                data-bs-toggle="modal" aria-label="Search modal">
                                                <span
                                                    class="d-block header-block-icon primary-link font-16 font-xl-20"><i
                                                        class="ri-search-line"></i></span>
                                            </a>
                                        </div>
                                    </li>
                                    <li class="header-icon-wrap user-wrap d-md-block d-none">
                                        <div class="header-icon-wrapper">
                                            <a href="{{ route('login') }}" class="d-block header-icon-user"
                                                aria-label="Login user">
                                                <span
                                                    class="d-block header-block-icon primary-link font-16 font-xl-20"><i
                                                        class="ri-user-line"></i></span>
                                            </a>
                                        </div>
                                    </li>
                                    <li class="header-icon-wrap cart-wrap d-md-block d-none">
                                        <div class="header-icon-wrapper">
                                            <a href="javascript:void(0)"
                                                class="d-block header-icon-cart js-cart-drawer">
                                                <span class="primary-link ul-mt5 flex-nowrap align-items-center">
                                                    <span class="d-block">
                                                        <span
                                                            class="d-block header-block-icon-wrap position-relative per-8">
                                                            <span
                                                                class="d-block header-block-icon font-16 font-xl-20"><i
                                                                    class="ri-shopping-bag-3-line"></i></span>
                                                            <span
                                                                class="header-block-counter cart-counter extra-color font-10 position-absolute end-0 d-flex align-items-center justify-content-center primary-bg rounded-circle cart-count"
                                                                data-cart-count>0</span>
                                                        </span>
                                                    </span>
                                                    <span
                                                        class="d-none d-xl-block header-text-content text-uppercase text-nowrap heading-weight">Cart</span>
                                                </span>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- header-icon end -->
                    </div>
                </div>
            </div>
            <!-- header-top-first end -->
        </div>
        <!-- header-top end -->
    </header>
    <!-- header end -->
    <!-- main start -->
    @yield('master')
    <!-- main end -->
    <!-- footer start -->
    <footer id="footer">
        <!-- footer-top start -->
        <section class="footer-area section-ptb bst">
            <div class="container-fluid">
                <div class="row row-mtm">
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="footer-info">
                            <div class="footer-theme-logo">
                                <a href="index-2.html" class="d-inline-block theme-logo">
                                    <img src="{{ asset('frontend') }}/assets/image/index/logo.png"
                                        class="width-88 width-xl-112 img-fluid" alt="logo">
                                </a>
                            </div>
                            <div class="footer-company-detail mst-23">
                                <p>{{ $siteInfo->short_description ?? 'Default short description' }}</p>
                            </div>
                            <div class="footer-payment mst-30">
                                <h6 class="font-18">Payment</h6>
                                <ul class="payment-ul mst-25">
                                    <li class="payment-li ul-mt5">
                                        <a href="javascript:void(0)" class="d-block"><img
                                                src="{{ asset('frontend') }}/assets/image/other/paying-visa.png"
                                                class="width-40 img-fluid border-radius" alt="paying-visa"></a>
                                        <a href="javascript:void(0)" class="d-block"><img
                                                src="{{ asset('frontend') }}/assets/image/other/paying-maestro.png"
                                                class="width-40 img-fluid border-radius" alt="paying-maestro"></a>
                                        <a href="javascript:void(0)" class="d-block"><img
                                                src="{{ asset('frontend') }}/assets/image/other/paying-american.png"
                                                class="width-40 img-fluid border-radius" alt="paying-american"></a>
                                        <a href="javascript:void(0)" class="d-block"><img
                                                src="{{ asset('frontend') }}/assets/image/other/paying-paypal.png"
                                                class="width-40 img-fluid border-radius" alt="paying-paypal"></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 order-md-last order-lg-0 footer-list">
                        <div class="row">
                            <div class="col-12 col-md-4 ft-list">
                                <div class="footer-menu">
                                    <h6 class="ft-title d-none d-md-block font-18">Information</h6>
                                    <a href="#collapse-information"
                                        class="ft-title font-18 d-flex d-md-none flex-wrap align-items-center justify-content-between"
                                        data-bs-toggle="collapse" aria-expanded="false">
                                        <span class="ftmenu-title width-calc-16 heading-weight">Information</span>
                                        <span class="ftmenu-icon width-16 icon-16"><i class="ri-add-line"></i></span>
                                    </a>
                                    <div class="ft-link collapse" id="collapse-information">
                                        <ul class="ftlink-ul ul-ft pst-21 peb-1 peb-md-0">
                                            <li class="ftlink-li">
                                                <a href="{{ route('home') }}"
                                                    class="d-inline-block body-primary-color">Home</a>
                                            </li>
                                            <li class="ftlink-li">
                                                <a href="{{ route('about') }}"
                                                    class="d-inline-block body-primary-color">About us</a>
                                            </li>
                                            <li class="ftlink-li">
                                                <a href="{{ route('contact') }}"
                                                    class="d-inline-block body-primary-color">Contact us</a>
                                            </li>
                                            <li class="ftlink-li">
                                                <a href="{{ route('products') }}"
                                                    class="d-inline-block body-primary-color">Store</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 ft-list">
                                <div class="footer-menu">
                                    <h6 class="ft-title d-none d-md-block font-18">Policies</h6>
                                    <a href="#collapse-policies"
                                        class="ft-title font-18 d-flex d-md-none flex-wrap align-items-center justify-content-between"
                                        data-bs-toggle="collapse" aria-expanded="false">
                                        <span class="ftmenu-title width-calc-16 heading-weight">Policies</span>
                                        <span class="ftmenu-icon width-16 icon-16"><i class="ri-add-line"></i></span>
                                    </a>
                                    <div class="ft-link collapse" id="collapse-policies">
                                        <ul class="ftlink-ul ul-ft pst-21 peb-1 peb-md-0">
                                            @foreach ($publishedPolicies as $policyType)
                                                <li class="ftlink-li">
                                                    <a href="{{ route('policies.show', $policyType->slug) }}"
                                                        class="d-inline-block body-primary-color">{{ $policyType->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 ft-list">
                                <div class="footer-menu">
                                    <h6 class="ft-title d-none d-md-block font-18">Followed by</h6>
                                    <a href="#collapse-followed-by"
                                        class="ft-title font-18 d-flex d-md-none flex-wrap align-items-center justify-content-between"
                                        data-bs-toggle="collapse" aria-expanded="false">
                                        <span class="ftmenu-title width-calc-16 heading-weight">Followed by</span>
                                        <span class="ftmenu-icon width-16 icon-16"><i class="ri-add-line"></i></span>
                                    </a>
                                    <div class="ft-link collapse" id="collapse-followed-by">
                                        <ul class="ftlink-ul ul-ft pst-21 peb-1 peb-md-0">
                                            @if ($siteInfo->socials)
                                                @foreach ($siteInfo->socials ?? [] as $social)
                                                    <li class="ftlink-li">
                                                        <a href="{{ $social['url'] ?? 'javascript:void(0)' }}"
                                                            class="d-inline-block body-primary-color">
                                                            <i class="{{ $social['icon'] }}"></i>
                                                            {{ $social['name'] }}</a>
                                                    </li>
                                                @endforeach
                                            @else
                                                <li class="ftlink-li">
                                                    <a href="javascript:void(0)"
                                                        class="d-inline-block body-primary-color"><i
                                                            class="ri-facebook-line"></i> Facebook</a>
                                                </li>
                                                <li class="ftlink-li">
                                                    <a href="javascript:void(0)"
                                                        class="d-inline-block body-primary-color"><i
                                                            class="ri-twitter-x-line"></i> Twitter</a>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="footer-contact">
                            <h6 class="font-18">Store details</h6>
                            <div class="ft-link">
                                <ul class="ftlink-ul p-mtm20 pst-18">
                                    @foreach ($siteInfo->address ?? [] as $address)
                                        <li class="ftlink-li">
                                            <div class="d-flex flex-wrap align-items-baseline">
                                                <p class="width-16 primary-color icon-16"><i
                                                        class="ri-map-pin-line"></i>
                                                </p>
                                                <div class="width-calc-16 psl-10">
                                                    <p>{{ $address }}</p>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                    @foreach ($siteInfo->phone ?? [] as $phone)
                                        <li class="ftlink-li">
                                            <div class="d-flex flex-wrap align-items-baseline">
                                                <p class="width-16 primary-color icon-16"><i
                                                        class="ri-phone-line"></i>
                                                </p>
                                                <div class="width-calc-16 psl-10">
                                                    <p><a href="tel:{{ $phone }}"
                                                            class="body-primary-color">{{ $phone }}</a></p>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                    @foreach ($siteInfo->email ?? [] as $email)
                                        <li class="ftlink-li">
                                            <div class="d-flex flex-wrap align-items-baseline">
                                                <p class="width-16 primary-color icon-16"><i class="ri-mail-line"></i>
                                                </p>
                                                <div class="width-calc-16 psl-10">
                                                    <p><a href="mailto:{{ $email }}"
                                                            class="body-primary-color">{{ $email }}</a></p>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- footer-top end -->
        <!-- footer-bottom start -->
        <div class="copyright">
            <div class="container-fluid">
                <div class="position-relative ptb-15 bst">
                    <!-- back-to-top start -->
                    <a href="javascript:void(0)" id="top"
                        class="icon-16 tertiary-btn position-absolute top-0 start-50 translate-middle width-32 height-32 d-flex align-items-center justify-content-center z-1 opacity-0 invisible border-radius"
                        aria-label="Back to top"><i class="ri-arrow-up-line d-block lh-1"></i></a>
                    <!-- back-to-top end -->
                    <div class="ul-mtm15 justify-content-between">
                        <div class="footer-menu">
                            <ul class="ftlink-ul ul-mtm15">
                                <li class="ftlink-li">
                                    <a href="cancellation.html"
                                        class="d-inline-block body-primary-color">Cancellation</a>
                                </li>
                                <li class="ftlink-li">
                                    <a href="legal.html" class="d-inline-block body-primary-color">Legal</a>
                                </li>
                                <li class="ftlink-li">
                                    <a href="404.html" class="d-inline-block body-primary-color">404</a>
                                </li>
                            </ul>
                        </div>
                        <div>Powered by spacingtech<sup>TM</sup></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer-bottom end -->
    </footer>
    <!-- footer end -->
    <!-- quickview-modal start -->
    {{-- <div class="quickview-modal modal fade" id="quickview-modal" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content body-bg border-0 br-hidden">
                <div class="modal-body ptb-30 plr-15 plr-md-30">
                    <div class="quickview-modal-header d-flex align-items-center justify-content-between meb-30">
                        <h6 class="font-18">Quickview</h6>
                        <button type="button" class="body-secondary-color icon-16" data-bs-dismiss="modal"
                            aria-label="Close"><i class="ri-close-large-line d-block lh-1"></i></button>
                    </div>
                    <div class="row row-mtm quickview-modal-content">
                        <div class="col-12 col-md-6">
                            <!-- quickview-detail-slider start -->
                            <div class="quickview-detail-slider">
                                <div class="row ul-mt15">
                                    <div class="col-12">
                                        <!-- quickview-img-big start -->
                                        <div
                                            class="quickview-img-big quickview-slider-big position-relative br-hidden">
                                            <div class="swiper" id="quickview-slider-big">
                                                <div class="swiper-wrapper">
                                                    <div class="swiper-slide">
                                                        <img src="{{ asset('frontend') }}/assets/image/product/product-1.jpg"
                                                            class="w-100 img-fluid" alt="product-1">
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <img src="{{ asset('frontend') }}/assets/image/product/product-2.jpg"
                                                            class="w-100 img-fluid" alt="product-2">
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <img src="{{ asset('frontend') }}/assets/image/product/product-3.jpg"
                                                            class="w-100 img-fluid" alt="product-3">
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <img src="{{ asset('frontend') }}/assets/image/product/product-4.jpg"
                                                            class="w-100 img-fluid" alt="product-4">
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <img src="{{ asset('frontend') }}/assets/image/product/product-5.jpg"
                                                            class="w-100 img-fluid" alt="product-5">
                                                    </div>
                                                </div>
                                                <div class="swiper-buttons">
                                                    <button type="button"
                                                        class="swiper-prev swiper-prev-quickview-big tertiary-btn icon-16 width-32 height-32 position-absolute top-50 translate-middle-y z-1 rounded-circle"
                                                        aria-label="Arrow previous"><i
                                                            class="ri-arrow-left-line d-block lh-1"></i></button>
                                                    <button type="button"
                                                        class="swiper-next swiper-next-quickview-big tertiary-btn icon-16 width-32 height-32 position-absolute top-50 translate-middle-y z-1 rounded-circle"
                                                        aria-label="Arrow next"><i
                                                            class="ri-arrow-right-line d-block lh-1"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- quickview-img-big end -->
                                    </div>
                                    <div class="col-12">
                                        <!-- quickview-img-small start -->
                                        <div class="quickview-img-small quickview-slider-small">
                                            <div class="swiper" id="quickview-slider-small">
                                                <div class="swiper-wrapper">
                                                    <div class="swiper-slide">
                                                        <img src="{{ asset('frontend') }}/assets/image/product/product-1.jpg"
                                                            class="w-100 img-fluid border-radius" alt="product-1">
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <img src="{{ asset('frontend') }}/assets/image/product/product-2.jpg"
                                                            class="w-100 img-fluid border-radius" alt="product-2">
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <img src="{{ asset('frontend') }}/assets/image/product/product-3.jpg"
                                                            class="w-100 img-fluid border-radius" alt="product-3">
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <img src="{{ asset('frontend') }}/assets/image/product/product-4.jpg"
                                                            class="w-100 img-fluid border-radius" alt="product-4">
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <img src="{{ asset('frontend') }}/assets/image/product/product-5.jpg"
                                                            class="w-100 img-fluid border-radius" alt="product-5">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- quickview-img-small end -->
                                    </div>
                                </div>
                            </div>
                            <!-- quickview-detail-slider end -->
                        </div>
                        <div class="col-12 col-md-6">
                            <!-- quickview-info start -->
                            <div class="quickview-info p-md-relative height-md-100">
                                <div
                                    class="quickview-detail-info p-md-absolute top-0 bottom-0 start-0 psl-md-3 per-md-30">
                                    <div class="quick-info" data-animate="animate__fadeIn">
                                        <div class="product-title">
                                            <h2 class="font-20">Pleated skater skirt</h2>
                                        </div>
                                    </div>
                                    <div class="quick-info mst-15" data-animate="animate__fadeIn">
                                        <div class="product-ratting">
                                            <div class="pro-review-write">
                                                <div class="pro-review">
                                                    <span class="review-ratting">
                                                        <span class="review-star icon-16">
                                                            <i class="ri-star-fill"></i>
                                                            <i class="ri-star-fill"></i>
                                                            <i class="ri-star-fill"></i>
                                                            <i class="ri-star-fill"></i>
                                                            <i class="ri-star-line"></i>
                                                        </span>
                                                        <span class="review-average">4.0<span
                                                                class="review-caption">Based on 2 reviews</span></span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="quick-info mst-15" data-animate="animate__fadeIn">
                                        <div class="product-view">
                                            <span class="heading-color"><i
                                                    class="ri-eye-line icon-16 mer-4 blinking"></i>Hot right now -
                                                <span class="product-live-visitor primary-color heading-weight"></span>
                                                views at this item</span>
                                        </div>
                                    </div>
                                    <div class="quick-info mst-10" data-animate="animate__fadeIn">
                                        <div class="product-timer">
                                            <div class="product-timer-countdown">
                                                <span class="heading-color"><i
                                                        class="ri-timer-line text-danger icon-16 mer-4"></i>Limited
                                                    time deal -
                                                    <span class="countdown" data-time="2027/12/31 00:00:00">
                                                        <span class="text-danger"><span
                                                                class="day heading-weight"></span>d</span>
                                                        <span class="text-danger"><span
                                                                class="hrs heading-weight"></span>h</span>
                                                        <span class="text-danger"><span
                                                                class="min heading-weight"></span>m</span>
                                                        <span class="text-danger"><span
                                                                class="sec heading-weight"></span>s</span>
                                                    </span> shop before it's over
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="quick-info mst-10" data-animate="animate__fadeIn">
                                        <div class="product-price">
                                            <div class="pro-price-box">
                                                <span
                                                    class="new-price primary-color font-24 heading-weight">$79.00</span>
                                                <span class="old-price font-20 heading-weight">
                                                    <span class="text-uppercase">M.r.p</span>
                                                    <span class="text-decoration-line-through">$89.00</span>
                                                </span>
                                                <span class="discount-price text-danger">11% off</span>
                                                <span class="font-12">inclusive of all taxes.</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="quick-info mst-15" data-animate="animate__fadeIn">
                                        <div class="product-availability">
                                            <span class="d-inline-block text-success"><span
                                                    class="heading-color heading-weight">Availability:</span> In
                                                stock</span>
                                        </div>
                                    </div>
                                    <div class="quick-info mst-10" data-animate="animate__fadeIn">
                                        <div class="product-stock">
                                            <span class="d-inline-block stock-fill"><span class="text-success"><span
                                                        class="available-stock">66</span> units left</span> - grab
                                                yours before it's too late</span>
                                            <div class="product-stock-bar product-stock-fill mst-8 br-hidden"></div>
                                        </div>
                                    </div>
                                    <div class="quick-info mst-10" data-animate="animate__fadeIn">
                                        <div class="product-sold">
                                            <span class="text-danger"><i
                                                    class="ri-fire-line icon-16 mer-4 blinking"></i>People are loving
                                                this - <span class="product-sold-count heading-weight"></span> sold
                                                recently in <span class="product-hours-count heading-weight"></span>
                                                hours</span>
                                        </div>
                                    </div>
                                    <div class="quick-info mst-20" data-animate="animate__fadeIn">
                                        <div class="product-border bst"></div>
                                    </div>
                                    <div class="quick-info mst-15" data-animate="animate__fadeIn">
                                        <div class="product-desc">
                                            <p>Twirl into style with this pleated skater skirt, designed for movement
                                                and charm. Its flattering silhouette and lightweight fabric make it a
                                                go-to piece for casual days or dressed-up moments. Comfortable, chic,
                                                and endlessly versatile.</p>
                                        </div>
                                    </div>
                                    <div class="quick-info mst-15" data-animate="animate__fadeIn">
                                        <div class="product-variant">
                                            <div class="product-variant-option">
                                                <span class="d-inline-block meb-11"><span
                                                        class="heading-color heading-weight">Size:</span> XS</span>
                                                <div class="product-option-block size">
                                                    <ul class="ul-mt5">
                                                        <li>
                                                            <label class="cust-checkbox-label">
                                                                <input type="radio"
                                                                    name="quick-pleated-skater-skirt-size"
                                                                    class="cust-checkbox" value="xs" checked>
                                                                <span
                                                                    class="d-flex align-items-center justify-content-center cust-check">XS</span>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="cust-checkbox-label disabled">
                                                                <input type="radio"
                                                                    name="quick-pleated-skater-skirt-size"
                                                                    class="cust-checkbox" value="s">
                                                                <span
                                                                    class="d-flex align-items-center justify-content-center cust-check">S</span>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="cust-checkbox-label">
                                                                <input type="radio"
                                                                    name="quick-pleated-skater-skirt-size"
                                                                    class="cust-checkbox" value="m">
                                                                <span
                                                                    class="d-flex align-items-center justify-content-center cust-check">M</span>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="cust-checkbox-label">
                                                                <input type="radio"
                                                                    name="quick-pleated-skater-skirt-size"
                                                                    class="cust-checkbox" value="l">
                                                                <span
                                                                    class="d-flex align-items-center justify-content-center cust-check">L</span>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="cust-checkbox-label">
                                                                <input type="radio"
                                                                    name="quick-pleated-skater-skirt-size"
                                                                    class="cust-checkbox" value="xl">
                                                                <span
                                                                    class="d-flex align-items-center justify-content-center cust-check">XL</span>
                                                            </label>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-variant-option mst-15">
                                                <span class="d-inline-block meb-11"><span
                                                        class="heading-color heading-weight">Color:</span>
                                                    Aliceblue</span>
                                                <div class="product-option-block color">
                                                    <ul class="ul-mt10">
                                                        <li>
                                                            <label class="cust-checkbox-label">
                                                                <input type="radio"
                                                                    name="quick-pleated-skater-skirt-color"
                                                                    class="cust-checkbox" value="aliceblue" checked>
                                                                <span class="d-block cust-check aliceblue"></span>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="cust-checkbox-label disabled">
                                                                <input type="radio"
                                                                    name="quick-pleated-skater-skirt-color"
                                                                    class="cust-checkbox" value="antiquewhite">
                                                                <span class="d-block cust-check antiquewhite"></span>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="cust-checkbox-label">
                                                                <input type="radio"
                                                                    name="quick-pleated-skater-skirt-color"
                                                                    class="cust-checkbox" value="azure">
                                                                <span class="d-block cust-check azure"></span>
                                                            </label>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-variant-option mst-15">
                                                <span class="d-inline-block"><span
                                                        class="heading-color heading-weight">Material:</span>
                                                    Polyester</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="quick-info mst-15" data-animate="animate__fadeIn">
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
                                                        <input type="number"
                                                            name="quick-pleated-skater-skirt-xs-aliceblue"
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
                                                    <div class="col-12 col-md-6">
                                                        <a href="checkout.html"
                                                            class="w-100 btn-style secondary-btn">Buy now</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="quick-info mst-15" data-animate="animate__fadeIn">
                                        <div class="ul-row">
                                            <div class="product-wishlist">
                                                <a href="javascript:void(0)" class="add-to-wishlist heading-color"><i
                                                        class="ri-heart-line icon-16 mer-4"></i><span
                                                        class="heading-weight">Wishlist</span></a>
                                            </div>
                                            <div class="product-compare">
                                                <a href="product-comparison.html"
                                                    class="add-to-compare heading-color"><i
                                                        class="ri-stack-line icon-16 mer-4"></i><span
                                                        class="heading-weight">Compare</span></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="quick-info mst-20" data-animate="animate__fadeIn">
                                        <div class="product-border bst"></div>
                                    </div>
                                    <div class="quick-info mst-20" data-animate="animate__fadeIn">
                                        <div class="product-payment">
                                            <span class="d-inline-block heading-color meb-11 heading-weight">Payment
                                                protection guaranteed</span>
                                            <ul class="payment-ul">
                                                <li class="payment-li ul-mt5 lh-0">
                                                    <a href="javascript:void(0)" class="d-block"><img
                                                            src="{{ asset('frontend') }}/assets/image/other/paying-american.png"
                                                            class="width-40 img-fluid border-radius"
                                                            alt="paying-american"></a>
                                                    <a href="javascript:void(0)" class="d-block"><img
                                                            src="{{ asset('frontend') }}/assets/image/other/paying-club.png"
                                                            class="width-40 img-fluid border-radius"
                                                            alt="paying-club"></a>
                                                    <a href="javascript:void(0)" class="d-block"><img
                                                            src="{{ asset('frontend') }}/assets/image/other/paying-discover.png"
                                                            class="width-40 img-fluid border-radius"
                                                            alt="paying-discover"></a>
                                                    <a href="javascript:void(0)" class="d-block"><img
                                                            src="{{ asset('frontend') }}/assets/image/other/paying-maestro.png"
                                                            class="width-40 img-fluid border-radius"
                                                            alt="paying-maestro"></a>
                                                    <a href="javascript:void(0)" class="d-block"><img
                                                            src="{{ asset('frontend') }}/assets/image/other/paying-paypal.png"
                                                            class="width-40 img-fluid border-radius"
                                                            alt="paying-paypal"></a>
                                                    <a href="javascript:void(0)" class="d-block"><img
                                                            src="{{ asset('frontend') }}/assets/image/other/paying-visa.png"
                                                            class="width-40 img-fluid border-radius"
                                                            alt="paying-visa"></a>
                                                </li>
                                            </ul>
                                            <p class="mst-8">Shop with confidence - all transactions are securely
                                                processed with industry-standard encryption.</p>
                                        </div>
                                    </div>
                                    <div class="quick-info mst-10" data-animate="animate__fadeIn">
                                        <div class="product-sku">
                                            <span class="d-inline-block"><span
                                                    class="heading-color heading-weight">SKU:</span> ER-ABC456</span>
                                        </div>
                                    </div>
                                    <div class="quick-info mst-10" data-animate="animate__fadeIn">
                                        <div class="product-share d-flex align-items-center">
                                            <span class="heading-color heading-weight">Share:</span>
                                            <div class="product-social">
                                                <ul class="social-ul ul-mt5">
                                                    <li class="social-li">
                                                        <a href="javascript:void(0)" class="dribbble icon-16"
                                                            aria-label="Social link"><i
                                                                class="ri-dribbble-fill d-block lh-1"></i></a>
                                                    </li>
                                                    <li class="social-li">
                                                        <a href="javascript:void(0)" class="facebook icon-16"
                                                            aria-label="Social link"><i
                                                                class="ri-facebook-fill d-block lh-1"></i></a>
                                                    </li>
                                                    <li class="social-li">
                                                        <a href="javascript:void(0)" class="instagram icon-16"
                                                            aria-label="Social link"><i
                                                                class="ri-instagram-fill d-block instagram lh-1"></i></a>
                                                    </li>
                                                    <li class="social-li">
                                                        <a href="javascript:void(0)" class="linkedin icon-16"
                                                            aria-label="Social link"><i
                                                                class="ri-linkedin-fill d-block lh-1"></i></a>
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
                                    <div class="quick-info mst-10">
                                        <div class="product-view-link">
                                            <a href="product.html" class="d-inline-block font-12"><i
                                                    class="ri-file-info-line mer-4"></i><span
                                                    class="text-decoration-underline">View full details of this
                                                    product</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- quickview-info end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- quickview-modal end -->
    <!-- mobile-menu start -->
    <div class="mobile-menu d-xl-none position-fixed top-0 bottom-0 body-bg z-index-5 invisible box-shadow"
        id="mobile-menu">
        <div class="mobile-contents d-flex flex-column">
            <div class="menu-close ptb-10 plr-15 beb">
                <button type="button" class="menu-close-btn d-block body-secondary-color icon-16 ms-auto"
                    aria-label="Menu close"><i class="ri-close-large-line d-block lh-1"></i></button>
            </div>
            <div class="mobilemenu-content beb">
                <div class="main-wrap">
                    <ul class="menu-ul">
                        <li class="menudrop-li bst">
                            <span class="d-block ptb-10 psl-20 per-15"><a href="{{ route('home') }}"
                                    class="d-inline-block body-color">Home</a></span>
                        </li>
                        <li class="menudrop-li bst">
                            <span class="d-block ptb-10 psl-20 per-15"><a href="{{ route('categories') }}"
                                    class="d-inline-block body-color">Categories</a></span>
                        </li>
                        <li class="menudrop-li bst">
                            <span class="d-block ptb-10 psl-20 per-15"><a href="{{ route('products') }}"
                                    class="d-inline-block body-color">Products</a></span>
                        </li>
                        <li class="menudrop-li bst">
                            <span class="d-block ptb-10 psl-20 per-15"><a href="{{ route('about') }}"
                                    class="d-inline-block body-color">About</a></span>
                        </li>
                        <li class="menudrop-li bst">
                            <span class="d-block ptb-10 psl-20 per-15"><a href="{{ route('contact') }}"
                                    class="d-inline-block body-color">contact</a></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- mobile-menu end -->
    <!-- search-modal start -->
    <div class="search-modal modal fade" id="searchmodal">
        <div class="modal-dialog mw-100 m-0">
            <div class="modal-content body-bg border-0 rounded-0">
                <div class="modal-body p-0">
                    <div class="container">
                        <div class="search-content ptb-30">
                            <div class="search-box d-flex flex-row-reverse">
                                <button type="button" class="d-block search-close body-secondary-color icon-16"
                                    data-bs-dismiss="modal" aria-label="Close"><i
                                        class="ri-close-large-line d-block lh-1"></i></button>

                                <form method="GET" action="{{ route('products') }}" class="search-form w-100">

                                    <div class="search-bar position-relative">

                                        <div class="form-search d-flex flex-row-reverse">

                                            <input type="search" name="q"
                                                class="search-input w-100 h-auto ptb-0 plr-15 bg-transparent border-0"
                                                value="{{ request('q') }}" placeholder="Search here"
                                                autocomplete="off" required>

                                            <button type="submit"
                                                class="d-block search-btn body-secondary-color icon-16"
                                                aria-label="Go to search" disabled>
                                                <i class="ri-search-line d-block lh-1"></i>
                                            </button>

                                        </div>

                                        <div
                                            class="search-results d-none position-absolute top-100 start-0 end-0 body-bg z-1 border-full border-radius box-shadow">

                                            <div class="search-for ptb-10 plr-15 beb">
                                                Search for <span class="search-text"></span>
                                            </div>

                                            <div class="search-products"></div>

                                            <div class="search-more ptb-10 plr-15 bst">
                                                <a href="{{ route('products') }}"
                                                    class="body-secondary-color text-decoration-underline">
                                                    See all results (<span class="search-total">0</span>)
                                                </a>
                                            </div>

                                            <div class="search-fail ptb-10 plr-15 d-none">
                                                Search not found
                                            </div>

                                        </div>

                                    </div>
                                </form>

                            </div>
                            <div class="search-example-text mst-15">Trending search: a, e, cotton...</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- search-modal end -->
    <!-- cart-drawer start -->

    <div class="cart-drawer position-fixed top-0 bottom-0 body-bg z-index-5 invisible box-shadow" id="cart-drawer">

        <form method="POST" action="javascript:void(0)" class="drawer-contents d-flex flex-column">

            {{-- Header --}}
            <div class="drawer-fixed-header ptb-10 plr-15 beb">
                <div class="drawer-header d-flex align-items-center justify-content-between">
                    <h6 class="font-18">My shopping cart</h6>

                    <div class="drawer-close">
                        <button type="button" class="drawer-close-btn body-secondary-color icon-16"
                            aria-label="Close">
                            <i class="ri-close-large-line d-block lh-1"></i>
                        </button>
                    </div>
                </div>
            </div>
            {{-- Empty Cart --}}
            <div class="drawer-cart-empty d-none h-100 ptb-30 plr-15" id="cart-empty">

                <div
                    class="drawer-scrollable h-100 d-flex flex-column
                        align-items-center justify-content-center text-center">

                    <span class="heading-color icon-32 meb-24">
                        <i class="ri-shopping-bag-3-line d-block lh-1"></i>
                    </span>

                    <h2 class="font-24">
                        No items in your shopping cart - yet!
                    </h2>

                    <a href="{{ route('products') }}" class="btn-style secondary-btn mst-24">
                        Continue shopping
                    </a>
                </div>
            </div>

            {{-- Cart Content --}}
            <div class="drawer-inner h-100 d-flex flex-column
                 overflow-hidden" id="cart-content">

                <div class="drawer-scrollable h-100 overflow-auto">

                    {{-- Dynamic Cart Items --}}
                    <div class="cart-drawer-table plr-15" id="cart-items">
                        {{-- JavaScript will render cart items here --}}
                    </div>
                </div>

                {{-- Footer --}}
                <div class="drawer-footer ptb-15 plr-15 bst">

                    <div class="drawer-total d-flex justify-content-between">
                        <span>Subtotal</span>

                        <span class="heading-color heading-weight" data-cart-subtotal>
                            ৳0.00
                        </span>
                    </div>

                    <div class="font-12 mst-8">
                        Shipping, taxes, and discount codes calculated at checkout
                    </div>

                    <div class="drawer-cart-checkout mst-12">

                        <div class="drawer-cart-box meb-11">
                            <label class="cust-checkbox-label checkbox-agree">

                                <input type="checkbox" id="drawer-terms" class="cust-checkbox checkboxbtn" checked>

                                <span class="d-block cust-check"></span>

                                <span class="login-read">
                                    I agree with the
                                    <a href="{{ url('/terms-condition') }}"
                                        class="body-secondary-color text-decoration-underline">
                                        terms & conditions
                                    </a>.
                                </span>
                            </label>
                        </div>

                        <div class="row btn-row15">
                            <div class="ms-auto col-md-6">
                                <a href="{{ url('/checkout') }}" id="cart-checkout-btn"
                                    class="w-100 btn-style secondary-btn hide-btn
                                      opacity-50 disabled pe-none ms-auto">
                                    Checkout
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- cart-drawer end -->
    <!-- bottom-menu start -->
    <div class="bottom-menu d-md-none position-sticky bottom-0 body-bg z-1 box-shadow">
        <div class="bottom-menu-element d-flex flex-wrap align-items-center">
            <div class="col">
                <a href="{{ route('home') }}" class="d-flex flex-column align-items-center ptb-10 text-center">
                    <span class="bottom-menu-icon heading-color icon-16"><i
                            class="ri-home-8-line d-block lh-1"></i></span>
                    <span class="bottom-menu-title body-color font-10 mst-4 text-uppercase lh-1">Home</span>
                </a>
            </div>
            <div class="col">
                <a href="{{ route('profile.index') }}"
                    class="d-flex flex-column align-items-center ptb-10 text-center">
                    <span class="bottom-menu-icon heading-color icon-16"><i
                            class="ri-user-line d-block lh-1"></i></span>
                    <span class="bottom-menu-title body-color font-10 mst-4 text-uppercase lh-1">Account</span>
                </a>
            </div>
            <div class="col">
                <a href="{{ route('products') }}" class="d-flex flex-column align-items-center ptb-10 text-center">
                    <span class="bottom-menu-icon heading-color icon-16"><i
                            class="ri-layout-grid-line d-block lh-1"></i></span>
                    <span class="bottom-menu-title body-color font-10 mst-4 text-uppercase lh-1">Products</span>
                </a>
            </div>
            <div class="col">

                <a href="javascript:void(0)"
                    class="js-cart-drawer d-flex flex-column align-items-center ptb-10 text-center">
                    <span class="bottom-menu-icon-wrap position-relative per-8">
                        <span class="d-block bottom-menu-icon heading-color icon-16"><i
                                class="ri-shopping-bag-3-line d-block lh-1"></i></span>
                        <span
                            class="bottom-menu-counter cart-counter extra-color font-10 position-absolute end-0 primary-bg d-flex align-items-center justify-content-center rounded-circle">0</span>
                    </span>
                    <span class="bottom-menu-title body-color font-10 mst-4 text-uppercase lh-1">Cart</span>
                </a>
            </div>
        </div>
    </div>
    <!-- bottom-menu end -->
    <!-- bg-screen start -->
    <div class="bg-screen">
        <div class="bg-back position-fixed top-0 end-0 bottom-0 start-0 bg-black z-index-4 opacity-0 invisible"></div>
        <div class="bg-shop position-fixed top-0 end-0 bottom-0 start-0 bg-black z-index-4 opacity-0 invisible"></div>
    </div>
    <!-- bg-screen end -->
    <!-- plugin js -->
    <script src="{{ asset('frontend') }}/assets/js/plugin.js"></script>
    <!-- theme js -->
    <script src="{{ asset('frontend') }}/assets/js/theme.js"></script>
    <script src="{{ asset('frontend/assets/js/cart.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/search.js') }}"></script>
    @vite('resources/js/app.js')
</body>

</html>
