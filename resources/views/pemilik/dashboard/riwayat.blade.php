@extends('layouts.dashboardlayout') @section('content')

<div class="container-fluid">
    <header>
        <hr>
        <h1 class="h3 display">Data Kendaraan</h1>
        <hr>
    </header>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">No Pembayaran</th>
                <th scope="col">Nama Mobil</th>
                <th scope="col">Plat Nomor</th>
                <th scope="col">Tgl Transaksi</th>
                <th scope="col">Tgl Pesan</th>
                <th scope="col">Tgl Kembali</th>
                <th scope="col">Status</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($riwayats as $index => $riwayat)
            <tr>

                <td scope="row">{{$index+1}}</td>
                <td>{{$riwayat->id}}
                <td>{{$riwayat->nama_kendaraan}}</td>
                <td>{{$riwayat->plat_nomor}}</td>
                <td>{{$riwayat->tgl_transaksi}}</td>
                <td>{{$riwayat->tgl_pesan}}</td>
                <td>{{$riwayat->tgl_rencanakembali}}</td>
                <td>{{$riwayat->status_validasi}}</td>

                {{-- <td>
                    <img src="{{asset('storage/gambar_mobil/'.$kendaraan->gambar_kendaraan)}}" alt="gambar" class="img-thumbnail" style="max-width:200px">
                </td>
                <td>
                    <a href="{{route('kendaraan.edit',$kendaraan->id)}}" class="btn btn-primary" role="button">edit kendaraan</a>


                    <form method="post" action="{{route('kendaraan.hapus',$kendaraan->id)}}">
                        @csrf @method('patch')
                        <button type="submit" class="btn btn-danger">hapus</button>
                    </form>

                </td> --}}

            </tr>
            @endforeach
            {{-- <tr class="table-danger">
                <th scope="row">Danger</th>
                <td>Column content</td>
                <td>Column content</td>
                <td>Column content</td>
            </tr>  --}}
            <hr>
        </tbody>
    </table>
    <hr>
    {{-- <button type="button" class="btn btn-outline-success">Tambah Kendaraan</button> --}}
    {{--
    <a href="{{ route('kendaraan.create') }}" class="btn btn-secondary" role="button">tambah Button</a> --}} {{--

    <button type="button" formaction="{{   route('kendaraan.create}')  }}" class="btn btn-secondary">Tambah mobil</button>
    --}}
</div>





@endsection