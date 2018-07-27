@extends('layouts.init')

@section('content')
<div class="row">
    <div class="col-sm-6 offset-md-3">
    <div class="card card-login">
        <form method="POST" class="login-form" action="/auth/login">
            {!! csrf_field() !!}
            <div class="row">
                <div class="col-sm">
                    <div class="form-group">
                        <label for="email">Correo</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" placeholder="ingresa tu correo" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <div class="form-group">
                        <label for="clave">Clave</label>
                        <input type="password" name="password" id="clave" class="form-control" placeholder="ingresa tu clave" />
                    </div>
                </div>
            </div>            
            <div class="row">
                <div class="col-sm">
                    <button type="submit" class="btn btn-outline-primary btn-block" >Ingresar</button>
                </div>
                <div class="col-sm">
                    <button type="button" class="btn btn-outline-danger btn-block" >Cancelar</button>
                </div>
            </div>
        </form>
        <hr>
        <div class="row login-footer">
            <div class="col-sm-12">
                <a href="/auth/register" class="btn btn-light btn-block">Registrate aqui</a>
            </div>
        </div>
    </div>
    <div class="col-sm"></div>
</div>
@endsection