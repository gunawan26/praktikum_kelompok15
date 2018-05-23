@extends('layouts.layoutuser') @section('content')
<hr class="featurette-divider">
<div class="col-lg-9">
    <div class="card mb-3 box-shadow">
        <div class="container">
            <h6 class="title">Data Transaksi</h6>
            <div class="datatabel table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Kendaraan</th>
                            <th>Tanggal Transaksi</th>
                            <th>Tanggal Sewa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaksis as $transaksi)
                        <tr>
                                <td>
                                    <div class="media">
                                    <h4>{{$transaksi->nama_kendaraan}}</h4>
                                        <p class="rent-car-name blued">{{$transaksi->nama_depan}} Rent Car</p>
                                    </div>
                                </td>
                                <td>
                                    <p class="rent-car-name">{{$transaksi->tgl_transaksi}}</p>
                                </td>
                                <td>
                                    <div class="sewa-tgl">
                                        <p class="rent-car-name">{{$transaksi->tgl_pesan}}
                                            <span> / </span>
                                            <span>{{$transaksi->tgl_rencanakembali}}</span>
                                        </p>
                                    </div>
                                </td>
                            </tr>                            
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection