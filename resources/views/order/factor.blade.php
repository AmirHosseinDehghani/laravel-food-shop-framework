<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <style>

        body {
            font-family: 'shabnam', sans-serif;
            direction: rtl;
            text-align: right;
            font-size: 16px;
        }

        .container {
            width: 90%;
            margin: 30px auto;
            background: #fff;
            padding: 30px 40px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
        }

        .header-info {
            font-size: 12px;
            text-align: right;
            color: #555;
            border-bottom: 1px solid #ccc;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .header-info div {
            margin-bottom: 4px;
        }

        .title {
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            color: #2e7d32;
            margin-bottom: 25px;
        }

        .product-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .product-table th,
        .product-table td {
            border: 1px solid #999;
            padding: 10px;
            text-align: center;
        }

        .product-table th {
            background-color: #f1f1f1;
            font-weight: bold;
        }

        .product-table tr:nth-child(even) {
            background-color: #fcfcfc;
        }

        .total-row td {
            background-color: #f5fff5;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header-info">
        <div>تاریخ: {{ \App\Services\PersianDate::convert($order->created_at) }}</div>
        <div>شماره فاکتور: {{ $order->id }}</div>
        <div>پیوست: —</div>
    </div>

    <div class="title">پیش فاکتور</div>

    <table class="product-table">
        <thead>
        <tr>
            <th>ردیف</th>
            <th>نام کالا</th>
            <th>مبلغ</th>
        </tr>
        </thead>
        <tbody>
        @foreach($order->baskets as $basket)
            @foreach($products as $product)
                @if($product->id == $basket)
                    <tr>
                        <td>{{ $index++ }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ number_format($product->price) }}</td>
                    </tr>
                @endif
            @endforeach
        @endforeach

        <tr class="total-row">
            <td colspan="2">جمع</td>
            <td>{{ number_format($order->price) }}</td>
        </tr>
        </tbody>
    </table>
</div>
</body>
</html>
