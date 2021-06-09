@extends('layouts.main')

@section('content')
<div class="content-wrapper pt-3">
	<div class="p-3">
		<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
	    <i class="fa fa-address-book-o nav-icon"></i> &nbsp; Agregar Nuevo Contacto
	  	</button><br>

	 	<div class="collapse" id="collapseExample">
		  <div class="card card-body">
    	    <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">Registro Contacto</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('contacto.store')}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nombre">Nombre </label>
                                    <input type="text" class="form-control" name="nombre"
                                        placeholder="Nombre" required>
                                </div>
                            </div>
                             <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nombre">Ciudad</label>
                                    <select class="custom-select" id="inputGroupSelect01" name="ciudad" required>
    								    <option selected>Elige...</option>
    								    <option value="La-Paz">La Paz</option>
    								    <option value="Oruro">Oruro</option>
    								    <option value="Potosi">Potosi</option>
    								    <option value="Cochabamba">Cochabamba</option>
    								    <option value="Sucre">Sucre</option>
    								    <option value="Tarija">Tarija</option>
    								    <option value="Santa-Cruz">Santa Cruz</option>
    								    <option value="Beni">Beni</option>
    								    <option value="Pando">Pando</option>
    								  </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nombre">Teléfono</label>
                                    <input type="number" class="form-control" name="telefono"
                                        placeholder="Teléfono" required>
                                </div>
                            </div>
                             <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nombre">Whatsapp</label>
                                    <input type="number" class="form-control" name="whatsapp"
                                        placeholder="Whatsapp">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a type="button" class="btn btn-secondary float-right" href="{{url('/contacto')}}">Cerrar</a>
                        <button type="submit" class="btn btn-primary float-right mr-2"><i class="fa fas fa-save"></i> Guardar</button>
                    </div>
                </form>
            </div>
		  </div>
		</div>	
	</div>

	<h1 style="text-align: center" class="mb-4">Contactos Altools</h1>
    <div class="content">
        @if (Session::has('message'))
        <div class="alert alert-success">{{ Session::get('message') }}</div>
        @endif
        @if (Session::has('error'))
        <div class="alert alert-danger">{{ Session::get('error') }}</div>
        @endif<br>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        {{-- <th>Id</th>  --}}
                        <th style="text-align:center;">Nombre</th>
                        <th style="text-align:center;">Ciudad</th>
                        <th style="text-align:center;">Telefono</th>
                        <th style="text-align:center;">Whatsapp</th>
                        <th style="text-align:center;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contactano as $categorias)
                    <tr>
                        <td style="text-align:center;">{{ $categorias->nombre }}</td>
                        <td style="text-align:center;">{{ $categorias->ciudad }}</td>
                        <td style="text-align:center;">{{ $categorias->telefono }}</td>
                        <td style="text-align:center;">{{ $categorias->whatsapp }}</td>

                        <td style="text-align:center;">
                            <!-- <a href="{{ route('contacto.edit',$categorias->id ) }}">
                                <button class="btn btn-primary btn-sm"><i class="fa  fa-pencil-alt"
                                        aria-hidden="true"></i> Editar
                                </button></a> -->
                            <form action="{{ route('contacto.destroy',$categorias->id ) }}" method="POST"
                                accept-charset="UTF-8" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Image"
                                    onclick="return confirm(&quot;¿Desea eliminar?&quot;)"><i class="fa fas fa-trash"
                                        aria-hidden="true"></i> Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table><br><br>
        </div>
    </div>
</div>
@endsection