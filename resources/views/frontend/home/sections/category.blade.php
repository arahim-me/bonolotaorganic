<section class="category-slider section-ptb extra-bg">
    <div class="container-fluid">
        <div class="cat-category">
            <div class="section-capture text-center">
                <div class="section-title" data-animate="animate__fadeIn">
                    <h2 class="section-heading">{{ $section->name }}</h2>
                </div>
            </div>
            <div class="cat-wrap">
                <div class="cat-slider swiper" id="cat-slider">
                    <div class="swiper-wrapper">
                        @forelse($categories as $category)
                            <div class="swiper-slide h-auto d-flex" data-animate="animate__fadeIn">
                                <div class="cat-block banner-hover w-100 ptb-15 plr-15 body-bg border-radius">
                                    <a href="{{ route('category.products', [$category->id, $category->slug]) }}"
                                        class="d-none d-xl-block position-relative banner-img br-hidden">
                                        <span
                                            class="btn-style tertiary-btn banner-btn position-absolute top-50 start-50 translate-middle z-1 text-nowrap">Shop
                                            now</span>
                                        <img src="{{ asset('uploads/categories') }}/{{ $category->image ?? 'default.png' }}"
                                            class="w-100 img-fluid" alt="collection-1">
                                    </a>
                                    <a href="{{ route('category.products', [$category->id, $category->slug]) }}"
                                        class="d-block d-xl-none banner-img br-hidden">
                                        <img src="{{ asset('uploads/categories') }}/{{ $category->image ?? 'default.png' }}"
                                            class="w-100 img-fluid" alt="collection-1">
                                    </a>
                                    <div class="cat-content pst-15">
                                        <div class="ul-mtm15 justify-content-between heading-weight">
                                            <span class="heading-color text-truncate">{{ $category->name }}</span>
                                            <span
                                                class="primary-color text-uppercase">{{ $category->products->count() ?? 0 }}+
                                                items</span>
                                        </div>
                                        <div class="d-xl-none mst-7">
                                            <a href="{{ route('category.products', [$category->id, $category->slug]) }}"
                                                class="link-btn">Shop now</a>
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
                                        <img src="{{ asset('uploads/categories') }}/{{ $category->image ?? 'default.png' }}"
                                            class="w-100 img-fluid" alt="collection-1">
                                    </a>
                                    <a href="collection.html" class="d-block d-xl-none banner-img br-hidden">
                                        <img src="{{ asset('uploads/categories') }}/{{ $category->image ?? 'default.png' }}"
                                            class="w-100 img-fluid" alt="collection-1">
                                    </a>
                                    <div class="cat-content pst-15">
                                        <div class="ul-mtm15 justify-content-between heading-weight">
                                            <span
                                                class="heading-color text-truncate">{{ $category->name ?? 'N/A' }}</span>
                                            <span
                                                class="primary-color text-uppercase">{{ $category->products_count ?? 0 }}+
                                                items</span>
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
                <div class="view-button" data-animate="animate__fadeIn">
                    <a href="{{ route('categories') }}" class="btn-style tertiary-btn">See more</a>
                </div>
            </div>
        </div>
    </div>
</section>
