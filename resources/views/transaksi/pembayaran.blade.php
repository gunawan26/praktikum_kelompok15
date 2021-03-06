@extends('layouts.app')


@section('content')

@php

	$pesan = strtotime($transaksi->tgl_pesan);
	$kembali = strtotime($transaksi->tgl_rencanakembali);
	$diff =$kembali - $pesan;

	$total_biaya = (intval($diff)/(60*60*24))*$kendaraan->harga_sewa;	

@endphp
<div class="container" style="margin-top: 30px">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header" style="text-align: center;background-color:#28a745"><h4 style="color: #fff">Pembayaran</h4></div>
				<div class="card-body">
					<p>Total pembayaran : Rp.{{$total_biaya}} / hari</p>
					<p>Batas Pembayaran: {{$pembayaran_terakhir}}</p>
					<hr class="featurette-divider">
					<p>Metode pembayaran</p>
					<form action="{{route('pembayaran.store',['kendaraan' => $kendaraan,'transaksi'=>$transaksi])}}" method="POST">
        @CSRF
        <button class="btn btn-success btn-block" type="submit">Cash On Delivery</button>
    </form>

					
				</div>
				</div>
			</div>
		</div>
	</div>
@endsection