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
                                            <th>نام محصول</th>
                                            <th>توضیحات محصول</th>
                                            <th>قیمت محصول</th>
                                            <th>محل فروش</th>
                                            <th>نحوه فروش</th>
                                            <th>دسته بندی</th>
                                            <th>مقدار تخفیف</th>
                                            <th>انجام تغییرات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(isset($products) && count($products) > 0)
                                            @foreach($products as $product)
                                                <tr>
                                                    <td>{{$product->name}}</td>
                                                    <td>{{$product->description}}</td>
                                                    <td>{{number_format($product->price)}} تومان</td>
                                                    <td>
                                                        @foreach($shops as $shop)
                                                            @if($shop->id == $product->shop)
                                                                {{$shop->name}}
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    @if($product->type == 'kilo')
                                                        <td>کیلویی</td>
                                                    @else
                                                        <td>بسته ای</td>
                                                    @endif

                                                    <td>
                                                        @foreach($categories as $category)
                                                            @if($category->id == $product->category)
                                                                {{$category->name}}
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    @if(empty($product->off))
                                                        <td>بدون تخفیف</td>
                                                    @else
                                                        <td>{{$product->off}}%</td>
                                                    @endif
                                                    <td>
                                                        <a href="{{ route('product.edit',  $product->id) }}"
                                                           class="btn btn-info text-white mb-1">ویرایش</a>

                                                        <!-- دکمه باز کردن مودال -->
                                                        <button type="button" class="btn btn-warning text-white mb-1"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#discountModal-{{ $product->id }}">
                                                            اعمال تخفیف
                                                        </button>
                                                        @if(!empty($product->off) && $product->off >0)

                                                            <a href="{{route('product.off.delete',$product->id)}}"
                                                               class="btn btn-danger text-white mb-1">حذف تخفیف</a>
                                                                @endif
                                                                <!-- مودال -->
                                                            <div class="modal fade"
                                                                 id="discountModal-{{ $product->id }}"
                                                                 tabindex="-1"
                                                                 aria-labelledby="discountModalLabel-{{ $product->id }}"
                                                                 aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <form
                                                                        action="{{ route('product.off', $product->id) }}"
                                                                        method="get">
                                                                        @csrf
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title"
                                                                                    id="discountModalLabel-{{ $product->id }}">
                                                                                    اعمال تخفیف
                                                                                    برای {{ $product->name }}</h5>
                                                                                <button type="button" class="btn-close"
                                                                                        data-bs-dismiss="modal"
                                                                                        aria-label="بستن"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <div class="mb-3">
                                                                                    <label
                                                                                        for="discountInput-{{ $product->id }}"
                                                                                        class="form-label">درصد
                                                                                        تخفیف</label>
                                                                                    <input type="number" name="off"
                                                                                           id="discountInput-{{ $product->id }}"
                                                                                           class="form-control" min="1"
                                                                                           max="100" required>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="submit"
                                                                                        class="btn btn-success">ثبت
                                                                                </button>
                                                                                <button type="button"
                                                                                        class="btn btn-secondary"
                                                                                        data-bs-dismiss="modal">بستن
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                    </td>

                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="5" class="text-center">محصولی ثبت نشده است</td>
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
