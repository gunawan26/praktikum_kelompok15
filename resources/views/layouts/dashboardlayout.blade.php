<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard</title>
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
        <nav class="side-navbar">
                <div class="side-navbar-wrapper">
                  <!-- Sidebar Header    -->
                  <div class="sidenav-header d-flex align-items-center justify-content-center">
                    <!-- User Info-->
                    <div class="sidenav-header-inner text-center"><img src="{{asset('img/avatar-5.jpg')}}" alt="person" class="img-fluid rounded-circle">
                      <h2 class="h6">Mitra Rentcar</h2><span>Pemilik Mobil</span>
                    </div>
                    <!-- Small Brand information, appears on minimized sidebar-->
                    <div class="sidenav-header-logo"><a href="index.html" class="brand-small text-center"> <strong>T</strong><strong class="text-primary">I</strong></a></div>
                  </div>
                  <!-- Sidebar Navigation Menus-->
                  <div class="main-menu">
                    <h5 class="sidenav-heading">Menu</h5>
                    <ul id="side-main-menu" class="side-menu list-unstyled">                  
                      <li><a href="{{route('dashboard.home')}}"> <i class="icon-home"></i>Home                             </a></li>
                      <li><a href="{{route('kendaraan.index')}}"> <i class="icon-form"></i>Kendaraan                             </a></li>
                      <li><a href="{{route('dashboard.riwayat')}}"> <i class="icon-grid"></i>Riwayat Transaksi                             </a></li>
                      <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Dropdown</a>
                        <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                          <li><a href="#">Halaman</a></li>
                          <li><a href="#">Halaman</a></li>
                          <li><a href="#">Halaman</a></li>
                        </ul>
                      </li>
              
                    </ul>
                  </div>
                  
                </div>
              </nav>
        <div class="page">
                <header class="header">
                    <nav class="navbar">
                        <div class="container-fluid">
                        <div class="navbar-holder d-flex align-items-center justify-content-between">
                            <div class="navbar-header"><a id="toggle-btn" href="#" class="menu-btn"><i class="icon-bars"> </i></a><a href="index.html" class="navbar-brand">
                                <div class="brand-text d-none d-md-inline-block"><span>Rental</span><strong class="text-primary">  Mobil</strong></div></a></div>
                            <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                            <form action="{{route('pemilik.logout')}}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-success my-3 my-sm-0"><i class="fa fa-sign-out"></i>Logout</button>
  
                                       {{-- <li class="nav-item"><a href="login.html" > </a></li> --}}
                           
                                    </form>
                            </ul>
                        </div>
                        </div>
                    </nav>
                </header>
                @yield('content')
                <footer class="main-footer">
                    <div class="container-fluid">
                        <div class="row">
                        <div class="col-sm-6">
                            <p>Prognet &copy; 2018-2019</p>
                        </div>
                        <div class="col-sm-6 text-right">
                            <p>Rental<a href="https://bootstrapious.com" class="external">Mobil</a></p>
                            <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions and it helps me to run Bootstrapious. Thank you for understanding :)-->
                        </div>
                        </div>
                    </div>
                </footer>
                    
        </div>
  
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    {{-- <script src="vendor/popper.js/umd/popper.min.js"> </script> --}}
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    {{-- <script src="js/grasp_mobile_progress_circle-1.0.0.min.js"></script> --}}
    {{-- <script src="vendor/jquery.cookie/jquery.cookie.js"> </script> --}}
    {{-- <script src="vendor/chart.js/Chart.min.js"></script> --}}
    {{-- <script src="vendor/jquery-validation/jquery.validate.min.js"></script> --}}
    {{-- <script src="vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script> --}}
    {{-- <script src="js/charts-home.js"></script> --}}
    <!-- Main File-->
    <script src="{{ asset('js/front.js') }}"></script>

</body>
</html>