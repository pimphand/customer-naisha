@extends('app')

@push('css')
<style>
    .accordion .list a {
        display: block;
        padding: 10px;
        text-decoration: none;
        color: black;
        background-color: #f9f9f9;
        border: 1px solid #ddd;
    }

    .accordion .list a:hover {
        background-color: #e9e9e9;
    }

    .accordion .list a.active {
        background-color: #d9d9d9;
        color: white;
    }
</style>
@endpush

@section('content')
<div class="has-breadcrumb-bg mb-120"
    data-background="https://sgp1.vultrobjects.com/naisha-s3/customer/header-2@4x.webp">
    <div class="breadcrumb-content d-flex justify-content-center align-items-center" style="flex-direction: column;">
        <h2 class="title" id="title">
            Profile
        </h2>
        <nav aria-label="breadcrumb" class="mb-40">
            <ol class="breadcrumb p-0 m-0">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Shop</li>
            </ol>
        </nav>
    </div>
</div>

<div class="shop-body mb-90">
    <div class="container-fluid">
        <div class="shop-wrapper">
            <div class="row">
                <div class="col-xl-3 hidden-xl">
                    <div class="widget">
                        <h4 class="mb-30">Product Categories</h4>
                        <div class="accordion" id="accordionExample">
                            <div class="list">
                                <a href="javascript:void(0)">Profile</a>
                            </div>

                            <div class="list">
                                <a href="javascript:void(0)">List Order</a>
                            </div>

                            <div class="list">
                                <a href="javascript:void(0)">List Alamat</a>
                            </div>

                            <div class="list">
                                <a href="javascript:void(0)" onclick="logout()">Logout</a>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- /. widget -->
                <div class="col-xl-9">
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
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var links = document.querySelectorAll('.accordion .list a');

        links.forEach(function (link) {
            link.addEventListener('click', function () {
                links.forEach(function (l) {
                    l.classList.remove('active');
                });
                link.classList.add('active');
            });
        });
    });
</script>
@endpush