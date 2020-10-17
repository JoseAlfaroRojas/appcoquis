<?php

namespace App\Http\Controllers;

use App\Models\Tipovehiculo;
use Illuminate\Http\Request;

class TipovehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $tiposvehiculo = Tipovehiculo::all();
            $response = $tiposvehiculo;
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
     * @param  \App\Models\Tipovehiculo  $tipovehiculo
     * @return \Illuminate\Http\Response
     */
    public function show(Tipovehiculo $tipovehiculo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tipovehiculo  $tipovehiculo
     * @return \Illuminate\Http\Response
     */
    public function edit(Tipovehiculo $tipovehiculo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tipovehiculo  $tipovehiculo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tipovehiculo $tipovehiculo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tipovehiculo  $tipovehiculo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tipovehiculo $tipovehiculo)
    {
        //
    }
}
