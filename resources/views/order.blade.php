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

$total = $subtotal + $order['shipping_cost'] - $order['payment']['code_unique'] - $order['voucher_amount'];
@endphp
<section class="checkout-area pb-70">
    <div class="container custom-padding">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Pengiriman & Pembayaran</h5>
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
                                    $order['courier']['name'] }} - {{ $order['courier_type'] }} - Rp. {{
                                    number_format($order['shipping_cost']) }}</span>
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

                            <li class="list-group-item mb-1 element text-icon mt-20" style="cursor: auto" id="payment"
                                onmouseover="this.style.cursor='pointer'" onmouseout="this.style.cursor='auto'">
                                <textarea name="note" id="note" cols="100%" rows="3" class="form-control" readonly
                                    disabled
                                    placeholder="Catatan untuk penjual">{{ $order['customer_note'] }}</textarea>
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
                                <span id="subtotalPrice">Rp. {{ number_format($subtotal) }}</span>
                            </div>
                        </li>

                        <li class="d-flex justify-content-between mt-3 font-12">
                            <div class="flex" style="display: flex; flex-direction: row;">
                                <span>Subtotal Pengiriman </span>
                            </div>
                            <div>
                                <span id="subtotalPengiriman">Rp. {{ number_format($order['shipping_cost'])
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

                        @if ($order['voucher_id'] != null)
                        <li class="d-flex justify-content-between mt-3 font-12">
                            <div class="flex" style="display: flex; flex-direction: row;">
                                <span>Voucher ({{ $order['voucher']['name'] }})</span>
                            </div>
                            <div>
                                <span id="subtotalPengiriman">- Rp.
                                    {{ number_format($order['voucher_amount'])}}
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
                                <span id="total_courier">Rp. {{ number_format($order['consumer_price_idr']) }}</span>
                            </div>
                        </li>
                        <button class="mt-4 hover" id="_save_order"
                            style="width: 100%; height: 44px; background-color: #082f49; border-radius: 20px;color:rgb(255, 255, 255)">
                            Upload Bukti Pembayaran
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 mt-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Keranjang <span id="total_cart">({{ $total_qty }})</span></h5>
                        <ul id="list_cart_checkout">
                            <li class="d-flex justify-content-between mt-3 font-12">
                                @foreach ($items as $item)
                                <div class="flex" style="display: flex; flex-direction: row;">
                                    <div>
                                        <img src="{{ $item['sku']['images'][0]['url'] }}" alt="product" width="60">
                                    </div>
                                    <div style="margin-left: 10px;">
                                        <span>Parfum Fresh Series | Apple Joy | Eau de Parfume |
                                            30ml</span>
                                        <br>
                                        <span style="margin-top: 5px;">Qty: {{ $item['qty'] }} x Rp. {{
                                            number_format($item['user_price_idr']) }}</span>
                                    </div>
                                </div>
                                <div>
                                    <span>Rp. {{ number_format($item['qty'] * $item['user_price_idr']) }}</span><br>
                                </div>
                                @endforeach
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
