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
</style>
@endpush

@section('content')
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
                <div class="col-xl-3 hidden-xl">
                    <div class="widget">
                        <div class="accordion" id="accordionExample">
                            <div class="list">
                                <a href="javascript:void(0)" class="profile" onclick="showTab('profile')">Profile</a>
                            </div>
                            <div class="list">
                                <a href="javascript:void(0)" onclick="showTab('list-order')">List Order</a>
                            </div>
                            <div class="list">
                                <a href="javascript:void(0)" onclick="showTab('list-alamat')">List Alamat</a>
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
                                {{--end profile --}}
                                {{-- list order --}}
                                <div class="tab-pane fade" id="list-order">
                                    <div class="product-wrapper">
                                        <div class="row">
                                            {{-- pro --}}

                                        </div>
                                    </div>
                                </div>
                                {{--end list order --}}
                                {{-- list alamat --}}
                                <div class="tab-pane fade" id="list-alamat">
                                    <div class="product-wrapper">
                                        <div class="row">
                                            {{-- pro --}}
                                            <div class="col-6">
                                                <!-- List alamat content here -->
                                                <p>alamat</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{--end list alamat --}}
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
</script>
@endpush