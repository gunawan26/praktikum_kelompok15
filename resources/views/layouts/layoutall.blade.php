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
  <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet"> 
  @yield('custom-css')
</head>

<body data-spy="scroll" data-target="#navbar" data-offset="30">
  <!-- Nav Menu -->

  <div class="nav-menu fixed-top">
    <div class="container">

      <nav class="navbar navbar-dark navbar-expand-lg">
        <ul class="navbar-nav mr-auto">
          <a class="navbar-brand" href="index.html">
            <img src="{{asset('img/logo.png')}}" class="img-fluid" alt="logo">
          </a>
          <li class="nav-item active">
            <a class="nav-link text-success" href="{{route('menu')}}">HOME
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-secondary" href="{{ url('/Landing') }}">PARTNER</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link text-secondary" href="#">ABOUT</a>
          </li>
        </ul>
        <ul class="navbar-nav">
          @guest


          <li class="dropdown">
            <button type="button" class="btn btn-outline-secondary dropdown" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
              aria-expanded="false">Daftar</button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <div class="card">
                <div class="card-body">
                  <div class="btn-group " role="group" aria-label="Basic example">
                    <a href="{{ url('/pemilik/register') }}" class="btn btn-primary "> Pemilik</a>
                    <a href="{{ url('/register') }}" class="btn btn-success "> Penyewa</a>
                  </div>
                </div>
              </div>
            </div>
          </li>

          <li class="dropdown ml-lg-3">
            <button type="button" class="btn btn-outline-success dropdown" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
              aria-expanded="false">Masuk</button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <div class="card">
                <div class="card-body">
                  <div class="btn-group " role="group" aria-label="Basic example">
                    <a href="{{ url('/pemilik/login') }}" class="btn btn-primary "> Pemilik</a>
                    <a href="{{ url('/login') }}" class="btn btn-success "> Penyewa</a>
                  </div>
                </div>
              </div>
            </div>
          </li>
          @else
          <li class="nav-item">
            <div class="nav-link text-secondary">
              Welcome {{Auth::user()->nama_depan}}
            </div>

          </li>
          <li class="nav-item">
            <form action="{{route('logout')}}" method="post" class="nav-link">
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





  <header class="bg-gradient" id="home">
    <form method="get" action="{{route('home.search')}}" id="form_search">
      @csrf
      <div class="container mt-4" style="width: 70%; height: 70px;background-color: #6E6E6E; padding-top: 10px; padding-bottom: 10px;">
        <div class="input-group" style="height: 50px;">
          <input type="text" class="form-control" placeholder="Semua merk mobil" aria-label="" aria-describedby="basic-addon1" name="nama_kendaraan"
            id="nama_kendaraan">
          <input placeholder="Tanggal Sewa" type="text" class="form-control" onfocus="(this.type='date')" onblur="(this.type='text')"
            id="tgl_pesan" name="tgl_pesan" value="">
          <input placeholder="Tanggal Kembali" type="text" class="form-control" onfocus="(this.type='date')" onblur="(this.type='text')"
            id="tgl_kembali" name="tgl_kembali" value="">


          <select class="custom-select" id="kabupaten_asal" name="kabupaten_asal" style="height: 50px;">
            @foreach ($kabupatens as $kabupaten)
            <option selected value="{{$kabupaten->id}}">{{$kabupaten->nama_kabupaten}}</option>

            @endforeach

          </select>
          <div class="input-group-append">
            {{--
            <div class="btn btn-success " id="submit_search">
              <div style="margin:auto;width:inherit;">Cari</div>
            </div> --}}
            <button type="button" class="btn btn-success" id="submit_search">Cari</button>
          </div>
        </div>
      </div>
    </form>
    <div class="container mt-4">
      <h1 class="text-secondary">Website Rentcar Terbaik Di indonesia </h1>
      <p class="tagline text-secondary">Sewa aman, jalan aman</p>
      <hr class="featurette-divider">
    </div>
    </form>

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

  <!-- Modal Daftar -->
  <div class="modal fade" id="Daftar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Daftar</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center">
          <div class="btn-group btn-group-lg " role="group" aria-label="Basic example">
            <a href="{{ url('/pemilik/register') }}" class="btn btn-primary"> Pemilik</a>
            <a href="{{ url('/register') }}" class="btn btn-success"> Penyewa</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Masuk -->
  <div class="modal fade" id="Masuk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Login</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center">
          <div class="btn-group btn-group-lg " role="group" aria-label="Basic example">
            <a href="{{ url('/pemilik/login') }}" class="btn btn-primary"> Pemilik</a>
            <a href="{{ url('/login') }}" class="btn btn-success"> Penyewa</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script type="text/javascript" src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/script.js') }}"></script>

  <script type="text/javascript">
    $('#submit_search').click(function (event) {

      $value = $('#nama_kendaraan').val();
      $tgl_pesan_val = $('#tgl_pesan').val();
      $tgl_kembali_val = $('#tgl_kembali').val();
      $kabupaten_asal = $('#kabupaten_asal').val();
      $.ajax({

        type: 'get',
        url: '{{URL::to('
        home / search ')}}',
        data: {
          'nama_kendaraan': $value,
          'tgl_pesan': $tgl_pesan_val,
          'tgl_kembali': $tgl_kembali_val,
          'kabupaten_asal': $kabupaten_asal


        },
        success: function (data) {



          $('.kendaraan-list').html(data);

          console.log(data);
        }




      });



    });
  </script>
  <script>
    $.ajaxSetup({
      headers: {
        'csrftoken': '{{ csrf_token() }}'
      }
    });
  </script>

</body>

</html>