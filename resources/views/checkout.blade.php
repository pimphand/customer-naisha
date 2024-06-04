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
        background-color: #e174b8;
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
        border-radius: 20px;
        color: white;
        /* Warna teks tombol */
        transition: background-color 0.3s, color 0.3s;
        /* Efek transisi saat hover */
    }

    .hover:hover {
        background-color: #e174b8;
        /* Warna latar belakang saat dihover */
        /* color: black !important; */
        /* Warna teks saat dihover */
    }

    .hover-pink:hover .p-1 {
        background-color: #e174b8;
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
</style>

<section class="checkout-area pb-70">
    <div class="container custom-padding">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
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
                        </ul>
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
                                <span id="subtotalPrice">Rp 100.000</span>
                            </div>
                        </li>

                        <li class="d-flex justify-content-between mt-3 font-12">
                            <div class="flex" style="display: flex; flex-direction: row;">
                                <span>Subtotal Pengiriman </span>
                            </div>
                            <div>
                                <span id="subtotalPengiriman">Rp 100.000</span>
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
                                <span id="total_courier">Rp 100.000</span>
                            </div>
                        </li>

                        <button class="mt-4 hover" id="_save_order"
                            style="width: 100%; height: 44px; background-color: #082f49; border-radius: 20px;color:rgb(255, 255, 255)">Bayar
                            Sekarang</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 mt-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Keranjang <span id="total_cart">()</span></h5>

                        <ul id="list_cart_checkout">
                            <li class="d-flex justify-content-between">
                                <div>
                                    <img src="assets/img/products/1.jpg" alt="product" width="50">
                                    <span class="ml-2">Product 1</span>
                                </div>
                                <div>
                                    <span>1 x Rp 100.000</span>
                                </div>
                            </li>
                        </ul>
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

                        <div id="map">
                            <iframe width="100%" height="170" frameborder="0" scrolling="no" marginheight="0"
                                marginwidth="0" id="map"
                                src="https://maps.google.com/maps?q=-7.76500673204135,110.44047756698187&hl=es&z=15&amp;output=embed">
                            </iframe>
                        </div>

                        <div class="p-1 border border-gra2-300 rounded-lg bg-neutral-100 text-icon"
                            id="getLocationButton" style="cursor: auto" onmouseover="this.style.cursor='pointer'"
                            onmouseout="this.style.cursor='auto'">
                            <i data-lucide="locate-fixed"></i><span class="ml-2 p-1">Gunakan Lokasi Saat
                                ini</span>
                        </div>

                        <div class="p-1">
                            <span class="ml-2">Alamat lengkap</span>
                            <textarea type="text" id="_address" class="form-control"
                                placeholder="Masukkan Alamat Lengkap"></textarea>
                        </div>

                        <div class="p-1">
                            <span class="">Provinsi</span>
                            <input type="text" id="_address_provinsi" class="form-control"
                                placeholder="Masukkan Provinsi">
                        </div>
                        <div class="p-1">
                            <span class="">Kota</span>
                            <input type="text" id="_address_kota" class="form-control" placeholder="Masukkan Kota">
                        </div>
                        <input id="_latitude" hidden type="text"><input id="_longitude" hidden type="text">
                        <div class="p-1">
                            <span class="">Kode Pos</span>
                            <input type="text" id="_address_kodepos" class="form-control"
                                placeholder="Masukkan Kode Pos">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <button type="button" id="save" class="btn btn-success">Simpan</button>
                    <button type="button" id="save_courier" class="btn btn-success">Simpan</button>
                    <button type="button" id="save_bank" class="btn btn-success">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('js')
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

            let address = JSON.parse(localStorage.getItem('address'));
            let cour = JSON.parse(localStorage.getItem('courierSelected'));
            let existingBank = JSON.parse(localStorage.getItem('selectedBank'));
            if (cour) {
                $('._show_courier_fix').html(`
                    ${cour.logistic_name} - ${cour.rate_name} ${currency(cour.rate)}
                `);
            }

            if (existingBank) {
                $('._show_payment_fix').html(`
                    ${existingBank.bank.name} <br> ${existingBank.account_name} - ${existingBank.account_number}
                `);
            }

            if (address) {
                $('._show_address_fix').html(`
                    ${address.name} | ${address.phone} <br>
                    ${address.address}
                `);

                $('#_name').val(address.name);
                $('#_phone').val(address.phone);
                $('#_address').val(address.address);
                $('#_address_provinsi').val(address.provinsi);
                $('#_address_kota').val(address.kota);
                $('#_address_kodepos').val(address.kodepos);
                $('#_latitude').val(address.latitude);
                $('#_longitude').val(address.longitude);

                $('#map').html(`
                    <iframe width="100%" height="170" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" id="map"
                        src="https://maps.google.com/maps?q=${address.latitude},${address.longitude}&hl=es&z=15&amp;output=embed">
                    </iframe>
                `);
            }

            if (cart) {
                //diambil dari total qty
                listCartCheckout(cart)
                //total price
                let subtotalPrice = 0;
                cart.forEach(element => {
                    subtotalPrice += element.price.consumer * element.qty;
                });

                if (cour) {
                    $("#total_courier").text(currency(subtotalPrice + cour.rate));
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
        })

        $(document).on('click', '.minus', function () {
            let code = $(this).data('code');
            decreaseQty(code);
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
                console.log(item.stock);
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
                setTimeout(() => {
                    reloadCourier()
                }, 1000);
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
                setTimeout(() => {
                     reloadCourier()
                }, 1000);
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
            $('#_modal_alamat').show();
            $('#_show_list_payment').hide();
            $('#_show_list_courier').hide();
        });

        let bank = [];
        $('#payment').click(function () {
            $("#save").hide();
            $("#save_courier").hide();
            $("#save_bank").show();
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
                        $('#_title_modal').text('Pilih Kurir');
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
                                    <img src="${element.bank.icon}" width="20%">
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
           $("#save").hide();
           $("#save_courier").show();
           $("#save_bank").hide();
           if (!address) {
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

                        //save courier in variable
                        courier = data.data;
                        localStorage.setItem('courier', JSON.stringify(courier));
                        data.data.forEach(element => {
                            html += `
                            <label class="flex justify-between hover-pink select_courier" data-data="${element.logistic_name}-${element.rate_name}">
                                <div class="p-1 border border-gra2-300 rounded-lg bg-neutral-100 text-icon flex items-center ">
                                    <img src="${element.logo}" width="20%">
                                    <span class="ml-2 p-1">${element.logistic_name} - ${element.rate_name} ${currency(element.rate)} <br>
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
            const provinsi = $('#_address_provinsi').val().trim();
            const kota = $('#_address_kota').val().trim();
            const kodepos = $('#_address_kodepos').val().trim();
            const latitude = $('#_latitude').val().trim();
            const longitude = $('#_longitude').val().trim();

            if (!name || !phone || !address || !provinsi || !kota || !kodepos || !latitude || !longitude) {
                // Menampilkan pesan kesalahan jika ada data yang kosong
                message("Semua kolom alamat harus diisi!");
                return;
            }

            // Menyimpan data alamat dalam objek
            const addressData = {
                name,
                phone,
                address,
                provinsi,
                kota,
                kodepos,
                latitude,
                longitude
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
            reloadCourier()
            getData();
        });

        function saveCourier(selectedCourier) {
            let existingCourier = JSON.parse(localStorage.getItem('courier'));
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
                        localStorage.setItem('courier', JSON.stringify(courier));
                        existingCourier = JSON.parse(localStorage.getItem('courierSelected'));
                        courierSelected = courier.find(courier => courier.logistic_name + '-' + courier.rate_name == existingCourier.logistic_name + '-' + existingCourier.rate_name);

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
            //get cart
            let cart = JSON.parse(localStorage.getItem('cart'));
            let address = JSON.parse(localStorage.getItem('address'));
            let courier = JSON.parse(localStorage.getItem('courierSelected'));
            let bank = JSON.parse(localStorage.getItem('selectedBank'));

            if (!address) {
                message('Silahkan lengkapi alamat terlebih dahulu')
            } else if (!courier) {
                message('Silahkan pilih kurir terlebih dahulu')
            } else if (!bank) {
                message('Silahkan pilih bank terlebih dahulu')
            } else {

                let data = {
                    _token:"{{ csrf_token() }}",
                    cart: cart,
                    address: address,
                    shipping: courier,
                    payment: bank
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
                            Swal.fire({
                                title: "Berhasil",
                                text: data.message,
                                icon: "success",
                                allowOutsideClick: false,
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = "/";
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
                        console.log(xhr.responseText);
                    }
                });
            }
        }

        //add voucher

    });
</script>
@endpush