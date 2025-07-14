<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'required|email|exists:users,email',
            'password' => 'required|string|min:8',
            'captcha' => 'required|captcha',
        ];
    }

    public function messages()
    {
        return [
            'email.exists' => __('LoginRequestLang.email_exists'),
            'email.required' => __('LoginRequestLang.email_required'),
            'password.required' => __('LoginRequestLang.password_required'),
            'password.min' => __('LoginRequestLang.password_min'),
            'captcha.captcha' => __('LoginRequestLang.captcha_invalid'),
            'captcha.required' => __('LoginRequestLang.captcha_required'),
        ];
    }
}
