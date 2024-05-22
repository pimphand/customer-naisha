<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/product/{id}', function () {
    return view('product');
});

Route::get('/check-courier', function (Request $request) {
})->name('getCourier');

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
