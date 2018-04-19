@extends('pemilik.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="{{ route('kendaraan.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="nama_kendaraan" class="col-md-4 col-form-label text-md-right">{{ __('Nama kendaraan') }}</label>

                            <div class="col-md-6">
                                <input id="nama_kendaraan" type="text" class="form-control{{ $errors->has('nama_kendaraan') ? ' is-invalid' : '' }}" name="nama_kendaraan" value="{{ old('nama_kendaraan') }}" required autofocus>

                                @if ($errors->has('nama_kendaraan'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('nama_kendaraan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="plat_nomor" class="col-md-4 col-form-label text-md-right">{{ __('plat nomor kendaraan') }}</label>

                            <div class="col-md-6">
                                <input id="plat_nomor" type="text" class="form-control{{ $errors->has('plat_nomor') ? ' is-invalid' : '' }}" name="plat_nomor" value="{{ old('plat_nomor') }}" required autofocus>

                                @if ($errors->has('plat_nomor'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('plat_nomor') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="deskripsi" class="col-md-4 col-form-label text-md-right">{{ __('deskripsi') }}</label>

                            <div class="col-md-6">
                                <input id="deskripsi" type="text" class="form-control{{ $errors->has('deskripsi') ? ' is-invalid' : '' }}" name="deskripsi" value="{{ old('deskripsi') }}" required autofocus>

                                @if ($errors->has('deskripsi'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('deskripsi') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="harga_sewa" class="col-md-4 col-form-label text-md-right">{{ __('harga sewa') }}</label>

                            <div class="col-md-6">
                                <input id="harga_sewa" type="text" class="form-control{{ $errors->has('harga_sewa') ? ' is-invalid' : '' }}" name="harga_sewa" value="{{ old('harga_sewa') }}" required>

                                @if ($errors->has('harga_sewa'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('harga_sewa') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="id_kategori" class="col-md-4 col-form-label text-md-right">{{ __('kategori') }}</label>

                            <div class="col-md-6">
                                <select id="" class="form-control{{ $errors->has('id_kategori') ? ' is-invalid' : '' }}" name="id_kategori" required>
                                        

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
                            <label for="id_status" class="col-md-4 col-form-label text-md-right">{{ __('status') }}</label>

                            <div class="col-md-6">
                                <select id="" class="form-control{{ $errors->has('id_status') ? ' is-invalid' : '' }}" name="id_status" required>
                                    
                                {{--  @if ($errors->has('id_status'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('id_status') }}</strong>
                                    </span>
                                @endif  --}}
                                    <option value="1">aktif</option>
                                    <option value="2">tidak aktif</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="id_kabupatenkota" class="col-md-4 col-form-label text-md-right">{{ __('kabupaten/kota asal') }}</label>

                            <div class="col-md-6">
                                    <select id="id_kabupatenkota" class="form-control{{ $errors->has('id_kabupatenkota') ? ' is-invalid' : '' }}" name="id_kabupatenkota" required>
                                            

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
                            <label for="warna_kendaraan" class="col-md-4 col-form-label text-md-right">{{ __('warna kendaraan') }}</label>

                            <div class="col-md-6">
                                <input id="warna_kendaraan" type="text" class="form-control{{ $errors->has('warna_kendaraan') ? ' is-invalid' : '' }}" name="warna_kendaraan" value="{{ old('warna_kendaraan') }}" required autofocus>

                                @if ($errors->has('warna_kendaraan'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('warna_kendaraan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                                <label for="transmisi" class="col-md-4 col-form-label text-md-right">{{ __('Transmisi Kendaraan') }}</label>
    
                                <div class="col-md-6">
                                        <select id="transmisi" class="form-control{{ $errors->has('transmisi') ? ' is-invalid' : '' }}" name="transmisi" required>
                                            
                                                    <option value="Manual">Manual</option>
                                                    <option value="Otomatis">Otomatis</option>
                                                
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('transmisi') }}</strong>
                                                    </span>
                                            
        
                                            </select>
                                </div>
                        </div>
                            
                        <div class="form-group row">
                                <label for="id_bahan_bakar" class="col-md-4 col-form-label text-md-right">{{ __('Jenis Bahan Bakar') }}</label>
    
                                <div class="col-md-6">
                                        <select id="id_bahan_bakar" class="form-control{{ $errors->has('id_bahan_bakar') ? ' is-invalid' : '' }}" name="id_bahan_bakar" required>
                                                
    
                                            @forelse ($bahanbakars as $bahanbakar)
                                                <option value="{{$bahanbakar->id}}"> {{$bahanbakar->nama_bahan_bakar}}</option>
                                            @empty
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('id') }}</strong>
                                                </span>
                                            @endforelse
    
                                        </select>
    
                                </div>
                            </div>
    

                        <div class="form-group row">
                            <label for="gambar_kendaraan" class="col-md-4 col-form-label text-md-right">{{ __('foto kendaraan') }}</label>

                            <div class="col-md-6">
                                <input id="gambar_kendaraan" type="file" class="form-control{{ $errors->has('gambar_kendaraan') ? ' is-invalid' : '' }}" name="gambar_kendaraan" required>

                                @if ($errors->has('gambar_kendaraan'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('gambar_kendaraan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        
                        <div class="form-group row">
                            <label for="foto_stnk" class=" col-md-4 col-form-label text-md-right ">{{ __('foto STNK') }}</label>

                            <div class="col-md-6">
                                <input id="foto_stnk" type="file" class="form-control{{ $errors->has('foto_stnk') ? ' is-invalid' : '' }}" name="foto_stnk" required>

                                @if ($errors->has('foto_stnk'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('foto_stnk') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection