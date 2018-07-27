<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Articulo;
use App\Pedido;
use App\Compra;
use App\Proveedor;
use Illuminate\Support\Facades\DB;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$compras = Compra::all();*/

        $compras = DB::table('pedidos')
                ->join('articulos', 'pedidos.cod_articulo', '=', 'articulos.codigo_articulo')
                ->select('pedidos.*', 'articulos.nombre_articulo as nombre_articulo', 'articulos.cantidad_articulo as cantidad_articulo')
                ->get();

        /*$compras = DB::table('compras')->where('proveedor_id', 0)->get();*/
        return view('compras.index', ['compras' => $compras]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        /*$articulos = Articulo::all();
        
        return view('compras.new', ['articulos' => $articulos]);*/
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $compra = new Compra();

        $compra->cliente = $request->cliente;
        $compra->cod_articulo = $request->articulo;
        $compra->desc_articulo = $request->descripcion;
        $compra->cantidad = $request->cantidad;

        $compra->save();

        return redirect('compras')->with('status', true);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $pedidos = Pedido::find($id);

        $compras = DB::table('pedidos')
                ->join('articulos', 'pedidos.cod_articulo', '=', 'articulos.codigo_articulo')
                ->select('pedidos.*', 'articulos.nombre_articulo as nombre_articulo', 'articulos.cantidad_articulo as cantidad_articulo')
                ->where('cod_articulo','=', $id)
                ->get();


        $proveedores = Proveedor::all();

        return view('compras.edit', ['compras' =>  $compras, 'proveedores' => $proveedores]);
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
        $compras = DB::table('pedidos')
                ->join('articulos', 'pedidos.cod_articulo', '=', 'articulos.codigo_articulo')
                ->select('pedidos.*', 'articulos.nombre_articulo as nombre_articulo', 'articulos.cantidad_articulo as cantidad_articulo')
                ->where('cod_articulo','=', $request->pedidoId)
                ->get();

        foreach($compras as $compra){

            $compra_aux = new Compra();

            $proveedor_var = "compra_" ."".$compra->id_pedido;
            $precio_var = "precio_" ."".$compra->id_pedido;


            /*dd($request->compra_.$compra->id_pedido);*/

            $articulo = Articulo::find($compra->cod_articulo);

            $compra_aux->pedido_id = $compra->id_pedido;
            $compra_aux->cliente = $compra->cliente;
            $compra_aux->cod_articulo = $compra->cod_articulo;
            $compra_aux->desc_articulo = $articulo->nombre_articulo;
            $compra_aux->cantidad = $compra->cantidad;
            $compra_aux->proveedor = $request->$proveedor_var;
            $compra_aux->precio = $request->$precio_var;

            $compra_aux->save();
        }
        
        return redirect()->action('CompraController@index');
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

    /* Busqueda */

    public function search(Request $request)
    {


        $parametro = $request->artId;

        $compras = null;

        if(!empty($parametro)){
            $compras = DB::table('compras')
            ->where('proveedor_id', 0)
            ->where('id_compra', '=', $parametro)
            ->get();    

        }else{
            $compras = DB::table('compras')
            ->where('proveedor_id', 0)
            ->get();   
        }

        return view('compras.table', ['compras' => $compras]);
    }

}
