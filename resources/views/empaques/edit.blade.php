@extends('layouts.master')


@section('content')
    <div class="row body-content">
        <div class="col-md-12">
            <h1>Cantidad Empacada</h1>
            <hr>
            <form method="post">
                {{csrf_field()}}
                
                <div class="col-sm-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Fecha Empaque</th>
                                <th>Numero Pedido</th>
                                <th>Descripción Articulo</th>
                                <th>Cantidad Pedida (Und)</th>
                                <th>Cantidad Bodega (Kg)</th>
                                <th>Cliente</th>
                                <th>Cantidad Empacada</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($empaques as $empaque)
                                <tr>
                                    <td>{{$empaque->created_at}}</td>
                                    <td>{{$empaque->num_pedido}}</td>
                                    <td>{{$empaque->desc_articulo}}</td>
                                    <td>{{$empaque->cantidad_pedido}}</td>
                                    <td>{{$empaque->cant_recibida}}</td>
                                    <td>{{$empaque->cliente}}</td>
                                    <td>
                                        <input type="number" placenholder="cantidad empaque" class="form-control" name="cant_empaque{{$empaque->id_bodega}}">
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