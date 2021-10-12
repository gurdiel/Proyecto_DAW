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
<div class="container text-warning grande text-center">
Clases del Centro Educativo.
</div>
<div class="container">
    <div class="row justify-content-center">
<div class="list-group grupo col-md-8 justify-content-center">
  <table class="table table-hover pad">
    <tr class="text-success">
      <th class="tdth1 text-center" scope="col">Clase</th>
      <th class="tdth2 text-center" colspan ="2" scope="col">Acciones</th>
    </tr>
<tbody>
@if($clases)
@foreach($clases as $clase)
<tr>
<td class="tdth1" style="vertical-align:middle;"><a href="{{route('clases.edit', $clase->id)}}" class="list-group-item list-group-item-action text-info card text-center">{{$clase->nombre}}</a></td>
<td class="tdth1" style="vertical-align:middle;text-align:center;">
  <a href="{{route('clases.edit',$clase->id)}}" class="btn btn-warning">Editar</a></td>
  <td class="tdth1" style="vertical-align:middle;text-align:center;">
  <form method="POST" action="{{ url('/admin/clases/'.$clase->id) }}">
          {{ csrf_field() }}
          {{ method_field('DELETE') }}
          <button type="submit" onclick="return confirm('¿Desea eliminar esta clase?');" class="btn btn-danger">
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
<a href="{{route('clases.create')}}" class="btn bg-success text-dark">Nueva Clase</a>&nbsp
<button type="button" class="btn btn-info" onclick="location.href='{{url('/home')}}';">Atrás</button>
</div>
</div></div></div>
@endsection