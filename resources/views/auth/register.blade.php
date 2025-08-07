<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ثبت‌نام</title>
    <link href="https://fonts.googleapis.com/css2?family=Vazir&family=Lateef&display=swap" rel="stylesheet">
    <style>
        body, input, button, select {
            font-family: 'Rubik', sans-serif;
            direction: rtl;
            margin: 0;
            padding: 0;
            font-size: 16px;
        }

        body {
            background: linear-gradient(to right, #dbdbdb, #dbdbdb);
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

        h1, h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #6995B1;
            font-size: 28px;
            font-weight: bold;
        }

        .form-group {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .form-group input,
        .form-group select {
            padding: 14px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 14px;
            background-color: #f6f6f6;
            transition: 0.3s ease;
            box-sizing: border-box;
            flex: 1;
            min-width: 0;
        }

        input:focus,
        select:focus {
            border-color: #a3be4c;
            outline: none;
            box-shadow: 0 0 10px #a3be4c;
        }

        button, input[type="submit"] {
            background-color: #6995B1;
            color: white;
            border: none;
            cursor: pointer;
            padding: 14px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            width: 100%;
            transition: 0.3s;
        }

        button:hover,
        input[type="submit"]:hover {
            background-color: #a3be4c;
            transform: scale(1.05);
        }

        .link {
            text-align: center;
            margin-top: 10px;
        }

        .link a {
            color: #6995B1;
            text-decoration: none;
            font-weight: bold;
            font-size: 14px;
        }

        .link a:hover {
            text-decoration: underline;
        }

        .alert {
            background-color: #fdd;
            border: 1px solid #f99;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 15px;
            color: #900;
            font-size: 14px;
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
            background-color: #6995B1;
            border: none;
            color: white;
            font-size: 18px;
            padding: 10px 14px;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
        }

        .refresh-btn:hover {
            background-color: #6995B1;
        }
    </style>

</head>
<body>
<div class="container">
    <h1>{{ __('register.register_title') }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul style="list-style: none; padding: 0; margin: 0;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('register.store') }}" method="POST">
        @csrf


        <div class="form-group">
            <input type="text" name="name" placeholder="{{ __('register.name') }}" value="{{ old('name') }}" required>
            <input type="text" name="family" placeholder="{{ __('register.family') }}" value="{{ old('family') }}" required>
            <select name="type" required>
                <option value="buyer">{{ __('register.buyer') }}</option>
                <option value="seller">{{ __('register.seller') }}</option>
                <option value="admin">{{ __('register.admin') }}</option>
            </select>
        </div>

        <div class="form-group">
            <input type="email" name="email" placeholder="{{ __('register.email') }}" value="{{ old('email') }}" required>
        </div>

        <div class="form-group">
            <input type="password" name="password" placeholder="{{ __('register.password') }}" required>
            <input type="password" name="password_confirmation" placeholder="{{ __('register.password_confirm') }}" required>
            <input type="text" name="recovery_code" placeholder="{{ __('register.recovery_code') }}" value="{{ old('recovery_code') }}" required>
        </div>

        <div class="captcha-box">
            <span id="captcha-img">{!! captcha_img('flat') !!}</span>
            <button type="button" class="refresh-btn" id="reload">🔄</button>
        </div>
        <div class="form-group">
            <input type="text" name="captcha" placeholder="{{ __('register.captcha_placeholder') }}" required>
        </div>

        <button type="submit">{{ __('register.register_button') }}</button>
    </form>

    <div class="link">
        <p>{{ __('register.have_account') }} <a href="{{ route('login') }}">{{ __('register.login') }}</a></p>
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
                alert('{{ __("register.captcha_reload_error") }}');
                $btn.removeClass('animate');
            }
        });
    });
</script>


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
