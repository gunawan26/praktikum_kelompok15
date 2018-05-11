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

@endsection