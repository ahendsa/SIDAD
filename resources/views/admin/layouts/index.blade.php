<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Vertical | Vuesy - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('admin/images/favicon.ico') }}">
    <!-- plugin css -->
    <!-- Sweet Alert-->
    <link href="{{ asset('admin/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="{{ asset('admin/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css">
    <!-- Icons Css -->
    <link href="{{ asset('admin/css/icons.min.css') }}" rel="stylesheet" type="text/css">
    <!-- App Css-->
    <link href="{{ asset('admin/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css">




</head>

<body data-topbar="dark" data-sidebar="dark" data-layout-mode="dark">

    <!-- Begin page -->
    <div id="layout-wrapper">
        @include('admin.layouts.header')


        <!-- ========== Left Sidebar Start ========== -->
        @include('admin.layouts.leftsidebar')
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            @yield('content')

            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->


    </div>
    <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Right Sidebar -->

    <!-- /Right-bar -->

    <!-- Right bar overlay-->

    @include('admin.layouts.footer')


    <!-- JAVASCRIPT -->
    <!modal--->
        //


        <!-- JAVASCRIPT -->
        <script src="{{ asset('admin/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('admin/libs/metismenujs/metismenujs.min.js') }}"></script>
        <script src="{{ asset('admin/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('admin/libs/feather-icons/feather.min.js') }}"></script>

        <!-- Sweet Alerts js -->
        <script src="{{ asset('admin/libs/sweetalert2/sweetalert2.min.js') }}"></script>

        <!-- Sweet alert init js-->
        <script src="{{ asset('admin/js/pages/sweet-alerts.init.js') }}assets/js/pages/sweet-alerts.init.js"></script>

        <script src="{{ asset('admin/js/app.js') }}"></script>
        @stack('myscript')



</body>

</html>
