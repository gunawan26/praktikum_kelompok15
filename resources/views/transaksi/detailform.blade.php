@extends('layouts.app')
@section('content')
<div class="container" style="margin-top: 20px">
	<div class="row justify-content-center">
		<div class="col-md-2"></div>
		<div class="col-md-6">
			<img src="{{asset('storage/gambar_mobil/'.$kendaraan->gambar_kendaraan)}}" width="500">
			<div class="row">
				<div class="col-md-6"><h3>{{$kendaraan->nama_kendaraan}}</h3>
					<p class="text-warning"><strong>Rp.{{$kendaraan->harga_sewa}} / hari</strong></p></div>
					<a href="{{route('transaksi.formview',$kendaraan->id)}}" class="btn btn-block btn-success">Lanjut ke transaksi</a>
				</div>
				<hr class="featurette-divider">
				{{-- <div class="row">
					<div class="col-md-3">Transmisi</div>
					<div class="col-md-3">{{$kendaraan->transmisi}}</div>
					<div class="col-md-3">Bahan bakar</div>	
					<div class="col-md-3">{{$kendaraan->bahanbakars->nama_bahan_bakar}}</div>

				</div> --}}
				{{-- <hr class="featurette-divider"> --}}
				<div id="accordion">
					<div class="card">
						<div class="card-header" id="headingOne">
							<h5 class="mb-0">
								<button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
									Detail
								</button>
							</h5>
						</div>

						<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
							<div class="card-body">
								<table class="table">
									<tr>
										<th scope="row">Transmisi</th>
										<td>{{$kendaraan->transmisi}}</td>
									</tr>
									<tr>
										<th scope="row">Bahan bakar</th>
										<td>{{$kendaraan->bahanbakars->nama_bahan_bakar}}</td>
									</tr>
									<tr>
										<th scope="row">Deskripsi</th>
										<td>{{$kendaraan->deskripsi}}</td>
									</tr>
								</table>
							</div>
						</div>
					</div>


										</div>
									</div>

									<div class="col-md-4">
										<div class="row row">
											<div class="col-md-6"><h4>{{$kendaraan->pemiliks->nama_depan}} RentCar</h4>
												<hr class="featurette-divider">
												<p class="text-warning">Pemilik terpercaya</p>
												<p><small>Nusa dua badung denpasar</small>  </p>
												<a href="#" class="btn btn-block btn-info">Hubungi pemilik</a></div>
											</div>		

										</div>
									</div>
								</div>      

@endsection
