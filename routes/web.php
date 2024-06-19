<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/catalog', [FrontendController::class, 'catalog'])->name('catalog');

Route::get('/product/{id}', [FrontendController::class, 'detailProduct'])->name('product');
Route::get('/order/{id}', [FrontendController::class, 'detailOrder'])->name('order');
Route::get('/region', [FrontendController::class, 'support'])->name('region');


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
        "distric" => $customer['district'],
        "province" => $customer['province'],
        "city" => $customer['city'],
        "subdistrict_id" => 35247,
        "name_distric" => $customer['village'],
    ];
    $cart = [];
    $total = 0;

    foreach ($carts as $key => $cartItem) {
        $cart[] = [
            "sku_code" => $cartItem['code'],
            "qty" => $cartItem['qty'],
        ];

        $total += $cartItem['price']['consumer'] * $cartItem['qty'];
    }

    if ($shipping['rate'] == 0 && $total <= 250000) {
        return response()->json([
            'status' => 'error',
            'message' => 'Silahkan pilih kurir lain atau tambahkan produk lain untuk melanjutkan transaksi.',
        ], 422);
    }

    $order = array(
        "courier" => $shipping['logistic_name'],
        "courier_type" => $shipping['rate_name'],
        "courier_estimated" => $shipping['min_day'] . "-" . $shipping['max_day'],
        "shipping_cost" => (int)$shipping['rate'],
        "customer_note" => "",
        "products" => $cart,
        "customer_note" => $request->note,
    );

    $data = [
        "data" => [
            "customer" => $customer,
            "order" => $order,
            "payment_method" => $bank['id'],
            "voucher" => $request->voucher,
        ],
    ];

    $response = Http::withToken(session('token')['accessToken'])
        ->withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ])
        ->post(config('app.api_url') . '/orders/checkout', $data);

    if ($response->status() == 200) {
        return response()->json([
            'status' => 'success',
            'message' => 'Order created successfully',
            'data' => $response->json(),
        ]);
    } else {
        return response()->json([
            'status' => 'error',
            'message' => $response->json(),
        ], 422);
    }
})->name('createOrder');


Route::post('login', [FrontendController::class, 'login'])->name('login');
Route::post('confirmation', [FrontendController::class, 'confirmation'])->name('confirmation');
