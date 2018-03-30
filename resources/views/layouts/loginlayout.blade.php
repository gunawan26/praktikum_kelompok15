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
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <div class="row justify-content-center" style="margin-top: 30px">
        <a class="navbar-brand" href="{{ url('/menu') }}">
          <img  src="{{asset('img/logo.png')}}" alt="homepage')}}" class="dark-logo" style="" />
              </a>
        </div></div>
        <div class="col-md-3"></div>
    </div>
</div>
<main>
    @yield('content')
</main>
<footer class="container py-5">
      <div class="row">
        <div class="col-12 col-md">
          <small class="d-block mb-3 text-muted">&copy;  2018, Kelompok 15 Prognet | Teknologi Informasi</small>
        </div>
    </footer>


<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>

</body>
</html>
