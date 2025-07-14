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
            'name.required'     => __('register.name_required'),
            'family.required'   => __('register.family_required'),
            'email.required'    => __('register.email_required'),
            'email.unique'      => __('register.email_unique'),
            'password.required' => __('register.password_required'),
            'password.confirmed'=> __('register.password_confirmed'),
            'password.min'      => __('register.password_min'),
            'captcha.required'  => __('register.captcha_required'),
            'captcha.captcha'   => __('register.captcha_invalid'),
        ];
    }

}
