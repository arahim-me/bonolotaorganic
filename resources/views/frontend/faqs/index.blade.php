@extends('layouts.master')
@section('master')
    <main id="main">
        <!-- faqs start -->
        <section class="faqs section-ptb">
            <div class="container">
                <div class="section-capture text-center">
                    <div class="section-title" data-animate="animate__fadeIn">
                        <h2 class="section-heading">Best ask</h2>
                    </div>
                </div>
                <div class="row row-mtm align-items-md-start">
                    <div class="col-12 col-md-4 col-lg-3 p-md-sticky top-0">
                        <div class="per-xxl-10">
                            <div class="row row-mtm">
                                <div class="col-12">
                                    <h6 class="other-tab-title font-20 meb-18" data-animate="animate__fadeIn"><span>Ask us
                                            anything</span></h6>
                                    <div class="ul-mtm-15">
                                        <span data-animate="animate__fadeIn"><i class="ri-phone-line icon-16 mer-4"></i><a
                                                href="tel:+919876543210" class="body-primary-color">+91
                                                98765-43210</a></span>
                                        <span data-animate="animate__fadeIn"><i class="ri-mail-line icon-16 mer-4"></i><a
                                                href="mailto:info@demowebsite.com"
                                                class="body-primary-color">info@demowebsite.com</a></span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <h6 class="other-tab-title font-20 meb-18" data-animate="animate__fadeIn">
                                        <span>Policies</span></h6>
                                    <div class="ul-mtm-15">
                                        <span data-animate="animate__fadeIn"><a href="cancellation.html"
                                                class="body-primary-color">Cancellation</a></span>
                                        <span data-animate="animate__fadeIn"><a href="cookie.html"
                                                class="body-primary-color">Cookie page</a></span>
                                        <span data-animate="animate__fadeIn"><a href="javascript:void(0)"
                                                class="primary-color">Faq's page</a></span>
                                        <span data-animate="animate__fadeIn"><a href="legal.html"
                                                class="body-primary-color">Legal page</a></span>
                                        <span data-animate="animate__fadeIn"><a href="payment-policy.html"
                                                class="body-primary-color">Payment policy</a></span>
                                        <span data-animate="animate__fadeIn"><a href="privacy-policy.html"
                                                class="body-primary-color">Privacy policy</a></span>
                                        <span data-animate="animate__fadeIn"><a href="return-policy.html"
                                                class="body-primary-color">Return policy</a></span>
                                        <span data-animate="animate__fadeIn"><a href="shipping-policy.html"
                                                class="body-primary-color">Shipping policy</a></span>
                                        <span data-animate="animate__fadeIn"><a href="terms-condition.html"
                                                class="body-primary-color">Terms & conditions</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-8 col-lg-9 p-md-sticky top-0">
                        <div class="psl-xxl-10">
                            <div class="row row-mtm">
                                <div class="col-12">
                                    <h6 class="font-18" data-animate="animate__fadeIn">Your guide to common questions and
                                        helpful answers</h6>
                                    <p class="mst-18" data-animate="animate__fadeIn">Find answers to common issues, tips,
                                        and how-tos. From orders to returns, we've compiled all the essential info you need
                                        in one place. Get quick solutions and guidance tailored to your needs.</p>
                                    <a href="contact-us.html" class="btn-style secondary-btn mst-23"
                                        data-animate="animate__fadeIn">Explore questions</a>
                                </div>
                                <div class="col-12">
                                    <h6 class="other-tab-title font-20 meb-30" data-animate="animate__fadeIn"><span>Inquiry
                                            guide</span></h6>
                                    <div class="faqs-collapse-group" id="faqs-collapse-group">
                                        <div class="other-tab" data-animate="animate__fadeIn">
                                            <a href="#faqs-collapse-group1" class="d-flex flex-wrap align-items-baseline"
                                                data-bs-toggle="collapse" aria-expanded="true">
                                                <span class="width-calc-16 font-18 heading-weight">How do i apply a discount
                                                    or promo code?</span>
                                                <span class="other-tab-icon width-16 icon-16"><i
                                                        class="ri-add-line d-block lh-1"></i></span>
                                            </a>
                                            <div class="collapse show" id="faqs-collapse-group1"
                                                data-bs-parent="#faqs-collapse-group">
                                                <div class="pst-18">
                                                    <p>At checkout, you will see a field labeled "promo code." Enter your
                                                        code in this field and click "apply." The discount will be reflected
                                                        in your order total. Please note that only one promo code can be
                                                        used per order.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="other-tab" data-animate="animate__fadeIn">
                                            <a href="#faqs-collapse-group2" class="d-flex flex-wrap align-items-baseline"
                                                data-bs-toggle="collapse" aria-expanded="false">
                                                <span class="width-calc-16 font-18 heading-weight">Is my payment information
                                                    secure?</span>
                                                <span class="other-tab-icon width-16 icon-16"><i
                                                        class="ri-add-line d-block lh-1"></i></span>
                                            </a>
                                            <div class="collapse" id="faqs-collapse-group2"
                                                data-bs-parent="#faqs-collapse-group">
                                                <div class="pst-18">
                                                    <p>Yes, we take your security very seriously. Our website uses SSL
                                                        encryption to protect your payment information. We do not store your
                                                        credit card details, and all transactions are processed securely.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="other-tab" data-animate="animate__fadeIn">
                                            <a href="#faqs-collapse-group3" class="d-flex flex-wrap align-items-baseline"
                                                data-bs-toggle="collapse" aria-expanded="false">
                                                <span class="width-calc-16 font-18 heading-weight">Do you ship
                                                    internationally?</span>
                                                <span class="other-tab-icon width-16 icon-16"><i
                                                        class="ri-add-line d-block lh-1"></i></span>
                                            </a>
                                            <div class="collapse" id="faqs-collapse-group3"
                                                data-bs-parent="#faqs-collapse-group">
                                                <div class="pst-18">
                                                    <p>Yes, we offer international shipping to over 100 countries. Shipping
                                                        fees and delivery times vary depending on the destination.
                                                        International customers are responsible for any customs duties or
                                                        taxes that may apply.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="other-tab" data-animate="animate__fadeIn">
                                            <a href="#faqs-collapse-group4" class="d-flex flex-wrap align-items-baseline"
                                                data-bs-toggle="collapse" aria-expanded="false">
                                                <span class="width-calc-16 font-18 heading-weight">How do i create an
                                                    account?</span>
                                                <span class="other-tab-icon width-16 icon-16"><i
                                                        class="ri-add-line d-block lh-1"></i></span>
                                            </a>
                                            <div class="collapse" id="faqs-collapse-group4"
                                                data-bs-parent="#faqs-collapse-group">
                                                <div class="pst-18">
                                                    <p>To create an account, click on the "Sign Up" button at the top right
                                                        of our website. You'll need to enter your name, email address, and
                                                        create a password. Having an account allows you to track orders,
                                                        save your shipping details, and receive exclusive offers.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="other-tab" data-animate="animate__fadeIn">
                                            <a href="#faqs-collapse-group5" class="d-flex flex-wrap align-items-baseline"
                                                data-bs-toggle="collapse" aria-expanded="false">
                                                <span class="width-calc-16 font-18 heading-weight">What should i do if i
                                                    forget my password?</span>
                                                <span class="other-tab-icon width-16 icon-16"><i
                                                        class="ri-add-line d-block lh-1"></i></span>
                                            </a>
                                            <div class="collapse" id="faqs-collapse-group5"
                                                data-bs-parent="#faqs-collapse-group">
                                                <div class="pst-18">
                                                    <p>If you forget your password, click on the "forgot password?" link on
                                                        the login page. Enter your email address, and we'll send you a link
                                                        to reset your password.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="other-tab" data-animate="animate__fadeIn">
                                            <a href="#faqs-collapse-group6" class="d-flex flex-wrap align-items-baseline"
                                                data-bs-toggle="collapse" aria-expanded="false">
                                                <span class="width-calc-16 font-18 heading-weight">How can i contact
                                                    customer service?</span>
                                                <span class="other-tab-icon width-16 icon-16"><i
                                                        class="ri-add-line d-block lh-1"></i></span>
                                            </a>
                                            <div class="collapse" id="faqs-collapse-group6"
                                                data-bs-parent="#faqs-collapse-group">
                                                <div class="pst-18">
                                                    <p>Our customer service team is here to help! You can contact us via
                                                        email at <a href="mailto:contact@demowebsite.com"
                                                            class="primary-link">contact@demowebsite.com.</a>, through the
                                                        live chat feature on our website, or by calling our toll-free number
                                                        at <a href="tel:18001234567"
                                                            class="primary-link">1-800-123-4567</a>. We're available Monday
                                                        to Friday from 9 AM to 6 PM (EST).</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- faqs end -->
    </main>
@endsection
