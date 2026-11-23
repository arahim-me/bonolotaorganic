<section class="newsletter-area section-ptb">
    <div class="container">
        <div class="row align-items-lg-center justify-content-lg-center">
            <div class="col-12 col-lg-5 col-xxl-4 meb-23 meb-lg-0 text-center">
                <h2 class="section-heading">{{ $newsletter->name ?? 'Subscribe to Our Newsletter' }}</h2>
            </div>
            <div class="col-12 col-lg-7 col-xl-6">
                <form method="post" class="news-form">
                    <div class="news-wrap d-md-flex">
                        <div class="w-100 position-relative d-flex align-items-center">
                            <span class="position-absolute primary-color icon-16 msl-15"><i
                                    class="ri-mail-open-line"></i></span>
                            <input type="email" id="newsletter-email" name="newsletter-email" class="width-100 psl-40"
                                placeholder="Enter your email" required>
                        </div>
                        <button type="submit"
                            class="news-btn width-100 width-md-auto btn-style tertiary-btn mst-15 mst-md-0 text-nowrap">Subscribe
                            now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
