@extends('layouts.layoutuser')

@section('custom-css')

    <style>
        .form-group *{
            font-size: 13px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font:bold;
        }
        
        
    </style>

@endsection

@section('content')
<hr class="featurette-divider">
<div class="col-lg-9">
    <div class="card mb-3 box-shadow">
        <div class="container">
            <h6 class="title">Data Transaksi</h6>
            <hr class="featurette-divider">
            <div class="form-group row">
                    <label for="Nama_Pengguna" class="col-sm-2 form-control-label">{{ __('Nama ') }}</label>

                    <div class="col-sm-4">
                        <input id="nama_depan" type="text" class="form-control" name="nama_depan" value="Gunawan" required autofocus> 
                            @if ($errors->has('nama_depan'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('nama_depan') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="col-sm-4">
                            <input id="nama_belakang" type="text" class="form-control" name="nama_belakang" value="Kadek" required autofocus> 
                                @if ($errors->has('nama_belakang'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('nama_belakang') }}</strong>
                            </span>
                            @endif
                        </div>
                </div>
                <div class="form-group row">
                        <label for="email" class="col-sm-2 form-control-label">{{ __('Email') }}</label>
    
                        <div class="col-sm-4">
                            <input id="email" type="email" class="form-control" name="email" value="gkadek1998@gmail.com" required autofocus> 
                                @if ($errors->has('email'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>

                    </div>
                    <div class="form-group row">
                            <label for="no_telp" class="col-sm-2 form-control-label">{{ __('No Telp') }}</label>
        
                            <div class="col-sm-4">
                                <input id="no_telp" type="text" class="form-control" name="no_telp" value="08787878984" required autofocus> 
                                    @if ($errors->has('no_telp'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('no_telp') }}</strong>
                                </span>
                                @endif
                            </div>
    
                        </div>
                        <div class="justify-content-center">
                            
                        <button type="submit" class="btn btn-outline-success my-3 my-sm-0 col-sm-2" >Logout</button>
        
                        </div>
                        
        </div>
      
    </div>
</div>
@endsection







