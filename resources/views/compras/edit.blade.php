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
                                <th>Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($compras as $compra)
                                <tr>
                                    <td>{{$compra->created_at}}</td>
                                    <td>{{$compra->id_pedido}}</td>
                                    <td>{{$compra->cliente}}</td>
                                    <td>{{$compra->cod_articulo}}</td>
                                    <td>{{$compra->nombre_articulo}}</td>
                                    <td>{{$compra->cantidad}}</td>
                                    <td>
                                        <input type="hidden" name="pedidoId" value="{{$compra->cod_pedido}}">
                                        <input type="text" placeholder="proveedor" class="form-control" name="proveedor_{{$compra->id_pedido}}">
                                    </td>
                                    <td>
                                        <input type="hidden" name="provID_{{$compra->id_pedido}}" value="">
                                        <input type="number" placenholder="precio" class="form-control" name="precio_{{$compra->id_pedido}}">
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target=".bd-example-modal-lg" data-whatever="{{$compra->id_pedido}}">Selecciona</button>
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
    <!-- Modal -->
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Seleccion Proveedor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            Filtrar Por Articulo:
                        </div>
                        <div class="col-md-4">
                            <select name="articulo" id="idArticulo" class="form-control">
                                    <option value="0"> </option>
                                        @foreach($articulos as $articulo)
                                            <option value="{{$articulo->codigo_articulo}}">{{$articulo->nombre_articulo}}</option>
                                        @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <button type="button" class="btn btn -default" id="btnProvFil">Filtrar</button>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Codigo Proveedor</th>
                                        <th>Nombre Proveedor</th>
                                        <th>Precio</th>
                                        <th>Articulo</th>
                                        <th>Descripción Articulo</th>
                                        <th>Seleccionar</th>
                                    </tr>
                                </thead>
                                <tbody id="proveedoresId">
                                    @foreach($proveedores as $prov)
                                        <tr>
                                            <td>{{$prov->codigo_prov}}</td>
                                            <td>{{$prov->nombre_prov}}</td>
                                            <td>{{$prov->precio}}</td>
                                            <td>{{$prov->codigo_articulo}}</td>
                                            <td>{{$prov->descripcion_articulo}}</td>
                                            <td><button class="btn btn-default btnSelProv" type="button"><i class="fas fa-arrow-alt-circle-right"></i></button></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <input type="hidden" id="idPedido" value="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection