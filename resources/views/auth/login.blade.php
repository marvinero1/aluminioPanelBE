@extends('layouts.app')

@section('content')
<div class="site-section cta-big-image background col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" id="about-section">
    <div class="container">
        {{--  <div class="row mb-5 justify-content-center">
        <div class="col-md-8 text-center">
          <h2 class="section-title mb-3" data-aos="fade-up" data-aos-delay="">About Us</h2>
          <p class="lead" data-aos="fade-up" data-aos-delay="100">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus minima neque tempora reiciendis.</p>
        </div>
      </div>  --}}
        <div class="row">
            <div class="content" class="hold-transition login-page" >
                <div class="pt-5 contenido">
                    {{-- <div class="login-logo">
                    <b>Panel</b>ADMIN
                    </div> --}}
                    <!-- /.login-logo -->
                    <div class="card content row" >
                    <div class="card-body login-card-body form-group">
                        @if (Session::has('message'))
                            <div class="alert alert-info">{{ Session::get('message') }}</div>
                        @endif
                        <img src="images/fondos/logo.png" alt="Logo" style="width: 255px;
                                margin: auto;
                                display: block;"><br>

                        <p class="login-box-msg">Complete sus datos para Iniciar Sesión</p>
                
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                        <div class="input-group mb-3 col-md">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                            </div>
                        </div>
                        <div class="input-group mb-3 col-md">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            {{-- <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                Remember Me
                                </label>
                            </div>
                            </div> --}}
                            <!-- /.col -->
                            {{-- <div class="col-12 col-md-6 btncard"> --}}
                            {{-- <button type="submit" class="btn btn-dark btn-block">Ingresar</button> --}}
                            {{-- </div> --}}
                            <div class="form-group row mb-0">
                                <div class="col-12 col-md-6 btncard">
                                    <button type="submit" class="btn btn-dark btn-block">
                                        {{ __('Login') }}
                                    </button> 
                                </div>
                                <div class="col-md-8 offset-md-4">
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        </form>
                
                        {{-- <div class="social-auth-links text-center mb-3">
                        <p>- OR -</p>
                        <a href="#" class="btn btn-block btn-primary">
                            <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                        </a>
                        <a href="#" class="btn btn-block btn-danger">
                            <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                        </a>
                        </div> --}}
                        <!-- /.social-auth-links -->
                
                        {{-- <p class="mb-1">
                        <a href="forgot-password.html">Olvide mi contrseña</a>
                        </p> --}}
                        <p class="mb-0">
                        <a href="/register" class="text-center">¿Registrar como Empresa?</a>
                        </p>
                    </div>
                    <!-- /.login-card-body -->
                    </div>
                </div>
                <!-- /.login-box -->
                {{-- <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">{{ __('Login') }}</div>

                            <div class="card-body">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-6 offset-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                <label class="form-check-label" for="remember">
                                                    {{ __('Remember Me') }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Login') }}
                                            </button>

                                            @if (Route::has('password.request'))
                                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                                    {{ __('Forgot Your Password?') }}
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</div>


@endsection
<style>
    .background{
        background-size: cover;
        height: 93.5% !important;
        background-image: url("images/background.png");
        background-repeat: no-repeat;
        background-size: 100% 100%;
    }
    @media screen and (max-width:400px){
        .background {
            height: 139% !important;
            background-repeat: cover;
            background-size: cover;     
        }
    }
    @media screen and (max-height:550px){
        .background {
            height: 100% !important;
               
        }
    }
    @media screen and (max-height:375px){
        .background {
            height: 136% !important;
               
        }
    }
    @media screen and (max-height:280px){
        .background {
            height: 193% !important;
               
        }
    }
    .content{
        display: block;
        margin: auto
    }

    .btncard{
        width: 22%;
        display: block;
        margin: auto;
    }
</style>