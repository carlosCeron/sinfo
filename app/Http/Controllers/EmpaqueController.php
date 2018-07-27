<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Empaque;
use App\Articulo;
use App\Bodega;

class EmpaqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empaques = DB::table('bodegas')
            ->join('proveedors', 'bodegas.cod_proveedor', '=', 'proveedors.codigo_prov')
            ->join('pedidos', 'bodegas.num_pedido', '=', 'pedidos.id_pedido')
            ->select('bodegas.*', 'proveedors.nombre_prov as proveedor','pedidos.cliente as cliente')
            ->limit(1)
            ->get();

        return View('empaques.index', ['empaques' => $empaques]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $articulos = Articulo::all();

        $empaques = DB::table('bodegas')
            ->join('proveedors', 'bodegas.cod_proveedor', '=', 'proveedors.codigo_prov')
            ->join('pedidos', 'bodegas.num_pedido', '=', 'pedidos.id_pedido')
            ->select('bodegas.*', 'proveedors.nombre_prov as proveedor','pedidos.cliente as cliente','pedidos.cantidad as cantidad_pedido')
            ->where('bodegas.cod_articulo', '=', $id)
            ->get();

        return View('empaques.edit',['empaques' => $empaques]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $bodegas = DB::table('bodegas')
            ->join('proveedors', 'bodegas.cod_proveedor', '=', 'proveedors.codigo_prov')
            ->join('pedidos', 'bodegas.num_pedido', '=', 'pedidos.id_pedido')
            ->select('bodegas.*', 'proveedors.nombre_prov as proveedor','pedidos.cliente as cliente','pedidos.cantidad as cantidad_pedido')
            ->where('bodegas.cod_articulo', '=', $id)
            ->get();


            foreach($bodegas as $bodega){

                $empaque = new Empaque();
    
                $cantidad_empacada = "cant_empaque" ."".$bodega->id_bodega;

                $empaque->cod_articulo = $bodega->cod_articulo;
                $empaque->desc_articulo = $bodega->desc_articulo;
                $empaque->cantidad = $bodega->cantidad_pedido;
                $empaque->cantidad_estimada = $bodega->cant_recibida;
                $empaque->cantidad_total = $request->$cantidad_empacada;
                $empaque->save();
            }

        return redirect()->action('EmpaqueController@index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function filter(Request $request){

        $empaque = $request->empaqueID;

        if($empaque == '0'){
            $empaque = null;
        }

        if(!empty($empaque)){

            $empaques = DB::table('empaques')
            ->join('articulos', 'empaques.articulo_id', '=', 'articulos.codigo_articulo')
            ->select('empaques.*', 'articulos.nombre_articulo as nombre_articulo', 'articulos.codigo_articulo as codigo_articulo')
            ->where('id_empaque', '=', $empaque)
            ->get();
        }else{
            $empaques = DB::table('empaques')
            ->join('articulos', 'empaques.articulo_id', '=', 'articulos.codigo_articulo')
            ->select('empaques.*', 'articulos.nombre_articulo as nombre_articulo', 'articulos.codigo_articulo as codigo_articulo')
            ->get();
        }

        return View('empaques.table', ['empaques' => $empaques]);

    }
}
