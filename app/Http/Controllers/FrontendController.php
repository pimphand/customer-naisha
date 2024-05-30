<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $images = [
            "https://sgp1.vultrobjects.com/naisha-s3/customer/1@4x.webp",
            "https://sgp1.vultrobjects.com/naisha-s3/customer/2@4x.webp",
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
}
