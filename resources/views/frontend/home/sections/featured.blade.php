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
                        @forelse($featured_products as $product)
                            <div class="swiper-slide" data-animate="animate__fadeIn">
                                <div class="single-product">
                                    <div class="row single-product-wrap">
                                        <div class="product-image-col">
                                            <div class="product-image">
                                                <a href="{{ route('products.show', $product->id) }}" class="pro-img">
                                                    <img src="{{ asset('uploads/products/thumbnails') }}/{{ $product->thumbnail ?? 'default.png' }}"
                                                        class="w-100 img-fluid img1" alt="p-11">
                                                    <img src="{{ asset('uploads/products/images') }}/{{ $product->images[0] ?? 'default.png' }}"
                                                        class="w-100 img-fluid img2" alt="p-12">
                                                    <span
                                                        class="product-label product-label-sale product-label-left">{{ $product->highlight }}</span>
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
                                                    <span class="d-block meb-7">{{ $product->category->name }}
                                                        /
                                                        {{ $product->type }}</span>
                                                    <span class="d-block heading-weight"><a
                                                            href="{{ route('products.show', $product->id) }}"
                                                            class="primary-link">{{ $product->name }}</a></span>
                                                </div>
                                                <div class="product-price">
                                                    <div class="price-box heading-weight">
                                                        <span
                                                            class="new-price primary-color">${{ number_format($product->price, 2) }}</span>
                                                        <span class="old-price"><span class="mer-3">~</span><span
                                                                class="text-decoration-line-through">${{ number_format($product->old_price, 2) }}</span></span>
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
                        @empty
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
                                                            class="primary-link">Flowy
                                                            midi dress</a></span>
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
                        @endforelse
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
