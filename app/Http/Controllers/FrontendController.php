<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class FrontendController extends Controller
{
    public function index()
    {
        $images = [
            "https://sgp1.vultrobjects.com/naisha-s3/header-3.webp",
            "https://sgp1.vultrobjects.com/naisha-s3/header-2.webp",
            "https://sgp1.vultrobjects.com/naisha-s3/header-1@4x.webp",
            "https://sgp1.vultrobjects.com/naisha-s3/customer/header_2_2x_1_4x.webp",
        ];

        $categories = [
            "https://sgp1.vultrobjects.com/naisha-s3/customer/kategori_gamis.webp",
            "https://sgp1.vultrobjects.com/naisha-s3/customer/acc@4x.webp",
            "https://sgp1.vultrobjects.com/naisha-s3/customer/kategori%20khimar.webp",
            "https://sgp1.vultrobjects.com/naisha-s3/customer/koko@4x.webp"
        ];

        // dd(request()->session()->get('loginUser'));
        return view('welcome', compact('images', 'categories'));
    }

    public function products(Request $request)
    {
        $query = '';

        if (isset($request->filter['category.id']) && $request->filter['category.id']) {
            $query = '&filter[category.id]=' . $request->filter['category.id'];
        }

        if ($request->slug) {
            $query = '&filter[slug]=' . $request->slug;
        }

        $products = Http::get(config('app.api_url') . '/all-products?paginate=' . $request->paginate . '&page=' . $request->page . "&stock=" . $request->category_id, $query);

        return ProductResource::collection($products['data'])->additional([
            'meta' => $products['meta'],
            'links' => $products['links'],
        ]);
    }

    public function detailProduct($slug)
    {
        $product = [];

        $data = Http::get(config('app.api_url') . '/all-products?filter[slug_name]=' . $slug);

        if ($data->status() == 200) {
            $slug = $data['data'][0]['slug'];
            $product = $data['data'][0];

            if ($product['shopee_product'] != null) {
                $shopee = Http::get(config('app.api_url') . '/customer/get-extra-products/' . $product['shopee_product']);
                $shopee_detail = Http::get(config('app.api_url') . '/customer/get-base-products/' . $product['shopee_product']);
                $product['shopee_detail'] = $shopee_detail->json()['item_list'][0];
                $product['shopee'] = $shopee->json()['item_list'][0];
            }
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

        if (!isset($order['user']['id']) || !isset(session('loginUser')['id'])) {
            abort(403, 'Unauthorized');
        }



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
                'email' => 'required',
                'password' => 'required|string',
            ],  [
                'email.required' => 'Email atau nomor whatsapp harus diisi',
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

        if ($request->has('email') && filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            $login = Http::post(config('app.api_url') . '/login', [
                'email' => $request->email,
                'password' => $request->password,
                'device_name' => 'web',
            ]);
        } else {
            $login = Http::post(config('app.api_url') . '/customer/login', [
                'phone' => $this->normalizePhone($request->email),
                'password' => $request->password,
            ]);
        }

        // dd($login->json());
        if ($login->status() == 200) {
            Session::put('loginUser', $login['data'] ?? $login['user']);
            Session::put('token', $login['token']);

            return response()->json([
                'status' => 'success',
                'data' => Session::get('loginUser'),
                'token' => Session::get('token'),
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
            Session::put('loginUser', $login['user']);
            Session::put('token', $login['token']);

            return response()->json([
                'status' => 'success',
                'data' =>  Session::get('token'),
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
        $order =  Http::get(config('app.api_url') . '/customer/order/' . $request->order_id);
        $user = $order->json()['data']['user'];

        if ($user['id'] != session('loginUser')['id']) {
            abort(403, 'Unauthorized');
        }
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
        Session::forget('loginUser');
        Session::forget('token');
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
        // dd($response);
        if ($response->status() == 200) {
            $profile = $response->json();
        } else {
            // $request->session()->forget('loginUser');
            // $request->session()->forget('token');
            // return redirect(route('home'));
        }
        $orders = $profile['data'][0]['orders'];
        $address = [];

        $profile = $profile['data'][0];

        return view('profile', compact('profile', 'orders', 'address'));
    }

    public function profileUpdate(Request $request)
    {
        $data = $request->all();
        $response = Http::withToken(session('token')['accessToken'])
            ->withHeaders([
                'Accept' => 'application/json',
            ])
            ->post(config('app.api_url') . '/customer/users?id=' . session('loginUser')['id'], $data);


        return response()->json($response->json(), $response->status());
    }

    function deleteAddress($id)
    {
        $response = Http::withToken(session('token')['accessToken'])
            ->withHeaders([
                'Accept' => 'application/json',
            ])
            ->delete(config('app.api_url') . '/customer/address', ['id' => $id, 'user_id' => session('loginUser')['id']]);

        return response()->json($response->json(), $response->status());
    }

    public function address()
    {
        $user = session('loginUser');
        if (!$user) {
            return;
        }
        return;
    }



    public function forgetPassword(Request $request)
    {
        $get = Http::post(config('app.api_url') . '/password/email', [
            'email' => $request->email,
        ]);

        return response()->json($get->json(), $get->status());
    }

    public function verifyToken(Request $request)
    {
        $get = Http::post(config('app.api_url') . '/password/token', [
            'email' => $request->email,
            'token' => $request->token,
        ]);

        return response()->json($get->json(), $get->status());
    }
    public function changePassword(Request $request)
    {
        $get = Http::post(config('app.api_url') . '/password/reset', [
            'email' => $request->email,
            'token' => $request->token,
            'password' => $request->password,
            'password_confirmation' => $request->password_confirmation,
        ]);

        return response()->json($get->json(), $get->status());
    }

    public function vouchersClaim(Request $request)
    {
        $response = Http::withToken(session('token')['accessToken'])
            ->get(config('app.api_url') . '/customer/vouchers/claim?code=' . $request->code . "&sku_code=" . $request->sku);

        if ($response->getStatusCode() == 200) {
            $voucher = (string)$response->json()['data']['product_id'];
            $product = explode(',', $request->sku);

            if (!in_array($voucher, $product)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Voucher tidak dapat digunakan untuk produk ini.',
                    'data' => [
                        'status' => false,
                        'voucher' => $voucher,
                        'product' => $product,
                    ],
                ], 400);
            }
        }

        return response()->json($response->json(), $response->status());
    }
}
