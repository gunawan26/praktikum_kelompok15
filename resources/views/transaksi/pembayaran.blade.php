@extends('layouts.app')


@section('content')

    <h3>Pembayaran terakhir</h3>

    <h2>pilih metode pembayaran</h2>


    <form action="{{route('pembayaran.store',['kendaraan' => $kendaraan,'transaksi'=>$transaksi])}}" method="POST">
        @CSRF
        <button type="submit">Cash On Delivery</button>
    </form>
    
    



@endsection