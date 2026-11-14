<!DOCTYPE html>
<html lang="en" data-bs-theme="light" data-menu-color="brand" data-topbar-color="light">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="utf-8" />
    <title>@yield('title', 'Dashboard | Dashtrap - Responsive Bootstrap 5 Admin Dashboard')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Myra Studio" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon"
        href="{{ $siteInfo && $siteInfo->favicon ? asset('uploads/site-info/favicon/' . $siteInfo->favicon) : asset('assets/images/favicon.ico') }}">

    <link href="{{ asset('assets/libs/morris.js/morris.css') }}" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="{{ asset('assets/css/style.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/inbox.css') }}" rel="stylesheet" type="text/css">
    <script src="{{ asset('assets/js/config.js') }}"></script>
    @stack('styles')
</head>

<body>

    <!-- Begin page -->
    <div class="layout-wrapper">

        <!-- ========== Left Sidebar ========== -->
        <div class="main-menu">
            <!-- Brand Logo -->
            <div class="logo-box">
                <a class='logo-light' href='{{ route('dashboard') }}'>
                    @if ($siteInfo && $siteInfo->logo)
                        <img src="{{ asset('uploads/site-info/logo/' . $siteInfo->logo) }}"
                            alt="{{ $siteInfo->name ?? 'Site logo' }}" class="logo-lg" height="28">
                        <img src="{{ asset('uploads/site-info/logo/' . $siteInfo->logo) }}"
                            alt="{{ $siteInfo->name ?? 'Site logo' }}" class="logo-sm" height="28">
                    @else
                        <img src="{{ asset('assets/images/logo-light.png') }}" alt="logo" class="logo-lg"
                            height="28">
                        <img src="{{ asset('assets/images/logo-sm.png') }}" alt="small logo" class="logo-sm"
                            height="28">
                    @endif
                </a>

                <a class='logo-dark' href='{{ route('dashboard') }}'>
                    @if ($siteInfo && $siteInfo->logo)
                        <img src="{{ asset('uploads/site-info/logo/' . $siteInfo->logo) }}"
                            alt="{{ $siteInfo->name ?? 'Site logo' }}" class="logo-lg" height="28">
                        <img src="{{ asset('uploads/site-info/logo/' . $siteInfo->logo) }}"
                            alt="{{ $siteInfo->name ?? 'Site logo' }}" class="logo-sm" height="28">
                    @else
                        <img src="{{ asset('assets/images/logo-dark.png') }}" alt="dark logo" class="logo-lg"
                            height="28">
                        <img src="{{ asset('assets/images/logo-sm.png') }}" alt="small logo" class="logo-sm"
                            height="28">
                    @endif
                </a>
            </div>

            <!--- Menu -->
            <div data-simplebar>
                <ul class="app-menu">

                    <li class="menu-title">Menu</li>

                    <li class="menu-item">
                        <a class='menu-link waves-effect waves-light' href='{{ route('dashboard') }}'>
                            <span class="menu-icon"><i class="bx bx-home-smile"></i></span>
                            <span class="menu-text">Dashboard</span>
                        </a>
                    </li>

                    @if ((auth()->check() && auth()->user()->role_id == 1) || auth()->user()->role_id == 2)
                        <li class="menu-title">Management</li>

                        <li class="menu-item">
                            <a class='menu-link waves-effect waves-light' href='{{ route('dashboard.users.index') }}'>
                                <span class="menu-icon"><i class="bx bx-user-circle"></i></span>
                                <span class="menu-text">Users</span>
                            </a>
                        </li>

                        <li class="menu-item">
                            <a class='menu-link waves-effect waves-light' href='{{ route('dashboard.categories.index') }}'>
                                <span class="menu-icon"><i class="bx bx-bookmarks"></i></span>
                                <span class="menu-text">Categories</span>
                            </a>
                        </li>


                        <li class="menu-item">
                            <a href="#menuProducts" data-bs-toggle="collapse"
                                class="menu-link waves-effect waves-light">
                                <span class="menu-icon"><i class="bx bx-box"></i></span>
                                <span class="menu-text">Manage Products</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="menuProducts">
                                <ul class="sub-menu">
                                    <li class="menu-item">
                                        <a class='menu-link waves-effect waves-light'
                                            href='{{ route('dashboard.products.index') }}'>
                                            <span class="menu-text">Products</span>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a class='menu-link' href='{{ route('dashboard.brands.index') }}'>
                                            <span class="menu-text">Brands</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="menu-item">
                            <a class="menu-link" href="{{ route('dashboard.tags.index') }}">

                                <span class="menu-icon">
                                    <i class="bx bx-purchase-tag"></i>
                                </span>

                                <span class="menu-text">Tags</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#menuSections" data-bs-toggle="collapse"
                                class="menu-link waves-effect waves-light">
                                <span class="menu-icon"><i class="bx bx-layer"></i></span>
                                <span class="menu-text">Sections</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="menuSections">
                                <ul class="sub-menu">
                                    <li class="menu-item">
                                        <a class='menu-link' href='{{ route('dashboard.product-sections.index') }}'>
                                            <span class="menu-text">Section Management</span>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a class='menu-link' href='{{ route('dashboard.products.index') }}'>
                                            <span class="menu-text">Product Management</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="menu-item">
                            <a class='menu-link waves-effect waves-light' href='{{ route('dashboard.reviews.index') }}'>
                                <span class="menu-icon"><i class="bx bx-star"></i></span>
                                <span class="menu-text">Reviews</span>
                                @if ($notApprovedReviewsCount)
                                    <span class="badge bg-danger ms-auto">{{ $notApprovedReviewsCount ?? 0 }}</span>
                                @endif
                            </a>
                        </li>
                        <li class="menu-item">
                            <a class='menu-link waves-effect waves-light' href='{{ route('dashboard.messages.index') }}'>
                                <span class="menu-icon"><i class="bx bx-envelope"></i></span>
                                <span class="menu-text">Inbox</span>
                                @if ($unreadMessagesCount)
                                    <span class="badge bg-danger ms-auto">{{ $unreadMessagesCount ?? 0 }}</span>
                                @endif
                            </a>
                        </li>
                        <li class="menu-item">
                            <a class="menu-link waves-effect waves-light"
                                href="{{ route('dashboard.notifications.index') }}">

                                <span class="menu-icon">
                                    <i class="bx bx-bell"></i>
                                </span>

                                <span class="menu-text">Notifications</span>

                                @if ($unreadNotifyCount)
                                    <span class="badge bg-danger ms-auto">{{ $unreadNotifyCount ?? 0 }}</span>
                                @endif

                            </a>
                        </li>

                        <li class="menu-item">
                            <a class='menu-link waves-effect waves-light' href='{{ route('dashboard.facilities.index') }}'>
                                <span class="menu-icon"><i class="bx bx-buildings"></i></span>
                                <span class="menu-text">Facilities</span>
                            </a>
                        </li>

                        <li class="menu-item">
                            <a class='menu-link waves-effect waves-light' href='{{ route('dashboard.policy-types.index') }}'>
                                <span class="menu-icon"><i class="bx bx-question-mark"></i></span>
                                <span class="menu-text">Policy Types</span>
                            </a>
                        </li>

                        <li class="menu-item">
                            <a class='menu-link waves-effect waves-light' href='{{ route('dashboard.orders.index') }}'>
                                <span class="menu-icon"><i class="bx bx-cart"></i></span>
                                <span class="menu-text">Orders</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a class='menu-link waves-effect waves-light' href='{{ route('dashboard.shipping-fees.index') }}'>
                                <span class="menu-icon"><i class="bx bx-cart"></i></span>
                                <span class="menu-text">Shipping Fee</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#menuPayment" data-bs-toggle="collapse"
                                class="menu-link waves-effect waves-light">
                                <span class="menu-icon"><i class="bx bx-credit-card"></i></span>
                                <span class="menu-text"> Payment Settings </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="menuPayment">
                                <ul class="sub-menu">
                                    <li class="menu-item">
                                        <a class='menu-link' href='{{ route('dashboard.payment-methods.index') }}'>
                                            <span class="menu-text">Payment Methods</span>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a class='menu-link' href='{{ route('dashboard.payment-gateways.index') }}'>
                                            <span class="menu-text">Payment Gateways</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="menu-item">
                            <a href="#menuSiteSettings" data-bs-toggle="collapse"
                                class="menu-link waves-effect waves-light">
                                <span class="menu-icon"><i class="bx bx-cog"></i></span>
                                <span class="menu-text"> Site Settings </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="menuSiteSettings">
                                <ul class="sub-menu">
                                    <li class="menu-item">
                                        <a class='menu-link' href='{{ route('dashboard.site-info.index') }}'>
                                            <span class="menu-text">Site Information</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="menu-item">
                            <a class="menu-link waves-effect waves-light"
                                href="#">

                                <span class="menu-icon">
                                    <i class="bx bx-package"></i>
                                </span>

                                <span class="menu-text">Courier Settings</span>
                            </a>
                        </li>
                    @endif

                    <li class="menu-title">Settings</li>
                    <li class="menu-item">
                        <a class="menu-link" href="{{ route('dashboard.courier.fraud.index') }}">

                            <span class="menu-icon">
                                <i class="bx bx-shield-quarter"></i>
                            </span>

                            <span class="menu-text">
                                Fraud Checker
                            </span>

                        </a>
                    </li>

                    <li class="menu-item">
                        <a class='menu-link waves-effect waves-light' href='{{ route('profile.index') }}'>
                            <span class="menu-icon"><i class="bx bx-user"></i></span>
                            <span class="menu-text">Profile</span>
                        </a>
                    </li>

                    <li class="menu-item">
                        <form method="POST" action="{{ route('logout') }}"
                            class="menu-link waves-effect waves-light">
                            @csrf
                            <button type="submit" class="menu-link btn btn-link bg-transparent p-0 text-start">
                                <span class="menu-icon"><i class="bx bx-power-off"></i></span>
                                <span class="menu-text">Logout</span>
                            </button>
                        </form>
                    </li>

                    <li class="menu-item">
                        <a class='menu-link waves-effect waves-light' href='{{ route('profile.edit') }}'>
                            <span class="menu-icon"><i class="bx bx-cog"></i></span>
                            <span class="menu-text">Settings</span>
                        </a>
                    </li>

                    <li class="menu-title">Custom</li>

                    <li class="menu-item">
                        <a class='menu-link waves-effect waves-light' href='apps-calendar.html'>
                            <span class="menu-icon"><i class="bx bx-calendar"></i></span>
                            <span class="menu-text"> Calendar </span>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="#menuExpages" data-bs-toggle="collapse" class="menu-link waves-effect waves-light">
                            <span class="menu-icon"><i class="bx bx-file"></i></span>
                            <span class="menu-text"> Extra Pages </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="menuExpages">
                            <ul class="sub-menu">
                                <li class="menu-item">
                                    <a class='menu-link' href='pages-starter.html'>
                                        <span class="menu-text">Starter</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class='menu-link' href='pages-invoice.html'>
                                        <span class="menu-text">Invoice</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class='menu-link' href='pages-login.html'>
                                        <span class="menu-text">Log In</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class='menu-link' href='pages-register.html'>
                                        <span class="menu-text">Register</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class='menu-link' href='pages-recoverpw.html'>
                                        <span class="menu-text">Recover Password</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class='menu-link' href='pages-lock-screen.html'>
                                        <span class="menu-text">Lock Screen</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class='menu-link' href='pages-404.html'>
                                        <span class="menu-text">Error 404</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class='menu-link' href='pages-500.html'>
                                        <span class="menu-text">Error 500</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="menu-item">
                        <a href="#menuLayouts" data-bs-toggle="collapse" class="menu-link waves-effect waves-light">
                            <span class="menu-icon"><i class="bx bx-layout"></i></span>
                            <span class="menu-text"> Layouts </span>
                            <span class="badge bg-blue ms-auto">New</span>
                        </a>
                        <div class="collapse" id="menuLayouts">
                            <ul class="sub-menu">
                                <li class="menu-item">
                                    <a class='menu-link' href='layout-horizontal.html'>
                                        <span class="menu-text">Horizontal</span>
                                    </a>
                                </li>

                                <li class="menu-item">
                                    <a class='menu-link' href='layout-sidenav-light.html'>
                                        <span class="menu-text">Sidenav Light</span>
                                    </a>
                                </li>

                                <li class="menu-item">
                                    <a class='menu-link' href='layout-sidenav-dark.html'>
                                        <span class="menu-text">Sidenav Dark</span>
                                    </a>
                                </li>

                                <li class="menu-item">
                                    <a class='menu-link' href='layout-topbar-dark.html'>
                                        <span class="menu-text">Topbar Dark</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="menu-title">Components</li>

                    <li class="menu-item">
                        <a href="#menuComponentsui" data-bs-toggle="collapse"
                            class="menu-link waves-effect waves-light">
                            <span class="menu-icon"><i class="bx bx-cookie"></i></span>
                            <span class="menu-text"> UI Elements </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="menuComponentsui">
                            <ul class="sub-menu">
                                <li class="menu-item">
                                    <a class='menu-link' href='ui-alerts.html'>
                                        <span class="menu-text">Alerts</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class='menu-link' href='ui-buttons.html'>
                                        <span class="menu-text">Buttons</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class='menu-link' href='ui-cards.html'>
                                        <span class="menu-text">Cards</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class='menu-link' href='ui-carousel.html'>
                                        <span class="menu-text">Carousel</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class='menu-link' href='ui-dropdowns.html'>
                                        <span class="menu-text">Dropdowns</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class='menu-link' href='ui-video.html'>
                                        <span class="menu-text">Embed Video</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class='menu-link' href='ui-general.html'>
                                        <span class="menu-text">General UI</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class='menu-link' href='ui-grid.html'>
                                        <span class="menu-text">Grid</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class='menu-link' href='ui-images.html'>
                                        <span class="menu-text">Images</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class='menu-link' href='ui-list-group.html'>
                                        <span class="menu-text">List Group</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class='menu-link' href='ui-modals.html'>
                                        <span class="menu-text">Modals</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class='menu-link' href='ui-offcanvas.html'>
                                        <span class="menu-text">Offcanvas</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class='menu-link' href='ui-placeholders.html'>
                                        <span class="menu-text">Placeholders</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class='menu-link' href='ui-progress.html'>
                                        <span class="menu-text">Progress</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class='menu-link' href='ui-spinners.html'>
                                        <span class="menu-text">Spinners</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class='menu-link' href='ui-tabs-accordions.html'>
                                        <span class="menu-text">Tabs & Accordions</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class='menu-link' href='ui-tooltips-popovers.html'>
                                        <span class="menu-text">Tooltips & Popovers</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class='menu-link' href='ui-typography.html'>
                                        <span class="menu-text">Typography</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="menu-item">
                        <a href="#menuExtendedui" data-bs-toggle="collapse"
                            class="menu-link waves-effect waves-light">
                            <span class="menu-icon"><i class="bx bx-briefcase-alt-2"></i></span>
                            <span class="menu-text"> Components </span>
                            <span class="badge bg-info ms-auto">Hot</span>
                        </a>
                        <div class="collapse" id="menuExtendedui">
                            <ul class="sub-menu">
                                <li class="menu-item">
                                    <a class='menu-link' href='components-range-slider.html'>
                                        <span class="menu-text">Range Slider</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class='menu-link' href='components-sweet-alert.html'>
                                        <span class="menu-text">Sweet Alert</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class='menu-link' href='components-loading-buttons.html'>
                                        <span class="menu-text">Loading Buttons</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="menu-item">
                        <a href="#menuIcons" data-bs-toggle="collapse" class="menu-link waves-effect waves-light">
                            <span class="menu-icon"><i class="bx bx-aperture"></i></span>
                            <span class="menu-text"> Icons </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="menuIcons">
                            <ul class="sub-menu">
                                <li class="menu-item">
                                    <a class='menu-link' href='icons-feather.html'>
                                        <span class="menu-text">Feather Icons</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class='menu-link' href='icons-mdi.html'>
                                        <span class="menu-text">Material Design Icons</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class='menu-link' href='icons-dripicons.html'>
                                        <span class="menu-text">Dripicons</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="menu-item">
                        <a href="#menuForms" data-bs-toggle="collapse" class="menu-link waves-effect waves-light">
                            <span class="menu-icon"><i class="bx bxs-eraser"></i></span>
                            <span class="menu-text"> Forms </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="menuForms">
                            <ul class="sub-menu">
                                <li class="menu-item">
                                    <a class='menu-link' href='forms-elements.html'>
                                        <span class="menu-text">General Elements</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class='menu-link' href='forms-advanced.html'>
                                        <span class="menu-text">Advanced</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class='menu-link' href='forms-validation.html'>
                                        <span class="menu-text">Validation</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class='menu-link' href='forms-quilljs.html'>
                                        <span class="menu-text">Editor</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class='menu-link' href='forms-file-uploads.html'>
                                        <span class="menu-text">File Uploads</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="menu-item">
                        <a href="#menuTables" data-bs-toggle="collapse" class="menu-link waves-effect waves-light">
                            <span class="menu-icon"><i class="bx bx-table"></i></span>
                            <span class="menu-text"> Tables </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="menuTables">
                            <ul class="sub-menu">
                                <li class="menu-item">
                                    <a class='menu-link' href='tables-basic.html'>
                                        <span class="menu-text">Basic Tables</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class='menu-link' href='tables-datatables.html'>
                                        <span class="menu-text">Data Tables</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="menu-item">
                        <a href="#menuCharts" data-bs-toggle="collapse" class="menu-link waves-effect waves-light">
                            <span class="menu-icon"><i class="bx bx-doughnut-chart"></i></span>
                            <span class="menu-text"> Charts </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="menuCharts">
                            <ul class="sub-menu">
                                <li class="menu-item">
                                    <a class='menu-link' href='charts-apex.html'>
                                        <span class="menu-text">Apex Charts</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class='menu-link' href='charts-morris.html'>
                                        <span class="menu-text">Morris Charts</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class='menu-link' href='charts-chartjs.html'>
                                        <span class="menu-text">Chartjs Charts</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="menu-item">
                        <a href="#menuMaps" data-bs-toggle="collapse" class="menu-link waves-effect waves-light">
                            <span class="menu-icon"><i class="bx bx-map-alt"></i></span>
                            <span class="menu-text"> Maps </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="menuMaps">
                            <ul class="sub-menu">
                                <li class="menu-item">
                                    <a class='menu-link' href='maps-google.html'>
                                        <span class="menu-text">Google Maps</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class='menu-link' href='maps-vector.html'>
                                        <span class="menu-text">Vector Maps</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="menu-item">
                        <a href="#menuMultilevel" data-bs-toggle="collapse"
                            class="menu-link waves-effect waves-light">
                            <span class="menu-icon"><i class="bx bx-share-alt"></i></span>
                            <span class="menu-text"> Multi Level </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="menuMultilevel">
                            <ul class="sub-menu">
                                <li class="menu-item">
                                    <a href="#menuMultilevel2" data-bs-toggle="collapse"
                                        class="menu-link waves-effect waves-light">
                                        <span class="menu-text"> Second Level </span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <div class="collapse" id="menuMultilevel2">
                                        <ul class="sub-menu">
                                            <li class="menu-item">
                                                <a href="javascript: void(0);" class="menu-link">
                                                    <span class="menu-text">Item 1</span>
                                                </a>
                                            </li>
                                            <li class="menu-item">
                                                <a href="javascript: void(0);" class="menu-link">
                                                    <span class="menu-text">Item 2</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>

                                <li class="menu-item">
                                    <a href="#menuMultilevel3" data-bs-toggle="collapse"
                                        class="menu-link waves-effect waves-light">
                                        <span class="menu-text">Third Level</span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <div class="collapse" id="menuMultilevel3">
                                        <ul class="sub-menu">
                                            <li class="menu-item">
                                                <a href="javascript: void(0);" class="menu-link">
                                                    <span class="menu-text">Item 1</span>
                                                </a>
                                            </li>
                                            <li class="menu-item">
                                                <a href="#menuMultilevel4" data-bs-toggle="collapse"
                                                    class="menu-link waves-effect waves-light">
                                                    <span class="menu-text">Item 2</span>
                                                    <span class="menu-arrow"></span>
                                                </a>
                                                <div class="collapse" id="menuMultilevel4">
                                                    <ul class="sub-menu">
                                                        <li class="menu-item">
                                                            <a href="javascript: void(0);" class="menu-link">
                                                                <span class="menu-text">Item 1</span>
                                                            </a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a href="javascript: void(0);" class="menu-link">
                                                                <span class="menu-text">Item 2</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>



        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="page-content">

            <!-- ========== Topbar Start ========== -->
            <div class="navbar-custom">
                <div class="topbar">
                    <div class="topbar-menu d-flex align-items-center gap-lg-2 gap-1">

                        <!-- Brand Logo -->
                        <div class="logo-box">
                            <!-- Brand Logo Light -->
                            <a class='logo-light' href='{{ route('dashboard') }}'>
                                <img src="{{ asset('assets/images/logo-light.png') }}" alt="logo"
                                    class="logo-lg" height="22">
                                <img src="{{ asset('assets/images/logo-sm.png') }}" alt="small logo" class="logo-sm"
                                    height="22">
                            </a>

                            <!-- Brand Logo Dark -->
                            <a class='logo-dark' href='{{ route('dashboard') }}'>
                                <img src="{{ asset('assets/images/logo-dark.png') }}" alt="dark logo"
                                    class="logo-lg" height="22">
                                <img src="{{ asset('assets/images/logo-sm.png') }}" alt="small logo" class="logo-sm"
                                    height="22">
                            </a>
                        </div>

                        <!-- Sidebar Menu Toggle Button -->
                        <button class="button-toggle-menu">
                            <i class="mdi mdi-menu"></i>
                        </button>
                    </div>

                    <ul class="topbar-menu d-flex align-items-center gap-4">

                        <li class="d-none d-md-inline-block">
                            <a class="nav-link" href="#" data-bs-toggle="fullscreen">
                                <i class="mdi mdi-fullscreen font-size-24"></i>
                            </a>
                        </li>

                        <li class="dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-light arrow-none"
                                data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                                aria-expanded="false">
                                <i class="mdi mdi-magnify font-size-24"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-animated dropdown-menu-end dropdown-lg p-0">
                                <form class="p-3">
                                    <input type="search" class="form-control" placeholder="Search ..."
                                        aria-label="Recipient's username">
                                </form>
                            </div>
                        </li>


                        <li class="dropdown d-none d-md-inline-block">
                            <a class="nav-link dropdown-toggle waves-effect waves-light arrow-none"
                                data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                                aria-expanded="false">
                                <img src="{{ asset('uploads/users/avatars') }}/{{ auth()->user()->avatar ?? 'user.png' }}"
                                    alt="user-image" class="me-0 me-sm-1" height="18">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated">

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <img src="{{ asset('assets/images/flags/germany.jpg') }}" alt="user-image"
                                        class="me-1" height="12"> <span class="align-middle">German</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <img src="{{ asset('assets/images/flags/italy.jpg') }}" alt="user-image"
                                        class="me-1" height="12"> <span class="align-middle">Italian</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <img src="{{ asset('assets/images/flags/spain.jpg') }}" alt="user-image"
                                        class="me-1" height="12"> <span class="align-middle">Spanish</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <img src="{{ asset('assets/images/flags/russia.jpg') }}" alt="user-image"
                                        class="me-1" height="12"> <span class="align-middle">Russian</span>
                                </a>

                            </div>
                        </li>

                        <li class="nav-link" id="theme-mode">
                            <i class="bx bx-moon font-size-24"></i>
                        </li>

                        <li class="dropdown">
                            <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light"
                                data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                                aria-expanded="false">
                                <img src="{{ asset('uploads/users/avatars') }}/{{ auth()->user()->avatar ?? 'user.png' }}"
                                    alt="user-image" class="rounded-circle">
                                <span class="ms-1 d-none d-md-inline-block">
                                    {{ auth()->user()->name ?? 'User' }}<i class="mdi mdi-chevron-down"></i>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                                <!-- item-->
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome !</h6>
                                </div>

                                <!-- item: Profile view -->
                                <a href="{{ route('profile.index') }}" class="dropdown-item notify-item">
                                    <i class="fe-user"></i>
                                    <span>Profile</span>
                                </a>

                                <!-- item: Edit account -->
                                <a href="{{ route('profile.edit') }}" class="dropdown-item notify-item">
                                    <i class="fe-edit"></i>
                                    <span>My Account</span>
                                </a>

                                <!-- item: Settings (placeholder) -->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-settings"></i>
                                    <span>Settings</span>
                                </a>

                                <!-- item: Lock screen (placeholder) -->
                                <a class='dropdown-item notify-item' href='pages-lock-screen.html'>
                                    <i class="fe-lock"></i>
                                    <span>Lock Screen</span>
                                </a>

                                <div class="dropdown-divider"></div>

                                <!-- Logout form -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                        class="dropdown-item notify-item border-0 bg-transparent text-start">
                                        <i class="fe-log-out"></i>
                                        <span>Logout</span>
                                    </button>
                                </form>

                            </div>
                        </li>

                    </ul>
                </div>
            </div>
            <!-- ========== Topbar End ========== -->

            <div class="px-3">

                <!-- Start Content-->
                <div class="container-fluid">
                    @yield('content')
                </div>
                <!-- end container -->

            </div> <!-- content -->

            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div>
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> © Adbur Rahim
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-none d-md-flex gap-4 align-item-center justify-content-md-end">
                                <p class="mb-0">Design & Develop by <a href="https://arahim-me/github.io/portfolio"
                                        target="_blank">Abdur Rahim</a> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <!-- App js -->
    <script src="{{ asset('assets/js/vendor.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>

    <!-- Knob charts js -->
    <script src="{{ asset('assets/libs/jquery-knob/jquery.knob.min.js') }}"></script>

    <!-- Sparkline Js-->
    <script src="{{ asset('assets/libs/jquery-sparkline/jquery.sparkline.min.js') }}"></script>

    <script src="{{ asset('assets/libs/morris.js/morris.min.js') }}"></script>

    <script src="{{ asset('assets/libs/raphael/raphael.min.js') }}"></script>

    {{-- Database Table Scripts --}}
    <!-- third party js -->
    <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-select/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>
    <!-- third party js ends -->
    <!-- Dashboard init-->
    <script src="{{ asset('assets/js/pages/dashboard.js') }}"></script>

    @stack('scripts')

</body>

</html>
