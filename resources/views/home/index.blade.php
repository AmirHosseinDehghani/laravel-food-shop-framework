<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>فروشگاه مواد غذایی</title>
    <link rel="stylesheet" href="{{ asset('css/simplebar.css') }}">

    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Vazir&family=Lateef&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{ asset('css/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.css') }}">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="{{ asset('css/daterangepicker.css') }}">
    <!-- App CSS -->

    <link rel="stylesheet" href="{{ asset('css/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dropzone.css') }}">
    <link rel="stylesheet" href="{{ asset('css/uppy.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.steps.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.timepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('css/quill.snow.css') }}">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="{{ asset('css/daterangepicker.css') }}">
    <style>
        :root {
            --primary-color: #6c5ce7;
            --secondary-color: #a29bfe;
            --accent-color: #fd79a8;
            --dark-color: #2d3436;
            --light-color: #f5f6fa;
            --success-color: #00b894;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Lateef', cursive; /* استفاده از فونت نستعلیق */
        }

        body {

            background-color: var(--light-color);
            color: var(--dark-color);
            line-height: 1.6;
            opacity: 0;
            transition: opacity 0.8s ease;
        }

        body.loaded {
            opacity: 1;
        }

        .preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: white;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            flex-direction: column;
        }

        .preloader-spinner {
            width: 70px;
            height: 70px;
            border: 5px solid #f3f3f3;
            border-top: 5px solid var(--primary-color);
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin-bottom: 20px;
        }

        .preloader-text {
            font-size: 18px;
            color: var(--dark-color);
            margin-top: 20px;
            animation: pulse 1.5s infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes pulse {
            0% { transform: scale(1); opacity: 0.6; }
            50% { transform: scale(1.05); opacity: 1; }
            100% { transform: scale(1); opacity: 0.6; }
        }

        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }

        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            animation: fadeIn 0.8s ease-out;
        }

        /* هدر */
        header {
            background-color: #fff;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            padding: 15px 0;
            position: sticky;
            top: 0;
            z-index: 100;
            border-bottom-left-radius: 25px;
            border-bottom-right-radius: 25px;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.1);
        }

        header:hover {
            box-shadow: 0 6px 25px rgba(0, 0, 0, 0.12);
        }

        .header-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-bottom: 15px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .logo {
            font-size: 28px;
            font-weight: bold;
            color: var(--primary-color);
            display: flex;
            align-items: center;
        }

        .logo::before {
            content: "🛍️";
            margin-left: 10px;
            font-size: 32px;
        }

        .auth-buttons {
            display: flex;
            gap: 15px;
        }

        .auth-btn {
            padding: 8px 20px;
            border-radius: 30px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .login-btn {
            color: var(--primary-color);
            border: 2px solid var(--primary-color);
        }

        .login-btn:hover {
            background-color: var(--primary-color);
            color: white;
            transform: translateY(-2px);
        }

        .signup-btn {
            background-color: var(--primary-color);
            color: white;
            box-shadow: 0 4px 12px rgba(108, 92, 231, 0.3);
        }

        .signup-btn:hover {
            background-color: #5d4bdb;
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(108, 92, 231, 0.4);
        }

        /* ناوبری دسته‌بندی‌ها */
        .categories-wrapper {
            position: relative;
            margin-top: 25px;
        }

        .categories {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(108, 92, 231, 0.25);
            transform: translateY(0);
            transition: transform 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.1);
            position: relative;
            overflow-x: auto;
            scroll-behavior: smooth;
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .categories::-webkit-scrollbar {
            display: none;
        }

        .categories:hover {
            transform: translateY(-5px);
        }

        .categories-nav {
            display: flex;
            list-style: none;
            padding: 0;
            margin: 0;
            width: max-content;
        }

        .categories-nav li {
            padding: 18px 25px;
            color: white;
            cursor: pointer;
            transition: all 0.3s;
            position: relative;
            font-weight: 500;
            font-size: 15px;
            white-space: nowrap;
        }

        .categories-nav li:hover, .categories-nav li.active {
            background-color: rgba(255, 255, 255, 0.15);
        }

        .categories-nav li:after {
            content: "";
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            height: 50%;
            width: 1px;
            background-color: rgba(255, 255, 255, 0.3);
        }

        .categories-nav li:first-child:after {
            display: none;
        }

        .category-nav-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 40px;
            height: 40px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2);
            z-index: 2;
            opacity: 0.8;
            transition: all 0.3s;
        }

        .category-nav-btn:hover {
            opacity: 1;
            transform: translateY(-50%) scale(1.1);
        }

        .category-nav-btn.prev {
            right: -20px;
        }

        .category-nav-btn.next {
            left: -20px;
        }

        .category-nav-btn i {
            color: var(--primary-color);
            font-size: 18px;
        }

        /* بخش محصولات */
        .products-section {
            margin: 40px 0;
            animation: fadeIn 0.8s ease-out;
        }

        .section-title {
            position: relative;
            margin-bottom: 30px;
            padding-bottom: 15px;
            font-size: 24px;
            color: var(--dark-color);
        }

        .section-title::after {
            content: "";
            position: absolute;
            right: 0;
            bottom: 0;
            width: 80px;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
            border-radius: 2px;
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(270px, 1fr));
            gap: 25px;
            margin-top: 20px;
        }

        .product-card {
            background-color: #fff;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.1);
            position: relative;
            animation: float 4s ease-in-out infinite;
        }

        .product-card:nth-child(odd) {
            animation-delay: 0.2s;
        }

        .product-card:nth-child(3n) {
            animation-delay: 0.4s;
        }

        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.12);
            animation: none;
        }

        .product-card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(108, 92, 231, 0.1), rgba(253, 121, 168, 0.05));
            opacity: 0;
            transition: opacity 0.3s;
            border-radius: 20px;
        }

        .product-card:hover::before {
            opacity: 1;
        }

        .product-image {
            height: 200px;
            background-color: #f1f1f1;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            position: relative;
        }

        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }

        .product-card:hover .product-image img {
            transform: scale(1.05);
        }

        .product-badge {
            position: absolute;
            top: 15px;
            left: 15px;
            background-color: var(--accent-color);
            color: white;
            padding: 5px 12px;
            border-radius: 30px;
            font-size: 12px;
            font-weight: bold;
            box-shadow: 0 3px 10px rgba(253, 121, 168, 0.3);
            z-index: 1;
            animation: pulse 2s infinite;
        }

        .product-info {
            padding: 20px;
            position: relative;
        }

        .product-title {
            font-size: 17px;
            margin-bottom: 12px;
            font-weight: 600;
            color: var(--dark-color);
            transition: color 0.3s;
        }

        .product-card:hover .product-title {
            color: var(--primary-color);
        }

        .product-price {
            color: var(--primary-color);
            font-weight: bold;
            margin-bottom: 20px;
            display: block;
            font-size: 18px;
            transition: all 0.3s;
        }

        .product-card:hover .product-price {
            transform: scale(1.05);
        }

        .add-to-cart {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 30px;
            cursor: pointer;
            width: 100%;
            transition: all 0.3s;
            font-weight: 500;
            font-size: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            box-shadow: 0 4px 15px rgba(108, 92, 231, 0.3);
            position: relative;
            overflow: hidden;
        }

        .add-to-cart::after {
            content: "";
            position: absolute;
            top: -50%;
            left: -60%;
            width: 200%;
            height: 200%;
            background: rgba(255, 255, 255, 0.2);
            transform: rotate(30deg);
            transition: all 0.3s;
        }

        .add-to-cart:hover::after {
            left: 100%;
        }

        .add-to-cart:hover {
            background: linear-gradient(135deg, #5d4bdb, #9188fc);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(108, 92, 231, 0.4);
        }

        .add-to-cart:active {
            transform: translateY(0);
        }

        .add-to-cart::before {
            content: "🛒";
            transition: transform 0.3s;
        }

        .add-to-cart:hover::before {
            transform: rotate(360deg);
        }

        /* فروشگاه‌های برتر */
        .top-stores {
            margin: 60px 0;
            animation: fadeIn 0.8s ease-out 0.2s both;
        }

        .top-stores h2 {
            text-align: center;
            margin-bottom: 30px;
            color: var(--dark-color);
            font-size: 26px;
            position: relative;
            display: inline-block;
            left: 50%;
            transform: translateX(-50%);
        }

        .top-stores h2::after {
            content: "";
            position: absolute;
            right: 0;
            bottom: -10px;
            width: 100%;
            height: 3px;
            background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
            border-radius: 3px;
        }

        .stores-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
            gap: 25px;
        }

        .store-card {
            background-color: #fff;
            padding: 25px 15px;
            border-radius: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            text-align: center;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.1);
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .store-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.1);
        }

        .store-logo {
            width: 90px;
            height: 90px;
            background-color: var(--light-color);
            border-radius: 50%;
            margin: 0 auto 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
            color: var(--primary-color);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s;
        }

        .store-card:hover .store-logo {
            background-color: var(--primary-color);
            color: white;
            transform: scale(1.1);
        }

        /* نمایش محصولات بر اساس دسته‌بندی */
        .category-content {
            display: none;
            animation: fadeIn 0.6s ease-out;
        }

        .category-content.active {
            display: block;
        }

        /* فونت زیبا برای متن فارسی */
        @font-face {
            font-family: 'Vazir';
            src: url('https://cdn.jsdelivr.net/gh/rastikerdar/vazir-font@v30.1.0/dist/Vazir.woff2') format('woff2');
            font-weight: normal;
            font-style: normal;
        }

        /* اسکرول بار زیبا */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb {
            background: var(--primary-color);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #5d4bdb;
        }

        /* دکمه بازگشت به بالا */
        .back-to-top {
            position: fixed;
            bottom: 30px;
            left: 30px;
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            box-shadow: 0 5px 20px rgba(108, 92, 231, 0.4);
            cursor: pointer;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s;
            z-index: 99;
        }

        .back-to-top.active {
            opacity: 1;
            visibility: visible;
        }

        .back-to-top:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(108, 92, 231, 0.5);
            animation: pulse 1s infinite;
        }
        a {
            font-size: 20px;
            text-decoration: none;
        }

    </style>
</head>
<body>
<div class="preloader">
    <div class="preloader-spinner"></div>
    <div class="preloader-text">در حال بارگذاری فروشگاه...</div>
</div>
<header class="animate__animated animate__fadeInDown">
    <div class="container">
        <div class="header-top">
            <div class="logo">فروشگاه بزرگ محصولات غذایی </div>
            @if (session('success'))
                <div class="alert alert-success fade-in auto-dismiss">
                    <i class="fe fe-check-circle mr-2"></i>
                    {{ session('success') }}
                </div>
            @endif
            @if(!empty(session('user')))
                <div class="auth-buttons">
                    <a href="{{ route('logout') }}" class="auth-btn signup-btn animate__animated animate__fadeInRight animate__delay-1s">خروج از حساب</a>
                    <a href="{{ route('dashboard') }}" class="auth-btn login-btn animate__animated animate__fadeInRight">خانه</a>
                </div>
            @else
                <div class="auth-buttons">
                    <a href="{{ route('login') }}" class="auth-btn login-btn animate__animated animate__fadeInRight">ورود</a>
                    <a href="{{ route('register') }}" class="auth-btn signup-btn animate__animated animate__fadeInRight animate__delay-1s">ثبت‌نام</a>
                </div>
            @endif
        </div>
        <div class="categories-wrapper">
            <button class="category-nav-btn prev"><i class="fas fa-chevron-right"></i></button>
            <button class="category-nav-btn next"><i class="fas fa-chevron-left"></i></button>
            <div class="categories animate__animated animate__fadeInUp animate__delay-1s">
                <ul class="categories-nav">
                    <li class="active" data-category="all">همه محصولات</li>
                    @foreach($categories as $category)
                        <li data-category="{{$category->name}}">{{$category->name}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</header>
<main class="container">
    <section class="products-section category-content active" id="all">
        <h2 class="section-title animate__animated animate__fadeInRight">همه محصولات</h2>
        <div class="products-grid">
            @foreach($products as $product)
                <div class="product-card animate__animated animate__fadeInUp">
                    <div class="product-badge animate__animated animate__pulse animate__infinite">جدید</div>
                    <div class="product-info">
                        <h3 class="product-title">{{$product->name}}</h3>
                        @foreach($shops as $shop)
                            @if($shop->id == $product->shop)
                                <h3 class="product-title"> فروش در {{$shop->name}}  </h3>
                            @endif
                        @endforeach
                        <span class="product-price">{{number_format($product->price) }} تومان</span>
                        <button class="add-to-cart" ><a style="color: white" href="{{ route('add.basket',  $product->id) }}" >ثبت در سبد خرید</a></button>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    @foreach($categories as $category)
        <section class="products-section category-content" id="{{$category->name}}">
            <h2 class="section-title">محصولات {{$category->name}}</h2>
            <div class="products-grid">
                @foreach($products as $product)
                    @if($product->shop == $category->id)
                        <div class="product-card">
                            <div class="product-badge">تخفیف ویژه</div>
                            <div class="product-info">
                                <h3 class="product-title">{{$product->name}}</h3>
                                @foreach($shops as $shop)
                                    @if($shop->id == $product->shop)
                                        <h3 class="product-title"> فروش در {{$shop->name}}  </h3>
                                    @endif
                                @endforeach
                                <span class="product-price">{{number_format($product->price) }} تومان</span>
                                <button class="add-to-cart" ><a style="color: white" href="{{ route('add.basket',  $product->id) }}" >ثبت در سبد خرید</a></button>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </section>
    @endforeach
</main>

<div class="back-to-top">↑</div>

<script>
    // پیش‌لودر
    window.addEventListener('load', function() {
        setTimeout(function() {
            document.querySelector('.preloader').style.opacity = '0';
            document.querySelector('.preloader').style.visibility = 'hidden';
            document.body.classList.add('loaded');
        }, 1000);
    });

    // تغییر دسته‌بندی محصولات
    document.querySelectorAll('.categories-nav li').forEach(item => {
        item.addEventListener('click', function() {
            // انیمیشن برای آیتم‌های منو
            this.classList.add('animate__animated', 'animate__pulse');
            setTimeout(() => {
                this.classList.remove('animate__animated', 'animate__pulse');
            }, 1000);

            // حذف کلاس active از همه آیتم‌ها
            document.querySelectorAll('.categories-nav li').forEach(li => {
                li.classList.remove('active');
            });

            // اضافه کردن کلاس active به آیتم انتخاب شده
            this.classList.add('active');

            // مخفی کردن همه بخش‌های محصولات
            document.querySelectorAll('.category-content').forEach(section => {
                section.classList.remove('active');
            });

            // نمایش بخش مربوطه
            const categoryId = this.getAttribute('data-category');
            document.getElementById(categoryId).classList.add('active');

            // اسکرول به بخش محصولات
            document.getElementById(categoryId).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });

    // دکمه بازگشت به بالا
    const backToTopButton = document.querySelector('.back-to-top');

    window.addEventListener('scroll', () => {
        if (window.pageYOffset > 300) {
            backToTopButton.classList.add('active');
        } else {
            backToTopButton.classList.remove('active');
        }
    });

    backToTopButton.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });

    // انیمیشن‌های اسکرول
    const animateOnScroll = () => {
        const elements = document.querySelectorAll('.product-card, .store-card, .section-title');

        elements.forEach(element => {
            const elementPosition = element.getBoundingClientRect().top;
            const screenPosition = window.innerHeight / 1.2;

            if (elementPosition < screenPosition) {
                element.classList.add('animate__animated', 'animate__fadeInUp');
            }
        });
    };

    window.addEventListener('scroll', animateOnScroll);
    window.addEventListener('load', animateOnScroll);

    // ناوبری دسته‌بندی‌ها
    const categoriesNav = document.querySelector('.categories-nav');
    const prevBtn = document.querySelector('.category-nav-btn.prev');
    const nextBtn = document.querySelector('.category-nav-btn.next');

    prevBtn.addEventListener('click', () => {
        categoriesNav.scrollBy({
            left: -200,
            behavior: 'smooth'
        });
    });

    nextBtn.addEventListener('click', () => {
        categoriesNav.scrollBy({
            left: 200,
            behavior: 'smooth'
        });
    });

    // نمایش/پنهان کردن دکمه‌های ناوبری بر اساس موقعیت اسکرول
    categoriesNav.addEventListener('scroll', () => {
        const scrollLeft = categoriesNav.scrollLeft;
        const scrollWidth = categoriesNav.scrollWidth;
        const clientWidth = categoriesNav.clientWidth;

        prevBtn.style.display = scrollLeft > 0 ? 'flex' : 'none';
        nextBtn.style.display = scrollLeft < (scrollWidth - clientWidth - 1) ? 'flex' : 'none';
    });

    // مقداردهی اولیه دکمه‌های ناوبری
    categoriesNav.dispatchEvent(new Event('scroll'));

    // انیمیشن hover برای دکمه‌ها
    document.querySelectorAll('button, .auth-btn').forEach(btn => {
        btn.addEventListener('mouseenter', () => {
            btn.classList.add('animate__animated', 'animate__pulse');
        });

        btn.addEventListener('mouseleave', () => {
            setTimeout(() => {
                btn.classList.remove('animate__animated', 'animate__pulse');
            }, 500);
        });
    });

    // پاگیانشن
    document.querySelectorAll('.pagination-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            document.querySelectorAll('.pagination-btn').forEach(b => b.classList.remove('active'));
            this.classList.add('active');
        });
    });
</script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({ once: true });
</script>
</body>
</html>
