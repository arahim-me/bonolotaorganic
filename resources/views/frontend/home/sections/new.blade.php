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
                                @foreach ($new_products as $product)
                                    <div class="swiper-slide" data-animate="animate__fadeIn">
                                        <div class="single-product">
                                            <div class="row single-product-wrap">
                                                <div class="product-image-col">
                                                    <div class="product-image">
                                                        <a href="{{ route('products.show', [$product->id, $product->slug]) }}"
                                                            class="pro-img">
                                                            <img src="{{ asset('uploads/products/thumbnails') }}/{{ $product->thumbnail ?? 'default.png' }}"
                                                                class="w-100 img-fluid img1" alt="{{ $product->name }}">
                                                            <img src="{{ asset('uploads/products/thumbnails') }}/{{ $product->thumbnail ?? 'default.png' }}"
                                                                class="w-100 img-fluid img2" alt="{{ $product->name }}">
                                                        </a>
                                                        <div class="product-action-wrap">
                                                            <div class="product-action">
                                                                <a href="javascript:void(0)" class="add-to-cart"
                                                                    data-id="{{ $product->id }}"
                                                                    data-name="{{ $product->name }}"
                                                                    data-price="{{ (float) $product->price }}"
                                                                    data-image="{{ asset('uploads/products/thumbnails/' . $product->thumbnail ?? 'default.png') }}"
                                                                    data-url="{{ route('products.show', $product->id) }}">

                                                                    <span class="product-icon">
                                                                        <span class="product-bag-icon icon-16">
                                                                            <i
                                                                                class="ri-shopping-bag-3-line d-block lh-1"></i>
                                                                        </span>
                                                                        <span class="product-loader-icon icon-16">
                                                                            <i
                                                                                class="ri-loader-4-line d-block lh-1"></i>
                                                                        </span>
                                                                        <span class="product-check-icon icon-16">
                                                                            <i class="ri-check-line d-block lh-1"></i>
                                                                        </span>
                                                                    </span>
                                                                    <span class="tooltip-text">add to
                                                                        cart</span>
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
                                                            <span
                                                                class="d-block meb-7">{{ $product->category?->name ?? 'Uncotegorized' }}
                                                                | {{ $product->type }}</span>
                                                            <span class="d-block heading-weight"><a
                                                                    href="{{ route('products.show', [$product->id, $product->slug]) }}"
                                                                    class="primary-link">{{ $product->name }}</a></span>
                                                        </div>
                                                        <div class="product-price">
                                                            <div class="price-box heading-weight">
                                                                <span
                                                                    class="new-price primary-color">${{ number_format($product->price, 2) }}</span>
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
                                                            <p>Lorem Ipsum is simply dummy text of the printing
                                                                and
                                                                typesetting industry It is a long established
                                                                fact
                                                                that
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
                                                                    <span class="tooltip-text">add to
                                                                        cart</span>
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
                            </div>
                        </div>
                        <div class="swiper-buttons">
                            <div class="swiper-buttons-wrap">
                                <button type="button" class="swiper-prev swiper-prev-best-product"
                                    aria-label="Arrow previous"><i
                                        class="ri-arrow-left-line d-block lh-1"></i></button>
                                <button type="button" class="swiper-next swiper-next-best-product"
                                    aria-label="Arrow next"><i class="ri-arrow-right-line d-block lh-1"></i></button>
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
