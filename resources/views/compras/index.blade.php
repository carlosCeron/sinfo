@extends('layouts.master')

@section('content')
    <div class="row body-content">
        <div class="col-sm-12">
            @if(session('status'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <strong>Correcto!</strong> Compra creada de forma correcta.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if(session('prov_status'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <strong>Correcto!</strong> Proveedor Actualizado.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="row" >
                <div class="col-sm">
                    <h2>Compras</h2>
                </div>
                <div class="col-sm">

                </div>
                <div class="col-sm">
                    <!--<a href="/compras/new" class="btn btn-primary btn-block">Nueva Compra</a>-->
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-6">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="compraId" style="font-weight: bold;">Id Compra:</label>
                        <input type="text" name="compraId" id="compraId" class="form-control" placeholder="ingresa el id de compra">
                    </div>
                </div>
                <div class="col-sm-6">
                    <button class="btn btn-default btn-block btn-lg" id="btn-buscar-sf">Buscar</button>
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Fecha Orden</th>
                                <th>ID Compra</th>
                                <th>Cliente</th>
                                <th>Codigo Articulo</th>
                                <th>Descripción Articulo</th>
                                <th>Cantidad</th>
                                <th>Editar</th>
                            </tr>
                        </thead>
                        <tbody id="body-search-table">
                        @foreach($compras as $compra)
                            <tr>
                                <td>{{$compra->created_at}}</td>
                                <td>{{$compra->cod_pedido}}</td>
                                <td>{{$compra->cliente}}</td>
                                <td>{{$compra->cod_articulo}}</td>
                                <td>{{$compra->nombre_articulo}}</td>
                                <td>{{$compra->cantidad}}</td>
                                <td><a href="/compras/edit/{{$compra->cod_pedido}}" class="btn btn-outline-primary btn-block">Editar</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection