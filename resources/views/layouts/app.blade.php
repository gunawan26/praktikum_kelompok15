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
  <style type="text/css">

}
.dropdown.dropdown-lg .dropdown-menu {
  margin-top: -1px;
  padding: 6px 20px;
}
.input-group-btn .btn-group {
  display: flex !important;
}
.btn-group .btn {
  border-radius: 0;
  margin-left: -1px;
}
.btn-group .btn:last-child {
  border-top-right-radius: 4px;
  border-bottom-right-radius: 4px;
}
.btn-group .form-horizontal .btn[type="submit"] {
  border-top-left-radius: 4px;
  border-bottom-left-radius: 4px;
}
.form-horizontal .form-group {
  margin-left: 0;
  margin-right: 0;
}
.form-group .form-control:last-child {
  border-top-left-radius: 4px;
  border-bottom-left-radius: 4px;
}

@media screen and (min-width: 768px) {
  #adv-search {
    width: 500px;
    margin: 0 auto;
  }
  .dropdown.dropdown-lg {
    position: static !important;
  }
  .dropdown.dropdown-lg .dropdown-menu {
    min-width: 500px;
  }
}

#promo{
  text-align:center;
  padding:100px;
  background:url(../../img/car1.jpg) no-repeat;
  background-size:100%;
  margin-top:0px;
}

#promo .jumbotron{
  border-radius:20px;
  padding:40px;
  background-color:rgba(255,255,255,0.75);
  margin:0 auto;
  max-width:800px;
}

@media (max-width:1199px) {
  #promo{
    padding:20px;
  }
}

#datamobil{
  padding:10px;
}

input#textkendaraan1{
  padding-right:20px;
  border-radius:10px;
  max-height:20px;
}

#pilihmobil.row{
  padding-top:20px;
}

h1#bookingsekarang{
  text-align:center;
  padding-top:30px;
}

input#textkendaraan3{
  border-radius:10px;
}

span#bataspilihkendaraan{
  padding:20px;
}

input#textkendaraan2{
  padding-left:10px;
  border-radius:10px;
}

#logo{
  max-height:50px;
  margin-right:10px;
  margin-top:-15px;
  display:inline-block;
  max-width:300px;
}

@media (max-width:1199px) {
  #promo .jumbotron{
    padding:20px;
  }
}
</style>
  </head>

  <body>
    <div id="app">
      <nav class="navbar navbar-expand-md navbar-light navbar-laravel sticky-top">
        <div class="container">
          <a class="navbar-brand" href="{{ url('/menu') }}">
            <img  src="{{asset('img/logo.png')}}" alt="homepage')}}" class="dark-logo" style="" /></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto"></ul>

            <ul class=" navbar-nav col-md-8">
             <div class="input-group">       

              <input class="form-control" type="text" placeholder="Search">
              <form  action="/action_page.php">
                <div class="input-group-btn">
                  <div class="btn-group" role="group">
                    <button class="btn btn-success" type="submit">Search</button>
                  </form>
                </div>
              </div>
            </div>

          </ul>
          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
            <li><button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Login</button></li>
            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
            @else
            <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->nama_depan }} <span class="caret"></span></a>


              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}</a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </div>
          </li>
          @endguest
        </ul>
      </div>
    </div>
  </nav>
  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header" >
          <h4 class="modal-title">Login</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group row mb-20">
              <div class="col-md-12 ">

                <input id="email" type="email"  placeholder="Email Address" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus> 

                @if ($errors->has('email'))
                <span class="invalid-feedback">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="form-group row mb-20 ">
              <div class="col-md-12 ">
                <input id="password" type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                @if ($errors->has('password'))
                <span class="invalid-feedback">
                  <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-8 ">
               <div class="custom-control custom-checkbox my-1 mr-sm-2">
                <input type="checkbox" class="custom-control-input" id="customControlInline">
                <label class="custom-control-label" for="customControlInline">Remember me</label>

              </div>
            </div>
          </div>

          <div class="form-group row mb-20">
            <div class="col-md-12 ">
              <button type="submit" class="btn btn-success btn-block" >{{ __('Login') }}</button> 
            </div>
          </div>
        </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
       <a class="btn btn-link align:center"  href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
     </div>
   </div>
  </div>
</div>

  <main>
    @yield('content')
  </main>

  <footer class="container py-5">
    <div class="row">
      <div class="col-12 col-md">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="d-block mb-2"><circle cx="12" cy="12" r="10"></circle><line x1="14.31" y1="8" x2="20.05" y2="17.94"></line><line x1="9.69" y1="8" x2="21.17" y2="8"></line><line x1="7.38" y1="12" x2="13.12" y2="2.06"></line><line x1="9.69" y1="16" x2="3.95" y2="6.06"></line><line x1="14.31" y1="16" x2="2.83" y2="16"></line><line x1="16.62" y1="12" x2="10.88" y2="21.94"></line></svg>
        <small class="d-block mb-3 text-muted">&copy; 2017-2018</small>
      </div>
      <div class="col-6 col-md">
        <h5>Features</h5>
        <ul class="list-unstyled text-small">
          <li><a class="text-muted" href="#">Cool stuff</a></li>
          <li><a class="text-muted" href="#">Random feature</a></li>
        </ul>
      </div>

      <div class="col-6 col-md">
        <h5>Resources</h5>
        <ul class="list-unstyled text-small">
          <li><a class="text-muted" href="#">Resource</a></li>
          <li><a class="text-muted" href="#">Resource name</a></li>

        </div>
        <div class="col-6 col-md">
          <h5>Resources</h5>
          <ul class="list-unstyled text-small">
            <li><a class="text-muted" href="#">Business</a></li>
            <li><a class="text-muted" href="#">Education</a></li>
          </ul>
        </div>
        
        <div class="col-6 col-md">
          <h5>About</h5>
          <ul class="list-unstyled text-small">
            <li><a class="text-muted" href="#">Team</a></li>
            <li><a class="text-muted" href="#">Locations</a></li>
          </ul>
        </div>
      </div>
    </footer>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

  </body>
</html>
