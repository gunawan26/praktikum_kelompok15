@extends('layouts.app')
@section('content')
<div class="container" style="margin-top: 20px">
	<div class="row justify-content-center">
		<div class="col-md-2"></div>
		<div class="col-md-6">
			<img src="{{asset('storage/gambar_mobil/'.$kendaraan->gambar_kendaraan)}}" width="500">
			<div class="row">
				<div class="col-md-6"><h3>{{$kendaraan->nama_kendaraan}}</h3>
					<p class="text-warning"><strong>Rp 10.000.000</strong></p></div>
					<a href="{{route('transaksi.formview',$kendaraan->id)}}" class="btn btn-block btn-success">Lanjut ke transaksi</a>
				</div>
				<hr class="featurette-divider">
				<div class="row">
					<div class="col-md-3">Manual</div>
					<div class="col-md-3">Manual</div>
					<div class="col-md-3">bensin</div>
					<div class="col-md-3">1300cc</div>
				</div>
				<hr class="featurette-divider">
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
										<th scope="row">Warna</td>
											<td>Hitam</td>
										</tr>
										<tr>
											<th scope="row">Pintu</td>
												<td>5</td>
											</tr>
										</table>
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-header" id="headingTwo">
									<h5 class="mb-0">
										<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
											Interior
										</button>
									</h5>
								</div>
								<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
									<div class="card-body">
										<table class="table">
											<tr>
												<th scope="row">Airbag Pengemudi</td>
													<td>Ya</td>
												</tr>
												<tr>
													<th scope="row">Airbag Penumpang</td>
														<td>Ya</td>
													</tr>
												</table>
											</div>
										</div>
									</div>
									<div class="card">
										<div class="card-header" id="headingThree">
											<h5 class="mb-0">
												<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
													Eksternal
												</button>
											</h5>
										</div>
										<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
											<div class="card-body">
												<table class="table">
													<tr>
														<th scope="row">Lampu kabut</td>
															<td>Ya</td>
														</tr>
														<tr>
															<th scope="row">Lampu utama</td>
																<td>Ya</td>
															</tr>
														</table>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="col-md-4">
										<div class="row row">
											<div class="col-md-6"><h4>IPIP Corporation</h4>
												<hr class="featurette-divider">
												<p class="text-warning">Pemilik terpercaya</p>
												<p><small>Nusa dua badung denpasar</small>  </p>
												<a href="#" class="btn btn-block btn-info">Hubungi pemilik</a></div>
											</div>		

										</div>
									</div>
								</div>      

@endsection
