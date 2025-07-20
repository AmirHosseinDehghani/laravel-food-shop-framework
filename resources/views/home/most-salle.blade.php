<!DOCTYPE html>
<html lang="fa" dir="rtl" lang="en">
<head>
    <title>supermaz | سوپرمز</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link href="https://fonts.googleapis.com/css2?family=Vazir&family=Lateef&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- Local CSS files -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendor.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&family=Open+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-size: 25px;
        }

        @keyframes highlight {
            0% {
                box-shadow: 0 0 0px #ff9800;
            }
            50% {
                box-shadow: 0 0 20px #ff9800;
            }
            100% {
                box-shadow: 0 0 0px #ff9800;
            }
        }

        .product-box.highlighted {
            animation: highlight 1.5s ease-in-out infinite;
            background-color: #fff3e0;
            border-radius: 12px;
            z-index: 10;
            transition: transform 0.5s ease;
        }

        .product-box.highlighted:hover {
            transform: scale(1.03);
        }
    </style>

</head>
<body>

<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <defs>
        <symbol xmlns="http://www.w3.org/2000/svg" id="link" viewBox="0 0 24 24">
            <path fill="currentColor"
                  d="M12 19a1 1 0 1 0-1-1a1 1 0 0 0 1 1Zm5 0a1 1 0 1 0-1-1a1 1 0 0 0 1 1Zm0-4a1 1 0 1 0-1-1a1 1 0 0 0 1 1Zm-5 0a1 1 0 1 0-1-1a1 1 0 0 0 1 1Zm7-12h-1V2a1 1 0 0 0-2 0v1H8V2a1 1 0 0 0-2 0v1H5a3 3 0 0 0-3 3v14a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3V6a3 3 0 0 0-3-3Zm1 17a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-9h16Zm0-11H4V6a1 1 0 0 1 1-1h1v1a1 1 0 0 0 2 0V5h8v1a1 1 0 0 0 2 0V5h1a1 1 0 0 1 1 1ZM7 15a1 1 0 1 0-1-1a1 1 0 0 0 1 1Zm0 4a1 1 0 1 0-1-1a1 1 0 0 0 1 1Z"/>
        </symbol>
        <symbol xmlns="http://www.w3.org/2000/svg" id="arrow-right" viewBox="0 0 24 24">
            <path fill="currentColor"
                  d="M17.92 11.62a1 1 0 0 0-.21-.33l-5-5a1 1 0 0 0-1.42 1.42l3.3 3.29H7a1 1 0 0 0 0 2h7.59l-3.3 3.29a1 1 0 0 0 0 1.42a1 1 0 0 0 1.42 0l5-5a1 1 0 0 0 .21-.33a1 1 0 0 0 0-.76Z"/>
        </symbol>
        <symbol xmlns="http://www.w3.org/2000/svg" id="category" viewBox="0 0 24 24">
            <path fill="currentColor"
                  d="M19 5.5h-6.28l-.32-1a3 3 0 0 0-2.84-2H5a3 3 0 0 0-3 3v13a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3v-10a3 3 0 0 0-3-3Zm1 13a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-13a1 1 0 0 1 1-1h4.56a1 1 0 0 1 .95.68l.54 1.64a1 1 0 0 0 .95.68h7a1 1 0 0 1 1 1Z"/>
        </symbol>
        <symbol xmlns="http://www.w3.org/2000/svg" id="calendar" viewBox="0 0 24 24">
            <path fill="currentColor"
                  d="M19 4h-2V3a1 1 0 0 0-2 0v1H9V3a1 1 0 0 0-2 0v1H5a3 3 0 0 0-3 3v12a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3V7a3 3 0 0 0-3-3Zm1 15a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-7h16Zm0-9H4V7a1 1 0 0 1 1-1h2v1a1 1 0 0 0 2 0V6h6v1a1 1 0 0 0 2 0V6h2a1 1 0 0 1 1 1Z"/>
        </symbol>
        <symbol xmlns="http://www.w3.org/2000/svg" id="heart" viewBox="0 0 24 24">
            <path fill="currentColor"
                  d="M20.16 4.61A6.27 6.27 0 0 0 12 4a6.27 6.27 0 0 0-8.16 9.48l7.45 7.45a1 1 0 0 0 1.42 0l7.45-7.45a6.27 6.27 0 0 0 0-8.87Zm-1.41 7.46L12 18.81l-6.75-6.74a4.28 4.28 0 0 1 3-7.3a4.25 4.25 0 0 1 3 1.25a1 1 0 0 0 1.42 0a4.27 4.27 0 0 1 6 6.05Z"/>
        </symbol>
        <symbol xmlns="http://www.w3.org/2000/svg" id="plus" viewBox="0 0 24 24">
            <path fill="currentColor"
                  d="M19 11h-6V5a1 1 0 0 0-2 0v6H5a1 1 0 0 0 0 2h6v6a1 1 0 0 0 2 0v-6h6a1 1 0 0 0 0-2Z"/>
        </symbol>
        <symbol xmlns="http://www.w3.org/2000/svg" id="minus" viewBox="0 0 24 24">
            <path fill="currentColor" d="M19 11H5a1 1 0 0 0 0 2h14a1 1 0 0 0 0-2Z"/>
        </symbol>
        <symbol xmlns="http://www.w3.org/2000/svg" id="cart" viewBox="0 0 24 24">
            <path fill="currentColor"
                  d="M8.5 19a1.5 1.5 0 1 0 1.5 1.5A1.5 1.5 0 0 0 8.5 19ZM19 16H7a1 1 0 0 1 0-2h8.491a3.013 3.013 0 0 0 2.885-2.176l1.585-5.55A1 1 0 0 0 19 5H6.74a3.007 3.007 0 0 0-2.82-2H3a1 1 0 0 0 0 2h.921a1.005 1.005 0 0 1 .962.725l.155.545v.005l1.641 5.742A3 3 0 0 0 7 18h12a1 1 0 0 0 0-2Zm-1.326-9l-1.22 4.274a1.005 1.005 0 0 1-.963.726H8.754l-.255-.892L7.326 7ZM16.5 19a1.5 1.5 0 1 0 1.5 1.5a1.5 1.5 0 0 0-1.5-1.5Z"/>
        </symbol>
        <symbol xmlns="http://www.w3.org/2000/svg" id="check" viewBox="0 0 24 24">
            <path fill="currentColor"
                  d="M18.71 7.21a1 1 0 0 0-1.42 0l-7.45 7.46l-3.13-3.14A1 1 0 1 0 5.29 13l3.84 3.84a1 1 0 0 0 1.42 0l8.16-8.16a1 1 0 0 0 0-1.47Z"/>
        </symbol>
        <symbol xmlns="http://www.w3.org/2000/svg" id="trash" viewBox="0 0 24 24">
            <path fill="currentColor"
                  d="M10 18a1 1 0 0 0 1-1v-6a1 1 0 0 0-2 0v6a1 1 0 0 0 1 1ZM20 6h-4V5a3 3 0 0 0-3-3h-2a3 3 0 0 0-3 3v1H4a1 1 0 0 0 0 2h1v11a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V8h1a1 1 0 0 0 0-2ZM10 5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v1h-4Zm7 14a1 1 0 0 1-1 1H8a1 1 0 0 1-1-1V8h10Zm-3-1a1 1 0 0 0 1-1v-6a1 1 0 0 0-2 0v6a1 1 0 0 0 1 1Z"/>
        </symbol>
        <symbol xmlns="http://www.w3.org/2000/svg" id="star-outline" viewBox="0 0 15 15">
            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                  d="M7.5 9.804L5.337 11l.413-2.533L4 6.674l2.418-.37L7.5 4l1.082 2.304l2.418.37l-1.75 1.793L9.663 11L7.5 9.804Z"/>
        </symbol>
        <symbol xmlns="http://www.w3.org/2000/svg" id="star-solid" viewBox="0 0 15 15">
            <path fill="currentColor"
                  d="M7.953 3.788a.5.5 0 0 0-.906 0L6.08 5.85l-2.154.33a.5.5 0 0 0-.283.843l1.574 1.613l-.373 2.284a.5.5 0 0 0 .736.518l1.92-1.063l1.921 1.063a.5.5 0 0 0 .736-.519l-.373-2.283l1.574-1.613a.5.5 0 0 0-.283-.844L8.921 5.85l-.968-2.062Z"/>
        </symbol>
        <symbol xmlns="http://www.w3.org/2000/svg" id="search" viewBox="0 0 24 24">
            <path fill="currentColor"
                  d="M21.71 20.29L18 16.61A9 9 0 1 0 16.61 18l3.68 3.68a1 1 0 0 0 1.42 0a1 1 0 0 0 0-1.39ZM11 18a7 7 0 1 1 7-7a7 7 0 0 1-7 7Z"/>
        </symbol>
        <symbol xmlns="http://www.w3.org/2000/svg" id="user" viewBox="0 0 24 24">
            <path fill="currentColor"
                  d="M15.71 12.71a6 6 0 1 0-7.42 0a10 10 0 0 0-6.22 8.18a1 1 0 0 0 2 .22a8 8 0 0 1 15.9 0a1 1 0 0 0 1 .89h.11a1 1 0 0 0 .88-1.1a10 10 0 0 0-6.25-8.19ZM12 12a4 4 0 1 1 4-4a4 4 0 0 1-4 4Z"/>
        </symbol>
        <symbol xmlns="http://www.w3.org/2000/svg" id="close" viewBox="0 0 15 15">
            <path fill="currentColor"
                  d="M7.953 3.788a.5.5 0 0 0-.906 0L6.08 5.85l-2.154.33a.5.5 0 0 0-.283.843l1.574 1.613l-.373 2.284a.5.5 0 0 0 .736.518l1.92-1.063l1.921 1.063a.5.5 0 0 0 .736-.519l-.373-2.283l1.574-1.613a.5.5 0 0 0-.283-.844L8.921 5.85l-.968-2.062Z"/>
        </symbol>
        <symbol xmlns="http://www.w3.org/2000/svg" id="register" viewBox="0 0 24 24">
            <path fill="currentColor"
                  d="M12 12a5 5 0 1 0-5-5a5 5 0 0 0 5 5Zm0 2c-3.87 0-7 2.13-7 4.75V21a1 1 0 0 0 1 1h6v-2h-5v-.25c0-1.4 2.69-2.75 5-2.75s5 1.35 5 2.75V20h-2v2h3a1 1 0 0 0 1-1v-2.25C19 16.13 15.87 14 12 14Zm7-6h-2V6a1 1 0 1 1 2 0v2h2a1 1 0 1 1 0 2h-2v2a1 1 0 1 1-2 0V10h-2a1 1 0 1 1 0-2h2Z"/>
        </symbol>
        <symbol xmlns="http://www.w3.org/2000/svg" id="login" viewBox="0 0 24 24">
            <path fill="currentColor"
                  d="M10 17a1 1 0 0 1-.7-1.71L12.59 12L9.3 8.71a1 1 0 1 1 1.4-1.42l4 4a1 1 0 0 1 0 1.42l-4 4A1 1 0 0 1 10 17ZM19 19h-6a1 1 0 0 1 0-2h5V7h-5a1 1 0 0 1 0-2h6a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1Z"/>
        </symbol>
        <symbol xmlns="http://www.w3.org/2000/svg" id="home" viewBox="0 0 24 24">
            <path fill="currentColor"
                  d="M12 3l9 8h-2v9a1 1 0 0 1-1 1h-4v-6H10v6H6a1 1 0 0 1-1-1v-9H3l9-8z"/>
        </symbol>


    </defs>
</svg>

<div class="preloader-wrapper">
    <div class="preloader">
    </div>
</div>

<div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasCart" aria-labelledby="My Cart">
    <div class="offcanvas-header justify-content-center">
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    @if(!empty($baskets))
        <div class="offcanvas-body">
            <div class="order-md-last">
                <ul class="list-group mb-3">
                    @foreach($baskets as $basket)
                        @foreach($products as $product)
                            @if($product->id == $basket->product)
                                <li class="list-group-item d-flex justify-content-between lh-sm">
                                    <div>
                                        <h6 class="my-0">{{$product->name}}</h6>
                                        <small class="text-body-secondary">{{$product->description}}</small>
                                    </div>
                                    <span class="text-body-secondary">{{number_format($basket->price)}}</span>
                                </li>
                            @endif
                        @endforeach
                    @endforeach
                </ul>
                <a href="{{route('manage.basket')}}">
                    <button class="w-100 btn btn-primary btn-lg" type="submit">
                        ادامه خرید
                    </button>
                </a>
            </div>
        </div>
    @else

    @endif

</div>

<div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasSearch" aria-labelledby="Search">
    <div class="offcanvas-header justify-content-center">
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="order-md-last">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-primary">Search</span>
            </h4>
            <form role="search" action="index.html" method="get" class="d-flex mt-3 gap-0">
                <input class="form-control rounded-start rounded-0 bg-light" type="email"
                       placeholder="What are you looking for?" aria-label="What are you looking for?">
                <button class="btn btn-dark rounded-end rounded-0" type="submit">Search</button>
            </form>
        </div>
    </div>
</div>

@if(!empty(session('user')))
    <header>
        <div class="container-fluid">
            <div class="row py-3 border-bottom">

                <div class="col-sm-4 col-lg-3 text-center text-sm-start">
                    <div class="main-logo">
                        <a href="index.html">
                            <img src="{{asset('img/logo1.png')}}" alt="logo" class="img-fluid">
                        </a>
                    </div>
                </div>

                <div class="col-sm-6 offset-sm-2 offset-md-0 col-lg-5 d-none d-lg-block">
                    <form action="{{ route('products-search') }}" method="GET">
                        <div class="search-bar row bg-light p-2 my-3 rounded-4 align-items-center">
                            <div class="col-10">
                                <input name="name" type="text" class="form-control border-0 bg-transparent"
                                       placeholder="نام محصول را وارد کنید..." autocomplete="off"/>
                            </div>
                            <div class="col-2 d-flex align-items-center justify-content-end">
                                <button type="submit" class="btn p-0 bg-transparent border-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                              d="M21.71 20.29L18 16.61A9 9 0 1 0 16.61 18l3.68 3.68a1 1 0 0 0 1.42 0a1 1 0 0 0 0-1.39ZM11 18a7 7 0 1 1 7-7a7 7 0 0 1-7 7Z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <div
                    class="col-sm-8 col-lg-4 d-flex justify-content-end gap-5 align-items-center mt-4 mt-sm-0 justify-content-center justify-content-sm-end">




                    <div class="cart text-end d-none d-lg-block dropdown">
                        <button class="border-0 bg-transparent d-flex flex-column gap-2 lh-1" type="button"
                                data-bs-toggle="offcanvas" data-bs-target="#offcanvasCart"
                                aria-controls="offcanvasCart">
                            <span class="fs-6 text-muted dropdown-toggle">سبد خرید شما</span>

                        </button>
                    </div>
                    <ul class="d-flex justify-content-end list-unstyled m-0">
                        <li>
                            <a href="{{route('dashboard')}}" class="rounded-circle bg-light p-2 mx-1">
                                <svg width="24" height="24" viewBox="0 0 24 24">
                                    <use xlink:href="#home"></use>
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('logout')}}" class="rounded-circle bg-light p-2 mx-1">
                                <svg width="24" height="24" viewBox="0 0 24 24">
                                    <use xlink:href="#login"></use>
                                </svg>
                            </a>
                        </li>
                        <li class="d-lg-none">
                            <a href="#" class="rounded-circle bg-light p-2 mx-1" data-bs-toggle="offcanvas"
                               data-bs-target="#offcanvasCart" aria-controls="offcanvasCart">
                                <svg width="24" height="24" viewBox="0 0 24 24">
                                    <use xlink:href="#cart"></use>
                                </svg>
                            </a>
                        </li>
                        <li class="d-lg-none">
                            <a href="#" class="rounded-circle bg-light p-2 mx-1" data-bs-toggle="offcanvas"
                               data-bs-target="#offcanvasSearch" aria-controls="offcanvasSearch">
                                <svg width="24" height="24" viewBox="0 0 24 24">
                                    <use xlink:href="#search"></use>
                                </svg>
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
        <div class="container-fluid">
            <div class="row py-3">
                <div class="d-flex  justify-content-center justify-content-sm-between align-items-center">
                    <nav class="main-menu d-flex navbar navbar-expand-lg">

                        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvasNavbar"
                                aria-controls="offcanvasNavbar">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                             aria-labelledby="offcanvasNavbarLabel">

                            <div class="offcanvas-header justify-content-center">
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                        aria-label="Close"></button>
                            </div>

                            <div class="offcanvas-body">
                                <ul class="navbar-nav justify-content-end menu-list list-unstyled d-flex gap-md-3 mb-0">
                                    <li class="nav-item active">
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" role="button" id="pages"
                                           data-bs-toggle="dropdown" aria-expanded="false">صفحه ها</a>
                                        <ul class="dropdown-menu" aria-labelledby="pages">
                                            <li><a href="{{route('home')}}" class="dropdown-item">صفحه اصلی </a></li>
                                            <li><a href="index.html" class="dropdown-item">ورود </a></li>
                                            <li><a href="index.html" class="dropdown-item">ثبت نام </a></li>
                                            <li><a href="index.html" class="dropdown-item">قوانین </a></li>
                                            <li><a href="index.html" class="dropdown-item">بلاگ ها</a></li>
                                        </ul>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{route('most-salle')}}" class="nav-link">پرفروش ها</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('most-off')}}" class="nav-link">فروش شگفت انگیز</a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="#brand" class="nav-link">قوانین</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#brand" class="nav-link">درباره ما</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#blog" class="nav-link">بلاگ ها</a>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        </div>
    </header>


@else
    <header>
        <div class="container-fluid">
            <div class="row py-3 border-bottom align-items-center">
                <div class="col-lg-3 text-center text-lg-start mb-2 mb-lg-0">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('img/logo1.png') }}" alt="logo" class="img-fluid" style="max-height: 50px;">
                    </a>
                </div>

                <div class="col-sm-8 col-md-8 col-lg-6 mx-auto">
                    <form action="{{ route('products-search') }}" method="GET">
                        <div class="search-bar row bg-light p-2 my-3 rounded-4 align-items-center">
                            <div class="col-10">
                                <input name="name" type="text" class="form-control border-0 bg-transparent"
                                       placeholder="نام محصول را وارد کنید..." autocomplete="off"/>
                            </div>
                            <div class="col-2 d-flex align-items-center justify-content-end">
                                <button type="submit" class="btn p-0 bg-transparent border-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                              d="M21.71 20.29L18 16.61A9 9 0 1 0 16.61 18l3.68 3.68a1 1 0 0 0 1.42 0a1 1 0 0 0 0-1.39ZM11 18a7 7 0 1 1 7-7a7 7 0 0 1-7 7Z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>


                <div class="col-lg-3 d-flex justify-content-end align-items-center">
                    <a href="{{ route('register') }}" class="rounded-circle bg-light p-2 mx-1" title="ثبت‌نام">
                        <svg width="24" height="24" viewBox="0 0 24 24">
                            <use xlink:href="#user"></use>
                        </svg>
                    </a>
                    <a href="{{ route('login') }}" class="rounded-circle bg-light p-2 mx-1" title="ورود">
                        <svg width="24" height="24" viewBox="0 0 24 24">
                            <use xlink:href="#login"></use>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row py-3">
                <div class="d-flex  justify-content-center justify-content-sm-between align-items-center">
                    <nav class="main-menu d-flex navbar navbar-expand-lg">

                        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvasNavbar"
                                aria-controls="offcanvasNavbar">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                             aria-labelledby="offcanvasNavbarLabel">

                            <div class="offcanvas-header justify-content-center">
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                        aria-label="Close"></button>
                            </div>

                            <div class="offcanvas-body">
                                <ul class="navbar-nav justify-content-end menu-list list-unstyled d-flex gap-md-3 mb-0">
                                    <li class="nav-item active">
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" role="button" id="pages"
                                           data-bs-toggle="dropdown" aria-expanded="false">صفحه ها</a>
                                        <ul class="dropdown-menu" aria-labelledby="pages">
                                            <li><a href="{{route('home')}}" class="dropdown-item">صفحه اصلی </a></li>
                                            <li><a href="index.html" class="dropdown-item">ورود </a></li>
                                            <li><a href="index.html" class="dropdown-item">ثبت نام </a></li>
                                            <li><a href="index.html" class="dropdown-item">قوانین </a></li>
                                            <li><a href="index.html" class="dropdown-item">بلاگ ها</a></li>
                                        </ul>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{route('most-salle')}}" class="nav-link">پرفروش ها</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('most-off')}}" class="nav-link">فروش شگفت انگیز</a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="#brand" class="nav-link">قوانین</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#brand" class="nav-link">درباره ما</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#blog" class="nav-link">بلاگ ها</a>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>


@endif

<section class="py-5 overflow-hidden">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="section-header d-flex flex-wrap justify-content-between mb-5">
                    <h2 class="section-title">خرید بر اساس دسته بندی</h2>

                    <div class="d-flex align-items-center">
                        <div class="swiper-buttons">
                            <button class="swiper-prev category-carousel-prev btn btn-yellow">❮</button>
                            <button class="swiper-next category-carousel-next btn btn-yellow">❯</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">

                <div class="category-carousel swiper">
                    <div class="swiper-wrapper">
                        @foreach($categories as $category)
                            <a href="{{route('category', $category->id)}}" class="nav-link category-item swiper-slide">
                                <img style="height: 70px ; width: 70px" src="{{asset('img/category.png')}}" alt="Category Thumbnail">
                                <h3 class="category-title">{{$category->name}}</h3>
                            </a>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>


<section class="py-5">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">

                <div class="bootstrap-tabs product-tabs">
                    <div class="tabs-header d-flex justify-content-between border-bottom my-5">
                        <h2 class="section-title">محصولات پرفروش</h2>
                    </div>

                    <div class="tab-content" id="nav-tabContent">
                        <!-- All products tab -->
                        <div class="tab-pane fade show active" id="nav-all" role="tabpanel"
                             aria-labelledby="nav-all-tab">

                            <div
                                class="product-grid row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
                                @foreach($products as $product)


                                        <div class="col product-box" data-name="{{ $product->name }}"
                                             id="product-{{ $product->id }}">
                                            <div class="product-item">
                                                @if(!empty($product->off))
                                                    <span class="badge bg-success position-absolute m-3">{{ $product->off }}%</span>
                                                @endif
                                                <figure>
                                                    <a href="#" title="Product Title">
                                                        <img style="width: 205px; height: 210px"
                                                             src="{{ asset("storage/$product->url") }}"
                                                             class="tab-image">
                                                    </a>
                                                </figure>
                                                <h3>{{ $product->name }}</h3>
                                                <span class="price">{{ number_format($product->price) }} تومان</span>
                                                @if($product->type == 'kilo')
                                                    <span class="price">کیلویی</span>
                                                @else
                                                    <span class="price">بسته‌ای</span>
                                                @endif
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <a href="{{route('product-info',$product->id)}}">
                                                            <button class="btn btn-dark text-uppercase">افزودن به سبد خرید</button>
                                                        </a>
                                                    </div>
                                            </div>
                                        </div>

                                @endforeach
                            </div>
                        </div>

                        <!-- Category-specific tabs -->
                        @foreach($categories as $category)
                            <div class="tab-pane fade" id="nav-cat-{{ $category->id }}" role="tabpanel"
                                 aria-labelledby="nav-cat-{{ $category->id }}-tab">
                                <div
                                    class="product-grid row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
                                    @foreach($products as $product)
                                        @if($product->category == $category->id)

                                                <div class="col product-box" data-name="{{ $product->name }}"
                                                     id="product-{{ $product->id }}">

                                                    <div class="product-item">
                                                        @if(!empty($product->off))
                                                            <span class="badge bg-success position-absolute m-3">{{ $product->off }}%</span>
                                                        @endif
                                                        <figure>
                                                            <a href="#" title="Product Title">
                                                                <img style="width: 205px; height: 210px"
                                                                     src="{{ asset("storage/$product->url") }}"
                                                                     class="tab-image">
                                                            </a>
                                                        </figure>
                                                        <h3>{{ $product->name }}</h3>
                                                        <span
                                                            class="price">{{ number_format($product->price) }} تومان</span>
                                                        @if($product->type == 'kilo')
                                                            <span class="price">کیلویی</span>
                                                        @else
                                                            <span class="price">بسته‌ای</span>
                                                        @endif
                                                            <div class="d-flex align-items-center justify-content-between">
                                                                <a href="{{route('product-info',$product->id)}}">
                                                                    <button class="btn btn-dark text-uppercase">افزودن به سبد خرید</button>
                                                                </a>
                                                            </div>
                                                    </div>
                                                </div>

                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>





<section class="py-5" dir="rtl">
    <div class="container-fluid">
        <div class="row row-cols-1 row-cols-sm-3 row-cols-lg-5 text-end">
            <div class="col">
                <div class="card mb-3 border-0">
                    <div class="row">
                        <div class="col-md-2 text-dark">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                      d="M21.5 15a3 3 0 0 0-1.9-2.78l1.87-7a1 1 0 0 0-.18-.87A1 1 0 0 0 20.5 4H6.8l-.33-1.26A1 1 0 0 0 5.5 2h-2v2h1.23l2.48 9.26a1 1 0 0 0 1 .74H18.5a1 1 0 0 1 0 2h-13a1 1 0 0 0 0 2h1.18a3 3 0 1 0 5.64 0h2.36a3 3 0 1 0 5.82 1a2.94 2.94 0 0 0-.4-1.47A3 3 0 0 0 21.5 15Zm-3.91-3H9L7.34 6H19.2ZM9.5 20a1 1 0 1 1 1-1a1 1 0 0 1-1 1Zm8 0a1 1 0 1 1 1-1a1 1 0 0 1-1 1Z"/>
                            </svg>
                        </div>
                        <div class="col-md-10">
                            <div class="card-body p-0">
                                <h5>ارسال رایگان</h5>
                                <p class="card-text">ارسال رایگان برای تمام سفارش‌ها در سراسر کشور.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card mb-3 border-0">
                    <div class="row">
                        <div class="col-md-2 text-dark">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                      d="M19.63 3.65a1 1 0 0 0-.84-.2a8 8 0 0 1-6.22-1.27a1 1 0 0 0-1.14 0a8 8 0 0 1-6.22 1.27a1 1 0 0 0-.84.2a1 1 0 0 0-.37.78v7.45a9 9 0 0 0 3.77 7.33l3.65 2.6a1 1 0 0 0 1.16 0l3.65-2.6A9 9 0 0 0 20 11.88V4.43a1 1 0 0 0-.37-.78ZM18 11.88a7 7 0 0 1-2.93 5.7L12 19.77l-3.07-2.19A7 7 0 0 1 6 11.88v-6.3a10 10 0 0 0 6-1.39a10 10 0 0 0 6 1.39Zm-4.46-2.29l-2.69 2.7l-.89-.9a1 1 0 0 0-1.42 1.42l1.6 1.6a1 1 0 0 0 1.42 0L15 11a1 1 0 0 0-1.42-1.42Z"/>
                            </svg>
                        </div>
                        <div class="col-md-10">
                            <div class="card-body p-0">
                                <h5>پرداخت ۱۰۰٪ امن</h5>
                                <p class="card-text">پرداخت‌های شما با اطمینان کامل انجام می‌شود.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card mb-3 border-0">
                    <div class="row">
                        <div class="col-md-2 text-dark">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                      d="M22 5H2a1 1 0 0 0-1 1v4a3 3 0 0 0 2 2.82V22a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1v-9.18A3 3 0 0 0 23 10V6a1 1 0 0 0-1-1Zm-7 2h2v3a1 1 0 0 1-2 0Zm-4 0h2v3a1 1 0 0 1-2 0ZM7 7h2v3a1 1 0 0 1-2 0Zm-3 4a1 1 0 0 1-1-1V7h2v3a1 1 0 0 1-1 1Zm10 10h-4v-2a2 2 0 0 1 4 0Zm5 0h-3v-2a4 4 0 0 0-8 0v2H5v-8.18a3.17 3.17 0 0 0 1-.6a3 3 0 0 0 4 0a3 3 0 0 0 4 0a3 3 0 0 0 4 0a3.17 3.17 0 0 0 1 .6Zm2-11a1 1 0 0 1-2 0V7h2ZM4.3 3H20a1 1 0 0 0 0-2H4.3a1 1 0 0 0 0 2Z"/>
                            </svg>
                        </div>
                        <div class="col-md-10">
                            <div class="card-body p-0">
                                <h5>تضمین کیفیت</h5>
                                <p class="card-text">محصولات با بهترین کیفیت و استاندارد ارائه می‌شوند.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card mb-3 border-0">
                    <div class="row">
                        <div class="col-md-2 text-dark">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                      d="M12 8.35a3.07 3.07 0 0 0-3.54.53a3 3 0 0 0 0 4.24L11.29 16a1 1 0 0 0 1.42 0l2.83-2.83a3 3 0 0 0 0-4.24A3.07 3.07 0 0 0 12 8.35Zm2.12 3.36L12 13.83l-2.12-2.12a1 1 0 0 1 0-1.42a1 1 0 0 1 1.41 0a1 1 0 0 0 1.42 0a1 1 0 0 1 1.41 0a1 1 0 0 1 0 1.42ZM12 2A10 10 0 0 0 2 12a9.89 9.89 0 0 0 2.26 6.33l-2 2a1 1 0 0 0-.21 1.09A1 1 0 0 0 3 22h9a10 10 0 0 0 0-20Zm0 18H5.41l.93-.93a1 1 0 0 0 0-1.41A8 8 0 1 1 12 20Z"/>
                            </svg>
                        </div>
                        <div class="col-md-10">
                            <div class="card-body p-0">
                                <h5>تضمین صرفه‌جویی</h5>
                                <p class="card-text">همیشه با قیمت‌های اقتصادی خرید کنید.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card mb-3 border-0">
                    <div class="row">
                        <div class="col-md-2 text-dark">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                      d="M18 7h-.35A3.45 3.45 0 0 0 18 5.5a3.49 3.49 0 0 0-6-2.44A3.49 3.49 0 0 0 6 5.5A3.45 3.45 0 0 0 6.35 7H6a3 3 0 0 0-3 3v2a1 1 0 0 0 1 1h1v6a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3v-6h1a1 1 0 0 0 1-1v-2a3 3 0 0 0-3-3Zm-7 13H8a1 1 0 0 1-1-1v-6h4Zm0-9H5v-1a1 1 0 0 1 1-1h5Zm0-4H9.5A1.5 1.5 0 1 1 11 5.5Zm2-1.5A1.5 1.5 0 1 1 14.5 7H13ZM17 19a1 1 0 0 1-1 1h-3v-7h4Zm2-8h-6V9h5a1 1 0 0 1 1 1Z"/>
                            </svg>
                        </div>
                        <div class="col-md-10">
                            <div class="card-body p-0">
                                <h5>پیشنهادهای روزانه</h5>
                                <p class="card-text">هر روز با تخفیف‌های ویژه ما شگفت‌زده شوید.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>



<div id="footer-bottom">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 copyright">
                <p>طراحی شده توسط امیر حسین دهقانی</p>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/jquery-1.11.0.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
<script src="{{ asset('js/plugins.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>



</body>
</html>


