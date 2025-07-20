<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessengerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopBasketController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home'])->middleware('check.buyer')->name('home');
Route::get('/search-by-category/{id}', [HomeController::class, 'category'])->middleware('check.buyer')->name('category');
Route::get('/most-salle', [HomeController::class, 'mostSalle'])->middleware('check.buyer')->name('most-salle');
Route::get('/most-off', [HomeController::class, 'mostOff'])->middleware('check.buyer')->name('most-off');
Route::get('/search', [HomeController::class, 'search'])->middleware('check.buyer')->name('products-search');
Route::get('/product/{id}', [HomeController::class, 'product'])->middleware('check.buyer')->name('product-info');


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

//admin
Route::get('/admin/shop/manage', [ShopController::class, 'AdManage'])->name('Ad.shop.manage');
Route::get('/admin/shop/edit/{id}', [ShopController::class, 'change'])->name('Ad.shop.change');

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
