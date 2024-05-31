@extends('app')

@push('css')
<style>
    .search-container {
        display: flex;
        align-items: center;
        justify-content: center;
        /* margin: 20px; */
    }

    .search-container input[type="text"] {
        width: 300px;
        padding: 5px 5px;
        background-color: rgba(255, 255, 255, 0.5);
        /* Set background to white with 50% opacity */
        border: 2px solid rgba(222, 222, 222, 0.5);
        /* Set border color with 50% opacity */
        outline: none;
        transition: border-color 0.3s ease;
    }

    .search-container input[type="text"]:focus {
        border-color: rgba(255, 255, 255, 0.7);
        /* Set focus border color with 70% opacity */
    }

    .search-container button {
        padding: 5px 5px;
        border: 2px solid rgba(0, 123, 255, 0.5);
        /* Set border color with 50% opacity */
        border-left: none;
        border-radius: 0 25px 25px 0;
        background-color: rgba(0, 123, 255, 0.5);
        /* Set background color with 50% opacity */
        color: rgba(255, 255, 255, 0.7);
        /* Set text color with 70% opacity */
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .search-container button:hover {
        background-color: rgba(0, 86, 179, 0.5);
        /* Set hover background color with 50% opacity */
    }

    .search-container button i {
        font-size: 16px;
    }
</style>
@endpush

@section('content')
<div class="has-breadcrumb-bg mb-120" data-background="{{ asset('mazia') }}/img/bg/3.jpg">
    <div class="breadcrumb-content d-flex justify-content-center align-items-center" style="flex-direction: column;">
        <h2 class="title">Shop</h2>
        <nav aria-label="breadcrumb" class="mb-40">
            <ol class="breadcrumb p-0 m-0">
                <li class="breadcrumb-item"><a href="index7.html">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Shop</li>
            </ol>
        </nav>
    </div>
</div>

<div class="shop-body mb-90">
    <div class="container-fluid">
        <div class="shop-wrapper">
            <div class="row">
                @include('catalog.filter')
                <!-- /. widget -->
                <div class="col-xl-9">
                    <div class="filter-heading">
                        <div class="row">
                            <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                                <div class="filter-shown-item">
                                    <p class="mb-0">Showing <span>1</span>–<span>24</span> of <span
                                            class="total_count">56</span> results</p>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                                <div class="shop-filter-tab">
                                    <ul class="nav nav-pills" role="tablist">
                                        <li><span>Views</span></li>
                                        <li class="nav-item">
                                            <a data-toggle="pill" href="#shop-tab-1" data-toggle="tooltip"
                                                data-placement="top" title="2 grid"><i
                                                    class="fal fa-line-columns"></i></a>
                                        </li>
                                        <li class="nav-item">
                                            <a data-toggle="pill" href="#shop-tab-2" data-placement="top"
                                                title="3 grid"><i class="fal fa-border-none"></i></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="active" data-toggle="pill" href="#shop-tab-3" data-placement="top"
                                                title="4 grid"><i class="fal fa-border-center-v"></i></a>
                                        </li>
                                        <li class="nav-item">
                                            <a data-toggle="pill" href="#shop-tab-4" data-placement="top"
                                                title="list view"><i class="fal fa-list"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                                <div class="filter-shown-item search-container">
                                    <input type="text" id="" placeholder="Search Products...">
                                    {{-- <button type="submit"><i class="fal fa-search"></i></button> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /. filter heading -->
                    <div class="filter-content">
                        <div class="tab-content">
                            <div class="tab-pane fade" id="shop-tab-1">
                                <div class="product-wrapper mt-55">
                                    <div class="row">

                                        <div class="col-6">
                                            <div class="product-box mb-40">
                                                <div class="product-box-wrapper">
                                                    <div class="product-img">
                                                        <img src="{{ asset('mazia') }}/img/product/9.jpg" class="w-100"
                                                            alt="">
                                                        <a href="single-product-4.html" class="d-block">
                                                            <div class="second-img">
                                                                <img src="{{ asset('mazia') }}/img/product/9-hover.jpg"
                                                                    alt="" class="w-100">
                                                            </div>
                                                        </a>
                                                        <a href="javascript:void(0)"
                                                            class="product-img-link quick-view-1 text-capitalize">Quick
                                                            view</a>
                                                        <span class="sale bg-red text-white">sale!</span>
                                                    </div>

                                                    <div class="product-desc pb-20">
                                                        <div class="product-desc-top">
                                                            <div class="categories">
                                                                <a href="shop2.html"
                                                                    class="product-category"><span>Woman</span></a>
                                                            </div>
                                                            <a href="wishlist.html"
                                                                class="wishlist float-right"><span><i
                                                                        class="fal fa-heart"></i></span></a>
                                                        </div>
                                                        <a href="single-product-4.html" class="product-title">Capitalize
                                                            on low hanging
                                                            fruit to</a>
                                                        <div class="price-switcher">
                                                            <span class="price switcher-item">$250.00</span>
                                                            <a href="cart.html"
                                                                class="add-cart text-capitalize switcher-item">+add
                                                                to cart</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center mt-20">
                                        <a href="shop.html" class="load-more">LOAD MORE...</a>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="shop-tab-2">
                                <div class="product-wrapper mt-55">
                                    <div class="row">
                                        <div class="col-xl-4 col-md-4 col-6">
                                            <div class="product-box mb-40">
                                                <div class="product-box-wrapper">
                                                    <div class="product-img">
                                                        <img src="{{ asset('mazia') }}/img/product/8.jpg" class="w-100"
                                                            alt="">
                                                        <a href="single-product-4.html" class="d-block">
                                                            <div class="second-img">
                                                                <img src="{{ asset('mazia') }}/img/product/8-hover.jpg"
                                                                    alt="" class="w-100">
                                                            </div>
                                                        </a>
                                                        <a href="javascript:void(0)"
                                                            class="product-img-link quick-view-1 text-capitalize">Quick
                                                            view</a>
                                                        <span class="sale bg-red text-white">sale!</span>
                                                    </div>

                                                    <div class="product-desc pb-20">
                                                        <div class="product-desc-top">
                                                            <div class="categories">
                                                                <a href="shop2.html"
                                                                    class="product-category"><span>Shoes</span></a>
                                                                <a href="shop2.html"
                                                                    class="product-category"><span>Sneaker</span></a>
                                                            </div>
                                                            <a href="wishlist.html"
                                                                class="wishlist float-right"><span><i
                                                                        class="fal fa-heart"></i></span></a>
                                                        </div>
                                                        <a href="single-product-4.html" class="product-title">Wood
                                                            design bedroom
                                                            clook</a>
                                                        <div class="price-switcher">
                                                            <span class="price switcher-item">$45-$10.00</span>
                                                            <a href="cart.html"
                                                                class="add-cart text-capitalize switcher-item">+add
                                                                to cart</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center mt-20">
                                        <a href="shop.html" class="load-more">LOAD MORE...</a>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade show active" id="shop-tab-3">
                                <div class="product-wrapper mt-55">
                                    <div class="row" id="_tab_3">

                                    </div>
                                    <div class="text-center mt-20">
                                        <a href="shop.html" class="load-more">LOAD MORE...</a>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="shop-tab-4">
                                <div class="product-wrapper mt-55">

                                    <div class="product-box mb-40">
                                        <div class="product-box-wrapper">
                                            <div class="list-product mb-50">
                                                <div class="list-product-wrapper">
                                                    <div class="row">
                                                        <div class="col-xl-4 col-lg-4 col-md-4">
                                                            <div class="list-product-img">
                                                                <div class="product-img">
                                                                    <img src="{{ asset('mazia') }}/img/product/8.jpg"
                                                                        class="w-100" alt="">
                                                                    <a href="single-product-5.html" class="d-block">
                                                                        <div class="second-img">
                                                                            <img src="{{ asset('mazia') }}/img/product/8-hover.jpg"
                                                                                alt="" class="w-100">
                                                                        </div>
                                                                    </a>
                                                                    <a href="javascript:void(0)"
                                                                        class="product-img-link quick-view-1 text-capitalize">Quick
                                                                        view</a>
                                                                    <span class="sale bg-red text-white">sale!</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-8 col-lg-8 col-md-8">
                                                            <div class="list-product-desc">
                                                                <h3><a href="single-product-5.html"
                                                                        class="title mb-15">Blandit vel eros
                                                                        condimentum ulla</a></h3>
                                                                <div class="rating">
                                                                    <i class="fal fa-star active"></i>
                                                                    <i class="fal fa-star active"></i>
                                                                    <i class="fal fa-star active"></i>
                                                                    <i class="fal fa-star active"></i>
                                                                    <i class="fal fa-star"></i>
                                                                </div>
                                                                <div class="price"><span>$90.00</span></div>
                                                                <div class="desc">
                                                                    <p>Typi non habent claritatem insitam, est usus
                                                                        legentis in iis qui facit eorum claritatem.
                                                                        Investigationes demonstraverunt lectores
                                                                        legere
                                                                        me lius quod ii legunt saepius. Claritas est
                                                                        etiam processus A Capitalize on low hanging
                                                                        fruit to identify a ballpark value added
                                                                        activity to beta test. Override the digital
                                                                        divide with additional clickthroughs from
                                                                        DevOps
                                                                        […]</p>
                                                                    <ul>
                                                                        <li>– Light green crewneck sweatshirt.</li>
                                                                        <li>– Hand pockets.</li>
                                                                        <li>– Relaxed fit.</li>
                                                                    </ul>
                                                                    <a href="cart.html"
                                                                        class="list-add-cart-btn text-capitalize mt-40">+add
                                                                        to cart</a>
                                                                    <a href="single-product-5.html"
                                                                        data-toggle="tooltip" data-placement="top"
                                                                        title="wishlist"><span><i
                                                                                class="fal fa-heart"></i></span></a>
                                                                    <a href="javascript:void(0)" data-toggle="tooltip"
                                                                        data-placement="top" title="compare"><span><i
                                                                                class="fal fa-abacus"></i></span></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /. list product -->
                                        </div>
                                    </div>

                                    <!-- /. product box -->
                                    <div class="text-center mt-20">
                                        <a href="shop.html" class="load-more">LOAD MORE...</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /. filter content -->
                </div>
                <!-- /. shop products -->
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="{{asset('assets')}}/js/jquery-ui.js"></script>

<script>
    var per_page = 12;
    var page = 1;
    function getData(per_page, page) {
        get(url_product + "/all-products?paginate=" + per_page + "&page=" + page, function (err, data) {
            if (err) {
                console.log(err);
            } else {
                tab_3(data);
            }
        });
    }
    getData(per_page, page);

    function tab_3(data) {
        var product = data.data;
        let list = '';
        for (var i = 0; i < product.length; i++) {
            var item = product[i];
            let url = "/product/" + item.slug;

            list += `
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
                <div class="product-box mb-40">
                    <div class="product-box-wrapper">
                        <div class="product-img">
                            <img src="${item.image_url}" class="w-100" alt="">
                            <a href="${url}" class="d-block">
                                <div class="second-img">
                                    <img src="${item.image_url}" alt="" class="w-100">
                                </div>
                            </a>
                            <a href="javascript:void(0)" onclick="openModal('${item.slug}')" class="product-img-link quick-view-1 text-capitalize">Quick
                                view</a>
                            <span class="sale bg-red text-white">sale!</span>
                        </div>

                        <div class="product-desc pb-20">
                            <div class="product-desc-top">
                                <div class="categories">
                                    <a class="product-category"><span>${item.category.name}</span></a>
                                </div>
                            </div>
                            <a href="${url}" class="product-title">${item.name}</a>
                            <div class="price-switcher">
                                <span class="price switcher-item">${currency(item.skus[0].price.consumer)}</span>
                                <a href="javascript:void(0)" onclick="openModal('${item.slug}')" class="add-cart text-capitalize switcher-item">+add
                                    to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            `;
        }
        $('#_tab_3').append(list);
    }
</script>
@endpush