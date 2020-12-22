@extends('layouts.main')

@section('content')
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="mb-4">
                
                <div class="avatar-flip">
                    <img src="http://media.idownloadblog.com/wp-content/uploads/2012/04/Phil-Schiller-headshot-e1362692403868.jpg" height="150" width="150">
                    <img src="http://i1112.photobucket.com/albums/k497/animalsbeingdicks/abd-3-12-2015.gif~original" height="150" width="150">
                </div>
                <h2>{{ Auth::user()->name }}</h2>
                <h4>{{ Auth::user()->ciudad }}, {{ Auth::user()->pais }}</h4><br>
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
                <div class="row mb-4">
                    <a title="Edit" href="{{ route('user.edit', Auth::user()->id ) }}">
                        <button class="btn btn-dark btn-md"><i class="fa fa-pencil-square-o"
                                aria-hidden="true"></i>Editar
                        </button></a>
                        <button class="btn btn-primary" type="button" data-toggle="collapse"
    data-target="#collapseExample{{ Auth::user()->id }}" aria-expanded="false"
    aria-controls="collapseExample{{ Auth::user()->id }}">
    Ver Mas
</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<style>

.container {
  width: 400px;
  margin: 120px auto 120px;
  background-color: #fff;
  padding: 0 20px 20px;
  border-radius: 6px;
  -webkit-border-radius: 6px;
  -moz-border-radius: 6px;
  box-shadow: 0 2px 5px rgba(0,0,0,0.075);
  -webkit-box-shadow: 0 2px 5px rgba(0,0,0,0.075);
  -moz-box-shadow: 0 2px 5px rgba(0,0,0,0.075);
  text-align: center;
}
.container:hover .avatar-flip {
  transform: rotateY(180deg);
  -webkit-transform: rotateY(180deg);
}
.container:hover .avatar-flip img:first-child {
  opacity: 0;
}
.container:hover .avatar-flip img:last-child {
  opacity: 1;
}
.avatar-flip {
  border-radius: 100px;
  overflow: hidden;
  height: 150px;
  width: 150px;
  position: relative;
  margin: auto;
  top: -60px;
  transition: all 0.3s ease-in-out;
  -webkit-transition: all 0.3s ease-in-out;
  -moz-transition: all 0.3s ease-in-out;
  box-shadow: 0 0 0 13px #f0f0f0;
  -webkit-box-shadow: 0 0 0 13px #f0f0f0;
  -moz-box-shadow: 0 0 0 13px #f0f0f0;
}
.avatar-flip img {
  position: absolute;
  left: 0;
  top: 0;
  border-radius: 100px;
  transition: all 0.3s ease-in-out;
  -webkit-transition: all 0.3s ease-in-out;
  -moz-transition: all 0.3s ease-in-out;
}
.avatar-flip img:first-child {
  z-index: 1;
}
.avatar-flip img:last-child {
  z-index: 0;
  transform: rotateY(180deg);
  -webkit-transform: rotateY(180deg);
  opacity: 0;
}
h2 {
  font-size: 32px;
  font-weight: 600;
  margin-bottom: 15px;
  color: #333;
}
h4 {
  font-size: 13px;
  color: #00baff;
  letter-spacing: 1px;
  margin-bottom: 25px
}
p {
  font-size: 16px;
  line-height: 26px;
  margin-bottom: 20px;
  color: #666;
}
</style>
