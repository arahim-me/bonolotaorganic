@extends('layouts.master')
@section('title', $title ?? 'Products Page')
@section('master')
    <!-- main start -->
    <main id="main">
        <!-- shop-content start -->
        <section class="shop-content section-ptb">
            <div class="container">
                <!-- collection-info start -->
                <div class="row row-mtm" data-animate="animate__fadeIn">

                    <div class="col-12">
                        <div class="shop-product-wrap data-grid">
                            <!-- shop-grid start -->
                            <div class="row row-mtm">
                                @forelse($products as $product)
                                    <div class="col-6 col-md-4 col-xl-3 shop-col" data-animate="animate__fadeIn">
                                        <div class="single-product">
                                            <div class="row single-product-wrap">
                                                <div class="product-image-col">
                                                    <div class="product-image">
                                                        <a href="{{ route('products.show', $product->id) }}" class="pro-img">
                                                            <img src="{{ asset('uploads/products') }}/{{ $product->image ?? 'default.png' }}"
                                                                class="w-100 img-fluid img1" alt="p-3">
                                                            <img src="{{ asset('uploads/products') }}/{{ $product->image ?? 'default.png' }}"
                                                                class="w-100 img-fluid img2" alt="p-4">
                                                            <span
                                                                class="product-label product-label-{{$product->highlight ? 'new' : 'discount'}} product-label-left">{{$product->highlight ?? $product->discount}}</span>
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
                                                                <a href="{{ route('products.show', $product->id) }}" data-bs-toggle="modal"
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
                                                            <span class="d-block meb-7">{{ $product->category->name }}</span>
                                                            <span class="d-block heading-weight"><a href="#" class="primary-link">{{ $product->name }}</a></span>
                                                        </div>
                                                        <div class="product-price">
                                                            <div class="price-box heading-weight">
                                                                <span class="new-price primary-color">৳{{ number_format($product->old_price, 2) }}</span>
                                                                <span class="old-price"><span class="mer-3">~</span><span
                                                                        class="text-decoration-line-through">৳{{ number_format($product->price, 2) }}</span></span>
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
                                                            <p>{{ $product->description }}</p>
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
                                @empty
                                @endforelse
                                {{-- <div class="col-6 col-md-4 col-xl-3 shop-col" data-animate="animate__fadeIn">
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
                                                            <span class="review-average">4.0<span class="review-caption">2
                                                                    reviews</span></span>
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
                                <div class="col-6 col-md-4 col-xl-3 shop-col" data-animate="animate__fadeIn">
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
                                                        <span class="d-block heading-weight"><a href="product.html"
                                                                class="primary-link">Tailored blazer jacket</a></span>
                                                    </div>
                                                    <div class="product-price">
                                                        <div class="price-box heading-weight">
                                                            <span class="new-price primary-color">$49.00</span>
                                                            <span class="old-price"><span class="mer-3">~</span><span
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
                                <div class="col-6 col-md-4 col-xl-3 shop-col" data-animate="animate__fadeIn">
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
                                                        <span class="d-block heading-weight"><a href="product.html"
                                                                class="primary-link">Girls floral ruffle top</a></span>
                                                    </div>
                                                    <div class="product-price">
                                                        <div class="price-box heading-weight">
                                                            <span class="new-price primary-color">$69.00</span>
                                                            <span class="old-price"><span class="mer-3">~</span><span
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
                                <div class="col-6 col-md-4 col-xl-3 shop-col" data-animate="animate__fadeIn">
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
                                                        <span class="d-block heading-weight"><a href="product.html"
                                                                class="primary-link">Classic cotton t-shirt</a></span>
                                                    </div>
                                                    <div class="product-price">
                                                        <div class="price-box heading-weight">
                                                            <span class="new-price primary-color">$49.00</span>
                                                            <span class="old-price"><span class="mer-3">~</span><span
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
                                <div class="col-6 col-md-4 col-xl-3 shop-col" data-animate="animate__fadeIn">
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
                                                        <span class="d-block heading-weight"><a href="product.html"
                                                                class="primary-link">Slim fit linen shirt</a></span>
                                                    </div>
                                                    <div class="product-price">
                                                        <div class="price-box heading-weight">
                                                            <span class="new-price primary-color">$89.00</span>
                                                            <span class="old-price"><span class="mer-3">~</span><span
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
                                <div class="col-6 col-md-4 col-xl-3 shop-col" data-animate="animate__fadeIn">
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
                                <div class="col-6 col-md-4 col-xl-3 shop-col" data-animate="animate__fadeIn">
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
                                <div class="col-6 col-md-4 col-xl-3 shop-col" data-animate="animate__fadeIn">
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
                                <div class="col-6 col-md-4 col-xl-3 shop-col" data-animate="animate__fadeIn">
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
                                <div class="col-6 col-md-4 col-xl-3 shop-col" data-animate="animate__fadeIn">
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
                                <div class="col-6 col-md-4 col-xl-3 shop-col" data-animate="animate__fadeIn">
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
                                <div class="col-6 col-md-4 col-xl-3 shop-col" data-animate="animate__fadeIn">
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
                                </div> --}}
                            </div>
                            <!-- shop-grid end -->
                            <!-- paginatoin start -->
                            <div class="paginatoin-area section-pt" data-animate="animate__fadeIn">
                                <nav aria-label="Page navigation example">
                                    <ul
                                        class="pagination ul-mt5 align-items-center justify-content-center pagination-box">
                                        <li class="page-item first">
                                            <a href="javascript:void(0)"
                                                class="page-link p-0 m-0 bg-transparent border-0 lh-1"
                                                aria-label="First page">First</a>
                                        </li>
                                        <li class="page-item prev">
                                            <a href="javascript:void(0)"
                                                class="page-link icon-16 d-flex align-items-center justify-content-center p-0 m-0 bg-transparent border-0 border-radius"
                                                aria-label="Previous"><i
                                                    class="ri-arrow-left-line d-block lh-1"></i></a>
                                        </li>
                                        <li class="page-item">
                                            <a href="javascript:void(0)"
                                                class="page-link d-flex align-items-center justify-content-center p-0 m-0 heading-weight border-0 border-radius lh-1"
                                                aria-label="Page number">1</a>
                                        </li>
                                        <li class="page-item">
                                            <a href="javascript:void(0)"
                                                class="page-link active d-flex align-items-center justify-content-center p-0 m-0 heading-weight border-0 border-radius lh-1"
                                                aria-label="Page number">2</a>
                                        </li>
                                        <li class="page-item">
                                            <a href="javascript:void(0)"
                                                class="page-link d-flex align-items-center justify-content-center p-0 m-0 heading-weight border-0 border-radius lh-1"
                                                aria-label="Page number">3</a>
                                        </li>
                                        <li class="page-item next">
                                            <a href="javascript:void(0)"
                                                class="page-link icon-16 d-flex align-items-center justify-content-center p-0 m-0 bg-transparent border-0 border-radius"
                                                aria-label="Next"><i class="ri-arrow-right-line d-block lh-1"></i></a>
                                        </li>
                                        <li class="page-item last">
                                            <a href="javascript:void(0)"
                                                class="page-link p-0 m-0 bg-transparent border-0 lh-1"
                                                aria-label="Last page">Last</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <!-- paginatoin end -->
                        </div>
                    </div>
                </div>
                <!-- collection-info end -->
            </div>
        </section>
        <!-- shop-content start -->
    </main>
    <!-- main end -->
@endsection
