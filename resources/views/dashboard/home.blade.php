<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Taqana home</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('dashboard/plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/plugins/summernote/summernote-bs4.min.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
    <link
        rel="stylesheet"
        href="https://unpkg.com/filepond/dist/filepond.min.css"
    />
    <link
        rel="stylesheet"
        href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css"
    />

    <script>
        window.User = {
            id: {{ optional(auth()->user())->id}},
            name: '{{ optional(auth()->user())->name}}',
            avatar: '{{ optional(auth()->user())->avatar}}',


        }

    </script>
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div id="app">


    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="dashboard/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60"
                 width="60">
        </div>

        <!-- Navbar -->
        @include('layouts.dashboard.nav-bar')
        <sidebar></sidebar>

        <!-- /.navbar -->

        <!-- Main Sidebar Container -->

        <div class="content-wrapper">


            <app>

            </app>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2020-2021 <a href="/">Taqanh </a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0
            </div>
        </footer>
    </div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->

<script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('dashboard/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('dashboard/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<script src="{{asset('dashboard/dist/js/adminlte.js')}}"></script>
<script src="{{asset('dashboard/plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
<script src="{{asset('dashboard/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{asset('dashboard/plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
<script src="{{asset('dashboard/plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>
<script src="{{asset('dashboard/plugins/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('dashboard/plugins/summernote/summernote-bs4.min.js')}}"></script>

<script src="{{asset('dashboard/dist/js/pages/dashboard2.js')}}"></script>
<script src="{{asset('dashboard/plugins/sweetalert2/sweetalert2.min.js')}}"></script>

<script src="https://unpkg.com/filepond-plugin-image-preview"></script>
<script src="https://unpkg.com/filepond"></script>
<script src="https://unpkg.com/vue"></script>
<script src="https://unpkg.com/vue-filepond@6"></script>
</body>
</html>
