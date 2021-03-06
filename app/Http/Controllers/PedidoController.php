<?php

namespace App\Http\Controllers;

use App\Models\Estadopedido;
use App\Models\Pedido;
use App\Models\PersonalEntrega;
use App\Models\Producto;
use App\Models\Tipoentrega;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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
            $pedidos = Pedido::orderBy('estadopedido_id')->with(['user', 'productos', 'estadopedido', 'tipoentrega', 'personal_entrega'])->get();
            $response = $pedidos;
            return response()->json($response, 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    public function activos()
    {
        try {
            $pedidos = Pedido::orderBy('estadopedido_id')->with(['user', 'productos', 'estadopedido', 'tipoentrega', 'personal_entrega'])->get();
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
        $validator = Validator::make(
            $request->all(),
            [
                'client_name' => 'required',
                'client_telephone_number' => 'required|numeric',
                'tipoentrega_id' => 'required'
            ]
        );

        if ($request->input('tipoentrega_id') == 1) {
            $validator = Validator::make(
                $request->all(),
                [
                    'client_name' => 'required',
                    'client_telephone_number' => 'required|numeric',
                    'tipoentrega_id' => 'required',
                    'address' => 'required',
                    'personal_entrega_id' => 'required'
                ]
            );
        }

        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }
        DB::beginTransaction();
        try {
            $pedido = new Pedido();

            $user = auth('api')->user();
            $pedido->user()->associate($user->id);

            $pedido->instructions = $request->input('instructions');
            $pedido->client_name = $request->input('client_name');
            $pedido->client_telephone_number = $request->input('client_telephone_number');
            $pedido->address = $request->input('address');
            $pedido->discount = $request->input('discount');

            //$pedido->personal_entrega_id = $request->input('personal_entrega_id');
            $personalEntrega =  PersonalEntrega::find($request->input('personal_entrega_id'));
            $pedido->personal_entrega()->associate($personalEntrega->id);

            $tipoEntrega =  Tipoentrega::find($request->input('tipoentrega_id'));
            $pedido->tipoentrega()->associate($tipoEntrega->id);

            $estadoPedido =  Estadopedido::find($request->input('estadopedido_id'));
            $pedido->estadopedido()->associate($estadoPedido->id);

            $pedido->cost_shipping = $request->input('cost_shipping');
            $pedido->tax = $request->input('tax');
            $pedido->subtotal = $request->input('subtotal');
            $pedido->total = $request->input('total');
            $pedido->save();

            $productos = explode(',', $request->input('productos_id'));
            $cantidades = explode(',', $request->input('cantidades'));
            $totales = explode(',', $request->input('totales'));

            for ($i = 0; $i < count($productos); $i++) {
                $producto = Producto::find($productos[$i]);
                $amount = $cantidades[$i];
                $total = $totales[$i];
                $pedido->productos()->attach($producto->id, [
                    'amount' => $amount,
                    'total' => $total
                ]);
            }

            DB::commit();
            $response = 'Pedido creado con éxito';
            return response()->json($response, 201);
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
                Pedido::where('id', $id)->with(['user', 'productos', 'estadopedido', 'tipoentrega', 'personal_entrega'])->first();

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
    public function update(Request $request)
    {
        try {
            $pedido = Pedido::find($request->input('id'));

            $estado =  Estadopedido::find($request->input('estadopedido_id'));
            $pedido->estadopedido()->associate($estado->id);

            if ($pedido->update()) {
                $response = 'Pedido actualizado';
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
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedido $pedido)
    {
        //
    }
}
