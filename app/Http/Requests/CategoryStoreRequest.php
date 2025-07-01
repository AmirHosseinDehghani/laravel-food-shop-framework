<?php

namespace App\Http\Requests;

use App\Rules\MeaningfulText;
use App\Rules\PersianText;
use Illuminate\Foundation\Http\FormRequest;

class CategoryStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        // اجازه دسترسی به همه کاربران
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255', new PersianText],
            'description' => [
                'required',
                'string',
                'min:15',
                new PersianText,
                new MeaningfulText
            ],// بررسی اعتبار پسورد
        ];
    }

    // در صورت تمایل می‌توانیم پیام‌های خطا را هم سفارشی کنیم
    public function messages()
    {
        return [

            'name.required' => 'لطفاً ایمیل خود را وارد کنید.',
            'description.required' => 'لطفاً رمز عبور خود را وارد کنید.',
            'description.min' => 'توضیحات حداقل باید 15 کاراکتر باشد',
        ];
    }
}
