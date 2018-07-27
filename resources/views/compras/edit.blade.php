@extends('layouts.master')


@section('content')
    <div class="row body-content">
        <div class="col-md-12">
            <h1>Asignar Proveedor</h1>
            <hr>
            <form method="post">
                {{csrf_field()}}
                
                <div class="col-sm-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Fecha Orden</th>
                                <th>ID Compra</th>
                                <th>Cliente</th>
                                <th>Codigo Articulo</th>
                                <th>Descripción Articulo</th>
                                <th>Cantidad</th>
                                <th>Proveedor</th>
                                <th>Precio</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($compras as $compra)
                                <tr>
                                    <td>{{$compra->created_at}}</td>
                                    <td>{{$compra->id_pedido}}</td>
                                    <td>{{$compra->cod_articulo}}</td>
                                    <td>{{$compra->nombre_articulo}}</td>
                                    <td>{{$compra->cliente}}</td>
                                    <td>{{$compra->cantidad}}</td>
                                    <td>
                                        <input type="hidden" name="pedidoId" value="{{$compra->cod_articulo}}">
                                        <select name="compra_{{$compra->id_pedido}}" id="idArticulo" class="form-control">
                                                    <option value="0"> </option>
                                                    @foreach($proveedores as $proveedor)
                                                        <option value="{{$proveedor->codigo_prov}}">{{$proveedor->nombre_prov}}</option>
                                                    @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input type="number" placenholder="precio" class="form-control" name="precio_{{$compra->id_pedido}}">
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <button class="btn btn-default btn-primary">Guardar</button>
                        <a href="/compras" class="btn btn-default btn-success">Volver</a>
                    </div>
                    <div class="col-md-6">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection