@extends('pemilik.layout')

@section('content') 

    <div class="container">
    <table class="table table-hover">
        <thead>
            <tr>
            <th scope="col">Nama mobil</th>
            <th scope="col">Plat nomor</th>
            <th scope="col">status</th>
            <th scope="col">harga</th>
            <th scope="col">Pilihan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kendaraans as $kendaraan)
            <tr>
               
                    <th scope="row">{{$kendaraan->nama_kendaraan}}</th>
                    <td>{{$kendaraan->plat_nomor}}</td>
                    <td>{{$kendaraan->id_status}}</td>
                    <td>{{$kendaraan->harga_sewa}} rupiah</td>
           
            <td>
                    <img src="{{asset('storage/gambar_mobil/'.$kendaraan->gambar_kendaraan)}}" alt="gambar" class="img-thumbnail" style="max-width:200px"> 
            </td> 
                    <td>
                        <a href="{{route('kendaraan.edit',$kendaraan->id)}}" class="btn btn-primary" role="button">edit kendaraan</a>
                        

                        <form method="post" action="{{route('dashboard.hapus',$kendaraan->id)}}">
                            @csrf
                            @method('patch')
                            <button type="submit" class="btn btn-danger">hapus</button>
                        </form>
                       
                    </td>
                
            </tr>
            @endforeach
            {{--  <tr class="table-danger">
                <th scope="row">Danger</th>
                <td>Column content</td>
                <td>Column content</td>
                <td>Column content</td>
            </tr>
            <tr class="table-warning">
                <th scope="row">Warning</th>
                <td>Column content</td>
                <td>Column content</td>
                <td>Column content</td>
            </tr>
             --}}
        </tbody>
        </table> 
        <a  href="{{ route('kendaraan.create') }}" class="btn btn-secondary" role="button">tambah Button</a>
        
    {{--<button type="button" formaction = "{{   route('kendaraan.create}')  }}" class="btn btn-secondary">Tambah mobil</button>
--}}
    </div>
    
@endsection