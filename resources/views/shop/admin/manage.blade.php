
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h2 class="mb-2 page-title">مدیریت فروشگاه ها</h2>
                    <p class="card-text">فروشگاه ها بعد از ثبت شدن برای فروش نیاز به تایید توسط مدیر سایت دارند. وضعیت
                        تایید را میتوانید ببینید. </p>
                    <div class="row my-4">
                        <!-- Small table -->
                        <div class="col-md-12">
                            <div class="card shadow">
                                <div class="card-body">
                                    <!-- table -->
                                    <table class="table datatables" id="dataTable-1">
                                        @if (session('success'))
                                            <div class="alert alert-success fade-in auto-dismiss">
                                                <i class="fe fe-check-circle mr-2"></i>
                                                {{ session('success') }}
                                            </div>
                                            {{ session()->forget('success')}}
                                        @endif
                                        <thead>
                                        <tr>
                                            <th>شناسه</th>
                                            <th>نام فروشگاه</th>
                                            <th>نام فروشنده</th>
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
                                                    <td>{{$shop->id}}</td>
                                                    <td>{{$shop->name}}</td>
                                                    <td>
                                                        @foreach($sellers as $seller)
                                                            @if($seller->id == $shop->owner)
                                                                {{$seller->name.' '.$seller->family}}
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td>{{$shop->address}}</td>
                                                    <td>{{$shop->bank}} تومان</td>
                                                    <td>
                                                        @if($shop->type == 0)
                                                            تایید نشده
                                                        @endif
                                                        @if($shop->type == 1)
                                                            تایید شده
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <button type="submit" class="btn btn-info"><a
                                                                style="color: white"
                                                                href="{{ route('Ad.shop.change',  $shop->id) }}">تغییر وضعیت تایید</a>
                                                        </button>

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


