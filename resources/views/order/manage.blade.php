<body class="vertical  light rtl ">
<div class="wrapper">


    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h2 class="page-title">مدیریت و پرداخت سفارش</h2>
                    <p> بعد از پرداخت میتوانید وضعیت سفارش خود را از همین صفحه پیگیری کنید. </p>
                    @if (session('success'))
                        <div class="alert alert-success fade-in auto-dismiss">
                            <i class="fe fe-check-circle mr-2"></i>
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="row">
                        <!-- Striped rows -->

                        <!-- Bordered table -->
                        <div class="col-md-7 my-4">
                            <div class="card shadow">
                                <div class="card-body">
                                    <h5 class="card-title">1. لیست سفارشات </h5>

                                    <table class="table table-sm table-hover table-borderless">
                                        <thead class="thead-dark">
                                        <tr>
                                            <th>شماره سفارش</th>
                                            <th>قیمت کل</th>
                                            <th>صدور فاکتور</th>
                                            <th>وضعیت سفارش</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(($orders) && count($orders) > 0)
                                            @foreach($orders as $order)
                                                <tr class="table-success">
                                                    <td>{{$order->id}}</td>
                                                    <td>{{ number_format($order->price)}}</td>
                                                    <td>
                                                        <button type="submit" class="btn btn-info"><a
                                                                style="color: white"
                                                                href="{{ route('factor' , $order->id) }}">دانلود
                                                            </a>
                                                        </button>
                                                    </td>
                                                    @if($order->type == 'send')
                                                        <td>
                                                            <button type="submit" class="btn btn-info"><a
                                                                    style="color: white"
                                                                    href="{{ route('change.type' , $order->id) }}">دریافت
                                                                    شد </a>
                                                            </button>
                                                        </td>
                                                    @else
                                                        @if($order->type == 'receive')
                                                            <td colspan="5" class="text-center">دریافت شده است</td>
                                                        @else
                                                            <td colspan="5" class="text-center">ارسال نشده است</td>
                                                        @endif

                                                    @endif

                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="5" class="text-center">سفارشی ثبت نشد</td>
                                            </tr>
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> <!-- Bordered table -->
                        <div class="col-md-5 my-4">
                            <div class="card shadow">
                                <div class="card-body">
                                    <h5 class="card-title">2. پرداخت</h5>
                                    <table class="table table-sm table-hover table-borderless">
                                        <thead class="thead-dark">
                                        <tr>
                                            <th>تعداد کالا ها</th>
                                            <th>قیمت کل</th>
                                            <th>پرداخت</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(($orders) && count($orders) > 0)
                                            @if($order->type == 'dont_pay')
                                                <tr class="table-warning">
                                                    <td>{{$number}}</td>
                                                    <td>{{$total}}</td>
                                                    <td>
                                                        <button type="submit" class="btn btn-info"><a
                                                                style="color: white"
                                                                href="{{ route('pay.order') }}">پرداخت </a>
                                                        </button>
                                                    </td>

                                                </tr>
                                            @else
                                                <td colspan="5" class="text-center">شما سفارش پرداخت نشده ای ندارید.
                                                </td>
                                            @endif
                                        @else
                                            <tr>
                                                <td colspan="5" class="text-center">سبد خرید شما خالی است.</td>
                                            </tr>
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> <!-- Expandable rows -->
                    </div> <!-- end section -->

                </div> <!-- .col-12 -->
            </div> <!-- .row -->
        </div> <!-- .container-fluid -->
        <div class="modal fade modal-notif modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="defaultModalLabel">Notifications</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="list-group list-group-flush my-n3">
                            <div class="list-group-item bg-transparent">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="fe fe-box fe-24"></span>
                                    </div>
                                    <div class="col">
                                        <small><strong>Package has uploaded successfull</strong></small>
                                        <div class="my-0 text-muted small">Package is zipped and uploaded</div>
                                        <small class="badge badge-pill badge-light text-muted">1m ago</small>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item bg-transparent">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="fe fe-download fe-24"></span>
                                    </div>
                                    <div class="col">
                                        <small><strong>Widgets are updated successfull</strong></small>
                                        <div class="my-0 text-muted small">Just create new layout Index, form, table
                                        </div>
                                        <small class="badge badge-pill badge-light text-muted">2m ago</small>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item bg-transparent">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="fe fe-inbox fe-24"></span>
                                    </div>
                                    <div class="col">
                                        <small><strong>Notifications have been sent</strong></small>
                                        <div class="my-0 text-muted small">Fusce dapibus, tellus ac cursus commodo</div>
                                        <small class="badge badge-pill badge-light text-muted">30m ago</small>
                                    </div>
                                </div> <!-- / .row -->
                            </div>
                            <div class="list-group-item bg-transparent">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="fe fe-link fe-24"></span>
                                    </div>
                                    <div class="col">
                                        <small><strong>Link was attached to menu</strong></small>
                                        <div class="my-0 text-muted small">New layout has been attached to the menu
                                        </div>
                                        <small class="badge badge-pill badge-light text-muted">1h ago</small>
                                    </div>
                                </div>
                            </div> <!-- / .row -->
                        </div> <!-- / .list-group -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Clear All
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade modal-shortcut modal-slide" tabindex="-1" role="dialog"
             aria-labelledby="defaultModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="defaultModalLabel">Shortcuts</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body px-5">
                        <div class="row align-items-center">
                            <div class="col-6 text-center">
                                <div class="squircle bg-success justify-content-center">
                                    <i class="fe fe-cpu fe-32 align-self-center text-white"></i>
                                </div>
                                <p>Control area</p>
                            </div>
                            <div class="col-6 text-center">
                                <div class="squircle bg-primary justify-content-center">
                                    <i class="fe fe-activity fe-32 align-self-center text-white"></i>
                                </div>
                                <p>Activity</p>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-6 text-center">
                                <div class="squircle bg-primary justify-content-center">
                                    <i class="fe fe-droplet fe-32 align-self-center text-white"></i>
                                </div>
                                <p>Droplet</p>
                            </div>
                            <div class="col-6 text-center">
                                <div class="squircle bg-primary justify-content-center">
                                    <i class="fe fe-upload-cloud fe-32 align-self-center text-white"></i>
                                </div>
                                <p>Upload</p>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-6 text-center">
                                <div class="squircle bg-primary justify-content-center">
                                    <i class="fe fe-users fe-32 align-self-center text-white"></i>
                                </div>
                                <p>Users</p>
                            </div>
                            <div class="col-6 text-center">
                                <div class="squircle bg-primary justify-content-center">
                                    <i class="fe fe-settings fe-32 align-self-center text-white"></i>
                                </div>
                                <p>Settings</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main> <!-- main -->
</div> <!-- .wrapper -->
<script>
    $('#dataTable-1').DataTable(
        {
            autoWidth: true,
            "lengthMenu": [
                [16, 32, 64, -1],
                [16, 32, 64, "All"]
            ]
        });
</script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }

    gtag('js', new Date());
    gtag('config', 'UA-56159088-1');
</script>
</body>
</html>
