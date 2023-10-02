<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('admin/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/base/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('admin/images/favicon.png') }}" />

    <style>
        .loader {
            position: fixed;
            z-index: 99999;
            background: #ffffff;
            padding-top: 19%;
            padding-left: 42%;
            margin: 0 auto;
            width: 100%;
            height: 100%;
        }
    </style>


    @livewireStyles
</head>

<body>
    <div class="loader">
        <img src="{{ asset('images\loader.svg') }}">
    </div>
    <div class="container-scroller">
        @include('layouts.inc.admin.navbar')
        <div class="container-fluid page-body-wrapper">
            @include('layouts.inc.admin.sidebar')

            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content')
                </div>
            </div>



            <!-- plugins:js -->
            <script src="{{ asset('admin/vendors/base/vendor.bundle.base.js') }}"></script>
            <!-- endinject -->
            <!-- Plugin js for this page-->
            <script src="{{ asset('admin/vendors/datatables.net/jquery.dataTables.js') }}"></script>
            <script src="{{ asset('vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
            <!-- End plugin js for this page-->
            <!-- inject:js -->
            <script src="{{ asset('admin/js/off-canvas.js') }}"></script>
            <script src="{{ asset('admin/js/hoverable-collapse.js') }}"></script>
            <script src="{{ asset('admin/js/template.js') }}"></script>
            <!-- endinject -->
            <!-- Custom js for this page-->
            <script src="{{ asset('admin/js/dashboard.js') }}"></script>
            <script src="{{ asset('admin/js/data-table.js') }}"></script>
            <script src="{{ asset('admin/js/jquery.dataTables.js') }}"></script>
            <script src="{{ asset('admin/js/dataTables.bootstrap4.js') }}"></script>
            <!-- End custom js for this page-->


            {{-- Loading Spinner --}}
            <script>
                $(function() {
                    setTimeout(() => {
                        $('.loader').fadeOut(800);
                    }, 2000);
                })
            </script>


            @livewireScripts


</body>

</html>