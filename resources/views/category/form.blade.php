<!doctype html>
<html lang="en">

<body class="vertical light rtl">
<div class="wrapper">
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h2 class="page-title">ثبت دسته بندی</h2>


                    <div class="card-deck">
                        <div class="card shadow mb-4">
                            <div class="card-header">
                                <strong class="card-title">فرم ثبت دسته بندی</strong>
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
                                <form method="post" action="{{ route('Ad.category.store') }}">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputEmail4">نام</label>
                                            <input style="font-size: 20px"  name="name" type="text" class="form-control" id="inputEmail4"
                                                   placeholder="نام دسته بندی" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="description">توضیحات دسته بندی</label>
                                            <textarea style="font-size: 20px" name="description" class="form-control" rows="2"
                                                      placeholder="توضیحات دسته بندی"
                                                      required>{{ old('description') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fe fe-save mr-2"></i> ثبت دسته بندی
                                            </button>
                                        </div>
                                    </div>

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
