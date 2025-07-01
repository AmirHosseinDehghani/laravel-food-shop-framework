<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordResetRequest extends FormRequest
{
    public function authorize()
    {
        return true; // اجازه دسترسی به درخواست
    }

    public function rules()
    {
        return [
            'email' => 'required|email|exists:users,email',
            'recovery_code' => 'required|string',
            'new_password' => 'required|string|confirmed|min:8',
            'new_password_confirmation' => 'required|string|min:8',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'وارد کردن ایمیل الزامی است.',
            'email.email' => 'ایمیل وارد شده معتبر نیست.',
            'email.exists' => 'ایمیل وارد شده در سیستم وجود ندارد.',
            'recovery_code.required' => 'کد بازیابی الزامی است.',
            'new_password.required' => 'رمز عبور جدید الزامی است.',
            'new_password.confirmed' => 'تایید رمز عبور جدید مطابقت ندارد.',
            'new_password.min' => 'رمز عبور جدید باید حداقل ۸ کاراکتر باشد.',
            'new_password_confirmation.required' => 'تایید رمز عبور الزامی است.',
            'new_password_confirmation.min' => 'تایید رمز عبور باید حداقل ۸ کاراکتر باشد.',
        ];
    }
}

