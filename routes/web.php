<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/catalog', [FrontendController::class, 'catalog'])->name('catalog');

Route::get('/product/{id}', [FrontendController::class, 'detailProduct'])->name('product');
Route::get('/order/{id}', [FrontendController::class, 'detailOrder'])->name('order');


Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout');

Route::get('/cart', function () {
    return view('cart');
})->name('cart');

Route::get('/pull-asd', function () {
    $output = shell_exec('git pull');
    // Menampilkan output dari perintah git pull
    echo "<pre>$output</pre>";
});

Route::post('create-order', function (Request $request) {
    $carts = $request->cart;
    $shipping = $request->shipping;
    $bank = $request->payment;
    $customer = $request->address;

    $customer = [
        "name" =>  $customer['name'],
        "phone" => $customer['phone'],
        "postal_code" => $customer['kodepos'],
        "address" => $customer['address'],
    ];
    $cart = [];
    foreach ($carts as $key => $cartItem) {
        $cart[] = [
            "sku_code" => $cartItem['code'],
            "qty" => $cartItem['qty'],
        ];
    }
    //array hubah ke string
    // $cartCode = implode(',', $cartCode);
    // $couier =  Http::get(config('app.api_url') . '/customer/check-courier', [
    //     'postal_code' => $customer['postal_code'],
    //     'cartCode' => $cartCode,
    // ]);



    // if ($couier->status() == 200) {
    //     $courier = $couier['data'];
    // } else {
    //     return response()->json([
    //         'status' => 'error',
    //         'message' => $couier['message'],
    //         'request' => $request->all(),
    //     ], 422);
    // }

    //find courier by couerier logistic_name and rate_name
    // $courier = collect($courier)->where('logistic_name', $shipping['logistic_name'])->where('rate_name', $shipping['rate_name'])->first();


    $order = array(
        "courier" => $shipping['logistic_name'],
        "courier_type" => $shipping['rate_name'],
        "courier_estimated" => $shipping['min_day'] . "-" . $shipping['max_day'],
        "shipping_cost" => (int)$shipping['rate'],
        "customer_note" => "",
        "products" => $cart,
    );

    $data = [
        "data" => [
            "customer" => $customer,
            "order" => $order,
            "payment_method" => $bank['id'],
            "voucher" => $request->voucher,
            "note" => $request->note,
        ],
    ];

    $response = Http::post(config('app.api_url') . '/customer/create-order', $data);

    if ($response->status() == 200) {
        return response()->json([
            'status' => 'success',
            'message' => 'Order created successfully',
        ]);
    } else {
        return response()->json([
            'status' => 'error',
            'message' => $response['message'],
        ], 422);
    }
})->name('createOrder');
