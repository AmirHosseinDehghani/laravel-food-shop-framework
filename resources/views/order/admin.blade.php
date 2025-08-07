<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="mb-2 page-title">مدیریت سفارشات </h2>

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
                                        <th> شناسه فروشنده ها </th>
                                        <th>خریدار</th>
                                        <th>تعداد محصولات</th>
                                        <th>محصولات ارسال شده</th>
                                        <th>وضعیت کلی</th>
                                        <th>اخطار به فروشندگان</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(isset($orders) && count($orders) > 0)
                                        @foreach($orders as $order)
                                            <tr>
                                                <td>{{$order->id}}</td>
                                                <td>
                                                    @foreach($products as $product)
                                                        @foreach($sellers as $seller)
                                                            @if($product->seller == $seller->id)
                                                                {{$seller->id . ' '}}
                                                            @endif
                                                        @endforeach
                                                    @endforeach
                                                </td>
                                                <td>{{$buyer->name . ' ' . $buyer->family}}</td>

                                                <td>{{$order->number}}</td>
                                                <td>{{$order->ready}} </td>
                                                <td>
                                                    {{
                                                        $order->type == 'pay' ? 'پرداخت شد' :
                                                        ($order->type == 'dont_pay' ? 'پرداخت نشده' :
                                                        ($order->type == 'send' ? 'ارسال شد' :
                                                        ($order->type == 'receive' ? 'دریافت شد' : $order->type)))
                                                    }}
                                                </td>
                                                <td>
                                                    <button type="submit" class="btn btn-info"><a
                                                            style="color: white"
                                                            href="{{ route('admin.order.alarm',  $order->id) }}">ارسال اخطار
                                                            </a>
                                                    </button>

                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="5" class="text-center">سفارشی ثبت نشده !</td>
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


