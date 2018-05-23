<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Rentcar</title>

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{ asset('css/simple-line-icons.css" rel="stylesheet')}}" type="text/css">
  <link href="{{ asset('css/landing-page.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  
</head>

<body data-spy="scroll" data-target="#navbar" data-offset="30">
  <!-- Nav Menu -->

  <div class="nav-menu fixed-top">
    <div class="container">

      <nav class="navbar navbar-dark navbar-expand-lg">
        <ul class=" navbar-nav mr-auto">
          <a class="navbar-brand" href="index.html">
            <img src="{{asset('img/logo.png')}}" class="img-fluid" alt="logo">
          </a>        
          <li class="nav-item ">
            <a class="nav-link text-secondary" href="{{route('menu')}}">HOME
              
            </a>
          </li>
          <li class="nav-item active">
          <a class="nav-link text-secondary" href="{{url('/Landing')}}">PARTNER</a>
            <span class="sr-only">(current)</span>
          </li>
          <li class="nav-item ">
            <a class="nav-link text-secondary" href="#">ABOUT</a>
          </li>
        </ul>
        <ul class="navbar-nav">
          @guest
            <li class="dropdown">
          <button type="button" class="btn btn-outline-secondary dropdown"   id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Daftar</button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <div class="card">
  <div class="card-body">
    <div class="btn-group " role="group" aria-label="Basic example">
            <a href="{{ url('/pemilik/register') }}" class="btn btn-primary "> Pemilik</a>
            <a href="{{ url('/register') }}" class="btn btn-success "> Penyewa</a>
          </div></div></div>
  </div>
          </li>
          
          <li class="dropdown ml-lg-3">
          <button type="button" class="btn btn-outline-success dropdown"   id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Masuk</button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <div class="card">
  <div class="card-body">
           <div class="btn-group " role="group" aria-label="Basic example">
            <a href="{{ url('/pemilik/login') }}" class="btn btn-primary "> Pemilik</a>
            <a href="{{ url('/login') }}" class="btn btn-success "> Penyewa</a>
          </div></div></div>
  </div>
          </li>

          @else

          <li class="nav-item">
            <div class="nav-link text-secondary">
              Welcome {{Auth::user()->nama_depan}}
            </div>

          </li>
          <li class="nav-item">
            <form action="{{route('logout')}}" method="post" >
              @csrf


              <button type="submit" class="btn btn-outline-success my-3 my-sm-0">Logout</button>

            </form>

          </li>

          @endguest


        </ul>

      </nav>

    </div>
  </div>
  <!-- End Nav Menu -->


  <!-- Masthead -->
    <header class="masthead text-white text-center">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-xl-9 mx-auto">
            <h1 class="mb-5">Ayo Bergabung untuk mengembangkan usaha rentcar anda menjadi rentcar yang modern</h1>
          </div>
          <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
                <div class="col-12 ">
                  <button type="submit" class="btn btn-block btn-lg btn-success">Daftar</button>
                </div>
          </div>
        </div>
      </div>
    </header>





  <main>
    @yield('content')
  </main>

  <div class="client-logos mt-5">
    <div class="container text-center">
      <img src="{{asset('img/honda.png')}}" width="100px" class="img-fluid" alt="logo">
      <img src="{{asset('img/toyota.png')}}" width="100px" class="img-fluid" alt="logo">
      <img src="{{asset('img/suzuki.png')}}" width="100px" class="img-fluid" alt="logo">
      <img src="{{asset('img/daihatsu.png')}}" width="100px" class="img-fluid" alt="logo">
    </div>
  </div>
  <footer class="my-5 text-center">
    <!-- Copyright removal is not prohibited! -->
    <p class="mb-2">
      <small>COPYRIGHT © 2018. ALL RIGHTS RESERVED. MOBAPP TEMPLATE BY RENTCAR</a>
      </small>
    </p>

    <small>
      <a href="#" class="m-2">PRESS</a>
      <a href="#" class="m-2">TERMS</a>
      <a href="#" class="m-2">PRIVACY</a>
    </small>
  </footer>



  <!-- Scripts -->
  <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('js/script.js') }}"></script>
  <script src="{{ asset('js/app.js') }}"></script>
  @yield('custom-js')

</body>

</html>