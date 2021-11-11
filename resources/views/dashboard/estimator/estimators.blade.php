@extends('layouts.dashboard.app')
@section('content')

    <br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h3 class="card-title">
                          <a href="/dashboard/estimate/create" class="btn btn-primary">
                              Create
                          </a>
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <table class="table table-bordered">
                             <thead>
                                <tr>
                                    <td>
                                        id
                                    </td>
                                    <td>
                                        question
                                    </td>
                                    <td>
                                        type
                                    </td>
                                </tr>
                             </thead>

                            <tbody>
                            @foreach($questions as $question)
                                <tr>
                                    <td>{{$question->id}}    </td>
                                    <td>{{$question->question}}    </td>
                                    <td>{{$question->type}}    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>

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

@endsection
