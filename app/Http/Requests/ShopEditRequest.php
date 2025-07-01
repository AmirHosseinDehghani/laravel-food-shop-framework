<?php

namespace App\Http\Requests;

use App\Rules\PersianText;
use Illuminate\Foundation\Http\FormRequest;

class ShopEditRequest extends FormRequest
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
            'name' => ['nullable', 'string', 'max:255','min:3', new PersianText],
            'password' => 'nullable|string|min:8|confirmed',
            'oldPass' => 'required|string|min:8|',
            'p' => 'nullable|string',
            'c' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'name.max' => 'نام فروشگاه نمی‌تواند بیشتر از ۲۵۵ کاراکتر باشد.',
            'oldPass.required' => 'لطفاً رمز فروشگاه را وارد کنید.',
            'oldPass.min' => 'رمز قدیمی باید حداقل ۸ کاراکتر باشد.',
            'password.min' => 'رمز فروشگاه باید حداقل ۸ کاراکتر باشد.',
            'password.confirmed' => 'رمز فروشگاه با تأییدیه مطابقت ندارد.',
        ];
    }
}
