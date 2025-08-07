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
                                <div class="col-md-4 my-6">
                                    <div class="card shadow">
                                        <div class="card-body text-center">
                                            <h5 class=" mb-3">ایمیل<strong></strong></h5>
                                            <div>
                                                <h6 class=" mb-3"><strong></strong> {{session('user')->email}}</h6>
                                            </div>
                                        </div> <!-- / .card-body -->
                                    </div>
                                </div>
                                <div class="col-md-4 my-6">
                                    <div class="card shadow">
                                        <div class="card-body text-center">
                                            <h5 class=" mb-3">کل فروش های سایت شما<strong></strong></h5>
                                            <div>
                                                <h5 class=" mb-3"><strong></strong> {{number_format($price)}} تومان</h5>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-4 my-6">
                                    <div class="card shadow">
                                        <div class="card-body text-center">
                                            <h5 class=" mb-3">تعداد فروشگاه ها  <strong></strong></h5>
                                            <div>
                                                <h5 class=" mb-3"><strong></strong>  {{$shopNumber}}  </h5>
                                            </div>
                                        </div> <!-- / .card-body -->
                                    </div> <!-- / .card -->
                                </div>
                            </div>


                    <div class="row">
                        <div class="col-md-12 my-4 mx-auto">
                            <div class="card shadow rounded-4 my-5">
                                <div class="card-header d-flex justify-content-between align-items-center bg-primary text-white rounded-top-4 py-3">
                                    <h5 class="mb-0">🏬 وضعیت فروشگاه‌ها</h5>
                                    <span class="badge bg-light text-primary">نسبت ثبت شده</span>
                                </div>
                                <div class="card-body bg-light-subtle rounded-bottom-4 p-4 d-flex justify-content-center align-items-center flex-column">
                                    <canvas id="shopsDoughnutChart" style="max-width: 400px; height: 350px;"></canvas>
                                    <div id="doughnutCenterText" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);
                    font-size: 1.8rem; font-weight: bold; color: #4e73df;"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                        </div>
                    </div>
                </div>


    </main> <!-- main -->
</div> <!-- .wrapper -->


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const ctx = document.getElementById('shopsDoughnutChart').getContext('2d');

        const registered = {{ $registeredShops }};
        const unregistered = {{ $totalShops - $registeredShops }};
        const total = {{ $totalShops }};

        const data = {
            labels: ['فروشگاه‌های ثبت شده', 'فروشگاه‌های تایید نشده'],
            datasets: [{
                data: [registered, unregistered],
                backgroundColor: ['#1cc88a', '#e74a3b'],
                hoverBackgroundColor: ['#17a673', '#be2617'],
                borderWidth: 2,
                borderColor: '#fff',
                hoverBorderColor: '#fff',
            }]
        };

        const options = {
            cutout: '70%',
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        font: { size: 16 },
                        color: '#333',
                        usePointStyle: true,
                        padding: 20,
                    }
                },
                tooltip: {
                    backgroundColor: '#fff',
                    titleColor: '#000',
                    bodyColor: '#000',
                    borderColor: '#ddd',
                    borderWidth: 1,
                    callbacks: {
                        label: ctx => `${ctx.label}: ${ctx.parsed} فروشگاه (${((ctx.parsed / total) * 100).toFixed(1)}%)`
                    }
                }
            },
            animation: {
                duration: 1500,
                easing: 'easeOutBounce',
            }
        };

        const chart = new Chart(ctx, {
            type: 'doughnut',
            data,
            options
        });

        // اضافه کردن متن وسط دایره
        const centerText = document.getElementById('doughnutCenterText');
        centerText.innerHTML = `${((registered / total) * 100).toFixed(1)}% ثبت شده`;
    });
</script>



