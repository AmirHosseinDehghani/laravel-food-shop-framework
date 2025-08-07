<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\ProfileEditRequest;
use App\Http\Requests\ProfileEditStoreRequest;
use App\Http\Requests\ShopStoreReqest;
use App\Http\Requests\PasswordResetRequest;
use App\Http\Requests\SignupRequest;
use App\Http\Requests\WorkRequest;
use App\Models\Basket;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Conversation;
use App\Models\Message;
use App\Models\Order;
use App\Models\Product;
use App\Models\Shop;
use App\Models\User;
use App\Models\Work;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
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
        return back()->withErrors(['error' => __('auth.invalid_credentials')]);

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
        return redirect()->route('login')->with('success', __('register.success'));

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
                $user = session('user');
                $job = Work::query()->where('admin', $user->id)->where('register', 'yes')->first();

                if (!empty($job)) {
                    $shops = Shop::query()->where('type', '0')->get();
                    $orders = Order::all();
                    $allShop = Shop::all();
                    $shopNumber = 0;
                    $orderNumber = 0;
                    $price = 0;
                    $bank = 0;
                    foreach ($allShop as $shop) {
                        $shopNumber++;
                        $bank = $bank + $shop->bank;
                    }
                    foreach ($orders as $order) {
                        $orderNumber++;
                        $price = $price + $order->price;
                    }
                    $startDate = now()->subDays(29);
                    $endDate = now();
                    $period = CarbonPeriod::create($startDate, $endDate);

                    $labels = [];
                    $orderCounts = [];
                    $incomes = [];

                    foreach ($period as $date) {
                        $labels[] = verta($date)->format('%d %B');
                        $orders = Order::whereDate('created_at', $date);
                        $orderCounts[] = $orders->count();
                        $incomes[] = $orders->sum('price');
                    }
                    $blogsNumber = 0;
                    $userBlogs = 0;
                    $blogs = Blog::all();
                    foreach ($blogs as $blog) {
                        $blogsNumber = $blogsNumber + 1;
                        if ($blog->writer == $user->id) {
                            $userBlogs = $userBlogs + 1;
                        }
                    }
                    $blogLabels = [];
                    $blogCounts = [];

                    for ($i = 29; $i >= 0; $i--) {
                        $date = Carbon::today()->subDays($i);
                        $blogLabels[] = verta($date)->format('Y/m/d');
                        $blogCounts[] = (int)Blog::whereDate('created_at', $date)->count();

                    }
                    $totalShops = Shop::count();
                    $registeredShops = Shop::where('type', "1")->count();
                    $productCategoryLabels = [];
                    $productCategoryCounts = [];
                    $categories = Category::all();
                    foreach ($categories as $category) {
                        $productCategoryLabels[] = $category->name;
                        $productCategoryCounts[] = (int)Product::where('category', $category->id)->count();
                    }
                    $shownCount = Comment::where('type', '0')->count();
                    $hiddenCount = Comment::where('type', '1')->count();
                    for ($i = 29; $i >= 0; $i--) {
                        $date = Carbon::today()->subDays($i);
                        $tags[] = verta($date)->format('Y/m/d'); // اگر شمسی می‌خوای
                        $dayOrders = Order::whereDate('created_at', $date);

                        $pay[] = $dayOrders->where('type', 'pay')->sum('price');
                        $send[] = $dayOrders->where('type', 'send')->sum('price');
                        $receive[] = $dayOrders->where('type', 'receive')->sum('price');
                    }


                    return view("main.admin.$job->job-menu") . view("dashboards.admin.$job->job", [
                            'bank' => $bank,
                            'shops' => $shops,
                            'orderNumber' => $orderNumber,
                            'price' => $price,
                            'shopNumber' => $shopNumber,
                            'labels' => $labels,
                            'orderCounts' => $orderCounts,
                            'incomes' => $incomes,
                            'userBlog' => $userBlogs,
                            'numberBlogs' => $blogsNumber,
                            'blogLabels' => $blogLabels,
                            'blogCounts' => $blogCounts,
                            'totalShops' => $totalShops,
                            'registeredShops' => $registeredShops,
                            'productCategoryLabels' => $productCategoryLabels,
                            'productCategoryCounts' => $productCategoryCounts,
                            'commentLabels' => ['نمایش داده شده', 'نمایش داده نشده'],
                            'commentCounts' => [$shownCount, $hiddenCount],
                            'salesLabels' => $tags,
                            'salesPay' => $pay,
                            'salesSend' => $send,
                            'salesReceive' => $receive,

                        ]);
                } else {
                    $work = Work::query()->where('admin', $user->id)->get();
                    if (!empty($work) && count($work)>0) {
                        $register = 'no';
                        return view("main.admin.admin-menu", ['register' => $register]) . view("dashboards.admin.admin" );
                    } else {
                        $register = 'not set';
                        return view("main.admin.admin-menu", ['register' => $register]) . view("dashboards.admin.admin", []);
                    }
                }
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

    public function work()
    {
        $user = session('user');
        $work = Work::query()->where('admin', $user->id)->get();
        if (!empty($work) && count($work)>0) {
            $register = 'no';
            return view("main.admin.admin-menu", ['register' => $register]) . view("work.form" );
        } else {
            $register = 'not set';
            return view("main.admin.admin-menu", ['register' => $register]) . view("work.form", []);
        }
    }

    public function getWork(WorkRequest $request)
    {
        $work = $request->validated()['work'];
        Work::query()->create([
            'admin' => session('user')->id,
            'job' => $work,
            'work' => 0,
            'score' => 0,
            'register' => 'no'
        ]);
        Message::query()->create(
            [
                'sender' => 1,
                'receiver' => session('user')->id,
                'subject' => 'ثبت شدن درخواست',
                'text' => 'درخواست سمت شما ثبت شد . نتیجه درخواست به شما اعلام میگردد.'
            ]
        );
        return redirect()->route('work')->with('success', 'شغل شما ثبت شد . برای تایید صبر کنید.');
    }

    public function manageAdmin()
    {
        $admins = User::query()->where('type', 'admin')->get();
        $works = Work::query()->where('job', '!=', 'owner')->get();


        $user = session('user');
        $job = Work::query()->where('admin', $user->id)->where('register', 'yes')->first();
        return view("main.admin.$job->job-menu") . view("work.manage", ['admins' => $admins, 'works' => $works,]);

    }

    public function registerWork(int $id)
    {
        $work = Work::query()->find($id);
        if ($work->register == 'no') {

            $work->update(['register' => 'yes']);
            Message::query()->create(
                [
                    'sender' => 1,
                    'receiver' => $work->admin,
                    'subject' => 'تغییر وضعیت تایید',
                    'text' => 'درخواست سمت شما تایید شد .'
                ]
            );
            return redirect()->route('manage.admin.admin')->with('success', 'تغییرات انجام شد.');
        } else {
            Message::query()->create(
                [
                    'sender' => 1,
                    'receiver' => $work->admin,
                    'subject' => 'تغییر وضعیت تایید',
                    'text' => 'به دلایل مشخص حساب شما از حالت تایید خارج شد .'
                ]
            );
            $work->update(['register' => 'no']);
            return redirect()->route('manage.admin.admin')->with('success', 'تغییرات انجام شد.');
        }
    }
    public function conversion()
    {
        $user = session('user');
        $number = 0;
        $conversions = Conversation::all();
        foreach ($conversions as $conversion) {
            foreach ($conversion->tickets as $ticket) {
                $number = $number + 1;
            }
            $conversion->number = $number;
            $number = 0;
        }
        if ($user->type == 'admin') {
            $job = Work::query()->where('admin', $user->id)->where('register', 'yes')->first();
            return view("main.admin.$job->job-menu") . view("ticket.manage", ['conversions' => $conversions]);
        } else {
            return view("main.$user->type-menu") . view("ticket.manage", ['conversions' => $conversions]);
        }
    }
}
