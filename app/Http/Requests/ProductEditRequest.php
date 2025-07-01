<?php

namespace App\Http\Requests;

use App\Rules\MeaningfulText;
use App\Rules\PersianText;
use Illuminate\Foundation\Http\FormRequest;

class ProductEditRequest extends FormRequest
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
            'description' => [
                'nullable',
                'string',
                'min:15',
                new PersianText,
                new MeaningfulText
            ],
            'price' => 'nullable|numeric|min:1000',
        ];
    }
    public function messages()
    {
        return [
            'description.min' => 'توضیحات باید حداقل ۱۵ کاراکتر باشد.',
            'price.min' => 'حداقل قیمت محصول ۱,۰۰۰ تومان است.',
        ];
    }
}
