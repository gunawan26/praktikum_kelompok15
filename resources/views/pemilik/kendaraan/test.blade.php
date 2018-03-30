@extends('pemilik.layout')


@section('content')

    @foreach ($kabupatenkotas as $kabupatenkota)

        {{$kabupatenkota->nama_kabupaten}}
        <br>
    @endforeach

    @foreach ($kategoris as $kategori)
        {{$kategori->nama_kategori}}
        <br>
    @endforeach
@endsection