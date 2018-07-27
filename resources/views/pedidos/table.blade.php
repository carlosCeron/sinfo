@foreach($pedidos as $pedido)
                        <tr>
                            <td>{{$pedido->id_pedido}}</td>
                            <td>{{$pedido->cod_articulo}}</td>
                            <td>{{$pedido->nombre_articulo}}</td>
                            <td>{{$pedido->cliente}}</td>
                            <td>{{$pedido->cantidad}}</td>
                            <td>{{$pedido->created_at}}</td>
                            <td>{{$pedido->fecha_pedido}}</td>
                        </tr>    
@endforeach 