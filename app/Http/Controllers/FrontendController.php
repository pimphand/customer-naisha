<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FrontendController extends Controller
{
    public function index()
    {
        $images = [
            "https://sgp1.vultrobjects.com/naisha-s3/customer/header_1_2x_1_4x.webp",
            "https://sgp1.vultrobjects.com/naisha-s3/customer/header_2_2x_1_4x.webp",
            "https://sgp1.vultrobjects.com/naisha-s3/customer/3@4x.webp",
        ];

        $categories = [
            "https://sgp1.vultrobjects.com/naisha-s3/customer/gamis@4x.webp",
            "https://sgp1.vultrobjects.com/naisha-s3/customer/acc@4x.webp",
            "https://sgp1.vultrobjects.com/naisha-s3/customer/khimar@4x.webp",
            "https://sgp1.vultrobjects.com/naisha-s3/customer/koko@4x.webp"
        ];

        return view('welcome', compact('images', 'categories'));
    }

    public function detailProduct($slug)
    {
        return view('product', compact('slug'));
    }

    public function detailOrder($id)
    {
        Http::get(config('app.api_url') . '/customer/order/' . $id);

        return view('checkout', compact('id'));
    }

    public function catalog()
    {
        return view('catalog.index');
    }
}
