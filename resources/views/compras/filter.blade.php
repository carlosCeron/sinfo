@foreach($proveedores as $prov)
    <tr>
        <td>{{$prov->codigo_prov}}</td>
        <td>{{$prov->nombre_prov}}</td>
        <td>{{$prov->codigo_articulo}}</td>
        <td>{{$prov->descripcion_articulo}}</td>
        <td><button class="btn btn-default" type="button"><i class="fas fa-arrow-alt-circle-right"></i></button></td>
    </tr>
@endforeach