<div class="wrapper">
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h2 class="mb-2 page-title">مدیریت پیغام ها</h2>
                    @if (session('success'))
                        <div class="alert alert-success fade-in auto-dismiss">
                            <i class="fe fe-check-circle mr-2"></i>
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="row my-4">
                        <!-- Small table -->
                        <div class="col-md-12">
                            <div class="card shadow">
                                <div class="card-body">
                                    <!-- table -->
                                    <table class="table datatables" id="dataTable-1">
                                        <thead>
                                        <tr>
                                            <th>موضوع</th>
                                            <th>متن</th>
                                            <th>ارسال کننده</th>

                                            <th>وضعیت</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                      @if(!empty($messages) && count($messages)  >0)
                                            @foreach($messages as $message)
                                                <tr>
                                                    <td>{{$message->subject}}</td>
                                                    <td>{{$message->text}} </td>
                                                    <td>
                                                        @foreach($users as $user)
                                                            @if($user->id == $message->sender)
                                                                {{$user->name .' '. $user->family . '/' . $user->type}}
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        @if($message->type == 'send')
                                                            <button type="submit" class="btn btn-info"><a
                                                                    style="color: white"
                                                                    href="{{ route('message.et',  $message->id) }}">خوانده
                                                                    شد</a></button>

                                                        @else
                                                        پیغام دیده شده
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="5" class="text-center">پیغامی ثبت نشده است</td>
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

    function gtag() {
        dataLayer.push(arguments);
    }

    gtag('js', new Date());
    gtag('config', 'UA-56159088-1');
</script>

