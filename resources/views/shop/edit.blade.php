<!doctype html>
<html lang="en">

<body class="vertical light rtl">
<div class="wrapper">
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h2 class="page-title">ویرایش فروشگاه</h2>
                    <p class="text-muted">بعد از ویرایش ، فروشگاه شما نیازمند تاییدیه ادمین است، نتیجه برسی‌ها برای شما ارسال خواهد شد.</p>
                    <div class="card-deck">
                        <div class="card shadow mb-4">
                            <div class="card-header">
                                <strong class="card-title">فرم ویرایش فروشگاه</strong>
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
                                <form method="post" action="{{route('shop.update' , $shop->id)}}">
                                    @csrf


                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputEmail4"> نام جدید </label>
                                            <input name="name" type="text" class="form-control" id="inputEmail4" placeholder="بدون تغییر" >
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputPassword4">رمز جدید فروشگاه</label>
                                            <input name="password" type="password" class="form-control" id="inputPassword4" placeholder="بدون تغییر" >
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputPassword4">تأیید رمز جدید فروشگاه</label>
                                            <input name="password_confirmation" type="password" class="form-control" id="inputPassword4" placeholder="..." >
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="province">آدرس جدید</label>
                                            <select name="p" id="province" class="form-control" >
                                                <option value="">انتخاب استان</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="city">.</label>
                                            <select name="c" id="city" class="form-control" disabled >
                                                <option value="">انتخاب شهر</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="city">رمز قدیم</label>
                                            <input name="oldPass" type="password" class="form-control" id="inputPassword4" placeholder="رمز قدیمی" required>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fe fe-save mr-2"></i> ثبت تغییرات
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

