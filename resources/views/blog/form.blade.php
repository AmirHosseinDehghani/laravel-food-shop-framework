<!doctype html>
<html lang="en">
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

<style>
    .invalid-feedback {
        font-size: 0.85rem;
        color: #f46a6a;
        padding-right: 5px;
    }

    .is-invalid {
        border-color: #f46a6a !important;
    }

    .alert-danger {
        border-right: 4px solid #f46a6a;
    }

    input {
        font-size: 20px;
    }

    option {
        font-size: 20px;
    }

    textarea {
        font-size: 20px;
    }
</style>
<body class="vertical light rtl">
<div class="wrapper">
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h2 class="page-title">ثبت بلاگ</h2>
                    <p class="text-muted">بلاگ های خود را برای نمایش در صفه اصلی بنویسید .</p>


                    <div class="error-container">
                        @if (session('success'))
                            <div class="alert alert-success fade-in auto-dismiss">
                                <i class="fe fe-check-circle mr-2"></i>
                                {{ session('success') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div id="error-alert" class="alert alert-danger fade-in alert-autoclose" role="alert">
                                <div class="d-flex">
                                    <div class="mr-3">
                                        <i class="fe fe-alert-triangle fa-lg"></i>
                                    </div>
                                    <div>
                                        <h5 class="alert-heading mb-2">خطاهای زیر رخ داده است:</h5>
                                        <ul class="persian-list mb-0">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <button type="button" class="close mr-auto" onclick="dismissError()">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="card-deck">
                        <div class="card shadow mb-4">
                            <div class="card-header">
                                <strong class="card-title">فرم ثبت بلاگ</strong>
                            </div>
                            <div class="card-body">
                                <form method="post" action="{{ route('blog.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="name">موضوع بلاگ </label>
                                            <input name="subject" type="text" class="form-control" placeholder="موضوع بلاگ " required>
                                        </div>
                                        <div class="form-group col-md-4 mb-3">
                                            <label for="example-fileinput">عکس بلاگ</label>
                                            <input name="img" type="file" id="example-fileinput" class="form-control-file" required>
                                        </div>

                                        <!-- Editor Box -->

                                            <div class="col-md-12">
                                                <div class="card shadow">
                                                    <div class="card-body">
                                                        <h5 class="card-title">محتوای بلاگ</h5>
                                                        <div id="editor" style="min-height: 150px;font-size: 20px"></div>

                                                        <input style="min-height: 150px;font-size: 20px" type="hidden" name="blog" id="blog">
                                                    </div>
                                                </div>
                                            </div>

                                    </div>

                                    <button type="submit" class="btn btn-primary">
                                        <i class="fe fe-save mr-2"></i> ثبت بلاگ
                                    </button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<!-- اسکریپت های ضروری -->

</body>
<!-- Quill JS -->
<script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
<script>
    // راه‌اندازی Quill
    const quill = new Quill('#editor', {
        theme: 'snow',

        modules: {
            toolbar: [
                ['bold', 'italic', 'underline'],
                [{ 'header': [1, 2, 3, false] }],
                [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                ['link', 'image'],
                ['clean']
            ]
        }
    });

    // موقع submit فرم، محتوای Quill رو بریز تو hidden input
    document.querySelector('form').addEventListener('submit', function () {
        const html = quill.root.innerHTML;
        document.getElementById('blog').value = html;
    });
</script>

</html>

