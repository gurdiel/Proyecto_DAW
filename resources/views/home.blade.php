@extends('layouts.app')

@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Panel de control</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(Auth::user()->role_id == 1)
                    Bienvenido, {{ Auth::user()->name }} eres {{ Auth::user()->role->nombre }} que deseas hacer?
                    <div>
                    <div class="list-group grupo">
                        <a href="{{url('/admin/users/')}}" class="list-group-item list-group-item-action active">Listar usuarios</a>
                        <a href="#" class="list-group-item list-group-item-action active">Crear usuario</a>
                        <a href="#" class="list-group-item list-group-item-action active">Modificar usuario</a>
                        <a href="#" class="list-group-item list-group-item-actiona active">Eliminar usuario</a>
                        <a href="#" class="list-group-item list-group-item-action disabled" tabindex="-1" aria-disabled="true">Nueva funcionalidad</a>
                    </div>
                    </div>
                    @endif
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
