<div class="wrapper">


    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="row align-items-center mb-2">
                        <div class="col">
                            <h1 class="h1 page-title">خوش آمدید {{session('user')->name}} {{session('user')->family}}
                                !</h1>
                        </div>
                        <div class="col-auto">
                            <form class="form-inline">
                                <div class="form-group d-none d-lg-inline">
                                    <label for="reportrange" class="sr-only">Date Ranges</label>
                                    <div id="reportrange" class="px-2 py-2 text-muted">
                                        <span class="small"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="button" class="btn btn-sm"><span
                                            class="fe fe-refresh-ccw fe-16 text-muted"></span></button>
                                    <button type="button" class="btn btn-sm mr-2"><span
                                            class="fe fe-filter fe-16 text-muted"></span></button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Recent Activity -->
                        <div class="col-md-12 col-lg-4 mb-4">
                            <div class="card timeline shadow">
                                <div class="card-header">
                                    <strong class="card-title">وضعیت سفارشات آخر شما</strong>

                                </div>
                                <div class="card-body" data-simplebar
                                     style="height:355px; overflow-y: auto; overflow-x: hidden;">
                                    @if(isset($orders) && count($orders) > 0)
                                        @foreach($orders as $order)
                                            <div class="pb-3 timeline-item item-warning">
                                                <div class="pl-5">
                                                    <div class="mb-3"><strong> سفارش شماره :{{$order->id}}</strong></div>
                                                    <a><h4> {{
                                                            $order->type == 'pay' ? 'پرداخت شد' :
                                                            ($order->type == 'dont_pay' ? 'پرداخت نشده' :
                                                            ($order->type == 'send' ? 'ارسال شد' :
                                                            ($order->type == 'receive' ? 'دریافت شد' : $order->type)))
                                                        }}</h4></a>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="mb-3"><strong>سفارشی ثبت نشده است</strong></div>
                                    @endif
                                </div> <!-- / .card-body -->
                            </div> <!-- / .card -->
                        </div> <!-- / .col-md-6 -->
                        <div class="col-md-12 col-lg-4">
                            <div class="row">
                                <div class="col-md-12 my-4">
                                    <div class="card shadow">
                                        <div class="card-body text-center">
                                            <h4 class=" mb-3">ایمیل<strong></strong></h4>
                                            <div>
                                                <h6 class=" mb-3"><strong></strong> {{session('user')->email}}</h6>
                                            </div>
                                        </div> <!-- / .card-body -->
                                    </div> <!-- / .card -->
                                </div> <!-- /. col -->

                            </div>
                            <div class="row">
                                <div class="col-md-6 my-4">
                                    <div class="card shadow">
                                        <div class="card-body text-center">
                                            <h4 class=" mb-3">تعداد سفارشات <strong></strong></h4>
                                            <div>
                                                <h5 class=" mb-3"><strong></strong> {{$number}}</h5>
                                            </div>
                                        </div> <!-- / .card-body -->
                                    </div> <!-- / .card -->
                                </div> <!-- /. col -->
                                <div class="col-md-6 my-4">
                                    <div class="card shadow">
                                        <div class="card-body text-center">
                                            <h4 class=" mb-3">خرید های شما <strong></strong></h4>
                                            <div>
                                                <h5 class=" mb-3"><strong></strong>  {{number_format($price) }}  تومان  </h5>
                                            </div>
                                        </div> <!-- / .card-body -->
                                    </div> <!-- / .card -->
                                </div>
                            </div> <!-- end section --><!-- end section -->
                        </div> <!-- Striped rows -->
                        <div class="col-md-12 col-lg-4">
                            <div class="row">
                                <div class="col-md-12 my-4">

                                        <img src="{{ asset('img/logo.jpg') }}" alt="Logo">

                                </div>
                                </div> <!-- /. col -->
                            </div>
                        </div> <!-- Striped rows -->
                    </div> <!-- .row-->
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



