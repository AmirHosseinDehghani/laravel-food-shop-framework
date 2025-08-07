<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ConversionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessengerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopBasketController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Requests\ConverseionRequest;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home'])->middleware('check.buyer')->name('home');
Route::get('/search-by-category/{id}', [HomeController::class, 'category'])->middleware('check.buyer')->name('category');
Route::get('/most-salle', [HomeController::class, 'mostSalle'])->middleware('check.buyer')->name('most-salle');
Route::get('/most-off', [HomeController::class, 'mostOff'])->middleware('check.buyer')->name('most-off');
Route::get('/search', [HomeController::class, 'search'])->middleware('check.buyer')->name('products-search');
Route::get('/make/conversion', [HomeController::class, 'makeConversion'])->name('make.conversion');
Route::get('/about', [HomeController::class, 'about'])->middleware('check.buyer')->name('about');
Route::get('/rules', [HomeController::class, 'rules'])->middleware('check.buyer')->name('rules');
Route::get('/blog', [HomeController::class, 'blog'])->middleware('check.buyer')->name('blog');
Route::get('/product/{id}', [HomeController::class, 'product'])->middleware('check.buyer')->name('product-info');
Route::get('/shop/{id}', [HomeController::class, 'shop'])->middleware('check.buyer')->name('shop-info');
Route::post('/add/comment/{id}', [CommentController::class, 'addComment'])->middleware('check.login')->name('add-comment');
Route::get('/manage/comment', [CommentController::class, 'admin'])->middleware('check.login')->name('manage-comment');
Route::get('/alarm/{id}', [CommentController::class, 'alarm'])->middleware('check.login')->name('alarm');
Route::get('/type/{id}', [CommentController::class, 'changeType'])->middleware('check.login')->name('type');
Route::get('/like/{id}/{product}', [CommentController::class, 'like'])->middleware('check.login')->name('like');
Route::get('/dislike/{id}/{product}', [CommentController::class, 'dislike'])->middleware('check.login')->name('dislike');
Route::post('/reply/{id}/{product}', [CommentController::class, 'addReply'])->middleware('check.login')->name('add-reply');
Route::post('/ticket/start', [ConversionController::class, 'start'])->middleware('check.login')->name('ticket.start');
Route::get('/ticket/manage', [ConversionController::class, 'manage'])->middleware('check.login')->name('ticket.manage');
Route::get('/ticket/list/{id}', [ConversionController::class, 'list'])->middleware('check.login')->name('ticket.list');
Route::post('/ticket/add/{id}', [ConversionController::class, 'addTicket'])->middleware('check.login')->name('ticket.add');
Route::get('/ticket/add', [ConversionController::class, 'add'])->middleware('check.login')->name('ticket.store');



Route::get('/dashboard', [UserController::class, 'dashboards'])->name('dashboard');
Route::get('/refresh-captcha', function () {
    return response()->json(['captcha' => captcha_img('flat')]);
});
Route::get('/zarinpal/callback', [OrderController::class, 'callback'])->name('payment.callback');


Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register');

Route::post('/register', [UserController::class, 'register'])->name('register.store');
Route::get('/profile', [UserController::class, 'profile'])->name('profile');
Route::post('/profile', [UserController::class, 'edit'])->name('profile.edit');

Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');

Route::post('/login', [UserController::class, 'login'])->name('login.store');

Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/password/reset', [UserController::class, 'showPasswordResetForm'])->name('password.reset.form');

Route::post('/password/reset', [UserController::class, 'reset'])->name('password.reset');

Route::get('/seller/shop/form', [ShopController::class, 'form'])->name('shop.form');
Route::post('/seller/shop/store', [ShopController::class, 'register'])->name('shop.store');
Route::get('/seller/shop/manage', [ShopController::class, 'manage'])->name('shop.manage');
Route::get('/seller/shop/edit/form/{id}', [ShopController::class, 'editForm'])->name('shop.ef');
Route::post('/seller/shop/update/{id}', [ShopController::class, 'edit'])->name('shop.update');

Route::get('/seller/product/form', [ProductController::class, 'form'])->name('product.form');
Route::post('/seller/product/store', [ProductController::class, 'register'])->name('product.store');
Route::get('/seller/product/manage', [ProductController::class, 'manage'])->name('product.manage');
Route::get('/seller/product/update/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::get('/seller/product/off/{id}', [ProductController::class, 'off'])->name('product.off');
Route::get('/seller/product/off/delete/{id}', [ProductController::class, 'deleteOff'])->name('product.off.delete');
Route::post('/seller/product/update/{id}', [ProductController::class, 'update'])->name('product.update');

Route::get('/admin/messenger/manage', [MessengerController::class, 'manage'])->name('messenger.manage');
Route::get('/admin/messenger/update/{id}', [MessengerController::class, 'edit'])->name('message.et');
Route::get('/admin/order/manage/', [OrderController::class, 'admin'])->name('admin.order');
Route::get('/admin/order/alarm/{id}', [OrderController::class, 'alarm'])->name('admin.order.alarm');
Route::get('/admin/work/', [UserController::class, 'work'])->name('work');
Route::post('/admin/get/work', [UserController::class, 'getWork'])->name('get.work');
Route::get('/admin/massage/', [MessengerController::class, 'admin'])->name('massage.admin');
Route::get('/admin/massage/admin', [UserController::class, 'manageAdmin'])->name('manage.admin.admin');
Route::get('/admin/register/change/{id}', [UserController::class, 'registerWork'])->name('admin.register');
Route::get('/admin/conversion/check', [UserController::class, 'conversion'])->name('conversion.check');

//admin
Route::get('/admin/shop/manage', [ShopController::class, 'AdManage'])->name('Ad.shop.manage');
Route::get('/admin/shop/edit/{id}', [ShopController::class, 'change'])->name('Ad.shop.change');
Route::get('/admin/blog/form', [BlogController::class, 'form'])->name('blog.form');
Route::get('/admin/blog/manage', [BlogController::class, 'manage'])->name('blog.manage');
Route::get('/admin/blog/delete/{id}', [BlogController::class, 'delete'])->name('blog.delete');
Route::post('/admin/blog/store', [BlogController::class, 'store'])->name('blog.store');

//category
Route::get('admin/category/form/', [CategoryController::class, 'form'])->name('Ad.category.form');
Route::post('admin/category/store/', [CategoryController::class, 'store'])->name('Ad.category.store');
Route::get('/category/manage/', [CategoryController::class, 'manage'])->name('category.manage');


Route::get('/buyer/add/basket/{id}', [ShopBasketController::class, 'store'])->name('add.basket')->middleware('check.login');
Route::get('/buyer/delete/basket/{id}', [ShopBasketController::class, 'delete'])->name('delete.basket');
Route::get('/buyer/basket', [ShopBasketController::class, 'manage'])->name('manage.basket');
Route::post('/buyer/add/order', [ShopBasketController::class, 'addOrder'])->name('add.order')->middleware('check.login');


Route::get('/buyer/manage/order', [OrderController::class, 'manage'])->name('manage.order');
Route::get('/buyer/pay/order', [OrderController::class, 'pay'])->name('pay.order');
Route::get('/seller/manage/order', [OrderController::class, 'seller'])->name('seller.order');
Route::get('/order/change/type/{id}/{order}', [OrderController::class, 'changeType'])->name('change.type');
Route::get('/order/factor/{id}', [OrderController::class, 'factor'])->name('factor');
Route::get('/order/receive/{id}', [OrderController::class, 'receive'])->name('receive');
