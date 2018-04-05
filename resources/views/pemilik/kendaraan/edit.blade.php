@extends('pemilik.layout')

@section('content')
    
    <div class="container">
        
            <form method="POST" enctype="multipart/form-data" action="{{ route('kendaraan.update',$kendaraan->id) }}">
                @csrf
                @method('patch')
                
                {{-- nama kendaraan  --}}
                <div class="form-group row">
                    <label for="nama_kendaraan" class="col-md-4 col-form-label text-md-right">{{ __('Nama kendaraan') }}</label>

                    <div class="col-md-6">
                    <input id="nama_kendaraan" type="text" class="form-control{{ $errors->has('nama_kendaraan') ? ' is-invalid' : '' }}" name="nama_kendaraan" value="{{ $kendaraan->nama_kendaraan }}" required autofocus>

                        @if ($errors->has('nama_kendaraan'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('nama_kendaraan') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                {{-- plat nomor --}}
                <div class="form-group row">
                    <label for="plat_nomor" class="col-md-4 col-form-label text-md-right">{{ __('plat nomor kendaraan') }}</label>

                    <div class="col-md-6">
                        <input id="plat_nomor" type="text" class="form-control{{ $errors->has('plat_nomor') ? ' is-invalid' : '' }}" name="plat_nomor" value="{{$kendaraan->plat_nomor }}" required autofocus>

                        @if ($errors->has('plat_nomor'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('plat_nomor') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                {{--deskripsi kendaraan --}}
                <div class="form-group row">
                    <label for="deskripsi" class="col-md-4 col-form-label text-md-right">{{ __('deskripsi') }}</label>

                    <div class="col-md-6">
                        <input id="deskripsi" type="text" class="form-control{{ $errors->has('deskripsi') ? ' is-invalid' : '' }}" name="deskripsi" value="{{ $kendaraan->deskripsi }}" required autofocus>

                        @if ($errors->has('deskripsi'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('deskripsi') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                {{-- harga sewa --}}
                <div class="form-group row">
                    <label for="harga_sewa" class="col-md-4 col-form-label text-md-right">{{ __('harga sewa') }}</label>

                    <div class="col-md-6">
                        <input id="harga_sewa" type="text" class="form-control{{ $errors->has('harga_sewa') ? ' is-invalid' : '' }}" name="harga_sewa" value="{{ $kendaraan->harga_sewa }}" required>

                        @if ($errors->has('harga_sewa'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('harga_sewa') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                {{-- jenis mobil --}}
                <div class="form-group row">
                    <label for="id_kategori" class="col-md-4 col-form-label text-md-right">{{ __('kategori') }}</label>

                    <div class="col-md-6">
                        <select id="id_kategori" class="form-control{{ $errors->has('id_kategori') ? ' is-invalid' : '' }}" name="id_kategori" required>
                                
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
                {{-- status aktif atau tidak --}}
                <div class="form-group row">
                    <label for="id_status" class="col-md-4 col-form-label text-md-right">{{ __('status') }}</label>

                    <div class="col-md-6">
                        <select id="" class="form-control{{ $errors->has('id_status') ? ' is-invalid' : '' }}" name="id_status" required>
                            
                            <option value="1">aktif</option>
                            <option value="2">tidak aktif</option>
                        </select>
                    </div>
                </div>
                {{-- kabupaten kota yang dipilih --}}
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
                        <input id="warna_kendaraan" type="text" class="form-control{{ $errors->has('warna_kendaraan') ? ' is-invalid' : '' }}" name="warna_kendaraan" value="{{ $kendaraan->warna_kendaraan }}" required autofocus>

                        @if ($errors->has('warna_kendaraan'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('warna_kendaraan') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                

                <div class="form-group row">
                    <label for="gambar_kendaraan" class="col-md-4 col-form-label text-md-right">{{ __('foto kendaraan') }}</label>
                    {{-- <div class="col-md-6">
                        <img src="{{asset('storage/gambar_mobil/'.$kendaraan->gambar_kendaraan)}}" alt="gambar" class="img-thumbnail" style="max-width:200px">      
                        <input type="file" class="form-control-file" id="gambar_kendaraan" aria-describedby="fileHelp">
                        
                        @if($errors->has('gambar_kendaraan'))
                            <small id="fileHelp" class="form-text text-muted">error</small>

                        @endif
                        
                    </div> --}}
                    <div class="col-md-6">
                          <img src="{{asset('storage/gambar_mobil/'.$kendaraan->gambar_kendaraan)}}" alt="gambar" class="img-thumbnail" style="max-width:200px">   
                        <input id="gambar_kendaraan" type="file" class="form-control{{ $errors->has('gambar_kendaraan') ? ' is-invalid' : '' }}" name="gambar_kendaraan"  value="{{ $kendaraan->gambar_kendaraan }}">

                        @if ($errors->has('gambar_kendaraan'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('gambar_kendaraan') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                
                {{-- <div class="form-group row">
                        <label for="foto_stnk" class="col-md-4 col-form-label text-md-right">{{ __('foto STNK') }}</label>
                        <div class="col-md-6">
                            <img src="{{asset('storage/gambar_stnk/'.$kendaraan->gambar_kendaraan)}}" alt="foto stnk" class="img-thumbnail" style="max-width:200px">      
                            <input type="file" class="form-control-file" id="foto_stnk" aria-describedby="fileHelp">
                            
                            @if($errors->has('foto_stnk'))
                                <small id="fileHelp" class="form-text text-muted">error</small>
    
                            @endif
                            
                        </div>
                    </div> --}}
                <div class="form-group row">
                    <label for="foto_stnk" class=" col-md-4 col-form-label text-md-right ">{{ __('foto STNK') }}</label>

                    <div class="col-md-6">
                            <img src="{{asset('storage/gambar_stnk/'.$kendaraan->foto_stnk)}}" alt="stnk" class="img-thumbnail" style="max-width:200px"> 
                        <input id="foto_stnk" type="file" class="form-control{{ $errors->has('foto_stnk') ? ' is-invalid' : '' }} " name="foto_stnk" value="{{ $kendaraan->foto_stnk }} " >

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
                            {{ __('Submit') }}
                        </button>
                    </div>
                </div>
            </form>
    
    
    
    
    
    </div>    




@endsection