@extends('layouts.master')
@section('title', $title ?? 'Products Page')
@section('master')
    <!-- main start -->
    <main id="main">
        <!-- shop-content start -->
        <section class="shop-content section-ptb">
            <div class="container">
                <!-- shop-sidebar start -->
                <div class="shop-sidebar-wrap shop-filter-sidebar" data-animate="animate__fadeIn">
                    <button type="button" class="shop-sidebar-close body-secondary-color icon-16 position-absolute"
                        aria-label="Close"><i class="ri-close-large-line d-block lh-1"></i></button>
                    <form class="shop-form" action="javascript:void(0)" id="shopForm">
                        <!-- shop-categories start -->
                        {{-- @if ($categories)
                            <div class="shop-sidebar shop-categories">
                                <h6 class="font-18">Categories</h6>
                                <div class="shop-cat-post mst-21">
                                    <div class="shop-cat ul-mtm-15">
                                        @foreach ($categories as $category)
                                            <a href="collection-category.html"
                                                class="body-primary-color d-flex align-items-center justify-content-between">
                                                <span>{{ $category->name }}</span>
                                                <span>{{ $category->products_count?? 0 }}</span>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif --}}
                        <x-category-card :categories="$categories" />
                        <!-- shop-categories end -->
                        <!-- shop-availability start -->
                        <div class="shop-sidebar availability">
                            <h6 class="font-18">Availability</h6>
                            <div class="shop-header d-flex justify-content-between mst-21">
                                <span class="shop-selected">2 selected</span>
                                <button type="submit"
                                    class="shop-reset body-secondary-color text-decoration-underline">Reset</button>
                            </div>
                            <div class="shop-element mst-22">
                                <ul class="shop-filters ul-mtm-15">
                                    <li>
                                        <label
                                            class="cust-checkbox-label d-flex align-items-center justify-content-between">
                                            <input type="checkbox" id="shop-in-stock" name="shop-in-stock"
                                                class="cust-checkbox" value="in-stock" checked>
                                            <span class="d-block cust-check"></span>
                                            <span class="shop-name me-auto">In stock</span>
                                            <span class="shop-count">12</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label
                                            class="cust-checkbox-label d-flex align-items-center justify-content-between disabled">
                                            <input type="checkbox" id="shop-out-of-stock" name="shop-out-of-stock"
                                                class="cust-checkbox" value="out-of-stock" checked>
                                            <span class="d-block cust-check"></span>
                                            <span class="shop-name me-auto">Out of stock</span>
                                            <span class="shop-count">1</span>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- shop-sidebar availability end -->
                        <!-- shop-sidebar price start -->
                        <div class="shop-sidebar price">
                            <h6 class="font-18">Price</h6>
                            <div class="shop-header d-flex justify-content-between mst-21">
                                <span class="shop-selected">The highest price is $89.00</span>
                                <button type="submit"
                                    class="shop-reset body-secondary-color text-decoration-underline">Reset</button>
                            </div>
                            <div class="shop-element mst-26">
                                <div class="price-input-range">
                                    <div class="price-range">
                                        <div class="price-container">
                                            <div class="price-slider"></div>
                                        </div>
                                        <div class="range-input position-relative">
                                            <input type="range"
                                                class="min-range position-absolute w-100 p-0 bg-transparent border-0"
                                                min="0" max="89" value="0" step="1">
                                            <input type="range"
                                                class="max-range position-absolute w-100 p-0 bg-transparent border-0"
                                                min="0" max="89" value="89" step="1">
                                        </div>
                                    </div>
                                    <div class="price-input d-flex align-items-center mst-30">
                                        <div class="price-field position-relative w-100">
                                            <span class="price-input-title position-absolute top-0 start-0">From</span>
                                            <span
                                                class="price-input-prefix position-absolute top-50 translate-middle-y">$</span>
                                            <input type="number" id="min-price" name="min-price"
                                                class="min-input w-100 h-100 text-end" min="0" max="89"
                                                value="0">
                                        </div>
                                        <div class="price-input-separator mlr-15">-</div>
                                        <div class="price-field position-relative w-100">
                                            <span class="price-input-title position-absolute top-0 start-0">To</span>
                                            <span
                                                class="price-input-prefix position-absolute top-50 translate-middle-y">$</span>
                                            <input type="number" id="max-price" name="max-price"
                                                class="max-input w-100 h-100 text-end" min="0" max="89"
                                                value="89">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- shop-sidebar price end -->
                        <!-- shop-sidebar color start -->
                        <div class="shop-sidebar color">
                            <h6 class="font-18">Color</h6>
                            <div class="shop-header d-flex justify-content-between mst-21">
                                <span class="shop-selected">1 selected</span>
                                <button type="submit"
                                    class="shop-reset body-secondary-color text-decoration-underline">Reset</button>
                            </div>
                            <div class="shop-element mst-26">
                                <ul class="shop-filters ul-mt10">
                                    <li>
                                        <label class="cust-checkbox-label">
                                            <input type="checkbox" id="shop-aliceblue" name="shop-aliceblue"
                                                class="cust-checkbox" value="aliceblue" checked>
                                            <span class="d-block cust-check aliceblue"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="cust-checkbox-label disabled">
                                            <input type="checkbox" id="shop-antiquewhite" name="shop-antiquewhite"
                                                class="cust-checkbox" value="antiquewhite">
                                            <span class="d-block cust-check antiquewhite"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="cust-checkbox-label">
                                            <input type="checkbox" id="shop-azure" name="shop-azure"
                                                class="cust-checkbox" value="azure">
                                            <span class="d-block cust-check azure"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="cust-checkbox-label">
                                            <input type="checkbox" id="shop-beige" name="shop-beige"
                                                class="cust-checkbox" value="beige">
                                            <span class="d-block cust-check beige"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="cust-checkbox-label">
                                            <input type="checkbox" id="shop-bisque" name="shop-bisque"
                                                class="cust-checkbox" value="bisque">
                                            <span class="d-block cust-check bisque"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="cust-checkbox-label">
                                            <input type="checkbox" id="shop-black" name="shop-black"
                                                class="cust-checkbox" value="black">
                                            <span class="d-block cust-check black"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="cust-checkbox-label">
                                            <input type="checkbox" id="shop-cadetblue" name="shop-cadetblue"
                                                class="cust-checkbox" value="cadetblue">
                                            <span class="d-block cust-check cadetblue"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="cust-checkbox-label">
                                            <input type="checkbox" id="shop-chocolate" name="shop-chocolate"
                                                class="cust-checkbox" value="chocolate">
                                            <span class="d-block cust-check chocolate"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="cust-checkbox-label">
                                            <input type="checkbox" id="shop-coral" name="shop-coral"
                                                class="cust-checkbox" value="coral">
                                            <span class="d-block cust-check coral"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="cust-checkbox-label">
                                            <input type="checkbox" id="shop-darkcyan" name="shop-darkcyan"
                                                class="cust-checkbox" value="darkcyan">
                                            <span class="d-block cust-check darkcyan"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="cust-checkbox-label">
                                            <input type="checkbox" id="shop-darkgoldenrod" name="shop-darkgoldenrod"
                                                class="cust-checkbox" value="darkgoldenrod">
                                            <span class="d-block cust-check darkgoldenrod"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="cust-checkbox-label">
                                            <input type="checkbox" id="shop-darkgray" name="shop-darkgray"
                                                class="cust-checkbox" value="darkgray">
                                            <span class="d-block cust-check darkgray"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="cust-checkbox-label">
                                            <input type="checkbox" id="shop-floralwhite" name="shop-floralwhite"
                                                class="cust-checkbox" value="floralwhite">
                                            <span class="d-block cust-check floralwhite"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="cust-checkbox-label">
                                            <input type="checkbox" id="shop-gainsboro" name="shop-gainsboro"
                                                class="cust-checkbox" value="gainsboro">
                                            <span class="d-block cust-check gainsboro"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="cust-checkbox-label">
                                            <input type="checkbox" id="shop-ghostwhite" name="shop-ghostwhite"
                                                class="cust-checkbox" value="ghostwhite">
                                            <span class="d-block cust-check ghostwhite"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="cust-checkbox-label">
                                            <input type="checkbox" id="shop-gold" name="shop-gold" class="cust-checkbox"
                                                value="gold">
                                            <span class="d-block cust-check gold"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="cust-checkbox-label">
                                            <input type="checkbox" id="shop-honeydew" name="shop-honeydew"
                                                class="cust-checkbox" value="honeydew">
                                            <span class="d-block cust-check honeydew"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="cust-checkbox-label">
                                            <input type="checkbox" id="shop-hotpink" name="shop-hotpink"
                                                class="cust-checkbox" value="hotpink">
                                            <span class="d-block cust-check hotpink"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="cust-checkbox-label">
                                            <input type="checkbox" id="shop-ivory" name="shop-ivory"
                                                class="cust-checkbox" value="ivory">
                                            <span class="d-block cust-check ivory"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="cust-checkbox-label">
                                            <input type="checkbox" id="shop-khaki" name="shop-khaki"
                                                class="cust-checkbox" value="khaki">
                                            <span class="d-block cust-check khaki"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="cust-checkbox-label">
                                            <input type="checkbox" id="shop-lavender" name="shop-lavender"
                                                class="cust-checkbox" value="lavender">
                                            <span class="d-block cust-check lavender"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="cust-checkbox-label">
                                            <input type="checkbox" id="shop-lavenderblush" name="shop-lavenderblush"
                                                class="cust-checkbox" value="lavenderblush">
                                            <span class="d-block cust-check lavenderblush"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="cust-checkbox-label">
                                            <input type="checkbox" id="shop-lemonchiffon" name="shop-lemonchiffon"
                                                class="cust-checkbox" value="lemonchiffon">
                                            <span class="d-block cust-check lemonchiffon"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="cust-checkbox-label">
                                            <input type="checkbox" id="shop-lightblue" name="shop-lightblue"
                                                class="cust-checkbox" value="lightblue">
                                            <span class="d-block cust-check lightblue"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="cust-checkbox-label">
                                            <input type="checkbox" id="shop-mintcream" name="shop-mintcream"
                                                class="cust-checkbox" value="mintcream">
                                            <span class="d-block cust-check mintcream"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="cust-checkbox-label">
                                            <input type="checkbox" id="shop-navajowhite" name="shop-navajowhite"
                                                class="cust-checkbox" value="navajowhite">
                                            <span class="d-block cust-check navajowhite"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="cust-checkbox-label">
                                            <input type="checkbox" id="shop-oldlace" name="shop-oldlace"
                                                class="cust-checkbox" value="oldlace">
                                            <span class="d-block cust-check oldlace"></span>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- shop-sidebar color end -->
                        <!-- shop-sidebar size start -->
                        <div class="shop-sidebar size">
                            <h6 class="font-18">Size</h6>
                            <div class="shop-header d-flex justify-content-between mst-21">
                                <span class="shop-selected">1 selected</span>
                                <button type="submit"
                                    class="shop-reset body-secondary-color text-decoration-underline">Reset</button>
                            </div>
                            <div class="shop-element mst-26">
                                <ul class="shop-filters ul-mt5">
                                    <li>
                                        <label class="cust-checkbox-label">
                                            <input type="checkbox" id="shop-xs" name="shop-xs" class="cust-checkbox"
                                                value="xs" checked>
                                            <span
                                                class="d-flex align-items-center justify-content-center cust-check">XS</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="cust-checkbox-label disabled">
                                            <input type="checkbox" id="shop-s" name="shop-s" class="cust-checkbox"
                                                value="s">
                                            <span
                                                class="d-flex align-items-center justify-content-center cust-check">S</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="cust-checkbox-label">
                                            <input type="checkbox" id="shop-m" name="shop-m" class="cust-checkbox"
                                                value="m">
                                            <span
                                                class="d-flex align-items-center justify-content-center cust-check">M</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="cust-checkbox-label">
                                            <input type="checkbox" id="shop-l" name="shop-l" class="cust-checkbox"
                                                value="l">
                                            <span
                                                class="d-flex align-items-center justify-content-center cust-check">L</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="cust-checkbox-label">
                                            <input type="checkbox" id="shop-xl" name="shop-xl" class="cust-checkbox"
                                                value="xl">
                                            <span
                                                class="d-flex align-items-center justify-content-center cust-check">XL</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="cust-checkbox-label">
                                            <input type="checkbox" id="shop-xxl" name="shop-xxl" class="cust-checkbox"
                                                value="xxl">
                                            <span
                                                class="d-flex align-items-center justify-content-center cust-check">XXL</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="cust-checkbox-label">
                                            <input type="checkbox" id="shop-28" name="shop-28" class="cust-checkbox"
                                                value="28">
                                            <span
                                                class="d-flex align-items-center justify-content-center cust-check">28</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="cust-checkbox-label">
                                            <input type="checkbox" id="shop-30" name="shop-30" class="cust-checkbox"
                                                value="30">
                                            <span
                                                class="d-flex align-items-center justify-content-center cust-check">30</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="cust-checkbox-label">
                                            <input type="checkbox" id="shop-32" name="shop-32" class="cust-checkbox"
                                                value="32">
                                            <span
                                                class="d-flex align-items-center justify-content-center cust-check">32</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="cust-checkbox-label">
                                            <input type="checkbox" id="shop-34" name="shop-34" class="cust-checkbox"
                                                value="34">
                                            <span
                                                class="d-flex align-items-center justify-content-center cust-check">34</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="cust-checkbox-label">
                                            <input type="checkbox" id="shop-38" name="shop-38" class="cust-checkbox"
                                                value="38">
                                            <span
                                                class="d-flex align-items-center justify-content-center cust-check">38</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="cust-checkbox-label">
                                            <input type="checkbox" id="shop-40" name="shop-40" class="cust-checkbox"
                                                value="40">
                                            <span
                                                class="d-flex align-items-center justify-content-center cust-check">40</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="cust-checkbox-label">
                                            <input type="checkbox" id="shop-42" name="shop-42" class="cust-checkbox"
                                                value="42">
                                            <span
                                                class="d-flex align-items-center justify-content-center cust-check">42</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="cust-checkbox-label">
                                            <input type="checkbox" id="shop-44" name="shop-44" class="cust-checkbox"
                                                value="44">
                                            <span
                                                class="d-flex align-items-center justify-content-center cust-check">44</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="cust-checkbox-label">
                                            <input type="checkbox" id="shop-2y" name="shop-2y" class="cust-checkbox"
                                                value="2y">
                                            <span
                                                class="d-flex align-items-center justify-content-center cust-check">2Y</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="cust-checkbox-label">
                                            <input type="checkbox" id="shop-4y" name="shop-4y" class="cust-checkbox"
                                                value="4y">
                                            <span
                                                class="d-flex align-items-center justify-content-center cust-check">4Y</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="cust-checkbox-label">
                                            <input type="checkbox" id="shop-6y" name="shop-6y" class="cust-checkbox"
                                                value="6y">
                                            <span
                                                class="d-flex align-items-center justify-content-center cust-check">6Y</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="cust-checkbox-label">
                                            <input type="checkbox" id="shop-8y" name="shop-8y" class="cust-checkbox"
                                                value="8y">
                                            <span
                                                class="d-flex align-items-center justify-content-center cust-check">8Y</span>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- shop-sidebar size end -->
                        <!-- shop-sidebar material start -->
                        <div class="shop-sidebar material">
                            <h6 class="font-18">Material</h6>
                            <div class="shop-header d-flex justify-content-between mst-21">
                                <span class="shop-selected">1 selected</span>
                                <button type="submit"
                                    class="shop-reset body-secondary-color text-decoration-underline">Reset</button>
                            </div>
                            <div class="shop-element mst-26">
                                <ul class="shop-filters ul-mt5">
                                    <li>
                                        <label class="cust-checkbox-label">
                                            <input type="checkbox" id="shop-polyester" name="shop-polyester"
                                                class="cust-checkbox" value="polyester" checked>
                                            <span class="d-block cust-check">Polyester</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="cust-checkbox-label">
                                            <input type="checkbox" id="shop-wool-blend" name="shop-wool-blend"
                                                class="cust-checkbox" value="wool-blend">
                                            <span class="d-block cust-check">Wool blend</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="cust-checkbox-label">
                                            <input type="checkbox" id="shop-cotton" name="shop-cotton"
                                                class="cust-checkbox" value="cotton">
                                            <span class="d-block cust-check">Cotton</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="cust-checkbox-label">
                                            <input type="checkbox" id="shop-linen-blend" name="shop-linen-blend"
                                                class="cust-checkbox" value="linen-blend">
                                            <span class="d-block cust-check">Linen blend</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="cust-checkbox-label">
                                            <input type="checkbox" id="shop-viscose" name="shop-viscose"
                                                class="cust-checkbox" value="viscose">
                                            <span class="d-block cust-check">Outdoor</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="cust-checkbox-label">
                                            <input type="checkbox" id="shop-stretch-denim" name="shop-stretch-denim"
                                                class="cust-checkbox" value="stretch-denim">
                                            <span class="d-block cust-check">Stretch denim</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="cust-checkbox-label">
                                            <input type="checkbox" id="shop-kids-polyester-faux"
                                                name="shop-kids-polyester-faux" class="cust-checkbox"
                                                value="kids-polyester-faux">
                                            <span class="d-block cust-check">Polyester faux</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="cust-checkbox-label">
                                            <input type="checkbox" id="shop-leather-mesh" name="shop-leather-mesh"
                                                class="cust-checkbox" value="leather-mesh">
                                            <span class="d-block cust-check">Leather mesh</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="cust-checkbox-label">
                                            <input type="checkbox" id="shop-faux-leather" name="shop-faux-leather"
                                                class="cust-checkbox" value="faux-leather">
                                            <span class="d-block cust-check">Faux leather</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="cust-checkbox-label">
                                            <input type="checkbox" id="shop-nylon-spandex" name="shop-nylon-spandex"
                                                class="cust-checkbox" value="nylon-spandex">
                                            <span class="d-block cust-check">Nylon spandex</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="cust-checkbox-label">
                                            <input type="checkbox" id="shop-cotton-fleece" name="shop-cotton-fleece"
                                                class="cust-checkbox" value="cotton-fleece">
                                            <span class="d-block cust-check">Cotton fleece</span>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- shop-sidebar material end -->
                        <!-- shop-sidebar tag start -->
                        <div class="shop-sidebar tag">
                            <h6 class="font-18">Tag</h6>
                            <div class="shop-header d-flex justify-content-between mst-21">
                                <span class="shop-selected">1 selected</span>
                                <button type="submit"
                                    class="shop-reset body-secondary-color text-decoration-underline">Reset</button>
                            </div>
                            <div class="shop-element mst-26">
                                <ul class="shop-filters ul-mt5">
                                    <li>
                                        <label class="cust-checkbox-label">
                                            <input type="checkbox" id="shop-chic" name="shop-chic" class="cust-checkbox"
                                                value="chic" checked>
                                            <span class="d-block cust-check">Chic</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="cust-checkbox-label">
                                            <input type="checkbox" id="shop-business" name="shop-business"
                                                class="cust-checkbox" value="business">
                                            <span class="d-block cust-check">Business</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="cust-checkbox-label">
                                            <input type="checkbox" id="shop-playful" name="shop-playful"
                                                class="cust-checkbox" value="playful">
                                            <span class="d-block cust-check">Playful</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="cust-checkbox-label">
                                            <input type="checkbox" id="shop-casual" name="shop-casual"
                                                class="cust-checkbox" value="casual">
                                            <span class="d-block cust-check">Casual</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="cust-checkbox-label">
                                            <input type="checkbox" id="shop-formal" name="shop-formal"
                                                class="cust-checkbox" value="formal">
                                            <span class="d-block cust-check">Formal</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="cust-checkbox-label">
                                            <input type="checkbox" id="shop-sleeveless" name="shop-sleeveless"
                                                class="cust-checkbox" value="sleeveless">
                                            <span class="d-block cust-check">Sleeveless</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="cust-checkbox-label">
                                            <input type="checkbox" id="shop-rugged" name="shop-rugged"
                                                class="cust-checkbox" value="rugged">
                                            <span class="d-block cust-check">Rugged</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="cust-checkbox-label">
                                            <input type="checkbox" id="shop-winter" name="shop-winter"
                                                class="cust-checkbox" value="winter">
                                            <span class="d-block cust-check">Winter</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="cust-checkbox-label">
                                            <input type="checkbox" id="shop-sporty" name="shop-sporty"
                                                class="cust-checkbox" value="sporty">
                                            <span class="d-block cust-check">Sporty</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="cust-checkbox-label">
                                            <input type="checkbox" id="shop-compact" name="shop-compact"
                                                class="cust-checkbox" value="compact">
                                            <span class="d-block cust-check">Compact</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="cust-checkbox-label">
                                            <input type="checkbox" id="shop-gymwear" name="shop-gymwear"
                                                class="cust-checkbox" value="gymwear">
                                            <span class="d-block cust-check">Gymwear</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="cust-checkbox-label">
                                            <input type="checkbox" id="shop-cozy" name="shop-cozy" class="cust-checkbox"
                                                value="cozy">
                                            <span class="d-block cust-check">Cozy</span>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- shop-sidebar tag end -->
                    </form>
                </div>
                <!-- shop-sidebar end -->
                <!-- collection-info start -->
                <div class="row row-mtm" data-animate="animate__fadeIn">
                    <div class="col-12">
                        <div class="row row-mtm15">
                            <!-- collection-title start -->
                            <div class="collection-title">
                                <h6 class="font-18">Collection without (12)</h6>
                            </div>
                            <!-- collection-title end -->
                            <!-- collection-img start -->
                            <div class="collection-img">
                                <img src="{{ asset('frontend') }}/assets/image/collection/collection-banner.jpg"
                                    class="w-100 img-fluid border-radius" alt="collection-banner">
                            </div>
                            <!-- collection-img end -->
                            <!-- shop-top-bar start -->
                            <div class="shop-top-bar">
                                <div class="row row-mtm15 align-items-md-center">
                                    <div class="col-12 col-sm-6 col-md-7 col-lg-8 col-xl-9">
                                        <div class="shop-filter-view ul-mt15 align-items-center">
                                            <!-- shop-filter start -->
                                            <div class="shop-filter">
                                                <button type="button"
                                                    class="shop-filter-btn secondary-color d-flex align-items-center"><i
                                                        class="ri-filter-line icon-16 mer-5"></i>Filter</button>
                                            </div>
                                            <!-- shop-filter end -->
                                            <!-- shop-view-mode start -->
                                            <div class="shop-view-mode">
                                                <div class="ul-mt10">
                                                    <button type="button"
                                                        class="shop-view-btn primary-color icon-16 opacity-100 disabled"
                                                        data-view="grid" aria-label="Grid view"><i
                                                            class="ri-layout-grid-line"></i></button>
                                                    <button type="button"
                                                        class="shop-view-btn body-color icon-16 opacity-100"
                                                        data-view="list" aria-label="List view"><i
                                                            class="ri-list-unordered"></i></button>
                                                </div>
                                            </div>
                                            <!-- shop-view-mode end -->
                                            <!-- shop-show-product start -->
                                            <div class="shop-show-product">Showing 12 of 12 products</div>
                                            <!-- shop-show-product end -->
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-5 col-lg-4 col-xl-3">
                                        <!-- shop-short start -->
                                        <div class="shop-short d-flex flex-wrap position-relative">
                                            <label for="sortby" class="width-64 secondary-color heading-weight">Sort
                                                by:</label>
                                            <select id="sortby" name="sortby"
                                                class="d-xl-none width-calc-64 h-auto ptb-0 bg-transparent border-0">
                                                <option value="manual">Featured</option>
                                                <option value="best-selling">Best selling</option>
                                                <option value="title-ascending" selected>Alphabetically, A-Z</option>
                                                <option value="title-descending">Alphabetically, Z-A</option>
                                                <option value="price-ascending">Price, low to high</option>
                                                <option value="price-descending">Price, high to low</option>
                                                <option value="created-descending">Date, new to old</option>
                                                <option value="created-ascending">Date, old to new</option>
                                            </select>
                                            <a href="javascript:void(0)"
                                                class="short-title width-calc-64 body-color d-none d-xl-flex align-items-xl-start justify-content-xl-between">
                                                <span class="sort-title">Alphabetically, A-Z</span>
                                                <span class="sort-icon heading-weight"><i
                                                        class="ri-arrow-down-s-line d-block lh-1"></i></span>
                                            </a>
                                            <ul class="collapse position-absolute top-100 start-0 end-0 ptb-5 body-bg z-1 DropDownSlide br-hidden box-shadow"
                                                id="select-wrap">
                                                <li><a href="javascript:void(0)" data-value="manual"
                                                        class="d-block body-primary-color ptb-5 plr-15">Featured</a></li>
                                                <li><a href="javascript:void(0)" data-value="best-selling"
                                                        class="d-block body-primary-color ptb-5 plr-15">Best selling</a>
                                                </li>
                                                <li class="selected"><a href="javascript:void(0)"
                                                        data-value="title-ascending"
                                                        class="d-block secondary-color ptb-5 plr-15 extra-bg">Alphabetically,
                                                        A-Z</a></li>
                                                <li><a href="javascript:void(0)" data-value="title-descending"
                                                        class="d-block body-primary-color ptb-5 plr-15">Alphabetically,
                                                        Z-A</a></li>
                                                <li><a href="javascript:void(0)" data-value="price-ascending"
                                                        class="d-block body-primary-color ptb-5 plr-15">Price, low to
                                                        high</a></li>
                                                <li><a href="javascript:void(0)" data-value="price-descending"
                                                        class="d-block body-primary-color ptb-5 plr-15">Price, high to
                                                        low</a></li>
                                                <li><a href="javascript:void(0)" data-value="created-descending"
                                                        class="d-block body-primary-color ptb-5 plr-15">Date, new to
                                                        old</a></li>
                                                <li><a href="javascript:void(0)" data-value="created-ascending"
                                                        class="d-block body-primary-color ptb-5 plr-15">Date, old to
                                                        new</a></li>
                                            </ul>
                                        </div>
                                        <!-- shop-short end -->
                                    </div>
                                </div>
                            </div>
                            <!-- shop-top-bar end -->
                            <!-- shop-border start -->
                            <div class="shop-border">
                                <div class="bst"></div>
                            </div>
                            <!-- shop-border end -->
                            <!-- shop-filter-list start -->
                            <div class="shop-filter-list d-flex align-items-start justify-content-between">
                                <ul class="shop-filter-ul ul-mt5 align-items-center">
                                    <li class="shop-filter-li"><a href="javascript:void(0)"
                                            class="shop-filter-active text-white font-14 d-flex align-items-center secondary-bg ptb-5 plr-15 border-radius">Out
                                            of stock<i class="ri-close-large-line d-block font-10 lh-1"></i></a></li>
                                    <li class="shop-filter-li"><a href="javascript:void(0)"
                                            class="shop-filter-active text-white font-14 d-flex align-items-center secondary-bg ptb-5 plr-15 border-radius">In
                                            stock<i class="ri-close-large-line d-block font-10 lh-1"></i></a></li>
                                    <li class="shop-filter-li"><a href="javascript:void(0)"
                                            class="shop-filter-active text-white font-14 d-flex align-items-center secondary-bg ptb-5 plr-15 border-radius">Aliceblue<i
                                                class="ri-close-large-line d-block font-10 lh-1"></i></a></li>
                                    <li class="shop-filter-li"><a href="javascript:void(0)"
                                            class="shop-filter-active text-white font-14 d-flex align-items-center secondary-bg ptb-5 plr-15 border-radius">XS<i
                                                class="ri-close-large-line d-block font-10 lh-1"></i></a></li>
                                    <li class="shop-filter-li"><a href="javascript:void(0)"
                                            class="shop-filter-active text-white font-14 d-flex align-items-center secondary-bg ptb-5 plr-15 border-radius">Polyester<i
                                                class="ri-close-large-line d-block font-10 lh-1"></i></a></li>
                                    <li class="shop-filter-li"><a href="javascript:void(0)"
                                            class="shop-filter-active text-white font-14 d-flex align-items-center secondary-bg ptb-5 plr-15 border-radius">Chic<i
                                                class="ri-close-large-line d-block font-10 lh-1"></i></a></li>
                                    <li class="shop-filter-li"><button type="submit"
                                            class="shop-filter-active text-decoration-underline">Clear all</button></li>
                                </ul>
                                <div class="shop-filter-loader"><svg aria-hidden="true" focusable="false"
                                        role="presentation" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
                                        <circle fill="none" stroke="var(--heading-font-color)" stroke-width="3"
                                            cx="33" cy="33" r="30"></circle>
                                    </svg></div>
                            </div>
                            <!-- shop-filter-list end -->
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="shop-product-wrap data-grid">
                            <!-- shop-grid start -->
                            <div class="row row-mtm">
                                <div class="col-6 col-md-4 col-xl-3 shop-col" data-animate="animate__fadeIn">
                                    <div class="single-product">
                                        <div class="row single-product-wrap">
                                            <div class="product-image-col">
                                                <div class="product-image">
                                                    <a href="product.html" class="pro-img">
                                                        <img src="{{ asset('frontend') }}/assets/image/product/p-1.jpg"
                                                            class="w-100 img-fluid img1" alt="p-1">
                                                        <img src="{{ asset('frontend') }}/assets/image/product/p-2.jpg"
                                                            class="w-100 img-fluid img2" alt="p-2">
                                                    </a>
                                                    <div class="product-action-wrap">
                                                        <div class="product-action">
                                                            <a href="javascript:void(0)" class="add-to-wishlist">
                                                                <span class="product-icon"><i
                                                                        class="ri-heart-line d-block icon-16 lh-1"></i></span>
                                                                <span class="tooltip-text">wishlist</span>
                                                            </a>
                                                            <a href="javascript:void(0)" class="add-to-cart">
                                                                <span class="product-icon">
                                                                    <span class="product-bag-icon icon-16"><i
                                                                            class="ri-shopping-bag-3-line d-block lh-1"></i></span>
                                                                    <span class="product-loader-icon icon-16"><i
                                                                            class="ri-loader-4-line d-block lh-1"></i></span>
                                                                    <span class="product-check-icon icon-16"><i
                                                                            class="ri-check-line d-block lh-1"></i></span>
                                                                </span>
                                                                <span class="tooltip-text">add to cart</span>
                                                            </a>
                                                            <a href="#quickview-modal" data-bs-toggle="modal"
                                                                class="quick-view">
                                                                <span class="product-icon"><i
                                                                        class="ri-eye-line d-block icon-16 lh-1"></i></span>
                                                                <span class="tooltip-text">quickview</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <div class="pro-content">
                                                    <div class="product-title">
                                                        <span class="d-block meb-7">Polyester / Chic</span>
                                                        <span class="d-block heading-weight"><a href="product.html"
                                                                class="primary-link">Pleated skater skirt</a></span>
                                                    </div>
                                                    <div class="product-price">
                                                        <div class="price-box heading-weight">
                                                            <span class="new-price primary-color">$79.00</span>
                                                            <span class="old-price"><span class="mer-3">~</span><span
                                                                    class="text-decoration-line-through">$89.00</span></span>
                                                        </div>
                                                    </div>
                                                    <div class="product-ratting">
                                                        <span class="review-ratting">
                                                            <span class="review-star">
                                                                <i class="ri-star-fill"></i>
                                                                <i class="ri-star-fill"></i>
                                                                <i class="ri-star-fill"></i>
                                                                <i class="ri-star-fill"></i>
                                                                <i class="ri-star-line"></i>
                                                            </span>
                                                            <span class="review-average">4.0<span class="review-caption">2
                                                                    reviews</span></span>
                                                        </span>
                                                    </div>
                                                    <div class="product-description">
                                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                            industry It is a long established fact that a will be distracted
                                                            by the readable of at</p>
                                                    </div>
                                                    <div class="product-action-wrap">
                                                        <div class="product-action">
                                                            <a href="javascript:void(0)" class="add-to-wishlist">
                                                                <span class="product-icon"><i
                                                                        class="ri-heart-line d-block icon-16 lh-1"></i></span>
                                                                <span class="tooltip-text">wishlist</span>
                                                            </a>
                                                            <a href="javascript:void(0)" class="add-to-cart">
                                                                <span class="product-icon">
                                                                    <span class="product-bag-icon icon-16"><i
                                                                            class="ri-shopping-bag-3-line d-block lh-1"></i></span>
                                                                    <span class="product-loader-icon icon-16"><i
                                                                            class="ri-loader-4-line d-block lh-1"></i></span>
                                                                    <span class="product-check-icon icon-16"><i
                                                                            class="ri-check-line d-block lh-1"></i></span>
                                                                </span>
                                                                <span class="tooltip-text">add to cart</span>
                                                            </a>
                                                            <a href="#quickview-modal" data-bs-toggle="modal"
                                                                class="quick-view">
                                                                <span class="product-icon"><i
                                                                        class="ri-eye-line d-block icon-16 lh-1"></i></span>
                                                                <span class="tooltip-text">quickview</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4 col-xl-3 shop-col" data-animate="animate__fadeIn">
                                    <div class="single-product">
                                        <div class="row single-product-wrap">
                                            <div class="product-image-col">
                                                <div class="product-image">
                                                    <a href="product.html" class="pro-img">
                                                        <img src="{{ asset('frontend') }}/assets/image/product/p-3.jpg"
                                                            class="w-100 img-fluid img1" alt="p-3">
                                                        <img src="{{ asset('frontend') }}/assets/image/product/p-4.jpg"
                                                            class="w-100 img-fluid img2" alt="p-4">
                                                        <span
                                                            class="product-label product-label-new product-label-left">New</span>
                                                    </a>
                                                    <div class="product-action-wrap">
                                                        <div class="product-action">
                                                            <a href="javascript:void(0)" class="add-to-wishlist">
                                                                <span class="product-icon"><i
                                                                        class="ri-heart-line d-block icon-16 lh-1"></i></span>
                                                                <span class="tooltip-text">wishlist</span>
                                                            </a>
                                                            <a href="javascript:void(0)" class="add-to-cart">
                                                                <span class="product-icon">
                                                                    <span class="product-bag-icon icon-16"><i
                                                                            class="ri-shopping-bag-3-line d-block lh-1"></i></span>
                                                                    <span class="product-loader-icon icon-16"><i
                                                                            class="ri-loader-4-line d-block lh-1"></i></span>
                                                                    <span class="product-check-icon icon-16"><i
                                                                            class="ri-check-line d-block lh-1"></i></span>
                                                                </span>
                                                                <span class="tooltip-text">add to cart</span>
                                                            </a>
                                                            <a href="#quickview-modal" data-bs-toggle="modal"
                                                                class="quick-view">
                                                                <span class="product-icon"><i
                                                                        class="ri-eye-line d-block icon-16 lh-1"></i></span>
                                                                <span class="tooltip-text">quickview</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <div class="pro-content">
                                                    <div class="product-title">
                                                        <span class="d-block meb-7">Wool blend / Business</span>
                                                        <span class="d-block heading-weight"><a href="product.html"
                                                                class="primary-link">Tailored blazer jacket</a></span>
                                                    </div>
                                                    <div class="product-price">
                                                        <div class="price-box heading-weight">
                                                            <span class="new-price primary-color">$49.00</span>
                                                            <span class="old-price"><span class="mer-3">~</span><span
                                                                    class="text-decoration-line-through">$59.00</span></span>
                                                        </div>
                                                    </div>
                                                    <div class="product-ratting">
                                                        <span class="review-ratting">
                                                            <span class="review-star">
                                                                <i class="ri-star-line"></i>
                                                                <i class="ri-star-line"></i>
                                                                <i class="ri-star-line"></i>
                                                                <i class="ri-star-line"></i>
                                                                <i class="ri-star-line"></i>
                                                            </span>
                                                            <span class="review-average">No reviews<span
                                                                    class="review-caption">0 reviews</span></span>
                                                        </span>
                                                    </div>
                                                    <div class="product-description">
                                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                            industry It is a long established fact that a will be distracted
                                                            by the readable of at</p>
                                                    </div>
                                                    <div class="product-action-wrap">
                                                        <div class="product-action">
                                                            <a href="javascript:void(0)" class="add-to-wishlist">
                                                                <span class="product-icon"><i
                                                                        class="ri-heart-line d-block icon-16 lh-1"></i></span>
                                                                <span class="tooltip-text">wishlist</span>
                                                            </a>
                                                            <a href="javascript:void(0)" class="add-to-cart">
                                                                <span class="product-icon">
                                                                    <span class="product-bag-icon icon-16"><i
                                                                            class="ri-shopping-bag-3-line d-block lh-1"></i></span>
                                                                    <span class="product-loader-icon icon-16"><i
                                                                            class="ri-loader-4-line d-block lh-1"></i></span>
                                                                    <span class="product-check-icon icon-16"><i
                                                                            class="ri-check-line d-block lh-1"></i></span>
                                                                </span>
                                                                <span class="tooltip-text">add to cart</span>
                                                            </a>
                                                            <a href="#quickview-modal" data-bs-toggle="modal"
                                                                class="quick-view">
                                                                <span class="product-icon"><i
                                                                        class="ri-eye-line d-block icon-16 lh-1"></i></span>
                                                                <span class="tooltip-text">quickview</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4 col-xl-3 shop-col" data-animate="animate__fadeIn">
                                    <div class="single-product">
                                        <div class="row single-product-wrap">
                                            <div class="product-image-col">
                                                <div class="product-image">
                                                    <a href="product.html" class="pro-img">
                                                        <img src="{{ asset('frontend') }}/assets/image/product/p-5.jpg"
                                                            class="w-100 img-fluid img1" alt="p-5">
                                                        <img src="{{ asset('frontend') }}/assets/image/product/p-6.jpg"
                                                            class="w-100 img-fluid img2" alt="p-6">
                                                    </a>
                                                    <div class="product-action-wrap">
                                                        <div class="product-action">
                                                            <a href="javascript:void(0)" class="add-to-wishlist">
                                                                <span class="product-icon"><i
                                                                        class="ri-heart-line d-block icon-16 lh-1"></i></span>
                                                                <span class="tooltip-text">wishlist</span>
                                                            </a>
                                                            <a href="javascript:void(0)" class="add-to-cart">
                                                                <span class="product-icon">
                                                                    <span class="product-bag-icon icon-16"><i
                                                                            class="ri-shopping-bag-3-line d-block lh-1"></i></span>
                                                                    <span class="product-loader-icon icon-16"><i
                                                                            class="ri-loader-4-line d-block lh-1"></i></span>
                                                                    <span class="product-check-icon icon-16"><i
                                                                            class="ri-check-line d-block lh-1"></i></span>
                                                                </span>
                                                                <span class="tooltip-text">add to cart</span>
                                                            </a>
                                                            <a href="#quickview-modal" data-bs-toggle="modal"
                                                                class="quick-view">
                                                                <span class="product-icon"><i
                                                                        class="ri-eye-line d-block icon-16 lh-1"></i></span>
                                                                <span class="tooltip-text">quickview</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <div class="pro-content">
                                                    <div class="product-title">
                                                        <span class="d-block meb-7">Cotton / Playful</span>
                                                        <span class="d-block heading-weight"><a href="product.html"
                                                                class="primary-link">Girls floral ruffle top</a></span>
                                                    </div>
                                                    <div class="product-price">
                                                        <div class="price-box heading-weight">
                                                            <span class="new-price primary-color">$69.00</span>
                                                            <span class="old-price"><span class="mer-3">~</span><span
                                                                    class="text-decoration-line-through">$79.00</span></span>
                                                        </div>
                                                    </div>
                                                    <div class="product-ratting">
                                                        <span class="review-ratting">
                                                            <span class="review-star">
                                                                <i class="ri-star-line"></i>
                                                                <i class="ri-star-line"></i>
                                                                <i class="ri-star-line"></i>
                                                                <i class="ri-star-line"></i>
                                                                <i class="ri-star-line"></i>
                                                            </span>
                                                            <span class="review-average">No reviews<span
                                                                    class="review-caption">0 reviews</span></span>
                                                        </span>
                                                    </div>
                                                    <div class="product-description">
                                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                            industry It is a long established fact that a will be distracted
                                                            by the readable of at</p>
                                                    </div>
                                                    <div class="product-action-wrap">
                                                        <div class="product-action">
                                                            <a href="javascript:void(0)" class="add-to-wishlist">
                                                                <span class="product-icon"><i
                                                                        class="ri-heart-line d-block icon-16 lh-1"></i></span>
                                                                <span class="tooltip-text">wishlist</span>
                                                            </a>
                                                            <a href="javascript:void(0)" class="add-to-cart">
                                                                <span class="product-icon">
                                                                    <span class="product-bag-icon icon-16"><i
                                                                            class="ri-shopping-bag-3-line d-block lh-1"></i></span>
                                                                    <span class="product-loader-icon icon-16"><i
                                                                            class="ri-loader-4-line d-block lh-1"></i></span>
                                                                    <span class="product-check-icon icon-16"><i
                                                                            class="ri-check-line d-block lh-1"></i></span>
                                                                </span>
                                                                <span class="tooltip-text">add to cart</span>
                                                            </a>
                                                            <a href="#quickview-modal" data-bs-toggle="modal"
                                                                class="quick-view">
                                                                <span class="product-icon"><i
                                                                        class="ri-eye-line d-block icon-16 lh-1"></i></span>
                                                                <span class="tooltip-text">quickview</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4 col-xl-3 shop-col" data-animate="animate__fadeIn">
                                    <div class="single-product">
                                        <div class="row single-product-wrap">
                                            <div class="product-image-col">
                                                <div class="product-image">
                                                    <a href="product.html" class="pro-img">
                                                        <img src="{{ asset('frontend') }}/assets/image/product/p-7.jpg"
                                                            class="w-100 img-fluid img1" alt="p-7">
                                                        <img src="{{ asset('frontend') }}/assets/image/product/p-8.jpg"
                                                            class="w-100 img-fluid img2" alt="p-8">
                                                        <span
                                                            class="product-label product-label-discount product-label-left">5%
                                                            Off</span>
                                                    </a>
                                                    <div class="product-action-wrap">
                                                        <div class="product-action">
                                                            <a href="javascript:void(0)" class="add-to-wishlist">
                                                                <span class="product-icon"><i
                                                                        class="ri-heart-line d-block icon-16 lh-1"></i></span>
                                                                <span class="tooltip-text">wishlist</span>
                                                            </a>
                                                            <a href="javascript:void(0)" class="add-to-cart">
                                                                <span class="product-icon">
                                                                    <span class="product-bag-icon icon-16"><i
                                                                            class="ri-shopping-bag-3-line d-block lh-1"></i></span>
                                                                    <span class="product-loader-icon icon-16"><i
                                                                            class="ri-loader-4-line d-block lh-1"></i></span>
                                                                    <span class="product-check-icon icon-16"><i
                                                                            class="ri-check-line d-block lh-1"></i></span>
                                                                </span>
                                                                <span class="tooltip-text">add to cart</span>
                                                            </a>
                                                            <a href="#quickview-modal" data-bs-toggle="modal"
                                                                class="quick-view">
                                                                <span class="product-icon"><i
                                                                        class="ri-eye-line d-block icon-16 lh-1"></i></span>
                                                                <span class="tooltip-text">quickview</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <div class="pro-content">
                                                    <div class="product-title">
                                                        <span class="d-block meb-7">Cotton / Casual</span>
                                                        <span class="d-block heading-weight"><a href="product.html"
                                                                class="primary-link">Classic cotton t-shirt</a></span>
                                                    </div>
                                                    <div class="product-price">
                                                        <div class="price-box heading-weight">
                                                            <span class="new-price primary-color">$49.00</span>
                                                            <span class="old-price"><span class="mer-3">~</span><span
                                                                    class="text-decoration-line-through">$54.00</span></span>
                                                        </div>
                                                    </div>
                                                    <div class="product-ratting">
                                                        <span class="review-ratting">
                                                            <span class="review-star">
                                                                <i class="ri-star-line"></i>
                                                                <i class="ri-star-line"></i>
                                                                <i class="ri-star-line"></i>
                                                                <i class="ri-star-line"></i>
                                                                <i class="ri-star-line"></i>
                                                            </span>
                                                            <span class="review-average">No reviews<span
                                                                    class="review-caption">0 reviews</span></span>
                                                        </span>
                                                    </div>
                                                    <div class="product-description">
                                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                            industry It is a long established fact that a will be distracted
                                                            by the readable of at</p>
                                                    </div>
                                                    <div class="product-action-wrap">
                                                        <div class="product-action">
                                                            <a href="javascript:void(0)" class="add-to-wishlist">
                                                                <span class="product-icon"><i
                                                                        class="ri-heart-line d-block icon-16 lh-1"></i></span>
                                                                <span class="tooltip-text">wishlist</span>
                                                            </a>
                                                            <a href="javascript:void(0)" class="add-to-cart">
                                                                <span class="product-icon">
                                                                    <span class="product-bag-icon icon-16"><i
                                                                            class="ri-shopping-bag-3-line d-block lh-1"></i></span>
                                                                    <span class="product-loader-icon icon-16"><i
                                                                            class="ri-loader-4-line d-block lh-1"></i></span>
                                                                    <span class="product-check-icon icon-16"><i
                                                                            class="ri-check-line d-block lh-1"></i></span>
                                                                </span>
                                                                <span class="tooltip-text">add to cart</span>
                                                            </a>
                                                            <a href="#quickview-modal" data-bs-toggle="modal"
                                                                class="quick-view">
                                                                <span class="product-icon"><i
                                                                        class="ri-eye-line d-block icon-16 lh-1"></i></span>
                                                                <span class="tooltip-text">quickview</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4 col-xl-3 shop-col" data-animate="animate__fadeIn">
                                    <div class="single-product">
                                        <div class="row single-product-wrap">
                                            <div class="product-image-col">
                                                <div class="product-image">
                                                    <a href="product.html" class="pro-img">
                                                        <img src="{{ asset('frontend') }}/assets/image/product/p-9.jpg"
                                                            class="w-100 img-fluid img1" alt="p-9">
                                                        <img src="{{ asset('frontend') }}/assets/image/product/p-10.jpg"
                                                            class="w-100 img-fluid img2" alt="p-10">
                                                    </a>
                                                    <div class="product-action-wrap">
                                                        <div class="product-action">
                                                            <a href="javascript:void(0)" class="add-to-wishlist">
                                                                <span class="product-icon"><i
                                                                        class="ri-heart-line d-block icon-16 lh-1"></i></span>
                                                                <span class="tooltip-text">wishlist</span>
                                                            </a>
                                                            <a href="javascript:void(0)" class="add-to-cart">
                                                                <span class="product-icon">
                                                                    <span class="product-bag-icon icon-16"><i
                                                                            class="ri-shopping-bag-3-line d-block lh-1"></i></span>
                                                                    <span class="product-loader-icon icon-16"><i
                                                                            class="ri-loader-4-line d-block lh-1"></i></span>
                                                                    <span class="product-check-icon icon-16"><i
                                                                            class="ri-check-line d-block lh-1"></i></span>
                                                                </span>
                                                                <span class="tooltip-text">add to cart</span>
                                                            </a>
                                                            <a href="#quickview-modal" data-bs-toggle="modal"
                                                                class="quick-view">
                                                                <span class="product-icon"><i
                                                                        class="ri-eye-line d-block icon-16 lh-1"></i></span>
                                                                <span class="tooltip-text">quickview</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <div class="pro-content">
                                                    <div class="product-title">
                                                        <span class="d-block meb-7">Linen blend / formal</span>
                                                        <span class="d-block heading-weight"><a href="product.html"
                                                                class="primary-link">Slim fit linen shirt</a></span>
                                                    </div>
                                                    <div class="product-price">
                                                        <div class="price-box heading-weight">
                                                            <span class="new-price primary-color">$89.00</span>
                                                            <span class="old-price"><span class="mer-3">~</span><span
                                                                    class="text-decoration-line-through">$99.00</span></span>
                                                        </div>
                                                    </div>
                                                    <div class="product-ratting">
                                                        <span class="review-ratting">
                                                            <span class="review-star">
                                                                <i class="ri-star-line"></i>
                                                                <i class="ri-star-line"></i>
                                                                <i class="ri-star-line"></i>
                                                                <i class="ri-star-line"></i>
                                                                <i class="ri-star-line"></i>
                                                            </span>
                                                            <span class="review-average">No reviews<span
                                                                    class="review-caption">0 reviews</span></span>
                                                        </span>
                                                    </div>
                                                    <div class="product-description">
                                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                            industry It is a long established fact that a will be distracted
                                                            by the readable of at</p>
                                                    </div>
                                                    <div class="product-action-wrap">
                                                        <div class="product-action">
                                                            <a href="javascript:void(0)" class="add-to-wishlist">
                                                                <span class="product-icon"><i
                                                                        class="ri-heart-line d-block icon-16 lh-1"></i></span>
                                                                <span class="tooltip-text">wishlist</span>
                                                            </a>
                                                            <a href="javascript:void(0)" class="add-to-cart">
                                                                <span class="product-icon">
                                                                    <span class="product-bag-icon icon-16"><i
                                                                            class="ri-shopping-bag-3-line d-block lh-1"></i></span>
                                                                    <span class="product-loader-icon icon-16"><i
                                                                            class="ri-loader-4-line d-block lh-1"></i></span>
                                                                    <span class="product-check-icon icon-16"><i
                                                                            class="ri-check-line d-block lh-1"></i></span>
                                                                </span>
                                                                <span class="tooltip-text">add to cart</span>
                                                            </a>
                                                            <a href="#quickview-modal" data-bs-toggle="modal"
                                                                class="quick-view">
                                                                <span class="product-icon"><i
                                                                        class="ri-eye-line d-block icon-16 lh-1"></i></span>
                                                                <span class="tooltip-text">quickview</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4 col-xl-3 shop-col" data-animate="animate__fadeIn">
                                    <div class="single-product">
                                        <div class="row single-product-wrap">
                                            <div class="product-image-col">
                                                <div class="product-image">
                                                    <a href="product.html" class="pro-img">
                                                        <img src="{{ asset('frontend') }}/assets/image/product/p-11.jpg"
                                                            class="w-100 img-fluid img1" alt="p-11">
                                                        <img src="{{ asset('frontend') }}/assets/image/product/p-12.jpg"
                                                            class="w-100 img-fluid img2" alt="p-12">
                                                        <span
                                                            class="product-label product-label-sale product-label-left">Sale</span>
                                                    </a>
                                                    <div class="product-action-wrap">
                                                        <div class="product-action">
                                                            <a href="javascript:void(0)" class="add-to-wishlist">
                                                                <span class="product-icon"><i
                                                                        class="ri-heart-line d-block icon-16 lh-1"></i></span>
                                                                <span class="tooltip-text">wishlist</span>
                                                            </a>
                                                            <a href="javascript:void(0)" class="add-to-cart">
                                                                <span class="product-icon">
                                                                    <span class="product-bag-icon icon-16"><i
                                                                            class="ri-shopping-bag-3-line d-block lh-1"></i></span>
                                                                    <span class="product-loader-icon icon-16"><i
                                                                            class="ri-loader-4-line d-block lh-1"></i></span>
                                                                    <span class="product-check-icon icon-16"><i
                                                                            class="ri-check-line d-block lh-1"></i></span>
                                                                </span>
                                                                <span class="tooltip-text">add to cart</span>
                                                            </a>
                                                            <a href="#quickview-modal" data-bs-toggle="modal"
                                                                class="quick-view">
                                                                <span class="product-icon"><i
                                                                        class="ri-eye-line d-block icon-16 lh-1"></i></span>
                                                                <span class="tooltip-text">quickview</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <div class="pro-content">
                                                    <div class="product-title">
                                                        <span class="d-block meb-7">Viscose / Sleeveless</span>
                                                        <span class="d-block heading-weight"><a href="product.html"
                                                                class="primary-link">Flowy midi dress</a></span>
                                                    </div>
                                                    <div class="product-price">
                                                        <div class="price-box heading-weight">
                                                            <span class="new-price primary-color">$79.00</span>
                                                            <span class="old-price"><span class="mer-3">~</span><span
                                                                    class="text-decoration-line-through">$84.00</span></span>
                                                        </div>
                                                    </div>
                                                    <div class="product-ratting">
                                                        <span class="review-ratting">
                                                            <span class="review-star">
                                                                <i class="ri-star-line"></i>
                                                                <i class="ri-star-line"></i>
                                                                <i class="ri-star-line"></i>
                                                                <i class="ri-star-line"></i>
                                                                <i class="ri-star-line"></i>
                                                            </span>
                                                            <span class="review-average">No reviews<span
                                                                    class="review-caption">0 reviews</span></span>
                                                        </span>
                                                    </div>
                                                    <div class="product-description">
                                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                            industry It is a long established fact that a will be distracted
                                                            by the readable of at</p>
                                                    </div>
                                                    <div class="product-action-wrap">
                                                        <div class="product-action">
                                                            <a href="javascript:void(0)" class="add-to-wishlist">
                                                                <span class="product-icon"><i
                                                                        class="ri-heart-line d-block icon-16 lh-1"></i></span>
                                                                <span class="tooltip-text">wishlist</span>
                                                            </a>
                                                            <a href="javascript:void(0)" class="add-to-cart">
                                                                <span class="product-icon">
                                                                    <span class="product-bag-icon icon-16"><i
                                                                            class="ri-shopping-bag-3-line d-block lh-1"></i></span>
                                                                    <span class="product-loader-icon icon-16"><i
                                                                            class="ri-loader-4-line d-block lh-1"></i></span>
                                                                    <span class="product-check-icon icon-16"><i
                                                                            class="ri-check-line d-block lh-1"></i></span>
                                                                </span>
                                                                <span class="tooltip-text">add to cart</span>
                                                            </a>
                                                            <a href="#quickview-modal" data-bs-toggle="modal"
                                                                class="quick-view">
                                                                <span class="product-icon"><i
                                                                        class="ri-eye-line d-block icon-16 lh-1"></i></span>
                                                                <span class="tooltip-text">quickview</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4 col-xl-3 shop-col" data-animate="animate__fadeIn">
                                    <div class="single-product">
                                        <div class="row single-product-wrap">
                                            <div class="product-image-col">
                                                <div class="product-image">
                                                    <a href="product.html" class="pro-img">
                                                        <img src="{{ asset('frontend') }}/assets/image/product/p-13.jpg"
                                                            class="w-100 img-fluid img1" alt="p-13">
                                                        <img src="{{ asset('frontend') }}/assets/image/product/p-14.jpg"
                                                            class="w-100 img-fluid img2" alt="p-14">
                                                    </a>
                                                    <div class="product-action-wrap">
                                                        <div class="product-action">
                                                            <a href="javascript:void(0)" class="add-to-wishlist">
                                                                <span class="product-icon"><i
                                                                        class="ri-heart-line d-block icon-16 lh-1"></i></span>
                                                                <span class="tooltip-text">wishlist</span>
                                                            </a>
                                                            <a href="javascript:void(0)" class="add-to-cart">
                                                                <span class="product-icon">
                                                                    <span class="product-bag-icon icon-16"><i
                                                                            class="ri-shopping-bag-3-line d-block lh-1"></i></span>
                                                                    <span class="product-loader-icon icon-16"><i
                                                                            class="ri-loader-4-line d-block lh-1"></i></span>
                                                                    <span class="product-check-icon icon-16"><i
                                                                            class="ri-check-line d-block lh-1"></i></span>
                                                                </span>
                                                                <span class="tooltip-text">add to cart</span>
                                                            </a>
                                                            <a href="#quickview-modal" data-bs-toggle="modal"
                                                                class="quick-view">
                                                                <span class="product-icon"><i
                                                                        class="ri-eye-line d-block icon-16 lh-1"></i></span>
                                                                <span class="tooltip-text">quickview</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <div class="pro-content">
                                                    <div class="product-title">
                                                        <span class="d-block meb-7">Stretch denim / Rugged</span>
                                                        <span class="d-block heading-weight"><a href="product.html"
                                                                class="primary-link">Distressed skinny jeans</a></span>
                                                    </div>
                                                    <div class="product-price">
                                                        <div class="price-box heading-weight">
                                                            <span class="new-price primary-color">$29.00</span>
                                                            <span class="old-price"><span class="mer-3">~</span><span
                                                                    class="text-decoration-line-through">$39.00</span></span>
                                                        </div>
                                                    </div>
                                                    <div class="product-ratting">
                                                        <span class="review-ratting">
                                                            <span class="review-star">
                                                                <i class="ri-star-line"></i>
                                                                <i class="ri-star-line"></i>
                                                                <i class="ri-star-line"></i>
                                                                <i class="ri-star-line"></i>
                                                                <i class="ri-star-line"></i>
                                                            </span>
                                                            <span class="review-average">No reviews<span
                                                                    class="review-caption">0 reviews</span></span>
                                                        </span>
                                                    </div>
                                                    <div class="product-description">
                                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                            industry It is a long established fact that a will be distracted
                                                            by the readable of at</p>
                                                    </div>
                                                    <div class="product-action-wrap">
                                                        <div class="product-action">
                                                            <a href="javascript:void(0)" class="add-to-wishlist">
                                                                <span class="product-icon"><i
                                                                        class="ri-heart-line d-block icon-16 lh-1"></i></span>
                                                                <span class="tooltip-text">wishlist</span>
                                                            </a>
                                                            <a href="javascript:void(0)" class="add-to-cart">
                                                                <span class="product-icon">
                                                                    <span class="product-bag-icon icon-16"><i
                                                                            class="ri-shopping-bag-3-line d-block lh-1"></i></span>
                                                                    <span class="product-loader-icon icon-16"><i
                                                                            class="ri-loader-4-line d-block lh-1"></i></span>
                                                                    <span class="product-check-icon icon-16"><i
                                                                            class="ri-check-line d-block lh-1"></i></span>
                                                                </span>
                                                                <span class="tooltip-text">add to cart</span>
                                                            </a>
                                                            <a href="#quickview-modal" data-bs-toggle="modal"
                                                                class="quick-view">
                                                                <span class="product-icon"><i
                                                                        class="ri-eye-line d-block icon-16 lh-1"></i></span>
                                                                <span class="tooltip-text">quickview</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4 col-xl-3 shop-col" data-animate="animate__fadeIn">
                                    <div class="single-product">
                                        <div class="row single-product-wrap">
                                            <div class="product-image-col">
                                                <div class="product-image">
                                                    <a href="product.html" class="pro-img">
                                                        <img src="{{ asset('frontend') }}/assets/image/product/p-15.jpg"
                                                            class="w-100 img-fluid img1" alt="p-15">
                                                        <img src="{{ asset('frontend') }}/assets/image/product/p-16.jpg"
                                                            class="w-100 img-fluid img2" alt="p-16">
                                                    </a>
                                                    <div class="product-action-wrap">
                                                        <div class="product-action">
                                                            <a href="javascript:void(0)" class="add-to-wishlist">
                                                                <span class="product-icon"><i
                                                                        class="ri-heart-line d-block icon-16 lh-1"></i></span>
                                                                <span class="tooltip-text">wishlist</span>
                                                            </a>
                                                            <a href="javascript:void(0)" class="add-to-cart">
                                                                <span class="product-icon">
                                                                    <span class="product-bag-icon icon-16"><i
                                                                            class="ri-shopping-bag-3-line d-block lh-1"></i></span>
                                                                    <span class="product-loader-icon icon-16"><i
                                                                            class="ri-loader-4-line d-block lh-1"></i></span>
                                                                    <span class="product-check-icon icon-16"><i
                                                                            class="ri-check-line d-block lh-1"></i></span>
                                                                </span>
                                                                <span class="tooltip-text">add to cart</span>
                                                            </a>
                                                            <a href="#quickview-modal" data-bs-toggle="modal"
                                                                class="quick-view">
                                                                <span class="product-icon"><i
                                                                        class="ri-eye-line d-block icon-16 lh-1"></i></span>
                                                                <span class="tooltip-text">quickview</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <div class="pro-content">
                                                    <div class="product-title">
                                                        <span class="d-block meb-7">Polyester faux / Winter</span>
                                                        <span class="d-block heading-weight"><a href="product.html"
                                                                class="primary-link">Hooded puffer jacket</a></span>
                                                    </div>
                                                    <div class="product-price">
                                                        <div class="price-box heading-weight">
                                                            <span class="new-price primary-color">$14.00</span>
                                                            <span class="old-price"><span class="mer-3">~</span><span
                                                                    class="text-decoration-line-through">$19.00</span></span>
                                                        </div>
                                                    </div>
                                                    <div class="product-ratting">
                                                        <span class="review-ratting">
                                                            <span class="review-star">
                                                                <i class="ri-star-line"></i>
                                                                <i class="ri-star-line"></i>
                                                                <i class="ri-star-line"></i>
                                                                <i class="ri-star-line"></i>
                                                                <i class="ri-star-line"></i>
                                                            </span>
                                                            <span class="review-average">No reviews<span
                                                                    class="review-caption">0 reviews</span></span>
                                                        </span>
                                                    </div>
                                                    <div class="product-description">
                                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                            industry It is a long established fact that a will be distracted
                                                            by the readable of at</p>
                                                    </div>
                                                    <div class="product-action-wrap">
                                                        <div class="product-action">
                                                            <a href="javascript:void(0)" class="add-to-wishlist">
                                                                <span class="product-icon"><i
                                                                        class="ri-heart-line d-block icon-16 lh-1"></i></span>
                                                                <span class="tooltip-text">wishlist</span>
                                                            </a>
                                                            <a href="javascript:void(0)" class="add-to-cart">
                                                                <span class="product-icon">
                                                                    <span class="product-bag-icon icon-16"><i
                                                                            class="ri-shopping-bag-3-line d-block lh-1"></i></span>
                                                                    <span class="product-loader-icon icon-16"><i
                                                                            class="ri-loader-4-line d-block lh-1"></i></span>
                                                                    <span class="product-check-icon icon-16"><i
                                                                            class="ri-check-line d-block lh-1"></i></span>
                                                                </span>
                                                                <span class="tooltip-text">add to cart</span>
                                                            </a>
                                                            <a href="#quickview-modal" data-bs-toggle="modal"
                                                                class="quick-view">
                                                                <span class="product-icon"><i
                                                                        class="ri-eye-line d-block icon-16 lh-1"></i></span>
                                                                <span class="tooltip-text">quickview</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4 col-xl-3 shop-col" data-animate="animate__fadeIn">
                                    <div class="single-product">
                                        <div class="row single-product-wrap">
                                            <div class="product-image-col">
                                                <div class="product-image">
                                                    <a href="product.html" class="pro-img">
                                                        <img src="{{ asset('frontend') }}/assets/image/product/p-17.jpg"
                                                            class="w-100 img-fluid img1" alt="p-17">
                                                        <img src="{{ asset('frontend') }}/assets/image/product/p-18.jpg"
                                                            class="w-100 img-fluid img2" alt="p-18">
                                                    </a>
                                                    <div class="product-action-wrap">
                                                        <div class="product-action">
                                                            <a href="javascript:void(0)" class="add-to-wishlist">
                                                                <span class="product-icon"><i
                                                                        class="ri-heart-line d-block icon-16 lh-1"></i></span>
                                                                <span class="tooltip-text">wishlist</span>
                                                            </a>
                                                            <a href="javascript:void(0)" class="add-to-cart">
                                                                <span class="product-icon">
                                                                    <span class="product-bag-icon icon-16"><i
                                                                            class="ri-shopping-bag-3-line d-block lh-1"></i></span>
                                                                    <span class="product-loader-icon icon-16"><i
                                                                            class="ri-loader-4-line d-block lh-1"></i></span>
                                                                    <span class="product-check-icon icon-16"><i
                                                                            class="ri-check-line d-block lh-1"></i></span>
                                                                </span>
                                                                <span class="tooltip-text">add to cart</span>
                                                            </a>
                                                            <a href="#quickview-modal" data-bs-toggle="modal"
                                                                class="quick-view">
                                                                <span class="product-icon"><i
                                                                        class="ri-eye-line d-block icon-16 lh-1"></i></span>
                                                                <span class="tooltip-text">quickview</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <div class="pro-content">
                                                    <div class="product-title">
                                                        <span class="d-block meb-7">Leather mesh / Sporty</span>
                                                        <span class="d-block heading-weight"><a href="product.html"
                                                                class="primary-link">Chunky sole sneakers</a></span>
                                                    </div>
                                                    <div class="product-price">
                                                        <div class="price-box heading-weight">
                                                            <span class="new-price primary-color">$64.00</span>
                                                            <span class="old-price"><span class="mer-3">~</span><span
                                                                    class="text-decoration-line-through">$74.00</span></span>
                                                        </div>
                                                    </div>
                                                    <div class="product-ratting">
                                                        <span class="review-ratting">
                                                            <span class="review-star">
                                                                <i class="ri-star-line"></i>
                                                                <i class="ri-star-line"></i>
                                                                <i class="ri-star-line"></i>
                                                                <i class="ri-star-line"></i>
                                                                <i class="ri-star-line"></i>
                                                            </span>
                                                            <span class="review-average">No reviews<span
                                                                    class="review-caption">0 reviews</span></span>
                                                        </span>
                                                    </div>
                                                    <div class="product-description">
                                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                            industry It is a long established fact that a will be distracted
                                                            by the readable of at</p>
                                                    </div>
                                                    <div class="product-action-wrap">
                                                        <div class="product-action">
                                                            <a href="javascript:void(0)" class="add-to-wishlist">
                                                                <span class="product-icon"><i
                                                                        class="ri-heart-line d-block icon-16 lh-1"></i></span>
                                                                <span class="tooltip-text">wishlist</span>
                                                            </a>
                                                            <a href="javascript:void(0)" class="add-to-cart">
                                                                <span class="product-icon">
                                                                    <span class="product-bag-icon icon-16"><i
                                                                            class="ri-shopping-bag-3-line d-block lh-1"></i></span>
                                                                    <span class="product-loader-icon icon-16"><i
                                                                            class="ri-loader-4-line d-block lh-1"></i></span>
                                                                    <span class="product-check-icon icon-16"><i
                                                                            class="ri-check-line d-block lh-1"></i></span>
                                                                </span>
                                                                <span class="tooltip-text">add to cart</span>
                                                            </a>
                                                            <a href="#quickview-modal" data-bs-toggle="modal"
                                                                class="quick-view">
                                                                <span class="product-icon"><i
                                                                        class="ri-eye-line d-block icon-16 lh-1"></i></span>
                                                                <span class="tooltip-text">quickview</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4 col-xl-3 shop-col" data-animate="animate__fadeIn">
                                    <div class="single-product">
                                        <div class="row single-product-wrap">
                                            <div class="product-image-col">
                                                <div class="product-image">
                                                    <a href="product.html" class="pro-img">
                                                        <img src="{{ asset('frontend') }}/assets/image/product/p-19.jpg"
                                                            class="w-100 img-fluid img1" alt="p-19">
                                                        <img src="{{ asset('frontend') }}/assets/image/product/p-20.jpg"
                                                            class="w-100 img-fluid img2" alt="p-20">
                                                        <span
                                                            class="product-label product-label-sold product-label-left">Sold</span>
                                                    </a>
                                                    <div class="product-action-wrap">
                                                        <div class="product-action">
                                                            <a href="javascript:void(0)" class="add-to-wishlist">
                                                                <span class="product-icon"><i
                                                                        class="ri-heart-line d-block icon-16 lh-1"></i></span>
                                                                <span class="tooltip-text">wishlist</span>
                                                            </a>
                                                            <a href="javascript:void(0)" class="add-to-cart disabled">
                                                                <span class="product-icon">
                                                                    <span class="product-bag-icon icon-16"><i
                                                                            class="ri-shopping-bag-3-line d-block lh-1"></i></span>
                                                                    <span class="product-loader-icon icon-16"><i
                                                                            class="ri-loader-4-line d-block lh-1"></i></span>
                                                                    <span class="product-check-icon icon-16"><i
                                                                            class="ri-check-line d-block lh-1"></i></span>
                                                                </span>
                                                                <span class="tooltip-text">add to cart</span>
                                                            </a>
                                                            <a href="#quickview-modal" data-bs-toggle="modal"
                                                                class="quick-view">
                                                                <span class="product-icon"><i
                                                                        class="ri-eye-line d-block icon-16 lh-1"></i></span>
                                                                <span class="tooltip-text">quickview</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <div class="pro-content">
                                                    <div class="product-title">
                                                        <span class="d-block meb-7">Faux leather / Compact</span>
                                                        <span class="d-block heading-weight"><a href="product.html"
                                                                class="primary-link">Quilted crossbody bag</a></span>
                                                    </div>
                                                    <div class="product-price">
                                                        <div class="price-box heading-weight">
                                                            <span class="new-price primary-color">$34.00</span>
                                                            <span class="old-price"><span class="mer-3">~</span><span
                                                                    class="text-decoration-line-through">$44.00</span></span>
                                                        </div>
                                                    </div>
                                                    <div class="product-ratting">
                                                        <span class="review-ratting">
                                                            <span class="review-star">
                                                                <i class="ri-star-line"></i>
                                                                <i class="ri-star-line"></i>
                                                                <i class="ri-star-line"></i>
                                                                <i class="ri-star-line"></i>
                                                                <i class="ri-star-line"></i>
                                                            </span>
                                                            <span class="review-average">No reviews<span
                                                                    class="review-caption">0 reviews</span></span>
                                                        </span>
                                                    </div>
                                                    <div class="product-description">
                                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                            industry It is a long established fact that a will be distracted
                                                            by the readable of at</p>
                                                    </div>
                                                    <div class="product-action-wrap">
                                                        <div class="product-action">
                                                            <a href="javascript:void(0)" class="add-to-wishlist">
                                                                <span class="product-icon"><i
                                                                        class="ri-heart-line d-block icon-16 lh-1"></i></span>
                                                                <span class="tooltip-text">wishlist</span>
                                                            </a>
                                                            <a href="javascript:void(0)" class="add-to-cart disabled">
                                                                <span class="product-icon">
                                                                    <span class="product-bag-icon icon-16"><i
                                                                            class="ri-shopping-bag-3-line d-block lh-1"></i></span>
                                                                    <span class="product-loader-icon icon-16"><i
                                                                            class="ri-loader-4-line d-block lh-1"></i></span>
                                                                    <span class="product-check-icon icon-16"><i
                                                                            class="ri-check-line d-block lh-1"></i></span>
                                                                </span>
                                                                <span class="tooltip-text">add to cart</span>
                                                            </a>
                                                            <a href="#quickview-modal" data-bs-toggle="modal"
                                                                class="quick-view">
                                                                <span class="product-icon"><i
                                                                        class="ri-eye-line d-block icon-16 lh-1"></i></span>
                                                                <span class="tooltip-text">quickview</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4 col-xl-3 shop-col" data-animate="animate__fadeIn">
                                    <div class="single-product">
                                        <div class="row single-product-wrap">
                                            <div class="product-image-col">
                                                <div class="product-image">
                                                    <a href="product.html" class="pro-img">
                                                        <img src="{{ asset('frontend') }}/assets/image/product/p-21.jpg"
                                                            class="w-100 img-fluid img1" alt="p-21">
                                                        <img src="{{ asset('frontend') }}/assets/image/product/p-22.jpg"
                                                            class="w-100 img-fluid img2" alt="p-22">
                                                    </a>
                                                    <div class="product-action-wrap">
                                                        <div class="product-action">
                                                            <a href="javascript:void(0)" class="add-to-wishlist">
                                                                <span class="product-icon"><i
                                                                        class="ri-heart-line d-block icon-16 lh-1"></i></span>
                                                                <span class="tooltip-text">wishlist</span>
                                                            </a>
                                                            <a href="javascript:void(0)" class="add-to-cart">
                                                                <span class="product-icon">
                                                                    <span class="product-bag-icon icon-16"><i
                                                                            class="ri-shopping-bag-3-line d-block lh-1"></i></span>
                                                                    <span class="product-loader-icon icon-16"><i
                                                                            class="ri-loader-4-line d-block lh-1"></i></span>
                                                                    <span class="product-check-icon icon-16"><i
                                                                            class="ri-check-line d-block lh-1"></i></span>
                                                                </span>
                                                                <span class="tooltip-text">add to cart</span>
                                                            </a>
                                                            <a href="#quickview-modal" data-bs-toggle="modal"
                                                                class="quick-view">
                                                                <span class="product-icon"><i
                                                                        class="ri-eye-line d-block icon-16 lh-1"></i></span>
                                                                <span class="tooltip-text">quickview</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <div class="pro-content">
                                                    <div class="product-title">
                                                        <span class="d-block meb-7">Nylon spandex / Gymwear</span>
                                                        <span class="d-block heading-weight"><a href="product.html"
                                                                class="primary-link">Stretch active leggings</a></span>
                                                    </div>
                                                    <div class="product-price">
                                                        <div class="price-box heading-weight">
                                                            <span class="new-price primary-color">$4.00</span>
                                                            <span class="old-price"><span class="mer-3">~</span><span
                                                                    class="text-decoration-line-through">$9.00</span></span>
                                                        </div>
                                                    </div>
                                                    <div class="product-ratting">
                                                        <span class="review-ratting">
                                                            <span class="review-star">
                                                                <i class="ri-star-line"></i>
                                                                <i class="ri-star-line"></i>
                                                                <i class="ri-star-line"></i>
                                                                <i class="ri-star-line"></i>
                                                                <i class="ri-star-line"></i>
                                                            </span>
                                                            <span class="review-average">No reviews<span
                                                                    class="review-caption">0 reviews</span></span>
                                                        </span>
                                                    </div>
                                                    <div class="product-description">
                                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                            industry It is a long established fact that a will be distracted
                                                            by the readable of at</p>
                                                    </div>
                                                    <div class="product-action-wrap">
                                                        <div class="product-action">
                                                            <a href="javascript:void(0)" class="add-to-wishlist">
                                                                <span class="product-icon"><i
                                                                        class="ri-heart-line d-block icon-16 lh-1"></i></span>
                                                                <span class="tooltip-text">wishlist</span>
                                                            </a>
                                                            <a href="javascript:void(0)" class="add-to-cart">
                                                                <span class="product-icon">
                                                                    <span class="product-bag-icon icon-16"><i
                                                                            class="ri-shopping-bag-3-line d-block lh-1"></i></span>
                                                                    <span class="product-loader-icon icon-16"><i
                                                                            class="ri-loader-4-line d-block lh-1"></i></span>
                                                                    <span class="product-check-icon icon-16"><i
                                                                            class="ri-check-line d-block lh-1"></i></span>
                                                                </span>
                                                                <span class="tooltip-text">add to cart</span>
                                                            </a>
                                                            <a href="#quickview-modal" data-bs-toggle="modal"
                                                                class="quick-view">
                                                                <span class="product-icon"><i
                                                                        class="ri-eye-line d-block icon-16 lh-1"></i></span>
                                                                <span class="tooltip-text">quickview</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4 col-xl-3 shop-col" data-animate="animate__fadeIn">
                                    <div class="single-product">
                                        <div class="row single-product-wrap">
                                            <div class="product-image-col">
                                                <div class="product-image">
                                                    <a href="product.html" class="pro-img">
                                                        <img src="{{ asset('frontend') }}/assets/image/product/p-23.jpg"
                                                            class="w-100 img-fluid img1" alt="p-23">
                                                        <img src="{{ asset('frontend') }}/assets/image/product/p-24.jpg"
                                                            class="w-100 img-fluid img2" alt="p-24">
                                                    </a>
                                                    <div class="product-action-wrap">
                                                        <div class="product-action">
                                                            <a href="javascript:void(0)" class="add-to-wishlist">
                                                                <span class="product-icon"><i
                                                                        class="ri-heart-line d-block icon-16 lh-1"></i></span>
                                                                <span class="tooltip-text">wishlist</span>
                                                            </a>
                                                            <a href="javascript:void(0)" class="add-to-cart">
                                                                <span class="product-icon">
                                                                    <span class="product-bag-icon icon-16"><i
                                                                            class="ri-shopping-bag-3-line d-block lh-1"></i></span>
                                                                    <span class="product-loader-icon icon-16"><i
                                                                            class="ri-loader-4-line d-block lh-1"></i></span>
                                                                    <span class="product-check-icon icon-16"><i
                                                                            class="ri-check-line d-block lh-1"></i></span>
                                                                </span>
                                                                <span class="tooltip-text">add to cart</span>
                                                            </a>
                                                            <a href="#quickview-modal" data-bs-toggle="modal"
                                                                class="quick-view">
                                                                <span class="product-icon"><i
                                                                        class="ri-eye-line d-block icon-16 lh-1"></i></span>
                                                                <span class="tooltip-text">quickview</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <div class="pro-content">
                                                    <div class="product-title">
                                                        <span class="d-block meb-7">Cotton fleece / Cozy</span>
                                                        <span class="d-block heading-weight"><a href="product.html"
                                                                class="primary-link">Relaxed fit joggers</a></span>
                                                    </div>
                                                    <div class="product-price">
                                                        <div class="price-box heading-weight">
                                                            <span class="new-price primary-color">$9.00</span>
                                                            <span class="old-price"><span class="mer-3">~</span><span
                                                                    class="text-decoration-line-through">$14.00</span></span>
                                                        </div>
                                                    </div>
                                                    <div class="product-ratting">
                                                        <span class="review-ratting">
                                                            <span class="review-star">
                                                                <i class="ri-star-line"></i>
                                                                <i class="ri-star-line"></i>
                                                                <i class="ri-star-line"></i>
                                                                <i class="ri-star-line"></i>
                                                                <i class="ri-star-line"></i>
                                                            </span>
                                                            <span class="review-average">No reviews<span
                                                                    class="review-caption">0 reviews</span></span>
                                                        </span>
                                                    </div>
                                                    <div class="product-description">
                                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                            industry It is a long established fact that a will be distracted
                                                            by the readable of at</p>
                                                    </div>
                                                    <div class="product-action-wrap">
                                                        <div class="product-action">
                                                            <a href="javascript:void(0)" class="add-to-wishlist">
                                                                <span class="product-icon"><i
                                                                        class="ri-heart-line d-block icon-16 lh-1"></i></span>
                                                                <span class="tooltip-text">wishlist</span>
                                                            </a>
                                                            <a href="javascript:void(0)" class="add-to-cart">
                                                                <span class="product-icon">
                                                                    <span class="product-bag-icon icon-16"><i
                                                                            class="ri-shopping-bag-3-line d-block lh-1"></i></span>
                                                                    <span class="product-loader-icon icon-16"><i
                                                                            class="ri-loader-4-line d-block lh-1"></i></span>
                                                                    <span class="product-check-icon icon-16"><i
                                                                            class="ri-check-line d-block lh-1"></i></span>
                                                                </span>
                                                                <span class="tooltip-text">add to cart</span>
                                                            </a>
                                                            <a href="#quickview-modal" data-bs-toggle="modal"
                                                                class="quick-view">
                                                                <span class="product-icon"><i
                                                                        class="ri-eye-line d-block icon-16 lh-1"></i></span>
                                                                <span class="tooltip-text">quickview</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- shop-grid end -->
                            <!-- paginatoin start -->
                            <div class="paginatoin-area section-pt" data-animate="animate__fadeIn">
                                <nav aria-label="Page navigation example">
                                    <ul
                                        class="pagination ul-mt5 align-items-center justify-content-center pagination-box">
                                        <li class="page-item first">
                                            <a href="javascript:void(0)"
                                                class="page-link p-0 m-0 bg-transparent border-0 lh-1"
                                                aria-label="First page">First</a>
                                        </li>
                                        <li class="page-item prev">
                                            <a href="javascript:void(0)"
                                                class="page-link icon-16 d-flex align-items-center justify-content-center p-0 m-0 bg-transparent border-0 border-radius"
                                                aria-label="Previous"><i
                                                    class="ri-arrow-left-line d-block lh-1"></i></a>
                                        </li>
                                        <li class="page-item">
                                            <a href="javascript:void(0)"
                                                class="page-link d-flex align-items-center justify-content-center p-0 m-0 heading-weight border-0 border-radius lh-1"
                                                aria-label="Page number">1</a>
                                        </li>
                                        <li class="page-item">
                                            <a href="javascript:void(0)"
                                                class="page-link active d-flex align-items-center justify-content-center p-0 m-0 heading-weight border-0 border-radius lh-1"
                                                aria-label="Page number">2</a>
                                        </li>
                                        <li class="page-item">
                                            <a href="javascript:void(0)"
                                                class="page-link d-flex align-items-center justify-content-center p-0 m-0 heading-weight border-0 border-radius lh-1"
                                                aria-label="Page number">3</a>
                                        </li>
                                        <li class="page-item next">
                                            <a href="javascript:void(0)"
                                                class="page-link icon-16 d-flex align-items-center justify-content-center p-0 m-0 bg-transparent border-0 border-radius"
                                                aria-label="Next"><i class="ri-arrow-right-line d-block lh-1"></i></a>
                                        </li>
                                        <li class="page-item last">
                                            <a href="javascript:void(0)"
                                                class="page-link p-0 m-0 bg-transparent border-0 lh-1"
                                                aria-label="Last page">Last</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <!-- paginatoin end -->
                        </div>
                    </div>
                </div>
                <!-- collection-info end -->
            </div>
        </section>
        <!-- shop-content start -->
    </main>
    <!-- main end -->
@endsection
