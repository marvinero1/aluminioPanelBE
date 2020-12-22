@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="mb-4">
                <div class="collapse" id="collapseExample{{ Auth::user()->id }}">
            <br>
            <div class="card card-body">
                <h5 style="text-align: center;">Requisitos Persona Natural</h5><br>
                <div class="row mb-3">
                    <div class="col">
                        <h5>Fotocopia Carnet</h5><br>
                        <a >
                            <img src="images/Document-icon.png" alt="document" 
                                style="width: 20% !impotant;display: block;margin: auto;">
                        </a>
                    </div>
                    <div class="col">
                       
                    </div>
                    <div class="col">
                        
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-6">
                        <h4><strong>Apellido</strong> </h4> 
                        <h5>{{ Auth::user()->apellido }}</h5>
                    </div>
                    <div class="col-md-6">
                        <h4><strong>Whatsapp</strong> </h4>
                       <h5>{{ Auth::user()->whatsapp }}</h5>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-6">
                        <h4><strong>Dirección</strong> </h4>
                        <h5>{{ Auth::user()->direccion }}</h5> 
                    </div>
                    <div class="col-md-6">
                       <h4><h4><strong>Teléfono</strong> </h4></h4> 
                        <h5>{{ Auth::user()->telefono }}</h5>
                    </div>
                </div>
                
                <div class="row mb-4">
                    <div class="col-md-6">
                        <h4><strong>Role</strong> </h4> 
                        <h5>{{ Auth::user()->role }}</h5>
                    </div>
                    <div class="col-md-6">
                        <h4><strong>Desde:</strong> </h4>
                       <h5>{{ Auth::user()->created_at }}</h5>
                    </div>
                </div>
            </div>
        </div>
            </div>
        </div>
        <div class="collapse" id="collapseExample{{ Auth::user()->id }}">
            <br>
            <div class="card card-body">
                <h5 style="text-align: center;">Requisitos Persona Natural</h5><br>
                <div class="row mb-3">
                    <div class="col">
                        <h5>Fotocopia Carnet</h5><br>
                        <a >
                            <img src="images/Document-icon.png" alt="document" 
                                style="width: 20% !impotant;display: block;margin: auto;">
                        </a>
                    </div>
                    <div class="col">
                       
                    </div>
                    <div class="col">
                        
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-6">
                        <h4><strong>Apellido</strong> </h4> 
                        <h5>{{ Auth::user()->apellido }}</h5>
                    </div>
                    <div class="col-md-6">
                        <h4><strong>Whatsapp</strong> </h4>
                       <h5>{{ Auth::user()->whatsapp }}</h5>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-6">
                        <h4><strong>Dirección</strong> </h4>
                        <h5>{{ Auth::user()->direccion }}</h5> 
                    </div>
                    <div class="col-md-6">
                       <h4><h4><strong>Teléfono</strong> </h4></h4> 
                        <h5>{{ Auth::user()->telefono }}</h5>
                    </div>
                </div>
                
                <div class="row mb-4">
                    <div class="col-md-6">
                        <h4><strong>Role</strong> </h4> 
                        <h5>{{ Auth::user()->role }}</h5>
                    </div>
                    <div class="col-md-6">
                        <h4><strong>Desde:</strong> </h4>
                       <h5>{{ Auth::user()->created_at }}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection