@extends('layouts.loginlayout')

@section('content')
<div class="container" style="margin-top: 30px">
    <div class="row justify-content-center">
                <h4 a>Daftar Rentcar</h4>
            </div>
            <div class="row justify-content-center">
                 <p>Belum punya akun Rentcar ? Daftar <a href="{{ url('/register') }}">di sini</a></p>
            </div>
     <h3 align="center">Login</h3>
        <div class="col-md-9 offset-md-3 ">
                
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row mb-20">
                            <div class="col-md-8 ">
                                
                                <input id="email" type="email"  placeholder="Email Address" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus> 

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-20 ">
                            

                            <div class="col-md-8 ">
                                <input id="password" type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                            <div class="form-group row">
                                 <div class="col-md-8 ">
                                    <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                     <input type="checkbox" class="custom-control-input" id="customControlInline">
                                     <label class="custom-control-label" for="customControlInline">Remember me</label>          
                                 </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-8 ">
                                    <a class="btn btn-link align:center"  href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                </div>
                            </div>

                        <div class="form-group row mb-20">
                            <div class="col-md-8 ">
                                <button type="submit" class="btn btn-success btn-block" >
                                    {{ __('Login') }}
                                </button>

                                
                            </div>
                        </div>
                    </form>
                
            
        </div>
    </div>
</div>
@endsection
