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

            <tr>
                @foreach ($kendaraans as $kendaraan)
                    <th scope="row">{{$kendaraan->nama_kendaraan}}</th>
                    <td>{{$kendaraan->plat_nomor}}</td>
                    <td>{{$kendaraan->id_status}}</td>
                    <td>{{$kendaraan->harga_sewa}} rupiah</td>
                    <td><button type="button" class="btn btn-info">edit data</button>
                        <button type="button" class="btn btn-primary">Detail Transaksi</button>
                    </td>
                @endforeach


            </tr>
     
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
        <a  href="{{ route('kendaraan.create') }}" class="btn btn-secondary" role="button">Link Button</a>
    {{--<button type="button" formaction = "{{   route('kendaraan.create}')  }}" class="btn btn-secondary">Tambah mobil</button>
--}}
    </div>
    
@endsection