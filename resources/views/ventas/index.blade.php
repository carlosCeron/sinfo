@extends('layouts.master')

@section('content')
    <div class="row body-content">
        <div class="col-sm-12">
            <div class="row" >
                <div class="col-sm">
                    <h2>Ventas</h2>
                </div>
                <div class="col-sm">

                </div>
                <div class="col-sm">
                    <a href="/ventas/new" class="btn btn-primary btn-block">Nueva Venta</a>
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Numero Pedido</th>
                                <th>Codigo Articulo</th>
                                <th>Descripción Articulo</th>
                                <th>Cliente</th>
                                <th>Cantidad</th>
                                <th>Editar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>123</td>
                                <td>12546</td>
                                <td>Una nueva venta</td>
                                <td>la 14</td>
                                <td>200</td>
                                <td><a href="/ventas/edit/1" class="btn btn-outline-primary btn-block">Editar</a></td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>123</td>
                                <td>12546</td>
                                <td>Una nueva venta</td>
                                <td>la 14</td>
                                <td>200</td>
                                <td><a href="/ventas/edit/1" class="btn btn-outline-primary btn-block">Editar</a></td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>123</td>
                                <td>12546</td>
                                <td>Una nueva venta</td>
                                <td>la 14</td>
                                <td>200</td>
                                <td><a href="/ventas/edit/1" class="btn btn-outline-primary btn-block">Editar</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
