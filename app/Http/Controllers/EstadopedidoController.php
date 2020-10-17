<?php

namespace App\Http\Controllers;

use App\Models\Estadopedido;
use Illuminate\Http\Request;

class EstadopedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $estados = Estadopedido::all();
            $response = $estados;
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estadopedido  $estadopedido
     * @return \Illuminate\Http\Response
     */
    public function show(Estadopedido $estadopedido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Estadopedido  $estadopedido
     * @return \Illuminate\Http\Response
     */
    public function edit(Estadopedido $estadopedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Estadopedido  $estadopedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estadopedido $estadopedido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estadopedido  $estadopedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estadopedido $estadopedido)
    {
        //
    }
}
