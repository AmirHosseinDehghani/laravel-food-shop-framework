<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductEditRequest;
use App\Http\Requests\ProductStoreRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Shop;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function form()
    {
        $shops = Shop::query()->get()->where('owner', session('user')->id);
        $categories = Category::query()->get()->all();
        return view('main.seller-menu') . view('product.form', ['shops' => $shops, 'categories' => $categories]);
    }

    public function register(ProductStoreRequest $request)
    {
        $validated = $request->validated();
        $validated['seller'] = session('user')->id;
        Product::query()->create($validated);
        return redirect()->route('product.form')->with('success', ' ثبت محصول با موفقیت انجام شد! ');
    }

    public function manage()
    {
        $categories = Category::query()->get()->all();
        $shops = Shop::query()->get()->where('owner', session('user')->id);
        $products = Product::query()->get()->where('seller', session('user')->id);
        return view('main.seller-menu') . view('product.manage', ['shops' => $shops, 'products' => $products, 'categories' => $categories]);
    }

    public function edit(int $id)
    {
        $product = Product::query()->find($id);
        return view('main.seller-menu') . view('product.edit', ['product' => $product]);
    }

    public function update(int $id, ProductEditRequest $request)
    {
        $validated = $request->validated();
        $product = Product::query()->find($id);
        if (!empty($validated['price'])) {
            $product->update(['price'=> $validated['price']]);
            if (!empty($validated['description'])) {
                $product->update(['description' => $validated['description']]);
            }
            if (empty($validated)) {
                return redirect()->route('product.edit' , $id)->withErrors(['error' => 'ایمیل یا رمز عبور اشتباه است.']);
            } else   return redirect()->route('product.edit' , $id)->with('success', ' تغییرات انجام شد! ');
        }
    }
}
