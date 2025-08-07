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
                                    <h5 class=" mb-3">تعداد فروشگاه ها <strong></strong></h5>
                                    <div>
                                        <h5 class=" mb-3"><strong></strong> {{$shopNumber}}  </h5>
                                    </div>
                                </div> <!-- / .card-body -->
                            </div> <!-- / .card -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 my-4">
                            <div class="card shadow">
                                <div class="card shadow rounded-4 my-5">
                                    <div
                                        class="card-header d-flex justify-content-between align-items-center bg-primary text-white rounded-top-4 py-3">
                                        <h5 class="mb-0">📈 نمودار سفارشات و درآمد</h5>
                                        <span class="badge bg-light text-primary">۳۰ روز اخیر</span>
                                    </div>
                                    <div class="card-body bg-light-subtle rounded-bottom-4 p-4">
                                        <canvas id="ordersIncomeChart" style="height: 300px;"></canvas>
                                    </div>
                                </div>

                            </div> <!-- / .card -->
                        </div> <!-- /. col -->
                    </div>

                    <div class="row">
                        <div class="col-md-6 my-4 mx-auto">
                            <div class="card shadow rounded-4 my-5">
                                <div
                                    class="card-header d-flex justify-content-between align-items-center bg-primary text-white rounded-top-4 py-3">
                                    <h5 class="mb-0">🏬 وضعیت فروشگاه‌ها</h5>
                                    <span class="badge bg-light text-primary">نسبت ثبت شده</span>
                                </div>
                                <div
                                    class="card-body bg-light-subtle rounded-bottom-4 p-4 d-flex justify-content-center align-items-center flex-column">
                                    <canvas id="shopsDoughnutChart" style="max-width: 400px; height: 350px;"></canvas>
                                    <div id="doughnutCenterText" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);
                    font-size: 1.8rem; font-weight: bold; color: #4e73df;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 my-4 mx-auto">
                            <div class="card shadow rounded-4 my-5">
                                <div class="card-header d-flex justify-content-between align-items-center bg-primary text-white rounded-top-4 py-3">
                                    <h5 class="mb-0">💬 وضعیت نمایش کامنت‌ها</h5>
                                </div>
                                <div class="card-body bg-light-subtle rounded-bottom-4 p-4 d-flex justify-content-center align-items-center flex-column" style="position: relative;">
                                    <canvas id="commentStatusChart" style="max-width: 350px; max-height: 350px; height: 350px; width: 350px;"></canvas>
                                    <div id="doughnutCenterText" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);
                font-size: 1.8rem; font-weight: bold; color: #4e73df;"></div>
                                </div>
                            </div>
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
                    <div class="row">
                        <div class="col-md-12 my-4">
                            <div class="card shadow rounded-4 my-5">
                                <div class="card-header d-flex justify-content-between align-items-center bg-primary text-white rounded-top-4 py-3">
                                    <h5 class="mb-0">📊 روند فروش بر اساس وضعیت سفارش</h5>
                                    <span class="badge bg-light text-primary">۳۰ روز اخیر</span>
                                </div>
                                <div class="card-body bg-light-subtle rounded-bottom-4 p-4">
                                    <canvas id="salesStatusChart" style="height: 380px;"></canvas>
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
        const ctx = document.getElementById('ordersIncomeChart');
        if (!ctx) return;

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! json_encode($labels, JSON_UNESCAPED_UNICODE) !!},
                datasets: [
                    {
                        label: '📦 تعداد سفارش',
                        data: {!! json_encode($orderCounts) !!},
                        borderColor: '#fff',
                        backgroundColor: 'rgba(78, 115, 223, 0.1)',
                        fill: true,
                        tension: 0.4,
                        pointBackgroundColor: '#4e73df',
                        pointBorderColor: '#fff',
                        pointRadius: 4,
                        pointHoverRadius: 6,
                    },
                    {
                        label: '💰 درآمد (تومان)',
                        data: {!! json_encode($incomes) !!},
                        borderColor: '#1cc88a',
                        backgroundColor: 'rgba(28, 200, 138, 0.1)',
                        fill: true,
                        tension: 0.4,
                        pointBackgroundColor: '#1cc88a',
                        pointBorderColor: '#fff',
                        pointRadius: 4,
                        pointHoverRadius: 6,
                        yAxisID: 'incomeAxis',
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
                        title: {
                            display: true,
                            text: 'تعداد سفارش',
                            color: '#555',
                            font: {
                                size: 14
                            }
                        }
                    },
                    incomeAxis: {
                        type: 'linear',
                        position: 'right',
                        beginAtZero: true,
                        grid: {
                            drawOnChartArea: false
                        },
                        ticks: {
                            callback: value => value.toLocaleString('fa-IR') + ' ت'
                        },
                        title: {
                            display: true,
                            text: 'درآمد (تومان)',
                            color: '#555',
                            font: {
                                size: 14
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
                                const label = ctx.dataset.label || '';
                                const val = ctx.raw;
                                return label + ': ' + val.toLocaleString('fa-IR') + (label.includes('درآمد') ? ' تومان' : ' عدد');
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
                        font: {size: 16},
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
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const ctx = document.getElementById('commentStatusChart').getContext('2d');

        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: {!! json_encode($commentLabels, JSON_UNESCAPED_UNICODE) !!},
                datasets: [{
                    data: {!! json_encode($commentCounts) !!},
                    backgroundColor: ['#1cc88a', '#e74a3b'],
                    hoverOffset: 30,
                    borderRadius: 10,
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            font: { size: 14 },
                            color: '#333'
                        }
                    },
                    tooltip: {
                        callbacks: {
                            label: ctx => `${ctx.label}: ${ctx.parsed.toLocaleString('fa-IR')} کامنت`
                        }
                    }
                }
            }
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const ctx = document.getElementById('salesStatusChart');
        if (!ctx) return;

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($salesLabels, JSON_UNESCAPED_UNICODE) !!},
                datasets: [
                    {
                        label: 'پرداخت شده 💳',
                        data: {!! json_encode($salesPay) !!},
                        backgroundColor: 'rgba(78, 115, 223, 0.7)',
                        borderRadius: 6
                    },
                    {
                        label: 'ارسال شده 🚚',
                        data: {!! json_encode($salesSend) !!},
                        backgroundColor: 'rgba(28, 200, 138, 0.7)',
                        borderRadius: 6
                    },
                    {
                        label: 'تحویل شده 📦',
                        data: {!! json_encode($salesReceive) !!},
                        backgroundColor: 'rgba(255, 206, 86, 0.7)',
                        borderRadius: 6
                    }
                ]
            },
            options: {
                responsive: true,
                interaction: {
                    mode: 'index',
                    intersect: false
                },
                scales: {
                    x: {
                        ticks: {
                            maxRotation: 90,
                            minRotation: 45,
                            color: '#555'
                        },
                        stacked: false
                    },
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: val => val.toLocaleString('fa-IR') + ' ت',
                            color: '#333'
                        },
                        title: {
                            display: true,
                            text: 'درآمد (تومان)',
                            font: { size: 14 },
                            color: '#333'
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
                                return ctx.dataset.label + ': ' + ctx.raw.toLocaleString('fa-IR') + ' تومان';
                            }
                        }
                    },
                    legend: {
                        labels: {
                            usePointStyle: true,
                            pointStyle: 'circle',
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



