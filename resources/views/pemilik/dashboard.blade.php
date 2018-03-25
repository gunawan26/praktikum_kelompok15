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
                <th scope="row">Default</th>
                <td>Column content</td>
                <td>Column content</td>
                <td>Column content</td>
                <td><button type="button" class="btn btn-info">edit data</button>
                    <button type="button" class="btn btn-primary">Detail Transaksi</button>
                </td>

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


    </div>
    
@endsection