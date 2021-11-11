@extends('layouts.dashboard.app')
@section('content')

    <br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h3 class="card-title">
                            Question
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">


                        <form method="post" action="{{ route('estimate.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Question</label>
                                        <textarea id="summernote" name="question">

                                        </textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Type </label>
                                        <select class="form-control select2"  id="type" name="type" style="width: 100%;">
                                            <option value="">chose ...</option>
                                            <option value="MCQ">MCQ</option>
                                            <option value="TF">TF</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row" id="MCQ" style="display: none">
                                @for($i=0; $i<4; $i++)
                                    <div class="col-12">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-8">
                                                    <div class="form-group">
                                                        <label> {{$i+1}} -الاجابه </label>
                                                        <input type="text" name="ans[]" class="form-control">

                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label>التكلفة  {{$i+1}} </label>
                                                        <input type="number" name="ansCost[]" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endfor
                            </div>

                            <div class="row" id="TF" style="display: none">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label> نعم</label>
                                        <input type="number" name="costT" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label> لا</label>
                                        <input type="number"  name="costF" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary"> Submit</button>
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


        const inputElement = document.querySelector('input[type="filee"]');


        $(document).ready(function () {
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
                    ['insert', ['video', 'media', 'link', 'hr']],
                    ['view', ['fullscreen', 'codeview', 'help']],
                    ['fontsize', ['fontsize']],

                ]
            });
        });
    </script>
    <script>

        $(document).ready(function () {

            $('#type').on('change', function() {
              if($('#type').val()=='MCQ')
              {
                  $('#MCQ').css('display', 'block');
                  $('#TF').css('display', 'none');

              }
              else if($('#type').val()=='TF')
              {
                  $('#MCQ').css('display', 'none');
                  $('#TF').css('display', 'block');

              }
              else
              {
                  $('#MCQ').css('display', 'none');
                  $('#TF').css('display', 'none');

              }
            });

        });
    </script>
@endsection
