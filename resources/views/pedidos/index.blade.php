@extends('layouts.master')

@section('content')
    <div class="row body-content">
        <div class="col-sm-12">
        @if(session('status'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <strong>Correcto!</strong> pedido creado de forma correcta.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
        @endif
        </div>
        <div class="col-sm-12">
            <div class="row" >
                <div class="col-sm">
                    <h2>Pedidos</h2>
                </div>
                <div class="col-sm">

                </div>
                <div class="col-sm">
                    <a href="/pedidos/new" class="btn btn-primary btn-block">Nueva Pedido</a>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="search">Buscar</label>
                        <input type="text" name="search" id="search" class="form-control" placeholder="ingresa No Pedido">
                    </div>
                </div>
                <div class="col-sm">
                    <button class="btn btn-default btn-block btn-lg" id="btn-buscar-sf-pe">Buscar</button>
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Numero Pedido</th>
                                <th>Codigo Articulo</th>
                                <th>Descripción Articulo</th>
                                <th>Cliente</th>
                                <th>Cantidad</th>
                                <th>Fecha Orden</th>
                                <th>Fecha Pedido</th>
                            </tr>
                        </thead>
                        <tbody id="body-search-table">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection