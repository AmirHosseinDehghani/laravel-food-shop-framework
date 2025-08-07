<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="mb-2 page-title">مدیریت ادمین  ها</h2>

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
                                        <th>نام ادمین</th>
                                        <th>فامیلی ادمین</th>
                                        <th>سمت</th>
                                        <th>امتیاز</th>
                                        <th>وضعیت تایید</th>
                                        <th>تغییر وضعیت تایید</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(isset($admins) && count($admins) > 0)
                                        @foreach($admins as $admin)
                                            @foreach($works as $work)
                                                @if($admin->id == $work->admin)
                                            <tr>
                                                <td>{{$admin->id}}</td>
                                                <td>{{$admin->name}}</td>
                                                <td>{{$admin->family}}</td>


                                                        <td>
                                                            {{ strtr($work->job, [
'order' => 'مدیریت سفارشات',
 'product' => 'میدیریت محصولات',
  'shop' => 'مدیریت فروشگاه ها',
  'content' => 'مدیریت محتوی',
  'technical' => 'مدیر فنی',
  'salle' => 'مدیریت فروش',
  ]) }}
                                                        </td>
                                                        <td>{{$work->score}}</td>
                                                        <td>{{strtr($work->register,['yes'=>'تایید','no'=>'خارج از تایید'])}} </td>
                                                        <td>
                                                            <button type="submit" class="btn btn-info"><a
                                                                    style="color: white"
                                                                    href="{{ route('admin.register',  $work->id) }}">تغییر وضعیت
                                                                    تایید</a>
                                                            </button>

                                                        </td>

                                            </tr>
                                                @endif
                                            @endforeach
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


