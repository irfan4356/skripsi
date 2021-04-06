<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Matrix lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Matrix admin lite design, Matrix admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="Matrix Admin Lite Free Version is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>@yield('title')</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('style/assets/images/favicon.png')}}">
    <!-- Custom CSS -->
    <link href="{{ asset('style/assets/libs/flot/css/float-chart.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('style/dist/css/style.min.css')}}" rel="stylesheet">
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    {{-- <!--[if lt IE 9]>
    
<![endif]--> --}}
</head>
<body>
    <div id="app">

            @include('includes.navbar')
        <main class="py-4">
            @include('includes.info')
            @yield('content')
            @include('includes.sidebar')
            @include('includes.footer')

        </main>
    </div>

    <script src="{{ asset('style/assets/libs/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('style/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('style/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')}}"></script>
    <script src="{{ asset('style/assets/extra-libs/sparkline/sparkline.js')}}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('style/dist/js/waves.js')}}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('style/dist/js/sidebarmenu.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('style/dist/js/custom.min.js')}}"></script>
    <!--This page JavaScript -->
    <!-- <script src="{{ asset('style/dist/js/pages/dashboards/dashboard1.js')}}"></script> -->
    <!-- Charts js Files -->
    <script src="{{ asset('style/assets/libs/flot/excanvas.js')}}"></script>
    <script src="{{ asset('style/assets/libs/flot/jquery.flot.js')}}"></script>
    <script src="{{ asset('style/assets/libs/flot/jquery.flot.pie.js')}}"></script>
    <script src="{{ asset('style/assets/libs/flot/jquery.flot.pie.js')}}"></script>
    <script src="{{ asset('style/assets/libs/flot/jquery.flot.time.js')}}"></script>
    <script src="{{ asset('style/assets/libs/flot/jquery.flot.stack.js')}}"></script>
    <script src="{{ asset('style/assets/libs/flot/jquery.flot.crosshair.js')}}"></script>
    <script src="{{ asset('style/assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js')}}"></script>
    <script src="{{ asset('style/dist/js/pages/chart/chart-page-init.js')}}"></script>
@yield('js')
</body>
</body>