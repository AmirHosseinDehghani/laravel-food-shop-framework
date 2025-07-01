<!doctype html>
<html lang="en">

<body class="vertical light rtl">
<div class="wrapper">
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h2 class="page-title">ویرایش محصول</h2>

                    <div class="card-deck">
                        <div class="card shadow mb-4">
                            <div class="card-header">
                                <strong class="card-title">فرم ویرایش محصول</strong>
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
                                <form method="post" action="{{route('product.update' , $product->id)}}">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputPassword4">قیمت جدید محصول</label>
                                            <input name="price" type="number" class="form-control" id="inputPassword4"
                                                   placeholder="بدون تغییر">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputPassword4">توضیحات جدید محصول</label>
                                            <input name="description" type="text" class="form-control"
                                                   id="inputPassword4" placeholder="...">
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

