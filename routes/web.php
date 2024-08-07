<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/address', [FrontendController::class, 'address'])->name('address');

Route::get('/catalog', [FrontendController::class, 'catalog'])->name('catalog');

Route::get('/product/{id}', [FrontendController::class, 'detailProduct'])->name('product');
Route::get('/order/{id}', [FrontendController::class, 'detailOrder'])->name('order');
Route::get('/region', [FrontendController::class, 'support'])->name('region');

Route::get('/vouchers/claim', [FrontendController::class, 'vouchersClaim']);


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

Route::get('profile', [FrontendController::class, 'profile'])->name('profile');

Route::get('products', [FrontendController::class, 'products'])->name('products');
