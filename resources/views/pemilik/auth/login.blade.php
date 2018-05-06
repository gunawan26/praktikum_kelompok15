@extends('layouts.loginlayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
                 <p>Belum punya akun Pemilik Rentcar ? Daftar <a href="{{ url('pemilik/register') }}">di sini</a></p>
            </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"  style="text-align: center;background-color:#28a745"><h4 style="color: #fff">{{ __('Login Pemilik') }}</div>

                <div class="card-body col-md-9 offset-md-3">
                    <form method="POST" action="{{ url('/pemilik/login') }}">
                        @csrf

                        <div class="form-group row mb-20">
                            <div class="col-md-8">
                               <input id="email" type="email"  placeholder="Email Address" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus> 

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-20">
    

                            <div class="col-md-8">
                                <input id="password" type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-20">
                            <div class="col-md-6 offset-md-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-20">
                            <div class="col-md-8 ">
                                <button type="submit" class="btn btn-success btn-block" >
                                    {{ __('Login') }}
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
