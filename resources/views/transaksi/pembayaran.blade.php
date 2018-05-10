@extends('layouts.app')


@section('content')
<div class="container" style="margin-top: 30px">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header" style="text-align: center;background-color:#28a745"><h4 style="color: #fff">Pembayaran</h4></div>
				<div class="card-body">
					<p>Total pembayaran : Rp.{{$kendaraan->harga_sewa}} / hari</p>
					<p>Batas Pembayaran: 12/06/2018</p>
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