<?php

namespace App\Http\Controllers;

use App\Models\Estadoproducto;
use Illuminate\Http\Request;

class EstadoproductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $estados = Estadoproducto::all();
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
    public function store($id)
    {
        try {
            $estadoproducto = Estadoproducto::where('id', $id)->first();
            $response = $estadoproducto;
            return response()->json($response, 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estadoproducto  $estadoproducto
     * @return \Illuminate\Http\Response
     */
    public function show(Estadoproducto $estadoproducto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Estadoproducto  $estadoproducto
     * @return \Illuminate\Http\Response
     */
    public function edit(Estadoproducto $estadoproducto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Estadoproducto  $estadoproducto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estadoproducto $estadoproducto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estadoproducto  $estadoproducto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estadoproducto $estadoproducto)
    {
        //
    }
}
