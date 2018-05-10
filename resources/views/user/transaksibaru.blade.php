@extends('layouts.layoutuser') @section('custom-css')

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
    }

    .blued{
        color: lightslategray;
        font: bold;
    }

    .title{
        margin: 10px 5px 10px;
        font: bold;
    }
</style>

@endsection @section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-3  ">

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
        <hr class="featurette-divider">
        <div class="col-lg-9">
            <div class="card mb-3 box-shadow">

                <div class="container">
                    <h6 class="title">Data Transaksi Tertunda</h6>
                    <div class="datatabel table-responsive">

                        <table class="table table-hover">
                            
                            <thead>
                                <tr>
                                    <th>Kendaraan</th>
                                    <th>Tanggal Sewa</th>
                                    <th>Aksi</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>

                                        <div class="media">
                                            <h4>Daihatsu Terios</h4>
                                            <p class="rent-car-name blued">Gunawan Rent Car</p>
                                        </div>


                                    </td>

                                    <td>
                                        
                                        <div class="sewa-tgl">
                                            <p class="rent-car-name">2018-01-01
                                                <span> / </span>
                                                <span>2018-01-01</span>
                                            </p>

                                        </div>


                                    </td>
                                    <td>
{{--                                         
                                            <div class="sewa-tgl">
                                                <p class="rent-car-name">2018-01-01
                                                    <span> / </span>
                                                    <span>2018-01-01</span>
                                                </p> --}}
                                                <a href="" role="button" class="btn btn-outline-success">Proses</a>
                                            </div>
    
    
                                        </td>
                                    
                                </tr>







                            </tbody>




                        </table>
                    </div>

                </div>
            </div>
        </div>


    </div>


</div>
@endsection