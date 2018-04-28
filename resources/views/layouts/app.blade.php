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
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    @yield('custom-css')
  </head>

  <body data-spy="scroll" data-target="#navbar" data-offset="30">
   <!-- Nav Menu -->

   <div class="nav-menu fixed-top">
    <div class="container">

      <nav class="navbar navbar-dark navbar-expand-lg">
        <ul class=" navbar-nav col-md-2">
          <a class="navbar-brand" href="index.html"><img src="{{asset('img/logo.png')}}" class="img-fluid" alt="logo"></a> </ul>

          <ul class=" navbar-nav col-md-7">
            <div class="input-group">
              <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-success " type="button"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </ul>
          <ul class="navbar-nav col-md-1"></ul>
          <ul class="navbar-nav col-md-2">
            <li><a href="{{ url('/register') }}" class="btn btn-link-success my-3 my-sm-0 ml-lg-3" role="button" aria-pressed="true">Daftar</a></li>
            <li>
             <a href="{{ url('/login') }}" class="btn btn-outline-success my-3 my-sm-0 ml-lg-3" role="button" aria-pressed="true">Masuk</a>
           </li>

         </ul> 

       </nav>

     </div>
   </div>
   <!-- End Nav Menu -->


   <header class="bg-gradient" id="home">
    <div class="container mt-4">
      <h1 class="text-secondary">Website Rentcar Terbaik Di indonesia </h1>
      <p class="tagline text-secondary">Sewa aman, jalan aman</p>
      <button class="btn btn-success">Daftar</button>
      <hr class="featurette-divider">
    </div>
    
  </header>
  




  <main>
    @yield('content')
  </main>
  <div class="client-logos mt-5">
      <div class="container text-center">
        <img src="{{asset('img/honda.png')}}" width="100px"  class="img-fluid" alt="logo">
        <img src="{{asset('img/toyota.png')}}" width="100px"  class="img-fluid" alt="logo">
        <img src="{{asset('img/suzuki.png')}}" width="100px"  class="img-fluid" alt="logo">
        <img src="{{asset('img/daihatsu.png')}}" width="100px"  class="img-fluid" alt="logo">
      </div>
    </div>
  <footer class="my-5 text-center">
    <!-- Copyright removal is not prohibited! -->
    <p class="mb-2"><small>COPYRIGHT © 2018. ALL RIGHTS RESERVED. MOBAPP TEMPLATE BY RENTCAR</a></small></p>

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
