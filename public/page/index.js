get("https://admin.naisha.id/api/all-products",function (err, data) {
    if (err) {
        // Tangani error jika terjadi
        console.error("Error:", err);
    } else {
        //each data
        var product = data.data;
        var list = "";
        for (var i = 0; i < product.length; i++) {
           // max 12 item
            if(i == 12) {
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
                                <a href="single-product-5.html" class="d-block">
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
                                        <a href="shop4.html" class="product-category"><span>${item.category.name}</span></a>
                                    </div>
<!--                                    <a href="wishlist.html" class="wishlist float-right"><span><i-->
<!--                                            class="fal fa-heart"></i></span></a>-->
                                </div>
                                <a href="single-product-5.html" class="product-title">${item.name}</a>
                                <div class="price-switcher">
                                    <span class="price switcher-item">${currency(item.skus[0].price.consumer)}</span>
                                    <a href="javascript:void(0)" onclick="AddCart(${item.id},'${item.name}',${item.skus[0].price.consumer},'${item.image_url}')" class="add-cart text-capitalize switcher-item">+add to cart</a>
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