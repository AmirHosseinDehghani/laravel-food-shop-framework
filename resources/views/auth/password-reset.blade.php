<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>بازیابی رمز عبور</title>
    <link href="https://fonts.googleapis.com/css2?family=Vazir&family=Lateef&display=swap" rel="stylesheet">
    <style>
        body, input, button {
            font-family: 'Lateef', cursive;
            direction: rtl;
            margin: 0;
            padding: 0;
        }
        body {
            background: linear-gradient(to right, #f3a3bc, #6c5ce7);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
        }
        .container {
            width: 100%;
            max-width: 400px;
            padding: 30px;
            background: #ffffff;
            border-radius: 15px;
            box-shadow: 0 5px 30px rgba(0, 0, 0, 0.2);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #ff5c8d;
            font-size: 36px;
            font-weight: 700;
        }
        .form-group {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            margin-bottom: 20px;
        }
        .form-group input {
            flex: 1;
            padding: 16px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            background-color: #f6f6f6;
            transition: all 0.3s ease;
        }
        .form-group input:focus {
            border-color: #ff5c8d;
            outline: none;
            box-shadow: 0 0 10px rgba(255, 92, 141, 0.5);
        }
        .form-group-single {
            margin-bottom: 20px;
        }
        .form-group-single input {
            width: 100%;
            padding: 16px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            background-color: #f6f6f6;
            transition: all 0.3s ease;
        }
        .form-group-single input:focus {
            border-color: #ff5c8d;
            outline: none;
            box-shadow: 0 0 10px rgba(255, 92, 141, 0.5);
        }
        input[type="submit"] {
            background-color: #ff5c8d;
            color: white;
            border: none;
            cursor: pointer;
            padding: 16px;
            border-radius: 8px;
            font-size: 20px;
            font-weight: bold;
            transition: background-color 0.3s ease;
            width: 100%;
        }
        input[type="submit"]:hover {
            background-color: #ff4064;
        }
        .error-list {
            color: #d32f2f;
            font-size: 16px;
            margin-bottom: 20px;
            list-style: none;
            padding: 10px;
            background-color: #fdecea;
            border: 1px solid #f5c6cb;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(211, 47, 47, 0.2);
        }
        .error-list li {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>بازیابی رمز عبور</h2>

    <!-- نمایش ارورها -->
    @if ($errors->any())
        <ul class="error-list">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('password.reset') }}" method="POST">
    @csrf

    <!-- دو فیلد در یک سطر -->
        <div class="form-group">
            <input type="email" name="email" placeholder="ایمیل" value="{{ old('email') }}" required>
            <input type="text" name="recovery_code" placeholder="کد بازیابی" value="{{ old('recovery_code') }}" required>
        </div>

        <!-- دو فیلد در یک سطر -->
        <div class="form-group">
            <input type="password" name="new_password" placeholder="رمز عبور جدید" required>
            <input type="password" name="new_password_confirmation" placeholder="تایید رمز عبور جدید" required>
        </div>

        <!-- دکمه ارسال -->
        <div class="form-group-single">
            <input type="submit" value="بازیابی رمز عبور">
        </div>
    </form>
</div>
</body>
</html>
