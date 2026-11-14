@extends('layouts.master')
@section('master')
    <main id="main">
        <!-- collections start -->
        <div class="section-ptb">
            <div class="container">
                <div class="row row-mtm30">
                    @foreach ($categories as $category)
                        <div class="col-6 col-md-4 col-xl-3" data-animate="animate__fadeIn">
                            <div class="collection-block banner-hover ptb-15 plr-15 extra-bg text-center border-radius">
                                <a href="{{ route('category.products', [$category->id, $category->slug]) }}"
                                    class="d-block banner-img br-hidden">
                                    <img src="{{ asset('uploads/categories') }}/{{ $category->image ?? 'default.png' }}"
                                        class="w-90 img-fluid" alt="collection-1">
                                </a>
                                <div class="collection-content pst-15">
                                    <div class="ul-mtm-15 heading-weight">
                                        <span class="w-100"><a href="collection.html"
                                                class="d-block primary-link text-truncate">{{ $category->name }}</a></span>
                                        <span class="primary-color text-uppercase">{{ $category->products->count() }}+
                                            item</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- paginatoin start -->
                <div class="paginatoin-area section-pt" data-animate="animate__fadeIn">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination ul-mt5 align-items-center justify-content-center pagination-box">
                            <li class="page-item first">
                                <a href="javascript:void(0)" class="page-link p-0 m-0 bg-transparent border-0 lh-1"
                                    aria-label="First page">First</a>
                            </li>
                            <li class="page-item prev">
                                <a href="javascript:void(0)"
                                    class="page-link icon-16 d-flex align-items-center justify-content-center p-0 m-0 bg-transparent border-0 border-radius"
                                    aria-label="Previous"><i class="ri-arrow-left-line d-block lh-1"></i></a>
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
                                <a href="javascript:void(0)" class="page-link p-0 m-0 bg-transparent border-0 lh-1"
                                    aria-label="Last page">Last</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <!-- paginatoin end -->
            </div>
        </div>
        <!-- collections start -->
    </main>
@endsection
