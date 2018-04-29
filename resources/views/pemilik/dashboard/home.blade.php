@extends('layouts.dashboardlayout')
@section('content')

<nav class="side-navbar">
        <div class="side-navbar-wrapper">
          <!-- Sidebar Header    -->
          <div class="sidenav-header d-flex align-items-center justify-content-center">
            <!-- User Info-->
            <div class="sidenav-header-inner text-center"><img src="img/avatar-6.jpg" alt="person" class="img-fluid rounded-circle">
              <h2 class="h6">Yuss</h2><span>Pemilik Mobil</span>
            </div>
            <!-- Small Brand information, appears on minimized sidebar-->
            <div class="sidenav-header-logo"><a href="index.html" class="brand-small text-center"> <strong>T</strong><strong class="text-primary">I</strong></a></div>
          </div>
          <!-- Sidebar Navigation Menus-->
          <div class="main-menu">
            <h5 class="sidenav-heading">Menu</h5>
            <ul id="side-main-menu" class="side-menu list-unstyled">                  
              <li><a href="index.html"> <i class="icon-home"></i>Home                             </a></li>
              <li><a href="profil.html"> <i class="icon-form"></i>Profil                             </a></li>

              <li><a href="informasi.html"> <i class="icon-grid"></i>Informasi                             </a></li>
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
        <!-- navbar-->
        <header class="header">
          <nav class="navbar">
            <div class="container-fluid">
              <div class="navbar-holder d-flex align-items-center justify-content-between">
                <div class="navbar-header"><a id="toggle-btn" href="#" class="menu-btn"><i class="icon-bars"> </i></a><a href="index.html" class="navbar-brand">
                    <div class="brand-text d-none d-md-inline-block"><span>Rental</span><strong class="text-primary">  Mobil</strong></div></a></div>
                <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                  <!-- Notifications dropdown-->
                  <li class="nav-item dropdown"> <a id="notifications" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-bell"></i><span class="badge badge-warning">12</span></a>
                    <ul aria-labelledby="notifications" class="dropdown-menu">
                      <li><a rel="nofollow" href="#" class="dropdown-item"> 
                          <div class="notification d-flex justify-content-between">
                            <div class="notification-content"><i class="fa fa-envelope"></i>6 pesan baru </div>
                            <div class="notification-time"><small>4 menit yang lalu</small></div>
                          </div></a></li>
                     <li><a rel="nofollow" href="#" class="dropdown-item"> 
                          <div class="notification d-flex justify-content-between">
                            <div class="notification-content"><i class="fa fa-envelope"></i>2 pesan baru </div>
                            <div class="notification-time"><small>4 menit yang lalu</small></div>
                          </div></a></li>
                        <li><a rel="nofollow" href="#" class="dropdown-item"> 
                          <div class="notification d-flex justify-content-between">
                            <div class="notification-content"><i class="fa fa-envelope"></i>6 pesan baru </div>
                            <div class="notification-time"><small>4 menit yang lalu</small></div>
                          </div></a></li>
                      <li><a rel="nofollow" href="#" class="dropdown-item"> 
                          <div class="notification d-flex justify-content-between">
                            <div class="notification-content"><i class="fa fa-twitter"></i>You have 2 followers</div>
                            <div class="notification-time"><small>10 minutes ago</small></div>
                          </div></a></li>
                      <li><a rel="nofollow" href="#" class="dropdown-item all-notifications text-center"> <strong> <i class="fa fa-bell"></i>view all notifications                                            </strong></a></li>
                    </ul>
                  </li>
                  <!-- Messages dropdown-->
                  <li class="nav-item dropdown"> <a id="messages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-envelope"></i><span class="badge badge-info">10</span></a>
                    <ul aria-labelledby="notifications" class="dropdown-menu">
                      <li><a rel="nofollow" href="#" class="dropdown-item d-flex"> 
                          <div class="msg-profile"> <img src="img/avatar-1.jpg" alt="..." class="img-fluid rounded-circle"></div>
                          <div class="msg-body">
                            <h3 class="h5">Gunawan</h3><span>Mengirim Anda Pesan</span><small>3 Hari yang lalu at 7:58 pm - 10.06.2014</small>
                          </div></a></li>
                      <li><a rel="nofollow" href="#" class="dropdown-item d-flex"> 
                          <div class="msg-profile"> <img src="img/avatar-2.jpg" alt="..." class="img-fluid rounded-circle"></div>
                          <div class="msg-body">
                            <h3 class="h5">Yudo</h3><span>Mengirim Anda Pesan</span><small>1 Hari yang lalu at 7:58 pm - 10.06.2014</small>
                          </div></a></li>
                      <li><a rel="nofollow" href="#" class="dropdown-item d-flex"> 
                          <div class="msg-profile"> <img src="img/avatar-3.jpg" alt="..." class="img-fluid rounded-circle"></div>
                          <div class="msg-body">
                            <h3 class="h5">Wanda</h3><span>Mengirim Anda Pesan</span><small>2 Hari yang lalu at 7:58 pm - 10.06.2014</small>
                          </div></a></li>
                      <li><a rel="nofollow" href="#" class="dropdown-item all-notifications text-center"> <strong> <i class="fa fa-envelope"></i>Read all messages    </strong></a></li>
                    </ul>
                  </li>
                  <!-- Languages dropdown    -->
                  <li class="nav-item dropdown"><a id="languages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link language dropdown-toggle"><img src="img/flags/16/GB.png" alt="English"><span class="d-none d-sm-inline-block">English</span></a>
                    <ul aria-labelledby="languages" class="dropdown-menu">
                      <li><a rel="nofollow" href="#" class="dropdown-item"> <img src="img/flags/16/ID.png" alt="English" class="mr-2"><span>Indonesia</span></a></li>
                      <li><a rel="nofollow" href="#" class="dropdown-item"> <img src="img/flags/16/FR.png" alt="English" class="mr-2"><span>French                                                         </span></a></li>
                    </ul>
                  </li>
                  <!-- Log out-->
                  <li class="nav-item"><a href="login.html" class="nav-link logout"> <span class="d-none d-sm-inline-block">Logout</span><i class="fa fa-sign-out"></i></a></li>
                </ul>
              </div>
            </div>
          </nav>
        </header>
        <!-- Counts Section -->
        <section class="dashboard-counts section-padding">
          <div class="container-fluid">
            <div class="row">
              <!-- Count item widget-->
              <div class="col-xl-2 col-md-4 col-6">
                <div class="wrapper count-title d-flex">
                  <div class="icon"><i class="icon-user"></i></div>
                  <div class="name"><strong class="text-uppercase">Klien Baru</strong><span>5 hari Terakhir</span>
                    <div class="count-number">25</div>
                  </div>
                </div>
              </div>
              <!-- Count item widget-->
              <div class="col-xl-2 col-md-4 col-6">
                <div class="wrapper count-title d-flex">
                  <div class="icon"><i class="icon-padnote"></i></div>
                  <div class="name"><strong class="text-uppercase">Pesanan</strong><span>7 Hari Terakhir</span>
                    <div class="count-number">400</div>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
        </section>
        <!-- Header Section-->

        <!-- Statistics Section-->

        <!-- Updates Section -->
       
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


@endsection