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
                                    <h5 class=" mb-3">تعداد محصولات ها <strong></strong></h5>
                                    <div>
                                        <h5 class=" mb-3"><strong></strong> {{$shopNumber}}  </h5>
                                    </div>
                                </div> <!-- / .card-body -->
                            </div> <!-- / .card -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 my-4">
                            <div class="card shadow rounded-4 my-5">
                                <div
                                    class="card-header d-flex justify-content-between align-items-center bg-primary text-white rounded-top-4 py-3">
                                    <h5 class="mb-0">📦 تعداد محصولات بر اساس دسته‌بندی</h5>
                                    <span class="badge bg-light text-primary">نمودار ستونی</span>
                                </div>
                                <div class="card-body bg-light-subtle rounded-bottom-4 p-4">
                                    <canvas id="productCategoryChart" style="height: 350px;"></canvas>
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
        const ctx = document.getElementById('productCategoryChart').getContext('2d');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($productCategoryLabels, JSON_UNESCAPED_UNICODE) !!},
                datasets: [{
                    label: 'تعداد محصولات',
                    data: {!! json_encode($productCategoryCounts) !!},
                    backgroundColor: [
                        '#4e73df', '#1cc88a', '#36b9cc', '#f6c23e', '#e74a3b', '#858796', '#5a5c69', '#fd7e14', '#20c997', '#6610f2'
                    ],
                    borderRadius: 12,
                    maxBarThickness: 50,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: value => value.toLocaleString('fa-IR')
                        },
                        title: {
                            display: true,
                            text: 'تعداد محصولات',
                            font: {size: 14},
                            color: '#555'
                        },
                        grid: {
                            color: '#eee'
                        }
                    },
                    x: {
                        ticks: {
                            font: {size: 13},
                            color: '#333'
                        },
                        grid: {
                            display: false
                        }
                    }
                },
                plugins: {
                    tooltip: {
                        backgroundColor: '#fff',
                        titleColor: '#000',
                        bodyColor: '#000',
                        borderColor: '#ccc',
                        borderWidth: 1,
                        callbacks: {
                            label: ctx => `${ctx.dataset.label}: ${ctx.parsed.y.toLocaleString('fa-IR')} عدد`
                        }
                    },
                    legend: {
                        display: false
                    }
                },
                animation: {
                    duration: 1000,
                    easing: 'easeOutQuart'
                }
            }
        });
    });
</script>



