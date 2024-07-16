<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Naisha Inspirasi Muslimah</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png"
        href="https://s3-ap-southeast-1.amazonaws.com/technoidea%2Fgallery/favicon-25464-cc3b915a-499c-41ed-bd52-39d1dd57e610.png" />

    @yield('meta')

    <link rel="stylesheet" href="{{asset('assets')}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.4.1/css/all.min.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/animate.min.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/magnific-popup.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/meanmenu.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/slick.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/default.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/style.css?date={{ time() }}">
    <link rel="stylesheet" href="{{asset('assets')}}/css/responsive.css?date={{ time() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    @stack('css')
    @php
    $user = request()->session()->get('loginUser');
    @endphp
    <!-- Google Tag Manager -->
    <script>
        (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-MPT93JHS');
    </script>
    <!-- End Google Tag Manager -->

    <style>
        .strikethrough {
            text-decoration: line-through;
        }

        .whatsapp-button {
            position: fixed;
            bottom: 20px;
            right: 55px;
            z-index: 1000;
        }

        .whatsapp-button img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .whatsapp-button img:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        #loader-wrapper-new {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.8);
            /* Semi-transparent background */
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
            /* Ensure it is above all other elements */
        }

        #loader-wrapper-new img {
            width: 500px;
            /* Adjust the size as needed */
            height: auto;
        }

        .nav-scroll {
            max-height: 468px;
            /* Adjust the height as needed */
            overflow-y: auto;
        }

        /* Media query for mobile screens */
        @media (max-width: 767px) {

            .nav-scroll {
                max-height: 250px;
                /* Adjust the height as needed */
                overflow-y: auto;
            }

            #product-list .col-xl-3,
            #product-list .col-lg-3,
            #product-list .col-md-4,
            #product-list .col-sm-6,
            #product-list .col-12 {
                flex: 0 0 50%;
                /* Set width to 25% for four columns */
                max-width: 50%;
                /* Set max-width to 50% for four columns */
            }

            #product-list .col-12 {
                width: 50%;
                /* Ensure the width is also set to 50% */
            }

            .product-box .product-img .product-img-link {
                display: none;
            }

            .price-switcher span.price {
                font-size: 10px
            }

            .product-desc a.product-title {
                font-size: 10px;
            }

            .mean-container a.meanmenu-reveal {
                left: 134px !important;
            }

            #product-list .product-box .product-box-wrapper {
                width: 100% !important;
                /* Ensure the product box wrapper takes full width */
            }

            .product-img .sale {
                display: none;
            }

            .nav_ {
                display: none;
            }

            .product-box {
                margin-bottom: 20px;
            }

            .single-slider {
                min-height: 208px
            }

            .mt-100 {
                margin-top: 30px;
            }
        }

        #product-list {
            display: flex;
            flex-wrap: wrap;
        }
    </style>
</head>

<body>

    <!-- preloader -->
    <div id="loader-wrapper-new">
        <img src="{{ asset('newAssets/reload-cat.gif') }}" alt="">
    </div>

    <!-- header section start -->
    <x-header></x-header>
    <!-- header section end -->
    @yield('content')

    <!-- footer section start -->
    <x-footer></x-footer>

    {{--modal--}}
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                        <div class="col-3">
                                            <div class="nav nav-pills nav-scroll" id="v-pills-tab" role="tablist"
                                                aria-orientation="vertical">

                                                <a class="active" data-toggle="pill" href="#tab-1">
                                                    <img src="{{ asset('mazia') }}/img/product/farniture-7.jpg"
                                                        class="w-100" alt="">
                                                </a>

                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <div class="tab-content" id="v-pills-tabContent">

                                                <div class="tab-pane fade show active" id="tab-1">
                                                    <div class="product-img">
                                                        <a class="popup-image" href="img/product/farniture-7.jpg"><img
                                                                src="{{ asset('mazia') }}/img/product/farniture-7.jpg"
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
                                                <div class="color-input size-label">
                                                    <label for="gold"></label>
                                                    <input type="radio" class="d-none" id="gold">
                                                    <span>Gold</span>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="single-product-component mt-10" id="_size_show">
                                            <div class="size">
                                                <h6>Size: <span id="value_size"></span></h6>
                                                <div id="select_size">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="single-product-component mt-10" id="_material_show">
                                            <div class="size">
                                                <h6>Material: <span id="value_material"></span></h6>
                                                <div id="select_material">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="single-product-component mt-10">
                                            <div class="size">
                                                <h6>Stok: <span id="value_stock"></span></h6>
                                            </div>
                                        </div>
                                        <div class="quick-quantity mt-20">

                                            <button type="button" id="add_to_cart" style="width: 100%"
                                                class="list-add-cart-btn primary-hover-btn">
                                                Tambah ke keranjang
                                            </button>
                                        </div>
                                        <div class="quick-quantity mt-2">


                                            <button type="button" id="checkout_now" style="width: 100%"
                                                class="list-add-cart-btn primary-hover-btn">
                                                Checkout Sekarang
                                            </button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content mt-5">
                <div class="modal-header">
                    <h5 class="modal-title">Daftar / Masuk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row" id="form-login-modal">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer section end -->
    <a href="https://wa.me/6282110101011?text=Assalamualaikum%20misnha,%20saya%20dari%20web%20tertarik%20untuk%20membeli%20produk%20Naisha.%20Boleh%20diinfokan%20untuk%20harga%20spesial%20dan%20promo%20lainya?"
        class="whatsapp-button" target="_blank">
        <img src="https://png.pngtree.com/png-clipart/20190516/original/pngtree-whatsapp-icon-png-image_3584844.jpg"
            alt="WhatsApp">
    </a>
    <!-- JS here -->
    {{-- <script src="{{asset('assets')}}/js/vendor/jquery-1.12.4.min.js"></script> --}}
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script>
        let url = "{{ config('app.api_url') }}/customer";
        let url_product = "{{ config('app.api_url') }}";
        let specialProduct = JSON.parse(`{!! json_encode(config('naisha.special_product')) !!}`);

        document.querySelector('.whatsapp-button').addEventListener('click', function() {
            console.log('WhatsApp button clicked!');
        });

        $(document).ready(function() {
            $('#logout-btn').click(function() {
                logout();
            });
        });
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
    <script src="{{asset('')}}/component.js?date={{ time() }}"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        lucide.createIcons();
    </script>
    @stack('js')

    <script>
        function openModal(slug, close = null) {
            // Remove selectedSku from localStorage
            localStorage.removeItem('selectedSku');
            let selectedSku = null;

            // Reset value stock
            $('#value_stock').text(0);

            fetchProductDetails(slug, function(product) {
                $('#_product_name').text(product.name);
                $('#_modal_single_product').html(`
                    <span>
                        ${product.min_price.consumer_price_idr === product.max_price.consumer_price_idr ? currency(product.skus[0].price.special_price > 0 ? product.skus[0].price.special_price : product.min_price.consumer_price_idr) : currency(product.min_price.consumer_price_idr) + '–' + currency(product.max_price.consumer_price_idr)}
                    </span>
                `);
                $('#_warna_modals').html('');
                $('#v-pills-tabContent').html('');
                $('#v-pills-tab').html('');

                let colorData = {}; // Object to store SKU data organized by color
                let processedColors = new Set();
                $.each(product.skus, function (i, sku_) {
                    let colorName = sku_.properties.color.replace(/ /g, '_');
                    if (!processedColors.has(colorName)) {
                        processedColors.add(colorName);

                        colorData[colorName] = [];
                        let skuSave = {
                            size: sku_.properties.size,
                            material: sku_.properties.material,
                            stock: sku_.stock,
                            code: sku_.code,
                            image_url: sku_.image_url,
                            price: sku_.price.consumer
                        };

                        colorData[colorName].push(skuSave);
                    }
                });
                localStorage.setItem('sku_modal', JSON.stringify(product.skus));
                populateColorOptions(product.skus);
                populateModalTabs(product.skus);
                $('#_warna_modals').on('click', '.color-input', selectColorHandler);
                $('#v-pills-tab').on('click', '.tab_color', selectColorHandler);
                if (!close) {
                    $('#exampleModalCenter').modal('show');
                }
                $("#_name_product").text(product.name);
            });
        }

        function fetchProductDetails(slug, callback) {
            get(`{{ route('products') }}?slug=` + slug, function(err, data) {
                if (err || !data || !data.data || data.data.length === 0) {
                    console.error("Error retrieving product data", err);
                    return;
                }
                let product = data.data[0];
                callback(product);
            });
        }

        function populateModalTabs(skus) {
            let processedColors = new Set();

            $.each(skus, function (i, sku_) {
                let colorName = sku_.properties.color.replace(/ /g, '_');

                if (!processedColors.has(colorName)) {
                    processedColors.add(colorName);

                    $('#v-pills-tabContent').append(`
                        <div class="tab-pane fade show ${processedColors.size == 1 ? "active" : ''}" id="${sku_.code}">
                            <div class="product-img">
                                <a class="popup-image" href="javascript:void(0)">
                                    <img src="${sku_.image_url}" class="w-100" alt="">
                                </a>
                            </div>
                        </div>
                    `);

                    $('#v-pills-tab').append(`
                        <a data-code="${sku_.code}"
                            onclick="getSize('${sku_.code}')" onClick="getStock('${sku_.code}')" onClick="getMaterial('${sku_.code}')" data-color_name="${sku_.properties.color}"
                            class="tab_color nav-link ${processedColors.size == 1 ? "active" : ''}" id="tab-${sku_.code}-tab" data-toggle="pill" href="#${sku_.code}" role="tab" aria-controls="${sku_.properties.color}" aria-selected="${processedColors.size == 1 ? "true" : "false"}">
                            <img src="${sku_.image_url}" class="" width="40px" alt="">
                        </a>
                    `);
                }
            });

        }

        function populateColorOptions(skus) {
            $('#select_size').html('');
            $('#select_material').html('');

            let skusByColorCode = {};

            $.each(skus, function (i, sku) {

                let colorName = sku.properties.color.replace(/ /g, '_');
                // If the color doesn't exist in the skusByColor object, create a new array for it
                if (!skusByColorCode[colorName]) {
                    skusByColorCode[colorName] = [];
                }
                skusByColorCode[colorName].push(sku);
            });

            localStorage.setItem('colorData', JSON.stringify(skusByColorCode));

            $.each(skusByColorCode, function (colorName, sku) {
                    //sum stock

                    let sumStock = sku.reduce((acc, curr) => acc + curr.stock, 0);
                    let skusCode = sku.map(s => s.code);
                    let colorArray = sku.map(s => s.properties.color);

                    // Convert array to a comma-separated string
                    let uniqueColors = [...new Set(colorArray)];
                    let color = uniqueColors.join(',');

                    let colorNames = colorName.replace(/_/g, ' ');
                    let colorCode = getColorCode(colorNames);
                    $('#_warna_modals').append(`
                        <div class="color-input"data-code="${skusCode}" data-color="${colorName}" onclick="getSize('${skusCode}')">
                            <label for="${colorName}" class="color-ok border  ${sumStock > 0 ? '' :'strikethrough'} " data-code="${skusCode}"
                                position: relative; display: inline-block;">
                                <span class="p-1">${color.split(',')[0]}</span>
                            </label>
                            <input type="radio" class="d-none" id="${colorName}" name="color" data-color="${colorName}">
                        </div>
                    `);
            });

            //click first color with stock > 0
            $('#_warna_modals .color-input').first().click();
            $('#select_size .size-label').first().click();
            $('#select_material .material-label').first().click();
        }

        function whereIn(array, values) {
            return array.filter(function(item) {
                return values.includes(item.code);
            });
        }

        function getSize(skus) {
            //get sku_modal from local storage
            let data = JSON.parse(localStorage.getItem('sku_modal'));
            var valuesToSearch = skus.split(",");
            var filteredData = whereIn(data, valuesToSearch);
            let filter = filteredData.map(s => {
                return {
                    size: s.properties.size,
                    stock: s.stock,
                    code: s.code
                };
            });
            var addedSizes = {};
            $('#select_size').html('');
            $('#select_material').html('');
            $.each(filter, function (i, sku) {
                let size = sku.size.replace(/[^a-zA-Z0-9]/g, '_');
                let escapedSize = size.replace(/([!"#$%&'()*+,./:;<=>?@[\\\]^`{|}~])/g, '\\$1');
                if (sku.stock > 0) {
                    $('#select_size').append(`
                        <label for="${escapedSize}" class="size-label" onClick="getMaterial('${sku.code}')">
                            <span class="p-1">${sku.size}</span>
                        </label>
                        <input type="radio" class="d-none" id="${escapedSize}">
                    `);
               }
            });

            $('#select_material .material-label').first().click();

        }

        function getMaterial(sku) {
            let data = JSON.parse(localStorage.getItem('sku_modal'));
            var filteredData = whereIn(data, sku);
            let filter = filteredData.map(s => {
                return {
                    size: s.properties.size,
                    material: s.properties.material,
                    stock: s.stock,
                    code: s.code
                };
            });

            $('#select_material').html('');
            $.each(filter, function (i, sku) {
                // Check if material is valid
                if (sku.material) {
                    let material = sku.material.replace(/ /g, '_');
                    $('#select_material').append(`
                        <label for="${sku.material}" class="material-label" onClick="getStock('${sku.code}')">
                            <span class="p-1">${sku.material}</span>
                        </label>
                        <input type="radio" class="d-none" id="${material}">
                    `);
                } else {
                    console.warn('Encountered null or undefined material for SKU code: ', sku.code);
                }

                // Display stock information
                $('#value_stock').text(sku.stock);
            });
        }

        function getStock(sku) {
            let data = JSON.parse(localStorage.getItem('sku_modal'));
            var filteredData = whereIn(data, sku);
            localStorage.setItem('selectedSku',  JSON.stringify(filteredData[0]));

                    //filter data by code
                    var filteredData = whereIn(data, sku);
                    //get size and material
                    if (filteredData[0].price.special_price != null) {
                        $('#_modal_single_product').html(`<s>${currency(filteredData[0].price.consumer)}</s><br><span class="ml-1 text-sm">${currency(filteredData[0].price.special_price)}</span>`);
                    } else {
                        $('#_modal_single_product').html(`<span>${currency(filteredData[0].price.consumer)}</span>`);
                    }
        }


        function populateSizeAndMaterialOptions(skus) {
            let processedSize = new Set();
            var addedSizes = {};
            var addMaterial = {};
            $('#select_size').html('');
            $('#select_material').html('');
            $.each(skus, function (i, sku) {
                let size = sku[0].size.replace(/[^a-zA-Z0-9]/g, '_');
                let escapedSize = size.replace(/([!"#$%&'()*+,./:;<=>?@[\\\]^`{|}~])/g, '\\$1');
                var material = sku[0].material;
                if (!addedSizes[size]) { // Periksa apakah ukuran belum ditambahkan
                    // Tambahkan label dan radio button untuk ukuran yang belum ditambahkan
                    $('#select_size').append(`
                        <label for="${material}" class="size-label">
                            <span class="p-1">${size}</span>
                        </label>
                        <input type="radio" class="d-none" id="${escapedSize}">
                    `);
                    addedSizes[size] = true; // Tandai ukuran sebagai sudah ditambahkan
                }

                if (addMaterial[material]) {
                    $('#select_material').append(`
                        <label for="${material}" class="material-label">
                            <span class="p-1">${material}</span>
                        </label>
                        <input type="radio" class="d-none" id="${material}">
                    `);
                    addMaterial[material] = true;
                }
            });
        }


        let isColorHandlerRunning = false;

            function selectColorHandler(e) {
                if (isColorHandlerRunning) return;
                isColorHandlerRunning = true;

                try {
                    let selectedColor = $(this).data('code');
                    let $selectedTab = $(`#v-pills-tab a[href="#${selectedColor}"]`).click();

                    let sku_modal = JSON.parse(localStorage.getItem('colorData'));

                    //add active class color white and remove active class
                    $('#_warna_modals label').removeClass('active').css({
                        'color': 'black',
                        'background-color': 'white'
                    });

                    $('#_warna_modals span').removeClass('active').css({
                        'color': 'black',
                    });

                    $(this).find('label').addClass('active').css({
                        'color': 'black',
                        'background-color': 'black'
                    });

                    $(this).find('span').addClass('active').css({
                        'color': 'white',
                    });

                    $('#value_stock').text("Sold Out");

                    $('#select_size .size-label:first').click();
                    $('#select_material .material-label:first').click();

                    let data_color_name = $(this).data('color_name');

                    if (data_color_name) {
                        data_color_name = data_color_name.replace(/ /g, '_');
                        // Find from text
                        let label = $(`label[for="${data_color_name}"]`);
                        label.addClass('active').css({
                            'color': 'white',
                            'background-color': 'black'
                        });

                        label.find('span').css({
                            'color': 'white',
                        });
                    } else {
                        // console.error('data_color_name is undefined');
                    }

                    //get sku_modal from local storage
                    let data = JSON.parse(localStorage.getItem('sku_modal'));
                    //filter data by code
                    var filteredData = whereIn(data, selectedColor);
                    //get size and material
                    if (filteredData[0].price.special_price != null) {
                        $('#_modal_single_product').html(`<s>${currency(filteredData[0].price.price_web)}</s><br><span class="text-sm">${currency(filteredData[0].price.special_price)}</span>`);
                    } else {
                        $('#_modal_single_product').html(`<span>${currency(filteredData[0].price.consumer)}</span>`);
                    }
                } finally {
                    isColorHandlerRunning = false;
                }
            }

        function sizeHandler(e) {
            let selectedSize = $(this).data('code');
            let sku_modal = JSON.parse(localStorage.getItem('sku_modal'));
            selectedSku = sku_modal.find(sku => sku.code == code);
        }

        $(document).on('click', '#add_to_cart', function () {
            let selectedSku = localStorage.getItem('selectedSku');
            if (selectedSku == null) {
                return $.toast({
                    text: "Pilih warna, ukuran, dan material terlebih dahulu",
                    showHideTransition: 'slide',
                    bgColor: '#f5365c',
                    textColor: 'white',
                    allowToastClose: false,
                    hideAfter: 3000,
                    stack: 5,
                    textAlign: 'left',
                    position: 'bottom-right',
                    icon: 'error'
                });
            }

            selectedSku = JSON.parse(selectedSku);
            if (selectedSku.stock == 0) {
                $.toast({
                    text: "Stok habis",
                    showHideTransition: 'slide',
                    bgColor: '#f5365c',
                    textColor: 'white',
                    allowToastClose: false,
                    hideAfter: 3000,
                    stack: 5,
                    textAlign: 'left',
                    position: 'bottom-right',
                    icon: 'error'
                });
            }else{
                AddCart(selectedSku);
            }
        });

        $(document).on('click', '#checkout_now', function () {
            let selectedSku = localStorage.getItem('selectedSku');
            if (selectedSku == null) {
                return $.toast({
                    text: "Pilih warna, ukuran, dan material terlebih dahulu",
                    showHideTransition: 'slide',
                    bgColor: '#f5365c',
                    textColor: 'white',
                    allowToastClose: false,
                    hideAfter: 3000,
                    stack: 5,
                    textAlign: 'left',
                    position: 'bottom-right',
                    icon: 'error'
                });
            }

            selectedSku = JSON.parse(selectedSku);
            if (selectedSku.stock == 0) {
                $.toast({
                    text: "Stok habis",
                    showHideTransition: 'slide',
                    bgColor: '#f5365c',
                    textColor: 'white',
                    allowToastClose: false,
                    hideAfter: 3000,
                    stack: 5,
                    textAlign: 'left',
                    position: 'bottom-right',
                    icon: 'error'
                });
            }else{
                AddCart(selectedSku);
                // Redirect to checkout page
                window.location.href = "{{ route('checkout') }}";
            }
        });


        $(document).on('click', '.size-label', function () {
            // Remove active class from all labels
            $('.size-label').removeClass('active');
            // Add active class to the clicked label
            $(this).addClass('active');
            // Set the corresponding radio button to checked
            $(`#${$(this).attr('for')}`).prop('checked', true);
        });

        $(document).on('click', '.material-label', function () {
            // Remove active class from all labels
            $('.material-label').removeClass('active');
            // Add active class to the clicked label
            $(this).addClass('active');
            // Set the corresponding radio button to checked
            $(`#${$(this).attr('for')}`).prop('checked', true);
        });

        function getColorCode(name) {
            const colorName = name.split(/[\(\)]/)[0].trim();
            var colors = [
                {name: "Cream", code: "#FFFDD0"},
                {name: "Navy", code: "#000080"},
                {name: "Soft pink", code: "#FFB6C1"},
                {name: "Soft Pink", code: "#FFB6C1"},
                {name: "Soft_Pink", code: "#FFB6C1"},
                {name: "Baby Blue", code: "#89CFF0"},
                {name: "Army", code: "#4B5320"},
                {name: "Black", code: "#000000"},
                {name: "Mauve", code: "#E0B0FF"},
                {name: "Mocca", code: "#6F4E37"},
                {name: "Browny", code: "#8d726b"},
                {name: "Dusty Pink", code: "#D4A190"},
                {name: "Milo", code: "#c6a699"},
                {name: "Rose Brown", code: "#BC8F8F"},
                {name: "Salem", code: "#e2b1ac"},
                {name: "Silver", code: "#C0C0C0"},
                {name: "Abalone", code: "#aea2b0"},
                {name: "Alpha", code: "#A5A5A5"},
                {name: "Blissful", code: "#F0F8FF"},
                {name: "Calm", code: "#AFEEEE"},
                {name: "Elegant", code: "#87CEEB"},
                {name: "Lovely", code: "#FFA07A"},
                {name: "Charcoal", code: "#2a2927"},
                {name: "Indigo Blue", code: "#4c4b5d"},
                {name: "Ivory", code: "#dedad7"},
                {name: "Skirt Black", code: "#000000"},
                {name: "Tunic Black", code: "#000000"},
                {name: "Tunic Browny", code: "#92807c"},
                {name: "Tunic Dark Grey", code: "#85848a"},
                {name: "Tunic Dusty Pink", code: "#dcc0bf"},
                {name: "Tunic Golden Brown", code: "#d4b7a3"},
                {name: "Skirt Steel Grey", code: "#d9d8dd"},
                {name: "Tunic Black + Skirt Steel Grey", code: "#d9d8dd"},
                {name: "Tunic Browny + Skirt Black", code: "#91807c"},
                {name: "Tunic Dark Grey + Skirt Steel Grey", code: "#FFA07A"},
                {name: "Tunic Dusty Pink + Skirt Steel Grey", code: "#dbbfbe"},
                {name: "Tunic Golden Brown + Skirt Black", code: "#d4b6a3"},
                // New colors
                {name: "Beige", code: "#F5F5DC"},
                {name: "Butter", code: "#FFD700"},
                {name: "Caramel", code: "#D2691E"},
                {name: "Coffee", code: "#6F4E37"},
                {name: "Dark Coffee", code: "#4B3621"},
                {name: "Dusty Purple", code: "#AF868E"},
                {name: "Light Beige", code: "#F5F5DC"},
                {name: "Smoke Grey", code: "#7D7F7D"},
                {name: "Broken White", code: "#EEE8AA"}, // Assuming a shade for Broken White
                {name: "Golden Brown", code: "#996515"},
                {name: "Golden brown", code: "#996515"},
                {name: "Light Grey", code: "#D3D3D3"},
                {name: "RANDOM", code: "#D3D3D3"},
                {name: "Choco", code: "#7B3F00"}, // Assuming a shade for Choco
                {name: "Grey", code: "#808080"},
                {name: "Wood", code: "#C19A6B"},
                {name: "Blue black", code: "#31354c"},
                {name: "Ginger bread", code: "#e38371"},
                {name: "Magenta", code: "#b75765"},
                {name: "Soft Punk", code: "#cfabb1"},
                {name: "Sage", code: "#c5b8a7"},
                {name: "Wallnut", code: "#c5b8a7"},
                {name: "Olive", code: "#a89c68"},
                {name: "Denim", code: "#9aa5c1"},
                {name: "Sky Blue", code: "#b5c9d2"},
                {name: "Golden", code: "#dcc1ae"},
                {name: "potong gamis", code: "#dcc1ae"},
                {name: "Purple", code: "#9b93a8"},
                {name: "Smoke grey", code: "#939e9a"},
                {name: "Soft green", code: "#929c99"},
                {name: "Grape", code: "#996c73"},
            ];

            var foundColor = colors.find((color) => color.name === colorName);
            if (foundColor) {
                return foundColor.code;
            } else {
                // console.error("Warna '" + name + "' tidak ditemukan.");
                return null; // atau Anda dapat mengembalikan nilai default, misalnya "#FFFFFF"
            }
        }
        //sticky
        $(window).on('scroll', function () {
            var scroll = $(window).scrollTop();
            if (scroll < 245) {
                //set background black
                $('.header').css({
                    'background': '#fff',
                    'color': '#000'
                });
            } else {
                //set background transparent
                $('.header').css({
                    'background': '#ffff',
                    'color': '#000'
                });

                // $('#promo_').css({
                //     'color': '#dfded7'
                // });
            }
        });

        @if (request()->session()->get('loginUser') == null)
            localStorage.removeItem('existing_address');
            localStorage.removeItem('address');
            localStorage.removeItem('courierSelected');
            localStorage.removeItem('selectedBank');
            localStorage.removeItem('voucher');
        @endif
    </script>

    @stack('script')
    <!-- Google Tag Manager (noscript) -->
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MPT93JHS" height="0" width="0"
            style="display:none;visibility:hidden">
        </iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript) -->

    {{-- new loading --}}

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var loader = document.getElementById('loader-wrapper-new');
            loader.style.display = 'none';
        });
    </script>

    <script>
        $(document).ready(function() {
            var $hamburgerMenu = $('.hamburger-menu');
            var $menu = $('#menu');

            $hamburgerMenu.on('click', function() {
                if ($menu.hasClass('hidden')) {
                    $menu.removeClass('hidden').addClass('visible');
                    $menu.find('ul').show();
                } else {
                    $menu.removeClass('visible').addClass('hidden');
                    $menu.find('ul').hide();
                }
            });
        });

        //if scroll id menu hide
        $(window).scroll(function () {
            $('#menu').removeClass('visible');
        });

        $('#login-btn').click(function() {
            $('#login').modal('show');
            formLogin()
        });

        function formLogin() {
            $('#form-login-modal').html(`
                <div class="col-12">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                        <small id="error_email" class="text-danger"></small>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}" required>
                        <small id="error_password" class="text-danger"></small>
                    </div>

                    <div class="form-group">
                        <button type="button" id="_btn_login" style="width: 100%" class="list-add-cart-btn primary-hover-btn">
                            Masuk
                        </button>
                        <button type="button" id="modal_daftar" style="width: 100%" class="list-add-cart-btn primary-hover-btn mt-2">
                            Belum Punya akun? Daftar
                        </button>
                    </div>
                </div>
            `)
        }

        function formDaftar() {
            $('#form-login-modal').html(`
            <div class="col-12">
                <div class="form-group">
                    <label for="email">Nama Lengkap</label>
                    <input type="text" class="form-control" id="register_name" name="name" value="{{ old('name') }}" required>
                    <small id="error_register_name" class="text-danger"></small>
                </div>

                <div class="form-group">
                    <label for="email">Email atau No WhatsApp</label>
                    <input type="text" class="form-control" id="register_email" name="email" value="{{ old('email') }}" required>
                    <small id="error_register_email" class="text-danger"></small>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="register_password" name="password" value="{{ old('password') }}"
                        required>
                    <small id="error_register_password" class="text-danger"></small>
                </div>

                <div class="form-group">
                    <button type="button" id="_btn_register" style="width: 100%" class="list-add-cart-btn primary-hover-btn">
                        Daftar
                    </button>
                    <button type="button" id="modal_login" style="width: 100%" class="list-add-cart-btn primary-hover-btn mt-2">
                        Sudah Punya akun? Masuk
                    </button>
                </div>
            </div>
            `)
        }

        $(document).on('click','#modal_daftar',function () {
            formDaftar()
        });

        $(document).on('click','#modal_login',function () {
            formLogin()
        });

        $(document).on('click','#_btn_register',function () {
            $.ajax({
                type: "post",
                url: "{{ route('register') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    name: $('#register_name').val(),
                    email: $('#register_email').val(),
                    password: $('#register_password').val(),
                    password_confirmation: $('#register_password').val(),
                },
                success: function (response) {
                    Swal.fire({
                        title: "Daftar Berhasil",
                        text: "Silahkan untuk melanjutkan berbelanja",
                        icon: "success",
                        allowOutsideClick: false,
                    })

                    $('#login').modal('hide');
                    setTimeout(() => {
                        location.reload();
                    }, 2000);
                },
                error: function (xhr, status, error) {
                    $.each(xhr.responseJSON.errors, function (i, v) {
                        $('#form-login-modal').find(`#error_register_${i}`).html('');
                        $('#form-login-modal').find(`#register_${i}`).removeClass('is-invalid')

                        $('#form-login-modal').find(`#error_register_${i}`).html(v[0]);
                        $('#form-login-modal').find(`#register_${i}`).addClass('is-invalid');

                        //remove error
                        $(document).on('keyup', `#register_${i}`, function () {
                            $('#form-login-modal').find(`#error_register_${i}`).html('');
                            $('#form-login-modal').find(`#register_${i}`).removeClass('is-invalid');
                        });
                    });
                }
            });

        });

        $(document).on('click','#_btn_login',function () {
            $.ajax({
                type: "post",
                url: "{{ route('login') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    email: $('#email').val(),
                    password: $('#password').val(),
                },
                success: function (response) {
                    Swal.fire({
                        title: "Login Berhasil",
                        text: "Silahkan untuk melanjutkan berbelanja",
                        icon: "success",
                        allowOutsideClick: false,
                    })

                    $('#login').modal('hide');
                    setTimeout(() => {
                        location.reload();
                    }, 2000);
                },
                error: function (xhr, status, error) {
                    $.each(xhr.responseJSON.errors, function (i, v) {
                        $('#form-login-modal').find(`#error_${i}`).html('');
                        $('#form-login-modal').find(`#${i}`).removeClass('is-invalid')

                        $('#form-login-modal').find(`#error_${i}`).html(v[0]);
                        $('#form-login-modal').find(`#${i}`).addClass('is-invalid');

                        //remove error
                        $(document).on('keyup', `#${i}`, function () {
                            $('#form-login-modal').find(`#error_${i}`).html('');
                            $('#form-login-modal').find(`#${i}`).removeClass('is-invalid');
                        });
                    });
                }
            });

        });

        function logout() {
            $.ajax({
                    type: "post",
                    url: "{{ route('logout') }}",
                    data: {
                        _token: "{{ csrf_token() }}"
                    },
                    success: function (response) {
                        console.log('Logout success:', response);
                        localStorage.removeItem('cart');
                        localStorage.removeItem('address');
                        localStorage.removeItem('courierSelected');
                        localStorage.removeItem('selectedBank');
                        localStorage.removeItem('voucher');
                        location.reload();
                    }
                });
        }
    </script>
</body>

</html>
