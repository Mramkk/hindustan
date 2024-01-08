<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--favicon-->
    <!--<link rel="shortcut icon" href="{{ asset('public/favicon.ico') }}" type="image/x-icon" />-->

    <title>@yield('title')</title>

    <!--plugins-->
    <link href="{{ asset('public/assets/admin/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('public/assets/admin/assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/assets/admin/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('public/assets/admin/assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
    <!-- loader-->
    <link href="{{ asset('public/assets/admin/assets/css/pace.min.css') }}" rel="stylesheet" />
    {{-- <script src="{{ asset('public/assets/admin/assets/js/pace.min.js') }}"></script> --}}
    <!-- Bootstrap CSS -->
    <link href="{{ asset('public/assets/admin/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/admin/assets/css/bootstrap-extended.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
    <link href="{{ asset('public/assets/admin/assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/admin/assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/admin/assets/css/icons.css') }}" rel="stylesheet">
    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="{{ asset('public/assets/admin/assets/css/dark-theme.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/assets/admin/assets/css/semi-dark.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/assets/admin/assets/css/header-colors.css') }}" />



    @yield('admin-css')

</head>

<body>

    <!-- wrapper -->
    <div class="wrapper">

        <!-- sidebar wrapper -->
        @include('admin.layouts.sidebar')


        <!-- header -->
        @include('admin.layouts.header')


        <!--start page wrapper -->
        <div class="page-wrapper">
            <div class="page-content">

                <!--breadcrumb-->
                @include('admin.layouts.breadcrumb')

                @yield('main-content')



            </div>
        </div>
        <!--end page wrapper -->

        <!--start overlay-->
        <div class="overlay toggle-icon"></div>
        <!--end overlay-->
        <!--Start Back To Top Button-->
        <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->
        <footer class="page-footer">
            <p class="mb-0">Copyright © {{ now()->year }}. All right reserved.</p>
        </footer>
    </div>
    <!--end wrapper-->











    <!-- Bootstrap JS -->
    <script src="{{ asset('public/assets/admin/assets/js/bootstrap.bundle.min.js') }}"></script>
    <!--plugins-->
    <script src="{{ asset('public/assets/admin/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('public/assets/admin/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('public/assets/admin/assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('public/assets/admin/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('public/assets/admin/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('public/assets/admin/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('public/assets/admin/assets/plugins/chartjs/js/chart.js') }}"></script>
    {{-- <script src="{{ asset('public/assets/admin/assets/js/index.js') }}"></script> --}}
    <!--app JS-->
    <script src="{{ asset('public/assets/admin/assets/js/app.js') }}"></script>
    <script src="{{ asset('public/assets/admin/assets/js/service.js') }}"></script>
    <script src="{{ asset('public/assets/admin/assets/js/script.js') }}"></script>

    <script>
        new PerfectScrollbar(".app-container")
    </script>

    @yield('admin-js')

</body>

</html>
