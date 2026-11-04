@extends('layouts.master')

@section('title', $title ?? 'Policies')

@section('master')
    <main id="main">
        <!-- faqs start -->
        <section class="faqs section-ptb" data-animated-id="1">
            <div class="container">
                <div class="section-capture text-center">
                    <div class="section-title animate__fadeIn animate__animated" data-animate="animate__fadeIn">
                        <h2 class="section-heading">{{ $title }}</h2>
                    </div>
                </div>
                <div class="row row-mtm align-items-md-start">
                    <div class="col-12 col-md-4 col-lg-3 p-md-sticky top-0">
                        <div class="per-xxl-10">
                            <div class="row row-mtm">
                                <div class="col-12">
                                    <h6 class="other-tab-title font-20 meb-18 animate__fadeIn animate__animated"
                                        data-animate="animate__fadeIn"><span>Ask us anything</span></h6>
                                    <div class="ul-mtm-15">
                                        @foreach ($siteInfo->phone as $phone)
                                            <span data-animate="animate__fadeIn"
                                                class="animate__fadeIn animate__animated"><i
                                                    class="fas fa-phone icon-16 mer-4"></i><a href="tel:{{ $phone }}"
                                                    class="body-primary-color">{{ $phone }}</a></span>
                                        @endforeach
                                        @foreach ($siteInfo->email ?? [] as $email)
                                            <span data-animate="animate__fadeIn"
                                                class="animate__fadeIn animate__animated"><i
                                                    class="fas fa-envelope icon-16 mer-4"></i><a
                                                    href="mailto:{{ $email }}"
                                                    class="body-primary-color">{{ $email }}</a></span>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-12">
                                    <h6 class="other-tab-title font-20 meb-18 animate__fadeIn animate__animated"
                                        data-animate="animate__fadeIn"><span>Policies</span></h6>
                                    <div class="ul-mtm-15">
                                        @foreach ($policyTypes as $policyType)
                                            <span data-animate="animate__fadeIn"
                                                class="animate__fadeIn animate__animated"><a
                                                    href="{{ route('policies.show', $policyType->slug) }}"
                                                    class="body-primary-color">{{ $policyType->name }}</a></span>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-8 col-lg-9 p-md-sticky top-0">
                        <div class="psl-xxl-10">
                            <div class="row row-mtm">
                                {{-- <div class="col-12">
                                    <h6 class="font-18 animate__fadeIn animate__animated" data-animate="animate__fadeIn">
                                        Your guide to common questions and helpful answers</h6>
                                    <p class="mst-18 animate__fadeIn animate__animated" data-animate="animate__fadeIn">Find
                                        answers to common issues, tips, and how-tos. From orders to returns, we've compiled
                                        all the essential info you need in one place. Get quick solutions and guidance
                                        tailored to your needs.</p>
                                    <a href="contact-us.html"
                                        class="btn-style secondary-btn mst-23 animate__fadeIn animate__animated"
                                        data-animate="animate__fadeIn">Explore questions</a>
                                </div> --}}
                                @foreach ($policies as $policy)
                                    <div class="other-tab animate__fadeIn animate__animated" data-animate="animate__fadeIn">
                                        <a href="#id{{ $policy->id }}"
                                            class="d-flex flex-wrap align-items-baseline collapsed"
                                            data-bs-toggle="collapse" aria-expanded="false">
                                            <span class="width-calc-16 font-18 heading-weight">{{ $policy->title ?? 'No title to display' }}</span>
                                            <span class="other-tab-icon width-16 icon-16"><i
                                                    class="ri-add-line d-block lh-1"></i></span>
                                        </a>
                                        <div class="collapse" id="id{{ $policy->id }}"
                                            data-bs-parent="#faqs-collapse-group">
                                            <div class="pst-18">
                                                <p>{{ $policy->description ?? 'No description to display' }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- faqs end -->
        </main>
    @endsection
