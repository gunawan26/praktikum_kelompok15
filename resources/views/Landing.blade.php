@extends('layouts.landing')

@section('content')
<!-- Icons Grid -->
    <section class="features-icons bg-light text-center">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
              <div class="features-icons-icon d-flex">
                <i class="fa fa-laptop m-auto text-primary"></i>
              </div>
              <h3>Pelayanan</h3>
              <p class="lead mb-0">Pelayanan terbaik untuk pemilik </p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
              <div class="features-icons-icon d-flex">
                <i class="fa fa-shield m-auto text-primary"></i>
              </div>
              <h3>Aman</h3>
              <p class="lead mb-0">Aman dalam transaksi rentcar</p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="features-icons-item mx-auto mb-0 mb-lg-3">
              <div class="features-icons-icon d-flex">
                <i class="fa fa-thumbs-up m-auto text-primary"></i>
              </div>
              <h3>Mudah</h3>
              <p class="lead mb-0">Mudah dalam transaksi antara pemilik dengan penyewa</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Image Showcases -->
    <section class="showcase">
      <div class="container-fluid p-0">
        <div class="row no-gutters">

          <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('img/transaksi.jpg');"></div>
          <div class="col-lg-6 order-lg-1 my-auto showcase-text">
            <h2>Pelayanan Transaksi</h2>
            <p class="lead mb-0">Pelayanan terjamin paling terbaik</p>
          </div>
        </div>
        <div class="row no-gutters">
          <div class="col-lg-6 text-white showcase-img" style="background-image: url('img/secure.jpg');"></div>
          <div class="col-lg-6 my-auto showcase-text">
            <h2>Aman</h2>
            <p class="lead mb-0">Keamanan dalam transaksi adalah salah satu dari keuntungan bergabung dengan website rentcar.com</p>
          </div>
        </div>
        <div class="row no-gutters">
          <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('img/mudah.png');"></div>
          <div class="col-lg-6 order-lg-1 my-auto showcase-text">
            <h2>Mudah</h2>
            <p class="lead mb-0">Kemudahan dalam transaksi menjadi hal yang diinginkan oleh pemilik maupun penyewa </p>
          </div>
        </div>
      </div>
    </section>

@endsection