@extends('app')

@push('css')
<style>
    .accordion .list a {
        display: block;
        padding: 10px;
        text-decoration: none;
        color: black;
        background-color: #f9f9f9;
        border: 1px solid #ddd;
    }

    .accordion .list a:hover {
        background-color: #e9e9e9;
    }

    .accordion .list a.active {
        background-color: #d9d9d9;
        color: white;
    }

    /* Add CSS to ensure the tabs are properly displayed */
    .tab-pane {
        display: none;
    }

    .tab-pane.show.active {
        display: block;
    }

    .edit-btn {
        background-color: #337ab7;
        /* Warna latar belakang untuk tombol Edit */
        color: #fff;
        /* Warna teks untuk tombol Edit */
        border: none;
        /* Menghapus border */
        padding: 5px 10px;
        /* Padding untuk membuat tombol lebih besar */
        margin-right: 5px;
        /* Margin kanan agar tidak rapat dengan tombol lain */
    }

    .delete-btn {
        background-color: #d9534f;
        /* Warna latar belakang untuk tombol Delete */
        color: #fff;
        /* Warna teks untuk tombol Delete */
        border: none;
        /* Menghapus border */
        padding: 5px 10px;
        /* Padding untuk membuat tombol lebih besar */
    }

    .address {
        upper-case: capitalize;
    }

    .order-row:hover {
        background-color: #f0f0f0;
        /* Ubah warna latar belakang saat dihover */
    }
</style>
@endpush

@section('content')
@php
// Konversi $orders menjadi format JSON agar dapat diakses di JavaScript
$ordersJson = json_encode($orders);
@endphp
<div class="has-breadcrumb-bg mb-120"
    data-background="https://sgp1.vultrobjects.com/naisha-s3/customer/header-2@4x.webp">
    <div class="breadcrumb-content d-flex justify-content-center align-items-center" style="flex-direction: column;">
        <h2 class="title" id="title">
            Profile
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
                <div class="col-xl-3">
                    <div class="widget">
                        <div class="accordion" id="accordionExample">
                            <div class="list">
                                <a href="javascript:void(0)" class="profile" onclick="showTab('profile')">Profile</a>
                            </div>
                            <div class="list">
                                <a href="javascript:void(0)" onclick="showTab('list-order')">List Order</a>
                            </div>
                            <div class="list">
                                <a href="javascript:void(0)" onclick="showTab('list-alamat')">List Address</a>
                            </div>
                            <div class="list">
                                <a href="javascript:void(0)" onclick="logout()">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /. widget -->
                <div class="col-xl-9">
                    <!-- /. filter heading -->
                    <div class="filter-content">
                        <div class="tab-content">
                            {{-- profile --}}
                            <div class="tab-pane fade" id="profile">
                                <div class="product-wrapper">
                                    <h4>Profile</h4>
                                    <form action="" id="profile_form">
                                        <div class="row">
                                            @csrf
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="name">Nama</label>
                                                    <input type="text" class="form-control" id="name" name="name">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="phone">No Telepon</label>
                                                    <input type="text" class="form-control" id="phone" name="phone">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="text" class="form-control" id="email" name="email">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="username">Username</label>
                                                    <input type="text" class="form-control" id="username"
                                                        name="username">
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="gender">Gender</label>
                                                    <select class="form-control " name="gender" id="gender">
                                                        <option value="" disabled="" selected="">
                                                            Silakan pilih</option>
                                                        <option value="1">
                                                            Laki-Laki</option>
                                                        <option value="2">
                                                            Perempuan</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="address">Alamat</label>
                                                    <input type="text" class="form-control" id="address" name="address">
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="postcode">Kodepos</label>
                                                    <input type="text" class="form-control" id="postcode"
                                                        name="postcode">
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="birthday">Tanggal Lahir</label>
                                                    <input type="date" class="form-control" id="birthday"
                                                        name="birthday">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="bio">Bio</label>
                                                    <input type="text" class="form-control" id="bio" name="bio">
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                    <button class="generic-btn black-hover-btn mb-3" id="_save_profile">Simpan</button>
                                </div>

                            </div>
                            <div class="tab-pane fade" id="list-order">
                                <div class="product-wrapper">
                                    <h4>List Orders</h4>
                                    <div class="table-content table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th class="product-thumbnail">#ID</th>
                                                    <th class="cart-product-name">Penerima</th>
                                                    <th class="product-price">Jumlah Item</th>
                                                    <th class="product-quantity">Status</th>
                                                    <th class="product-subtotal">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody id="orders-table-body">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            {{--end list order --}}
                            {{-- list alamat --}}
                            <div class="tab-pane fade" id="list-alamat">
                                <div class="product-wrapper">
                                    <h4>List Address</h4>
                                    <div class="table-content table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th class="product-thumbnail">#ID</th>
                                                    <th class="cart-product-name">Penerima</th>
                                                    <th class="product-price">Alamat</th>
                                                    <th class="product-quantity">Wilayah</th>
                                                    <th class="product-subtotal">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody id="_address">

                                            </tbody>
                                        </table>
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
    </div>
</div>
<div class="modal fade" id="form-customer" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content mt-5">
            <div class="modal-header">
                <h5 class="modal-title">Daftar / Masuk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="_modal_alamat" style="">
                    <div class="p-1 mb-4 border border-gra2-300 rounded-lg bg-neutral-100 pb-70 text-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            data-lucide="triangle-alert" class="lucide lucide-triangle-alert">
                            <path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3"></path>
                            <path d="M12 9v4"></path>
                            <path d="M12 17h.01"></path>
                        </svg><span class="ml-2">Mohon lengkapi informasi di
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
                        <input type="text" id="district" class="form-control" list="districts" aria-autocomplete="list"
                            placeholder="Cari Kecamatan">
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
                <div class="row mt-4 items-center">
                    <div class="col-6">
                        <button type="button" id="save-address" class="btn"
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
@endsection

@push('js')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var links = document.querySelectorAll('.accordion .list a');

        links.forEach(function (link) {
            link.addEventListener('click', function () {
                links.forEach(function (l) {
                    l.classList.remove('active');
                });
                link.classList.add('active');
            });
        });
    });

    function showTab(tabId) {
        // Hide all tabs
        var tabs = document.querySelectorAll('.tab-pane');
        tabs.forEach(function(tab) {
            tab.classList.remove('show', 'active');
        });

        // Show the selected tab
        var selectedTab = document.getElementById(tabId);
        selectedTab.classList.add('show', 'active');
    }
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelector('.profile').click();
    });
    let data = {!! json_encode($profile) !!}; // Mengambil data dari PHP dan mengonversi langsung ke JavaScript
    let dataArray = [];

    // Mengubah objek menjadi array objek
    for (let key in data) {
        if (data.hasOwnProperty(key)) {
            let obj = {
                key: key,
                value: data[key]
            };

            dataArray.push(obj);
        }
    }

    // Mengisi form dengan data yang didapat
    dataArray.forEach(function(item) {
        let input = document.querySelector(`input[name="${item.key}"]`);

        if (input) {
            input.value = item.value;
        }
    });

    // Simpan data profile
    document.getElementById('_save_profile').addEventListener('click', function() {
        let form = document.getElementById('profile_form');
        let formData = new FormData(form);

        $.ajax({
            url: '/profile',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(data) {
                SweetAlert.fire({
                    title: 'Berhasil!',
                    text: 'Data berhasil disimpan',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            },
            error: function(xhr, status, error) {
                // Hapus pesan error sebelumnya
                let inputs = form.querySelectorAll('input');
                inputs.forEach(function(input) {
                    let error = form.querySelector(`#error_${input.name}`);
                    if (error) {
                        error.remove();
                    }
                });
                $.each(xhr.responseJSON.errors, function(i, v) {
                    $('#profile_form').find(`#${i}`).html('');
                    $('#profile_form').find(`#${i}`).removeClass('is-invalid');

                    $('#profile_form').find(`#error_${i}`).html(v[0]);
                    $('#profile_form').find(`#${i}`).addClass('is-invalid');

                    //add error message
                    //append error message
                    $(`#${i}`).after(`<div id="error_${i}" class="invalid-feedback">${v[0]}</div>`);

                    // Hapus pesan error saat pengguna mengubah nilai input
                    $(document).on('keyup', `#${i}`, function() {
                        $('#profile_form').find(`#error_${i}`).html('');
                        $('#profile_form').find(`#${i}`).removeClass('is-invalid');
                    });
                });
            }
        });
    });

    function getStatusText(statusCode) {
        const STATUS = {
            0: 'Menunggu Tindakan.',
            10: 'Menunggu Pembayaran.',
            20: 'Pesanan Terbayar.',
            30: 'Pesanan Sedang Diproses.',
            40: 'Pesanan Sedang Dikirim.',
            50: 'Pesanan Diterima Customer.',
            91: 'Pesanan Dibatalkan Oleh Admin.',
            92: 'Pesanan Dibatalkan Oleh Reseller.',
            93: 'Pesanan telah kadaluarsa.'
        };

        return STATUS[statusCode] || 'Status tidak ditemukan';
    }

    // orders

    let orders = {!! json_encode($orders) !!};

    function renderOrders() {
        const tableBody = document.getElementById('orders-table-body');

        // Menghapus isi tabel sebelum menambahkan data baru
        tableBody.innerHTML = '';
        orders.sort((a, b) => b.id - a.id);
        // Memasukkan setiap pesanan ke dalam tabel
        orders.forEach(item => {
            const row = document.createElement('tr');
            const totalItems = item.items.reduce((acc, curr) => acc + curr.qty, 0);

            // Menambahkan class "order-row" pada elemen <tr> untuk kemudahan referensi CSS atau event listener
            row.classList.add('order-row');

            // Menambahkan event listener untuk menangani klik pada baris <tr>
            row.addEventListener('click', () => {
                // Redirect ke halaman detail order sesuai dengan ID
                window.open(`/order/${item.id}`, '_blank');
            });
            row.style.cursor = 'pointer';
            row.classList.add('order-row');
            row.innerHTML = `
                <td>
                    <a href="/order/${item.id}" target="_blank">#${item.id}</a>
                </td>
                <td class="product-name">${item.customer.name}</td>
                <td class="product-price">${totalItems} Item</td>
                <td class="product-quantity">${getStatusText(item.status)}</td>
                <td class="product-subtotal text-right">
                    <span class="amount">${currency(item.payment.amount)}</span>
                </td>
            `;
            tableBody.appendChild(row);
        });

        // Jika tidak ada pesanan, menampilkan pesan "Tidak ada data"
        if (orders.length === 0) {
            const noDataRow = document.createElement('tr');
            noDataRow.innerHTML = `
                <td colspan="5" class="text-center">Tidak ada data</td>
            `;
            tableBody.appendChild(noDataRow);
        }
    }

    // Memanggil fungsi renderOrders saat dokumen telah dimuat
    document.addEventListener('DOMContentLoaded', function() {
        renderOrders();
    });

    //end orders

    // list alamat
    function renderAddress() {
        let address = JSON.parse(localStorage.getItem('existing_address')) || [];
        console.log(address);
        const tableBody = document.getElementById('_address');

        // Menghapus isi tabel sebelum menambahkan data baru
        tableBody.innerHTML = '';
        address.sort((a, b) => b.id - a.id);
        // Memasukkan setiap pesanan ke dalam tabel
        // <button class="btn btn-xs edit-btn" onclick="editAddress(${item.id})">Edit</button>
        address.forEach((item, index) => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td class="product-number">${index + 1}</td>
                <td class="product-name">${item.name}</td>
                <td class="text-justify">${item.address}</td>
                <td class="text-left address">
                    <span>${item.subdistrict.charAt(0).toUpperCase()}${item.subdistrict.slice(1).toLowerCase()}</span>,
                    <span>${item.district.charAt(0).toUpperCase()}${item.district.slice(1).toLowerCase()}</span>,
                    <span>${item.city.charAt(0).toUpperCase()}${item.city.slice(1).toLowerCase()}</span>,
                    <span>${item.province.charAt(0).toUpperCase()}${item.province.slice(1).toLowerCase()}</span>,
                    <span>${item.postal_code}</span>
                </td>
                <td class="text-justify">

                    <button class="btn btn-xs delete-btn" onclick="deleteAddress(${item.id})">Delete</button>
                </td>
            `;
            tableBody.appendChild(row);
        });

        // Jika tidak ada pesanan, menampilkan pesan "Tidak ada data"
        if (orders.length === 0) {
            const noDataRow = document.createElement('tr');
            noDataRow.innerHTML = `
                <td colspan="5" class="text-center">Tidak ada data</td>
            `;
            tableBody.appendChild(noDataRow);
        }
    }

    // Memanggil fungsi renderOrders saat dokumen telah dimuat
    document.addEventListener('DOMContentLoaded', function() {
        renderAddress();
    });

    function editAddress($id) {
        let address = JSON.parse(localStorage.getItem('existing_address')) || [];
        let selectedAddress = address.find(item => item.id === $id);
        $('#form-customer').modal('show');
    }

    function deleteAddress($id) {
        //sweet alert
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Anda tidak akan dapat mengembalikan ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                let url = "{{ route('deleteAddress',':id') }}".replace(':id', $id);
                $.ajax({
                    type: "post",
                    url: url,
                    data: {
                        _token: "{{ csrf_token() }}",
                    },
                    success: function (response) {
                        localStorage.setItem('existing_address', JSON.stringify(response.data));
                        renderAddress();
                        Swal.fire(
                            'Terhapus!',
                            'Alamat Anda telah dihapus.',
                            'success'
                        )
                    }
                });
            }
        })
    }

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
                    html += '<option value=""> Pilih Kecamatan </option>';
                    data.data.forEach(element => {
                        html += `<option value="${element.text}" data-id="${element.id}"> ${element.text} </option>`;
                    });
                    $('#districts').html(html);
                    $('#kodepos').val('');
                    $('#districts').show();
                }
            })
        }

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
                            html += '<option value=""> Pilih Desa/Kelurahan </option>';
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

        $('#save-address').click(function () {
            SweetAlert.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda akan menyimpan alamat ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, simpan!'
            }).then((result) => {
                if (result.isConfirmed) {

                    const name = $('#_name').val().trim();
                    const phone = $('#_phone').val().trim();
                    const address = $('#_address').val().trim();
                    const kodepos = $('#kodepos').val().trim();
                    const districts = $('#district').val().trim();
                    const village = $('#village option:selected').text().trim();

                    if (!name || !phone || !address || !kodepos || !village || !districts) {
                    // Menampilkan pesan kesalahan jika ada data yang kosong
                    alert("Semua kolom alamat harus diisi!");
                    return;
                    }

                    // Memisahkan nilai district menjadi array dengan pemisah koma
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

                    // Menyimpan data alamat dalam localStorage
                    localStorage.setItem('address', JSON.stringify(addressData));
                    renderAddress();
                    $('#form-customer').modal('hide');
                }
            })
        })
</script>
@endpush