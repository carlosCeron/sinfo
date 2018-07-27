@extends('layouts.init')

@section('content')

<div class="row">
    <div class="col-sm-6 offset-md-3">
        <div class="card card-login">
            <form method="POST" class="login-form" action="/auth/register">
            {!! csrf_field() !!}
                <div class="row">
                    <div class="col-sm">
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" name="name"  class="form-control" value="{{ old('name') }}">
                        </div>
                    </div> 
                </div>
                <div class="row">
                    <div class="col-sm">
                        <div class="form-group">
                            <label for="email">Correo</label>
                            <input type="email" name="email"  class="form-control" value="{{ old('email') }}">
                        </div>
                    </div> 
                </div>
                <div class="row">
                    <div class="col-sm">
                        <div class="form-group">
                            <label for="password">Clave</label>
                            <input type="password" name="password"  class="form-control">
                        </div>
                    </div> 
                </div>
                <div class="row">
                    <div class="col-sm">
                        <div class="form-group">
                            <label for="password">Confirmar Password</label>
                            <input type="password" name="password_confirmation"  class="form-control">
                        </div>
                    </div> 
                </div>
                <div class="row">
                    <div class="col-sm">
                        <button type="submit" class="btn btn-outline-primary btn-block" >Crear Nuevo</button>
                    </div>
                    <div class="col-sm">
                        <button type="button" class="btn btn-outline-danger btn-block" >Cancelar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>    
</div>
@endsection