<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ورود</title>

    <!-- فونت‌ها -->
    <link href="https://fonts.googleapis.com/css2?family=Vazir&family=Lateef&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">

    <style>
        body, input, button {
            font-family: "Rubik", sans-serif;
            font-size: 24px;
            direction: rtl;
            margin: 0;
            padding: 0;
        }

        body {
            background: linear-gradient(to right, #dbdbdb, #dbdbdb);
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
            from { opacity: 0; transform: translateY(-30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #6995B1;
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
            font-size: 12px;
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
            border-color: #a3be4c;
            outline: none;
            box-shadow: 0 0 10px #a3be4c;
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
            color: #a3be4c;
        }

        input[type="submit"] {
            background-color: #6995B1;
            color: white;
            border: none;
            cursor: pointer;
            padding: 14px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            transition: 0.3s;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #a3be4c;
            transform: scale(1.05);
        }

        .alert {
            padding: 15px;
            margin: 10px 0;
            border: 1px solid transparent;
            border-radius: 5px;
            font-size: 14px;
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
            color: #6995B1;
            text-decoration: none;
            font-weight: bold;
            font-size: 12px;
        }

        .link a:hover, .recovery-link a:hover {
            text-decoration: underline;
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
            transition: all 0.4s ease;
        }

        .refresh-btn {
            background-color: #6995B1;
            border: none;
            color: white;
            font-size: 20px;
            padding: 10px 14px;
            border-radius: 50%;
            cursor: pointer;
            transition: 0.4s ease;
        }

        .refresh-btn.animate {
            animation: spinPulse 0.7s ease-in-out;
        }

        @keyframes spinPulse {
            0% { transform: rotate(0deg) scale(1); }
            50% { transform: rotate(180deg) scale(1.2); }
            100% { transform: rotate(360deg) scale(1); }
        }
    </style>
</head>
<body>
<div class="container">
    <h2>{{ __('auth.login_title') }}</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul style="padding-right: 20px; margin: 0;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
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
            <input type="email" name="email" placeholder="{{ __('auth.email') }}" value="{{ old('email') }}" required>
        </div>
        <div class="input-group password-container">
            <i class="fas fa-lock"></i>
            <input type="password" id="password" name="password" placeholder="{{ __('auth.password') }}" required>
            <i class="fas fa-eye toggle-password" onclick="togglePassword()"></i>
        </div>

        <div class="captcha-box">
            <span id="captcha-img">{!! captcha_img('flat') !!}</span>
            <button type="button" class="refresh-btn" id="reload">🔄</button>
        </div>

        <div class="input-group">
            <input type="text" name="captcha" placeholder="{{ __('auth.captcha_placeholder') }}" required>
        </div>

        <input type="submit" value="{{ __('auth.login_button') }}">
    </form>

    <div class="link">
        <p>{{ __('auth.no_account') }} <a href="{{ route('register') }}">{{ __('auth.register') }}</a></p>
    </div>
    <div class="recovery-link">
        <p>{{ __('auth.forgot_password') }} <a href="{{ route('password.reset.form') }}">{{ __('auth.password_recovery') }}</a></p>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $('#reload').click(function () {
        const $captchaImg = $('#captcha-img img');
        const $btn = $(this);

        $btn.addClass('animate');

        $captchaImg.css({
            filter: 'blur(2px)',
            opacity: 0,
            transform: 'scale(0.9)',
            transition: 'all 0.3s ease'
        });

        $.ajax({
            type: 'GET',
            url: '{{ url("/refresh-captcha") }}',
            success: function (data) {
                setTimeout(() => {
                    $('#captcha-img').html(data.captcha);
                    $('#captcha-img img').css({
                        opacity: 0,
                        filter: 'blur(3px)',
                        transform: 'scale(1.2)'
                    }).animate({
                        opacity: 1
                    }, {
                        duration: 500,
                        step: function (now, fx) {
                            if (fx.prop === 'opacity') {
                                $(this).css({
                                    filter: `blur(${(1 - now) * 3}px)`,
                                    transform: `scale(${1 + (1 - now) * 0.2})`
                                });
                            }
                        },
                        complete: function () {
                            $btn.removeClass('animate');
                        }
                    });
                }, 300);
            },
            error: function () {
                alert('{{ __("auth.captcha_reload_error") }}');
                $btn.removeClass('animate');
            }
        });
    });

    function togglePassword() {
        const passwordField = document.getElementById("password");
        const icon = document.querySelector(".toggle-password");
        if (passwordField.type === "password") {
            passwordField.type = "text";
            icon.classList.replace("fa-eye", "fa-eye-slash");
        } else {
            passwordField.type = "password";
            icon.classList.replace("fa-eye-slash", "fa-eye");
        }
    }
</script>

</body>
</html>
