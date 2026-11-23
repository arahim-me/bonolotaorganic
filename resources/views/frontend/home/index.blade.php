@php
    $sectionsPath = 'frontend.home.sections.';
@endphp
@extends('layouts.master')
@section('master')
    <main id="main">
        <!-- service-area start -->
        @if ($sections->contains('slug', 'service'))
            @include($sectionsPath . 'service')
        @endif
        <!-- service-area end -->
        <!-- main-slider start -->
        @if ($sections->contains('slug', 'hero'))
            @include($sectionsPath . 'hero')
        @endif
        <!-- main-slider end -->
        <!-- category-slider start -->
        @if ($sections->contains('slug', 'category'))
            @include($sectionsPath . 'category')
        @endif
        <!-- category-slider end -->
        <!-- category-product start -->
        @if ($sections->contains('slug', 'trending'))
            @include($sectionsPath . 'trending')
        @endif
        <!-- category-product end -->
        <!-- deal-banner start -->
        @if ($sections->contains('slug', 'deal'))
            @include($sectionsPath . 'deal')
        @endif
        <!-- deal-banner end -->
        <!-- category-product start -->
        @if ($sections->contains('slug', 'featured'))
            @include($sectionsPath . 'featured')
        @endif
        <!-- category-product end -->
        <!-- newsletter-area start -->
        @if ($sections->contains('slug', 'newsletter'))
            @include($sectionsPath . 'featured')
        @endif
        <!-- newsletter-area end -->

        <!-- big-text/Testimonial start -->
        @if ($sections->contains('slug', 'testimonial'))
            @include($sectionsPath . 'featured')
        @endif
        <!-- testimonial end -->

        <!-- category-product start -->
        @if ($sections->contains('slug', 'new'))
            @include($sectionsPath . 'new')
        @endif
        <!-- category-product end -->
        <!-- blog-area start -->
        @if ($sections->contains('slug', 'blog'))
            @include($sectionsPath . 'blog')
        @endif
        <!-- blog-area end -->
    </main>
@endsection
