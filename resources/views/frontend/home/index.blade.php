@extends('layouts.master')
@section('master')
    <main id="main">
        <!-- service-area start -->
        <div class="service-area bst">
            <div class="container-fluid">
                <div class="service-slider swiper" id="service-slider">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide d-flex h-auto">
                            <div class="service-content w-100 d-flex align-items-center justify-content-center ptb-8 plr-15">
                                <span class="primary-color icon-24 mer-5"><i class="ri-truck-line"></i></span>
                                <span class="heading-color heading-weight">Free shipping</span>
                            </div>
                        </div>
                        <div class="swiper-slide d-flex h-auto">
                            <div
                                class="service-content w-100 d-flex align-items-center justify-content-center ptb-8 plr-15">
                                <span class="primary-color icon-24 mer-5"><i class="ri-lock-line"></i></span>
                                <span class="heading-color heading-weight">Secure payment</span>
                            </div>
                        </div>
                        <div class="swiper-slide d-flex h-auto">
                            <div
                                class="service-content w-100 d-flex align-items-center justify-content-center ptb-8 plr-15">
                                <span class="primary-color icon-24 mer-5"><i class="ri-headphone-line"></i></span>
                                <span class="heading-color heading-weight">24/7 support</span>
                            </div>
                        </div>
                        <div class="swiper-slide d-flex h-auto">
                            <div
                                class="service-content w-100 d-flex align-items-center justify-content-center ptb-8 plr-15">
                                <span class="primary-color icon-24 mer-5"><i class="ri-percent-line"></i></span>
                                <span class="heading-color heading-weight">Festival offer</span>
                            </div>
                        </div>
                        <div class="swiper-slide d-flex h-auto">
                            <div
                                class="service-content w-100 d-flex align-items-center justify-content-center ptb-8 plr-15">
                                <span class="primary-color icon-24 mer-5"><i class="ri-rotate-lock-line"></i></span>
                                <span class="heading-color heading-weight">Refund policy</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- service-area end -->
        <!-- main-slider start -->
        <section class="slider-content position-relative">
            <div class="home-slider swiper" id="home-slider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="bg-img d-flex flex-wrap text-center"
                            data-bgimg="{{ asset('frontend') }}/assets/image/index/slider-bgimg1.jpg">
                            <div
                                class="col-12 col-lg-4 d-flex flex-column align-items-center justify-content-center section-ptb plr-15 plr-md-30 slider-content-info">
                                <div
                                    class="slider-subtitle primary-color font-18 font-xl-20 meb-15 meb-sm-17 meb-xl-29 meb-xxl-33">
                                    Perfect design every cloth</div>
                                <h2 class="font-32 font-sm-48 font-xl-72 font-xxl-80 text-uppercase"><span
                                        class="fw-bolder">Unique</span> fashion</h2>
                                <a href="collection.html"
                                    class="btn-style primary-btn mst-20 mst-sm-23 mst-xl-34 mst-xxl-38">Shop collection</a>
                            </div>
                            <div class="col-6 col-lg-4 order-lg-first">
                                <span class="d-inline-block slider-content-img1"><img
                                        src="{{ asset('frontend') }}/assets/image/index/slider-1.1.png"
                                        class="w-100 img-fluid" alt="slider-1.1"></span>
                            </div>
                            <div class="col-6 col-lg-4">
                                <span class="d-inline-block slider-content-img2"><img
                                        src="{{ asset('frontend') }}/assets/image/index/slider-1.2.png"
                                        class="w-100 img-fluid" alt="slider-1.2"></span>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="bg-img d-flex flex-wrap text-center"
                            data-bgimg="{{ asset('frontend') }}/assets/image/index/slider-bgimg2.jpg">
                            <div
                                class="col-12 col-lg-4 d-flex flex-column align-items-center justify-content-center section-ptb plr-15 plr-md-30 slider-content-info">
                                <div
                                    class="slider-subtitle primary-color font-18 font-xl-20 meb-15 meb-sm-17 meb-xl-29 meb-xxl-33">
                                    New season sale get 50% off</div>
                                <h2 class="font-32 font-sm-48 font-xl-72 font-xxl-80 text-uppercase"><span
                                        class="fw-bolder">Stylish</span> fashion</h2>
                                <a href="collection.html"
                                    class="btn-style primary-btn mst-20 mst-sm-23 mst-xl-34 mst-xxl-38">Shop collection</a>
                            </div>
                            <div class="col-6 col-lg-4 order-lg-first">
                                <span class="d-inline-block slider-content-img1"><img
                                        src="{{ asset('frontend') }}/assets/image/index/slider-2.1.png"
                                        class="w-100 img-fluid" alt="slider-2.1"></span>
                            </div>
                            <div class="col-6 col-lg-4">
                                <span class="d-inline-block slider-content-img2"><img
                                        src="{{ asset('frontend') }}/assets/image/index/slider-2.2.png"
                                        class="w-100 img-fluid" alt="slider-2.2"></span>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="bg-img d-flex flex-wrap text-center"
                            data-bgimg="{{ asset('frontend') }}/assets/image/index/slider-bgimg3.jpg">
                            <div
                                class="col-12 col-lg-4 d-flex flex-column align-items-center justify-content-center section-ptb plr-15 plr-md-30 slider-content-info">
                                <div
                                    class="slider-subtitle primary-color font-18 font-xl-20 meb-15 meb-sm-17 meb-xl-29 meb-xxl-33">
                                    Flat 10% off on order of $49.99</div>
                                <h2 class="font-32 font-sm-48 font-xl-72 font-xxl-80 text-uppercase"><span
                                        class="fw-bolder">Elegant</span> fashion</h2>
                                <a href="collection.html"
                                    class="btn-style primary-btn mst-20 mst-sm-23 mst-xl-34 mst-xxl-38">Shop collection</a>
                            </div>
                            <div class="col-6 col-lg-4 order-lg-first">
                                <span class="d-inline-block slider-content-img1"><img
                                        src="{{ asset('frontend') }}/assets/image/index/slider-3.1.png"
                                        class="w-100 img-fluid" alt="slider-3.1"></span>
                            </div>
                            <div class="col-6 col-lg-4">
                                <span class="d-inline-block slider-content-img2"><img
                                        src="{{ asset('frontend') }}/assets/image/index/slider-3.2.png"
                                        class="w-100 img-fluid" alt="slider-3.2"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-buttons d-none">
                <div class="swiper-buttons-wrap">
                    <button type="button"
                        class="swiper-prev swiper-prev-homeslider icon-16 width-40 height-40 position-absolute top-50 translate-middle-y z-1"
                        aria-label="Arrow previous"><i class="ri-arrow-left-line d-block lh-1"></i></button>
                    <button type="button"
                        class="swiper-next swiper-next-homeslider icon-16 width-40 height-40 position-absolute top-50 translate-middle-y z-1"
                        aria-label="Arrow next"><i class="ri-arrow-right-line d-block lh-1"></i></button>
                </div>
            </div>
            <div class="swiper-dots d-none position-absolute bottom-0 start-50 translate-middle-x z-1 meb-15 meb-md-30">
                <div class="swiper-pagination swiper-pagination-homeslider d-flex flex-wrap"></div>
            </div>
        </section>
        <!-- main-slider end -->
        <!-- category-slider start -->
        <section class="category-slider section-ptb extra-bg">
            <div class="container-fluid">
                <div class="cat-category">
                    <div class="section-capture text-center">
                        <div class="section-title" data-animate="animate__fadeIn">
                            <h2 class="section-heading">Every best category</h2>
                        </div>
                    </div>
                    <div class="cat-wrap">
                        <div class="cat-slider swiper" id="cat-slider">
                            <div class="swiper-wrapper">
                                @forelse($categories as $category)
                                    <div class="swiper-slide h-auto d-flex" data-animate="animate__fadeIn">
                                        <div class="cat-block banner-hover w-100 ptb-15 plr-15 body-bg border-radius">
                                            <a href="collection.html"
                                                class="d-none d-xl-block position-relative banner-img br-hidden">
                                                <span
                                                    class="btn-style tertiary-btn banner-btn position-absolute top-50 start-50 translate-middle z-1 text-nowrap">Shop
                                                    now</span>
                                                <img src="{{ asset('frontend') }}/assets/image/collection/collection-1.jpg"
                                                    class="w-100 img-fluid" alt="collection-1">
                                            </a>
                                            <a href="collection.html" class="d-block d-xl-none banner-img br-hidden">
                                                <img src="{{ asset('frontend') }}/assets/image/collection/collection-1.jpg"
                                                    class="w-100 img-fluid" alt="collection-1">
                                            </a>
                                            <div class="cat-content pst-15">
                                                <div class="ul-mtm15 justify-content-between heading-weight">
                                                    <span class="heading-color text-truncate">{{$category->name}}</span>
                                                    <span class="primary-color text-uppercase">8+ item</span>
                                                </div>
                                                <div class="d-xl-none mst-7">
                                                    <a href="collection.html" class="link-btn">Shop now</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="swiper-slide h-auto d-flex" data-animate="animate__fadeIn">
                                        <div class="cat-block banner-hover w-100 ptb-15 plr-15 body-bg border-radius">
                                            <a href="collection.html"
                                                class="d-none d-xl-block position-relative banner-img br-hidden">
                                                <span
                                                    class="btn-style tertiary-btn banner-btn position-absolute top-50 start-50 translate-middle z-1 text-nowrap">Shop
                                                    now</span>
                                                <img src="{{ asset('frontend') }}/assets/image/collection/collection-1.jpg"
                                                    class="w-100 img-fluid" alt="collection-1">
                                            </a>
                                            <a href="collection.html" class="d-block d-xl-none banner-img br-hidden">
                                                <img src="{{ asset('frontend') }}/assets/image/collection/collection-1.jpg"
                                                    class="w-100 img-fluid" alt="collection-1">
                                            </a>
                                            <div class="cat-content pst-15">
                                                <div class="ul-mtm15 justify-content-between heading-weight">
                                                    <span class="heading-color text-truncate">Womens wear</span>
                                                    <span class="primary-color text-uppercase">8+ item</span>
                                                </div>
                                                <div class="d-xl-none mst-7">
                                                    <a href="collection.html" class="link-btn">Shop now</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforelse

                            </div>
                        </div>
                        <div class="swiper-buttons">
                            <div class="swiper-buttons-wrap">
                                <button type="button" class="swiper-prev swiper-prev-cat" aria-label="Arrow previous"><i
                                        class="ri-arrow-left-line d-block lh-1"></i></button>
                                <button type="button" class="swiper-next swiper-next-cat" aria-label="Arrow next"><i
                                        class="ri-arrow-right-line d-block lh-1"></i></button>
                            </div>
                        </div>
                        <div class="swiper-dots" data-animate="animate__fadeIn">
                            <div class="swiper-pagination swiper-pagination-cat"></div>
                        </div>
                        <div class="view-button d-none" data-animate="animate__fadeIn">
                            <a href="collections.html" class="btn-style tertiary-btn">See more</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- category-slider end -->
        <!-- scroll-text start -->
        <div class="scroll-text ptb-10 primary-bg overflow-hidden">
            <div class="d-flex">
                <div class="scroll-text-row scroll-text-left d-flex align-items-center">
                    <span class="extra-color msl-15 text-nowrap" data-animate="animate__fadeIn">Get 40% Off on trending
                        styles</span>
                    <span class="width-24 msl-15" data-animate="animate__fadeIn"><img
                            src="{{ asset('frontend') }}/assets/image/index/scroll-text-img1.png" class="w-100 img-fluid"
                            alt="scroll-text-img1"></span>
                    <span class="extra-color msl-15 text-nowrap" data-animate="animate__fadeIn">Buy 2, Get 1 free on all
                        apparel</span>
                    <span class="width-24 msl-15" data-animate="animate__fadeIn"><img
                            src="{{ asset('frontend') }}/assets/image/index/scroll-text-img1.png" class="w-100 img-fluid"
                            alt="scroll-text-img1"></span>
                    <span class="extra-color msl-15 text-nowrap" data-animate="animate__fadeIn">Enjoy free shipping over
                        $75</span>
                    <span class="width-24 msl-15" data-animate="animate__fadeIn"><img
                            src="{{ asset('frontend') }}/assets/image/index/scroll-text-img1.png" class="w-100 img-fluid"
                            alt="scroll-text-img1"></span>
                    <span class="extra-color msl-15 text-nowrap" data-animate="animate__fadeIn">Up to 60% off this weekend
                        only</span>
                    <span class="width-24 msl-15" data-animate="animate__fadeIn"><img
                            src="{{ asset('frontend') }}/assets/image/index/scroll-text-img1.png" class="w-100 img-fluid"
                            alt="scroll-text-img1"></span>
                    <span class="extra-color msl-15 text-nowrap" data-animate="animate__fadeIn">New arrivals starting at
                        $19.99</span>
                    <span class="width-24 msl-15" data-animate="animate__fadeIn"><img
                            src="{{ asset('frontend') }}/assets/image/index/scroll-text-img1.png" class="w-100 img-fluid"
                            alt="scroll-text-img1"></span>
                </div>
                <div class="scroll-text-row scroll-text-left d-flex align-items-center">
                    <span class="extra-color msl-15 text-nowrap" data-animate="animate__fadeIn">Get 40% Off on trending
                        styles</span>
                    <span class="width-24 msl-15" data-animate="animate__fadeIn"><img
                            src="{{ asset('frontend') }}/assets/image/index/scroll-text-img1.png" class="w-100 img-fluid"
                            alt="scroll-text-img1"></span>
                    <span class="extra-color msl-15 text-nowrap" data-animate="animate__fadeIn">Buy 2, Get 1 free on all
                        apparel</span>
                    <span class="width-24 msl-15" data-animate="animate__fadeIn"><img
                            src="{{ asset('frontend') }}/assets/image/index/scroll-text-img1.png" class="w-100 img-fluid"
                            alt="scroll-text-img1"></span>
                    <span class="extra-color msl-15 text-nowrap" data-animate="animate__fadeIn">Enjoy free shipping over
                        $75</span>
                    <span class="width-24 msl-15" data-animate="animate__fadeIn"><img
                            src="{{ asset('frontend') }}/assets/image/index/scroll-text-img1.png" class="w-100 img-fluid"
                            alt="scroll-text-img1"></span>
                    <span class="extra-color msl-15 text-nowrap" data-animate="animate__fadeIn">Up to 60% off this weekend
                        only</span>
                    <span class="width-24 msl-15" data-animate="animate__fadeIn"><img
                            src="{{ asset('frontend') }}/assets/image/index/scroll-text-img1.png" class="w-100 img-fluid"
                            alt="scroll-text-img1"></span>
                    <span class="extra-color msl-15 text-nowrap" data-animate="animate__fadeIn">New arrivals starting at
                        $19.99</span>
                    <span class="width-24 msl-15" data-animate="animate__fadeIn"><img
                            src="{{ asset('frontend') }}/assets/image/index/scroll-text-img1.png" class="w-100 img-fluid"
                            alt="scroll-text-img1"></span>
                </div>
            </div>
        </div>
        <!-- scroll-text end -->
        <!-- scroll-text start -->
        <div class="scroll-text ptb-10 extra-bg overflow-hidden">
            <div class="d-flex">
                <div class="scroll-text-row scroll-text-right d-flex align-items-center">
                    <span class="heading-color msl-15 text-nowrap" data-animate="animate__fadeIn">Get 40% Off on trending
                        styles</span>
                    <span class="width-24 msl-15" data-animate="animate__fadeIn"><img
                            src="{{ asset('frontend') }}/assets/image/index/scroll-text-img2.png" class="w-100 img-fluid"
                            alt="scroll-text-img2"></span>
                    <span class="heading-color msl-15 text-nowrap" data-animate="animate__fadeIn">Buy 2, Get 1 free on all
                        apparel</span>
                    <span class="width-24 msl-15" data-animate="animate__fadeIn"><img
                            src="{{ asset('frontend') }}/assets/image/index/scroll-text-img2.png" class="w-100 img-fluid"
                            alt="scroll-text-img2"></span>
                    <span class="heading-color msl-15 text-nowrap" data-animate="animate__fadeIn">Enjoy free shipping over
                        $75</span>
                    <span class="width-24 msl-15" data-animate="animate__fadeIn"><img
                            src="{{ asset('frontend') }}/assets/image/index/scroll-text-img2.png" class="w-100 img-fluid"
                            alt="scroll-text-img2"></span>
                    <span class="heading-color msl-15 text-nowrap" data-animate="animate__fadeIn">Up to 60% off this
                        weekend only</span>
                    <span class="width-24 msl-15" data-animate="animate__fadeIn"><img
                            src="{{ asset('frontend') }}/assets/image/index/scroll-text-img2.png" class="w-100 img-fluid"
                            alt="scroll-text-img2"></span>
                    <span class="heading-color msl-15 text-nowrap" data-animate="animate__fadeIn">New arrivals starting at
                        $19.99</span>
                    <span class="width-24 msl-15" data-animate="animate__fadeIn"><img
                            src="{{ asset('frontend') }}/assets/image/index/scroll-text-img2.png" class="w-100 img-fluid"
                            alt="scroll-text-img2"></span>
                </div>
                <div class="scroll-text-row scroll-text-right d-flex align-items-center">
                    <span class="heading-color msl-15 text-nowrap" data-animate="animate__fadeIn">Get 40% Off on trending
                        styles</span>
                    <span class="width-24 msl-15" data-animate="animate__fadeIn"><img
                            src="{{ asset('frontend') }}/assets/image/index/scroll-text-img2.png" class="w-100 img-fluid"
                            alt="scroll-text-img2"></span>
                    <span class="heading-color msl-15 text-nowrap" data-animate="animate__fadeIn">Buy 2, Get 1 free on all
                        apparel</span>
                    <span class="width-24 msl-15" data-animate="animate__fadeIn"><img
                            src="{{ asset('frontend') }}/assets/image/index/scroll-text-img2.png" class="w-100 img-fluid"
                            alt="scroll-text-img2"></span>
                    <span class="heading-color msl-15 text-nowrap" data-animate="animate__fadeIn">Enjoy free shipping over
                        $75</span>
                    <span class="width-24 msl-15" data-animate="animate__fadeIn"><img
                            src="{{ asset('frontend') }}/assets/image/index/scroll-text-img2.png" class="w-100 img-fluid"
                            alt="scroll-text-img2"></span>
                    <span class="heading-color msl-15 text-nowrap" data-animate="animate__fadeIn">Up to 60% off this
                        weekend only</span>
                    <span class="width-24 msl-15" data-animate="animate__fadeIn"><img
                            src="{{ asset('frontend') }}/assets/image/index/scroll-text-img2.png" class="w-100 img-fluid"
                            alt="scroll-text-img2"></span>
                    <span class="heading-color msl-15 text-nowrap" data-animate="animate__fadeIn">New arrivals starting at
                        $19.99</span>
                    <span class="width-24 msl-15" data-animate="animate__fadeIn"><img
                            src="{{ asset('frontend') }}/assets/image/index/scroll-text-img2.png" class="w-100 img-fluid"
                            alt="scroll-text-img2"></span>
                </div>
            </div>
        </div>
        <!-- scroll-text end -->
        <!-- brand-logo start -->
        <div class="brand-logo section-pt">
            <div class="container-fluid">
                <div class="brand-category">
                    <div class="brand-wrap">
                        <div class="brand-slider swiper" id="brand-slider">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide" data-animate="animate__fadeIn">
                                    <div class="brand-content text-center">
                                        <span class="brand-img"><img
                                                src="{{ asset('frontend') }}/assets/image/brand-logo/brand-logo1.png"
                                                class="width-128 img-fluid" alt="brand-logo1"></span>
                                    </div>
                                </div>
                                <div class="swiper-slide" data-animate="animate__fadeIn">
                                    <div class="brand-content text-center">
                                        <span class="brand-img"><img
                                                src="{{ asset('frontend') }}/assets/image/brand-logo/brand-logo2.png"
                                                class="width-128 img-fluid" alt="brand-logo2"></span>
                                    </div>
                                </div>
                                <div class="swiper-slide" data-animate="animate__fadeIn">
                                    <div class="brand-content text-center">
                                        <span class="brand-img"><img
                                                src="{{ asset('frontend') }}/assets/image/brand-logo/brand-logo3.png"
                                                class="width-128 img-fluid" alt="brand-logo3"></span>
                                    </div>
                                </div>
                                <div class="swiper-slide" data-animate="animate__fadeIn">
                                    <div class="brand-content text-center">
                                        <span class="brand-img"><img
                                                src="{{ asset('frontend') }}/assets/image/brand-logo/brand-logo4.png"
                                                class="width-128 img-fluid" alt="brand-logo4"></span>
                                    </div>
                                </div>
                                <div class="swiper-slide" data-animate="animate__fadeIn">
                                    <div class="brand-content text-center">
                                        <span class="brand-img"><img
                                                src="{{ asset('frontend') }}/assets/image/brand-logo/brand-logo5.png"
                                                class="width-128 img-fluid" alt="brand-logo5"></span>
                                    </div>
                                </div>
                                <div class="swiper-slide" data-animate="animate__fadeIn">
                                    <div class="brand-content text-center">
                                        <span class="brand-img"><img
                                                src="{{ asset('frontend') }}/assets/image/brand-logo/brand-logo6.png"
                                                class="width-128 img-fluid" alt="brand-logo6"></span>
                                    </div>
                                </div>
                                <div class="swiper-slide" data-animate="animate__fadeIn">
                                    <div class="brand-content text-center">
                                        <span class="brand-img"><img
                                                src="{{ asset('frontend') }}/assets/image/brand-logo/brand-logo7.png"
                                                class="width-128 img-fluid" alt="brand-logo7"></span>
                                    </div>
                                </div>
                                <div class="swiper-slide" data-animate="animate__fadeIn">
                                    <div class="brand-content text-center">
                                        <span class="brand-img"><img
                                                src="{{ asset('frontend') }}/assets/image/brand-logo/brand-logo8.png"
                                                class="width-128 img-fluid" alt="brand-logo8"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-buttons">
                            <div class="swiper-buttons-wrap">
                                <button type="button" class="swiper-prev swiper-prev-brandslider"
                                    aria-label="Arrow previous"><i class="ri-arrow-left-line d-block lh-1"></i></button>
                                <button type="button" class="swiper-next swiper-next-brandslider"
                                    aria-label="Arrow next"><i class="ri-arrow-right-line d-block lh-1"></i></button>
                            </div>
                        </div>
                        <div class="swiper-dots" data-animate="animate__fadeIn">
                            <div class="swiper-pagination swiper-pagination-brandslider"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- brand-logo end -->
        <!-- category-product start -->
        <section class="category-product section-ptb">
            <div class="container-fluid">
                <div class="collection-category">
                    <div class="section-capture text-center">
                        <div class="section-title" data-animate="animate__fadeIn">
                            <h2 class="section-heading">Trending product</h2>
                        </div>
                    </div>
                    <div class="row row-mtm100 flex-lg-row-reverse">
                        <div class="col-12 col-lg-6 col-xl-7">
                            <div class="collection-wrap">
                                <div class="collection-product-slider swiper" id="trend-product-slider">
                                    <div class="swiper-wrapper">
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
                                                                <span class="d-block heading-weight"><a
                                                                        href="product.html" class="primary-link">Pleated
                                                                        skater skirt</a></span>
                                                            </div>
                                                            <div class="product-price">
                                                                <div class="price-box heading-weight">
                                                                    <span class="new-price primary-color">$79.00</span>
                                                                    <span class="old-price"><span
                                                                            class="mer-3">~</span><span
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
                                                                            class="review-caption">2 reviews</span></span>
                                                                </span>
                                                            </div>
                                                            <div class="product-description">
                                                                <p>Lorem Ipsum is simply dummy text of the printing and
                                                                    typesetting industry It is a long established fact that
                                                                    a will be distracted by the readable of at</p>
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
                                        <div class="swiper-slide" data-animate="animate__fadeIn">
                                            <div class="single-product">
                                                <div class="row single-product-wrap">
                                                    <div class="product-image-col">
                                                        <div class="product-image">
                                                            <a href="product.html" class="pro-img">
                                                                <img src="{{ asset('frontend') }}/assets/image/product/p-3.jpg"
                                                                    class="w-100 img-fluid img1" alt="p-3">
                                                                <img src="{{ asset('frontend') }}/assets/image/product/p-4.jpg"
                                                                    class="w-100 img-fluid img2" alt="p-4">
                                                                <span
                                                                    class="product-label product-label-new product-label-left">New</span>
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
                                                                <span class="d-block meb-7">Wool blend / Business</span>
                                                                <span class="d-block heading-weight"><a
                                                                        href="product.html" class="primary-link">Tailored
                                                                        blazer jacket</a></span>
                                                            </div>
                                                            <div class="product-price">
                                                                <div class="price-box heading-weight">
                                                                    <span class="new-price primary-color">$49.00</span>
                                                                    <span class="old-price"><span
                                                                            class="mer-3">~</span><span
                                                                            class="text-decoration-line-through">$59.00</span></span>
                                                                </div>
                                                            </div>
                                                            <div class="product-ratting">
                                                                <span class="review-ratting">
                                                                    <span class="review-star">
                                                                        <i class="ri-star-line"></i>
                                                                        <i class="ri-star-line"></i>
                                                                        <i class="ri-star-line"></i>
                                                                        <i class="ri-star-line"></i>
                                                                        <i class="ri-star-line"></i>
                                                                    </span>
                                                                    <span class="review-average">No reviews<span
                                                                            class="review-caption">0 reviews</span></span>
                                                                </span>
                                                            </div>
                                                            <div class="product-description">
                                                                <p>Lorem Ipsum is simply dummy text of the printing and
                                                                    typesetting industry It is a long established fact that
                                                                    a will be distracted by the readable of at</p>
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
                                        <div class="swiper-slide" data-animate="animate__fadeIn">
                                            <div class="single-product">
                                                <div class="row single-product-wrap">
                                                    <div class="product-image-col">
                                                        <div class="product-image">
                                                            <a href="product.html" class="pro-img">
                                                                <img src="{{ asset('frontend') }}/assets/image/product/p-5.jpg"
                                                                    class="w-100 img-fluid img1" alt="p-5">
                                                                <img src="{{ asset('frontend') }}/assets/image/product/p-6.jpg"
                                                                    class="w-100 img-fluid img2" alt="p-6">
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
                                                                <span class="d-block meb-7">Cotton / Playful</span>
                                                                <span class="d-block heading-weight"><a
                                                                        href="product.html" class="primary-link">Girls
                                                                        floral ruffle top</a></span>
                                                            </div>
                                                            <div class="product-price">
                                                                <div class="price-box heading-weight">
                                                                    <span class="new-price primary-color">$69.00</span>
                                                                    <span class="old-price"><span
                                                                            class="mer-3">~</span><span
                                                                            class="text-decoration-line-through">$79.00</span></span>
                                                                </div>
                                                            </div>
                                                            <div class="product-ratting">
                                                                <span class="review-ratting">
                                                                    <span class="review-star">
                                                                        <i class="ri-star-line"></i>
                                                                        <i class="ri-star-line"></i>
                                                                        <i class="ri-star-line"></i>
                                                                        <i class="ri-star-line"></i>
                                                                        <i class="ri-star-line"></i>
                                                                    </span>
                                                                    <span class="review-average">No reviews<span
                                                                            class="review-caption">0 reviews</span></span>
                                                                </span>
                                                            </div>
                                                            <div class="product-description">
                                                                <p>Lorem Ipsum is simply dummy text of the printing and
                                                                    typesetting industry It is a long established fact that
                                                                    a will be distracted by the readable of at</p>
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
                                        <div class="swiper-slide" data-animate="animate__fadeIn">
                                            <div class="single-product">
                                                <div class="row single-product-wrap">
                                                    <div class="product-image-col">
                                                        <div class="product-image">
                                                            <a href="product.html" class="pro-img">
                                                                <img src="{{ asset('frontend') }}/assets/image/product/p-7.jpg"
                                                                    class="w-100 img-fluid img1" alt="p-7">
                                                                <img src="{{ asset('frontend') }}/assets/image/product/p-8.jpg"
                                                                    class="w-100 img-fluid img2" alt="p-8">
                                                                <span
                                                                    class="product-label product-label-discount product-label-left">5%
                                                                    Off</span>
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
                                                                <span class="d-block meb-7">Cotton / Casual</span>
                                                                <span class="d-block heading-weight"><a
                                                                        href="product.html" class="primary-link">Classic
                                                                        cotton t-shirt</a></span>
                                                            </div>
                                                            <div class="product-price">
                                                                <div class="price-box heading-weight">
                                                                    <span class="new-price primary-color">$49.00</span>
                                                                    <span class="old-price"><span
                                                                            class="mer-3">~</span><span
                                                                            class="text-decoration-line-through">$54.00</span></span>
                                                                </div>
                                                            </div>
                                                            <div class="product-ratting">
                                                                <span class="review-ratting">
                                                                    <span class="review-star">
                                                                        <i class="ri-star-line"></i>
                                                                        <i class="ri-star-line"></i>
                                                                        <i class="ri-star-line"></i>
                                                                        <i class="ri-star-line"></i>
                                                                        <i class="ri-star-line"></i>
                                                                    </span>
                                                                    <span class="review-average">No reviews<span
                                                                            class="review-caption">0 reviews</span></span>
                                                                </span>
                                                            </div>
                                                            <div class="product-description">
                                                                <p>Lorem Ipsum is simply dummy text of the printing and
                                                                    typesetting industry It is a long established fact that
                                                                    a will be distracted by the readable of at</p>
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
                                        <div class="swiper-slide" data-animate="animate__fadeIn">
                                            <div class="single-product">
                                                <div class="row single-product-wrap">
                                                    <div class="product-image-col">
                                                        <div class="product-image">
                                                            <a href="product.html" class="pro-img">
                                                                <img src="{{ asset('frontend') }}/assets/image/product/p-9.jpg"
                                                                    class="w-100 img-fluid img1" alt="p-9">
                                                                <img src="{{ asset('frontend') }}/assets/image/product/p-10.jpg"
                                                                    class="w-100 img-fluid img2" alt="p-10">
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
                                                                <span class="d-block meb-7">Linen blend / formal</span>
                                                                <span class="d-block heading-weight"><a
                                                                        href="product.html" class="primary-link">Slim fit
                                                                        linen shirt</a></span>
                                                            </div>
                                                            <div class="product-price">
                                                                <div class="price-box heading-weight">
                                                                    <span class="new-price primary-color">$89.00</span>
                                                                    <span class="old-price"><span
                                                                            class="mer-3">~</span><span
                                                                            class="text-decoration-line-through">$99.00</span></span>
                                                                </div>
                                                            </div>
                                                            <div class="product-ratting">
                                                                <span class="review-ratting">
                                                                    <span class="review-star">
                                                                        <i class="ri-star-line"></i>
                                                                        <i class="ri-star-line"></i>
                                                                        <i class="ri-star-line"></i>
                                                                        <i class="ri-star-line"></i>
                                                                        <i class="ri-star-line"></i>
                                                                    </span>
                                                                    <span class="review-average">No reviews<span
                                                                            class="review-caption">0 reviews</span></span>
                                                                </span>
                                                            </div>
                                                            <div class="product-description">
                                                                <p>Lorem Ipsum is simply dummy text of the printing and
                                                                    typesetting industry It is a long established fact that
                                                                    a will be distracted by the readable of at</p>
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
                                    </div>
                                </div>
                                <div class="swiper-buttons">
                                    <div class="swiper-buttons-wrap">
                                        <button type="button" class="swiper-prev swiper-prev-trend-product"
                                            aria-label="Arrow previous"><i
                                                class="ri-arrow-left-line d-block lh-1"></i></button>
                                        <button type="button" class="swiper-next swiper-next-trend-product"
                                            aria-label="Arrow next"><i
                                                class="ri-arrow-right-line d-block lh-1"></i></button>
                                    </div>
                                </div>
                                <div class="swiper-dots" data-animate="animate__fadeIn">
                                    <div class="swiper-pagination swiper-pagination-trend-product"></div>
                                </div>
                                <div class="view-button d-none" data-animate="animate__fadeIn">
                                    <a href="collection.html" class="btn-style tertiary-btn">View all item</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 col-xl-5">
                            <!-- category-product-banner start -->
                            <div class="category-product-banner height-lg-100 position-relative banner-hover br-hidden">
                                <a href="collection.html" class="d-block height-lg-100 banner-img"><img
                                        src="{{ asset('frontend') }}/assets/image/index/product-banner1.jpg"
                                        class="w-100 height-lg-100 img-fluid" alt="product-banner1"></a>
                                <div
                                    class="position-absolute bottom-0 start-0 end-0 meb-30 meb-xl-50 mlr-15 mlr-md-30 mlr-xxl-50">
                                    <div
                                        class="category-product-banner-content d-flex flex-wrap align-items-center justify-content-between">
                                        <h2
                                            class="font-24 font-xl-40 section-heading-family section-heading-text section-heading-weight section-heading-lh">
                                            Men fashion</h2>
                                        <a href="collection.html" class="btn-style tertiary-btn">Shop now</a>
                                    </div>
                                </div>
                            </div>
                            <!-- category-product-banner start -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- category-product end -->
        <!-- deal-banner start -->
        <section class="deal-banner section-ptb bg-img text-center"
            data-bgimg="{{ asset('frontend') }}/assets/image/index/deal-banner-bgimg.jpg" data-animate="animate__fadeIn">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-7 col-lg-6 col-xl-5">
                        <div class="deal-content ptb-30 ptb-xl-50 plr-15 plr-md-30 plr-xxl-50 primary-bg bg-img border-radius"
                            data-bgimg="{{ asset('frontend') }}/assets/image/index/deal-banner-bgimg.png">
                            <div class="tertiary-color meb-6" data-animate="animate__fadeIn">Claim this offer now</div>
                            <h2 class="section-heading text-white" data-animate="animate__fadeIn">Deal of the day</h2>
                            <div class="countdown mst-23 mst-xl-30" data-time="2027/12/31 00:00:00"
                                data-animate="animate__fadeIn">
                                <div class="row ul-mt15">
                                    <div class="col-3">
                                        <div class="timer-content position-relative pbp-100 text-center">
                                            <div
                                                class="timer-info position-absolute top-0 end-0 bottom-0 start-0 ptb-5 plr-5 d-flex flex-column align-items-center justify-content-center body-bg heading-weight lh-1 border-radius">
                                                <span class="day heading-color font-20 font-xl-24"></span>
                                                <span class="primary-color mst-5 mst-xl-9 text-uppercase">Day</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="timer-content position-relative pbp-100 text-center">
                                            <div
                                                class="timer-info position-absolute top-0 end-0 bottom-0 start-0 ptb-5 plr-5 d-flex flex-column align-items-center justify-content-center body-bg heading-weight lh-1 border-radius">
                                                <span class="hrs heading-color font-20 font-xl-24"></span>
                                                <span class="primary-color mst-5 mst-xl-9 text-uppercase">Hrs</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="timer-content position-relative pbp-100 text-center">
                                            <div
                                                class="timer-info position-absolute top-0 end-0 bottom-0 start-0 ptb-5 plr-5 d-flex flex-column align-items-center justify-content-center body-bg heading-weight lh-1 border-radius">
                                                <span class="min heading-color font-20 font-xl-24"></span>
                                                <span class="primary-color mst-5 mst-xl-9 text-uppercase">Min</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="timer-content position-relative pbp-100 text-center">
                                            <div
                                                class="timer-info position-absolute top-0 end-0 bottom-0 start-0 ptb-5 plr-5 d-flex flex-column align-items-center justify-content-center body-bg heading-weight lh-1 border-radius">
                                                <span class="sec heading-color font-20 font-xl-24"></span>
                                                <span class="primary-color mst-5 mst-xl-9 text-uppercase">Sec</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="collection.html" class="btn-style quinary-btn mst-30 mst-xl-40"
                                data-animate="animate__fadeIn">Shop collection</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- deal-banner end -->
        <!-- category-product start -->
        <section class="category-product section-pt">
            <div class="container-fluid">
                <div class="collection-category">
                    <div class="section-capture text-center">
                        <div class="section-title" data-animate="animate__fadeIn">
                            <h2 class="section-heading">Featured product</h2>
                        </div>
                    </div>
                    <div class="collection-wrap">
                        <div class="collection-product-slider swiper" id="feature-product-slider">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide" data-animate="animate__fadeIn">
                                    <div class="single-product">
                                        <div class="row single-product-wrap">
                                            <div class="product-image-col">
                                                <div class="product-image">
                                                    <a href="product.html" class="pro-img">
                                                        <img src="{{ asset('frontend') }}/assets/image/product/p-11.jpg"
                                                            class="w-100 img-fluid img1" alt="p-11">
                                                        <img src="{{ asset('frontend') }}/assets/image/product/p-12.jpg"
                                                            class="w-100 img-fluid img2" alt="p-12">
                                                        <span
                                                            class="product-label product-label-sale product-label-left">Sale</span>
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
                                                        <span class="d-block meb-7">Viscose / Sleeveless</span>
                                                        <span class="d-block heading-weight"><a href="product.html"
                                                                class="primary-link">Flowy midi dress</a></span>
                                                    </div>
                                                    <div class="product-price">
                                                        <div class="price-box heading-weight">
                                                            <span class="new-price primary-color">$79.00</span>
                                                            <span class="old-price"><span class="mer-3">~</span><span
                                                                    class="text-decoration-line-through">$84.00</span></span>
                                                        </div>
                                                    </div>
                                                    <div class="product-ratting">
                                                        <span class="review-ratting">
                                                            <span class="review-star">
                                                                <i class="ri-star-line"></i>
                                                                <i class="ri-star-line"></i>
                                                                <i class="ri-star-line"></i>
                                                                <i class="ri-star-line"></i>
                                                                <i class="ri-star-line"></i>
                                                            </span>
                                                            <span class="review-average">No reviews<span
                                                                    class="review-caption">0 reviews</span></span>
                                                        </span>
                                                    </div>
                                                    <div class="product-description">
                                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                            industry It is a long established fact that a will be distracted
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
                                <div class="swiper-slide" data-animate="animate__fadeIn">
                                    <div class="single-product">
                                        <div class="row single-product-wrap">
                                            <div class="product-image-col">
                                                <div class="product-image">
                                                    <a href="product.html" class="pro-img">
                                                        <img src="{{ asset('frontend') }}/assets/image/product/p-13.jpg"
                                                            class="w-100 img-fluid img1" alt="p-13">
                                                        <img src="{{ asset('frontend') }}/assets/image/product/p-14.jpg"
                                                            class="w-100 img-fluid img2" alt="p-14">
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
                                                        <span class="d-block meb-7">Stretch denim / Rugged</span>
                                                        <span class="d-block heading-weight"><a href="product.html"
                                                                class="primary-link">Distressed skinny jeans</a></span>
                                                    </div>
                                                    <div class="product-price">
                                                        <div class="price-box heading-weight">
                                                            <span class="new-price primary-color">$29.00</span>
                                                            <span class="old-price"><span class="mer-3">~</span><span
                                                                    class="text-decoration-line-through">$39.00</span></span>
                                                        </div>
                                                    </div>
                                                    <div class="product-ratting">
                                                        <span class="review-ratting">
                                                            <span class="review-star">
                                                                <i class="ri-star-line"></i>
                                                                <i class="ri-star-line"></i>
                                                                <i class="ri-star-line"></i>
                                                                <i class="ri-star-line"></i>
                                                                <i class="ri-star-line"></i>
                                                            </span>
                                                            <span class="review-average">No reviews<span
                                                                    class="review-caption">0 reviews</span></span>
                                                        </span>
                                                    </div>
                                                    <div class="product-description">
                                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                            industry It is a long established fact that a will be distracted
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
                                <div class="swiper-slide" data-animate="animate__fadeIn">
                                    <div class="single-product">
                                        <div class="row single-product-wrap">
                                            <div class="product-image-col">
                                                <div class="product-image">
                                                    <a href="product.html" class="pro-img">
                                                        <img src="{{ asset('frontend') }}/assets/image/product/p-15.jpg"
                                                            class="w-100 img-fluid img1" alt="p-15">
                                                        <img src="{{ asset('frontend') }}/assets/image/product/p-16.jpg"
                                                            class="w-100 img-fluid img2" alt="p-16">
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
                                                        <span class="d-block meb-7">Polyester faux / Winter</span>
                                                        <span class="d-block heading-weight"><a href="product.html"
                                                                class="primary-link">Hooded puffer jacket</a></span>
                                                    </div>
                                                    <div class="product-price">
                                                        <div class="price-box heading-weight">
                                                            <span class="new-price primary-color">$14.00</span>
                                                            <span class="old-price"><span class="mer-3">~</span><span
                                                                    class="text-decoration-line-through">$19.00</span></span>
                                                        </div>
                                                    </div>
                                                    <div class="product-ratting">
                                                        <span class="review-ratting">
                                                            <span class="review-star">
                                                                <i class="ri-star-line"></i>
                                                                <i class="ri-star-line"></i>
                                                                <i class="ri-star-line"></i>
                                                                <i class="ri-star-line"></i>
                                                                <i class="ri-star-line"></i>
                                                            </span>
                                                            <span class="review-average">No reviews<span
                                                                    class="review-caption">0 reviews</span></span>
                                                        </span>
                                                    </div>
                                                    <div class="product-description">
                                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                            industry It is a long established fact that a will be distracted
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
                                <div class="swiper-slide" data-animate="animate__fadeIn">
                                    <div class="single-product">
                                        <div class="row single-product-wrap">
                                            <div class="product-image-col">
                                                <div class="product-image">
                                                    <a href="product.html" class="pro-img">
                                                        <img src="{{ asset('frontend') }}/assets/image/product/p-17.jpg"
                                                            class="w-100 img-fluid img1" alt="p-17">
                                                        <img src="{{ asset('frontend') }}/assets/image/product/p-18.jpg"
                                                            class="w-100 img-fluid img2" alt="p-18">
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
                                                        <span class="d-block meb-7">Leather mesh / Sporty</span>
                                                        <span class="d-block heading-weight"><a href="product.html"
                                                                class="primary-link">Chunky sole sneakers</a></span>
                                                    </div>
                                                    <div class="product-price">
                                                        <div class="price-box heading-weight">
                                                            <span class="new-price primary-color">$64.00</span>
                                                            <span class="old-price"><span class="mer-3">~</span><span
                                                                    class="text-decoration-line-through">$74.00</span></span>
                                                        </div>
                                                    </div>
                                                    <div class="product-ratting">
                                                        <span class="review-ratting">
                                                            <span class="review-star">
                                                                <i class="ri-star-line"></i>
                                                                <i class="ri-star-line"></i>
                                                                <i class="ri-star-line"></i>
                                                                <i class="ri-star-line"></i>
                                                                <i class="ri-star-line"></i>
                                                            </span>
                                                            <span class="review-average">No reviews<span
                                                                    class="review-caption">0 reviews</span></span>
                                                        </span>
                                                    </div>
                                                    <div class="product-description">
                                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                            industry It is a long established fact that a will be distracted
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
                                <div class="swiper-slide" data-animate="animate__fadeIn">
                                    <div class="single-product">
                                        <div class="row single-product-wrap">
                                            <div class="product-image-col">
                                                <div class="product-image">
                                                    <a href="product.html" class="pro-img">
                                                        <img src="{{ asset('frontend') }}/assets/image/product/p-19.jpg"
                                                            class="w-100 img-fluid img1" alt="p-19">
                                                        <img src="{{ asset('frontend') }}/assets/image/product/p-20.jpg"
                                                            class="w-100 img-fluid img2" alt="p-20">
                                                        <span
                                                            class="product-label product-label-sold product-label-left">Sold</span>
                                                    </a>
                                                    <div class="product-action-wrap">
                                                        <div class="product-action">
                                                            <a href="javascript:void(0)" class="add-to-wishlist">
                                                                <span class="product-icon"><i
                                                                        class="ri-heart-line d-block icon-16 lh-1"></i></span>
                                                                <span class="tooltip-text">wishlist</span>
                                                            </a>
                                                            <a href="javascript:void(0)" class="add-to-cart disabled">
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
                                                        <span class="d-block meb-7">Faux leather / Compact</span>
                                                        <span class="d-block heading-weight"><a href="product.html"
                                                                class="primary-link">Quilted crossbody bag</a></span>
                                                    </div>
                                                    <div class="product-price">
                                                        <div class="price-box heading-weight">
                                                            <span class="new-price primary-color">$34.00</span>
                                                            <span class="old-price"><span class="mer-3">~</span><span
                                                                    class="text-decoration-line-through">$44.00</span></span>
                                                        </div>
                                                    </div>
                                                    <div class="product-ratting">
                                                        <span class="review-ratting">
                                                            <span class="review-star">
                                                                <i class="ri-star-line"></i>
                                                                <i class="ri-star-line"></i>
                                                                <i class="ri-star-line"></i>
                                                                <i class="ri-star-line"></i>
                                                                <i class="ri-star-line"></i>
                                                            </span>
                                                            <span class="review-average">No reviews<span
                                                                    class="review-caption">0 reviews</span></span>
                                                        </span>
                                                    </div>
                                                    <div class="product-description">
                                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                            industry It is a long established fact that a will be distracted
                                                            by the readable of at</p>
                                                    </div>
                                                    <div class="product-action-wrap">
                                                        <div class="product-action">
                                                            <a href="javascript:void(0)" class="add-to-wishlist">
                                                                <span class="product-icon"><i
                                                                        class="ri-heart-line d-block icon-16 lh-1"></i></span>
                                                                <span class="tooltip-text">wishlist</span>
                                                            </a>
                                                            <a href="javascript:void(0)" class="add-to-cart disabled">
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
                                <div class="swiper-slide" data-animate="animate__fadeIn">
                                    <div class="single-product">
                                        <div class="row single-product-wrap">
                                            <div class="product-image-col">
                                                <div class="product-image">
                                                    <a href="product.html" class="pro-img">
                                                        <img src="{{ asset('frontend') }}/assets/image/product/p-21.jpg"
                                                            class="w-100 img-fluid img1" alt="p-21">
                                                        <img src="{{ asset('frontend') }}/assets/image/product/p-22.jpg"
                                                            class="w-100 img-fluid img2" alt="p-22">
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
                                                        <span class="d-block meb-7">Nylon spandex / Gymwear</span>
                                                        <span class="d-block heading-weight"><a href="product.html"
                                                                class="primary-link">Stretch active leggings</a></span>
                                                    </div>
                                                    <div class="product-price">
                                                        <div class="price-box heading-weight">
                                                            <span class="new-price primary-color">$4.00</span>
                                                            <span class="old-price"><span class="mer-3">~</span><span
                                                                    class="text-decoration-line-through">$9.00</span></span>
                                                        </div>
                                                    </div>
                                                    <div class="product-ratting">
                                                        <span class="review-ratting">
                                                            <span class="review-star">
                                                                <i class="ri-star-line"></i>
                                                                <i class="ri-star-line"></i>
                                                                <i class="ri-star-line"></i>
                                                                <i class="ri-star-line"></i>
                                                                <i class="ri-star-line"></i>
                                                            </span>
                                                            <span class="review-average">No reviews<span
                                                                    class="review-caption">0 reviews</span></span>
                                                        </span>
                                                    </div>
                                                    <div class="product-description">
                                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                            industry It is a long established fact that a will be distracted
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
                                <div class="swiper-slide" data-animate="animate__fadeIn">
                                    <div class="single-product">
                                        <div class="row single-product-wrap">
                                            <div class="product-image-col">
                                                <div class="product-image">
                                                    <a href="product.html" class="pro-img">
                                                        <img src="{{ asset('frontend') }}/assets/image/product/p-23.jpg"
                                                            class="w-100 img-fluid img1" alt="p-23">
                                                        <img src="{{ asset('frontend') }}/assets/image/product/p-24.jpg"
                                                            class="w-100 img-fluid img2" alt="p-24">
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
                                                        <span class="d-block meb-7">Cotton fleece / Cozy</span>
                                                        <span class="d-block heading-weight"><a href="product.html"
                                                                class="primary-link">Relaxed fit joggers</a></span>
                                                    </div>
                                                    <div class="product-price">
                                                        <div class="price-box heading-weight">
                                                            <span class="new-price primary-color">$9.00</span>
                                                            <span class="old-price"><span class="mer-3">~</span><span
                                                                    class="text-decoration-line-through">$14.00</span></span>
                                                        </div>
                                                    </div>
                                                    <div class="product-ratting">
                                                        <span class="review-ratting">
                                                            <span class="review-star">
                                                                <i class="ri-star-line"></i>
                                                                <i class="ri-star-line"></i>
                                                                <i class="ri-star-line"></i>
                                                                <i class="ri-star-line"></i>
                                                                <i class="ri-star-line"></i>
                                                            </span>
                                                            <span class="review-average">No reviews<span
                                                                    class="review-caption">0 reviews</span></span>
                                                        </span>
                                                    </div>
                                                    <div class="product-description">
                                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                            industry It is a long established fact that a will be distracted
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
                            </div>
                        </div>
                        <div class="swiper-buttons">
                            <div class="swiper-buttons-wrap">
                                <button type="button" class="swiper-prev swiper-prev-feature-product"
                                    aria-label="Arrow previous"><i class="ri-arrow-left-line d-block lh-1"></i></button>
                                <button type="button" class="swiper-next swiper-next-feature-product"
                                    aria-label="Arrow next"><i class="ri-arrow-right-line d-block lh-1"></i></button>
                            </div>
                        </div>
                        <div class="swiper-dots" data-animate="animate__fadeIn">
                            <div class="swiper-pagination swiper-pagination-feature-product"></div>
                        </div>
                        <div class="view-button d-none" data-animate="animate__fadeIn">
                            <a href="collection.html" class="btn-style tertiary-btn">View all item</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- category-product end -->
        <!-- newsletter-area start -->
        <section class="newsletter-area section-ptb">
            <div class="container">
                <div class="row align-items-lg-center justify-content-lg-center">
                    <div class="col-12 col-lg-5 col-xxl-4 meb-23 meb-lg-0 text-center">
                        <h2 class="section-heading">Subscribe newsletter</h2>
                    </div>
                    <div class="col-12 col-lg-7 col-xl-6">
                        <form method="post" class="news-form">
                            <div class="news-wrap d-md-flex">
                                <div class="w-100 position-relative d-flex align-items-center">
                                    <span class="position-absolute primary-color icon-16 msl-15"><i
                                            class="ri-mail-open-line"></i></span>
                                    <input type="email" id="newsletter-email" name="newsletter-email"
                                        class="width-100 psl-40" placeholder="Enter your email" required>
                                </div>
                                <button type="submit"
                                    class="news-btn width-100 width-md-auto btn-style tertiary-btn mst-15 mst-md-0 text-nowrap">Subscribe
                                    now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- newsletter-area end -->
        <!-- big-text start -->
        <section class="big-text big-text-overlay position-relative z-n1">
            <div class="big-text-title text-center" data-animate="animate__fadeIn">
                <h2 class="text-nowrap lh-1">testimonial</h2>
            </div>
        </section>
        <!-- big-text end -->
        <!-- testimonial start -->
        <section class="testimonial section-ptb extra-bg">
            <div class="container-fluid">
                <div class="testi-category">
                    <div class="section-capture text-center">
                        <div class="section-title" data-animate="animate__fadeIn">
                            <h2 class="section-heading">Positive reviews</h2>
                        </div>
                    </div>
                    <div class="testi-wrap">
                        <div class="testi-slider swiper" id="testi-slider">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide" data-animate="animate__fadeIn">
                                    <div class="testi-content text-center">
                                        <span class="d-inline-block ptb-8 plr-8 body-bg rounded-circle"><img
                                                src="{{ asset('frontend') }}/assets/image/testimonial/testi-1.jpg"
                                                class="width-80 img-fluid rounded-circle" alt="testi-1"></span>
                                        <p class="mst-23">Absolutely loved the fit and fabric! The style is just what i
                                            was looking for. Definitely coming back for more. Highly recommend to all
                                            fashion lovers out there!</p>
                                        <div class="testi-brand-logo mst-23">
                                            <img src="{{ asset('frontend') }}/assets/image/brand-logo/brand-logo1.png"
                                                class="width-128 img-fluid" alt="brand-logo1">
                                        </div>
                                        <div class="heading-color font-18 heading-weight mst-15"><span
                                                class="primary-color">Wesley bates</span> ~ Fashion blogger</div>
                                    </div>
                                </div>
                                <div class="swiper-slide" data-animate="animate__fadeIn">
                                    <div class="testi-content text-center">
                                        <span class="d-inline-block ptb-8 plr-8 body-bg rounded-circle"><img
                                                src="{{ asset('frontend') }}/assets/image/testimonial/testi-2.jpg"
                                                class="width-80 img-fluid rounded-circle" alt="testi-2"></span>
                                        <p class="mst-23">Top-notch quality and quick delivery. The dress looked even
                                            better in person. Stylish, comfy, and affordable - a rare combo! Would shop
                                            again without hesitation.</p>
                                        <div class="testi-brand-logo mst-23">
                                            <img src="{{ asset('frontend') }}/assets/image/brand-logo/brand-logo2.png"
                                                class="width-128 img-fluid" alt="brand-logo2">
                                        </div>
                                        <div class="heading-color font-18 heading-weight mst-15"><span
                                                class="primary-color">Paul smith</span> ~ Style editor</div>
                                    </div>
                                </div>
                                <div class="swiper-slide" data-animate="animate__fadeIn">
                                    <div class="testi-content text-center">
                                        <span class="d-inline-block ptb-8 plr-8 body-bg rounded-circle"><img
                                                src="{{ asset('frontend') }}/assets/image/testimonial/testi-3.jpg"
                                                class="width-80 img-fluid rounded-circle" alt="testi-3"></span>
                                        <p class="mst-23">Perfect for my weekend look! Customer support was helpful and
                                            quick to respond. Impressed by the attention to detail and design. Great
                                            experience overall.</p>
                                        <div class="testi-brand-logo mst-23">
                                            <img src="{{ asset('frontend') }}/assets/image/brand-logo/brand-logo3.png"
                                                class="width-128 img-fluid" alt="brand-logo3">
                                        </div>
                                        <div class="heading-color font-18 heading-weight mst-15"><span
                                                class="primary-color">Ashley rosa</span> ~ Boutique owner</div>
                                    </div>
                                </div>
                                <div class="swiper-slide" data-animate="animate__fadeIn">
                                    <div class="testi-content text-center">
                                        <span class="d-inline-block ptb-8 plr-8 body-bg rounded-circle"><img
                                                src="{{ asset('frontend') }}/assets/image/testimonial/testi-4.jpg"
                                                class="width-80 img-fluid rounded-circle" alt="testi-4"></span>
                                        <p class="mst-23">The fabric feels amazing and breathable. Sizes are true to fit,
                                            and returns were easy. Love how they mix trends with comfort. Will recommend to
                                            friends!</p>
                                        <div class="testi-brand-logo mst-23">
                                            <img src="{{ asset('frontend') }}/assets/image/brand-logo/brand-logo4.png"
                                                class="width-128 img-fluid" alt="brand-logo4">
                                        </div>
                                        <div class="heading-color font-18 heading-weight mst-15"><span
                                                class="primary-color">David brown</span> ~ Fashion consultant</div>
                                    </div>
                                </div>
                                <div class="swiper-slide" data-animate="animate__fadeIn">
                                    <div class="testi-content text-center">
                                        <span class="d-inline-block ptb-8 plr-8 body-bg rounded-circle"><img
                                                src="{{ asset('frontend') }}/assets/image/testimonial/testi-5.jpg"
                                                class="width-80 img-fluid rounded-circle" alt="testi-5"></span>
                                        <p class="mst-23">I'm obsessed with this collection! Everything screams premium,
                                            yet so affordable. This is now my go-to for seasonal shopping. Keep up the great
                                            work!</p>
                                        <div class="testi-brand-logo mst-23">
                                            <img src="{{ asset('frontend') }}/assets/image/brand-logo/brand-logo5.png"
                                                class="width-128 img-fluid" alt="brand-logo5">
                                        </div>
                                        <div class="heading-color font-18 heading-weight mst-15"><span
                                                class="primary-color">Alycia gordan</span> ~ Trend analyst</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-buttons">
                            <div class="swiper-buttons-wrap">
                                <button type="button" class="swiper-prev swiper-prev-testi"
                                    aria-label="Arrow previous"><i class="ri-arrow-left-line d-block lh-1"></i></button>
                                <button type="button" class="swiper-next swiper-next-testi"
                                    aria-label="Arrow next"><i class="ri-arrow-right-line d-block lh-1"></i></button>
                            </div>
                        </div>
                        <div class="swiper-dots" data-animate="animate__fadeIn">
                            <div class="swiper-pagination swiper-pagination-testi"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- testimonial end -->
        <!-- category-product start -->
        <section class="category-product section-pt">
            <div class="container-fluid">
                <div class="collection-category">
                    <div class="section-capture text-center">
                        <div class="section-title" data-animate="animate__fadeIn">
                            <h2 class="section-heading">New trend product</h2>
                        </div>
                    </div>
                    <div class="row row-mtm100">
                        <div class="col-12 col-lg-6 col-xl-7">
                            <div class="collection-wrap">
                                <div class="collection-product-slider swiper" id="best-product-slider">
                                    <div class="swiper-wrapper">
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
                                                                    <a href="javascript:void(0)"
                                                                        class="add-to-wishlist">
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
                                                                <span class="d-block heading-weight"><a
                                                                        href="product.html" class="primary-link">Pleated
                                                                        skater skirt</a></span>
                                                            </div>
                                                            <div class="product-price">
                                                                <div class="price-box heading-weight">
                                                                    <span class="new-price primary-color">$79.00</span>
                                                                    <span class="old-price"><span
                                                                            class="mer-3">~</span><span
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
                                                                            class="review-caption">2 reviews</span></span>
                                                                </span>
                                                            </div>
                                                            <div class="product-description">
                                                                <p>Lorem Ipsum is simply dummy text of the printing and
                                                                    typesetting industry It is a long established fact that
                                                                    a will be distracted by the readable of at</p>
                                                            </div>
                                                            <div class="product-action-wrap">
                                                                <div class="product-action">
                                                                    <a href="javascript:void(0)"
                                                                        class="add-to-wishlist">
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
                                        <div class="swiper-slide" data-animate="animate__fadeIn">
                                            <div class="single-product">
                                                <div class="row single-product-wrap">
                                                    <div class="product-image-col">
                                                        <div class="product-image">
                                                            <a href="product.html" class="pro-img">
                                                                <img src="{{ asset('frontend') }}/assets/image/product/p-3.jpg"
                                                                    class="w-100 img-fluid img1" alt="p-3">
                                                                <img src="{{ asset('frontend') }}/assets/image/product/p-4.jpg"
                                                                    class="w-100 img-fluid img2" alt="p-4">
                                                                <span
                                                                    class="product-label product-label-new product-label-left">New</span>
                                                            </a>
                                                            <div class="product-action-wrap">
                                                                <div class="product-action">
                                                                    <a href="javascript:void(0)"
                                                                        class="add-to-wishlist">
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
                                                                <span class="d-block meb-7">Wool blend / Business</span>
                                                                <span class="d-block heading-weight"><a
                                                                        href="product.html"
                                                                        class="primary-link">Tailored blazer
                                                                        jacket</a></span>
                                                            </div>
                                                            <div class="product-price">
                                                                <div class="price-box heading-weight">
                                                                    <span class="new-price primary-color">$49.00</span>
                                                                    <span class="old-price"><span
                                                                            class="mer-3">~</span><span
                                                                            class="text-decoration-line-through">$59.00</span></span>
                                                                </div>
                                                            </div>
                                                            <div class="product-ratting">
                                                                <span class="review-ratting">
                                                                    <span class="review-star">
                                                                        <i class="ri-star-line"></i>
                                                                        <i class="ri-star-line"></i>
                                                                        <i class="ri-star-line"></i>
                                                                        <i class="ri-star-line"></i>
                                                                        <i class="ri-star-line"></i>
                                                                    </span>
                                                                    <span class="review-average">No reviews<span
                                                                            class="review-caption">0 reviews</span></span>
                                                                </span>
                                                            </div>
                                                            <div class="product-description">
                                                                <p>Lorem Ipsum is simply dummy text of the printing and
                                                                    typesetting industry It is a long established fact that
                                                                    a will be distracted by the readable of at</p>
                                                            </div>
                                                            <div class="product-action-wrap">
                                                                <div class="product-action">
                                                                    <a href="javascript:void(0)"
                                                                        class="add-to-wishlist">
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
                                        <div class="swiper-slide" data-animate="animate__fadeIn">
                                            <div class="single-product">
                                                <div class="row single-product-wrap">
                                                    <div class="product-image-col">
                                                        <div class="product-image">
                                                            <a href="product.html" class="pro-img">
                                                                <img src="{{ asset('frontend') }}/assets/image/product/p-5.jpg"
                                                                    class="w-100 img-fluid img1" alt="p-5">
                                                                <img src="{{ asset('frontend') }}/assets/image/product/p-6.jpg"
                                                                    class="w-100 img-fluid img2" alt="p-6">
                                                            </a>
                                                            <div class="product-action-wrap">
                                                                <div class="product-action">
                                                                    <a href="javascript:void(0)"
                                                                        class="add-to-wishlist">
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
                                                                <span class="d-block meb-7">Cotton / Playful</span>
                                                                <span class="d-block heading-weight"><a
                                                                        href="product.html" class="primary-link">Girls
                                                                        floral ruffle top</a></span>
                                                            </div>
                                                            <div class="product-price">
                                                                <div class="price-box heading-weight">
                                                                    <span class="new-price primary-color">$69.00</span>
                                                                    <span class="old-price"><span
                                                                            class="mer-3">~</span><span
                                                                            class="text-decoration-line-through">$79.00</span></span>
                                                                </div>
                                                            </div>
                                                            <div class="product-ratting">
                                                                <span class="review-ratting">
                                                                    <span class="review-star">
                                                                        <i class="ri-star-line"></i>
                                                                        <i class="ri-star-line"></i>
                                                                        <i class="ri-star-line"></i>
                                                                        <i class="ri-star-line"></i>
                                                                        <i class="ri-star-line"></i>
                                                                    </span>
                                                                    <span class="review-average">No reviews<span
                                                                            class="review-caption">0 reviews</span></span>
                                                                </span>
                                                            </div>
                                                            <div class="product-description">
                                                                <p>Lorem Ipsum is simply dummy text of the printing and
                                                                    typesetting industry It is a long established fact that
                                                                    a will be distracted by the readable of at</p>
                                                            </div>
                                                            <div class="product-action-wrap">
                                                                <div class="product-action">
                                                                    <a href="javascript:void(0)"
                                                                        class="add-to-wishlist">
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
                                        <div class="swiper-slide" data-animate="animate__fadeIn">
                                            <div class="single-product">
                                                <div class="row single-product-wrap">
                                                    <div class="product-image-col">
                                                        <div class="product-image">
                                                            <a href="product.html" class="pro-img">
                                                                <img src="{{ asset('frontend') }}/assets/image/product/p-7.jpg"
                                                                    class="w-100 img-fluid img1" alt="p-7">
                                                                <img src="{{ asset('frontend') }}/assets/image/product/p-8.jpg"
                                                                    class="w-100 img-fluid img2" alt="p-8">
                                                                <span
                                                                    class="product-label product-label-discount product-label-left">5%
                                                                    Off</span>
                                                            </a>
                                                            <div class="product-action-wrap">
                                                                <div class="product-action">
                                                                    <a href="javascript:void(0)"
                                                                        class="add-to-wishlist">
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
                                                                <span class="d-block meb-7">Cotton / Casual</span>
                                                                <span class="d-block heading-weight"><a
                                                                        href="product.html" class="primary-link">Classic
                                                                        cotton t-shirt</a></span>
                                                            </div>
                                                            <div class="product-price">
                                                                <div class="price-box heading-weight">
                                                                    <span class="new-price primary-color">$49.00</span>
                                                                    <span class="old-price"><span
                                                                            class="mer-3">~</span><span
                                                                            class="text-decoration-line-through">$54.00</span></span>
                                                                </div>
                                                            </div>
                                                            <div class="product-ratting">
                                                                <span class="review-ratting">
                                                                    <span class="review-star">
                                                                        <i class="ri-star-line"></i>
                                                                        <i class="ri-star-line"></i>
                                                                        <i class="ri-star-line"></i>
                                                                        <i class="ri-star-line"></i>
                                                                        <i class="ri-star-line"></i>
                                                                    </span>
                                                                    <span class="review-average">No reviews<span
                                                                            class="review-caption">0 reviews</span></span>
                                                                </span>
                                                            </div>
                                                            <div class="product-description">
                                                                <p>Lorem Ipsum is simply dummy text of the printing and
                                                                    typesetting industry It is a long established fact that
                                                                    a will be distracted by the readable of at</p>
                                                            </div>
                                                            <div class="product-action-wrap">
                                                                <div class="product-action">
                                                                    <a href="javascript:void(0)"
                                                                        class="add-to-wishlist">
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
                                        <div class="swiper-slide" data-animate="animate__fadeIn">
                                            <div class="single-product">
                                                <div class="row single-product-wrap">
                                                    <div class="product-image-col">
                                                        <div class="product-image">
                                                            <a href="product.html" class="pro-img">
                                                                <img src="{{ asset('frontend') }}/assets/image/product/p-9.jpg"
                                                                    class="w-100 img-fluid img1" alt="p-9">
                                                                <img src="{{ asset('frontend') }}/assets/image/product/p-10.jpg"
                                                                    class="w-100 img-fluid img2" alt="p-10">
                                                            </a>
                                                            <div class="product-action-wrap">
                                                                <div class="product-action">
                                                                    <a href="javascript:void(0)"
                                                                        class="add-to-wishlist">
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
                                                                <span class="d-block meb-7">Linen blend / formal</span>
                                                                <span class="d-block heading-weight"><a
                                                                        href="product.html" class="primary-link">Slim
                                                                        fit linen shirt</a></span>
                                                            </div>
                                                            <div class="product-price">
                                                                <div class="price-box heading-weight">
                                                                    <span class="new-price primary-color">$89.00</span>
                                                                    <span class="old-price"><span
                                                                            class="mer-3">~</span><span
                                                                            class="text-decoration-line-through">$99.00</span></span>
                                                                </div>
                                                            </div>
                                                            <div class="product-ratting">
                                                                <span class="review-ratting">
                                                                    <span class="review-star">
                                                                        <i class="ri-star-line"></i>
                                                                        <i class="ri-star-line"></i>
                                                                        <i class="ri-star-line"></i>
                                                                        <i class="ri-star-line"></i>
                                                                        <i class="ri-star-line"></i>
                                                                    </span>
                                                                    <span class="review-average">No reviews<span
                                                                            class="review-caption">0 reviews</span></span>
                                                                </span>
                                                            </div>
                                                            <div class="product-description">
                                                                <p>Lorem Ipsum is simply dummy text of the printing and
                                                                    typesetting industry It is a long established fact that
                                                                    a will be distracted by the readable of at</p>
                                                            </div>
                                                            <div class="product-action-wrap">
                                                                <div class="product-action">
                                                                    <a href="javascript:void(0)"
                                                                        class="add-to-wishlist">
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
                                    </div>
                                </div>
                                <div class="swiper-buttons">
                                    <div class="swiper-buttons-wrap">
                                        <button type="button" class="swiper-prev swiper-prev-best-product"
                                            aria-label="Arrow previous"><i
                                                class="ri-arrow-left-line d-block lh-1"></i></button>
                                        <button type="button" class="swiper-next swiper-next-best-product"
                                            aria-label="Arrow next"><i
                                                class="ri-arrow-right-line d-block lh-1"></i></button>
                                    </div>
                                </div>
                                <div class="swiper-dots" data-animate="animate__fadeIn">
                                    <div class="swiper-pagination swiper-pagination-best-product"></div>
                                </div>
                                <div class="view-button d-none" data-animate="animate__fadeIn">
                                    <a href="collection.html" class="btn-style tertiary-btn">View all item</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 col-xl-5">
                            <!-- category-product-banner start -->
                            <div class="category-product-banner height-lg-100 position-relative banner-hover br-hidden">
                                <a href="collection.html" class="d-block height-lg-100 banner-img"><img
                                        src="{{ asset('frontend') }}/assets/image/index/product-banner2.jpg"
                                        class="w-100 height-lg-100 img-fluid" alt="product-banner2"></a>
                                <div
                                    class="position-absolute bottom-0 start-0 end-0 meb-30 meb-xl-50 mlr-15 mlr-md-30 mlr-xxl-50">
                                    <div
                                        class="category-product-banner-content d-flex flex-wrap align-items-center justify-content-between">
                                        <h2
                                            class="font-24 font-xl-40 section-heading-family section-heading-text section-heading-weight section-heading-lh">
                                            Women fashion</h2>
                                        <a href="collection.html" class="btn-style tertiary-btn">Shop now</a>
                                    </div>
                                </div>
                            </div>
                            <!-- category-product-banner start -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- category-product end -->
        <!-- blog-area start -->
        <section class="blog-area section-ptb">
            <div class="container-fluid">
                <div class="blog-category">
                    <div class="section-capture text-center">
                        <div class="section-title" data-animate="animate__fadeIn">
                            <h2 class="section-heading">Our latest big story</h2>
                        </div>
                    </div>
                    <div class="blog-wrap">
                        <div class="blog-slider swiper" id="blog-slider-full">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide" data-animate="animate__fadeIn">
                                    <div class="blog-post banner-hover">
                                        <div class="blog-main-img">
                                            <a href="article.html"
                                                class="d-none d-xl-block position-relative banner-img br-hidden">
                                                <span
                                                    class="btn-style tertiary-btn banner-btn position-absolute top-50 start-50 translate-middle z-1 text-nowrap">Shop
                                                    now</span>
                                                <img src="{{ asset('frontend') }}/assets/image/index/article/a-1.jpg"
                                                    class="w-100 img-fluid" alt="a-1">
                                            </a>
                                            <a href="article.html" class="d-block d-xl-none banner-img br-hidden">
                                                <img src="{{ asset('frontend') }}/assets/image/index/article/a-1.jpg"
                                                    class="w-100 img-fluid" alt="a-1">
                                            </a>
                                        </div>
                                        <div class="blog-post-content pst-25">
                                            <div class="secondary-color mst-2 meb-7 text-uppercase heading-weight lh-1"><i
                                                    class="ri-calendar-line primary-color fw-normal"></i> 23 Dec, 2023 <i
                                                    class="ri-chat-3-line primary-color fw-normal"></i> 3 Comment</div>
                                            <h6 class="font-18">Flared skirt essentials</h6>
                                            <p class="mst-8">Twirl in classic skirts styled for grace, flow, and feminine
                                                appeal in every step</p>
                                            <div class="d-xl-none mst-9">
                                                <a href="article.html" class="link-btn">Read more</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide" data-animate="animate__fadeIn">
                                    <div class="blog-post banner-hover">
                                        <div class="blog-main-img">
                                            <a href="article.html"
                                                class="d-none d-xl-block position-relative banner-img br-hidden">
                                                <span
                                                    class="btn-style tertiary-btn banner-btn position-absolute top-50 start-50 translate-middle z-1 text-nowrap">Shop
                                                    now</span>
                                                <img src="{{ asset('frontend') }}/assets/image/index/article/a-2.jpg"
                                                    class="w-100 img-fluid" alt="a-2">
                                            </a>
                                            <a href="article.html" class="d-block d-xl-none banner-img br-hidden">
                                                <img src="{{ asset('frontend') }}/assets/image/index/article/a-2.jpg"
                                                    class="w-100 img-fluid" alt="a-2">
                                            </a>
                                        </div>
                                        <div class="blog-post-content pst-25">
                                            <div class="secondary-color mst-2 meb-7 text-uppercase heading-weight lh-1"><i
                                                    class="ri-calendar-line primary-color fw-normal"></i> 10, Jan 2024 <i
                                                    class="ri-chat-3-line primary-color fw-normal"></i> 5 Comment</div>
                                            <h6 class="font-18">Sharp mens blazer cut</h6>
                                            <p class="mst-8">Elevate your look with sharply tailored blazers that balance
                                                structure, comfort, and polish</p>
                                            <div class="d-xl-none mst-9">
                                                <a href="article.html" class="link-btn">Read more</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide" data-animate="animate__fadeIn">
                                    <div class="blog-post banner-hover">
                                        <div class="blog-main-img">
                                            <a href="article.html"
                                                class="d-none d-xl-block position-relative banner-img br-hidden">
                                                <span
                                                    class="btn-style tertiary-btn banner-btn position-absolute top-50 start-50 translate-middle z-1 text-nowrap">Shop
                                                    now</span>
                                                <img src="{{ asset('frontend') }}/assets/image/index/article/a-3.jpg"
                                                    class="w-100 img-fluid" alt="a-3">
                                            </a>
                                            <a href="article.html" class="d-block d-xl-none banner-img br-hidden">
                                                <img src="{{ asset('frontend') }}/assets/image/index/article/a-3.jpg"
                                                    class="w-100 img-fluid" alt="a-3">
                                            </a>
                                        </div>
                                        <div class="blog-post-content pst-25">
                                            <div class="secondary-color mst-2 meb-7 text-uppercase heading-weight lh-1"><i
                                                    class="ri-calendar-line primary-color fw-normal"></i> 18, Jan 2024 <i
                                                    class="ri-chat-3-line primary-color fw-normal"></i> 3 Comment</div>
                                            <h6 class="font-18">Playful girl ruffle top</h6>
                                            <p class="mst-8">Let kids express joy with frilled tops made from gentle
                                                cotton, designed for color and comfort</p>
                                            <div class="d-xl-none mst-9">
                                                <a href="article.html" class="link-btn">Read more</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide" data-animate="animate__fadeIn">
                                    <div class="blog-post banner-hover">
                                        <div class="blog-main-img">
                                            <a href="article.html"
                                                class="d-none d-xl-block position-relative banner-img br-hidden">
                                                <span
                                                    class="btn-style tertiary-btn banner-btn position-absolute top-50 start-50 translate-middle z-1 text-nowrap">Shop
                                                    now</span>
                                                <img src="{{ asset('frontend') }}/assets/image/index/article/a-4.jpg"
                                                    class="w-100 img-fluid" alt="a-4">
                                            </a>
                                            <a href="article.html" class="d-block d-xl-none banner-img br-hidden">
                                                <img src="{{ asset('frontend') }}/assets/image/index/article/a-4.jpg"
                                                    class="w-100 img-fluid" alt="a-4">
                                            </a>
                                        </div>
                                        <div class="blog-post-content pst-25">
                                            <div class="secondary-color mst-2 meb-7 text-uppercase heading-weight lh-1"><i
                                                    class="ri-calendar-line primary-color fw-normal"></i> 20, Jan 2024 <i
                                                    class="ri-chat-3-line primary-color fw-normal"></i> 3 Comment</div>
                                            <h6 class="font-18">Everyday cotton tees</h6>
                                            <p class="mst-8">Discover versatile cotton tees perfect for daily wear,
                                                styled for comfort and effortless layering</p>
                                            <div class="d-xl-none mst-9">
                                                <a href="article.html" class="link-btn">Read more</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide" data-animate="animate__fadeIn">
                                    <div class="blog-post banner-hover">
                                        <div class="blog-main-img">
                                            <a href="article.html"
                                                class="d-none d-xl-block position-relative banner-img br-hidden">
                                                <span
                                                    class="btn-style tertiary-btn banner-btn position-absolute top-50 start-50 translate-middle z-1 text-nowrap">Shop
                                                    now</span>
                                                <img src="{{ asset('frontend') }}/assets/image/index/article/a-5.jpg"
                                                    class="w-100 img-fluid" alt="a-5">
                                            </a>
                                            <a href="article.html" class="d-block d-xl-none banner-img br-hidden">
                                                <img src="{{ asset('frontend') }}/assets/image/index/article/a-5.jpg"
                                                    class="w-100 img-fluid" alt="a-5">
                                            </a>
                                        </div>
                                        <div class="blog-post-content pst-25">
                                            <div class="secondary-color mst-2 meb-7 text-uppercase heading-weight lh-1"><i
                                                    class="ri-calendar-line primary-color fw-normal"></i> 28, Jan 2024 <i
                                                    class="ri-chat-3-line primary-color fw-normal"></i> 2 Comment</div>
                                            <h6 class="font-18">Crisp linen shirt edit</h6>
                                            <p class="mst-8">Explore breathable linen shirts tailored for warm days and
                                                styled for smart or relaxed occasions</p>
                                            <div class="d-xl-none mst-9">
                                                <a href="article.html" class="link-btn">Read more</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide" data-animate="animate__fadeIn">
                                    <div class="blog-post banner-hover">
                                        <div class="blog-main-img">
                                            <a href="article.html"
                                                class="d-none d-xl-block position-relative banner-img br-hidden">
                                                <span
                                                    class="btn-style tertiary-btn banner-btn position-absolute top-50 start-50 translate-middle z-1 text-nowrap">Shop
                                                    now</span>
                                                <img src="{{ asset('frontend') }}/assets/image/index/article/a-6.jpg"
                                                    class="w-100 img-fluid" alt="a-6">
                                            </a>
                                            <a href="article.html" class="d-block d-xl-none banner-img br-hidden">
                                                <img src="{{ asset('frontend') }}/assets/image/index/article/a-6.jpg"
                                                    class="w-100 img-fluid" alt="a-6">
                                            </a>
                                        </div>
                                        <div class="blog-post-content pst-25">
                                            <div class="secondary-color mst-2 meb-7 text-uppercase heading-weight lh-1"><i
                                                    class="ri-calendar-line primary-color fw-normal"></i> 02, Feb 2024 <i
                                                    class="ri-chat-3-line primary-color fw-normal"></i> 4 Comment</div>
                                            <h6 class="font-18">Modern draped dresses</h6>
                                            <p class="mst-8">From casual outings to evening looks, find flowing dresses
                                                designed to flatter all body shapes</p>
                                            <div class="d-xl-none mst-9">
                                                <a href="article.html" class="link-btn">Read more</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-buttons">
                            <div class="swiper-buttons-wrap">
                                <button type="button" class="swiper-prev swiper-prev-blog"
                                    aria-label="Arrow previous"><i class="ri-arrow-left-line d-block lh-1"></i></button>
                                <button type="button" class="swiper-next swiper-next-blog" aria-label="Arrow next"><i
                                        class="ri-arrow-right-line d-block lh-1"></i></button>
                            </div>
                        </div>
                        <div class="swiper-dots" data-animate="animate__fadeIn">
                            <div class="swiper-pagination swiper-pagination-blog"></div>
                        </div>
                        <div class="view-button d-none" data-animate="animate__fadeIn">
                            <a href="blog.html" class="btn-style tertiary-btn">See more</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- blog-area end -->
    </main>
@endsection
