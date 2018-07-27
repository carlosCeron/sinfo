@extends('layouts.master')

@section('content')
    <div class="row body-content">
        <div class="col-sm-12">
            <div class="row" >
                <div class="col-sm">
                    <h2>Bodegas</h2>
                </div>
                <div class="col-sm">

                </div>
                <div class="col-sm">
                </div>
            </div>
            <hr>
            <div class="row">
                    <div class="col-md-4">
                        {{csrf_field()}}
                        <label for="cliente">Proveedor</label>
                        <select name="proveedor" id="idProv" class="form-control">
                                    <option value="0"> </option>
                                    @foreach($proveedores as $proveedor)
                                        <option value="{{$proveedor->codigo_prov}}">{{$proveedor->nombre_prov}}</option>
                                    @endforeach
                        </select>
                    </div>
                <div class="col-md-4">
                        <label for="cliente">Articulo</label>
                        <select name="articulo" id="idArticulo" class="form-control">
                                    <option value="0"> </option>
                                    @foreach($articulos as $articulo)
                                        <option value="{{$articulo->codigo_articulo}}">{{$articulo->nombre_articulo}}</option>
                                    @endforeach
                        </select>
                </div>
                <div class="col-md-4">
                    <label for=""></label>
                    <button class="btn btn-primary btn-block" id="btn-filter">Filtrar</button>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Fecha Compra</th>
                            <th>Numero Pedido</th>
                            <th>Cliente</th>
                            <th>Editar</th>
                        </tr>
                    </thead>
                    <div>
                        <tbody id="body-filter-table">
                            @foreach($compras as $compra)
                                <tr>
                                    <td>{{$compra->created_at}}</td>
                                    <td>{{$compra->pedido_id}}</td>
                                    <td>{{$compra->cliente}}</td>
                                    <td><a href="/bodegas/edit/{{$compra->cod_articulo}}" class="btn btn-outline-primary btn-block">Editar</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </div>
                </table>
                </div>
            </div>
        </div>
    </div>
@endsection