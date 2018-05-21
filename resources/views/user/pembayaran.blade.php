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
                        <tr class="alert alert-success">
                            <td>
                                <div class="media">
                                    <h4>Daihatsu Terios</h4>
                                    <p class="rent-car-name blued">Gunawan Rent Car</p>
                                </div>
                            </td>
                            <td>
                                <p class="rent-car-name">2018-01-01</p>
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
                                <div class="sewa-tgl">
                                    <p class="text-primary">Sukses
                                    </p>
                                </div>
                            </td>
                        </tr>
                        <tr class="alert alert-info">
                            <td>
                                <div class="media">
                                    <h4 class="not-valid-car">Daihatsu Terios</h4>
                                    <p class="rent-car-name blued">Gunawan Rent Car</p>
                                </div>
                            </td>
                            <td>
                                <p class="rent-car-name">2018-01-01</p>
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
                                <div class="sewa-tgl">
                                    <p class="text-primary">menunggu Validasi
                                    </p>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection