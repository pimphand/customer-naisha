@extends('app')

@section('content')
<!-- header section end -->
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
        border-radius: 10px;
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
</style>
@php
$customer = $order['customer'];
$user = $order['user'];
$items = $order['items'];

$subtotal = 0;
$total_qty = 0;
foreach ($items as $item) {
$subtotal += $item['qty'] * $item['user_price_idr'];
$total_qty += $item['qty'];
}

$form = ['date','order_id','payment_method','from_bank','from_account_name','amount'];
// $this->payment->amount + $this->payment->code_unique - $this->voucher_amount
$total = $order['payment']['amount'] - $order['payment']['code_unique'] - ($order['voucher']['amount'] ?? 0);
@endphp
<section class="checkout-area pb-70">
    <div class="container custom-padding">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title">Pengiriman & Pembayaran</h5>
                            <h5 class="card-title">#{{ $order['id'] }} ({{ $order['status']['message'] }})</h5>

                        </div>
                        <ul class="list-group mt-2 font-12">
                            <li class="list-group-item mb-1 element text-icon" style="cursor: auto;" id="address"
                                onmouseover="this.style.cursor='pointer'" onmouseout="this.style.cursor='auto'">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" data-lucide="map-pin" class="lucide lucide-map-pin">
                                    <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"></path>
                                    <circle cx="12" cy="10" r="3"></circle>
                                </svg> <span class="_show_address_fix ml-2">
                                    {{ $customer['name'] }} | {{ $customer['phone'] }} <br> {{$customer['address']}}
                                    <br> {{ $customer['subdistrict']}} - {{ $customer['district'] }} -
                                    {{ $customer['city'] }} - {{ $customer['province'] }},
                                    {{ $customer['postal_code']}}
                                </span>
                            </li>
                            <li class="list-group-item mb-1 element text-icon" style="cursor: auto" id="courier"
                                onmouseover="this.style.cursor='pointer'" onmouseout="this.style.cursor='auto'">
                                <i data-lucide="truck"></i> <span class="_show_courier_fix ml-2">{{
                                    $order['shipping']['courier']['name'] }} - {{ $order['shipping']['courier_type'] }}
                                    - Rp. {{
                                    number_format($order['shipping']['cost']) }} <br>
                                    Resi : <span id="resi">{{ $order['shipping']['resi'] }}</span>
                                </span>
                            </li>
                            <li class="list-group-item mb-1 element text-icon" style="cursor: auto" id="payment"
                                onmouseover="this.style.cursor='pointer'" onmouseout="this.style.cursor='auto'">
                                <i data-lucide="credit-card"></i>
                                <span class="_show_payment_fix ml-2">
                                    {{ $order['payment']['payment_method']['bank']['name'] }} <br> {{
                                    $order['payment']['payment_method']['account_name'] }} -
                                    {{ $order['payment']['payment_method']['account_number'] }}
                                </span>
                            </li>

                            @if ($order['is_dropship'] == true)
                            <li class="list-group-item mb-1 element text-icon" style="cursor: auto" id="payment"
                                onmouseover="this.style.cursor='pointer'" onmouseout="this.style.cursor='auto'">
                                <img src="{{ $order['marketplace']['icon'] }}" alt="" width="100px">
                                <span class="_show_payment_fix ml-2">
                                    {{ $order['marketplace']['name'] }} - {{ $order['store_name'] }}
                                </span>
                            </li>
                            @endif

                            <li class="list-group-item mb-1 element text-icon mt-20" style="cursor: auto" id="payment"
                                onmouseover="this.style.cursor='pointer'" onmouseout="this.style.cursor='auto'">
                                <textarea name="note" id="note" cols="100%" rows="3" class="form-control" readonly
                                    disabled
                                    placeholder="Catatan untuk penjual">{{ $order['customer_note'] }}</textarea>
                            </li>
                        </ul>

                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-body">
                        <h5 class="card-title">Keranjang <span id="total_cart">({{ $total_qty
                                }})</span></h5>
                        <ul id="list_cart_checkout">
                            @foreach ($items as $item)
                            <li class="d-flex justify-content-between mt-3 font-12">

                                <div class="flex" style="display: flex; flex-direction: row;">
                                    <div>
                                        <img src="{{ $item['sku']['image_url'] }}" alt="product" width="60">
                                    </div>
                                    <div style="margin-left: 10px;">
                                        <span>Parfum Fresh Series | Apple Joy | Eau de Parfume |
                                            30ml</span>
                                        <br>
                                        <span style="margin-top: 5px;">Qty: {{ $item['qty'] }} x Rp.
                                            {{
                                            number_format($item['user_price_idr']) }}</span>
                                    </div>
                                </div>
                                <div>
                                    <span>Rp. {{ number_format($item['qty'] *
                                        $item['user_price_idr']) }}</span><br>
                                </div>

                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="card mt-3" id="tracking" style="display: none">
                    <div class="card-body">
                        <h5 class="card-title">Tracking Pengiriman</span></h5>
                        <ul id="history">

                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card mb-2">
                    <div class="card-body">
                        <h5 class="card-title">Ringkasan Belanja</h5>
                        <li class="d-flex justify-content-between mt-3 font-12">
                            <div class="flex" style="display: flex; flex-direction: row;">
                                <span>Subtotal </span>
                            </div>
                            <div>
                                <span id="subtotalPrice">Rp. {{ number_format($subtotal) }}</span>
                            </div>
                        </li>

                        <li class="d-flex justify-content-between mt-3 font-12">
                            <div class="flex" style="display: flex; flex-direction: row;">
                                <span>Subtotal Pengiriman </span>
                            </div>
                            <div>
                                <span id="subtotalPengiriman">Rp. {{ number_format($order['shipping']['cost'])
                                    }}</span>
                            </div>
                        </li>
                        <li class="d-flex justify-content-between mt-3 font-12">
                            <div class="flex" style="display: flex; flex-direction: row;">
                                <span>Kode Unik </span>
                            </div>
                            <div>
                                <span id="subtotalPengiriman">- Rp.
                                    {{ number_format($order['payment']['code_unique'])}}
                                </span>
                            </div>
                        </li>

                        @if ($order['voucher'] != null)
                        <li class="d-flex justify-content-between mt-3 font-12">
                            <div class="flex" style="display: flex; flex-direction: row;">
                                <span>Voucher ({{ $order['voucher']['name'] }})</span>
                            </div>
                            <div>
                                <span id="subtotalPengiriman">- Rp.
                                    {{ number_format($order['voucher']['amount'])}}
                                </span>
                            </div>
                        </li>
                        @endif
                        <hr>
                        <li class="d-flex justify-content-between mt-3 font-12">
                            <div class="flex" style="display: flex; flex-direction: row;">
                                <span>Total Bayar</span>
                            </div>
                            <div>
                                <span id="total_courier">Rp. {{ number_format($order['payment']['total']) }}</span>
                            </div>
                        </li>
                        @if (count($order['confirmations']) <= 0) <div class="form_input" style="display:none">
                            <li class="d-flex justify-content-between mt-3 font-12">
                                <input type="text" name="date" class="form-control flatpickr-input" id="date"
                                    placeholder="date" readonly="readonly">
                            </li>
                            <div id="_error_from_bank" class="invalid-feedback"></div>

                            <input type="text" name="order_id" class="form-control" id="order_id" hidden
                                value="{{ $order['id'] }}" placeholder="order_id">

                            <input type="text" name="payment_method" class="form-control" id="payment_method" hidden
                                placeholder="" value="{{ $order['payment']['payment_method']['id'] }}">

                            <li class="d-flex justify-content-between mt-3 font-12">
                                <input type="text" name="from_bank" class="form-control" id="from_bank"
                                    placeholder="Bank Pengirim">
                            </li>
                            <div id="_error_from_bank" class="invalid-feedback"></div>

                            <li class="d-flex justify-content-between mt-3 font-12">
                                <input type="text" name="from_account_name" class="form-control" id="from_account_name"
                                    placeholder="Nama Pengirim">
                            </li>
                            <div id="_error_from_account_name" class="invalid-feedback"></div>

                            <li class="d-flex justify-content-between mt-3 font-12">
                                <input type="text" name="amount" class="form-control" id="amount"
                                    placeholder="Jumlah Transfer">

                            </li>
                            <div id="_error_amount" class="invalid-feedback"></div>
                            <li class="d-flex justify-content-between mt-3 font-12">
                                <input type="text" name="refrence" class="form-control" id="refrence"
                                    placeholder="Nomor Rerfensi">
                            </li>
                            <div id="_error_refrence" class="invalid-feedback"></div>
                            <li class="d-flex justify-content-between mt-3 font-12">
                                <input type="file" name="image" class="from-control" id="image">
                            </li>
                            <div id="_error_image" class="invalid-feedback"></div>
                    </div>

                    <button class="mt-4 hover" id="open_form"
                        style="width: 100%; height: 44px; background-color: #082f49; border-radius: 10px;color:rgb(255, 255, 255)">
                        Upload Bukti Pembayaran
                    </button>
                    <button class="mt-4 hover" id="save_bukti"
                        style="display: none; width: 100%; height: 44px; background-color: #082f49; border-radius: 10px;color:rgb(255, 255, 255)">
                        Simpan
                    </button>
                    <button class="mt-2 hover" id="cancel"
                        style=" width: 100%; height: 44px; background-color: #a6a6a6; border-radius: 10px;color:rgb(0, 0, 0)">
                        Batal
                    </button>
                    @endif
                </div>
            </div>

            @if (isset($order['confirmations']) && count($order['confirmations']) > 0)
            <div class="card mt-3">
                <div class="card-body">
                    <h5 class="card-title">Bukti Pembayaran</h5>
                    <li class="d-flex justify-content-between mt-3 font-12">
                        <div class="flex" style="display: flex; flex-direction: row;">
                            <span>Tanggal Bayar </span>
                        </div>
                        <div>
                            <span id="subtotalPrice">
                                {{ date('d-m-Y H:i', strtotime($order['confirmations'][0]['date']))}}
                            </span>
                        </div>
                    </li>
                    <li class="d-flex justify-content-between mt-3 font-12">
                        <div class="flex" style="display: flex; flex-direction: row;">
                            <span>Dari Bank </span>
                        </div>
                        <div>
                            <span id="subtotalPrice">{{ $order['confirmations'][0]['from_bank']
                                }}</span>
                        </div>
                    </li>
                    <li class="d-flex justify-content-between mt-3 font-12">
                        <div class="flex" style="display: flex; flex-direction: row;">
                            <span>Total Bayar </span>
                        </div>
                        <div>
                            <span id="subtotalPrice">{{ $order['confirmations'][0]['amount']
                                }}</span>
                        </div>
                    </li>
                    <li class="d-flex justify-content-between mt-3 font-12">
                        <div class="flex" style="display: flex; flex-direction: row;">
                            <span>No Refrence </span>
                        </div>
                        <div>
                            <span id="subtotalPrice">{{ $order['confirmations'][0]['refrence']
                                }}</span>
                        </div>
                    </li>
                    <img src="{{ $order['confirmations'][0]['image'] }}" width="80%" alt="">
                </div>
            </div>
            @endif
        </div>
    </div>

    </div>
</section>
@endsection
@push('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endpush
@push('js')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    $('#save_bukti').hide();
    $('#cancel').hide();
    $("input[name=date]").flatpickr({
        enableTime: true,
        dateFormat: "Y-m-d H:i",
    });
    @if($order['shipping']['resi'] != null && $order['is_dropship'] == false)
        $.ajax({
            type: "get",
            url: "{{ route('region') }}",
            data: {
                keyword: $("#resi").text(),
                type: "tracking"
            },
            success: function (response) {
                $.each(response.history, function (indexInArray, valueOfElement) {
                    $('#tracking').show();
                    $.each(valueOfElement, function (key, value) {
                        console.log(value);
                        $("#history").append(
                        `<li class="d-flex justify-content-between mt-3 font-12">

                            <div class="flex" style="display: flex; flex-direction: row;">
                                <div>
                                    <img src="${value.pod}"
                                        alt="" width="60">
                                </div>
                                <div style="margin-left: 10px;">
                                    <span>${value.date}</span>
                                    <br>
                                    <span style="margin-top: 5px;">${value.desc}</span>
                                </div>
                            </div>

                        </li>`
                        );
                    });

                });
            }
        });
    @endif
    $("#open_form").click(function () {
        $(".form_input").show();
        $("#open_form").hide();
        $("#save_bukti").show();
        $("#cancel").show();
    });

    $("#cancel").click(function () {
        $(".form_input").hide();
        $("#open_form").show();
        $("#save_bukti").hide();
        $("#cancel").hide();
    });

    //keyup idid="amount" only number
    $("#amount").keyup(function () {
        var val = $(this).val();
        if (isNaN(val)) {
            $(this).val(val.slice(0, -1));
        }
    });

    //#save_bukti
    $("#save_bukti").click(function () {
        var date = $("#date").val();
        var order_id = $("#order_id").val();
        var payment_method = $("#payment_method").val();
        var from_bank = $("#from_bank").val();
        var from_account_name = $("#from_account_name").val();
        var amount = $("#amount").val();
        var refrence = $("#refrence").val();
        var file = $("#image").prop('files')[0];
        var formData = new FormData();
        formData.append('date', date);
        formData.append('order_id', order_id);
        formData.append('payment_method', payment_method);
        formData.append('from_bank', from_bank);
        formData.append('from_account_name', from_account_name);
        formData.append('amount', amount);
        formData.append('refrence', refrence);
        formData.append('image', file);
        formData.append('_token', "{{ csrf_token() }}");
        $.ajax({
            type: "post",
            url: "{{ route('confirmation') }}",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                location.reload();
            },
            error: function (xhr, status, error) {
                $.each(xhr.responseJSON.errors, function (i, v) {
                    $(`#_error_${i}`).html('');
                    $(`#${i}`).removeClass('is-invalid')


                    $(`#_error_${i}`).html(v[0]);
                    $(`#${i}`).addClass('is-invalid');
                    //remove error
                    $(document).on('keyup', `#${i}`, function () {
                        $(`_error_#${i}`).html('');
                        $(`#${i}`).removeClass('is-invalid');
                    });
                });
            }
        });
    });
</script>
@endpush
