
<main role="main" class="main-content">

    <div class="container d-flex justify-content-center">
        <div class="col-lg-10 bg-white rounded-4 shadow p-5 position-relative overflow-hidden animate__animated animate__fadeIn"
             style="background: linear-gradient(135deg, #f0f0f0 0%, #e0f7fa 100%), url('{{ asset('img/images/bg-leaves-img-pattern.png') }}') no-repeat right bottom / contain;">

            {{-- هدر فرم --}}
            <div class="d-flex align-items-center gap-3 mb-4 border-bottom pb-3">
                <i class="bi bi-pencil-square fs-3 text-primary"></i>
                <h2 class="fw-bold m-0">ثبت تیکت جدید</h2>
            </div>

            {{-- پیام موفقیت --}}
            @if (session('success'))
                <div class="alert alert-success fade-in auto-dismiss" id="success-alert">
                    <i class="fe fe-check-circle mr-2"></i> {{ session('success') }}
                </div>
            @endif

            {{-- پیام خطا --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0 ps-4">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- فرم تیکت --}}
            <form action="{{ route('ticket.start') }}" method="POST" class="needs-validation" novalidate>
                @csrf

                <div class="row mb-4">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <label for="subject" class="form-label fw-semibold">موضوع تیکت <span class="text-danger">*</span></label>
                        <input type="text" id="subject" name="subject"
                               class="form-control form-control-lg border-primary shadow-sm"
                               required placeholder="مثلاً مشکل در پرداخت">
                        <div class="invalid-feedback">موضوع تیکت الزامی است.</div>
                    </div>
                    <div class="col-md-6">
                        <label for="type" class="form-label fw-semibold">نوع تیکت <span class="text-danger">*</span></label>
                        <select id="type" name="company"
                                class="form-select form-select-lg border-primary shadow-sm"
                                required>
                            <option value="" disabled selected>انتخاب کنید...</option>
                            <option value="owner">ارتباط با مدیریت اصلی</option>
                            <option value="order">بخش سفارشات</option>
                            <option value="salle">بخش فروش</option>
                            <option value="product">بخش محصولات</option>
                            <option value="shop">بخش فروشگاه‌ها</option>
                            <option value="content">محتوای سایت</option>
                            <option value="comment">نظرات و کامنت‌ها</option>
                        </select>
                        <div class="invalid-feedback">لطفاً نوع تیکت را انتخاب کنید.</div>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="message" class="form-label fw-semibold">متن پیام <span class="text-danger">*</span></label>
                    <textarea id="message" name="text" class="form-control" required></textarea>
                    <div class="invalid-feedback">لطفاً متن پیام را وارد کنید.</div>
                </div>

                <div class="d-flex justify-content-end gap-3 mt-4">

                    <button type="submit" class="btn btn-primary btn-lg px-4 shadow">
                        <i class="bi bi-send me-1"></i> ارسال تیکت
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>

{{-- CKEditor --}}
<script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#message'), {
            language: 'fa',
            toolbar: {
                items: [
                    'undo', 'redo', '|',
                    'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|',
                    'blockQuote', 'insertTable', 'codeBlock', 'mediaEmbed'
                ]
            }
        })
        .then(editor => {
            editor.ui.view.editable.element.style.minHeight = '180px'; // ارتفاع کوتاه‌تر
        })
        .catch(error => {
            console.error(error);
        });
</script>

{{-- انیمیشن Animate.css --}}
<link href="https://cdn.jsdelivr.net/npm/animate.css@4.1.1/animate.min.css" rel="stylesheet">
