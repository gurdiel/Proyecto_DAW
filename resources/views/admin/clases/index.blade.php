@extends('layouts.app')
@section('migasdepan')

<nav aria-label="breadcrumb migas">
  <ol class="breadcrumb migas">
    
    <li class="breadcrumb-item active"><a href="{{ url('/home') }}">Inicio</a></li>
    <li class="breadcrumb-item" aria-current="page">Clases</li>
  </ol>
</nav>

@endsection

@section('contenido')
<A name="arriba"></A>
<div class="container text-success grande" style="text-align: center;">

Clases del Centro Educativo.
</div>

<div class="list-group grupo">
  <table class="table table-hover pad">
    <tr class="text-info">
      <th class="tdth1" scope="col">Clase</th>
      <th class="tdth2" colspan ="2" scope="col">Acciones</th>
    </tr>
<tbody>
@if($clases)
@foreach($clases as $clase)
<tr>
<td class="tdth1" style="vertical-align:middle;"><a href="{{route('clases.edit', $clase->id)}}" class="list-group-item list-group-item-action text-info card text-center">{{$clase->nombre}}</a></td>
<td class="tdth1" style="vertical-align:middle;">
  <a href="{{route('clases.edit',$clase->id)}}" class="btn btn-warning">Editar</a></td>
  <td class="tdth1" style="vertical-align:middle;">
  <form method="POST" action="{{ url('/admin/clases/'.$clase->id) }}">
          {{ csrf_field() }}
          {{ method_field('DELETE') }}
          <button type="submit" onclick="return confirm('BORRAR?');" class="btn btn-danger">
          {{ __('Eliminar') }}
          </button>
    </form>
</td>

</tr>
@endforeach
@endif
</tbody>
</table>
<div class="d-flex justify-content-center pad">
<a href="{{route('clases.create')}}" class="card-link bg-success text-dark">Nueva Clase</a>
</div>
</div>
@endsection