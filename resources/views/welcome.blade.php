@extends('app')

@section('content')
<section class="slider">
    <div class="slider-active center-dots number-dots white-dot">
        <div class="single-slider  h-950 d-flex align-items-center"
            data-background="{{asset('assets')}}/img/slider/10.jpg">
            <div class="container">
                <div class="single-slider-inner">
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
        <div class="single-slider  h-950 d-flex align-items-center"
            data-background="{{asset('assets')}}/img/slider/11.jpg">
            <div class="container">
                <div class="single-slider-inner">
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
        <div class="single-slider  h-950 d-flex align-items-center"
            data-background="{{asset('assets')}}/img/slider/12.png">
            <div class="container">
                <div class="single-slider-inner">
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
        </div>
    </div>
</section>
<!-- category section start -->
<section class="category mt-100">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 left-category">
                <div class="category-box">
                    <div class="category-wrapper">
                        <div class="category-img">
                            <img src="{{asset('assets')}}/img/banner/categorie_1.jpg" class="w-100" alt="">
                        </div>
                        <div class="category-content">
                            <a href="shop2.html" class="title">Clothing</a>
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
                                            <img src="{{asset('assets')}}/img/banner/categorie_2.jpg" class="w-100"
                                                alt="">
                                        </div>
                                        <div class="category-content">
                                            <a href="shop2.html" class="title">Handbag</a>
                                            <p class="category-item">(<span>20</span> items)</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="category-box">
                                    <div class="category-wrapper">
                                        <div class="category-img">
                                            <img src="{{asset('assets')}}/img/banner/categorie_3.jpg" class="w-100"
                                                alt="">
                                        </div>
                                        <div class="category-content">
                                            <a href="shop2.html" class="title">Sneaker</a>
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
                                    <img src="{{asset('assets')}}/img/banner/categorie_4.jpg" class="w-100" alt="">
                                </div>
                                <div class="category-content">
                                    <a href="shop2.html" class="title">Women</a>
                                    <p class="category-item">(<span>17</span> items)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- category section end -->

<section class="banner-1 mt-20 three-item d-none">
    <div class="container container-100-parcent">
        <div class="row justify-content-center">
            <div class="col-xl-4 col-md-6">
                <div class="banner-img has-content body-banner">
                    <a href="shop4.html"><img src="{{asset('assets')}}/img/banner/banner11.jpg" class="w-100"
                            alt=""></a>
                    <div class="banner-content">
                        <h3 class="mb-0">Sale Off 20% Off</h3>
                        <h3 class="mb-0">All Jackets For Men’s</h3>
                        <a href="shop4.html" class="mt-40">Discover Now</a>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-6">
                <div class="banner-img has-content body-banner">
                    <a href="shop4.html"><img src="{{asset('assets')}}/img/banner/banner12.jpg" class="w-100"
                            alt=""></a>
                    <div class="banner-content">
                        <h3 class="mb-0">Top Clothing</h3>
                        <h3 class="mb-0">Sprint For Women’s</h3>
                        <a href="shop4.html" class="mt-40">Discover Now</a>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-6">
                <div class="banner-img has-content body-banner mb-0">
                    <a href="shop4.html"><img src="{{asset('assets')}}/img/banner/banner13.jpg" class="w-100"
                            alt=""></a>
                    <div class="banner-content">
                        <h3 class="mb-0">Sell 20% Off</h3>
                        <h3 class="mb-0">All Jakets For Woman</h3>
                        <a href="shop4.html" class="mt-40">Discover Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- banner-1 section end -->

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
                <a href="shop.html" class="load-more">LOAD MORE...</a>
            </div>
        </div>
    </div>
    <div class="container pb-90"></div>
</section>
@endsection

@push('js')
<script !src="">
    get(url_product + "/all-products", function (err, data) {
            if (err) {
                // Tangani error jika terjadi
                // console.error("Error:", err);
            } else {
                //remove local storage
                localStorage.removeItem("product");
                //each data
                var product = data.data;

                //add to local storage
                localStorage.setItem("product", JSON.stringify(product));
                var list = "";
                for (var i = 0; i < product.length; i++) {
                    // max 12 item
                    if (i == 12) {
                        break;
                    }
                    var item = product[i];

                    //currency idr
                    list += `
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="product-box mb-40">
                        <div class="product-box-wrapper">
                            <div class="product-img">
                                <img src="${item.image_url}" class="w-100" alt="">
                                <a hhref="javascript:void(0)" onclick="openModal('${item.slug}')" class="d-block">
                                    <div class="second-img">
                                        <img src="${item.image_url}" alt="" class="w-100">
                                    </div>
                                </a>
                                <a href="javascript:void(0)"
                                   class="product-img-link quick-view-1 text-capitalize">${item.name}</a>
                            </div>

                            <div class="product-desc pb-20">
                                <div class="product-desc-top">
                                    <div class="categories">
                                        <a href="javascript:void(0)" onclick="openModal('${item.slug}')" class="product-category"><span>${item.category.name}</span></a>
                                    </div>
<!--                                    <a href="javascript:void(0)"onclick="openModal('${item.slug}')" class="wishlist float-right"><span><i-->
<!--                                            class="fal fa-heart"></i></span></a>-->
                                </div>
                                <a href="javascript:void(0)" onclick="openModal('${item.slug}')" onclick="openModal('${item.slug}')"class="product-title">${item.name}</a>
                                <div class="price-switcher">
                                    <span class="price switcher-item">${currency(item.skus[0].price.consumer)}</span>
                                    <a href="javascript:void(0)" onclick="openModal('${item.slug}')" class="add-cart text-capitalize switcher-item">Show</a>

<!--                                    <a href="javascript:void(0)" onclick="AddCart(${item.id},'${item.name}',${item.skus[0].price.consumer},'${item.image_url}')" class="add-cart text-capitalize switcher-item">+add to cart</a>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `;
                    //show data
                    document.getElementById("product-list").innerHTML = list;
                }
            }
        });

</script>
@endpush