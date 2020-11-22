<?php

namespace App\Http\Controllers;

use App\Models\PersonalEntrega;
use App\Models\Vehiculo;
use App\Models\Estadousuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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
            $personalesentrega = PersonalEntrega::orderBy('estadousuario_id')->with(['vehiculo', 'estadousuario'])->get();
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
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|min:4',
                'email' => 'required|min:10',
                'telephone_number' => 'required|min:8'
            ]
        );

        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }
        try {
            $personalEntrega = new PersonalEntrega();
            $personalEntrega->name = $request->input('name');
            $personalEntrega->email = $request->input('email');
            $personalEntrega->telephone_number = $request->input('telephone_number');

            $vehiculo =  Vehiculo::find($request->input('vehiculo_id'));
            $personalEntrega->vehiculo()->associate($vehiculo->id);
            $estado =  Estadousuario::find($request->input('estadousuario_id'));
            $personalEntrega->estadousuario()->associate($estado->id);

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
    public function update(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|min:4',
                'email' => 'required|min:10',
                'telephone_number' => 'required|min:8'
            ]
        );

        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }
        try {
            $personalEntrega = PersonalEntrega::find($id);
            $personalEntrega->name = $request->input('name');
            $personalEntrega->email = $request->input('email');
            $personalEntrega->telephone_number = $request->input('telephone_number');

            $vehiculo =  Vehiculo::find($request->input('vehiculo_id'));
            $personalEntrega->vehiculo()->associate($vehiculo->id);
            $estado =  Estadousuario::find($request->input('estadousuario_id'));
            $personalEntrega->estadousuario()->associate($estado->id);

            if ($personalEntrega->update()) {

                $response = 'Personal de entrega actualizado';
                return response()->json($response, 200);
            }
            $response = [
                'msg' => 'Error durante la actualización'
            ];
            return response()->json($response, 404);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
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
