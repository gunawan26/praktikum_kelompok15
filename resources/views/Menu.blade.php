@extends('layouts.layoutall')

@section('content')
      
@section('custom-css')
<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
<style>
    .custom-ul li {
        font-family: 'Raleway', sans-serif;
        font-size: 15px;
        display: inline;
        font: bolder;
    }

    a:hover {
        color: #42b549;
        text-decoration: none;

    }

    .name-acc {
        margin-left: 50px;
    }

    .name-acc h6 {
        font-family: 'Raleway', sans-serif;
        color: #42b549;
        text-decoration: none;

    }

    .name-acc p {
        font-size: 60%;
    }

    .myborder {
        border-radius: 11px;
    }

    .datatabel th {
        font-size: 15px;
        font-family: 'Raleway', sans-serif;
        color: #42b549;
        text-decoration: none;
    }

    .rent-car-name {
        margin: 0 0 10px;
        font-size: 13px;

    }

    .media {
        display: block;
    }

    .media h4,
    td h4 {
        margin: 0 0 0;
        font-size: 16px;
        color: #42b549;
        font-family: 'Lato', sans-serif;

    }

    .blued{
        color: lightslategray;
        font: bold;
    }

    .title{
        margin: 10px 5px 10px;
        font: bold;
    }

    .kendaraan-list h4{
      font-size: 15px;
      font-family: 'Raleway', sans-serif;
      color: #00B0FF;
        font: bold;
    }

</style>

@endsection


      
  <div class="container">
      <hr class="featurette-divider">
      <div class="row">
        @guest
            @else
            <div class="col-lg-3">
                <div class="">
                    <div class="card mb-3 myborder" style="max-width: 20rem; ">
                        <div class="card-body box-shadow">
                            <div class="myacc clearfix">
                                <div class="image-acc pull-left">
                                    <img src="{{asset('img/account.png')}}" width="35px" class="img-fluid" alt="logo">
                                </div>
                                <div class="name-acc">
                                    <h6>Gunawan</h6>
                                    <p>bergabung sejak: 2018-01-01</p>
    
                                </div>
    
                            </div>
    
                            <hr>
                            <ul class="list-group list-group-flush custom-ul list-unstyled">
    
                                <li class=" text-dark shadow-sm p-1 mb-2 bg-white rounded">
                                    <a href="#">
                                        <i class="fa fa-bar-chart"></i> Daftar Transaksi</a>
                                </li>
                                <li class=" text-dark shadow-sm p-1 mb-2 bg-white rounded">
                                    <a href="#">
                                        <i class="fa fa-credit-card"></i> Transaksi Baru</a>
                                </li>
                                <li class=" text-dark shadow-sm p-1 mb-2 bg-white rounded">
                                    <a href="#">
                                        <i class="fa fa-usd"></i> Pembayaran</a>
                                </li>
                                <li class=" text-dark shadow-sm p-1 mb-2 bg-white rounded">
                                    <a href="#">
                                        <i class="fa fa-cog"></i> Edit Akun</a>
                                </li>
                            </ul>
    
    
                        </div>
    
                    </div>
    
                </div>
              </div>
        @endguest

            <div class="col">
                <div class="row kendaraan-list">
                    @foreach ($kendaraans as $kendaraan)
                    <div class="col-md-4">
                      
                        <div class="card mb-3 box-shadow">
                          <img class="card-img-top" src="{{asset('storage/gambar_mobil/'.$kendaraan->gambar_kendaraan)}}" alt="Card image cap">
                          <div class="card-body">
                            <div class="card-text">
                            <h4>{{$kendaraan->nama_kendaraan}}</h4>
                                  
                                  <p>{{$kendaraan->nama_kabupaten}} , {{$kendaraan->nama_provinsi}}</p>
                                  <p>Rp.{{$kendaraan->harga_sewa}} / hari</p>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                              
                                <a href="{{ route('detail.formview',$kendaraan->id) }}" class="btn btn-success btn-block" role="button" aria-pressed="true">View</a>
                            </div>
                          </div>
                        </div>
                      </div>
                       {{ $kendaraans->links() }}
                    @endforeach
                   
                        
            
      
      
            </div>
            
         
      
      
      </div>
      
      </div>
  </div>

@endsection
