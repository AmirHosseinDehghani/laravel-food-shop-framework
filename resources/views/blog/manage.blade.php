<div class="wrapper">
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h2 class="mb-2 page-title">مدیریت محصولات</h2>
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
                                            <th>نام بلاگ</th>
                                            <th>متن بلاگ</th>
                                            <th>تصویر بلاگ</th>
                                            <th>تغییرات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(isset($blogs) && count($blogs) > 0)
                                            @foreach($blogs as $blog)
                                                <tr>
                                                    <td>{{$blog->subject}}</td>
                                                    <td>{!!  $blog->blog!!}</td>
                                                    <td><img style="height: 100px ; width: 100px" src="{{asset("storage/$blog->img")}}"> </td>
                                                    <td>
                                                        <a href="{{ route('blog.delete',  $blog->id) }}"
                                                           class="btn btn-info text-white mb-1">حذف</a>
                                                    </td>

                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="5" class="text-center">بلاگی ثبت نشده است</td>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }

    gtag('js', new Date());
    gtag('config', 'UA-56159088-1');
</script>
