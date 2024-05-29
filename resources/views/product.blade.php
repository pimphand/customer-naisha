@extends('app')

@section('content')
<!-- single product start -->
<section class="single-product mb-90">
    <div class="container-fluid">
        <nav aria-label="breadcrumb" class="mb-40">
            <ol class="breadcrumb p-0 m-0">
                <li class="breadcrumb-item"><a href="index3.html">Home</a></li>
                <li class="breadcrumb-item" aria-current="page">Product</li>
                <li class="breadcrumb-item active" aria-current="page" id="_name_product">single Product</li>
            </ol>
        </nav>
        <div class="shop-wrapper">
            <div class="single-product-top">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-12">
                        <div class="shop-img">
                            <div class="row">
                                <div class="col-2">
                                    <div class="nav nav-pills" id="v-pills-tab" role="tablist"
                                        aria-orientation="vertical">

                                        <a class="active" data-toggle="pill" href="#tab-1">
                                            <img src="{{ asset('mazia') }}/img/product/farniture-7.jpg" class="w-100"
                                                alt="">
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

            <div class="single-product-bottom mt-80 gray-border-top">
                <ul class="nav nav-pills justify-content-center mt-100">
                    <li class="nav-item">
                        <a class="active" data-toggle="pill" href="#desc-tab-1">Description</a>
                    </li>
                    <li class="nav-item">
                        {{-- <a data-toggle="pill" href="#desc-tab-3">Additional information</a> --}}
                    </li>
                    <li class="nav-item">
                        {{-- <a class="" data-toggle="pill" href="#desc-tab-2">Reviews (0)</a> --}}
                    </li>
                </ul>
                <div class="container container-1200">
                    <div class="tab-content mt-60">
                        <div class="tab-pane fade show active" id="desc-tab-1">
                            <div class="single-product-tab-content">
                                <h3 class="title mb-30">Description</h3>
                                <p id="description" class="text-justify"></p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="desc-tab-2">
                            <div class="single-product-tab-content">
                                <h3 class="title mb-30">Reviews</h3>
                                <div class="review-box-item">
                                    <div class="row">
                                        <div class="col-xl-1 col-lg-2 col-md-2 col-3 pr-xl-0">
                                            <div class="review-box-img d-block text-right">
                                                <img src="img/small-img/1.jpg" width="60" height="60" class="avatar-img"
                                                    alt="">
                                            </div>
                                        </div>
                                        <div class="col-xl-11 col-lg-10 col-9 pl-0">
                                            <div class="review-box-content">
                                                <div class="row">
                                                    <div class="col-7">
                                                        <div class="author-name">
                                                            <h6>John96</h6>
                                                            <div class="content">
                                                                <p class="mb-0">Awesome</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-5 pr-5-px pl-0">
                                                        <div class="rating text-right">
                                                            <i class="fal fa-star red-color"></i>
                                                            <i class="fal fa-star red-color"></i>
                                                            <i class="fal fa-star red-color"></i>
                                                            <i class="fal fa-star"></i>
                                                            <i class="fal fa-star"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p>There are no reviews yet.</p>
                                <h4>Add a review</h4>

                                <form action="#" method="POST">
                                    <label for="rating">Your Rating</label>
                                    <input type="radio" id="rating">
                                </form>
                                <p class="star-rating">
                                    <a href="javascript:void(0)"><i class="fal fa-star"></i></a>
                                    <a href="javascript:void(0)"><i class="fal fa-star"></i></a>
                                    <a href="javascript:void(0)"><i class="fal fa-star"></i></a>
                                    <a href="javascript:void(0)"><i class="fal fa-star"></i></a>
                                    <a href="javascript:void(0)"><i class="fal fa-star"></i></a>
                                </p>

                                <div class="form-group">
                                    <label for="review">Review</label>
                                    <textarea name="review" id="review" cols="30" rows="6"
                                        class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="name">Name <span class="required">*</span></label>
                                    <input type="text" name="name" id="name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email <span class="required">*</span></label>
                                    <input type="email" name="email" id="email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <div class="checkbox-input">
                                        <input type="checkbox" id="condition" name="condition">
                                    </div>
                                    <label for="condition">Save my name, email, and website in this browser for the
                                        next time I comment.</label>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="generic-btn red-hover-btn"
                                        style="font-size: 14px !important;">Submit</button>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="desc-tab-3">
                            <div class="single-product-tab-content">
                                <h3 class="title mb-30">Additional information</h3>
                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <th>size</th>
                                            <td>
                                                <ul>
                                                    <li><a href="shop4.html">3XL</a></li>
                                                    <li><a href="shop4.html">L</a></li>
                                                    <li><a href="shop4.html">M</a></li>
                                                    <li><a href="shop4.html">S</a></li>
                                                    <li><a href="shop4.html">XL</a></li>
                                                    <li><a href="shop4.html">XXL</a></li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>color</th>
                                            <td>
                                                <ul>
                                                    <li><a href="shop4.html">Black</a></li>
                                                    <li><a href="shop4.html">Blue</a></li>
                                                    <li><a href="shop4.html">Gold</a></li>
                                                    <li><a href="shop4.html">Gray</a></li>
                                                    <li><a href="shop4.html">White</a></li>
                                                    <li><a href="shop4.html">Yellow</a></li>
                                                    <li><a href="shop4.html">Red</a></li>
                                                </ul>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('js')
<script>
    openModal("{{ $slug }}")
    function openModal(slug) {
            // Remove selectedSku from localStorage
            localStorage.removeItem('selectedSku');
            let selectedSku = null;

            // Reset value stock
            $('#value_stock').text(0);

            fetchProductDetails(slug, function(product) {
                $('#_name_product').text(product.name);
                $('#description').html(product.description);
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

</script>
@endpush