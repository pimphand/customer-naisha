@extends('app')

@section('content')
<section class="slider">
    <div class="slider-active center-dots number-dots white-dot">
        <div class="single-slider  h-950 d-flex align-items-center" data-background="{{ $images[0] }}">
            <div class="container">
                <div class="single-slider-inner d-none">
                    <div class="single-slider-content style-2 white-content text-left light-content">
                        <div class="slider-heading" data-animation="fadeInUp" data-delay=".4s"
                            style="animation-delay: 0.4s;">
                            <p>Jack collection</p>
                            <h2 class="mb-0 strong-heading mt-10">HOODED</h2>
                        </div>
                        <div class="slider-desc" data-animation="fadeInUp" data-delay=".4s"
                            style="animation-delay: 0.6s;">
                            <p class="mb-0 pl-0 mt-15">New Spring drops from Over. Shop the Collection</p>
                        </div>
                        <div class="slider-link slider-link-2 mt-75" data-animation="fadeInUp" data-delay=".4s"
                            style="animation-delay: 0.8s;">
                            <a href="shop4.html" class=" mt-70 text-uppercase" tabindex="0">Discover now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single-slider  h-950 d-flex align-items-center" data-background="{{ $images[1] }}">
            <div class="container">
                <div class="single-slider-inner d-none">
                    <div class="single-slider-content style-2 white-content text-left light-content">
                        <div class="slider-heading" data-animation="fadeInUp" data-delay=".4s"
                            style="animation-delay: 0.4s;">
                            <p>Jack collection</p>
                            <h2 class="mb-0 strong-heading mt-10">COATS.S18</h2>
                        </div>
                        <div class="slider-desc" data-animation="fadeInUp" data-delay=".4s"
                            style="animation-delay: 0.4s;">
                            <p class="mb-0 pl-0 mt-15">New Spring drops from Over. Shop the Collection</p>
                        </div>
                        <div class="slider-link slider-link-2 mt-75" data-animation="fadeInUp" data-delay=".4s"
                            style="animation-delay: 0.4s;">
                            <a href="shop4.html" class=" mt-70 text-uppercase" tabindex="0">Discover now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="single-slider  h-950 d-flex align-items-center" data-background="{{ $images[2] }}">
            <div class="container">
                <div class="single-slider-inner d-none">
                    <div class="single-slider-content style-2 white-content text-left light-content">
                        <div class="slider-heading" data-animation="fadeInUp" data-delay=".4s"
                            style="animation-delay: 0.4s;">
                            <p>Jack collection</p>
                            <h2 class="mb-0 strong-heading mt-10">JAKET.S18</h2>
                        </div>
                        <div class="slider-desc" data-animation="fadeInUp" data-delay=".4s"
                            style="animation-delay: 0.4s;">
                            <p class="mb-0 pl-0 mt-15">New Spring drops from Over. Shop the Collection</p>
                        </div>
                        <div class="slider-link slider-link-2 mt-75" data-animation="fadeInUp" data-delay=".4s"
                            style="animation-delay: 0.4s;">
                            <a href="shop4.html" class=" mt-70 text-uppercase" tabindex="0">Discover now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
</section>
<!-- category section start -->
<section class="category mt-100"></section>
<!-- new arrival section start -->
<section class="new-arrival mt-120">
    <div class="container container-1430">
        <div class="generic-title text-center">
            <h2 class="mb-20">#New Arrivals</h2>
        </div>

        <div class="new-arrival-wrapper mt-55">
            <div class="row" id="product-list">

            </div>
            <div class="text-center mt-20 load-more-btn">
                <a href="javascript:void(0)" class="load-more">Lebih Banyak...</a>
            </div>
        </div>
    </div>
    <div class="container pb-90"></div>
</section>
@endsection

@push('css')
<style>
    /* Media query for mobile screens */
    @media (max-width: 767px) {

        #product-list .col-xl-3,
        #product-list .col-lg-3,
        #product-list .col-md-4,
        #product-list .col-sm-6,
        #product-list .col-12 {
            flex: 0 0 25%;
            /* Set width to 25% for four columns */
            max-width: 25%;
            /* Set max-width to 25% for four columns */
        }

        #product-list .col-12 {
            width: 25%;
            /* Ensure the width is also set to 25% */
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

        #product-list .product-box .product-box-wrapper {
            width: 100% !important;
            /* Ensure the product box wrapper takes full width */
        }

        .product-box {
            margin-bottom: 20px;
        }
    }

    #product-list {
        display: flex;
        flex-wrap: wrap;
        /* gap: 10px; */
        /* Optional: Adds spacing between items */
    }
</style>
@endpush

@push('js')
<script>
    var per_page = 12;
    var page = 1;
    function getData(per_page, page) {
        get(url_product + "/all-products?paginate=" + per_page + "&page=" + page, function (err, data) {
            if (err) {
                console.error("Error:", err);
            } else {
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
                                        <a href="javascript:void(0)" onclick="openModal('${item.slug}')" class="d-block">
                                            <div class="second-img">
                                                <img src="${item.image_url}" alt="" class="w-100">
                                            </div>
                                        </a>
                                        <a href="${url}" class="product-img-link quick-view-1 text-capitalize">${item.name}</a>
                                    </div>
                                    <div class="product-desc pb-20">
                                        <div class="product-desc-top">
                                            <div class="categories">
                                                <a href="javascript:void(0)" onclick="openModal('${item.slug}')" class="product-category"><span>${item.category.name}</span></a>
                                            </div>
                                        </div>
                                        <a href="javascript:void(0)" onclick="openModal('${item.slug}')" class="product-title">${item.name}</a>
                                        <div class="price-switcher">
                                            <span class="price switcher-item">${currency(item.skus[0].price.consumer)}</span>
                                            <a href="javascript:void(0)" onclick="openModal('${item.slug}')" class="add-cart text-capitalize switcher-item">Show</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                }
               $('#product-list').append(list);
            }
        });
    }

    // Initial load
    getData(per_page, page);

    // Load more event
    document.querySelector(".load-more").addEventListener("click", function () {
        page++;
        getData(per_page, page);
    });

    $('.category').html(`
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 left-category">
                    <div class="category-box">
                        <div class="category-wrapper">
                            <div class="category-img">
                                <img src="{{ $categories[0] }}" class="w-100" alt="">
                            </div>
                            <div class="category-content">
                                <a href="{{ route('catalog') }}?category=gamis" class="title">Gamis</a>
                                <p class="category-item">(<span>8</span> items)</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 ">
                            <div class="row">
                                <div class="col-12 mb-27">
                                    <div class="category-box">
                                        <div class="category-wrapper">
                                            <div class="category-img">
                                                <img src="{{ $categories[1] }}" class="w-100" alt="">
                                            </div>
                                            <div class="category-content">
                                                <a href="{{ route('catalog') }}?category=aksesoris" class="title">Aksesoris</a>
                                                <p class="category-item">(<span>20</span> items)</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="category-box">
                                        <div class="category-wrapper">
                                            <div class="category-img">
                                                <img src="{{ $categories[2] }}" class="w-100" alt="">
                                            </div>
                                            <div class="category-content">
                                                <a href="{{ route('catalog') }}?category=Khimar" class="title">Khimar</a>
                                                <p class="category-item">(<span>11</span> items)</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 category-right">
                            <div class="category-box">
                                <div class="category-wrapper">
                                    <div class="category-img">
                                        <img src="{{ $categories[3] }}" class="w-100" alt="">
                                    </div>
                                    <div class="category-content">
                                        <a href="{{ route('catalog') }}?category=Koko" class="title">Koko</a>
                                        <p class="category-item">(<span>17</span> items)</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    `)

    $(document).ready(function() {
        $(window).scroll(function() {
            // Periksa apakah pengguna telah menggulir ke bagian bawah halaman
            if ($(window).scrollTop() + $(window).height() + 3 >= $(document).height()) {
                // Temukan elemen dengan class 'load-more' dan klik secara otomatis
                page++;
                getData(per_page, page);
            }
        });
    });
</script>
@endpush
