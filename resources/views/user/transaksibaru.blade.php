@extends('layouts.layoutuser')@section('content')
<hr class="featurette-divider">
<div class="col-lg-9">
    <div class="card mb-3 box-shadow">
        <div class="container">
            <h6 class="title">Data Transaksi Tertunda</h6>
            <div class="datatabel table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kendaraan</th>
                            <th>Tanggal Sewa</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaksiBarus as $index => $transaksibaru)
                            <tr>
                                <td>
                                    <div>
                                    <h4>{{++$index}}</h4>
                                    </div>
                                </td>
                                <td>
                                    <div class="media">
                                        <h4>{{$transaksibaru->nama_kendaraan}}</h4>
                                        <p class="rent-car-name blued">{{$transaksibaru->nama_depan}}</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="sewa-tgl">
                                        <p class="rent-car-name">{{$transaksibaru->tgl_pesan}}
                                            <span> / </span>
                                            <span>{{$transaksibaru->tgl_rencanakembali}}</span>
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
                                    <a href="{{route('transaksi.detail',['$kendaraan'=>$transaksibaru->id_kendaraan,'$transaksis'=>$transaksibaru->id])}}" role="button" class="btn btn-outline-success">Proses</a>
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