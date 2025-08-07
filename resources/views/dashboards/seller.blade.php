<div class="wrapper">
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">

                    <div class="row align-items-center mb-2">
                        <div class="col">
                            <h1 class="h1 page-title">خوش آمدید {{ session('user')->name }} {{ session('user')->family }}!</h1>
                        </div>
                    </div>

                    <div class="row justify-content-center align-items-stretch">

                        <!-- پیغام‌های اخیر (شبیه سفارشات خریدار) -->
                        <div class="col-lg-4 col-md-12 mb-4">
                            <div class="card timeline shadow h-100">
                                <div class="card-header bg-primary text-white">
                                    <strong class="card-title">پیغام‌های اخیر</strong>
                                </div>
                                <div class="card-body" data-simplebar style="max-height: 355px; overflow-y: auto;">
                                    @if(isset($messages) && count($messages) > 0)
                                        @foreach($messages as $message)
                                            <div class="timeline-item border-bottom pb-3 mb-3">
                                                <strong class="d-block">{{ $message->subject }}</strong>
                                               <a href="{{route('messenger.manage')}}"><span class="text-muted">برای دیدن جزییات کلیک کنید</span></a>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="text-center text-muted">پیغامی وجود ندارد</div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- اطلاعات کاربر -->
                        <div class="col-lg-4 col-md-12 mb-4">
                            <div class="card shadow text-center mb-4 h-100">
                                <div class="card-body">
                                    <h4 class="mb-3">ایمیل</h4>
                                    <h6 class="text-primary">{{ session('user')->email }}</h6>
                                    <hr class="my-4">
                                    <div class="row">
                                        <div class="col-6">
                                            <h5 class="mb-2">تعداد سفارشات</h5>
                                            <span class="text-success fw-bold">0</span>
                                        </div>
                                        <div class="col-6">
                                            <h5 class="mb-2">مجموع خریدها</h5>
                                            <span class="text-success fw-bold">0 تومان</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- تصویر دسته‌بندی -->
                        <div class="col-lg-4 col-md-12 mb-4 d-flex justify-content-center align-items-center">
                            <div class="card shadow h-100 w-100 text-center">
                                <div class="card-body d-flex justify-content-center align-items-center">
                                    <img src="{{ asset('img/category.png') }}"
                                         alt="لوگوی دسته‌بندی"
                                         class="img-fluid rounded shadow"
                                         style="max-height: 300px;">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- نمودار پای درصد فروش محصولات -->
                    <div class="row">
                        <div class="col-md-12 my-4">
                            <div class="card shadow rounded-4">
                                <div class="card-header d-flex justify-content-between align-items-center bg-primary text-white rounded-top-4 py-3">
                                    <h5 class="mb-0">📊 درصد فروش محصولات</h5>
                                </div>
                                <div class="card-body bg-light-subtle rounded-bottom-4 p-4">
                                    <canvas id="productSalesChart" style="max-width: 600px; max-height: 400px; margin: auto;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                </div> <!-- .col-12 -->
            </div> <!-- .row -->
        </div> <!-- .container-fluid -->
    </main>

</div> <!-- .wrapper -->

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const ctx = document.getElementById('productSalesChart').getContext('2d');

        // داده‌ها از PHP (با json_encode)
        const labels = {!! json_encode(array_keys($salle)) !!};
        const dataValues = {!! json_encode(array_values($salle)) !!};

        // رنگ‌های زیبا و متنوع برای بخش‌ها
        const backgroundColors = [
            '#4e73df', '#1cc88a', '#36b9cc', '#f6c23e', '#e74a3b', '#858796', '#fd7e14', '#6f42c1'
        ];

        const hoverColors = [
            '#2e59d9', '#17a673', '#2c9faf', '#dda20a', '#be2617', '#6c757d', '#d46007', '#59359c'
        ];

        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    data: dataValues,
                    backgroundColor: backgroundColors,
                    hoverBackgroundColor: hoverColors,
                    borderColor: '#fff',
                    borderWidth: 2,
                    // سایه برای بخش‌ها
                    shadowOffsetX: 0,
                    shadowOffsetY: 0,
                    shadowBlur: 15,
                    shadowColor: 'rgba(0, 0, 0, 0.15)',
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            font: {
                                size: 14,
                                weight: 'bold',
                            },
                            padding: 20,
                            boxWidth: 20,
                            color: '#333',
                        }
                    },
                    tooltip: {
                        enabled: true,
                        callbacks: {
                            label: context => {
                                const label = context.label || '';
                                const value = context.parsed || 0;
                                const total = context.chart._metasets[context.datasetIndex].total;
                                const percentage = ((value / total) * 100).toFixed(1);
                                return `${label}: ${value} (${percentage}%)`;
                            }
                        }
                    },
                },
                animation: {
                    animateRotate: true,
                    animateScale: true,
                    duration: 1500,
                    easing: 'easeOutBounce',
                },
            }
        });
    });
</script>




