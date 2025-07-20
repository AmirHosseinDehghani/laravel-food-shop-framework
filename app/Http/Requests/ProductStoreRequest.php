<?php

// app/Http/Requests/ProductStoreRequest.php
namespace App\Http\Requests;

use App\Rules\PersianText;
use App\Rules\MeaningfulText;
use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
{
    public function authorize()
    {
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
            ],
            'price' => 'required|numeric|min:1000',
            'category' => 'required|numeric|',
            'type' => 'required|string|',
            'url' => 'required|file|mimes:jpg,jpeg,png,pdf,mp4,webm|max:10240',
            'shop' => 'required|numeric'
        ];
    }


    public function messages()
    {
        return [
            'name.required' => 'نام محصول الزامی است.',
            'description.min' => 'توضیحات باید حداقل ۱۵ کاراکتر باشد.',
            'price.min' => 'حداقل قیمت محصول ۱,۰۰۰ تومان است.',
            'shop.exists' => 'فروشگاه انتخاب شده نامعتبر است.'
        ];
    }
}
