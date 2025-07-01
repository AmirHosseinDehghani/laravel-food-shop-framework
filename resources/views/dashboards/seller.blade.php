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
                                    <strong class="card-title">پیغام های اخیر</strong>

                                </div>
                                <div class="card-body" data-simplebar
                                     style="height:355px; overflow-y: auto; overflow-x: hidden;">
                                    @if(isset($messages) && count($messages) > 0)
                                        @foreach($messages as $message)
                                            <div class="pb-3 timeline-item item-warning">
                                                <div class="pl-5">
                                                    <div class="mb-3"><strong>{{$message->subject}}</strong></div>
                                                    <a><h4>برای دیدن جزییات کلیک کنید</h4></a>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div> <!-- / .card-body -->
                            </div> <!-- / .card -->
                        </div> <!-- / .col-md-6 -->
                        <!-- Striped rows -->

                        <div style="font-family: 'Lateef', cursive" class="col-md-12 col-lg-8" id="piechart"></div>
                    </div> <!-- .row-->
                </div> <!-- .col-12 -->
            </div> <!-- .row -->
        </div> <!-- .container-fluid -->


    </main> <!-- main -->
</div> <!-- .wrapper -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        // دیتای PHP رو به JS تبدیل می‌کنیم
        var data = google.visualization.arrayToDataTable([
            ['Product', 'Sales'],
                @foreach ($salle as $name => $count)
            ['{{ $name }}', {{ $count }}],
            @endforeach
        ]);

        var options = {
            title: 'سهم هر کالا از فروش های شما :',
            fontName: 'Lateef',
            fontSize: 18,
            is3D: true
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
    }
</script>



