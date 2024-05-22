//add to cart
function AddCart(id, name, price, image) {
    let cart = getCart();
    let product = {
        id: id,
        name: name,
        price: price,
        qty: 1,
        image: image
    }
    let index = cart.findIndex(p => p.id == product.id);
    if (index != -1) {
        cart[index].qty += 1;
    } else {
        cart.push(product);
    }
    localStorage.setItem("cart", JSON.stringify(cart));
    toastCart();
    renderCart();
}

function getCart() {
    let cart = JSON.parse(localStorage.getItem("cart")) || [];
    return cart;
}

renderCart()

function renderCart() {
    let cart = getCart();
    let total = 0;
    let html = "";
    cart.forEach(p => {
        total += p.price * p.qty;
        html += `
        <li class="cart-item">
            <div class="minicart-img">
                <a href="single-product-5.html" class="p-0">
                    <img src="${p.image}" class="w-100" alt="">
                </a>
            </div>
            <div class="minicart-desc">
                <a href="single-product-5.html" class="p-0">${p.name}</a> <br>
                <strong>${p.qty} × ${currency(p.price ?? 0)}</strong>
            </div>
            <div class="remove" onclick="removeCart(${p.id})">
                <i class="fal fa-times"></i>
            </div>
        </li>
        `;
    });
    $("#list-cart").html(html);
    $("#total-cart-ammount").html(`${currency(parseFloat(total))}`);
    $("#cart-count").html(cart.length);

    $(".cart-item").on("mouseenter", function () {
        $(this).addClass("hovered");
    }).on("mouseleave", function () {
        $(this).removeClass("hovered");
    });
}

// remove cart
function removeCart(id) {
    let cart = getCart();
    let index = cart.findIndex(p => p.id == id);
    if (index !== -1) {
        cart.splice(index, 1);
    }
    localStorage.setItem("cart", JSON.stringify(cart));
    renderCart();
}

function get(url, callback) {
    $.get(url)
        .done(function (data) {
            callback(null, data);
        })
        .fail(function (err) {
            callback(err, null);
        });
}

function currency(price) {
    var formatter = new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
        minimumFractionDigits: 0
    });
    if (!price) {
        return "";
    } else if (typeof formatter === "object" && typeof formatter.format === "function") {
        return formatter.format(price);
    } else {
        return formatter.format(price);
    }
}

function toastCart() {
    $.toast({
        text: "Produk telah di tambahkan", // Text that is to be shown in the toast

        icon: 'success', // Type of toast icon
        showHideTransition: 'fade', // fade, slide or plain
        allowToastClose: true, // Boolean value true or false
        hideAfter: 3000, // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
        stack: 5, // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
        position: 'top-right', // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values


        textAlign: 'left',  // Text alignment i.e. left, right or center
        loader: true,  // Whether to show loader or not. True by default
        loaderBg: '#9EC600',  // Background color of the toast loader
        beforeShow: function () {
        }, // will be triggered before the toast is shown
        afterShown: function () {
        }, // will be triggered after the toat has been shown
        beforeHide: function () {
        }, // will be triggered before the toast gets hidden
        afterHidden: function () {
        }  // will be triggered after the toast has been hidden
    });
}

function headerSearchProducts(data) {
    let html = "";
    data.forEach(p => {
        html += `
        <li class="d-block d-flex align-items-center">
            <div class="search-result-img">
                <img src="${p.image_url}" class="w-100" alt="">
            </div>
            <div class="search-result-desc pl-10">
                <a href="/${p.slug}" class="title px-0">${p.category.name} - ${p.name}</a>
                <div class="price"><span>${currency(p.skus[0].price.consumer)}</span></div>
            </div>
        </li>
        `;
    });
    document.getElementById("header-search-product").innerHTML = html;
}

$('._top-search').click(function (e) {
    //get products from local storage
    let products = JSON.parse(localStorage.getItem("product"));
    //get search value
    headerSearchProducts(products);
});

$('#search-header-top').on('keyup', function (e) {
    if (e.target.value.length >= 3) {
        get(url + "/all-products?filter[name]=" + e.target.value, function (err, data) {
            headerSearchProducts(data.data);
        });
    }
});

