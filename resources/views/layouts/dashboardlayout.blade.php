<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <!-- Font Awesome CSS-->
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    {{-- <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css"> --}}
    <!-- Fontastic Custom icon font-->
    {{-- <link rel="stylesheet" href="css/fontastic.css"> --}}
    <link href="{{ asset('css/fontastic.css') }}" rel="stylesheet">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <!-- jQuery Circle-->
    <link rel="stylesheet" href="{{asset('css/grasp_mobile_progress_circle-1.0.0.min.css')}}">
    
    <!-- Custom Scrollbar-->
    <link href="{{ asset('css/jquery.mCustomScrollbar.css') }}" rel="stylesheet">
    {{-- <link rel="stylesheet" href="vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css"> --}}
    <!-- theme stylesheet-->
    <link href="{{ asset('css/style.default.css') }}" rel="stylesheet">
    {{-- <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet"> --}}
    <!-- Custom stylesheet - for your changes-->
    {{-- <link rel="stylesheet" href="css/custom.css"> --}}
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">
    {{-- <link rel="shortcut icon" href="img/favicon.ico"> --}}
</head>
<body>
    @yield('content')
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/grasp_mobile_progress_circle-1.0.0.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/charts-home.js"></script>
    <!-- Main File-->
    <script src="js/front.js"></script>
</body>
</html>