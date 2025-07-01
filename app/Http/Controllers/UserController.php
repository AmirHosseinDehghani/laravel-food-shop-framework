<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\ProfileEditRequest;
use App\Http\Requests\ProfileEditStoreRequest;
use App\Http\Requests\ShopStoreReqest;
use App\Http\Requests\PasswordResetRequest;
use App\Http\Requests\SignupRequest;
use App\Models\Basket;
use App\Models\Message;
use App\Models\Order;
use App\Models\Product;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login'); // مسیر ویو فرم لاگین شما
    }


    public function login(LoginRequest $request)
    {
        $validated = $request->validated();
        if (Auth::attempt(['email' => $validated['email'], 'password' => $validated['password']], true)) {

            $user = Auth::user();
            session(['user' => $user]);
            return redirect()->route('dashboard');
        }
        return back()->withErrors(['error' => 'ایمیل یا رمز عبور اشتباه است.']);
    }


    public function logout()
    {
        session()->forget('user');
        Auth::logout();
        return redirect()->route('login')->with('success', 'خروج با موفقیت انجام شد.');
    }


    public function showRegistrationForm()
    {
        return view('auth.register');
    }


    public function register(SignupRequest $request)
    {
        User::create($request->validated() + ['password' => Hash::make($request->password)]);
        return redirect()->route('login')->with('success', 'ثبت ‌نام با موفقیت انجام شد!');
    }


    public function showPasswordResetForm()
    {
        return view('auth.password-reset'); // نمایش فرم
    }


    public function reset(PasswordResetRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user->recovery_code !== $request->recovery_code) {
            return back()->withErrors(['recovery_code' => 'کد بازیابی نادرست است.'])->withInput();
        }
        $user->update([
            'password' => Hash::make($request->new_password),
        ]);
        return redirect()->route('login')->with('success', 'رمز عبور با موفقیت تغییر یافت.');
    }

    public function dashboards()
    {
        //general
        $type = session('user')->type;
        if ($type == 'buyer') {
            $orders = Order::query()
                ->where('buyer', session('user')->id)
                ->latest()
                ->take(5)
                ->get();
            $order = Order::query()->where('buyer', session('user')->id)->get();
            $number = 0;
            $price = 0;
            foreach ($order as $item) {
                $number++;
                $price = $price + $item->price;
            }

            return view("main.$type-menu") . view("dashboards.$type", ['orders' => $orders, 'number' => $number, 'price' => $price]);
        } else {
            if ($type == 'seller') {
                $message = Message::query()->where('receiver', session('user')->id)
                    ->latest()
                    ->take(5)
                    ->get();
                //seller
                $orders = Order::all();
                $products = Product::where('seller', session('user')->id)->get();
                $productMap = $products->keyBy('id');

                $selle = [];
                foreach ($orders as $order) {
                    foreach ($order->baskets as $basket) {
                        $productId = $basket;

                        if (isset($productMap[$productId])) {
                            $productName = $productMap[$productId]->name;

                            if (!isset($selle[$productName])) {
                                $selle[$productName] = 0;
                            }

                            $selle[$productName]++;
                        }
                    }
                }
                return view("main.$type-menu") . view("dashboards.$type", ['messages' => $message, 'salle' => $selle]);
            } else {
                $shops = Shop::query()->where('type', '0')->get();
                $orders = Order::all();
                $allShop = Shop::all();
                $shopNumber = 0;
                $orderNumber = 0;
                $price = 0;
                $bank = 0 ;
                foreach ($allShop as $shop) {
                    $shopNumber++;
                    $bank = $bank + $shop->bank ;
                }
                foreach ($orders as $order) {
                    $orderNumber++;
                    $price = $price + $order->price;
                }

                return view("main.$type-menu") . view("dashboards.$type", [ 'bank'=>$bank,'shops' => $shops, 'orders' => $orders, 'orderNumber' => $orderNumber, 'price' => $price ,'shopNumber'=>$shopNumber]);

            }

        }

    }

    public function profile()
    {
        $type = session('user')->type;
        return view("main.$type-menu") . view("auth.profile");
    }

    public function edit(ProfileEditRequest $request)
    {
        $check = 0;
        $validated = $request->validated();
        $user = User::query()->find(session('user')->id);
        if (Hash::check($validated['oldPass'], session('user')->password)) {

            unset($validated['oldPass']);
            if (!empty($validated['password'])) {
                $user->update(['password' => $validated['password']]);
                $check++;
            }
            if (!empty($validated['email'])) {
                $user->update(['email' => $validated['email']]);
                $check++;
            }
        } else {
            return redirect()->route('profile')->withErrors(['error' => 'رمز شما اشتباه است.']);
        }
        if ($check != 0) {
            return redirect()->route('profile')->with('success', 'تغییرات اعمال شد.');
        } else {
            return redirect()->route('profile')->withErrors(['d' => 'اطلاعاتی برای تغییر وارد نکرده اید .']);
        }
    }
}
