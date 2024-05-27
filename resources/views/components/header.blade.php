<header class="header header-2 pt-30 pb-20  header-sticky header-static"
    style="padding-top: 30px; padding-bottom: 15px; top: 0px; background:#e174b8; color:white">
    <div class="container-fluid">
        <div class="header-nav header-nav-2 position-relative">
            <div class="row align-items-center">
                <div class="col-xl-5 col-lg-6 hidden-md position-static" style="color:white">
                    <div class="header-nav">
                        <nav>
                            <ul style="color:white">
                                <li><a href="/" class="active"><span>Home </span></a></li>
                                <li><a href="/"><span style="color:white">Kategori?</span></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-3">
                    <div class="logo">
                        <a href="/"><img src="{{asset('')}}/logo.png" alt=""></a>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-3 col-6 col-md-6 col-sm-6 col-9">
                    <div class="header-right">
                        <ul class="text-right" style="color:white">
                            <li><a href="javascript:void(0)" class="_top-search" style="color:white"><i
                                        class="fal fa-search"></i></a>

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
                                <a href="javascript:void(0)" style="color:white"><i class="fal fa-shopping-bag"><span
                                            id="cart-count"></span></i></a>
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
                                            <a href="cart"
                                                class="generic-btn black-hover-btn text-uppercase w-100 mb-20">View
                                                cart</a>
                                            <a href="checkout"
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
        <div class="mobile-menu visible-sm " style="color:white">
            <div id="mobile-menu" style="display: block;">
                <ul>

                </ul>
            </div>
        </div>
        <!-- /. mobile nav -->
    </div>
</header>