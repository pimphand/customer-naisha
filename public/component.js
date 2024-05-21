//add to cart
function AddCart(id,name,price, image) {
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
    console.log(currency(total));
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
