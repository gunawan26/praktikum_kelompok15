@extends('layouts.layoutuser') 

@section('custom-css')

<style>
    .datatabel{
        overflow: hidden;
    }

</style>
    
@endsection

@section('content')
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
                            <th>Status</th>

                        </tr>
                    </thead>
                    <tbody class="view-pembayaran">
                        @foreach ($pembayarans as $pembayaran)
                            
                            @if ($pembayaran->id_status_validasi == '2')
                            <tr class="alert alert-success">
                                    <td>
                                        <div class="media">
                                        <h4>{{$pembayaran->nama_kendaraan}}</h4>
                                            <p class="rent-car-name blued">{{$pembayaran->nama_depan}} Rent Car</p>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="rent-car-name">{{$pembayaran->tgl_transaksi}}</p>
                                    </td>
                                    <td>
                                        <div class="sewa-tgl">
                                            <p class="rent-car-name">{{ date('m-Y', strtotime($pembayaran->tgl_pesan)) }}
                                                <span> / </span>
                                                <span>{{ date('m-Y', strtotime($pembayaran->tgl_rencanakembali)) }}</span>
                                            </p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="sewa-tgl">
                                            <p class="text-primary">Sukses
                                            </p>
                                        </div>
                                    </td>
                                </tr>
                                 
                            @elseif($pembayaran->id_status_validasi == '1')
                            <tr class="alert alert-info">
                                <td>
                                    <div class="media">
                                    <h4>{{$pembayaran->nama_kendaraan}}</h4>
                                        <p class="rent-car-name blued">{{$pembayaran->nama_depan}} Rent Car</p>
                                    </div>
                                </td>
                                <td>
                                    <p class="rent-car-name">{{$pembayaran->tgl_transaksi}}</p>
                                </td>
                                <td>
                                    <div class="sewa-tgl">
                                        <p class="rent-car-name">{{ date('m-Y', strtotime($pembayaran->tgl_pesan)) }}
                                            <span> / </span>
                                            <span>{{ date('m-Y', strtotime($pembayaran->tgl_rencanakembali)) }}</span>
                                        </p>
                                    </div>
                                </td>
                                    <td>
                                        <div class="sewa-tgl">
                                            <p class="text-primary">menunggu Validasi
                                            </p>
                                        </div>
                                    </td>
                                </tr>
                            @else
                            <tr class="alert alert-danger">
                                <td>
                                    <div class="media">
                                    <h4>{{$pembayaran->nama_kendaraan}}</h4>
                                        <p class="rent-car-name blued">{{$pembayaran->nama_depan}} Rent Car</p>
                                    </div>
                                </td>
                                <td>
                                    <p class="rent-car-name">{{$pembayaran->tgl_transaksi}}</p>
                                </td>
                                <td>
                                    <div class="sewa-tgl">
                                        <p class="rent-car-name">{{ date('m-Y', strtotime($pembayaran->tgl_pesan)) }}
                                            <span> / </span>
                                            <span>{{ date('m-Y', strtotime($pembayaran->tgl_rencanakembali)) }}</span>
                                        </p>
                                    </div>
                                </td>
                                <td>
                                    <div class="sewa-tgl">
                                        <p class="text-primary">batal
                                        </p>
                                    </div>
                                </td>
                            </tr>
                                    
                            @endif
                            
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection