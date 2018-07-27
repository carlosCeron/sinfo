@extends('layouts.master')


@section('content')
    <div class="row body-content">
        <div class="col-md-12">
            <h1>Asignar Cantidades</h1>
            <hr>
            <form method="post">
                {{csrf_field()}}
                
                <div class="col-sm-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Fecha Orden</th>
                                <th>ID Pedido</th>
                                <th>Descripción Articulo</th>
                                <th>Cantidad (Kg)</th>
                                <th>Proveedor</th>
                                <th>Cantidad Recibida (Kg)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($compras as $compra)
                                <tr>
                                    <td>{{$compra->created_at}}</td>
                                    <td>{{$compra->pedido_id}}</td>
                                    <td>{{$compra->desc_articulo}}</td>
                                    <td>{{$compra->cantidad}}</td>
                                    <td>{{$compra->nombre_prov}}</td>
                                    <td>
                                        <input type="number" placenholder="cantidad recibida" class="form-control" name="cant_recibida{{$compra->id_compra}}">
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