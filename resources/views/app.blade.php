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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.4.1/css/all.min.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/animate.min.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/magnific-popup.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/meanmenu.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/slick.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/default.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/style.css?date={{ now() }}">
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
                                        <div class="col-2">
                                            <div class="nav nav-pills" id="v-pills-tab" role="tablist"
                                                aria-orientation="vertical">

                                                <a class="active" data-toggle="pill" href="#tab-1">
                                                    <img src="{{ asset('mazia') }}/img/product/farniture-7.jpg"
                                                        class="w-100" alt="">
                                                </a>

                                            </div>
                                        </div>
                                        <div class="col-10">
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
                                                <div class="color-input">
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
                                        <div class="quick-quantity mt-60">
                                            <form action="#" method="POST">
                                                <button type="button" id="add_to_cart"
                                                    class="list-add-cart-btn primary-hover-btn border-0"
                                                    style="padding-left: 80px;padding-right: 80px;transition: all .5s;">
                                                    Tambah ke keranjang
                                                </button>
                                            </form>
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

    <!-- footer section end -->

    <!-- JS here -->
    <script src="{{asset('assets')}}/js/vendor/jquery-1.12.4.min.js"></script>
    <script>
        let url = "{{ config('app.api_url') }}/customer";
        let url_product = "{{ config('app.api_url') }}";
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
        function openModal(slug) {
            // Remove selectedSku from localStorage
            localStorage.removeItem('selectedSku');
            let selectedSku = null;

            // Reset value stock
            $('#value_stock').text(0);

            fetchProductDetails(slug, function(product) {
                $('#_product_name').text(product.name);
                $('#exampleModalCenter').modal('show');
                $('#_modal_single_product').html(`<span>${currency(product.min_price.consumer_price_idr)}</span>–<span>${currency(product.max_price.consumer_price_idr)}</span>`);
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
                            image_url: sku_.image_url
                        };

                        colorData[colorName].push(skuSave);
                    }
                });
                localStorage.setItem('sku_modal', JSON.stringify(product.skus));
                populateColorOptions(product.skus);
                // populateSizeAndMaterialOptions(colorData);

                //save skuModalColors to local storag
                populateModalTabs(product.skus);
                $('#_warna_modals').on('click', '.color-input', selectColorHandler);
            });
        }

        function fetchProductDetails(slug, callback) {
            get(url_product + "/all-products?filter[slug]=" + slug, function(err, data) {
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
                        <a data-code="${sku_.code}" class="nav-link ${processedColors.size == 1 ? "active" : ''}" id="tab-${sku_.code}-tab" data-toggle="pill" href="#${sku_.code}" role="tab" aria-controls="${sku_.properties.color}" aria-selected="${processedColors.size == 1 ? "true" : "false"}">
                            <img src="${sku_.image_url}" class="" width="20px" alt="">
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

                    let colorNames = colorName.replace(/_/g, ' ');
                    let colorCode = getColorCode(colorNames);
                    $('#_warna_modals').append(`
                        <div class="color-input" data-color="${colorName}" onclick="getSize('${skusCode}')">
                            <label for="${colorName}" class="color-ok"
                                style="background-color: ${sumStock > 0 ? colorCode : colorCode}; position: relative; display: inline-block;">
                                ${sumStock > 0 ? '' : ' <span style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); font-size:30px;color:red">X</span>'}
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
                    material: s.properties.material,
                    stock: s.stock,
                    code: s.code
                };
            });
            var addedSizes = {};
            $('#select_size').html('');
            $('#select_material').html('');
            $.each(filter, function (i, sku) {
                if (sku.stock > 0) {
                    $('#select_size').append(`
                        <label for="${sku.size}" class="size-label" onClick="getMaterial('${sku.code}')">
                            <span class="p-1">${sku.size}</span>
                        </label>
                        <input type="radio" class="d-none" id="${sku.size}">
                    `);
               }
            });

            $('#select_material .material-label').first().click();
        }

        function getMaterial(sku) {
            let data = JSON.parse(localStorage.getItem('sku_modal'));
            var filteredData = whereIn(data, sku);
            console.log("getMaterial", sku);
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
                $('#select_material').append(`
                    <label for="${sku.material}" class="material-label" onClick="getStock('${sku.code}')">
                        <span class="p-1">${sku.material}</span>
                    </label>
                    <input type="radio" class="d-none" id="${sku.material}">
                `);

                $('#value_stock').text(sku.stock);
            });
        }

        function getStock(sku) {
            let data = JSON.parse(localStorage.getItem('sku_modal'));
            var filteredData = whereIn(data, sku);
            localStorage.setItem('selectedSku',  JSON.stringify(filteredData[0]));
        }


        function populateSizeAndMaterialOptions(skus) {
            let processedSize = new Set();
            var addedSizes = {};
            var addMaterial = {};
            $('#select_size').html('');
            $('#select_material').html('');
            $.each(skus, function (i, sku) {
                var size = sku[0].size;
                var material = sku[0].material;
                if (!addedSizes[size]) { // Periksa apakah ukuran belum ditambahkan
                    // Tambahkan label dan radio button untuk ukuran yang belum ditambahkan
                    $('#select_size').append(`
                        <label for="${size}" class="size-label">
                            <span class="p-1">${size}</span>
                        </label>
                        <input type="radio" class="d-none" id="${size}">
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


        function selectColorHandler(e) {
            let selectedColor = $(this).data('color');
            $(`#v-pills-tab a[href="#${selectedColor}"]`).tab('show');
            let code = $(`#v-pills-tab a[href="#${selectedColor}"]`).data('code');
            let sku_modal = JSON.parse(localStorage.getItem('colorData'));

            $('.color-input').find('label').css('border','');
            $(this).find('label').css('border', '2px solid #e174b8');
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
            var colors = [
                {name: "Cream", code: "#FFFDD0"},
                {name: "Navy", code: "#000080"},
                {name: "Soft Pink", code: "#FFB6C1"},
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