@extends('app')

@section('meta')
<meta property="og:title" content="Naisha Signature Jennaira Abaya">
<meta property="og:description" content="naisha hijrah">
<meta property="og:url" content="https://naisha.id">
<meta property="og:type" content="product">
<meta property="og:site_name" content="Naisha">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
@endsection

@section('content')
<section class="slider">
    <div class="slider-active center-dots number-dots white-dot">
        <div class="single-slider h-950 d-flex align-items-center" data-background="{{ $images[0] }}">
            <div class="container">
            </div>
        </div>
        <div class="single-slider h-950 d-flex align-items-center" data-background="{{ $images[1] }}">
            <div class="container">
            </div>
        </div>
        <div class="single-slider h-950 d-flex align-items-center" data-background="{{ $images[2] }}">
            <div class="container">
            </div>
        </div>
        <div class="single-slider h-950 d-flex align-items-center" data-background="{{ $images[3] }}">
        </div>
    </div>
</section>
<!-- category section start -->
<section class="category mt-100"></section>
<!-- new arrival section start -->
<section class="new-arrival mt-120">
    <div class="container container-1430">
        <div class="generic-title text-center">
            <h2 class="mb-20">Feature Collection</h2>
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
    #slick-slide-control00,
    #slick-slide-control01,
    #slick-slide-control02,
    #slick-slide-control03 {
        scroll-behavior: none;
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
                                            <span class="price switcher-item">${currency(item.skus[0].price.special_price > 0 ?item.skus[0].price.special_price : item.skus[0].price.consumer)}</span>
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
                                <a href="{{ route('catalog') }}?category=gamis">
                                    <img src="{{ $categories[0] }}" class="w-100" alt="">
                                </a>
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
                                                <a href="{{ route('catalog') }}?category=aksesoris">
                                                    <img src="{{ $categories[1] }}" class="w-100" alt="">
                                                </a>
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
                                                <a href="{{ route('catalog') }}?category=Khimar">
                                                    <img src="{{ $categories[2] }}" class="w-100" alt="">
                                                </a>
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
                                        <a href="{{ route('catalog') }}?category=Koko" class="title">
                                            <img src="{{ $categories[3] }}" class="w-100" alt="">
                                        </a>
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

    // $(document).ready(function() {
    //     let currentIndex = 0;
    //     const controls = ['#slick-slide-control00', '#slick-slide-control01', '#slick-slide-control02', '#slick-slide-control03'];

    //     // Prevent default click behavior for controls
    //     controls.forEach(function(control) {
    //         $(control).on('click', function() {
    //         // Your click handling code here
    //             return false;
    //         });
    //     });
    //     setInterval(function() {
    //         $(controls[currentIndex]).click();
    //         currentIndex = (currentIndex + 1) % controls.length;
    //         console.log('clicked : ' + currentIndex);
    //     }, 1000);
    // });

</script>
@endpush