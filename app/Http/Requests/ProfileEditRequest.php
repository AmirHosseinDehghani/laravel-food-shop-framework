<?php

namespace App\Http\Requests;

use App\Rules\PersianText;
use Illuminate\Foundation\Http\FormRequest;

class ProfileEditRequest extends FormRequest
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
    public function rules()
    {
        return [
            'password' => 'nullable|string|min:8|confirmed',
            'oldPass' => 'required|string|min:8|',
             'email' => 'nullable|email|unique:users'
        ];
    }

    public function messages()
    {
        return [
            'email.unique' => 'این ایمیل قبلا انتخاب شده اس . لطفا ایمیل دیگری انتخاب کنید .',
            'oldPass.required' => 'لطفاً رمز فروشگاه را وارد کنید.',
            'oldPass.min' => 'رمز قدیمی باید حداقل ۸ کاراکتر باشد.',
            'password.min' => 'رمز فروشگاه باید حداقل ۸ کاراکتر باشد.',
            'password.confirmed' => 'رمز فروشگاه با تأییدیه مطابقت ندارد.',
        ];
    }
}
