@extends('layouts.layoutall')

@section('content')
      


      
  <div class="container">
      <hr class="featurette-divider">
      <div class="row">
        @foreach ($kendaraans as $kendaraan)
        <div class="col-md-3">
          
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
       
            
    {{-- <nav aria-label="...">
    <ul class="pagination">
      <li class="page-item disabled">
        <span class="page-link">Previous</span>
      </li>
      <li class="page-item"><a class="page-link" href="#">1</a></li>
      <li class="page-item active">
        <span class="page-link">
          2
          <span class="sr-only">(current)</span>
        </span>
      </li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item">
        <a class="page-link" href="#">Next</a>
      </li>
    </ul>
  </nav> --}}
  </div>
  {{ $kendaraans->links()}}
  
@endsection
