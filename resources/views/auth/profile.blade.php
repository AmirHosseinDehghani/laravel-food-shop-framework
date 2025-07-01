
<div class="wrapper">


    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10 col-xl-8">
                    <h2 class="h3 mb-4 page-title">پروفایل</h2>
                    <div class="my-4">
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
                        @if (session('success'))
                            <div class="alert alert-success fade-in auto-dismiss">
                                <i class="fe fe-check-circle mr-2"></i>
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{route('profile.edit')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="inputEmail4"> ایمیل جدید</label>
                                <input name="email" type="email" class="form-control" id="inputEmail4" placeholder="بدون تغییر">
                            </div>
                            <hr class="my-4">
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputPassword4">رمز فعلی </label>
                                        <input name="oldPass" type="password" class="form-control" id="inputPassword5"  placeholder="وارد شود">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword5">رمز جدید</label>
                                        <input name="password" type="password" class="form-control" id="inputPassword5"  placeholder="بدون تغییر">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword6">تاییدیه رمز جدید</label>
                                        <input name="password_confirmation" type="password" class="form-control" id="inputPassword6"  placeholder="....">
                                    </div>
                                </div>
                                <div class="col-md-6" style="text-align: center ;padding-top: 142px">
                                    <button type="submit" class="btn  btn-primary">ثبت تغییرات</button>
                                </div>
                            </div>

                        </form>
                    </div> <!-- /.card-body -->
                </div> <!-- /.col-12 -->
            </div> <!-- .row -->
        </div> <!-- .container-fluid -->


    </main> <!-- main -->
</div> <!-- .wrapper -->
