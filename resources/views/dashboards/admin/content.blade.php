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


                        <div class="col-md-6 my-6">
                            <div class="card shadow">
                                <div class="card-body text-center">
                                    <h5 class=" mb-3">ایمیل<strong></strong></h5>
                                    <div>
                                        <h6 class=" mb-3"><strong></strong> {{session('user')->email}}</h6>
                                    </div>
                                </div> <!-- / .card-body -->
                            </div>
                        </div>
                        <div class="col-md-3 my-6">
                            <div class="card shadow">
                                <div class="card-body text-center">
                                    <h5 class=" mb-3">تعداد بلاگ ها<strong></strong></h5>
                                    <div>
                                        <h5 class=" mb-3"><strong></strong> {{number_format($numberBlogs)}} </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 my-6">
                            <div class="card shadow">
                                <div class="card-body text-center">
                                    <h5 class=" mb-3">تعداد بلاگ های شما<strong></strong></h5>
                                    <div>
                                        <h5 class=" mb-3"><strong></strong> {{number_format($userBlog)}} </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 my-4">
                            <div class="card shadow">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <strong class="card-title">نمودار بلاگ‌های ثبت‌شده در ۳۰ روز اخیر</strong>
                                    <span class="badge bg-primary">۳۰ روز اخیر</span>
                                </div>
                                <div class="card-body">
                                    <canvas id="blogChart" width="400" height="300"></canvas>
                                </div>
                            </div>
                        </div>

                    </div> <!-- end section --><!-- end section -->
                </div> <!-- Striped rows -->
            </div>

        </div>
    </main> <!-- main -->
</div> <!-- .wrapper -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const ctx = document.getElementById('blogChart');
        if (!ctx) return;

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! json_encode($labels, JSON_UNESCAPED_UNICODE) !!},
                datasets: [
                    {
                        label: '✍️ تعداد بلاگ‌ها',
                        data: {!! json_encode(array_map('intval', $blogCounts)) !!},
                        borderColor: '#6f42c1',
                        backgroundColor: 'rgba(111, 66, 193, 0.1)',
                        fill: true,
                        tension: 0.4,
                        pointBackgroundColor: '#6f42c1',
                        pointBorderColor: '#fff',
                        pointRadius: 4,
                        pointHoverRadius: 6,
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                interaction: {
                    mode: 'index',
                    intersect: false,
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        stepSize: 1,
                        title: {
                            display: true,
                            text: 'تعداد بلاگ‌ها',
                            color: '#555',
                            font: {
                                size: 14
                            }
                        },
                        ticks: {
                            stepSize: 1,
                            precision: 0,
                            callback: function (value) {
                                return Number.isInteger(value) ? value : '';
                            }
                        }
                    }
                },
                plugins: {
                    tooltip: {
                        backgroundColor: '#fff',
                        titleColor: '#000',
                        bodyColor: '#000',
                        borderColor: '#ddd',
                        borderWidth: 1,
                        callbacks: {
                            label: function (ctx) {
                                return ctx.dataset.label + ': ' + ctx.raw + ' عدد';
                            }
                        }
                    },
                    legend: {
                        labels: {
                            usePointStyle: true,
                            pointStyle: 'circle',
                            padding: 20,
                            color: '#333',
                            font: {
                                size: 14
                            }
                        }
                    }
                }
            }
        });
    });
</script>




