<?php

namespace App\Http\Requests;

use App\Rules\PersianText;
use Illuminate\Foundation\Http\FormRequest;

class ShopStoreRequest extends FormRequest
{
    public function authorize()
    {
        // اجازه دسترسی به همه کاربران
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255', new PersianText],
            'password' => 'required|string|min:8|confirmed',
            'p' => 'required|string',
            'c' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'لطفاً نام فروشگاه را وارد کنید.',
            'name.max' => 'نام فروشگاه نمی‌تواند بیشتر از ۲۵۵ کاراکتر باشد.',
            'password.required' => 'لطفاً رمز فروشگاه را وارد کنید.',
            'password.min' => 'رمز فروشگاه باید حداقل ۸ کاراکتر باشد.',
            'password.confirmed' => 'رمز فروشگاه با تأییدیه مطابقت ندارد.',
            'p.required' => 'لطفاً استان را انتخاب کنید.',
            'c.required' => 'لطفاً شهر را انتخاب کنید.',
        ];
    }
}
