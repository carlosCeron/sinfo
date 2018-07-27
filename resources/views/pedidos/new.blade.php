@extends('layouts.master')


@section('content')
    <div class="row body-content">
        <div class="col-md-12">
        <h1>Nueva Pedido</h1>
        <hr>
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
                            <label for="descripcion">
                                Fecha Pedido 
                            </label>
                            <input type="date" name="fecha_pedido" id="fecha_pedido" class="form-control">
                        </div>
                </div>
                <input type="hidden" id="countItems" name="countItems" value="1">
                <div class="row">
                    <div class="col-md-6">
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <h3>Nuevo Item</h3>
                            </div>
                            <div class="col-md-6">
                            <button type="button" class="btn btn-default" id="addBtn"><i class="fas fa-plus-square"></i> item</button>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12" id="items">
                        <div class="row" id="item">
                            <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="cliente">Articulo</label>
                                                <select name="articulo" id="idArticulo" class="form-control">
                                                    @foreach($articulos as $articulo)
                                                        <option value="{{$articulo->codigo_articulo}}">{{$articulo->nombre_articulo}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                    </div>
                            <div class="col-md-5">
                                        <label for="cantidad">Cantidad</label>
                                        <input type="text" name="cantidad" id="cantidad" placeholder="ingresa la cantidad" class="form-control">
                                </div>
                            <div class="col-md-2">
                                <button style="margin-top: 30px;" type="button" class="btn btn-danger removeBtn"><i class="fas fa-trash-alt"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <button class="btn btn-primary btn-lg btn-block">Crear</button>
                    </div>
                    <div class="col-md-6">
                        <button type="button" class="btn btn-danger btn-lg btn-block">Eliminar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection