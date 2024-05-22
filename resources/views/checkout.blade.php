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
        font-size: 12px;
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
        background-color: pink;
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
                                <i data-lucide="credit-card"></i> <span class="_show_payment_fix ml-2">Metode
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
                            <i data-lucide="triangle-alert"></i><span class="ml-2">Mohon lengkapi informasi di bawah
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
                            <i data-lucide="locate-fixed"></i><span class="ml-2 p-1">Gunakan Lokasi Saat ini</span>
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
            let address = JSON.parse(localStorage.getItem('address'));
            let cour = JSON.parse(localStorage.getItem('courier'));
            let existingBank = JSON.parse(localStorage.getItem('bank'));

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
        }

        $('#address').click(function () {
            $('#_checkout_modal').modal('show');
            $('#_title_modal').text('Tambah Alamat');
            $('#_modal_alamat').show();
            $('#_show_list_payment').hide();
            $('#_show_list_courier').hide();
        });
        let bank = [];
        $('#payment').click(function () {
            $('#_title_modal').text('Pilih Metode Pembayaran');
            let address = JSON.parse(localStorage.getItem('address'));
            if (!address) {
                alert('Silahkan lengkapi alamat terlebih dahulu');
            }else{
                get('{{ config("app.api_url") }}/payment-method', function (err, data) {
                    if (err) {
                        console.log(err);
                    } else {
                        $('#_checkout_modal').modal('show');
                        $('#_title_modal').text('Pilih Kurir');
                        $('#_modal_alamat').hide();
                        $('#_show_list_payment').show();
                        $('#_show_list_courier').hide();
                        let html = '';

                        bank = data.data;
                        data.data.forEach(element => {
                        //rate idr
                        html += `
                        <label class="flex justify-between">
                            <div class="p-1 border border-gra2-300 rounded-lg bg-neutral-100 text-icon flex items-center">
                                <img src="${element.bank.icon}" width="20%">
                                <span class="ml-2 p-1"> ${element.account_name} - ${element.account_number}</span>
                                <input type="radio" name="bank" value="${element.id}" class="ml-2 align-items-end">
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
           if (!address) {
                alert('Silahkan lengkapi alamat terlebih dahulu');
           }else{

                get('{{ config("app.api_url") }}/check-courier?postal_code='+address.kodepos, function (err, data) {
                    if (err) {
                        console.log(err);
                    } else {
                        $('#_checkout_modal').modal('show');
                        $('#_title_modal').text('Pilih Kurir');
                        $('#_modal_alamat').hide();
                        $('#_show_list_payment').hide();
                        $('#_show_list_courier').show();
                        let html = '';

                        //save courier in variable
                        courier = data.data;
                        data.data.forEach(element => {
                            //rate idr
                            html += `
                            <label class="flex justify-between">
                                <div class="p-1 border border-gra2-300 rounded-lg bg-neutral-100 text-icon flex items-center ">
                                    <img src="${element.logo}" width="20%">
                                    <span class="ml-2 p-1">${element.logistic_name} - ${element.rate_name} ${currency(element.rate)}</span>
                                    <input type="radio" name="courier" value="${element.logistic_name}-${element.rate_name}" class="ml-2">
                                </div>
                            </label>
                            `;
                        });

                        $('#_show_list_courier').html(html);
                    }
                });

           }
        });

        $('#save').click(function () {
            $('#_checkout_modal').modal('hide');

            //save to local storage
            let addresss = {
                name: $('#_name').val(),
                phone: $('#_phone').val(),
                address: $('#_address').val(),
                provinsi: $('#_address_provinsi').val(),
                kota: $('#_address_kota').val(),
                kodepos: $('#_address_kodepos').val(),
                latitude: $('#_latitude').val(),
                longitude: $('#_longitude').val()
            };
            localStorage.setItem('address', JSON.stringify(addresss));
            $('._show_address_fix').html(`
                ${$('#_name').val()} | ${$('#_phone').val()} <br>
                ${$('#_address').val()}
            `);
            let existingCourier = JSON.parse(localStorage.getItem('courier'));
            let existingBank = JSON.parse(localStorage.getItem('bank'));
            if (!existingCourier) {
                let selectedCourier = courier.find(courier => courier.logistic_name+'-'+courier.rate_name == $('input[name="courier"]:checked').val());

                $('._show_courier_fix').html(`
                    ${selectedCourier.logistic_name} - ${selectedCourier.rate_name} ${currency(selectedCourier.rate)}
                `);

                //save to local storage
                localStorage.setItem('courier', JSON.stringify(selectedCourier));
            }
            let selectedBankId = $('input[name="bank"]:checked').val();

            // Mencari bank yang sesuai dengan ID yang dipilih
            let selectedBank = bank.find(bank => bank.id == selectedBankId);

            // Memeriksa apakah bank yang dipilih ada dan apakah berbeda dengan bank yang sudah ada sebelumnya
            if (!selectedBank || (existingBank && selectedBank.id !== existingBank.id)) {
                // Mengubah HTML untuk menampilkan informasi bank yang dipilih
                $('._show_bank_fix').html(`Bank ${selectedBank.bank.name} <br> ${selectedBank.account_name} -
                ${selectedBank.account_number}`);

                // Menyimpan bank yang dipilih ke local storage
                localStorage.setItem('bank', JSON.stringify(selectedBank));
            }

          getData()

        });

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
                        } else {
                            console.log(data);
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
    });

</script>
@endpush