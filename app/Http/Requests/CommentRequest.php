<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
            'comment' => 'string|min:10|max:200',
            'captcha' => 'required',
        ];
    }
    public function messages()
    {
        return [

            'captcha.captcha' => __('LoginRequestLang.captcha_invalid'),
            'captcha.required' => __('LoginRequestLang.captcha_required'),
        ];
    }
}
