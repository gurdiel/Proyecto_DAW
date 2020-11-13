@extends('layouts.app')

@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="flex-center position-ref full-height grupo">
                    <p>Página para agregar usuarios</p>
        

                        <form action="{{url('admin/users')}}" method="post" class="grupo">
                        {{ csrf_field() }}
                        <div class="row">
                        <div class="col-6">Nombre:</div><div class="col-4"><input type="text" name="nombre" size="20"></div>
                        </div>
                        <div class="row">
                        <div class="col-6">Telefono:</div><div class="col-4"><input type="text" name="telefono" size="20"></div>
                        </div>
                        <div class="row">
                        <div class="col-6">Email:</div> <div class="col-4"><input type="text" name="email" size="20"></div>
                        </div>
                        <div class="row">
                        <div class="col-6">Fam. Autorizado:</div><div class="col-4"><input type="text" name="fam_aut" size="20"></div>
                        </div>
                        <div class="row">
                        <div class="col-6">Escolar id:</div><div class="col-4"><input type="number" name="escolare_id" size="20"></div>
                        </div>
                        <div class="row">
                        <div class="col-6">Clase id:</div><div class="col-4"><input type="number" name="clase_id" size="20"></div>
                        </div>
                        <div class="row">
                        <div class="col-6">Rol id:</div><div class="col-4"><input type="number" name="role_id" size="20"></div>
                        </div>
                        <div class="row">
                        <div class="col-6">Password:</div><div class="col-4"><input type="text" name="password" size="20"></div>
                        </div>
                        
                        <div class="row">
                            <div class="col-6">
                            <input type="submit" value="Enviar">
                            <input type="reset" value="Borrar">
                        </div>
                        </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
