<div class="wrapper">
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h2 class="mb-2 page-title">مدیریت فروشگاه ها</h2>
                    <p class="card-text">فروشگاه ها بعد از ثبت شدن برای فروش نیاز به تایید توسط مدیر سایت دارند. وضعیت تایید را میتوانید ببینید.  </p>
                    <div class="row my-4">
                        <!-- Small table -->
                        <div class="col-md-12">
                            <div class="card shadow">
                                <div class="card-body">
                                    <!-- table -->
                                    <table class="table datatables" id="dataTable-1">
                                        <thead>
                                        <tr>
                                            <th>نام فروشگاه</th>
                                            <th>آدرس فروشگاه</th>
                                            <th>حساب بانکی</th>
                                            <th>وضعیت تایید</th>
                                            <th>انجام تغییرات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(isset($shops) && count($shops) > 0)
                                            @foreach($shops as $shop)
                                                <tr>
                                                    <td>{{$shop->name}}</td>
                                                    <td>{{$shop->address}}</td>
                                                    <td>{{number_format($shop->bank) }} تومان</td>
                                                    <td>
                                                        @if($shop->type == 0)
                                                            تایید نشده
                                                        @endif
                                                        @if($shop->type == 1)
                                                            تایید شده
                                                        @endif
                                                    </td>
                                                    <td>
                                                       <button type="submit" class="btn btn-info"><a style="color: white" href="{{ route('shop.ef',  $shop->id) }}" >ویرایش</a></button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="5" class="text-center">فروشگاهی ثبت نشده است</td>
                                            </tr>
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> <!-- simple table -->
                    </div> <!-- end section -->
                </div> <!-- .col-12 -->
            </div> <!-- .row -->
        </div> <!-- .container-fluid -->

    </main> <!-- main -->
</div>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/moment.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/simplebar.min.js') }}"></script>
<script src='{{ asset('js/daterangepicker.js') }}'></script>
<script src='{{ asset('js/jquery.stickOnScroll.js') }}'></script>
<script src="{{ asset('js/tinycolor-min.js') }}"></script>
<script src="{{ asset('js/config.js') }}"></script>
<script src='{{ asset('js/jquery.dataTables.min.js') }}'></script>
<script src='{{ asset('js/dataTables.bootstrap4.min.js') }}'></script>

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
