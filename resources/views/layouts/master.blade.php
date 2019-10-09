<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Psicotec</title>
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Sistema de Test Vocacional" name="description" />
        <meta content="FarbeSystems" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        @include('layouts.head')
    </head>
    <body>
        <div id="app">
            <!-- Begin page -->
            <div id="wrapper">
                @include('layouts.navbar')
                @include('layouts.sidebar')
                <!-- ============================================================== -->
                <!-- Start right Content here -->
                <!-- ============================================================== -->
                <div class="content-page">
                    <!-- Start content -->
                    <div class="content">
                        <!-- Start Content-->
                        <div class="container-fluid" id="contenido">
                            @yield('content')
                        </div>
                        @include('layouts.right-sidebar')
                    </div> <!-- content -->
                    @include('layouts.footer')
                </div>
                <!-- ============================================================== -->
                <!-- End Right content here -->
                <!-- ============================================================== -->
            </div>
        <!-- END wrapper -->
        </div>
        @include('layouts.footer-scripts')
    </body>
</html>