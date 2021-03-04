@extends('layouts.app')
@section('migasdepan')
<nav aria-label="breadcrumb migas">
  <ol class="breadcrumb migas">
    
    <li class="breadcrumb-item active"><a href="{{ url('/home') }}">Inicio</a></li>
    <li class="breadcrumb-item" aria-current="page">{{$escolar->nombre}}</li>
  </ol>
</nav>
@endsection

@section('contenido')
                                <div class="container"> 
                                    <div class="row justify-content-center">
                                    
                                        <div class="col-md-10 pad">
                                        
                                        <table class="table table-hover">
                                        <caption>Logros de tu hijo, {{$escolar->nombre}}</caption>

                                                        <tr>
                                                            <th class="tdth1" scope="col">ID Clase</th>
                                                            <th class="tdth2" scope="col">Nombre</th>
                                                            <th class="tdth1" scope="col">Pts.</th>
                                                            <th class="tdth2" scope="col">Items</th>
                                                            <th class="tdth1" scope="col">User</th>
                                                        </tr>
                                                        <tbody>
                                                                    <tr>
                                                                        <td class="tdth1">{{$escolar->id}}</td>
                                                                        <td class="tdth2">{{$escolar->nombre}}</td>
                                                                        <td class="tdth1">{{$escolar->puntos}}</td>
                                                                        <td class="tdth2">
                                                                        @foreach($items as $item)
                                                                        @if($item->escolare_id == $escolar->id)
                                                                            <img src="../../images/{{$item->fotoitem->ruta_foto}}" width="50%"/>
                                                                        @endif
                                                                        @endforeach
                                                                        </td>
                                                                        <td class="tdth1">{{$escolar->user_id}}</td>
                                                                        
                                                                    </tr>
                                                                    
                                                        </tbody>
                                        </table>
                                        </div>
                                    </div>
                                 </div>
@endsection