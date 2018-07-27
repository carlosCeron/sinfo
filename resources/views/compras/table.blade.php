@foreach($compras as $compra)
                        <tr>
                            <td>{{$compra->id_compra}}</td>
                            <td>{{$compra->cod_articulo}}</td>
                            <td>{{$compra->desc_articulo}}</td>
                            <td>{{$compra->cliente}}</td>
                            <td>{{$compra->cantidad}}</td>
                            <td><a href="/compras/edit/{{$compra->id_compra}}" class="btn btn-outline-primary btn-block">Editar</a></td>
                        </tr>    
@endforeach 