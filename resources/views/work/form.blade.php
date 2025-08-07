<!doctype html>
<html lang="en">

<body class="vertical light rtl">
<div class="wrapper">
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h2 class="page-title">انتخاب سمت </h2>
                    <p class="text-muted">بعد از انتخاب سمت شما نیازمند تاییدیه ادمین اصلی هستید، در نظر داشته باشید
                        امکان تغییر سمت وجود <strong>ندارد</strong>. نتیجه برسی‌ها برای شما ارسال
                        خواهد شد.</p>
                    <div class="card-deck">
                        <div class="card shadow mb-4">
                            <div class="card-header">
                                <strong class="card-title">فرم انتخاب سمت</strong>
                            </div>
                            @if (session('success'))
                                <div class="alert alert-success fade-in auto-dismiss">
                                    <i class="fe fe-check-circle mr-2"></i>
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if ($errors->any())
                                <div id="error-alert" class="alert alert-danger fade-in alert-autoclose" role="alert">
                                    <div class="d-flex">
                                        <div class="mr-3">
                                            <i class="fe fe-alert-triangle fa-lg"></i>
                                        </div>
                                        <div>
                                            <h5 class="alert-heading mb-2">خطاهای زیر رخ داده است:</h5>
                                            <ul class="persian-list mb-0">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <button type="button" class="close mr-auto" onclick="dismissError()">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </div>
                            @endif
                            <div class="card-body">
                                <form method="post" action="{{ route('get.work') }}">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-2">
                                            <label for="province">لیست سمت ها</label>
                                            <select name="work" id="" class="form-control" required>
                                                <option value="">انتخاب سمت</option>
                                                <option value="order">مدیریت سفارشات</option>
                                                <option value="shop">مدیریت فروشگاه ها</option>
                                                <option value="product">مدیریت محصولات</option>
                                                <option value="content">مدیریت محتوا</option>
                                                <option value="comment">مدیریت نظرات</option>
                                                <option value="sale">مدیریت فروش</option>
                                                <option value="technical">ناظر فنی</option>
                                            </select>
                                        </div>

                                    </div>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fe fe-save mr-2"></i> ثبت انتخاب
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div> <!-- / .card-desk-->
                </div> <!-- .col-12 -->
            </div> <!-- .row -->
        </div> <!-- .container-fluid -->
    </main> <!-- main -->
</div> <!-- .wrapper -->


</body>
</html>
