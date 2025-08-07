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
                        <div class="col-md-12 my-6">
                            <div class="card shadow">
                                <div class="card-body text-center">
                                    <h5 class=" mb-3">ایمیل<strong></strong></h5>
                                    <div>
                                        <h6 class=" mb-3"><strong></strong> {{session('user')->email}}</h6>
                                    </div>
                                </div> <!-- / .card-body -->
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-12 my-4 mx-auto">
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

                </div>
            </div>
        </div>


    </main> <!-- main -->
</div> <!-- .wrapper -->



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




