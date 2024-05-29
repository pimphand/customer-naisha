<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $images = [
            "https://sgp1.vultrobjects.com/naisha-s3/header-1_2x.webp",
            "https://sgp1.vultrobjects.com/naisha-s3/header-2_2x.webp",
            asset('assets') . "/img/slider/3.jpeg",
        ];

        return view('welcome', compact('images'));
    }
}
