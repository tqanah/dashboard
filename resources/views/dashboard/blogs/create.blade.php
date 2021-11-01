@extends('layouts.dashboard.app')
@section('content')

    <br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h3 class="card-title">
                            Summernote
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">


                        <form method="post" action="{{ route('blog.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select class="form-control select2" name="categories_id[]" style="width: 100%;"
                                            multiple>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Time to read in (min)</label>
                                        <input type="number" class="form-control" name="time_read">

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Main image</label>
                                        <input type="file" name="image" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" class="form-control" name="title">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Body</label>
                                        <textarea id="summernote" name="body">

                                            </textarea>
                                    </div>
                                </div>
                            </div>


                            <button class="btn btn-primary"> submit</button>
                        </form>

                    </div>
                    <div class="card-footer">

                    </div>
                </div>
            </div>
            <!-- /.col-->
        </div>
    </div>
    <!-- summernote css/js -->

@endsection
@section('js')
<link rel="stylesheet" href="summernote-audio.css">
<script type="text/javascript" src="summernote-audio.js"></script>
    <script>
        // Get a reference to the file input element
        const inputElement = document.querySelector('input[type="filee"]');

        // Create a FilePond instance
        const pond = FilePond.create(inputElement);
        FilePond.setOptions({
            server: {
                url: '/upload',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }

            }
        });

        $(document).ready(function() {
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
                    ['insert',['video','media','link','hr']],
                    ['view', ['fullscreen', 'codeview', 'help']],
                    ['fontsize', ['fontsize']],

                ]
            });
        });
    </script>
@endsection
