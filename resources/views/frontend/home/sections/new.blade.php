<section class="category-product section-pt">
    <div class="container-fluid">
        <div class="collection-category">
            <div class="section-capture text-center">
                <div class="section-title" data-animate="animate__fadeIn">
                    <h2 class="section-heading">{{ $section->name }}</h2>
                </div>
            </div>
            <div class="row row-mtm100">
                <div class="col-12 col-lg-6 col-xl-7">
                    <div class="collection-wrap">
                        <div class="collection-product-slider swiper" id="best-product-slider">
                            <div class="swiper-wrapper">
                                @foreach ($new_products as $product)
                                    @include('components.cards.product')
                                @endforeach
                            </div>
                        </div>
                        <div class="swiper-buttons">
                            <div class="swiper-buttons-wrap">
                                <button type="button" class="swiper-prev swiper-prev-best-product"
                                    aria-label="Arrow previous"><i class="ri-arrow-left-line d-block lh-1"></i></button>
                                <button type="button" class="swiper-next swiper-next-best-product"
                                    aria-label="Arrow next"><i class="ri-arrow-right-line d-block lh-1"></i></button>
                            </div>
                        </div>
                        <div class="swiper-dots" data-animate="animate__fadeIn">
                            <div class="swiper-pagination swiper-pagination-best-product"></div>
                        </div>
                        <div class="view-button d-none" data-animate="animate__fadeIn">
                            <a href="{{ route('products') }}" class="btn-style tertiary-btn">View all item</a>
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
