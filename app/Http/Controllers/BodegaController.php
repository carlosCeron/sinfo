<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Compra;
use App\Articulo;
use App\Proveedor;
use App\Bodega;
use Illuminate\Support\Facades\DB;

class BodegaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $articulos = Articulo::all();
        $proveedores = Proveedor::all();


        $compras = DB::table('compras')
                ->join('proveedors', 'compras.proveedor', '=', 'proveedors.codigo_prov')
                ->select('compras.*', 'proveedors.nombre_prov as nombre_prov', 'proveedors.peso_kg as peso')
                ->get();

        return view('bodegas.index', ['compras' => $compras, 'proveedores' => $proveedores, 'articulos' => $articulos]);
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
        $compras = DB::table('compras')
                ->join('proveedors', 'compras.proveedor', '=', 'proveedors.codigo_prov')
                ->select('compras.*', 'proveedors.nombre_prov as nombre_prov', 'proveedors.peso_kg as peso')
                ->where('cod_articulo','=', $id)
                ->get();

        return View('bodegas.edit', ['compras' => $compras]);
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

        $compras = DB::table('compras')
                ->join('proveedors', 'compras.proveedor', '=', 'proveedors.codigo_prov')
                ->select('compras.*', 'proveedors.nombre_prov as nombre_prov', 'proveedors.peso_kg as peso')
                ->where('cod_articulo','=', $id)->get();


                foreach($compras as $compra){

                    $bodega = new Bodega();
        
                    $cantidad_recibida = "cant_recibida" ."".$compra->id_compra;

                    $bodega->num_pedido = $compra->pedido_id;
                    $bodega->cod_articulo = $compra->cod_articulo;
                    $bodega->desc_articulo = $compra->desc_articulo;
                    $bodega->cantidad = $compra->cantidad;
                    $bodega->cod_proveedor = $compra->proveedor;
                    $bodega->cant_recibida = $request->$cantidad_recibida;
        
                    $bodega->save();
                }

        return redirect()->action('BodegaController@index');

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

    /* Filter Bodegas */

    public function filter(Request $request){

        $proveedor = $request->provID;
        $articulo = $request->artID;

        if($proveedor == '0'){
            $proveedor = null;
        }

        if($articulo == '0'){
            $articulo = null;
        }

        if(!empty($proveedor) && !empty($articulo)){
            $compras = DB::table('compras')
            ->join('proveedors', 'compras.proveedor_id', '=', 'proveedors.codigo_prov')
            ->select('compras.*', 'proveedors.nombre_prov as nombre_prov', 'proveedors.peso_kg as peso')
                ->where('proveedor_id', '=', $proveedor)
                ->where('cod_articulo', '=', $articulo)
                ->where('proveedor_id','<>', 0)
                ->get();
        }elseif(!empty($proveedor) && empty($articulo)){
            $compras = DB::table('compras')
            ->join('proveedors', 'compras.proveedor_id', '=', 'proveedors.codigo_prov')
            ->select('compras.*', 'proveedors.nombre_prov as nombre_prov', 'proveedors.peso_kg as peso')
                -where('proveedor_id', '=', $proveedor)
                -where('proveedor_id','<>', 0)
                ->get();
        }elseif(empty($proveedor) && !empty($articulo)){
            $compras = DB::table('compras')
            ->join('proveedors', 'compras.proveedor_id', '=', 'proveedors.codigo_prov')
            ->select('compras.*', 'proveedors.nombre_prov as nombre_prov', 'proveedors.peso_kg as peso')
                ->where('cod_articulo', '=', $articulos)
                -where('proveedor_id','<>', 0)
                ->get();
        }else{
            $compras = $compras = DB::table('compras')
            ->join('proveedors', 'compras.proveedor_id', '=', 'proveedors.codigo_prov')
            ->select('compras.*', 'proveedors.nombre_prov as nombre_prov', 'proveedors.peso_kg as peso')
            ->where('proveedor_id','<>', 0)->get();
        }

        return View('bodegas.table', ['compras' => $compras]);

    }

}
