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
<div class="has-breadcrumb-bg mb-120"
    data-background="https://sgp1.vultrobjects.com/naisha-s3/customer/header-2@4x.webp">
    <div class="breadcrumb-content d-flex justify-content-center align-items-center" style="flex-direction: column;">
        <h2 class="title" id="title">
            @if (request()->is('catalog'))
            Semua Produk
            @endif
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
                @include('catalog.filter')
                <!-- /. widget -->
                <div class="col-xl-9">
                    <div class="filter-heading">
                        <div class="row">
                            <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                                <div class="filter-shown-item">
                                    <p class="mb-0">Showing <span>1</span>–<span id="to_">24</span> of <span
                                            class="total_count">56</span> results</p>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-12">

                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                                <div class="filter-shown-item search-container">
                                    <input type="text" id="search_" placeholder="Search Products...">
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
                                    <div class="row" id="product-list">

                                    </div>

                                    <div class="text-center mt-20">
                                        <a href="javascript:void(0)" class="load-more">LOAD MORE...</a>
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

<input type="text" id="category_" hidden value="{{ request()->category }}">
@endsection

@push('js')
<script src="{{asset('assets')}}/js/jquery-ui.js"></script>

<script>
    $.ajax({
        type: "get",
        url: "{{ route('products') }}?stock=1",
        success: function (response) {
            $("#in_stock").text(response.in_stock)
            $("#out_stock").text(response.out_of_stock)
        }
    });
    var fromNewest = getParameterByName('filter[from_newest]');
    if (fromNewest == 1) {
        $("#title").text("Newest Products");
    }
    $("#category_").val("{{ request()->category }}");

    $(document).ready(function() {
        // Check if the URL contains the query parameter ?category=Khimara
        if (window.location.search.includes('?category=')) {
            // Construct a new URL without the query parameter
            var newUrl = window.location.protocol + "//" + window.location.host + window.location.pathname;

            // Use the History API to update the URL without reloading the page
            window.history.replaceState({path: newUrl}, '', newUrl);
        }
    });

    function getParameterByName(name, url) {
            if (!url) url = window.location.href;
            name = name.replace(/[\[\]]/g, '\\$&');
            var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
                results = regex.exec(url);
            if (!results) return null;
            if (!results[2]) return '';
            return decodeURIComponent(results[2].replace(/\+/g, ' '));
        }
    var per_page = 12;
    var page = 1;
    function getData(per_page, page) {
        let query = '';

        if ($("#slider-range").length) {
            query += "&filter[price_range]=" + $("#price").val();
        }

        if ($('#search_').val() != '') {
            query += "&filter[name]=" + $('#search_').val();
        }

        if ($('#promo_').val() != '') {
            query += "&filter[promo]=" + $('#promo_').val();
        }

        if ($('#tag_').val() != '') {
            query += "&filter[tags]=" + $('#tag_').val();
        }

        if ($('#tag_').val() != '') {
            query += "&filter[tags]=" + $('#tag_').val();
        }

        if ($('#category_').val() != '') {
            query += "&filter[category.id]=" + $('#category_').val();
        }

        var fromNewest = getParameterByName('filter[from_newest]');
        if (fromNewest) {
            query += "&filter[from_newest]=" + fromNewest;
        }

        get(`{{ route('products') }}?`+"&page=" + page + query, function (err, data) {
            if (err) {
                console.log(err);
            } else {
                if (data.data.length > 0) {
                    tab_3(data);
                }else{
                    $('#product-list').html('<div class="col-12 text-center">No data found</div>');
                }
            }
        });
    }


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
                            <span class="sale">On sale</span>
                        </div>

                        <div class="product-desc pb-20">
                            <div class="product-desc-top">
                                <div class="categories">
                                    <a class="product-category"><span>${item.category.name}</span></a>
                                </div>
                            </div>
                            <a href="${url}" class="product-title">${item.name}</a>
                            <div class="price-switcher">
                                <span class="price switcher-item">${currency(item.skus[0].price.reseller)}</span>
                                <a href="javascript:void(0)" onclick="openModal('${item.slug}')" class="add-cart text-capitalize switcher-item">Show</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            `;
        }
        $("#from_").text(data.meta.from);
        $("#to_").text(data.meta.to);
        $('.total_count').text(data.meta.total);
        $('#product-list').html(list);

        if (data.data.length < 0) {
            $('.load-more').hide();
        }
    }
    // Initial load
    getData(per_page, page);
    // Load more event
    $('.load-more').click(function () {
        page++;
        getData(per_page, page);
    });


    $('#search_').on('keyup', function () {
        //min 3 caracters
        if ($(this).val().length >= 3 || $(this).val().length == 0) {
            setTimeout(function() {
                getData(per_page, page);
            }, 500);
        }
    });
</script>
@endpush
