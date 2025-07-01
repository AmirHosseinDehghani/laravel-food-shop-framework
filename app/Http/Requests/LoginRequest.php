<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize()
    {
        // اجازه دسترسی به همه کاربران
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'required|email|exists:users,email', // بررسی وجود ایمیل در جدول users
            'password' => 'required|string|min:8', // بررسی اعتبار پسورد
          //
        ];
    }

    // در صورت تمایل می‌توانیم پیام‌های خطا را هم سفارشی کنیم
    public function messages()
    {
        return [
            'email.exists'=>'ایمیل در پایگاه داده موجود نیست',
            'email.required' => 'لطفاً ایمیل خود را وارد کنید.',
            'password.required' => 'لطفاً رمز عبور خود را وارد کنید.',
            'password.min' => 'رمز عبور حداقل باید 8 کاراکتر باشد',
            'captcha.captcha' => 'کد امنیتی اشتباه است',
            'captcha.required' => 'کد امنیتی را وارد کنید ',
        ];
    }
}
