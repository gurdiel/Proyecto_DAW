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
        <div class="list-group sinfondo">
          @if(Auth::user())
                @if(Auth::user()->role_id == 1)
                 <div class="panel-title grande text-warning pad">Que desea crear:</div>
                   <a href="{{url('admin/docentes/create')}}" class="list-group-item list-group-item-action card text-danger text-center">Docentes</a>
                   <a href="{{url('admin/progenitores/create')}}" class="list-group-item list-group-item-action card text-danger text-center">Progenitores</a>
                   <a href="{{url('admin/escolares/create')}}" class="list-group-item list-group-item-action card text-danger text-center">Escolares</a>    
                  </div>
                @endif
            @else
                <div class="panel-title grande text-warning pad">Registro para progenitores:</div>
                <a href="{{url('admin/docentes/create')}}" class="list-group-item list-group-item-action card text-danger text-center">Docentes</a>
                 <a href="{{url('admin/progenitores/create')}}" class="list-group-item list-group-item-action card text-danger text-center">Entrar para registro</a>
                </div>
              
              @endif
        
        
        <div class="div pad text-center">
        <button type="button" class="btn btn-info" onclick="location.href='{{url()->previous()}}';">Atrás</button>
        </div>
    </div>
  </div>
</div>

@endsection
