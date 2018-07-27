    @foreach($compras as $compra)
                        <tr>
                            <td>{{$compra->id_compra}}</td>
                            <td>{{$compra->cod_articulo}}</td>
                            <td>{{$compra->desc_articulo}}</td>
                            <td>{{$compra->cliente}}</td>
                            <td>{{$compra->cantidad}}</td>
                            <td>{{$compra->nombre_prov}}</td>
                            <td>
                                @if($compra->cantidad_recibida > 0)
                                    {{$compra->cantidad_recibida}}
                                @elseif ($compra->cantidad_recibida == 0)
                                    NO INGRESADO
                                @endif
                            </td>
                            <td><a href="/bodegas/edit/{{$compra->id_compra}}" class="btn btn-outline-primary btn-block">Editar</a></td>
                        </tr>    
    @endforeach 