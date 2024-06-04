@extends('app')

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

@push('script')
<script>
    openModal("{{ $slug }}", "close");
</script>
@endpush