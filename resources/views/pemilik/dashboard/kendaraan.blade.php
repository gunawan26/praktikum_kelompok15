@extends('layouts.dashboardlayout')
@section('content')

<div class="container-fluid">
        <header> 
                <hr>
                <h1 class="h3 display">Data Kendaraan</h1>
                <hr>
              </header>
        <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">Nama mobil</th>
                <th scope="col">Plat nomor</th>
                <th scope="col">status</th>
                <th scope="col">harga</th>
                <th scope="col">Foto</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>
            
            <tbody>
                @foreach ($kendaraans as $kendaraan)
                <tr>
                   
                        <th scope="row">{{$kendaraan->nama_kendaraan}}</th>
                        <td>{{$kendaraan->plat_nomor}}</td>
                        <td>{{$kendaraan->id_pemilik}}</td>
                        <td>{{$kendaraan->harga_sewa}} rupiah</td>
               
                <td>
                        <img src="{{asset('storage/gambar_mobil/'.$kendaraan->gambar_kendaraan)}}" alt="gambar" class="img-thumbnail" style="max-width:200px"> 
                </td> 
                        <td>
                            <a href="{{route('kendaraan.edit',$kendaraan->id)}}" class="btn btn-primary btn-block" role="button" style="background-color:#1E88E5;margin: 0 0 3px 0;">edit</a>
                            
    
                            <form method="post" action="{{route('kendaraan.hapus',$kendaraan->id)}}">
                                @csrf
                                @method('patch')
                                <button type="submit" class="btn btn-danger btn-block">hapus</button>
                            </form>
                           
                        </td>
                    
                </tr>
                @endforeach
                {{--  <tr class="table-danger">
                    <th scope="row">Danger</th>
                    <td>Column content</td>
                    <td>Column content</td>
                    <td>Column content</td>
                </tr> --}}
                <hr>
            </tbody>
            </table>
            <hr>
            <a href="{{route('kendaraan.create')}}" class="btn btn-primary" role="button">tambah kendaraan</a>

        </div>


@endsection