@extends('layouts.app')
@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-info">{{ __('Nuevo Escolar') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" required autocomplete="nombre" autofocus>

                                @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="clase_id" class="col-md-4 col-form-label text-md-right">{{ __('Clase_id') }}</label>

                            <div class="col-md-6">
                                <input id="clase_id" type="number" name="clase_id"  class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="progenitore_id" class="col-md-4 col-form-label text-md-right">{{ __('Progenitor nº') }}</label>

                            <div class="col-md-6">
                                <input id="progenitore_id" type="number" name="progenitore_id"  class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="role_id" class="col-md-4 col-form-label text-md-right">{{ __('role_id') }}</label>

                            <div class="col-md-6">
                                <input id="role_id" type="number" class="form-control @error('role_id') is-invalid @enderror" name="role_id" value="4" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="foto_id" class="col-md-4 col-form-label text-md-right">{{ __('Foto:') }}</label>

                            <div class="col-md-6 foto">
                                <input id="foto_id" type="file" name="foto_id" accept="image/png, .jpeg, .jpg, image/gif">
                            </div>
                            </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success text-dark">
                                    {{ __('Registrar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection