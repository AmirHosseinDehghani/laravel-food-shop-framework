<?php

namespace App\Http\Requests;

use App\Rules\PersianText;
use Illuminate\Foundation\Http\FormRequest;

class SignupRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255','min:3', new PersianText],
            'family' => ['required','string','max:255',new PersianText],
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'type' => 'required|in:buyer,seller,admin',
            'recovery_code' => 'nullable|string|max:255',
            'captcha' => 'required|captcha'
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'لطفا نام خود را وارد کنید',
            'family.required' => 'لطفاً نام خانوادگی خود را وارد کنید.',
            'email.required' => 'لطفاً نام خانوادگی خود را وارد کنید.',
            'email.unique' => 'این ایمیل قبلا انتخاب شده اس . لطفا ایمیل دیگری انتخاب کنید .',
            'password.required' => 'لطفاً رمز عبور خود را وارد کنید.',
            'password.confirmed' => 'رمز عبور و تاییدیه آن باید یکی باشد.',
            'password.min' => 'رمز عبور حداقل باید 8 کاراکتر باشد',
            'captcha.captcha' => 'کد امنیتی اشتباه است',
            'captcha.required' => 'کد امنیتی را وارد کنید ',
        ];
    }
}
