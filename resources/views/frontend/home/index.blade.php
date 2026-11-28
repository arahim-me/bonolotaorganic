@php
    $sectionsPath = 'frontend.home.sections.';
@endphp
@extends('layouts.master')
@section('master')
    <main id="main">
        <!-- service-area start -->
        @foreach ($sections as $section)
            @if (view()->exists('frontend.home.sections.' . $section->slug))
                @include('frontend.home.sections.' . $section->slug)
            @endif
        @endforeach
        {{-- @if ($sections->slug === 'service')
            @include($sectionsPath . 'service')
        @endif
        <!-- service-area end -->
        <!-- main-slider start -->
        <dd>{{ $sections }}</dd>
        @if ($sections->slug === 'hero')
            @include($sectionsPath . 'hero')
        @endif
        <!-- main-slider end -->
        <!-- category-slider start -->
        @if ($sections->slug === 'category')
            @include($sectionsPath . 'category')
        @endif
        @if ($sections->slug === 'brand')
            @include($sectionsPath . 'brand')
        @endif
        <!-- category-slider end -->
        <!-- category-product start -->
        @if ($sections->slug === 'trending')
            @include($sectionsPath . 'trending')
        @endif
        <!-- category-product end -->
        <!-- deal-banner start -->
        @if ($sections->slug === 'deal')
            @include($sectionsPath . 'deal')
        @endif
        <!-- deal-banner end -->
        <!-- category-product start -->
        @if ($sections->slug === 'featured')
            @include($sectionsPath . 'featured')
        @endif
        <!-- category-product end -->
        <!-- newsletter-area start -->
        @if ($sections->slug === 'newsletter')
            @include($sectionsPath . 'newsletter')
        @endif
        <!-- newsletter-area end -->

        <!-- big-text/Testimonial start -->
        @if ($sections->slug === 'testimonial')
            @include($sectionsPath . 'testimonial')
        @endif
        <!-- testimonial end -->

        <!-- category-product start -->
        @if ($sections->slug === 'new')
            @include($sectionsPath . 'new')
        @endif
        <!-- category-product end -->
        <!-- blog-area start -->
        @if ($sections->slug === 'blog')
            @include($sectionsPath . 'blog')
        @endif --}}
        <!-- blog-area end -->
    </main>
@endsection
