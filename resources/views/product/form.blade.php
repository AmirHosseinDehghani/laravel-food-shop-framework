<!doctype html>
<html lang="en">
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
                    <h2 class="page-title">ثبت محصول</h2>
                    <p class="text-muted">محصولات درجه یک خود را برای فروش ثبت کنید.</p>

                    <!-- بخش نمایش خطاها -->
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
                                                <li>{{ str_replace(['description', 'price', 'name', 'shop'],
                        ['توضیحات محصول', 'قیمت محصول', 'نام محصول', 'فروشگاه'], $error) }}</li>
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
                                <strong class="card-title">فرم ثبت محصول</strong>
                            </div>
                            <div class="card-body">
                                <form method="post" action="{{ route('product.store') }}"  enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="name">نام محصول</label>
                                            <input name="name" type="text" class="form-control"
                                                   value="{{ old('name') }}" placeholder="نام محصول" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="description">توضیحات محصول</label>
                                            <textarea name="description" class="form-control" rows="2"
                                                      placeholder="توضیحات محصول"
                                                      required>{{ old('description') }}</textarea>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="price">قیمت محصول (تومان)</label>
                                            <input name="price" type="text" class="form-control"
                                                   value="{{ old('price') }}" placeholder="مثال: 250000" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="shop">محل فروش</label>
                                            <select name="shop" class="form-control" required>
                                                <option value="">انتخاب محل فروش</option>
                                                @foreach($shops as $shop)
                                                    <option
                                                        value="{{ $shop->id }}" {{ old('shop') == $shop->id ? 'selected' : '' }}>
                                                        {{ $shop->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="shop">دسته بندی محصول</label>
                                            <select name="category" class="form-control" required>
                                                <option value="">انتخاب دسته بندی محصول</option>
                                                @foreach($categories as $category)
                                                    <option
                                                        value="{{ $category->id }}" {{ old('$category') == $category->id ? 'selected' : '' }}>
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="shop">نوع فروش</label>
                                            <select name="type" class="form-control" required>
                                                <option >انتخاب نوع فروش</option>
                                                    <option
                                                        value="kilo" >
                                                        کیلویی
                                                    </option>
                                                <option
                                                    value="package">
                                                    بسته ای
                                                </option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4 mb-3">
                                            <label for="example-fileinput">Default file input</label>
                                            <input name="url" type="file" id="example-fileinput" class="form-control-file" required>
                                        </div>
                                    </div>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fe fe-save mr-2"></i> ثبت محصول
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
</html>

