<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Message;
use App\Models\Order;
use App\Models\Product;
use App\Models\Shop;
use App\Models\User;
use App\Models\UserTransaction;
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
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://payment.zarinpal.com/pg/v4/payment/request.json',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'{
  "merchant_id": "13d4318c-aaf0-4ff0-bf63-1e8dceb5832e",
  "amount": "1100",
  "callback_url": "http://127.0.0.1:3001/zarinpal/callback",
  "description": "Transaction description.",
  "metadata": {
    "mobile": "09121234567",
    "email": "info.test@example.com"
  }
}',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Accept: application/json'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;

    }


    public function callback(Request $request)
    {
        $payment = new Payment();

        try {
            $transaction = $payment->via('zarinpal')->config([
                'merchant_id' => env('ZARINPAL_MERCHANT_ID'),
                'callback_url' => env('ZARINPAL_CALLBACK_URL'),
                'sandbox' => env('ZARINPAL_SANDBOX', true),
            ])->verify();

            $userTransaction = UserTransaction::where('transaction_id', $transaction->getReferenceId())->first();

            if (!$userTransaction) {
                return redirect()->route('manage.order')->with('error', 'تراکنش یافت نشد.');
            }

            $userTransaction->update(['status' => 'paid']);

            // به‌روزرسانی سفارشات
            $userId = $userTransaction->user_id;
            $orders = Order::where('buyer', $userId)->where('type', 'dont_pay')->get();

            foreach ($orders as $order) {
                foreach ($order->baskets as $basketId) {
                    $product = Product::find($basketId);
                    if ($product) {
                        $shop = Shop::find($product->shop);
                        if ($shop) {
                            $shop->update(['bank' => $shop->bank + $product->price]);
                        }
                    }
                }
                $order->update(['type' => 'pay']);
            }

            return redirect()->route('manage.order')->with('success', 'پرداخت با موفقیت انجام شد.');

        } catch (\Exception $e) {
            \Log::error('خطای خرید زرین‌پال: ' . $e->getMessage());
            return redirect()->route('manage.order')->with('error', 'پرداخت انجام نشد. لطفا دوباره تلاش کنید.');
        }
    }




    public function seller()
    {
        $products = [];
        $shop = [];
        $orders = Order::all();
        foreach ($orders as $order) {
            if ($order->type != 'dont_pay') {
                foreach ($order->baskets as $basketId) {
                    $product = Product::find($basketId);
                    if ($product) {
                        $shop = Shop::find($product->shop);
                        if ($shop->owner == session('user')->id) {
                            return view('main.seller-menu') . view('order.seller', ['orders' => $orders,]);

                        }
                    }
                }
            }
        }

    }

    public function changeType(int $id)
    {
        $order = Order::query()->find($id);
        if ($order->type != 'send') {
            $order->update(['type' => 'send']);
            return redirect()->route('seller.order')->with('success', 'محصول ارسال شد.');
        } else {
            $order->update(['type' => 'receive']);
            return redirect()->route('manage.order')->with('success', 'محصول دریافت شد');
        }

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


}
