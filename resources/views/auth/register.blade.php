<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ثبت‌نام</title>
    <link href="https://fonts.googleapis.com/css2?family=Vazir&family=Lateef&display=swap" rel="stylesheet">
    <style>
        body, input, button, select {
            font-family: 'Lateef', cursive;
            direction: rtl;
            margin: 0;
            padding: 0;
        }

        body {
            background: linear-gradient(to right, #f3a3bc, #6c5ce7);
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
            overflow-y: auto;
            padding: 50px 0;
        }

        .container {
            width: 100%;
            max-width: 500px;
            padding: 30px;
            background: #ffffff;
            border-radius: 15px;
            box-shadow: 0 5px 30px rgba(0, 0, 0, 0.2);
            animation: fadeIn 1s ease-out forwards;
            margin: auto;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        h1 {
            text-align: center;
            margin-bottom: 25px;
            color: #ff5c8d;
            font-size: 36px;
            font-weight: 700;
        }

        .form-group {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .form-group input, .form-group select {
            padding: 14px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 18px;
            background-color: #f6f6f6;
            transition: 0.3s ease;
            box-sizing: border-box;
            flex: 1;
            min-width: 0;
        }

        input:focus, select:focus {
            border-color: #ff5c8d;
            outline: none;
            box-shadow: 0 0 10px rgba(255, 92, 141, 0.5);
        }

        button {
            background-color: #ff5c8d;
            color: white;
            border: none;
            cursor: pointer;
            padding: 16px;
            border-radius: 8px;
            font-size: 20px;
            font-weight: bold;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #ff4064;
        }

        .link {
            text-align: center;
            margin-top: 10px;
        }

        .link a {
            color: #ff5c8d;
            text-decoration: none;
            font-weight: bold;
            font-size: 18px;
        }

        .alert {
            background-color: #fdd;
            border: 1px solid #f99;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 15px;
            color: #900;
        }

        .captcha-box {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            margin-bottom: 20px;
        }

        .captcha-box img {
            height: 50px;
            border-radius: 5px;
            border: 1px solid #ccc;
            transition: opacity 0.4s ease;
        }

        .refresh-btn {
            background-color: #6c5ce7;
            border: none;
            color: white;
            font-size: 18px;
            padding: 10px 14px;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
        }

        .refresh-btn:hover {
            background-color: #574bdf;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>ثبت ‌نام</h1>

    @if ($errors->any())
        <div class="alert">
            <ul style="list-style: none; padding: 0; margin: 0;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('register.store') }}" method="POST">
    @csrf

    <!-- ردیف اول: نام، نام خانوادگی، نوع کاربر -->
        <div class="form-group">
            <input type="text" name="name" placeholder="نام" value="{{ old('name') }}" required>
            <input type="text" name="family" placeholder="نام خانوادگی" value="{{ old('family') }}" required>
            <select name="type" required>
                <option value="buyer">خریدار</option>
                <option value="seller">فروشنده</option>
                <option value="admin">مدیر</option>
            </select>
        </div>

        <!-- ردیف دوم: ایمیل -->
        <div class="form-group">
            <input type="email" name="email" placeholder="ایمیل" value="{{ old('email') }}" required>
        </div>

        <!-- ردیف سوم: رمز، تاییدیه، کد بازیابی -->
        <div class="form-group">
            <input type="password" name="password" placeholder="رمز عبور" required>
            <input type="password" name="password_confirmation" placeholder="تایید رمز عبور" required>
            <input type="text" name="recovery_code" placeholder="کد بازیابی" value="{{ old('recovery_code') }}" required>
        </div>

        <!-- ردیف چهارم: کپچا -->
        <div class="captcha-box">
            <span id="captcha-img">{!! captcha_img('flat') !!}</span>
            <button type="button" class="refresh-btn" id="reload">🔄</button>
        </div>
        <div class="form-group">
            <input type="text" name="captcha" placeholder="کد امنیتی را وارد کنید" required>
        </div>

        <!-- دکمه -->
        <button type="submit">ثبت ‌نام</button>
    </form>

    <div class="link">
        <p>حساب کاربری دارید؟ <a href="{{ route('login') }}">ورود</a></p>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $('#reload').click(function () {
        const $img = $('#captcha-img img');
        $img.css('opacity', '0');

        $.get('{{ url("/refresh-captcha") }}', function (data) {
            setTimeout(() => {
                $('#captcha-img').html(data.captcha);
                $('#captcha-img img').css('opacity', '0').animate({opacity: 1}, 300);
            }, 300);
        });
    });
</script>
</body>
</html>
