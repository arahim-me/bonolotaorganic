<section class="blog-area section-ptb">
    <div class="container-fluid">
        <div class="blog-category">
            <div class="section-capture text-center">
                <div class="section-title" data-animate="animate__fadeIn">
                    <h2 class="section-heading">{{ $section->name }}</h2>
                </div>
            </div>
            <div class="blog-wrap">
                <div class="blog-slider swiper" id="blog-slider-full">
                    <div class="swiper-wrapper">
                        @include('components.cards.blog')
                    </div>
                </div>
                <div class="swiper-buttons">
                    <div class="swiper-buttons-wrap">
                        <button type="button" class="swiper-prev swiper-prev-blog" aria-label="Arrow previous"><i
                                class="ri-arrow-left-line d-block lh-1"></i></button>
                        <button type="button" class="swiper-next swiper-next-blog" aria-label="Arrow next"><i
                                class="ri-arrow-right-line d-block lh-1"></i></button>
                    </div>
                </div>
                <div class="swiper-dots" data-animate="animate__fadeIn">
                    <div class="swiper-pagination swiper-pagination-blog"></div>
                </div>
                <div class="view-button" data-animate="animate__fadeIn">
                    <a href="blog.html" class="btn-style tertiary-btn">See more</a>
                </div>
            </div>
        </div>
    </div>
</section>
