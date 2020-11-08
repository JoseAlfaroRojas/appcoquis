<?php

namespace App\Http\Controllers;

use App\Models\PersonalEntrega;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class PersonalEntregaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $personalesentrega = PersonalEntrega::orderBy('id')->with(['vehiculo', 'estadousuario'])->get();
            $response = $personalesentrega;
            return response()->json($response, 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    public function activos()
    {
        try {
            $personalesentrega = PersonalEntrega::where('estadousuario_id', 1)->with(['vehiculo', 'estadousuario'])->get();
            $response = $personalesentrega;
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
            $personalEntrega = new PersonalEntrega();
            $personalEntrega->name = $request->input('name');
            $personalEntrega->vehiculo_id = $request->input('vehiculo_id');

            $personalEntrega->save();
            return response()->json($personalEntrega, 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PersonalEntrega  $personalEntrega
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $personalesentrega = PersonalEntrega::where('id', $id)->with(['vehiculo', 'estadousuario'])->first();
            $response = $personalesentrega;
            return response()->json($response, 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PersonalEntrega  $personalEntrega
     * @return \Illuminate\Http\Response
     */
    public function edit(PersonalEntrega $personalEntrega)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PersonalEntrega  $personalEntrega
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PersonalEntrega $personalEntrega)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PersonalEntrega  $personalEntrega
     * @return \Illuminate\Http\Response
     */
    public function destroy(PersonalEntrega $personalEntrega)
    {
        //
    }
}
