@extends('layouts.dashboardlayout') @section('content')

<section>
    <div class="container-fluid">
        <header>
            <hr>
            <h1 class="h3 display">Data Informasi Kendaraan</h1>
            <hr>
        </header>
        <section class="forms">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header d-flex align-items-center">
                                <h4>Data Pemilik Mobil</h4>
                            </div>
                            <div class="card-body">
                                <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="{{ route('kendaraan.update',$kendaraan->id)}}">
                                    @csrf @method('patch')
                                    <div class="form-group row">
                                        <label for="nama_kendaraan" class="col-sm-2 form-control-label">{{ __('Nama kendaraan') }}</label>

                                        <div class="col-sm-10">
                                            <input id="nama_kendaraan" type="text" class="form-control{{ $errors->has('nama_kendaraan') ? ' is-invalid' : '' }}" name="nama_kendaraan"
                                                value="{{ $kendaraan->nama_kendaraan }}" required autofocus> @if ($errors->has('nama_kendaraan'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('nama_kendaraan') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="plat_nomor" class="col-sm-2 form-control-label">{{ __('Plat Nomor') }}</label>

                                        <div class="col-sm-10">
                                            <input id="plat_nomor" type="text" class="form-control{{ $errors->has('plat_nomor') ? ' is-invalid' : '' }}" name="plat_nomor"
                                                value="{{ $kendaraan->plat_nomor }}" required autofocus> @if ($errors->has('plat_nomor'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('plat_nomor') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="deskripsi" class="col-sm-2 form-control-label">{{ __('Deskripsi') }}</label>

                                        <div class="col-sm-10">
                                        <textarea placeholder="tulis deskripsi kendaraan anda disini" name="deskripsi" id="deskripsi" cols="30" rows="10" class="form-control{{ $errors->has('deskripsi') ? ' is-invalid' : '' }}">{{$kendaraan->deskripsi}}</textarea>


                                            @if ($errors->has('deskripsi'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('deskripsi') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="harga_sewa" class="col-sm-2 form-control-label">{{ __('Harga Sewa') }}</label>

                                        <div class="col-sm-10">
                                            <input id="harga_sewa" type="text" class="form-control{{ $errors->has('harga_sewa') ? ' is-invalid' : '' }}" name="harga_sewa"
                                                value="{{ $kendaraan->harga_sewa }}" required autofocus> @if ($errors->has('harga_sewa'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('harga_sewa') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="id_kategori" class="col-sm-2 form-control-label">{{ __('Kategori Kendaraan') }}</label>

                                        <div class="col-sm-10">
                                            <select id="id_kategori" class="form-control{{ $errors->has('id_kategori') ? ' is-invalid' : '' }}" name="id_kategori" required
                                                autofocus>

                                                <option value="{{$kendaraan->id_kategori}}" selected>{{$kendaraan->namakategori->nama_kategori}}</option>
                                                @forelse ($kategoris as $kategori)

                                                <option value="{{$kategori->id}}"> {{$kategori->nama_kategori}}</option>
                                                @empty
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('id') }}</strong>
                                                </span>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="id_status" class="col-sm-2 form-control-label">{{ __('status') }}</label>

                                        <div class="col-sm-10">
                                            <select id="id_status" class="form-control{{ $errors->has('id_status') ? ' is-invalid' : '' }}" name="id_status" required
                                                autofocus>
                                                <option value="1" selected>Aktif</option>
                                                <option value="2">Tidak Aktif</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="id_kabupatenkota" class="col-sm-2 form-control-label">{{ __('Kabupaten Kota') }}</label>

                                        <div class="col-sm-10">
                                            <select id="id_kabupatenkota" class="form-control{{ $errors->has('id_kabupatenkota') ? ' is-invalid' : '' }}" name="id_kabupatenkota"
                                                required autofocus>
                                                @forelse ($kabupatenkotas as $kabupatenkota)
                                                <option value="{{$kabupatenkota->id}}"> {{$kabupatenkota->nama_kabupaten}}</option>
                                                @empty
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('id') }}</strong>
                                                </span>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="warna_kendaraan" class="col-sm-2 form-control-label">{{ __('warna_kendaraan') }}</label>

                                        <div class="col-sm-10">
                                            <input id="warna_kendaraan" type="text" class="form-control{{ $errors->has('warna_kendaraan') ? ' is-invalid' : '' }}" name="warna_kendaraan" value="{{ $kendaraan->warna_kendaraan }}" required autofocus> 
                                                @if ($errors->has('warna_kendaraan'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('warna_kendaraan') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="gambar_kendaraan" class="col-sm-2 form-control-label">{{ __('gambar_kendaraan') }}</label>

                                        <div class="col-sm-10">
                                            <img src="{{asset('storage/gambar_mobil/'.$kendaraan->gambar_kendaraan)}}" alt="gambar" class="img-thumbnail" style="max-width:200px">

                                            <input id="gambar_kendaraan" type="file" class="form-control{{ $errors->has('warna_kendaraan') ? ' is-invalid' : '' }}" name="warna_kendaraan"
                                                value="{{ $kendaraan->gambar_kendaraan }}"  autofocus> @if ($errors->has('warna_kendaraan'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('gambar_kendaraan') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="transmisi" class="col-sm-2 form-control-label">{{ __('Transmisi') }}</label>
                                        <div class="col-sm-10">
                                            <select id="transmisi" class="form-control{{ $errors->has('transmisi') ? ' is-invalid' : '' }}" name="transmisi" required
                                                autofocus>
                                                <option value="Manual" selected>Manual</option>
                                                <option value="Otomatis">Otomatis</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="id_bahan_bakar" class="col-sm-2 form-control-label">{{ __('Bahan Bakar') }}</label>
                                        <div class="col-sm-10">
                                            <select id="id_bahan_bakar" class="form-control{{ $errors->has('id_bahan_bakar') ? ' is-invalid' : '' }}" name="id_bahan_bakar"
                                                required autofocus>
                                                @forelse ($bahanbakars as $bahanbakar)
                                                <option value="{{$bahanbakar->id}}"> {{$bahanbakar->nama_bahan_bakar}}</option>
                                                @empty
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('id_bahan_bakar') }}</strong>
                                                </span>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="foto_stnk" class="col-sm-2 form-control-label">{{ __('foto_stnk') }}</label>

                                        <div class="col-sm-10">
                                            <img src="{{asset('storage/gambar_stnk/'.$kendaraan->foto_stnk)}}" alt="gambar" class="img-thumbnail" style="max-width:200px">

                                            <input id="foto_stnk" type="file" class="form-control{{ $errors->has('foto_stnk') ? ' is-invalid' : '' }}" name="foto_stnk"
                                                value="{{ $kendaraan->foto_stnk }}"  autofocus> @if ($errors->has('foto_stnk'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('foto_stnk') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>



                                    <div class="line"></div>

                                    <div class="line"></div>
                                    {{-- <div class="container">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Upload Avatar</label>
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                        <span class="btn btn-default btn-file">
                                                            Browse…
                                                            <input type="file" id="imgInp">
                                                        </span>
                                                    </span>
                                                    <input type="text" class="form-control" readonly>
                                                </div>
                                                <img id='img-upload' />
                                            </div>
                                        </div>
                                    </div> --}}

                                    <div class="form-group row">
                                        <div class="col-sm-4 offset-sm-2">
                                            <button type="" class="btn btn-secondary">Cancel</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</section>



@endsection