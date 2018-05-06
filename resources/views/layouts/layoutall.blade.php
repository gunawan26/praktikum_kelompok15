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
</head>

<body data-spy="scroll" data-target="#navbar" data-offset="30">
  <!-- Nav Menu -->

  <div class="nav-menu fixed-top">
    <div class="container">

      <nav class="navbar navbar-dark navbar-expand-lg">
        <ul class=" navbar-nav col-md-2">
          <a class="navbar-brand" href="index.html">
            <img src="{{asset('img/logo.png')}}" class="img-fluid" alt="logo">
          </a>
        </ul>
        <ul class="navbar-nav col-md-2">
          <li class="nav-item active">
            <a class="nav-link text-success" href="#">HOME
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-secondary" href="#">PARTNER</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link text-secondary" href="#">ABOUT</a>
          </li>
        </ul>
        <ul class=" navbar-nav col-md-5">

        </ul>
        <ul class="navbar-nav col-md-1"></ul>
        <ul class="navbar-nav col-md-2">
          <li>
            <a href="#" class="btn btn-link-success my-3 my-sm-0 ml-lg-3" role="button" aria-pressed="true">Daftar</a>
          </li>
          <li>
            <a href="#" class="btn btn-outline-success my-3 my-sm-0 ml-lg-3" role="button" aria-pressed="true">Masuk</a>
          </li>

        </ul>

      </nav>

    </div>
  </div>
  <!-- End Nav Menu -->


  <header class="bg-gradient" id="home">
    <form method="get" action="{{route('home.search')}}" id="form_search">
      @csrf
      <div class="container mt-4" style="width: 70%; height: 70px;background-color: #6E6E6E; padding-top: 10px; padding-bottom: 10px;">
        <div class="input-group" style="height: 50px;">
          <input type="text" class="form-control" placeholder="Semua merk mobil" aria-label="" aria-describedby="basic-addon1" name="nama_kendaraan" id="nama_kendaraan">
          <input placeholder="Tanggal Sewa" type="text" class="form-control" onfocus="(this.type='date')" onblur="(this.type='text')"
            id="date" name="tgl_pesan">
          <input placeholder="Tanggal Kembali" type="text" class="form-control" onfocus="(this.type='date')" onblur="(this.type='text')"
            id="date" name="tgl_kembali">
         
          
          <select class="custom-select" id="" style="height: 50px;">
            @foreach ($kabupatens as $kabupaten)
            <option selected value="{{$kabupaten->id}}">{{$kabupaten->nama_kabupaten}}</option>

            @endforeach

          </select>
          <div class="input-group-append">
           <div class="btn btn-success"  id="submit_search">Cari</div>
           
          </div>
        </div>
      </div>
    </form>
      <div class="container mt-4">
        <h1 class="text-secondary">Website Rentcar Terbaik Di indonesia </h1>
        <p class="tagline text-secondary">Sewa aman, jalan aman</p>
        <hr class="featurette-divider">
      </div>

  </header>









  </form>






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
  <script type="text/javascript">

      $('#submit_search').click(function(event){

        $value=$('#nama_kendaraan').val();
        $.ajax({

          type:'get',
          url:'{{URL::to('home/search')}}',
          data:{'nama_kendaraan':$value},
          success:function(data){
            console.log(data);
          }




        });
      //  $.ajax({
      //    type   :'get',
      //    url    :'home/search',
      //    data:'',
      //          success:function(data){
      //           console.log($data)
      //          }

      //  });

      // $.get("{{URL::to('home/search')}}",function(data){
 
      //   console.log(data);

      // });


      });
  
  
  
  
  </script>
  <script>
    
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
  </script>

</body>

</html>