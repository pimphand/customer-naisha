@extends('app')

@section('meta')
<meta property="og:title" content="naisha - {{ $product['name'] }}">
<meta property="og:description" content="{{ $product['description'] }}">
<meta property="og:image" content="{{ $product['image_url'] }}">
<meta property="og:url" content="https://naisha.id/product/{{ $slug }}">
<meta property="og:type" content="product">
<meta property="og:site_name" content="Naisha - {{ $product['name'] }}">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
@endsection

@section('content')
<!-- single product start -->
<section class="single-product mb-90 mt-10">
    <div class="container-fluid">
        <nav aria-label="breadcrumb" class="mb-40">
            <ol class="breadcrumb p-0 m-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
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
                                <div class="quick-quantity mt-20">

                                    <button type="button" id="add_to_cart" style="width: 50%"
                                        class="list-add-cart-btn primary-hover-btn">
                                        Tambah ke keranjang
                                    </button>

                                </div>
                                <div class="quick-quantity mt-2">

                                    <button type="button" id="checkout_now" style="width: 50%"
                                        class="list-add-cart-btn primary-hover-btn">
                                        Checkout Sekarang
                                    </button>

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
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('script')
<script>
    openModal("{{ $slug }}", "close");

   $("#description").html(`{!! nl2br(e($product['description'])) !!}`);
</script>
@endpush