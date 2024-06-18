<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

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
        $order =  Http::get(config('app.api_url') . '/customer/order/' . $id);

        if ($order->status() == 200) {
            $order = $order['data'];
        } else {
            abort(404, 'Order not found');
        }
        // dd($order);
        return view('order', compact('order'));
    }

    public function catalog()
    {
        return view('catalog.index');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required|numeric',
            'name' => 'required|string',
        ],  [
            'phone' => strtolower('nomor telepon harus diisi'),
            'name' => strtolower('Nama lengkap harus diisi'),
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->messages(),
                'message' => 'The given data was invalid.',
            ], 422);
        }

        $login = Http::post(config('app.api_url') . '/customer/login', [
            'phone' => $this->normalizePhone($request->phone),
            'name' => $request->name,
        ]);

        if ($login->status() == 200) {
            $request->session()->put('loginUser', $login['data']);

            return response()->json([
                'status' => 'success',
                'data' => $request->session()->get('loginUser')
            ]);
        } else {
            return response()->json($login->json(), 401);
        }
    }

    private function normalizePhone($phone, $zeroLeading = false)
    {
        $n = trim($phone);
        if (Str::startsWith($phone, "8")) {
            $n = substr($phone, 1);
        }
        if (Str::startsWith($phone, "08")) {
            if ($zeroLeading) {
                return $phone;
            }
            $n = substr($phone, 2);
        }
        if (Str::startsWith($phone, "628")) {
            if (!$zeroLeading) {
                return $phone;
            }
            $n = substr($phone, 3);
        }
        return ($zeroLeading ? '8' : '8') . $n;
    }

    public function region(Request $request)
    {
        if ($request->type == 'district') {
            $response = Http::withToken("7666|lc7HtIgeFyfbUPAmD4z4LrB54ufVTgMOuDSYyagS1f18a01b")->get("https://api.kirimpaket.id/api/open/location/districts-search?keyword=$request->keyword");

            return response()->json($response->json());
        }

        if ($request->type == 'village') {
            $response = Http::withToken("7666|lc7HtIgeFyfbUPAmD4z4LrB54ufVTgMOuDSYyagS1f18a01b")->get("https://api.kirimpaket.id/api/open/location/subdistricts?district_id=$request->keyword");

            return response()->json($response->json());
        }
    }
}
