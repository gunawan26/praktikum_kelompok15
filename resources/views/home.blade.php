@extends('layouts.app')

@section('content')
<div class="container">
    <form action="" method="post">
            <label for="search">cari mobil</label>
            <input type="text" placeholder=" nama mobil">
            <label for="search">tanggal sewa</label>
            <input type="date" name="" id="">
            <p>sampai</p>
            <label for="search">tanggal akhir</label>
            <input type="date" name="" id="">


    </form>
        

</div>
    <div class="container">

       

        @foreach($kendaraans as $kendaraan)
            

                    <div class="card" style="width: 18rem; margin:10px; display:inline-block;">
                        <div class="parent">
                            <img class="card-img-top" src="{{asset('storage/gambar_mobil/'.$kendaraan->gambar_kendaraan)}}" alt="Card image cap">
                        </div >
                            <div class="card-body">
                            <p class="card-text">{{$kendaraan->nama_kendaraan}}</p>
                            <p class="card-text">{{$kendaraan->harga_sewa}}</p>
                            <a href="{{route('detail.formview',$kendaraan->id)}}" class="btn btn-primary" role="button">Pesan Sekarang</a>
                            </div>
                        </div>
                

                
            
            


        @endforeach
    </div>

  
@endsection
