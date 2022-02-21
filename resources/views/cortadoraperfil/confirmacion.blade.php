@extends('layouts.main')
@section('content')
<div class="content-wrapper pt-3" onload="sinVueltaAtras();" onpageshow="if (event.persisted) sinVueltaAtras();" onunload="">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="card-title">Confirmar Creacion de Barra para la linea {{ $perfil->linea }}</h3>
                        </div>
                        <form action="{{route('perfil.updatePerfil', $perfil->id ) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                            <div class="modal-body text-center">
                                <div class="container">
                                    <div class="row"> 
                                        <div class="col">
                                             <h5>Confirmar Creacion para linea</h5><p><strong>{{ $perfil->linea }}</strong></p>
                                        </div>
                                        
                                        <div class="col-md-12">
                                            <div class="input-group mb-3">
                                                <input hidden type="text" value="true" 
                                                name="estado">
                                            </div>
                                        </div>
                                         <div class="col-md-12">
                                            <div class="input-group mb-3">
                                                <input hidden type="text" value="{{ $perfil->hoja_id }}" name="hoja_id">
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="modal-footer text-center">
								<button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal">
									Cancelar
								</button>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-check" aria-hidden="true"></i> Confirmar</button>
                            </div>
                        </form>

                        <!-- Modal -->
						<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content text-center">
    						    <div class="modal-header">
    						        <h5 class="modal-title text-center" id="exampleModalLabel">¿Esta seguro de Salir?</h5>
    						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    						          <span aria-hidden="true">&times;</span>
    						        </button>
    						      </div>
    						      <div class="modal-body justify-content">
    						       <p><strong>Nota:</strong></p>
                                   <p><strong>Si sale sin confirmar la creacion de barras podria tener un duplicado, aconsejamos confirmar creación.</strong></p>
    						      </div>
    						      <div class="modal-footer">
    						        <button type="button" class="btn btn-primary"
                                    data-dismiss="modal">Ok</button>
    						    </div>
						  </div>
					</div>
				</div>
            </div>
    </section>
</div>

<script type="text/javascript">
    window.history.forward();
    function sinVueltaAtras(){ window.history.forward(); }
</script>
@endsection