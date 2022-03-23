@extends('layouts.main')

@section('content')
<div class="content-wrapper pt-4 p-2">
    <h1 style="text-align: center" class="mb-4">Cortadora</h1>
    <div class="content">
        @if (Session::has('message'))
        <div class="alert alert-success">{{ Session::get('message') }}</div>
        @endif
        @if (Session::has('error'))
        <div class="alert alert-danger">{{ Session::get('error') }}</div>
        @endif

        @if($estado != true)
            <div class="float-right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-plus">&nbsp;&nbsp;</i>Crear Hoja Calculo
                </button>  
            </div>
        @endif
        
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header text-center">
                <div class="text-center">
                    <h4 class="modal-title" id="exampleModalLabel">Hoja Calculo</h4>                    
                </div>
              </div>
              <div class="modal-body">
                <div class="text-center">
                    <h5>¿Desea Crear Una Hoja De Calculo?</h5>
                </div>
                <form action="{{route('HojaCalculoController.createHojaPerfil')}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="user_id" hidden="true" value="{{Auth::user()->id}}">

                                    <input type="text" class="form-control" name="estado" hidden="true" value="false">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary float-right mr-2"><i class="fa fas fa-save"></i> Crear Hoja</button>
                    </div>
                </form>
              </div>
            </div>
          </div>
        </div>


        @if($estado != false)
            <div class="container">
                <form action="{{route('perfil.store')}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                <div class="col-md-12">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Linea</label>
                      </div>
                      <select class="custom-select" id="inputGroupSelect01" name="linea">
                        <option selected>Elige...</option>
                        <option value="L-20">Linea 20</option>
                        <option value="L-25">Linea 25</option>
                      </select>
                    </div>
                </div>
            </div><br>
            <div class="row">
                <div class="col-md-6">
                    <label for="basic-url">Ancho</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" aria-describedby="basic-addon3" name="ancho" placeholder="Ancho">
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="basic-url">Alto</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" aria-describedby="basic-addon3" name="alto" placeholder="Alto">
                    </div>
                </div>
                
                <div class="col-md-6">
                    <label for="basic-url">Cantidad Ventanas</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" aria-describedby="basic-addon3" placeholder="Cantidad" name="repeticion">
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="basic-url">Descripción</label>
                    <div class="input-group mb-3">
                        <textarea type="text" class="form-control" aria-describedby="basic-addon3" name="descripcion" placeholder="Descripción"></textarea> 
                    </div>
                </div>

                <input type="text" class="form-control" hidden="true" name="user_id" value="{{ Auth::user()->id }}">
                <input type="text" class="form-control" hidden="true" name="hoja_id" value="{{ $hoja_calculo_perfil->id }}">
            </div><br>


            <div class="row">
                <div class="carousel-inner" role="listbox">
                <!--First slide-->
                <div class="carousel-item active">
                  <div class="col-md-4" style="float:left">
                   <div class="card mb-2">
                      <img class="card-img-top"
                        src="/images/combinaciones/combinacion1.png" alt="Card image cap">
                      <div class="card-body">
                        <div class="input-group-text">
                          <input type="checkbox" name="combinacion" value="combinacion1">
                          <label><strong>OK!</strong></label>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-4" style="float:left">
                    <div class="card mb-2">
                      <img class="card-img-top"
                        src="/images/combinaciones/combinacion4.png" alt="Card image cap">
                      <div class="card-body">
                        <div class="input-group-text">
                          <input type="checkbox" name="combinacion" value="combinacion4">
                          <label><strong>OK!</strong></label>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-4" style="float:left">
                    <div class="card mb-2">
                      <img class="card-img-top"
                        src="/images/combinaciones/combinacion5.png" alt="Card image cap">
                      <div class="card-body">
                            <div class="input-group-text">
                            <input type="checkbox" name="combinacion" value="combinacion5">
                            <label><strong>OK!</strong></label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div> 
        </div><br>

        <div class="float-right">
            <button type="submit" class="btn btn-primary float-right mr-2"><i class="fa fas fa-save"></i> Guardar</button>
            &nbsp;
            <!-- Button trigger modal CerrarHoja-->
            <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModalCerrarHoja">
          <i class="fa fas fa-close"></i> Cerrra Hoja Calculo
        </button> 
        </div><br><br> 
    </form>            
    

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCerrarHoja" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Cerrar Hoja Calculo</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="{{route('hojaPerfil.updateHojaPerfil', $hoja_calculo_perfil->id )}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
              <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <label for="basic-url">Nombre Cliente</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" aria-describedby="basic-addon3" placeholder="Nombre Cliente" 
                            name="nombre_cliente">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="basic-url">Celular</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" aria-describedby="basic-addon3" placeholder="Celular" name="celular">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="basic-url">Descripción</label>
                        <div class="input-group mb-3">
                            <textarea type="text" class="form-control" aria-describedby="basic-addon3" name="descripcion" placeholder="Descripción"></textarea> 
                        </div>
                    </div>
                </div>
                <input type="text" class="form-control" hidden="true" name="estado" value="true">

              </div>
          <div class="modal-footer">
            {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
            <button type="submit" class="btn btn-primary"><i class="fa fas fa-save"></i> Guardar</button>
          </div>
          </form>
        </div>
      </div>
    </div>


    @endif
        </div>
    </div>
</div>
@endsection