@foreach ($kendaraans as $kendaraan)
<div class="col-md-4">
          
    <div class="card mb-3 box-shadow">
      <img class="card-img-top" src="{{asset('storage/gambar_mobil/'.$kendaraan->gambar_kendaraan)}}" alt="Card image cap">
      <div class="card-body">
        <div class="card-text">
        <h4>{{$kendaraan->nama_kendaraan}}</h4>
              
              <p>{{$kendaraan->nama_kabupaten}} , {{$kendaraan->nama_provinsi}}</p>
              <p>Rp.{{$kendaraan->harga_sewa}} / hari</p>
        </div>
        <div class="d-flex justify-content-between align-items-center">
          
            <a href="{{ route('detail.formview',$kendaraan->id) }}" class="btn btn-success btn-block" role="button" aria-pressed="true">View</a>
        </div>
      </div>
    </div>
  </div>
@endforeach