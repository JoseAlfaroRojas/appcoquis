<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $pedidos = Pedido::orderBy('id')->with(['user', 'productos', 'estadopedido', 'tipoentrega', 'personalentrega'])->get();
            $response = $pedidos;
            return response()->json($response, 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    public function activos()
    {
        try {
            $pedidos = Pedido::where('estadopedido', 1)->with(['user', 'productos', 'estadopedido', 'tipoentrega', 'personalentrega'])->get();
            $response = $pedidos;
            return response()->json($response, 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
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
        try {
            $pedido = new Pedido();

            $pedido->instructions = $request->input('instructions');
            $pedido->cost_shipping = $request->input('cost_shipping');
            $pedido->discount = $request->input('discount');
            $pedido->tax = $request->input('tax');
            $pedido->subtotal = $request->input('subtotal');
            $pedido->total = $request->input('total');
            $pedido->user_id = $request->input('user_id');
            $pedido->personal_entrega_id = $request->input('personal_entrega_id');
            $pedido->tipoentrega_id = $request->input('tipoentrega_id');
            $pedido->estadopedido_id = $request->input('estadopedido_id');
            $pedido->direccion_id = $request->input('direccion_id');

            $pedido->save();
            return response()->json($pedido, 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $pedido =
                Pedido::where('id', $id)->with(['user', 'productos', 'estadopedido', 'tipoentrega', 'personalentrega'])->first();

            $response = $pedido;
            return response()->json($response, 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function edit(Pedido $pedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pedido $pedido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedido $pedido)
    {
        //
    }
}
