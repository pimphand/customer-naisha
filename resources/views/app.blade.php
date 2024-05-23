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
                                        <div class="single-product-component mt-10">
                                            <div class="size">
                                                <h6>Size: <span id="value_size"></span></h6>
                                                <div id="select_size">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="single-product-component mt-10">
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
    <script src="{{asset('')}}/component.js?date={{ now() }}"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        lucide.createIcons();
    </script>
    @stack('js')

    <script>
        function openModal(slug) {
            // get product details
            get(url_product + "/all-products?filter[slug]=" + slug, function (err, data) {
                let product = data.data[0];
                $('#_product_name').text(product.name);
                $('#exampleModalCenter').modal('show');
                $('#_modal_single_product').html(`<span>${currency(product.min_price.consumer_price_idr)}</span>–<span>${currency(product.max_price.consumer_price_idr)}</span>`);
                $('#_warna_modals').html('');
                $('#v-pills-tabContent').html(``)
                $('#v-pills-tab').html(``)

                // Membuat objek untuk menyimpan data stok berdasarkan warna, bahan, dan ukuran
                let stockData = {};

                // Iterasi melalui setiap sku untuk mengelompokkan stok berdasarkan warna, bahan, dan ukuran
                product.skus.forEach((sku) => {
                    let color = sku.properties.color;
                    let material = sku.properties.material;
                    let size = sku.properties.size;

                    // Membuat kunci unik berdasarkan warna, bahan, dan ukuran
                    let key = `${color}_${material}_${size}`;

                    // Jika kunci belum ada di objek stockData, buat array kosong untuknya
                    if (!stockData[key]) {
                        stockData[key] = [];
                    }

                    // Tambahkan stok ke dalam array yang sesuai dengan kunci
                    stockData[key].push({
                        color: color,
                        material: material,
                        size: size,
                        stock: sku.stock
                    });
                });

               // Define a set to keep track of processed colors
                let processedColors = new Set();

                $.each(product.skus, function (i, sku_) {
                    let colorName = sku_.properties.color.replace(/ /g, '_');

                    // Check if the color has already been processed
                    if (!processedColors.has(colorName)) {
                        // Add the color to the set
                        processedColors.add(colorName);

                        // Append the tab content
                        $('#v-pills-tabContent').append(`
                            <div class="tab-pane fade show ${processedColors.size == 1 ? "active" : ''}" id="${colorName}">
                                <div class="product-img">
                                    <a class="popup-image" href="javascript:void(0)">
                                        <img src="${sku_.image_url}" class="w-100" alt="">
                                    </a>
                                </div>
                            </div>
                        `);

                        // Append the tab
                        $('#v-pills-tab').append(`
                            <a data-code="${sku_.code}" class="nav-link ${processedColors.size == 1 ? "active" : ''}" id="tab-${colorName}-tab" data-toggle="pill" href="#${colorName}" role="tab" aria-controls="${sku_.properties.color}" aria-selected="${processedColors.size == 1 ? "true" : "false"}">
                                <img src="${sku_.image_url}" class="" width="20px" alt="">
                            </a>
                        `);

                    }
                });

                let processedSize= new Set();
                let processedMaterial= new Set();
                $('#select_size').html('');
                $('#select_material').html('');

                let sku_modal = product.skus;
                $.each(product.skus, function (is, sku_s) {
                    let size = sku_s.properties.size.replace(/ /g, '_');
                    let material = sku_s.properties.material.replace(/ /g, '_');
                    // Check if the color has already been processed
                    if (!processedSize.has(size)) {
                        // Add the color to the set
                        processedSize.add(size);
                        // Append the tab content
                        $('#select_size').append(`
                            <label for="${size}" class="size-label ${is == 0 ? "active" : ""}">
                                <span class="p-1">${sku_s.properties.size}</span>
                            </label>
                            <input type="radio" class="d-none" id="${size}">
                        `);
                    }

                    if (!processedMaterial.has(material)) {
                        // Add the color to the set
                        processedMaterial.add(material);
                        // Append the tab content
                        $('#select_material').append(`
                            <label for="${material}" class="material-label ${is == 0 ? "active" : ""}"><span class="p-1">${sku_s.properties.material}</span></label>
                            <input type="radio" class="d-none" id="${material}">
                        `);
                    }
                });



                // Tampilkan pilihan warna di modal
                let warna = Array.from(new Set(product.skus.map((sku) => sku.properties.color)));
                warna.forEach((colorName) => {
                    // Find the corresponding color code
                    let colorCode = getColorCode(colorName);
                    let sanitizedColorName = colorName.replace(/ /g, '_');
                    $('#_warna_modals').append(`
                        <div class="color-input" style="cursor: pointer;" data-color="${sanitizedColorName}">
                            <label for="${sanitizedColorName}" disabled class="color-ok" style="background-color: ${colorCode};"></label>
                            <input type="radio" class="d-none" id="${sanitizedColorName}" name="color" data-color="${sanitizedColorName}">
                        </div>
                    `);
                });
                let selectedSku = [];
                $('#_warna_modals').on('click', '.color-input', function(e) {
                    let selectedColor = $(this).data('color');
                    $(`#v-pills-tab a[href="#${selectedColor}"]`).tab('show');

                     selectedSku =  sku_modal.find(sku => sku.code == $(`#v-pills-tab a[href="#${selectedColor}"]`).data('code'));
                    $('#value_stock').text(selectedSku.stock);
                    localStorage.setItem('selectedSku', JSON.stringify(selectedSku));
                });

            });
        }
        $(document).on('click', '#add_to_cart', function () {
            let selectedSku = JSON.parse(localStorage.getItem('selectedSku'));
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
                {name: "Browny", code: "#964B00"},
                {name: "Dusty Pink", code: "#D4A190"},
                {name: "Milo", code: "#4B5320"}, // Assuming "Milo" should have a unique color code
                {name: "Rose Brown", code: "#BC8F8F"},
                {name: "Salem", code: "#BADA55"},
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