@foreach($empaques as $empaque)
        <tr>
                                <td>{{$empaque->id_empaque}}</td>
                                <td>{{$empaque->articulo_id}}</td>
                                <td>{{$empaque->nombre_articulo}}</td>
                                <td>{{$empaque->cantidad}}</td>
                                <td>{{$empaque->unidades}}</td>
                                <td>{{$empaque->cantidad_estimada}}</td>
                                <td>{{$empaque->created_at}}</td>
                                <td><a href="/empaques/edit/{{$empaque->id_empaque}}" class="btn btn-outline-primary btn-block">Editar</a></td>
        </tr>
@endforeach