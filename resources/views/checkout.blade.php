@extends('app')

@section('content')
<style>
    /* Custom styles */
    .custom-padding {
        padding: 80px;
        /* You can adjust this value as needed */
    }

    .element {
        cursor: default;
        /* Default cursor style */
    }

    .element:hover {
        cursor: pointer;
        /* Change cursor to pointer on hover */
    }

    .text-icon {
        display: flex;
        align-items: center;
    }

    .text-icon i {
        flex-shrink: 0;
    }

    .font-12 {
        font-size: 13px;
    }

    .custom-radio input[type="radio"] {
        position: absolute;
        opacity: 0;
        cursor: pointer;
    }

    .custom-radio .radio-circle {
        position: relative;
        width: 20px;
        height: 20px;
        border: 2px solid #999;
        /* Ubah sesuai keinginan Anda */
        border-radius: 50%;
        transition: background-color 0.3s;
        /* Efek transisi */
    }

    .custom-radio:hover .radio-circle {
        background-color: #7e7e7e;
        /* Warna ketika dihover */
    }

    .custom-radio input[type="radio"]:checked+.radio-circle::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 10px;
        height: 10px;
        background-color: #333;
        /* Ubah sesuai keinginan Anda */
        border-radius: 50%;
    }

    .hover {
        width: 100%;
        height: 44px;
        background-color: #082f49;
        border-radius: 10px;
        color: white;
        /* Warna teks tombol */
        transition: background-color 0.3s, color 0.3s;
        /* Efek transisi saat hover */
    }

    .hover:hover {
        background-color: #7e7e7e;
        /* Warna latar belakang saat dihover */
        /* color: black !important; */
        /* Warna teks saat dihover */
    }

    .hover-pink:hover .p-1 {
        background-color: #7e7e7e;
        color: white;
    }

    .hidden-radio {
        display: none;
    }

    .custom-radio-label {
        cursor: pointer;
    }

    .input-container {
        display: flex;
        align-items: center;
        margin-top: 10px;
    }

    #voucher {
        width: 100%;
        padding: 6px;
        border: 1px solid #d1d1d1;
        border-radius: 0 4px 4px 0;
        font-size: 16px;
        outline: none;
        box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.12);
    }

    #voucher-button {
        padding: 6px 20px;
        border: 1px solid #d1d1d1;
        border-left: none;
        border-radius: 4px 0 0 4px;
        background-color: #082f49;
        cursor: pointer;
        font-size: 16px;
        outline: none;
        box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.12);
    }

    #voucher-button:hover {
        background-color: #e6e6e6;
        color: black !important;
    }

    @media (max-width: 767px) {
        .custom-padding {
            padding: 10px;
        }

        .card {
            margin-top: 10px;
        }
    }
</style>
@php
$user = request()->session()->get('loginUser');
if ($user) {
$encodedData = json_encode($user['customers']);
}
@endphp
<section class="checkout-area pb-70">
    <div class="container custom-padding">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        @if (Illuminate\Support\Facades\Session::get('loginUser'))
                        <h5 class="card-title">Pengiriman & Pembayaran</h5>
                        <ul class="list-group mt-2 font-12">
                            <li class="list-group-item mb-1 element text-icon" style="cursor: auto" id="address"
                                onmouseover="this.style.cursor='pointer'" onmouseout="this.style.cursor='auto'">
                                <i data-lucide="map-pin"></i> <span class="_show_address_fix ml-2">Tambah Alamat</span>
                            </li>
                            <li class="list-group-item mb-1 element text-icon" style="cursor: auto" id="courier"
                                onmouseover="this.style.cursor='pointer'" onmouseout="this.style.cursor='auto'">
                                <i data-lucide="truck"></i> <span class="_show_courier_fix ml-2"> Pilih Kurir</span>
                            </li>
                            <li class="list-group-item mb-1 element text-icon" style="cursor: auto" id="payment"
                                onmouseover="this.style.cursor='pointer'" onmouseout="this.style.cursor='auto'">
                                <i data-lucide="credit-card"></i> <span class="_show_payment_fix ml-2">Pilih Bank
                                    Pembayaran</span>
                            </li>

                            <li class="list-group-item mb-1 element text-icon mt-20" style="cursor: auto" id="payment"
                                onmouseover="this.style.cursor='pointer'" onmouseout="this.style.cursor='auto'">
                                <textarea name="note" id="note" cols="100%" rows="3" class="form-control"
                                    placeholder="Catatan untuk penjual"></textarea>
                            </li>
                        </ul>
                        @else
                        <div id="_form_checkout">

                        </div>

                        <div id="form-login-modal">

                        </div>

                        <div id="button_checkout">
                            <button class="hover mt-1" id="_checkout"
                                style="width: 100%; height: 44px; background-color: #082f49;color:rgb(255, 255, 255)">
                                Udah punya akun? Login
                            </button>

                            <button class="mt-1 hover" id="login"
                                style="width: 100%; height: 44px; background-color: #ffffff;color:#082f49">
                                Belum punya akun? Daftar
                            </button>
                        </div>
                        @endif

                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Ringkasan Belanja</h5>

                        <li class="d-flex justify-content-between mt-3 font-12">
                            <div class="flex" style="display: flex; flex-direction: row;">
                                <span>Subtotal </span>
                            </div>
                            <div>
                                <span id="subtotalPrice"></span>
                            </div>
                        </li>

                        <li class="d-flex justify-content-between mt-3 font-12">
                            <div class="flex" style="display: flex; flex-direction: row;">
                                <span>Subtotal Pengiriman </span>
                            </div>
                            <div>
                                <span id="subtotalPengiriman"></span>
                            </div>
                        </li>

                        <li class="d-flex justify-content-between mt-3 font-12">
                            <div class="flex" style="display: flex; flex-direction: row;">
                                <div class="input-container">
                                    <button id="voucher-button" style="color: white">Apply</button>
                                    <input type="text" id="voucher" placeholder="Masukan kode voucher">
                                </div>
                            </div>
                            <div class="input-container">
                                <span style="margin-left: auto;" id="discount_"></span>
                            </div>
                        </li>
                        <hr>

                        <li class="d-flex justify-content-between mt-3 font-12">
                            <div class="flex" style="display: flex; flex-direction: row;">
                                <span>Total Bayar</span>
                            </div>
                            <div>
                                <span id="total_courier"></span>
                            </div>
                        </li>
                        @if (Illuminate\Support\Facades\Session::get('loginUser'))
                        <button class="mt-4 hover" id="_save_order"
                            style="width: 100%; height: 44px; background-color: #082f49; border-radius: 20px;color:rgb(255, 255, 255)">Bayar
                            Sekarang
                        </button>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-8 mt-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Keranjang <span id="total_cart">()</span></h5>
                        <ul id="list_cart_checkout"></ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="_checkout_modal" tabindex="-1" role="dialog" aria-labelledby="modalTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered font-12" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="_title_modal"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="_modal_body">
                    <ul class="list-group mt-2 font-12" style="max-height: 400px; overflow-y: auto;" id="_list_address">
                    </ul>
                    <div id="_show_list_courier" style="display: none"></div>
                    <div id="_show_list_payment" style="display: none"></div>
                    <div id="_modal_alamat" style="display: none">
                        <div class="p-1 mb-4 border border-gra2-300 rounded-lg bg-neutral-100 pb-70 text-icon">
                            <i data-lucide="triangle-alert"></i><span class="ml-2">Mohon lengkapi informasi di
                                bawah
                                ini</span>
                        </div>

                        <div class="row mb-2">
                            <div class="col-6">

                                <span class="">Nama Penerima</span>
                                <input type="text" id="_name" class="form-control" placeholder="Masukkan Nama Penerima">

                            </div>
                            <div class="col-6">
                                <span class="">Nomor HP penerima</span>
                                <input type="text" id="_phone" class="form-control"
                                    placeholder="Masukkan Nomor HP penerima">
                            </div>
                        </div>

                        <div class="p-1">
                            <span class="ml-2">Alamat lengkap</span>
                            <textarea type="text" id="_address" class="form-control"
                                placeholder="Masukkan Alamat Lengkap"></textarea>
                        </div>

                        <div class="p-1">
                            <span class="ml-2">Kecamatan</span>
                            <input type="text" id="district" class="form-control" list="districts"
                                aria-autocomplete="list" placeholder="Cari Kecamatan">
                            <select id="districts" class="form-control mt-1" style="display: none">
                            </select>
                        </div>

                        <div class="p-1">
                            <span class="ml-2">Kelurahan/Desa</span>
                            <select id="village" class="form-control" placeholder="Cari Kelurahan/Desa">
                            </select>
                        </div>

                        <div class="p-1">
                            <span class="ml-2">Kode Post</span>
                            <input type="text" id="kodepos" class="form-control" placeholder="Masukan kodepos">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="add_address" class="btn"
                        style="width: 100%;  background-color: #082f49; border-radius: 10px;color:rgb(255, 255, 255)">Tambah
                        Alamat
                    </button>
                    <div class="row justify-center" style="display: none" id="button_address">
                        <div class="col-6">
                            <button type="button" id="save" class="btn"
                                style=" background-color: #082f49; border-radius: 10px;color:rgb(255, 255, 255);">
                                Simpan
                            </button>
                        </div>
                        <div class="col-6">
                            <button type="button" class="btn" data-dismiss="modal"
                                style=" background-color: #989494; border-radius: 10px;color:#ffffff;">
                                Batal
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@push('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function () {
        //get data from local storage)
        getData()
        function getData() {
            let cart = JSON.parse(localStorage.getItem('cart'));

            if (cart == null || cart.length == 0) {
                Swal.fire({
                    title: "keranjang kosong",
                    text: "silahkan pilih produk terlebih dahulu",
                    icon: "warning",
                    allowOutsideClick: false,
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "/";
                    }
                })
            }
            let subtotalPrice = 0;
            cart.forEach(element => {
                subtotalPrice += element.price.consumer * element.qty;
            });
            let address = JSON.parse(localStorage.getItem('address'));
            let cour = JSON.parse(localStorage.getItem('courierSelected'));
            let existingBank = JSON.parse(localStorage.getItem('selectedBank'));
            let voucher = JSON.parse(localStorage.getItem('voucher')) ?? 0;
            if (cour) {
                $('._show_courier_fix').html(`
                    ${cour.logistic_name} - ${cour.rate_name} ${subtotalPrice >= 250000
                    ? `<s style="color:black">${currency(cour.rate_show)}</s> Rp. 0`
                    : `${currency(cour.rate)}`}
                `);
            }

            if (address) {
                $("._show_address_fix").html(`
                    ${address.name} | ${address.phone} <br> ${address.address} <br> ${address.village} - ${address.district} - ${address.city} - ${address.province},  ${address.kodepos}
                `);
            }

            if (existingBank) {
                $('._show_payment_fix').html(`
                    ${existingBank.bank.name} <br> ${existingBank.account_name} - ${existingBank.account_number}
                `);
            }

            if (voucher) {
                $('#discount_').text(`- ${currency(voucher)}`);
            }

            if (cart) {
                //diambil dari total qty
                listCartCheckout(cart)
                //total price

                if (cour) {
                    $("#total_courier").text(currency(subtotalPrice + cour.rate - voucher));
                    $('#subtotalPengiriman').text(currency(cour.rate));
                }
                $('#subtotalPrice').text(currency(subtotalPrice));
            }
        }

        function listCartCheckout(cart) {
            $('#list_cart_checkout').html('');
                let total = 0;
                cart.forEach(element => {
                    total += element.qty;
                    $('#list_cart_checkout').append(`
                        <li class="d-flex justify-content-between mt-3 font-12">
                            <div class="flex" style="display: flex; flex-direction: row;">
                                <div>
                                    <img src="${element.image_url}" alt="product" width="60">
                                </div>

                                <div style="margin-left: 10px;">
                                    <span>${element.product_name} | ${element.properties.color} | ${element.properties.material} |
                                        ${element.properties.size}</span>
                                    <br>
                                    <span style="margin-top: 5px;">Stok: <span id="stock_${element.code}">${element.stock}</span></span>
                                </div>
                            </div>
                            <div>
                                <span>${currency(element.price.consumer * element.qty)}</span><br>
                                <div style="width: 90px; height: 10px;">
                                    <div class="input-group input-group-sm" style="border: 1px solid #f2f2f2;">
                                        <div class="input-group-prepend">
                                            <span data-code="${element.code}" class="minus"
                                                onmouseover="this.style.cursor='pointer'" onmouseout="this.style.cursor='auto'"
                                                style="padding: 4px 8px; font-size: 12px; line-height: 1.5; color: #000; border-radius: 4px;"
                                                type="button"><i class="fa fa-minus"></i></span>
                                        </div>
                                        <input style="height: 50;" type="text" max="${element.stock}" data-code="${element.code}" value="${element.qty}" class="form-control form-control-sm" placeholder="" aria-label=""
                                            aria-describedby="basic-addon1">
                                        <div class="input-group-append">
                                            <span class="plus" data-code="${element.code}"
                                                onmouseover="this.style.cursor='pointer'" onmouseout="this.style.cursor='auto'"
                                                style="padding: 4px 8px; font-size: 12px; line-height: 1.5; color: #000; border-radius: 4px;"
                                                type="button"><i class="fa fa-plus"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    `);
                });
                $('#total_cart').text(`(${total})`);
        }

        let sku = JSON.parse(localStorage.getItem('sku'));

        $(document).on('click', '.plus', function () {
            let code = $(this).data('code');
            increaseQty(code);
            getData()
        })

        $(document).on('click', '.minus', function () {
            let code = $(this).data('code');
            decreaseQty(code);
            getData()
        })

         //.form-control-sm only number
        $(document).on('keypress', '.form-control-sm', function (e) {
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                return false;
            }

            //update qty
            $(document).on('change', '.form-control-sm', function () {
                let code = $(this).data('code');
                let qty = $(this).val();
                let cart = getCart();
                let index = cart.findIndex(p => p.code == code);
                let item = cart.find(item => item.code === code);
                if (item.qty < item.stock) {
                    if (index !== -1) {
                        cart[index].qty = qty;
                    }
                    localStorage.setItem("cart", JSON.stringify(cart));
                    renderCart();
                    getData();
                }else{
                   message()
                    $(this).val(item.qty);
                }
            })
        });

         //decrease qty
        function decreaseQty(code) {

            let cart = getCart();
            let index = cart.findIndex(p => p.code == code);
            let item = cart.find(item => item.code === code);
            if (item.qty > 1) {
                if (index !== -1) {
                    cart[index].qty -= 1;
                    cart[index].stock += 1;
                    if (cart[index].qty <= 0) {
                        cart.splice(index, 1);
                    }
                }
                localStorage.setItem("cart", JSON.stringify(cart));
                renderCart();
                getData();
                //add delay
                existingCourier = JSON.parse(localStorage.getItem('courierSelected'));
                if (existingCourier) { setTimeout(() => {
                    reloadCourier()
                }, 1000);
                }
            }else{
                message('Minimal pembelian 1 item!')
            }
        }

        // increase qty
        function increaseQty(code) {
            let cart = getCart();
            let index = cart.findIndex(p => p.code == code);
            let item = cart.find(item => item.code === code);
            if (item.stock > 0){
                if (index !== -1) {
                    cart[index].qty += 1;
                    cart[index].stock -= 1;
                }
                localStorage.setItem("cart", JSON.stringify(cart));
                renderCart();
                getData();
                //add delay
                existingCourier = JSON.parse(localStorage.getItem('courierSelected'));
                    if (existingCourier) { setTimeout(() => {
                        reloadCourier()
                    }, 1000);
                }
            }else{
                message()
            }
        }

        function message(text = "Stok tidak mencukupi!") {
                $.toast({
                    text: text,
                    showHideTransition: 'slide',
                    bgColor: '#f5365c',
                    textColor: 'white',
                    allowToastClose: false,
                    hideAfter: 3000,
                    stack: 5,
                    textAlign: 'left',
                    position: 'bottom-right',
                    icon: 'error'
                });
        }

        $('#address').click(function () {
            $("#save").show();
            $("#save_courier").hide();
            $("#save_bank").hide();
            $('#_checkout_modal').modal('show');
            $('#_title_modal').text('Tambah Alamat');
            $('#_modal_alamat').hide();
            $('#_show_list_payment').hide();
            $('#_show_list_courier').hide();
            $("#button_address").hide();
            $('#_list_address').show();
        });

        let bank = [];
        $('#payment').click(function () {
            $("#button_address").hide();
            $('#_list_address').hide();
            $('#_title_modal').text('Pilih Metode Pembayaran');
            let address = JSON.parse(localStorage.getItem('address'));
            if (!address) {
                alert('Silahkan lengkapi alamat terlebih dahulu');
            }else{
                get(url+'/payment-method', function (err, data) {
                    if (err) {
                        console.log(err);
                    } else {
                        $('#_checkout_modal').modal('show');
                        $('#_title_modal').text('Pilih Bank');
                        $('#_modal_alamat').hide();
                        $('#_show_list_payment').show();
                        $('#_show_list_courier').hide();
                        let html = '';

                        //save bank in local storage
                        bank = data.data;
                        localStorage.setItem('bank', JSON.stringify(bank));
                        data.data.forEach(element => {
                        //rate idr
                        html += `
                            <label class="flex justify-between hover-pink select_bank" data-data="${element.id}">
                                <div class="p-1 border border-gra2-300 rounded-lg bg-neutral-100 text-icon flex items-center">
                                    <img src="${element.bank.icon}" width="10%">
                                    <span class="ml-2 p-1"> ${element.account_name} - ${element.account_number}
                                    </span>
                                </div>
                            </label>
                        `;
                        });

                        $('#_show_list_payment').html(html);
                    }
                })
            }
        });
        let courier = [];
        $('#courier').click(function () {
           let address = JSON.parse(localStorage.getItem('address'));
           //add loading button
           this.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Loading...';
           this.disabled = true;
           $("#button_address").hide();
           $('#_list_address').hide();
           if (!address) {
                this.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="truck"
                    class="lucide lucide-truck">
                    <path d="M14 18V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v11a1 1 0 0 0 1 1h2"></path>
                    <path d="M15 18H9"></path>
                    <path d="M19 18h2a1 1 0 0 0 1-1v-3.65a1 1 0 0 0-.22-.624l-3.48-4.35A1 1 0 0 0 17.52 8H14"></path>
                    <circle cx="17" cy="18" r="2"></circle>
                    <circle cx="7" cy="18" r="2"></circle>
                </svg> <span class=" ml-2"> Pilih Kurir</span>`;
                alert('Silahkan lengkapi alamat terlebih dahulu');
           }else{
                // cart = JSON.stringify(cart);
                let cart = JSON.parse(localStorage.getItem('cart')) || []; // Pastikan cart selalu array
                let cartCode = [];
                let qty = [];
                // Pastikan cart bukan null atau undefined
                if (Array.isArray(cart)) {
                    $.each(cart, function (i, item) {
                        if (item && item.code) {
                            cartCode.push(item.code);
                        }
                        if (item && item.qty) {
                            qty.push(item.qty);
                        }
                    });
                }

                get(url+'/check-courier?postal_code='+address.kodepos+"&cartCode="+cartCode+"&qty="+qty, function (err, data) {
                    if (err) {
                        message("Pastikan kode pos sudah diisi dengan benar!");

                        //remove loading button
                        this.innerHTML = 'Pilih Kurir';
                    } else {
                        $('#_checkout_modal').modal('show');
                        $('#_title_modal').text('Pilih Kurir');
                        $('#_modal_alamat').hide();
                        $('#_show_list_payment').hide();
                        $('#_show_list_courier').show();
                        let html = '';
                        let cart = JSON.parse(localStorage.getItem('cart'));
                        let subtotalPrice = 0;
                        cart.forEach(element => {
                            subtotalPrice += element.price.consumer * element.qty;
                        });
                        //save courier in variable
                        courier = data.data;
                        localStorage.setItem('courier', JSON.stringify(courier));
                        data.data.forEach(element => {
                            html += `
                            <label class="flex justify-between hover-pink select_courier" data-data="${element.logistic_name}-${element.rate_name}">
                                <div class="p-1 border border-gra2-300 rounded-lg bg-neutral-100 text-icon flex items-center ">
                                    <img src="${element.logo}" width="10%">
                                    <span class="ml-2 p-1">
                                        ${element.logistic_name} - ${element.rate_name}
                                        ${subtotalPrice >= 250000
                                        ? `<br> <s style="color:black">${currency(element.rate)}</s> Rp. 0`
                                        : `${currency(element.rate)}`}
                                        <br>
                                        Pengiriman ${element.min_day != 0 && element.max_day != 0 ? element.min_day + " - " + element.max_day : "-"} Hari
                                    </span>
                                </div>
                            </label>
                            `;
                        });

                        $('#_show_list_courier').html(html);
                        this.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="truck"
                            class="lucide lucide-truck">
                            <path d="M14 18V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v11a1 1 0 0 0 1 1h2"></path>
                            <path d="M15 18H9"></path>
                            <path d="M19 18h2a1 1 0 0 0 1-1v-3.65a1 1 0 0 0-.22-.624l-3.48-4.35A1 1 0 0 0 17.52 8H14"></path>
                            <circle cx="17" cy="18" r="2"></circle>
                            <circle cx="7" cy="18" r="2"></circle>
                        </svg>`;
                    }

                });           }

        });
        $('#_show_list_courier').on('click','.select_courier',function (e) {
            saveCourier($(this).data('data'));
        });

        $('#_show_list_payment').on('click','.select_bank',function (e) {
            saveBank($(this).data('data'));
        });

        $('#save').click(function () {

            // Validasi data agar tidak kosong
            const name = $('#_name').val().trim();
            const phone = $('#_phone').val().trim();
            const address = $('#_address').val().trim();
            const kodepos = $('#kodepos').val().trim();
            const districts = $('#district').val().trim();
            const village = $('#village option:selected').text().trim();

            if (!name || !phone || !address || !kodepos ||!village || !districts) {
                // Menampilkan pesan kesalahan jika ada data yang kosong
                message("Semua kolom alamat harus diisi!");
                return;
            }
            let arr = districts.split(",");
            const district = arr[0];
            const city = arr[1];
            const province = arr[2];
            // Menyimpan data alamat dalam objek
            const addressData = {
                name,
                phone,
                address,
                village,
                district,
                kodepos,
                city,
                province
            };

            // Menyimpan data alamat dalam localStorage`
            localStorage.setItem('address', JSON.stringify(addressData));

            // Menampilkan alamat di elemen HTML
            $('._show_address_fix').html(`
                ${name} | ${phone} <br>
                ${address}
            `);
            $('#_checkout_modal').modal('hide');
            // Panggil fungsi getData() jika diperlukan
            // reloadCourier()
            existingCourier = JSON.parse(localStorage.getItem('courierSelected'));
            if (existingCourier) { setTimeout(() => {
                reloadCourier()
                }, 1000);
            }
            getData();
        });

        function saveCourier(selectedCourier) {
            let existingCourier = JSON.parse(localStorage.getItem('courier'));
            let cart = JSON.parse(localStorage.getItem('cart')) || []; // Pastikan cart selalu array
            let courierSelected;

            if (selectedCourier) {
                // Cari kurir dari local storage
                courierSelected = existingCourier.find(courier =>
                    courier.logistic_name + '-' + courier.rate_name == selectedCourier
                );

                if (courierSelected) {
                    // Tampilkan detail kurir yang dipilih
                    $('._show_courier_fix').html(`
                        ${courierSelected.logistic_name} - ${courierSelected.rate_name} ${currency(courierSelected.rate)}
                    `);

                    let subtotalPrice = 0;
                    cart.forEach(element => {
                        subtotalPrice += element.price.consumer * element.qty;
                    });

                    if (subtotalPrice >= 250000) {
                        courierSelected.rate_show = courierSelected.rate;
                        courierSelected.rate = 0;
                    }else{
                        courierSelected.rate_show = 0;
                    }
                    console.log(courierSelected);
                    // Simpan kurir yang dipilih ke local storage
                    localStorage.setItem('courierSelected', JSON.stringify(courierSelected));
                } else {
                    message('Kurir tidak ditemukan');
                }
            } else {
                message('Kurir tidak dipilih');
            }

            $('#_checkout_modal').modal('hide');
            courierSelected = JSON.parse(localStorage.getItem('courierSelected'));
            $("#courier").html(`<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="truck"
                class="lucide lucide-truck">
                <path d="M14 18V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v11a1 1 0 0 0 1 1h2"></path>
                <path d="M15 18H9"></path>
                <path d="M19 18h2a1 1 0 0 0 1-1v-3.65a1 1 0 0 0-.22-.624l-3.48-4.35A1 1 0 0 0 17.52 8H14"></path>
                <circle cx="17" cy="18" r="2"></circle>
                <circle cx="7" cy="18" r="2"></circle>
            </svg> <span class="ml-2">${courierSelected.logistic_name} - ${courierSelected.rate_name} ${currency(courierSelected.rate)}</span>`);

            getData();
        }

        function saveBank(selectedBankId) {
            let existingBank = JSON.parse(localStorage.getItem('bank'));

            if (selectedBankId) {
                // Cari bank dari local storage
                let selectedBank = bank.find(bank => bank.id == selectedBankId);

                if (selectedBank) {
                    // Tampilkan detail bank yang dipilih
                    $('._show_payment_fix').html(`
                        ${selectedBank.bank.name} <br> ${selectedBank.account_name} - ${selectedBank.account_number}
                    `);

                    // Simpan bank yang dipilih ke local storage
                    localStorage.setItem('selectedBank', JSON.stringify(selectedBank));
                    $('#_checkout_modal').modal('hide');
                } else {
                    console.error('Bank tidak ditemukan');
                }
            } else {
                console.error('ID bank tidak dipilih');
            }
        };

        $("#getLocationButton").click(function() {
            // Check if geolocation is supported
            if ("geolocation" in navigator) {
                // Get current position
                navigator.geolocation.getCurrentPosition(function(position) {
                    var latitude = position.coords.latitude;
                    var longitude = position.coords.longitude;

                    // Call OpenStreetMap Nominatim API
                    var nominatimAPI = "https://nominatim.openstreetmap.org/reverse?format=json&lat=" + latitude + "&lon=" + longitude;

                    // Make an AJAX request
                    get(nominatimAPI, function (err, data) {
                        if (err) {
                            console.log(err);
                        } else {;
                            var address = data.display_name;
                            // Display the address on your webpage
                            $("#_address").val(address);
                            $("#_address_provinsi").val(data.address.state);
                            $("#_address_kota").val(data.address.county);
                            $("#_address_kodepos").val(data.address.postcode);
                            $("#_latitude").val(latitude);
                            $("#_longitude").val(longitude);

                            $('#map').html(`
                            <iframe width="100%" height="170" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" id="map"
                                src="https://maps.google.com/maps?q=${latitude},${longitude}&hl=es&z=15&amp;output=embed">
                            </iframe>
                            `);
                        }
                    });

                });
            } else {
                // Geolocation is not supported by this browser
                alert("Geolocation tidak didukung oleh browser ini, silahkan masukkan alamat secara manual.");
            }
        });

        $('#_save_order').click(function (e) {
            e.preventDefault();
            saveOrder()
        });

        //reload courier
        function reloadCourier() {
            $("#courier").html('<i class="fa fa-spinner fa-spin"></i> Loading...');
            let address = JSON.parse(localStorage.getItem('address'));
            let cart = JSON.parse(localStorage.getItem('cart')) || []; // Pastikan cart selalu array
            let cartCode = [];
            let qty = [];
                // Pastikan cart bukan null atau undefined
            if (Array.isArray(cart)) {
                $.each(cart, function (i, item) {
                    if (item && item.code) {
                        cartCode.push(item.code);
                    }
                    if (item && item.qty) {
                            qty.push(item.qty);
                    }
                });
            }

            if (address) {
                get(url+'/check-courier?postal_code='+address.kodepos+"&cartCode="+cartCode+"&qty="+qty, function (err, data) {
                    if (err) {
                        message("Pastikan kode pos sudah diisi dengan benar!");
                    } else {
                        courier = data.data;
                        let subtotalPrice = 0;
                        cart.forEach(element => {
                            subtotalPrice += element.price.consumer * element.qty;
                        });
                        localStorage.setItem('courier', JSON.stringify(courier));
                        existingCourier = JSON.parse(localStorage.getItem('courierSelected'));
                        courierSelected = courier.find(courier => courier.logistic_name + '-' + courier.rate_name == existingCourier.logistic_name + '-' + existingCourier.rate_name);

                        //change rate if subtotal price > 250000
                        if (subtotalPrice >= 250000) {
                            courierSelected.rate_show = courierSelected.rate;
                            courierSelected.rate = 0;
                        }else{
                            courierSelected.rate_show = 0;
                        }
                        localStorage.setItem('courierSelected', JSON.stringify(courierSelected));

                        let courierSelectednwe = JSON.parse(localStorage.getItem('courierSelected'));
                        $("#courier").html(`<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="truck"
                            class="lucide lucide-truck">
                            <path d="M14 18V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v11a1 1 0 0 0 1 1h2"></path>
                            <path d="M15 18H9"></path>
                            <path d="M19 18h2a1 1 0 0 0 1-1v-3.65a1 1 0 0 0-.22-.624l-3.48-4.35A1 1 0 0 0 17.52 8H14"></path>
                            <circle cx="17" cy="18" r="2"></circle>
                            <circle cx="7" cy="18" r="2"></circle>
                        </svg> <span class="ml-2">${courierSelectednwe.logistic_name} - ${courierSelectednwe.rate_name}
                            ${currency(courierSelected.rate)}</span>`);
                        getData();
                    }
                })
            }
        }

        function saveOrder() {

            let cart = JSON.parse(localStorage.getItem('cart'));
            let address = JSON.parse(localStorage.getItem('address'));
            let courier = JSON.parse(localStorage.getItem('courierSelected'));
            let bank = JSON.parse(localStorage.getItem('selectedBank'));
            let voucher = JSON.parse(localStorage.getItem('voucher'));
            if (!address) {
                message('Silahkan lengkapi alamat terlebih dahulu')
            } else if (!courier) {
                message('Silahkan pilih kurir terlebih dahulu')
            } else if (!bank) {
                message('Silahkan pilih bank terlebih dahulu')
            } else {

            const voucher = $('#voucher').val();
                let data = {
                    _token:"{{ csrf_token() }}",
                    cart: cart,
                    address: address,
                    shipping: courier,
                    payment: bank,
                    voucher: voucher,
                    note: $('#note').val()
                }

                $.ajax({
                    type: "post",
                    url: '{{ route("createOrder") }}',
                    data: data,
                    success: function (data) {
                        if (data.status == 'success') {
                            localStorage.removeItem('cart');
                            localStorage.removeItem('address');
                            localStorage.removeItem('courierSelected');
                            localStorage.removeItem('selectedBank');
                            localStorage.removeItem('voucher');
                            Swal.fire({
                                title: "Berhasil",
                                text: data.message,
                                icon: "success",
                                allowOutsideClick: false,
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    let id = data.data.order_id;
                                    let url = "{{ route('order',':id') }}".replace(':id', id);
                                    window.location.href = url;
                                }
                            })
                        } else {
                            Swal.fire({
                                title: "Gagal",
                                text: data.message,
                                icon: "error",
                                allowOutsideClick: false,
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = "/";
                                }
                            })
                        }
                    },
                    error: function (xhr, status, error) {
                        message(xhr.responseJSON.message);
                    }
                });
            }
        }

        //add voucher
        $('#voucher-button').click(function () {
            let voucher = $('#voucher').val();
            if (voucher == '') {
                message('Voucher tidak boleh kosong');
            } else {
                get(url+'/vouchers/claim?code='+voucher, function (err, data) {
                    if (err) {
                        message('Voucher tidak ditemukan');
                    } else {
                        let discount = data.amount;
                        localStorage.setItem("voucher", discount);
                        let total = $('#total_courier').text();
                        let total_ = total.replace('Rp ', '');
                        $('#discount_').text(`- ${currency(discount)}`);
                    }
                })
            }
        });

        //login
        $(document).on('click', '#_checkout_lanjut', function () {
            $.ajax({
                type: "post",
                url: "{{ route('login') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    name: $('#_user_name').val(),
                    phone: $('#_user_phone').val()
                },
                success: function (response) {
                    //reload
                    Swal.fire({
                        title: "Login Berhasil",
                        text: "Anda akan diarahkan ke halaman checkout dalam 2 detik",
                        icon: "success",
                        allowOutsideClick: false,
                    }).then((result) => {
                        setTimeout(() => {
                            location.reload();
                        }, 2000); // 2000 milidetik sama dengan 2 detik
                    })
                    setTimeout(() => {
                        location.reload();
                    }, 2000);
                },
                error: function (xhr, status, error) {
                    $.each(xhr.responseJSON.errors, function (i, v) {
                        $('#_form_checkout').find(`#error_user_${i}`).html('');
                        $('#_form_checkout').find(`#_user_${i}`).removeClass('is-invalid')


                        $('#_form_checkout').find(`#error_user_${i}`).html(v[0]);
                        $('#_form_checkout').find(`#_user_${i}`).addClass('is-invalid');

                        //remove error
                        $(document).on('keyup', `#_user_${i}`, function () {
                            $('#_form_checkout').find(`#error_user_${i}`).html('');
                            $('#_form_checkout').find(`#_user_${i}`).removeClass('is-invalid');
                        });
                    });
                }
            });
        });

        //checkout
        $('#_checkout').click(function () {
            $('#_form_checkout').html(`
                <div class="row">
                    <div class="col-12 mb-3 text-center">
                        <h6>GABUNG</h6>
                        <p>Silakan isi informasi di bawah ini:</p>
                    </div>
                    <div class="col-12 mb-3">
                        <span class="mb-4 mt-2" style="font-size:13px">Nama
                            Lengkap</span>
                        <input type="text" id="_user_name" class="form-control" style="font-size:13px"
                            placeholder="Masukkan Nama Lengkap">
                        <div style="color:#e44545;font-size:13px" id="error_user_name"></div>
                    </div>
                    <div class="col-12 mb-3">
                        <span class="mb-4 mt-2" style="font-size:13px">Nomor Whatsapp</span>
                        <input type="text" id="_user_phone" class="form-control" style="font-size:13px"
                            placeholder="Masukkan Nomor Whatsapp">
                        <div style="color:#e44545;font-size:13px" id="error_user_phone"></div>
                    </div>
                </div>

                <button class="hover mt-1" id="_checkout_lanjut"
                    style="width: 100%; height: 44px; background-color: #082f49;color:rgb(255, 255, 255)">
                    Lanjut
                </button>
                <button class="hover mt-1" id="_back" style="width: 100%; height: 44px; background-color: #ffffff;color:#082f49">
                    Kembali
                </button>
            `);

            $('#button_checkout').hide();
        });

        $(document).on('click', '#_back', function () {
            $('#_form_checkout').html('');
            $('#button_checkout').show();
        });

        //list address existing
        @if (isset($encodedData))
            let encodedData = '{!! str_replace("'", "\\'", $encodedData) !!}';
            let existingAddress = JSON.parse(encodedData);
            localStorage.setItem('existing_address', JSON.stringify(existingAddress));
            let existing_address = JSON.parse(localStorage.getItem('existing_address'));
            let html = '';
            existing_address.forEach(address => {
                html += `
                    <li class="list-group-item mb-1 hover-pink" style="cursor: pointer;" onmouseover="this.style.cursor='pointer'"
                        data-name="${address.name}"
                        data-phone="${address.phone}"
                        data-address="${address.address}"
                        data-village="${address.subdistrict}"
                        data-district="${address.district}"
                        data-province="${address.province}"
                        data-city="${address.city}"
                        data-postal_code="${address.postal_code}"
                        >
                        <span class="text-bold">${address.name} | ${address.phone}</span>
                        <p>${address.address}</p>
                        <p>${address.subdistrict}, ${address.district}, ${address.city}, ${address.province}, ${address.postal_code}</p>
                    </li>`
            });
            $('#_list_address').html(html);

            $('#_list_address').on('click', 'li', function () {
                let name = $(this).data('name');
                let phone = $(this).data('phone');
                let address = $(this).data('address');
                let village = $(this).data('village');
                let district = $(this).data('district');
                let kodepos = $(this).data('postal_code');
                let province = $(this).data('province');
                let city = $(this).data('city');
                let addressData = {
                    name,
                    city,
                    phone,
                    address,
                    village,
                    district,
                    province,
                    kodepos
                };
                localStorage.setItem('address', JSON.stringify(addressData));
                $('#_checkout_modal').modal('hide');
                getData();
            });
        @endif


        $('#add_address').click(function () {
            $('#_modal_alamat').show();
            $('#_list_address').hide();
            $("#button_address").show();
            $("#add_address").hide();
        });


        $("#district").on('keyup', function () {
            let district = $(this).val();
            if (district.length > 2) {
                getAddress();
            }
        });

        function getAddress() {
            let district = $('#district').val();
            get('{{ route("region") }}?type=district&keyword='+district, function (err, data) {
                if (err) {
                    console.log(err);
                } else {
                    let html = '';
                    data.data.forEach(element => {
                        html += `<option value="${element.text}" data-id="${element.id}"> ${element.text} </option>`;
                    });
                    $('#districts').html(html);
                    $('#kodepos').val('');
                    $('#districts').show();
                }
            })
        }

        // $('#district').on('input', function () {
        //     let districtValue = $(this).val();
        //     let selectedOption = $('#districts option').filter(function () {
        //         return $(this).val() === districtValue;
        //     });

        //     if (selectedOption.length > 0) {
        //         let id = selectedOption.data('id');
        //         get('{{ route("region") }}?type=village&keyword='+id, function (err, data) {
        //             if (err) {
        //                 console.log(err);
        //             } else {
        //                 let html = '';
        //                 data.forEach(element => {
        //                     html += `<option value="${element.name}" data-kodepos="${element.postal_code}"> ${element.name} </option>`;
        //                 });
        //                 $('#village').html(html);
        //             }
        //         })
        //     }
        // });

        $('#districts').on('change', function (e) {
            $("#district").val(this.value);
            $("#districts").hide();
            let districtValue = $(this).val();
                let selectedOption = $('#districts option').filter(function () {
                return $(this).val() === districtValue;
            });

            if (selectedOption.length > 0) {
                let id = selectedOption.data('id');
                get('{{ route("region") }}?type=village&keyword='+id, function (err, data) {
                    if (err) {
                        console.log(err);
                    } else {
                        let html = '';
                        data.forEach(element => {
                            html += `<option value="${element.name}" data-kodepos="${element.postal_code}"> ${element.name} </option>`;
                        });
                        $('#village').html(html);
                    }
                })
            }
        })

        $('#village').on('change', function () {
            //get kodepos
            let kodepos = $(this).find(':selected').data('kodepos');

            $('#kodepos').val(kodepos);
        });

        $('#login').click(function () {
            formDaftar()
            $("#button_checkout").hide();
        });
    });
</script>

<script>
    //remove select2-search__field
        $(document).on('select2:open', function (e) {
            $('.select2-search__field').remove()
        });
</script>
@endpush