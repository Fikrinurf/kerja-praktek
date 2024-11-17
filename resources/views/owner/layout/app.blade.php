<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pakuwonan Minisoccer</title>

    <!-- Meta -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">
    <link rel="shortcut icon" href="favicon.ico">

    <!-- FontAwesome JS-->
    <script defer src="{{ asset('admin/assets/plugins/fontawesome/js/all.min.js') }}"></script>

    <!-- App CSS -->
    <link id="theme-style" rel="stylesheet" href="{{ asset('admin/assets/css/portal.css') }}">
    @stack('css')
</head>

<body class="app">
    <header class="app-header fixed-top">
        <div class="app-header-inner">
            <div class="container-fluid py-2">
                <div class="app-header-content">
                    <div class="row justify-content-between align-items-center">

                        <div class="col-auto">
                            <a id="sidepanel-toggler" class="sidepanel-toggler d-inline-block d-xl-none" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                    viewBox="0 0 30 30" role="img">
                                    <title>Menu</title>
                                    <path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10"
                                        stroke-width="2" d="M4 7h22M4 15h22M4 23h22"></path>
                                </svg>
                            </a>
                        </div><!--//col-->
                        <div class="search-mobile-trigger d-sm-none col">
                            <i class="search-mobile-trigger-icon fa-solid fa-magnifying-glass"></i>
                        </div><!--//col-->
                    </div><!--//row-->
                </div><!--//app-header-content-->
            </div><!--//container-fluid-->
        </div><!--//app-header-inner-->
        @include('owner.layout.sidebar')
    </header><!--//app-header-->

    <div class="app-wrapper">

        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">


                @yield('content')

            </div><!--//container-fluid-->
        </div><!--//app-content-->

        @include('admin.layout.footer')

    </div><!--//app-wrapper-->


    <!-- Javascript -->
    <script src="{{ asset('admin/assets/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- Page Specific JS -->
    <script src="{{ asset('admin/assets/js/app.js') }}"></script>
    @stack('js')
</body>

</html>
