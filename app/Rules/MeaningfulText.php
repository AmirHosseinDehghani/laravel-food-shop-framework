<?php


// app/Rules/MeaningfulText.php
namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class MeaningfulText implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // حذف علائم نگارشی و تقسیم به کلمات
        $words = preg_split('/\s+/', trim(preg_replace('/[،؛.!?]/u', ' ', $value)));

        // فیلتر کلمات با حداقل ۲ حرف
        $meaningfulWords = array_filter($words, fn($word) => mb_strlen($word) >= 2);

        if (count($meaningfulWords) < 3) {
            $fail('فیلد :attribute باید حداقل شامل ۳ کلمه معنی‌دار باشد.');
        }
    }
}
