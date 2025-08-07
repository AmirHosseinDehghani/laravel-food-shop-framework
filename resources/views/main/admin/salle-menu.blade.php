!doctype html>
<html lang="en">
<head>



    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Tiny Dashboard - A Bootstrap Dashboard Template</title>
    <!-- Simple bar CSS -->
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

    <link rel="stylesheet" href="{{ asset('css/app-light.css') }}" id="lightTheme">
    <link rel="stylesheet" href="{{ asset('css/app-dark.css') }}" id="darkTheme" disabled>
    <link rel="stylesheet" href="{{ asset('css/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dropzone.css') }}">
    <link rel="stylesheet" href="{{ asset('css/uppy.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.steps.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.timepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('css/quill.snow.css') }}">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="{{ asset('css/daterangepicker.css') }}">
    <!-- App CSS -->
    <link rel="stylesheet" href="{{ asset('css/app-light.css') }}" id="lightTheme" >
    <link rel="stylesheet" href="{{ asset('css/app-dark.css') }}" id="darkTheme" disabled>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: "Rubik", sans-serif;
            font-size: 24px ;

        }
        option{
            font-size: 20px;

        }
        .error-container {
            position: relative;
            overflow: hidden;
        }
        .alert-autoclose {
            border-right: 4px solid #f46a6a;
            transition: all 0.5s ease;
        }
        .alert-autoclose.hide {
            opacity: 0;
            max-height: 0;
            padding: 0;
            margin: 0;
            border: 0;
        }
        .persian-list {
            list-style-type: persian;
            padding-right: 20px;
        }
        .fade-in {
            animation: fadeIn 0.5s;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body class="vertical  dark rtl ">
<nav class="topnav navbar navbar-light">
    <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
        <i class="fe fe-menu navbar-toggler-icon"></i>
    </button>


</nav>

<aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
    <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
        <i class="fe fe-x"><span class="sr-only"></span></i>
    </a>
    <nav class="vertnav navbar navbar-light">
        <!-- nav bar -->
        <div class="w-100 mb-4 d-flex">
            <img src="{{ asset('img/logo.jpg') }}" alt="Logo" style="width: 125px; height: 125px;">
        </div>
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item">
                <a class="nav-link pl-3" href="{{ route('dashboard') }}"><i class="fe fe-home fe-16"></i>
                    <span class="ml-3 item-text">داشبورد</span>
                </a>
            </li>
        </ul>

        <p class="text-muted nav-heading mt-4 mb-1">
            <span>مدیریت</span>
        </p>
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
                <a href="{{ route('Ad.shop.manage') }}"  class=" nav-link">
                    <i class="fe fe-settings fe-16"></i>
                    <span class="ml-3 item-text">مدیریت فروشگاه ها</span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a href="{{ route('admin.order') }}"  class=" nav-link">
                    <i class="fe fe-settings fe-16"></i>
                    <span class="ml-3 item-text">مدیریت سفارشات</span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a href="{{ route('manage-comment') }}"  class=" nav-link">
                    <i class="fe fe-settings fe-16"></i>
                    <span class="ml-3 item-text">مدیریت محصولات</span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a href="{{ route('ticket.manage') }}"  class=" nav-link">
                    <i class="fe fe-settings fe-16"></i>
                    <span class="ml-3 item-text"> تیکت ها</span>
                </a>
            </li>
        </ul>


        <p class="text-muted nav-heading mt-4 mb-1">
            <span>حساب کاربری</span>
        </p>
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
                <a href="{{route('profile')}}"  class=" nav-link">
                    <i class="fe fe-user fe-16"></i>
                    <span class="ml-3 item-text">پروفایل</span>
                </a>

            </li>
            <li class="nav-item w-100">
                <a class="nav-link" href="{{ route('logout') }}">
                    <i class="fe fe-log-out fe-16"></i>
                    <span class="ml-3 item-text">خروج از حساب</span>
                </a>
            </li>

        </ul>

    </nav>
</aside>

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/moment.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/simplebar.min.js') }}"></script>
<script src="{{ asset('js/daterangepicker.js') }}"></script>
<script src="{{ asset('js/jquery.stickOnScroll.js') }}"></script>
<script src="{{ asset('js/tinycolor-min.js') }}"></script>
<script src="{{ asset('js/config.js') }}"></script>
<script src="{{ asset('js/d3.min.js') }}"></script>
<script src="{{ asset('js/topojson.min.js') }}"></script>
<script src="{{ asset('js/datamaps.all.min.js') }}"></script>
<script src="{{ asset('js/datamaps-zoomto.js') }}"></script>
<script src="{{ asset('js/datamaps.custom.js') }}"></script>
<script src="{{ asset('js/Chart.min.js') }}"></script>
<script>
    /* defind global options */
    Chart.defaults.global.defaultFontFamily = base.defaultFontFamily;
    Chart.defaults.global.defaultFontColor = colors.mutedColor;
</script>
<script src="{{ asset('js/gauge.min.js') }}"></script>
<script src="{{ asset('js/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('js/apexcharts.min.js') }}"></script>
<script src="{{ asset('js/apexcharts.custom.js') }}"></script>
<script src="{{ asset('js/jquery.mask.min.js') }}"></script>
<script src="{{ asset('js/select2.min.js') }}"></script>
<script src="{{ asset('js/jquery.steps.min.js') }}"></script>
<script src="{{ asset('js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/jquery.timepicker.js') }}"></script>
<script src="{{ asset('js/dropzone.min.js') }}"></script>
<script src="{{ asset('js/uppy.min.js') }}"></script>
<script src="{{ asset('js/quill.min.js') }}"></script>
<script>
    $('.select2').select2(
        {
            theme: 'bootstrap4',
        });
    $('.select2-multi').select2(
        {
            multiple: true,
            theme: 'bootstrap4',
        });
    $('.drgpicker').daterangepicker(
        {
            singleDatePicker: true,
            timePicker: false,
            showDropdowns: true,
            locale:
                {
                    format: 'MM/DD/YYYY'
                }
        });
    $('.time-input').timepicker(
        {
            'scrollDefault': 'now',
            'zindex': '9999' /* fix modal open */
        });
    /** date range picker */
    if ($('.datetimes').length)
    {
        $('.datetimes').daterangepicker(
            {
                timePicker: true,
                startDate: moment().startOf('hour'),
                endDate: moment().startOf('hour').add(32, 'hour'),
                locale:
                    {
                        format: 'M/DD hh:mm A'
                    }
            });
    }
    var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end)
    {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }
    $('#reportrange').daterangepicker(
        {
            startDate: start,
            endDate: end,
            ranges:
                {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                }
        }, cb);
    cb(start, end);
    $('.input-placeholder').mask("00/00/0000",
        {
            placeholder: "__/__/____"
        });
    $('.input-zip').mask('00000-000',
        {
            placeholder: "____-___"
        });
    $('.input-money').mask("#.##0,00",
        {
            reverse: true
        });
    $('.input-phoneus').mask('(000) 000-0000');
    $('.input-mixed').mask('AAA 000-S0S');
    $('.input-ip').mask('0ZZ.0ZZ.0ZZ.0ZZ',
        {
            translation:
                {
                    'Z':
                        {
                            pattern: /[0-9]/,
                            optional: true
                        }
                },
            placeholder: "___.___.___.___"
        });
    // editor
    var editor = document.getElementById('editor');
    if (editor)
    {
        var toolbarOptions = [
            [
                {
                    'font': []
                }],
            [
                {
                    'header': [1, 2, 3, 4, 5, 6, false]
                }],
            ['bold', 'italic', 'underline', 'strike'],
            ['blockquote', 'code-block'],
            [
                {
                    'header': 1
                },
                {
                    'header': 2
                }],
            [
                {
                    'list': 'ordered'
                },
                {
                    'list': 'bullet'
                }],
            [
                {
                    'script': 'sub'
                },
                {
                    'script': 'super'
                }],
            [
                {
                    'indent': '-1'
                },
                {
                    'indent': '+1'
                }], // outdent/indent
            [
                {
                    'direction': 'rtl'
                }], // text direction
            [
                {
                    'color': []
                },
                {
                    'background': []
                }], // dropdown with defaults from theme
            [
                {
                    'align': []
                }],
            ['clean'] // remove formatting button
        ];
        var quill = new Quill(editor,
            {
                modules:
                    {
                        toolbar: toolbarOptions
                    },
                theme: 'snow'
            });
    }
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function()
    {
        'use strict';
        window.addEventListener('load', function()
        {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form)
            {
                form.addEventListener('submit', function(event)
                {
                    if (form.checkValidity() === false)
                    {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>
<script>
    var uptarg = document.getElementById('drag-drop-area');
    if (uptarg)
    {
        var uppy = Uppy.Core().use(Uppy.Dashboard,
            {
                inline: true,
                target: uptarg,
                proudlyDisplayPoweredByUppy: false,
                theme: 'dark',
                width: 770,
                height: 210,
                plugins: ['Webcam']
            }).use(Uppy.Tus,
            {
                endpoint: 'https://master.tus.io/files/'
            });
        uppy.on('complete', (result) =>
        {
            console.log('Upload complete! We’ve uploaded these files:', result.successful)
        });
    }
</script>
<script src="js/apps.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag()
    {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'UA-56159088-1');
</script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
<script>
    // فعال سازی آیکون‌ها
    feather.replace();

    // تابع بستن خطاها
    function dismissError() {
        const errorAlert = document.getElementById('error-alert');
        if (errorAlert) {
            errorAlert.classList.add('hide');
            setTimeout(() => errorAlert.remove(), 500);
        }
    }

    // بستن خودکار پس از 10 ثانیه
    document.addEventListener('DOMContentLoaded', function() {
        const errorAlert = document.getElementById('error-alert');
        if (errorAlert) {
            setTimeout(() => {
                errorAlert.classList.add('hide');
                setTimeout(() => errorAlert.remove(), 500);
            }, 10000);
        }

        // بستن پیام‌های موفقیت
        const successAlerts = document.querySelectorAll('.auto-dismiss');
        successAlerts.forEach(alert => {
            setTimeout(() => {
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 500);
            }, 5000);
        });
    });
</script>
<script>
    // Auto-dismiss alert after 5 seconds
    document.addEventListener('DOMContentLoaded', function() {
        const alerts = document.querySelectorAll('.auto-dismiss');

        alerts.forEach(alert => {
            setTimeout(() => {
                alert.style.transition = 'opacity 0.5s ease-out';
                alert.style.opacity = '0';

                setTimeout(() => {
                    alert.remove();
                }, 500);
            }, 5000);
        });
    });
</script>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function() {
        // داده‌های استان‌ها و شهرهای ایران
        const iranData = [
            { id: 1, name: "آذربایجان شرقی", cities: ["تبریز", "مراغه", "مرند", "اهر", "میانه", "بناب", "اسکو", "آذرشهر", "سراب", "هشترود", "بستان‌آباد", "شبستر", "هریس", "جلفا", "کلیبر", "چاراویماق", "عجب‌شیر", "ملکان", "ورزقان", "آقکند"] },
            { id: 2, name: "آذربایجان غربی", cities: ["ارومیه", "خوی", "مهاباد", "میاندوآب", "سلماس", "پیرانشهر", "ماکو", "شاهین‌دژ", "بوکان", "نقده", "سردشت", "تکاب", "چالدران", "اشنویه", "پلدشت", "چایپاره", "شوط", "کشاورز", "مهاباد", "میاندوآب"] },
            { id: 3, name: "اردبیل", cities: ["اردبیل", "پارس‌آباد", "خلخال", "مشگین‌شهر", "گرمی", "نمین", "نیر", "کوثر", "سرعین", "گیوی", "اصلاندوز", "بیله‌سوار", "انگوت", "تازه‌کند", "رضی", "هیر", "لاهرود", "مرادلو", "قصابه", "فخرآباد"] },
            { id: 4, name: "اصفهان", cities: ["اصفهان", "کاشان", "خمینی‌شهر", "شاهین‌شهر", "نجف‌آباد", "آران و بیدگل", "گلپایگان", "خوانسار", "سمیرم", "دهاقان", "مبارکه", "نائین", "تیران و کرون", "فریدون‌شهر", "اردستان", "زواره", "برخوار", "چادگان", "خور و بیابانک", "باغ‌بهادران"] },
            { id: 5, name: "البرز", cities: ["کرج", "هشتگرد", "نظرآباد", "طالقان", "ساوجبلاغ", "اشتهارد", "فردیس", "ماهدشت", "مشکین‌دشت", "کوهسار", "گرمدره", "محمدشهر", "تنکمان", "آسارا", "چهارباغ", "شهر جدید هشتگرد", "کمال‌شهر", "گلسار", "مشکین‌آباد", "نصیرشهر"] },
            { id: 6, name: "ایلام", cities: ["ایلام", "ایوان", "آبدانان", "دهلران", "دره‌شهر", "مهران", "چرداول", "ملکشاهی", "بدره", "سیروان", "زرین‌آباد", "آسمان‌آباد", "موسیان", "سرابله", "لومار", "توحید", "صالح‌آباد", "مهر", "ارکواز", "چوار"] },
            { id: 7, name: "بوشهر", cities: ["بوشهر", "برازجان", "خارک", "گناوه", "دیر", "کنگان", "جم", "تنگستان", "دشتستان", "دشتی", "عسلویه", "خورموج", "اهرم", "سعدآباد", "دیلم", "بندر ریگ", "بندر دیر", "بندر کنگان", "بندر گناوه", "بندر ریگ"] },
            { id: 8, name: "تهران", cities: ["تهران", "اسلام‌شهر", "شهریار", "رباط‌کریم", "پاکدشت", "قدس", "ورامین", "شهرری", "دماوند", "فیروزکوه", "پردیس", "قرچک", "ملارد", "بومهن", "پیشوا", "کهریزک", "صالح‌آباد", "جوادآباد", "آبسرد", "آبعلی"] },
            { id: 9, name: "چهارمحال و بختیاری", cities: ["شهرکرد", "بروجن", "فارسان", "لردگان", "اردل", "کوهرنگ", "سامان", "بن", "کیار", "نافچ", "گندمان", "فرخ‌شهر", "باباحیدر", "دستنا", "سورشجان", "صمصامی", "شلمزار", "هفشجان", "چلگرد", "سرخون"] },
            { id: 10, name: "خراسان جنوبی", cities: ["بیرجند", "قائن", "فردوس", "نهبندان", "سرایان", "سربیشه", "درمیان", "خوسف", "زیرکوه", "طبس", "فردوس", "قائنات", "نهبندان", "بشرویه", "خضری", "دشت بیاض", "اسدیه", "آیسک", "حاجی‌آباد", "مود"] },
            { id: 11, name: "خراسان رضوی", cities: ["مشهد", "نیشابور", "سبزوار", "تربت حیدریه", "کاشمر", "تایباد", "قوچان", "سرخس", "فریمان", "خواف", "درگز", "چناران", "گناباد", "بردسکن", "فیروزه", "بجستان", "رشتخوار", "زاوه", "مه ولات", "باخرز"] },
            { id: 12, name: "خراسان شمالی", cities: ["بجنورد", "شیروان", "اسفراین", "فاروج", "گرمه", "جاجرم", "مانه و سملقان", "راز و جرگلان", "پیشقلعه", "حصارگرمه", "سنخواست", "شوقان", "لوجلی", "تیتکانلو", "فارسان", "آشخانه", "قاضی", "درق", "زیارت", "توی"] },
            { id: 13, name: "خوزستان", cities: ["اهواز", "دزفول", "آبادان", "خرمشهر", "بهبهان", "اندیمشک", "شوش", "شوشتر", "مسجد سلیمان", "ایذه", "رامهرمز", "باغ‌ملک", "هفتکل", "رامشیر", "بندر ماهشهر", "امیدیه", "هویزه", "لالی", "اندیکا", "حمیدیه"] },
            { id: 14, name: "زنجان", cities: ["زنجان", "ابهر", "خدابنده", "خرمدره", "طارم", "ماه‌نشان", "سلطانیه", "ایجرود", "آب‌بر", "قیدار", "زرین‌آباد", "سجاس", "سهرورد", "نیک‌پی", "حلب", "دندی", "گرماب", "چورزق", "آب‌بر", "زرین‌رود"] },
            { id: 15, name: "سمنان", cities: ["سمنان", "شاهرود", "دامغان", "گرمسار", "مهدی‌شهر", "آرادان", "سرخه", "میامی", "بیارجمند", "شهمیرزاد", "کلاته", "مجن", "رودیان", "دیباج", "بسطام", "ایوانکی", "آرادان", "سرخه", "میامی", "بیارجمند"] },
            { id: 16, name: "سیستان و بلوچستان", cities: ["زاهدان", "زابل", "چابهار", "خاش", "ایرانشهر", "سراوان", "نیک‌شهر", "میرجاوه", "سرباز", "دلگان", "زهک", "هامون", "کنارک", "قصرقند", "فنوج", "بمپور", "هیدوچ", "راسک", "سوران", "پیشین"] },
            { id: 17, name: "فارس", cities: ["شیراز", "مرودشت", "کازرون", "جهرم", "فسا", "داراب", "لارستان", "سپیدان", "فراشبند", "نورآباد", "اقلید", "استهبان", "قیر و کارزین", "بوانات", "خرامه", "خنج", "گراش", "کوار", "زرقان", "سروستان"] },
            { id: 18, name: "قزوین", cities: ["قزوین", "تاکستان", "آبیک", "بوئین‌زهرا", "البرز", "آوج", "رودبار", "محمودآباد", "شال", "اسفرورین", "خرمدشت", "سگزآباد", "معلم‌کلایه", "سیردان", "خاکعلی", "آبگرم", "ارداق", "بویین‌زهرا", "دانسفهان", "سعدی‌شهر"] },
            { id: 19, name: "قم", cities: ["قم", "جعفریه", "دستجرد", "سلفچگان", "قنوات", "کهک", "نوفل‌لوشاتو", "خلجستان", "سامان", "کهندان", "قاهان", "دستگرد", "جعفرآباد", "سیرو", "قمرود", "کوه‌مره", "نیمور", "سلفچگان", "قنوات", "کهک"] },
            { id: 20, name: "کردستان", cities: ["سنندج", "سقز", "مریوان", "بانه", "بیجار", "دهگلان", "کامیاران", "قروه", "دیواندره", "سروآباد", "زرینه", "اورامان", "کانی‌سور", "یاسوکند", "شویشه", "برده‌رشه", "پیرتاج", "چناره", "دلبران", "کانی‌دینار"] },
            { id: 21, name: "کرمان", cities: ["کرمان", "رفسنجان", "جیرفت", "بافت", "سیرجان", "بم", "کهنوج", "زرند", "شهربابک", "راور", "منوجان", "قلعه‌گنج", "عنبرآباد", "رودبار", "فهرج", "نرماشیر", "ریگان", "رابر", "خانوک", "کوهبنان"] },
            { id: 22, name: "کرمانشاه", cities: ["کرمانشاه", "اسلام‌آباد غرب", "پاوه", "هرسین", "کنگاور", "سنقر", "جوانرود", "گیلانغرب", "سرپل ذهاب", "قصرشیرین", "روانسر", "ثلاث باباجانی", "دالاهو", "صحنه", "شاهو", "نودشه", "کرند", "باینگان", "سطر", "میان‌راهان"] },
            { id: 23, name: "کهگیلویه و بویراحمد", cities: ["یاسوج", "گچساران", "دنا", "سی‌سخت", "لنده", "بویراحمد", "چرام", "باشت", "پاتاوه", "مارگون", "سوق", "دیشموک", "لیکک", "سپیدار", "چیتاب", "گراب", "مادوان", "سرفاریاب", "قلعه‌رییسی", "کاکان"] },
            { id: 24, name: "گلستان", cities: ["گرگان", "گنبد کاووس", "علی‌آباد", "مینودشت", "ترکمن", "کردکوی", "بندر گز", "آق‌قلا", "رامیان", "آزادشهر", "گالیکش", "کلاله", "مراوه‌تپه", "نوده‌خاندوز", "اینچه‌برون", "فاضل‌آباد", "سیمین‌شهر", "جلین", "نوکنده", "انبارآلوم"] },
            { id: 25, name: "گیلان", cities: ["رشت", "انزلی", "لاهیجان", "لنگرود", "آستارا", "تالش", "رودسر", "صومعه‌سرا", "فومن", "ماسال", "شفت", "سیاهکل", "املش", "بندرانزلی", "کومله", "رودبار", "خمام", "لشت‌نشا", "سنگر", "کوچصفهان"] },
            { id: 26, name: "لرستان", cities: ["خرم‌آباد", "بروجرد", "الیگودرز", "دورود", "کوهدشت", "ازنا", "پلدختر", "سلسله", "نورآباد", "چگنی", "دلفان", "رومشکان", "سپیددشت", "فیروزآباد", "زاغه", "اشترینان", "سراب‌دوره", "معمولان", "کوهنانی", "هفت‌تپه"] },
            { id: 27, name: "مازندران", cities: ["ساری", "بابل", "آمل", "قائم‌شهر", "تنکابن", "چالوس", "رامسر", "نکا", "نور", "جویبار", "فریدونکنار", "کلاردشت", "محمودآباد", "عباس‌آباد", "سیمرغ", "بهشهر", "گلوگاه", "رستمکلا", "زیرآب", "سورک"] },
            { id: 28, name: "مرکزی", cities: ["اراک", "ساوه", "خمین", "محلات", "تفرش", "شازند", "دلیجان", "زرندیه", "کمیجان", "آشتیان", "فراهان", "نراق", "خنداب", "مهاجران", "نیمور", "هندودر", "آستانه", "غرق‌آباد", "مامونیه", "پرندک"] },
            { id: 29, name: "هرمزگان", cities: ["بندرعباس", "میناب", "قشم", "بندر لنگه", "رودان", "جاسک", "حاجی‌آباد", "بستک", "خمیر", "پارسیان", "ابوموسی", "سیریک", "بشاگرد", "تیرور", "کیش", "دهبارز", "فین", "رویدر", "کنگ", "سوزا"] },
            { id: 30, name: "همدان", cities: ["همدان", "ملایر", "نهاوند", "تویسرکان", "کبودرآهنگ", "رزن", "فامنین", "اسدآباد", "بهار", "لالجین", "قهاوند", "مریانج", "جورقان", "شراء", "سامن", "زنگنه", "گیان", "فرسفج", "دمق", "قروه درجزین"] },
            { id: 31, name: "یزد", cities: ["یزد", "میبد", "اردکان", "بافق", "ابرکوه", "تفت", "اشکذر", "مهریز", "بهاباد", "خاتم", "صدوق", "حمیدیا", "زارچ", "شاهدیه", "عقدا", "مروست", "نیر", "احمدآباد", "بفروییه", "ندوشن"] }
        ];

        // پر کردن dropdown استان‌ها
        const provinceDropdown = $('#province');
        iranData.forEach(province => {
            provinceDropdown.append(`<option value="${province.name}">${province.name}</option>`);
        });

        // تغییر استان
        $('#province').change(function() {
            const selectedProvinceName = $(this).val(); // دریافت نام استان
            const cityDropdown = $('#city');

            if (selectedProvinceName) {
                cityDropdown.prop('disabled', false);
                cityDropdown.empty();
                cityDropdown.append('<option value="">انتخاب شهر</option>');

                const selectedProvince = iranData.find(province => province.name === selectedProvinceName);
                if (selectedProvince) {
                    selectedProvince.cities.forEach(city => {
                        cityDropdown.append(`<option value="${city}">${city}</option>`);
                    });
                }
            } else {
                cityDropdown.prop('disabled', true);
                cityDropdown.empty();
                cityDropdown.append('<option value="">انتخاب شهر</option>');
            }
        });
    });
</script>
</body>
</html>
