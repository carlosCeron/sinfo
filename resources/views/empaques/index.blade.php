@extends('layouts.master')

@section('content')
    <div class="row body-content">
        <div class="col-sm-12">
            @if(session('status'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <strong>Correcto!</strong> Empaque creado de forma correcta.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="row" >
                <div class="col-sm">
                    <h2>Empaques</h2>
                </div>
                <div class="col-sm">

                </div>
                <div class="col-sm">
                    <!--<a href="/empaques/new" class="btn btn-primary btn-block">Nueva Empaque</a>-->
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-6">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="compraId" style="font-weight: bold;">Id Compra:</label>
                        <input type="text" name="compraId" id="empaqueID" class="form-control" placeholder="ingresa el id de compra">
                    </div>
                </div>
                <div class="col-sm-6">
                    <button class="btn btn-default btn-block btn-lg" id="btn-buscar-sf-em">Buscar</button>
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Fecha Recepción</th>
                                <th>Numero Pedido</th>
                                <th>Cliente</th>
                                <th>Editar</th>
                            </tr>
                        </thead>
                        <tbody id="body-search-table">
                        @foreach($empaques as $empaque)
                            <tr>
                                <td>{{$empaque->created_at}}</td>
                                <td>{{$empaque->num_pedido}}</td>
                                <td>{{$empaque->cliente}}</td>
                                <td><a href="/empaques/edit/{{$empaque->cod_articulo}}" class="btn btn-outline-primary btn-block">Editar</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection