<?php

namespace App\Http\Controllers;


use App\Http\Requests\ShopEditRequest;
use App\Http\Requests\ShopStoreRequest;
use App\Models\Message;
use App\Models\Messege;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ShopController extends Controller
{
    //seller
    public function form()
    {
        return view('main.seller-menu') . view('shop.form');
    }

    public function manage()
    {
        $shops = Shop::query()->get()->where('owner', session('user')->id);
        return view('main.seller-menu') . view('shop.manage', ['shops' => $shops]);
    }

    public function register(ShopStoreRequest $request)
    {
        $validated = $request->validated();
        $validated['address'] = $validated['p'] . ' / ' . $validated['c'];
        unset($validated['p'], $validated['c']);
        $validated['password'] = Hash::make($validated['password']);
        $validated['owner'] = session('user')->id;
        Shop::create($validated);
        return redirect()->route('shop.form')->with('success', ' ثبت فروشگاه با موفقیت انجام شد! ');
    }

    public function editForm(int $id)
    {
        $shop = Shop::query()->find($id);
        return view('main.seller-menu') . view('shop.edit ', ['shop' => $shop]);
    }

    public function edit(int $id, ShopEditRequest $request)
    {
        $shop = Shop::query()->find($id);
        $check = 0;
        $validated = $request->validated();

        if (Hash::check($request->oldPass, $shop->password)) {

            unset($validated['oldPass']);
            $shop->update(['type' => '0']);
            if (isset($validated['name'])) {

                $shop->update(['name' => $validated['name']]);
                $check++;
            }
            if (isset($validated['p'])) {
                $validated['address'] = $validated['p'] . ' / ' . $validated['c'];
                unset($validated['p'], $validated['c']);
                $shop->update(['address' => $validated['address']]);
                $check++;
            }

            if (isset($validated['password'])) {

                $shop->update(['password' => Hash::make($validated['password'])]);
                $check++;
            }
            if ($check != 0) {
                return redirect()->route('shop.ef', $id)->with('success', ' تغیرات با موفقیت اعمال شد. ');
            }

        } else {

            return redirect()->route('shop.ef', $id)->withErrors([
                'password_wrong' => 'رمز فروشگاه اشتباه است',
            ]);
        }
    }

    //admin

    public function AdManage()
    {
        $shops = Shop::query()->get()->all();
        $seller = User::query()->get()->where('type', 'seller');
        return view('main.admin-menu') . view('shop.admin.manage', ['shops' => $shops, 'sellers' => $seller]);
    }

    public function change(int $id)
    {
        $shop = Shop::find($id);

        if ($shop->type == 0) {

            $shop->update(['type' => '1']);
            Message::query()->create(['sender'=>session('user')->id
                , 'receiver' =>$shop->owner
                , 'subject'=>'تغییر وضعیت فروشگاه شما'
                ,'text'=>"فروشگاه شماره $shop->id به نام $shop->name تایید شد"]);

            return redirect()->route('Ad.shop.manage')->with('success', " فروشگاه $shop->name تایید شد ");
        } else {
            Message::query()->create(['sender'=>session('user')->id
                , 'receiver' =>$shop->owner
                , 'subject'=>'تغییر وضعیت فروشگاه شما'
                ,'text'=>"فروشگاه شماره $shop->id به نام $shop->name از تایید خارج شد"]);
            $shop->update(['type' => '0 ']);
            return redirect()->route('Ad.shop.manage')->with('success',  " فروشگاه $shop->name از تایید خارج شد ");
        }

    }
}
