<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Mazia - Clean Minimal eCommerce HTML5 Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets')}}/img/favicon.ico">
    <!-- Place favicon.ico in the root directory -->
    <!-- CSS here -->
    <link rel="stylesheet" href="{{asset('assets')}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/fontawesome.min.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/animate.min.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/magnific-popup.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/meanmenu.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/slick.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/default.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/style.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/responsive.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.css">
</head>

<body>

<!-- preloader -->
<div id="loader-wrapper">
    <div id="loader"></div>
</div>


<!-- header section start -->
<x-header></x-header>
<!-- header section end -->
@yield('content')
<!-- footer section start -->
<x-footer></x-footer>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
    Launch demo modal
</button>
{{--modal--}}
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="_product_name"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="single-product-top">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-12">
                            <div class="shop-img">
                                <div class="row">
                                    <div class="col-2">
                                        <div class="nav nav-pills" id="v-pills-tab" role="tablist"
                                             aria-orientation="vertical">
                                            <a class="active" data-toggle="pill" href="#tab-1">
                                                <img src="{{asset('assets/img')}}/product/farniture-7.jpg"
                                                     class="w-100" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-10">
                                        <div class="tab-content" id="v-pills-tabContent">

                                            <div class="tab-pane fade" id="tab-4">
                                                <div class="product-img">
                                                    <a class="popup-image"
                                                       href="img/product/farniture-10.jpg"><img
                                                            src="{{asset('assets/img')}}/product/farniture-10.jpg"
                                                            class="w-100" alt=""></a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-12">
                            <div class="single-product-sidebar">
                                <div class="product-content">
                                    <div class="single-product-price" id="_modal_single_product">

                                    </div>
                                    <div class="single-product-desc mb-2">
                                        <p></p>
                                    </div>
                                    <div class="single-product-component">
                                        <h6>Pilih Warna</h6>
                                        <div style="overflow: hidden;" class="mt-2" id="_warna_modals">
                                            <div class="color-input">
                                                <label for="gold"></label>
                                                <input type="radio" class="d-none" id="gold">
                                                <span>Gold</span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="single-product-component mt-15">
                                        <div class="size">
                                            <h6>Size: <span>3XL</span></h6>
                                            <form action="#">
                                                <label for="t-xl" class="active">3xl</label>
                                                <input type="radio" class="d-none" id="t-xl">
                                                <label for="xl">xl</label>
                                                <input type="radio" class="d-none" id="xl">
                                                <label for="xxl">xxl</label>
                                                <input type="radio" class="d-none" id="xxl">
                                            </form>
                                        </div>
                                    </div>
                                    <div class="quick-quantity mt-60">
                                        <form action="#" method="POST">
                                            <button type="submit"
                                                    class="list-add-cart-btn red-hover-btn border-0"
                                                    style="padding-left: 80px;padding-right: 80px;transition: all .5s;">
                                                add
                                                to
                                                cart
                                            </button>
                                        </form>
                                    </div>
                                    <div class="single-product-action mt-35">
                                        <ul>
                                            <li><a href="wishlist.html"><i class="fal fa-heart"></i> add to
                                                    wishlist</a></li>
                                            <li><a href="cart.html"><i class="fal fa-abacus"></i> add to compare</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="sku"><span>Sku: </span> <strong>M-Hat-8</strong></div>
                                    <div class="single-product-category">
                                        <ul>
                                            <li class="mb-0"><a href="javascript:void(0)" class="title">Categories: </a>
                                            </li>
                                            <li class="mb-0"><a href="shop4.html">Chair &amp; Table</a></li>
                                            <li class="mb-0"><a href="shop4.html">Chairs</a></li>
                                            <li class="mb-0"><a href="shop4.html">Handbeg</a></li>
                                        </ul>
                                    </div>
                                    <div class="share-product mt-20">
                                        <ul>
                                            <li><a href="javascript:void(0)" class="title">Share this
                                                    product</a></li>
                                            <li><a href="javascript:void(0)" data-toggle="tooltip"
                                                   data-placement="top"
                                                   title="facebook"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="javascript:void(0)" data-toggle="tooltip"
                                                   data-placement="top"
                                                   title="twitter"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="javascript:void(0)" data-toggle="tooltip"
                                                   data-placement="top"
                                                   title="pinterest"><i class="fab fa-pinterest"></i></a></li>
                                            <li><a href="javascript:void(0)" data-toggle="tooltip"
                                                   data-placement="top"
                                                   title="google +"><i class="fab fa-google-plus-g"></i></a>
                                            </li>
                                            <li><a href="javascript:void(0)" data-toggle="tooltip"
                                                   data-placement="top"
                                                   title="Linkdin"><i class="fab fa-linkedin-in"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- footer section end -->

<!-- JS here -->
<script src="{{asset('assets')}}/js/vendor/jquery-1.12.4.min.js"></script>
<script>
    let url = "https://naisha-backend.test/api";
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
<script src="{{asset('assets')}}/js/popper.min.js"></script>
<script src="{{asset('assets')}}/js/bootstrap.min.js"></script>
<script src="{{asset('assets')}}/js/owl.carousel.min.js"></script>
<script src="{{asset('assets')}}/js/isotope.pkgd.min.js"></script>
<script src="{{asset('assets')}}/js/one-page-nav-min.js"></script>
<script src="{{asset('assets')}}/js/slick.min.js"></script>
<script src="{{asset('assets')}}/js/jquery.meanmenu.min.js"></script>
<script src="{{asset('assets')}}/js/ajax-form.js"></script>
<script src="{{asset('assets')}}/js/fontawesome.min.js"></script>
<script src="{{asset('assets')}}/js/wow.min.js"></script>
<script src="{{asset('assets')}}/js/jquery.scrollUp.min.js"></script>
<script src="{{asset('assets')}}/js/imagesloaded.pkgd.min.js"></script>
<script src="{{asset('assets')}}/js/jquery.magnific-popup.min.js"></script>
<script src="{{asset('assets')}}/js/plugins.js"></script>
<script src="{{asset('assets')}}/js/main.js"></script>
<script src="{{asset('')}}/component.js"></script>
@stack('js')

<script>
    function openModal(slug) {
        //get product details
        get(url + "/all-products?filter[slug]=" + slug, function (err, data) {
            let product = data.data[0];
            $('#_product_name').text(product.name);
            $('#exampleModalCenter').modal('show');
            $('#_modal_single_product').html(`<span>${currency(product.min_price.consumer_price_idr)}</span>–<span>${currency(product.max_price.consumer_price_idr)}</span>`)
            $('#_warna_modals').html('');
            //each sku

            let uniqueColors = new Set(product.skus.map((sku) => sku.properties.color));


            let warna = Array.from(uniqueColors).map((color) => {
                return `<div class="color-input">
                <label for="${color}" style="background-color: ${colors(color)};"></label>
                <input type="radio" class="d-none" id="${color}">
                <span>${color}</span>
            </div>`
            });
            $('#_warna_modals').html(warna.join(''));
        });
    }

    function colors(name) {
        var colors = [
            {name: "Baby Blue", code: "#89CFF0"},
            {name: "Army", code: "#4B5320"},
            {name: "Black", code: "#000000"},
            {name: "Mauve", code: "#E0B0FF"},
            {name: "Mocca", code: "#6F4E37"}
        ];

        var foundColor = colors.find((color) => color.name === name);
        if (foundColor) {
            return foundColor.code;
        } else {
            console.error("Warna '" + name + "' tidak ditemukan.");
            return null; // atau Anda dapat mengembalikan nilai default, misalnya "#FFFFFF"
        }
    }
</script>
</body>

</html>
