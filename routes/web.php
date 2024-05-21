<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/checkout', function () {
    return view('cart');
})->name('checkout');

Route::get('/pull-asd', function () {
    $output = shell_exec('git pull');

    // Menampilkan output dari perintah git pull
    echo "<pre>$output</pre>";
});
