<section class="category-product section-pt">
    <div class="container-fluid">
        <div class="collection-category">
            <div class="section-capture text-center">
                <div class="section-title" data-animate="animate__fadeIn">
                    <h2 class="section-heading">{{ $section->name }}</h2>
                </div>
            </div>
            <div class="collection-wrap">
                <div class="collection-product-slider swiper" id="feature-product-slider">
                    <div class="swiper-wrapper">
                        @forelse($featured_products as $product)
                            @include('components.cards.product')
                        @empty
                            <h4>No products to show</h4>
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
