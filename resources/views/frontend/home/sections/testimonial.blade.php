<section class="big-text big-text-overlay position-relative z-n1">
    <div class="big-text-title text-center" data-animate="animate__fadeIn">
        <h2 class="text-nowrap lh-1">testimonial</h2>
    </div>
</section>
<section class="testimonial section-ptb extra-bg">
    <div class="container-fluid">
        <div class="testi-category">
            <div class="section-capture text-center">
                <div class="section-title" data-animate="animate__fadeIn">
                    <h2 class="section-heading">{{ $section->name }}</h2>
                </div>
            </div>
            <div class="testi-wrap">
                <div class="testi-slider swiper" id="testi-slider">
                    <div class="swiper-wrapper">
                        @include('components.cards.testimonial')
                    </div>
                </div>
                <div class="swiper-buttons">
                    <div class="swiper-buttons-wrap">
                        <button type="button" class="swiper-prev swiper-prev-testi" aria-label="Arrow previous"><i
                                class="ri-arrow-left-line d-block lh-1"></i></button>
                        <button type="button" class="swiper-next swiper-next-testi" aria-label="Arrow next"><i
                                class="ri-arrow-right-line d-block lh-1"></i></button>
                    </div>
                </div>
                <div class="swiper-dots" data-animate="animate__fadeIn">
                    <div class="swiper-pagination swiper-pagination-testi"></div>
                </div>
            </div>
        </div>
    </div>
</section>
