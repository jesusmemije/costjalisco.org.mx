<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="">
        <meta name="author" content="PICE Software">
        <title>@yield('title', 'Iniciativa de transparencia') | CoST-Jalisco</title>
        <!-- Custom fonts for this template-->
        <link href="{{asset("admin_assets/vendor/fontawesome-free/css/all.min.css")}}" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <!-- Custom styles for this template-->
        <link href="{{asset("admin_assets/css/sb-admin-2.min.css")}}" rel="stylesheet">
        
        
        @yield('styles')
        <style>


</style>

    </head>
    <body id="page-top">
        <!-- Page Wrapper -->
        <div id="wrapper">
            <!-- Sidebar -->
            @include("admin/layouts/partials/menu")
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
                <!-- Main Content -->
                <div id="content">
                    <!-- Topbar -->
                    @include("admin/layouts/partials/header")
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        <!-- Content -->
                        @yield('content')
                        <!-- End of Content -->
                    </div>
                    <!-- End Page Content -->
                </div>
                <!-- Footer -->
                @include("admin/layouts/partials/footer")
                <!-- End of Footer -->
            </div>
        </div>
        <!-- Bootstrap core JavaScript-->
        <script type="text/javascript" src="{{asset("admin_assets/vendor/jquery/jquery.min.js")}}"></script>
        <script type="text/javascript" src="{{asset("admin_assets/vendor/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
        <!-- Core plugin JavaScript-->
        <script type="text/javascript" src="{{asset("admin_assets/vendor/jquery-easing/jquery.easing.min.js")}}"></script>
        <!-- Custom scripts for all pages-->
        <script type="text/javascript" src="{{asset("admin_assets/js/sb-admin-2.min.js")}}"></script>
        @yield('scripts')
    </body>
</html>