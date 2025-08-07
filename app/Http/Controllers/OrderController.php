<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Conversation;
use App\Models\Message;
use App\Models\Order;
use App\Models\Product;
use App\Models\Shop;
use App\Models\User;
use App\Models\UserTransaction;
use App\Models\Work;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Mpdf\Mpdf;
use Shetabit\Multipay\Exceptions\PurchaseFailedException;
use Shetabit\Multipay\Invoice;
use Shetabit\Multipay\Payment;
use Shetabit\Multipay\Drivers\Zarinpal;

class OrderController extends Controller
{
    public function manage()
    {
        $number = 0;
        $total = 0;
        $products = Product::all();
        $orders = Order::query()->get()->where('buyer', session('user')->id);
        foreach ($orders as $order) {
            if ($order->type == 'dont_pay') {
                foreach ($order->baskets as $x) {
                    $number++;
                }
                $total = $total + $order->price;
            }
        }
        return view('main.buyer-menu') . view('order.manage', ['orders' => $orders, 'products' => $products, 'number' => $number, 'total' => $total]);
    }

    public function pay()
    {
        $merchantId = '13d4318c-aaf0-4ff0-bf63-1e8dceb5832e';
        $amount = 1100;
        $callbackUrl = route('payment.callback');
        $description = __('OrderControllerLang.test_purchase_description');
        $metadata = [
            'mobile' => '09121234567',
            'email' => 'info.test@example.com',
        ];

        $data = [
            'merchant_id' => $merchantId,
            'amount' => $amount,
            'callback_url' => $callbackUrl,
            'description' => $description,
            'metadata' => $metadata,
        ];

        $ch = curl_init('https://sandbox.zarinpal.com/pg/v4/payment/request.json');
        curl_setopt($ch, CURLOPT_USERAGENT, 'ZarinPal Rest Api v4');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

        $result = curl_exec($ch);
        $err = curl_error($ch);
        curl_close($ch);

        if ($err) {
            return response()->json(['error' => __("OrderControllerLang.curl_error", ['err' => $err])]);
        }

        $result = json_decode($result, true);

        if (isset($result['data']) && $result['data']['code'] == 100) {
            return redirect('https://sandbox.zarinpal.com/pg/StartPay/' . $result['data']['authority']);
        } else {
            return response()->json(['error' => $result['errors']['message'] ?? __('OrderControllerLang.unknown_request_error')]);
        }
    }

    public function callback(Request $request)
    {
        if ($request->get('Status') != 'OK') {
            return redirect()->route('home')->with('error', __('OrderControllerLang.payment_cancelled_by_user'));
        }

        $authority = $request->get('Authority');

        $verifyData = [
            'merchant_id' => '13d4318c-aaf0-4ff0-bf63-1e8dceb5832e',
            'amount' => 1100,
            'authority' => $authority
        ];

        $ch = curl_init('https://sandbox.zarinpal.com/pg/v4/payment/verify.json');
        curl_setopt($ch, CURLOPT_USERAGENT, 'ZarinPal Rest Api v4');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($verifyData));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

        $result = curl_exec($ch);
        curl_close($ch);

        $result = json_decode($result, true);

        if (isset($result['data']) && $result['data']['code'] == 100) {
            $userId = session('user')->id;
            $order = Order::query()->where('buyer', $userId)->where('type', 'dont_pay')->update(['type' => 'pay']);
            return redirect()->route('manage.order')->with('success', __('OrderControllerLang.payment_success', ['ref_id' => $result['data']['ref_id']]));
        } else {
            return redirect()->route('manage.order')->with('error', __('OrderControllerLang.payment_failed'));
        }
    }

    public function seller()
    {
        $userId = session('user')->id;
        $orders = Order::all();
        $products = [];

        foreach ($orders as $order) {
            if ($order->type == 'pay') {
                $baskets = is_array($order->baskets) ? $order->baskets : json_decode($order->baskets, true);
                $readyProducts = !empty($order->ready_products) ? (is_array($order->ready_products) ? $order->ready_products : json_decode($order->ready_products, true)) : [];

                // شمارش تعداد تکرار هر محصول داخل سبد
                $counts = array_count_values($baskets);

                // برای جلوگیری از تکرار نمایش، از آرایه کمک میگیریم
                $addedProductIds = [];

                foreach ($baskets as $index => $productId) {
                    if (in_array($productId, $addedProductIds)) {
                        continue; // اگر قبلاً اضافه شده، رد کن
                    }
                    $product = Product::find($productId);
                    if ($product && $product->seller == $userId) {
                        // فقط اگر حداقل یک مورد آماده نشده باشه
                        $countInReady = array_count_values($readyProducts)[$productId] ?? 0;
                        if ($countInReady < $counts[$productId]) {

                            $product->order = $order->id;
                            $product->adders = $order->adders;
                            $product->type = $order->type;
                            $product->total_quantity = $counts[$productId];
                            $products[] = $product;
                            $addedProductIds[] = $productId;
                        }
                    }
                }
            }
        }

        return view('main.seller-menu') . view('order.seller', ['products' => $products,]);
    }

    public function changeType(int $id, int $orderId)
    {
        $order = Order::find($orderId);
        if (!$order) {
            return redirect()->back()->withErrors(['order' => 'Order not found']);
        }

        $readyProducts = !empty($order->ready_products) ? (is_array($order->ready_products) ? $order->ready_products : json_decode($order->ready_products, true)) : [];
        $baskets = is_array($order->baskets) ? $order->baskets : json_decode($order->baskets, true);
        $countInBaskets = array_count_values($baskets)[$id] ?? 0;
        $countInReady = array_count_values($readyProducts)[$id] ?? 0;
        if ($countInReady < $countInBaskets) {
            $addCount = $countInBaskets - $countInReady;
            for ($i = 0; $i < $addCount; $i++) {
                $readyProducts[] = $id;
            }
            $order->ready_products = json_encode($readyProducts);
            $order->save();
        }
        $basketsCount = array_count_values($baskets);
        $readyCount = array_count_values($readyProducts);

        $allReady = true;
        foreach ($basketsCount as $productId => $qty) {
            if (!isset($readyCount[$productId]) || $readyCount[$productId] < $qty) {
                $allReady = false;
                break;
            }
        }
        if ($allReady) {
            $order->type = 'send';
            $order->save();
        }
        return redirect()->route('seller.order')->with('success', __('OrderControllerLang.product_received'));
    }

    public function factor(int $id)
    {
        $index = 1;
        $order = Order::query()->find($id);
        $products = Product::all();
        $users = User::all();
        $html = view('order.factor', ['order' => $order, 'products' => $products, 'index' => $index]);
        $mpdf = new Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4',
            'default_font' => 'Shabnam',
        ]);

        $mpdf->WriteHTML($html);
        $pdfContent = $mpdf->Output('', 'S');
        return response($pdfContent)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'attachment; filename="order.pdf"');
    }

    public function admin()
    {
        $orders = Order::all();
        $sellers = User::query()->where('type', 'seller')->get();
        $products = Product::all();
        $number = 0;
        $ready = 0;
        foreach ($orders as $order) {
            foreach ($order->baskets as $basket) {
                $number = $number + 1;
            }
            if (!empty($order->ready_products)) {
                foreach ($order->ready_products as $ready_product) {
                    $ready = $ready + 1;
                }
            }
            $buyer = User::find($order->buyer);
            $order->number = $number;
            $order->ready = $ready;
            $number = $ready = 0;
        }
        $user = session('user');
        $job = Work::query()->where('admin', $user->id)->first();
        return view("main.admin.$job->job-menu") . view("order.admin", [
                'buyer' => $buyer, 'sellers' => $sellers, 'products' => $products, 'orders' => $orders]);

    }

    public function alarm(int $id)
    {
        $order = Order::findOrFail($id);

        $readyProducts = $order->ready_products ?? [];
        $basketProducts = $order->baskets ?? [];

        foreach ($basketProducts as $productId) {

            if (in_array($productId, $readyProducts)) {
                continue;
            }

            $product = Product::find($productId);
            if (!$product) continue;

            $existingWarningsCount = Message::where('subject', "سفارش $order->id")
                ->where('receiver', $product->seller)
                ->count();
            if ($existingWarningsCount < 1) {
                Message::create([
                    'sender' => session('user')->id,
                    'receiver' => $product->seller,
                    'subject' => "سفارش $order->id",
                    'text' => "شما به دلیل عدم ارسال محصول مربوط به سفارش شماره $order->id اخطار دریافت کرده‌اید. لطفاً هرچه سریع‌تر سفارش را ارسال کنید.",
                ]);
            }
        }

        return redirect()->route('admin.order')->with('success', 'اخطارها با موفقیت ارسال شدند.');
    }



}
