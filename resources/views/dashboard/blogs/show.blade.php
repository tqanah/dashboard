@extends('layouts.dashboard.app')
@section('content')
    <br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h3 class="card-title">
                            {{ $blog->title }}
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <img src=" {{$blog->getFirstMediaUrl()}}" width="400px" height="100px">
                    
                        {!! $blog->body !!}
                    </div>
                    <div class="card-footer">


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- summernote css/js -->

@endsection
@section('js')
    <script>
        $('#summernote').summernote({
            placeholder: 'Hello stand alone ui',
            tabsize: 2,
            height: 120,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });


    </script>
@endsection
