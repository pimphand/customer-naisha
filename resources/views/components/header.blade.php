<style>
    .hr {
        border-bottom: 1px solid #eceff8;
        border-top: 0 none;
        margin: 0px 0;
        padding: 0;
    }
</style>

<header class=""
    style="padding-top: 30px; padding-bottom: 10px;background:#000000; color:rgb(255, 255, 255)">
    <div class="header-nav header-nav-2 position-relative">
        <div class="row align-items-center">
            <div class="col-12 align-items-center" style="text-align: center;">
                <h6 style="color:rgb(255, 255, 255)" id="promo_">Free ongkir 15.000 minimal order 250.000</h6>
            </div>
        </div>
    </div>
</header>

<header class="header header-2  header-sticky header-static" style="padding-top: 20px; padding-bottom: 1px;">
    <div class="container-fluid"  style="background:#ffffff; color:rgb(0, 0, 0)">

        <div class="header-nav header-nav-2 position-relative">
            <div class="row align-items-center">
                <div class="col-xl-4 col-lg-6 hidden-md position-static" style="color:rgb(0, 0, 0)">
                    <div class=" header-nav">
                        <nav>
                            <ul style="color:rgb(0, 0, 0)">
                                <li>
                                    <a href="/" class="{{ request()->routeIs('home') ? " active" : "" }}">
                                        <span style="color:rgb(0, 0, 0)">Home</span>
                                    </a>
                                </li>
                                <li><a class="{{ request()->routeIs('catalog') ? " active" : "" }}"
                                        href="{{ route('catalog') }}">
                                        <span style="color:rgb(0, 0, 0)">CATALOG</span></a>
                                </li>
                                <li><a href="{{ route('catalog') }}?filter[from_newest]=1"><span style="color:rgb(0, 0, 0)">New Drop</span></a></li>
                                <li><a href="{{ route('catalog') }}"><span style="color:rgb(0, 0, 0)">Available Items</span></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class=" col-xl-4 col-lg-4 col-md-6 col-sm-6 col-4">
                    <div class="logo text-center">
                        <a href="/">
                            <img src="{{ asset('Logo-Naisha-Hitam.png') }}" alt="logo" width="100%">
                        </a>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-6 col-md-6 col-sm-6 col-9">
                    <div class="header-right">
                        <ul class="text-right" style="color:rgb(0, 0, 0)">
                            <li>
                                <a href=" javascript:void(0)" class="_top-search" style="color:rgb(0, 0, 0)">
                                    <i class=" fal fa-search"></i>
                                </a>

                                <!-- search popup -->
                                <div id="search-popup">
                                    <div class="close-search-popup">
                                        <i class="fal fa-times"></i>
                                    </div>
                                    <div class="search-popup-inner mt-135">
                                        <div class="search-title text-center">
                                            <h2>Search</h2>
                                        </div>

                                        <x-header-search></x-header-search>

                                    </div>
                                </div>
                            </li>

                            <li>
                                <a href="javascript:void(0)" style="color:rgb(0, 0, 0)"><i class=" fal
                                    fa-shopping-bag"><span id="cart-count"></span></i></a>
                                <div class="minicart">
                                    <div class="minicart-body">
                                        <div class="minicart-content">
                                            <ul class="text-left" id="list-cart">

                                            </ul>
                                        </div>
                                    </div>
                                    <div class="minicart-checkout">
                                        <div class="minicart-checkout-heading mt-8 mb-25 overflow-hidden">
                                            <strong class="float-left">Subtotal:</strong>
                                            <span class="price float-right" id="total-cart-ammount">Rp.0</span>
                                        </div>
                                        <div class="minicart-checkout-links">
                                            <a href="{{ route('checkout') }}"
                                                class="generic-btn black-hover-btn text-uppercase w-100 mb-20">Checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="mobile-menu visible-sm " style="color:rgb(255, 255, 255)">
            <div id="mobile-menu" style="display: block;">
                <ul style="color:rgb(0, 0, 0)">
                    <li><a href=" /" class="active"><span style="color:rgb(0, 0, 0)">Home</span></a></li>
                    <li><a href="/"><span style="color:rgb(0, 0, 0)">New Drop</span></a></li>
                    <li><a href="/"><span style="color:rgb(0, 0, 0)">Available Items</span></a></li>
                </ul>
            </div>
        </div>
        <!-- /. mobile nav -->
    </div>
</header>
