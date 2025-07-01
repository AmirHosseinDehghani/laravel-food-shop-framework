<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ورود</title>

    <!-- لینک به فونت وزیر -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- لینک به FontAwesome برای آیکون‌ها -->

    <link href="https://fonts.googleapis.com/css2?family=Vazir&family=Lateef&display=swap" rel="stylesheet"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        body, input, button {
            font-family: 'Lateef', cursive; /* استفاده از فونت نستعلیق */
            font-size: 24px ;
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
            width: 90%;
            max-width: 400px;
            padding: 30px;
            background: #ffffff;
            border-radius: 15px;
            box-shadow: 0 5px 30px rgba(0, 0, 0, 0.2);
            animation: fadeIn 1s ease-out forwards;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #ff5c8d;
            font-size: 28px;
            font-weight: bold;
        }

        .input-group {
            position: relative;
            margin-bottom: 20px;
        }

        .input-group input {
            width: 100%;
            padding: 14px 40px 14px 14px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            background-color: #f6f6f6;
            transition: all 0.3s ease;
            box-sizing: border-box;
        }

        .input-group i {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #aaa;
        }

        .input-group input:focus {
            border-color: #ff5c8d;
            outline: none;
            box-shadow: 0 0 10px rgba(255, 92, 141, 0.5);
        }

        .password-container {
            display: flex;
            align-items: center;
            position: relative;
        }

        .password-container input {
            width: 100%;
            padding-right: 40px;
        }

        .password-container .toggle-password {
            position: absolute;
            right: 10px;
            cursor: pointer;
            color: #666;
        }

        .password-container .toggle-password:hover {
            color: #ff5c8d;
        }

        input[type="submit"] {
            background-color: #ff5c8d;
            color: white;
            border: none;
            cursor: pointer;
            padding: 14px;
            border-radius: 8px;
            font-size: 18px;
            font-weight: bold;
            transition: 0.3s;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #ff4064;
            transform: scale(1.05);
        }

        .alert {
            padding: 15px;
            margin: 10px 0;
            border: 1px solid transparent;
            border-radius: 5px;
            font-size: 14px;
            position: relative;
            animation: fadeIn 0.5s;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border-color: #f5c6cb;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border-color: #c3e6cb;
        }

        .link, .recovery-link {
            text-align: center;
            margin-top: 10px;
        }

        .link a, .recovery-link a {
            color: #ff5c8d;
            text-decoration: none;
            font-weight: bold;
            font-size: 16px;
        }

        .link a:hover, .recovery-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>ورود به حساب</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </div>
        @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('login.store') }}" method="POST">
        @csrf
        <div class="input-group">
            <i class="fas fa-envelope"></i>
            <input type="email" name="email" placeholder="ایمیل" value="{{ old('email') }}" required>
        </div>
        <div class="input-group password-container">
            <i class="fas fa-lock"></i>
            <input type="password" id="password" name="password" placeholder="رمز عبور" required>
            <i class="fas fa-eye toggle-password" onclick="togglePassword()"></i>
        </div>
        <input type="submit" value="ورود">
    </form>
    <div class="link">
        <p>حساب کاربری ندارید؟ <a href="{{ route('register') }}">ثبت‌نام کنید</a></p>
    </div>
    <div class="recovery-link">
        <p>رمز عبور خود را فراموش کرده‌اید؟ <a href="{{ route('password.reset.form') }}">بازیابی رمز عبور</a></p>
    </div>
</div>

<script>
    function togglePassword() {
        var passwordField = document.getElementById("password");
        var icon = document.querySelector(".toggle-password");
        if (passwordField.type === "password") {
            passwordField.type = "text";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        } else {
            passwordField.type = "password";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        }
    }
</script>
</body>
</html>
