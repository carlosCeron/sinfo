@extends('layouts.master')


@section('content')
    <div class="row body-content">
        <div class="col-md-12">
        <h1>Nueva Compra</h1>
        <hr>

        <!--{!! $articulos !!}-->
        <form method="post">
                {{csrf_field()}}
                <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cliente">Cliente</label>
                                <input type="text" name="cliente" id="cliente" placeholder="Ingrese el cliente" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cliente">Articulo</label>
                                <select name="articulo" id="idArticulo" class="form-control">
                                    @foreach($articulos as $articulo)
                                        <option value="{{$articulo->codigo_articulo}}">{{$articulo->nombre_articulo}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="descripcion">
                            Descripción
                        </label>
                        <input type="text" name="descripcion" id="descripcion" placeholder="Ingresa una descripción" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="cantidad">Cantidad</label>
                        <input type="text" name="cantidad" id="cantidad" placeholder="ingresa la cantidad" class="form-control">
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <button class="btn btn-primary btn-lg btn-block">Crear</button>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-danger btn-lg btn-block">Eliminar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection