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
            "https://sgp1.vultrobjects.com/naisha-s3/customer/header-1@4x.webp",
            "https://sgp1.vultrobjects.com/naisha-s3/customer/header-2@4x-1.webp",
            "https://sgp1.vultrobjects.com/naisha-s3/customer/header_1_2x_1_4x.webp",
            "https://sgp1.vultrobjects.com/naisha-s3/customer/header_2_2x_1_4x.webp",
        ];

        $categories = [
            "https://sgp1.vultrobjects.com/naisha-s3/customer/kategori_gamis.webp",
            "https://sgp1.vultrobjects.com/naisha-s3/customer/acc@4x.webp",
            "https://sgp1.vultrobjects.com/naisha-s3/customer/kategori%20khimar.webp",
            "https://sgp1.vultrobjects.com/naisha-s3/customer/koko@4x.webp"
        ];

        return view('welcome', compact('images', 'categories'));
    }

    public function detailProduct($slug)
    {
        $product = [];
        $data = Http::get(config('app.api_url') . '/all-products?filter[slug_name]=' . $slug);
        if ($data->status() == 200) {
            $slug = $data['data'][0]['slug'];
            $product = $data['data'][0];
        } else {
            return redirect(route('home'));
        }
        // dd($product);
        return view('product', compact('slug', 'product'));
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
        if ($request->password) {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required|string',
            ],  [
                'email.required' => 'Email harus diisi',
                'password.required' => 'Password harus diisi',
            ]);
        } else {
            $validator = Validator::make($request->all(), [
                'phone' => 'required|numeric',
                'name' => 'required|string',
            ],  [
                'phone' => strtolower('nomor telepon harus diisi'),
                'name' => strtolower('Nama lengkap harus diisi'),
            ]);
        }

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->messages(),
                'message' => 'The given data was invalid.',
            ], 422);
        }

        if ($request->password) {
            $login = Http::post(config('app.api_url') . '/login', [
                'email' => $request->email,
                'password' => $request->password,
            ]);
        } else {
            $login = Http::post(config('app.api_url') . '/customer/login', [
                'phone' => $this->normalizePhone($request->phone),
                'name' => $request->name,
            ]);
        }
        // dd($login->json());
        if ($login->status() == 200) {
            $request->session()->put('loginUser', $login['data'] ?? $login['user']);
            $request->session()->put('token', $login['token']);

            return response()->json([
                'status' => 'success',
                'data' => $request->session()->get('loginUser')
            ]);
        } else {
            return response()->json($login->json(), 401);
        }
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|string|min:6',
            'password_confirmation' => 'required|string|min:6|same:password',
        ],  [
            'name' => strtolower('Nama lengkap harus diisi'),
            'email' => strtolower('Email harus diisi atau nomor whatsapp harus diisi'),
            'password' => strtolower('Password harus diisi'),
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->messages(),
                'message' => 'The given data was invalid.',
            ], 422);
        }

        if (filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            $login = Http::post(config('app.api_url') . '/register', [
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'password_confirmation' => $request->password,
            ]);
        } else {
            $login = Http::post(config('app.api_url') . '/register', [
                'phone_code_id' => 102,
                'signature' => 'whatsapp',
                'phone' => $this->normalizePhone($request->email),
                'name' => $request->name,
                'password' => $request->password,
                'password_confirmation' => $request->password,
            ]);
        }

        if ($login->status() == 200) {
            $request->session()->put('loginUser', $login['user']);
            $request->session()->put('token', $login['token']);

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

    public function support(Request $request)
    {
        if ($request->type == 'district') {
            $response = Http::withToken("7666|lc7HtIgeFyfbUPAmD4z4LrB54ufVTgMOuDSYyagS1f18a01b")->get("https://api.kirimpaket.id/api/open/location/districts-search?keyword=$request->keyword");

            return response()->json($response->json());
        }

        if ($request->type == 'village') {
            $response = Http::withToken("7666|lc7HtIgeFyfbUPAmD4z4LrB54ufVTgMOuDSYyagS1f18a01b")->get("https://api.kirimpaket.id/api/open/location/subdistricts?district_id=$request->keyword");

            return response()->json($response->json());
        }

        if ($request->type == 'tracking') {
            $response = Http::withToken("7666|lc7HtIgeFyfbUPAmD4z4LrB54ufVTgMOuDSYyagS1f18a01b")->get("https://api.kirimpaket.id/api/open/shipping/track-airwaybill?awb_number=$request->keyword");
            return response()->json($response->json()['data']);
        }
    }

    public function confirmation(Request $request)
    {
        Validator::make($request->all(), [
            'image' => 'required|file',
            'from_bank' => 'required|string',
            'from_account_name' => 'required|string',
            'amount' => 'required|numeric',
            'refrence' => 'required|string',
        ], [
            'image.required' => 'Bukti transfer harus diisi',
            'from_bank.required' => 'Nama bank harus diisi',
            'from_account_name.required' => 'Nama pemilik rekening harus diisi',
            'amount.required' => 'Jumlah transfer harus diisi',
            'refrence.required' => 'Nomor referensi harus diisi',
        ])->validate();

        $data = [
            'from_bank' => $request->from_bank,
            'from_account_name' => $request->from_account_name,
            'amount' => $request->amount,
            'refrence' => $request->refrence,
            'date' => $request->date,
            'order_id' => $request->order_id,
            'payment_method' => $request->payment_method,
        ];

        $response = Http::withToken(session('token')['accessToken'])
            ->withHeaders([
                'Accept' => 'application/json',
            ])
            ->attach('image', file_get_contents($request->image), $request->image->getClientOriginalName())
            ->post(config('app.api_url') . '/orders/confirmation', $data);

        return response()->json($response->json(), $response->status());
    }

    public function logout(Request $request)
    {
        $request->session()->forget('loginUser');
        $request->session()->forget('token');
        return response()->json([
            'status' => 'success',
            'message' => 'Logout berhasil',
        ]);
    }

    public function profile(Request $request)
    {
        if (!session('token') || !session('token')['accessToken']) {
            return redirect(route('home'));
        }

        $response = Http::withToken(session('token')['accessToken'])
            ->get(config('app.api_url') . '/customer/users?id=' . session('loginUser')['id']);

        if ($response->status() == 200) {
            $profile = $response->json();
        } else {
            $request->session()->forget('loginUser');
            $request->session()->forget('token');
            return redirect(route('home'));
        }

        return view('profile', compact('profile'));
    }
}
