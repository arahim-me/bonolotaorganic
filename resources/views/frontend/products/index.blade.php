@extends('layouts.master')
@section('title', $title ?? 'Products Page')
@section('master')
    <!-- main start -->
    <main id="main">
        <!-- shop-content start -->
        <section class="shop-content section-ptb">
            <div class="container">
                <!-- collection-info start -->
                <div class="row row-mtm" data-animate="animate__fadeIn">

                    <div class="col-12">
                        <div class="shop-product-wrap data-grid">
                            <!-- shop-grid start -->
                            <div class="row row-mtm">
                                @forelse($products as $product)
                                    @include('components.cards.product')
                                @empty
                                    <h4>No products to show</h4>
                                @endforelse
                            </div>
                            <!-- shop-grid end -->
                            <!-- paginatoin start -->
                            {{ $products->onEachSide(1)->links('dashboard.components.homePagination') }}
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
