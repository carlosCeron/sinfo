<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Articulo;
use App\Pedido;
use Illuminate\Support\Facades\DB;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pedidos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $articulos = Articulo::all();

        return view('pedidos.new', ['articulos' => $articulos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $pedido = new Pedido();

        $pedido->cliente = $request->cliente;
        $pedido->cod_articulo = $request->articulo;
        $pedido->cantidad = $request->cantidad;
        $pedido->fecha_pedido = $request->fecha_pedido;

        $pedido->save();

        return redirect('pedidos')->with('status', true);
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
        //
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
        //
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

    public function search(Request $request){
        $parametro = $request->pedidoID;

        $pedidos = null;

        if(!empty($parametro)){

            $pedidos = DB::table('pedidos')
                ->join('articulos', 'pedidos.cod_articulo', '=', 'articulos.codigo_articulo')
                ->select('pedidos.*', 'articulos.codigo_articulo as cod_articulo', 'articulos.nombre_articulo as nombre_articulo')
                ->where('id_pedido','=', $parametro)->get();
        }else{
            $pedidos = DB::table('pedidos')
                ->join('articulos', 'pedidos.cod_articulo', '=', 'articulos.codigo_articulo')
                ->select('pedidos.*', 'articulos.codigo_articulo as cod_articulo', 'articulos.nombre_articulo as nombre_articulo')
                ->get();
        }

        return view('pedidos.table', ['pedidos' => $pedidos]);
    }
}
