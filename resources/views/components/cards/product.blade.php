<div class="col-6 col-md-4 col-xl-3 shop-col" data-animate="animate__fadeIn">
    <div class="single-product" data-cart-id="{{ $product->id }}" data-cart-name="{{ $product->name }}"
        data-cart-price="{{ $product->price }}" data-cart-currency="৳"
        data-cart-image="{{ asset('uploads/products/thumbnails') }}/{{ $product->thumbnail ?? 'default.png' }}"
        data-cart-url="{{ route('products.show', $product->id) }}">
        <div class="row single-product-wrap">
            <div class="product-image-col">
                <div class="product-image">
                    <a href="{{ route('products.show', $product->id) }}" class="pro-img">
                        <img src="{{ asset('uploads/products/thumbnails') }}/{{ $product->thumbnail ?? 'default.png' }}"
                            class="w-100 img-fluid img1" alt="p-3">
                        <img src="{{ asset('uploads/products/thumbnails') }}/{{ $product->thumbnail ?? 'default.png' }}"
                            class="w-100 img-fluid img2" alt="p-4">
                        <span
                            class="product-label product-label-{{ $product->highlight ? 'new' : 'discount' }} product-label-left">{{ $product->highlight ?? $product->discount }}</span>
                    </a>
                    <div class="product-action-wrap">
                        <div class="product-action">
                            <a href="javascript:void(0)" class="add-to-wishlist">
                                <span class="product-icon"><i class="ri-heart-line d-block icon-16 lh-1"></i></span>
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
                                <span class="product-icon"><i class="ri-eye-line d-block icon-16 lh-1"></i></span>
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
                        <span class="d-block heading-weight"><a href="{{ route('products.show', $product->id) }}"
                                class="primary-link">{{ $product->name }}</a></span>
                    </div>
                    <div class="product-price">
                        <div class="price-box heading-weight">
                            <span class="new-price primary-color">৳{{ number_format($product->price, 2) }}</span>
                            <span class="old-price"><span class="mer-3">~</span><span
                                    class="text-decoration-line-through">৳{{ number_format($product->old_price, 2) }}</span></span>
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
                            <span class="review-average">No reviews<span class="review-caption">0 reviews</span></span>
                        </span>
                    </div>
                    <div class="product-description">
                        <p>{{ $product->description }}</p>
                    </div>
                    <div class="product-action-wrap">
                        <div class="product-action">
                            <a href="javascript:void(0)" class="add-to-wishlist">
                                <span class="product-icon"><i class="ri-heart-line d-block icon-16 lh-1"></i></span>
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
                            <a href="#quickview-modal" data-bs-toggle="modal" class="quick-view">
                                <span class="product-icon"><i class="ri-eye-line d-block icon-16 lh-1"></i></span>
                                <span class="tooltip-text">quickview</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
