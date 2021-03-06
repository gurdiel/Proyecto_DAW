@extends('layouts.app')
@section('migasdepan')

<nav aria-label="breadcrumb migas">
  <ol class="breadcrumb migas">
    
    <li class="breadcrumb-item active"><a href="{{ url('/home') }}">Inicio</a></li>
    <li class="breadcrumb-item" aria-current="page">Menu</li>
  </ol>
</nav>

@endsection

@section('contenido')
<div class="container grupo">
  <div class="row justify-content-center">
    <div class="col-8">
        <div class="list-group">
        <div class="panel-title" style="font-size:xx-large;">Elige tu rol:</div>
            <!--{{url('register/docente/')}}-->
            <a href="{{url('admin/docentes/')}}" class="list-group-item list-group-item-action card text-info text-center text-center">Docente</a>
            <a href="{{url('admin/progenitores/')}}" class="list-group-item list-group-item-action card text-info text-center">Progenitor</a>
            <a href="{{url('admin/escolares/')}}" class="list-group-item list-group-item-action card text-info text-center">Escolar</a>
        </div>
    </div>
  </div>
</div>
@endsection
