<?php

return [

    /*
    |--------------------------------------------------------------------------
    | PDF Driver (default: dompdf)
    |--------------------------------------------------------------------------
    */
    'driver' => 'dompdf',

    /*
    |--------------------------------------------------------------------------
    | DOMPDF Settings
    |--------------------------------------------------------------------------
    */
    'dompdf' => [
        'show_warnings' => false,
        'orientation' => 'portrait',

        'dpi' => 96,
        'defaultPaperSize' => 'a4',

        // فونت پیش‌فرض
        'defaultFont' => 'Shabnam',

        // فعال کردن پارس‌کننده HTML5
        'isHtml5ParserEnabled' => true,
        'isPhpEnabled' => true,

        // مسیر پوشه فونت‌ها
        'font_dir' => storage_path('fonts/'),
        'font_cache' => storage_path('fonts/'),

        // فونت‌های سفارشی
        'custom_font_dir' => storage_path('fonts/'),
        'custom_font_data' => [
            'Shabnam' => [
                'R' => 'Shabnam.ttf', // Regular
                // اگر فونت‌های Bold یا Italic هم داشتی اینجا اضافه کن
                // 'B' => 'Shabnam-Bold.ttf',
                // 'I' => 'Shabnam-Italic.ttf',
                // 'BI' => 'Shabnam-BoldItalic.ttf',
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Options for PDF download/stream
    |--------------------------------------------------------------------------
    */
    'default_view' => 'laravel',
];
