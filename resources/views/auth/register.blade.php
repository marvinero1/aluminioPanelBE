@extends('layouts.app')

@section('content')

{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
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
</div> --}}
<div class="site-section cta-big-image background" id="about-section">
    <br><br><br>
    <div class="container">
        {{--  <div class="row mb-5 justify-content-center">
        <div class="col-md-8 text-center">
          <h2 class="section-title mb-3" data-aos="fade-up" data-aos-delay="">About Us</h2>
          <p class="lead" data-aos="fade-up" data-aos-delay="100">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus minima neque tempora reiciendis.</p>
        </div>
      </div>  --}}
        <div class="row">
            <div class="col-lg-5 ml-auto" data-aos="fade-up" data-aos-delay="100">
                @if (Session::has('message'))
                <div class="alert alert-info">{{ Session::get('message') }}
                </div>
                @endif
                <h2>Registro</h2><br>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                  
                    <li class="nav-item">
                        <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                            aria-controls="profile" aria-selected="false" >
                            <strong>Registro Usuario</strong></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                            aria-controls="contact" aria-selected="false">
                            <strong>Registro Empresa</strong></a>
                    </li>
                </ul><br>
                <div class="row">
                    <div class="col-md-12 mx-auto">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="container">
                                    <form action="{{route('user.store')}}" method="POST">
                                        {{csrf_field()}}
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label for="nombre">Nombre</label>
                                                <input type="text" class="form-control" id="nombre" placeholder="Nombre"
                                                    name="name" required>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Apellido</label>
                                                <input type="text" class="form-control" placeholder="Apellido"
                                                    name="apellido" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label>Dirección</label>
                                                <input type="text" class="form-control" placeholder="Direccion"
                                                    name="direccion">
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Teléfono</label>
                                                <input type="number" class="form-control" placeholder="Telefono"
                                                    name="telefono" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label>Pais</label>
                                                <input type="text" class="form-control" placeholder="Pais" name="pais">
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Ciudad</label>
                                                <input type="text" class="form-control" placeholder="Ciudad"
                                                    name="ciudad">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label>Whatsapp</label>
                                                <input type="number" class="form-control" placeholder="Whatsapp"
                                                    name="whatsapp">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label>Correo Electronico</label>
                                                <input type="text" class="form-control" placeholder="Email "
                                                    name="email" required>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Contraseña</label>
                                                <input type="password" class="form-control" placeholder="Contraseña"
                                                    name="password" required>
                                            </div>
                                            <input type="hidden" name="role" value="user">
                                        </div>
                                        <button type="submit" class="btn btn-primary px-4 float-right">
                                          <span class="icon-save"></span>&nbsp;Guardar</button>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                <div class="container" >
                                    <form action="{{route('user.store1')}}" method="POST">
                                        {{csrf_field()}}
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label>Nombre Empresa</label>
                                                <input type="text" class="form-control" placeholder="Nombre Empresa"
                                                    name="name" required>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Nit</label>
                                                <input type="number" class="form-control" placeholder="Nit" name="nit" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label>Pais</label>
                                                <input type="text" class="form-control" placeholder="Pais" name="pais" required>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Ciudad</label>
                                                <input type="text" class="form-control" placeholder="Ciudad"
                                                    name="ciudad">
                                            </div>
                                            
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label>Direccion</label>
                                                <input type="text" class="form-control" placeholder="Direccion"
                                                    name="direccion">
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Telefono</label>
                                                <input type="number" class="form-control" placeholder="Telefono"
                                                    name="telefono" required>
                                            </div>
                                        </div><br>
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label>Whatsapp</label>
                                                <input type="number" class="form-control" placeholder="Whatsapp"
                                                    name="whatsapp">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label>Correo Electronico</label>
                                                <input type="text" class="form-control" placeholder="Email "
                                                    name="email" required>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Contraseña</label>
                                                <input type="password" class="form-control" placeholder="Contraseña"
                                                    name="password" required>
                                            </div>
                                            <input type="hidden" name="role" value="empresa">
                                        </div>
                                        <button type="submit" class="btn btn-primary px-4 float-right"><span class="icon-save"></span>&nbsp;
                                          Guardar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-5" data-aos="fade-up" data-aos-delay="">
                <figure class="circle-bg">
                    <img src="images/Untitled.png" alt="Logo" class="img-fluid">
                </figure>
            </div>
        </div>
    </div>
</div>

@endsection
<style>
    .background{
        background-size: cover;
        height: 93% !important;
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
    label, h2{
        color: white !important;
    }
</style>