<body class="vertical  light rtl ">
<div class="wrapper">


    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">

                    <div class="row my-4">
                        <div class="col-md-12">
                            <div class="card shadow mb-4">
                                <div class="card-header">
                                    <strong class="card-title">لیست تیکت‌ها</strong>
                                    @if (session('success'))
                                        <div class="alert alert-success fade-in auto-dismiss" id="success-alert">
                                            <i class="fe fe-check-circle mr-2"></i>
                                            {{ session('success') }}
                                        </div>


                                    @endif
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul style="padding-right: 20px; margin: 0;">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <span class="float-right">
            <i class="fe fe-message-circle mr-2"></i>{{ count($tickets) }}
        </span>
                                </div>

                                <div class="card-body">
                                    @foreach($tickets as $ticket)
                                        <div class="row align-items-center mb-4">
                                            <div class="col">
                                                @foreach($users as $user)
                                                    @if($user->id == $ticket->sender)
                                                        <strong>{{ $user->name . ' ' . $user->family }}</strong>
                                                    @endif
                                                @endforeach
                                                <div class="mb-2">{!! $ticket->text !!}</div>
                                                <small class="text-muted">
                                                    {{ \Morilog\Jalali\Jalalian::fromDateTime($ticket->created_at)->format('%d %B %Y - ساعت %H:%M') }}
                                                </small>
                                            </div>
                                        </div>
                                    @endforeach

                                    {{-- پاسخ جدید --}}
                                    <h6 class="mb-3">پاسخ</h6>

                                        <form action="{{ route('ticket.add', $id) }}" method="POST" id="replyForm">
                                            @csrf
                                            <div class="form-group">
                                                <label for="ticketReply">متن پاسخ</label>
                                                <textarea id="ticketReply" name="text" class="form-control" rows="5"></textarea> {{-- required حذف شد --}}
                                            </div>
                                            <div class="d-flex justify-content-end mt-3">
                                                <button type="submit" class="btn btn-success">ثبت پاسخ</button>
                                            </div>
                                        </form>


                                </div>
                            </div>



                        </div> <!-- .col-md -->

                    </div> <!-- .col-md -->
                </div>
            </div> <!-- .col-12 -->
        </div> <!-- .row -->

    </main> <!-- main -->
</div> <!-- .wrapper -->
{{-- CKEditor --}}
{{-- CKEditor --}}
<script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>
<script>
    let ticketEditor;
    ClassicEditor
        .create(document.querySelector('#ticketReply'), {
            language: 'fa',
            toolbar: [
                'undo', 'redo', '|',
                'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|',
                'blockQuote', 'insertTable', 'codeBlock', 'mediaEmbed'
            ]
        })
        .then(editor => {
            ticketEditor = editor;
            editor.ui.view.editable.element.style.minHeight = '150px';

            document.getElementById('replyForm').addEventListener('submit', function(e) {
                if(ticketEditor.getData().trim() === '') {
                    e.preventDefault();
                    alert('لطفا متن پاسخ را وارد کنید.');
                    ticketEditor.editing.view.focus();
                } else {
                    ticketEditor.updateSourceElement();
                }
            });
        })
        .catch(error => {
            console.error('CKEditor Error:', error);
        });
</script>

</body>
</html>
