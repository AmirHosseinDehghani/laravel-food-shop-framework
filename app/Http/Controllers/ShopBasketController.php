<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddOrderRequest;
use App\Models\Basket;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class ShopBasketController extends Controller
{
    public function store(int $id)
    {
        $product = Product::query()->find($id);
        $id = session('user')->id;
        Basket::query()->create(['buyer' => $id, 'price' => $product->price, 'product' => $product->id]);
        return redirect()->route('home')->with('success', ' این محصول به سبد خرید شما اضافه شد.برای ثبت خرید به داشبورد خور مراجعه کنید');
    }

    public function manage()
    {
        $number = 0;
        $total = 0;
        $products = Product::all();
        $shopBaskets = Basket::query()->get()->where('buyer', session('user')->id);
        foreach ($shopBaskets as $shopBasket) {
            $number++;
            $total = $total + $shopBasket->price;
        }
        return view('main.buyer-menu') . view('basket.manage', ['baskets' => $shopBaskets, 'products' => $products, 'number' => $number, 'total' => $total]);
    }

    public function delete(int $id)
    {
        Basket::destroy($id);
        return redirect()->route('manage.basket')->with('success', 'آیتم سبد خرید شما حذف شد.');
    }

    public function addOrder(AddOrderRequest $request)
    {
        $total = 0;
        $productIds = [];
        $address = $request->validated();
        $shopBaskets = Basket::where('buyer', session('user')->id)->get();
        foreach ($shopBaskets as $basket) {
            $productIds[] = $basket->product;
            $total += $basket->price;
            Basket::destroy($basket->id);
        }
        Order::create([
            'buyer' => session('user')->id,
            'baskets' => $productIds, // آرایه به صورت json ذخیره میشه
            'price' => $total,
            'adders' =>$address['adders']
        ]);

        return redirect()->route('manage.basket')->with('success', 'سفارش شما ثبت شد . برای پرداخت و پیگیری جزییات به بخش سفارشات بروید.');

    }
}
