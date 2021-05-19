@extends('layouts.main')

@section('content')

<div class="content-wrapper pt-3"><br>    
	<section class="content">
    	<h2 class="labelTittle">Registro Empresa</h2><br><br>
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                	<div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="container">
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
                                            <input type="hidden" name="registrado" value="{{Auth::user()->name}}">

                                            <input type="hidden" name="role" value="empresa">
                                            <input type="hidden" name="subscripcion" value="false">
                                        </div>
                                        <button type="submit" class="btn btn-primary px-4 float-right"><span class="icon-save"></span>&nbsp;
                                          Guardar</button>
                                    </form>
                                </div>
					</div>
                </div>
            </div>
        </div>
    </section>
</div>
<style type="text/css">
    .labelTittle{
        text-align: center;
    }
</style>
@endsection