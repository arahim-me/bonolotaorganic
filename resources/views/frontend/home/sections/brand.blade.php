<div class="brand-logo section-pt">
    <div class="container-fluid">
        <div class="brand-category">
            <div class="brand-wrap">
                <div class="brand-slider swiper" id="brand-slider">
                    <div class="swiper-wrapper">
                        @include('components.cards.brand')
                    </div>
                </div>
                <div class="swiper-buttons">
                    <div class="swiper-buttons-wrap">
                        <button type="button" class="swiper-prev swiper-prev-brandslider"
                            aria-label="Arrow previous"><i class="ri-arrow-left-line d-block lh-1"></i></button>
                        <button type="button" class="swiper-next swiper-next-brandslider" aria-label="Arrow next"><i
                                class="ri-arrow-right-line d-block lh-1"></i></button>
                    </div>
                </div>
                <div class="swiper-dots" data-animate="animate__fadeIn">
                    <div class="swiper-pagination swiper-pagination-brandslider"></div>
                </div>
            </div>
        </div>
    </div>
</div>
