<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Clasificacion;
use App\Models\Estadoproducto;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use function PHPUnit\Framework\isNull;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $productos = Producto::orderBy('estadoproducto_id')->with(['categorias', 'clasificacion', 'estadoproducto'])->get();
            $response = $productos;
            return response()->json($response, 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    public function activos()
    {
        try {
            $productos = Producto::where('estadoproducto_id', 1)->with(['categorias', 'clasificacion', 'estadoproducto'])->get();
            $response = $productos;
            return response()->json($response, 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }


    public function inactivos()
    {
        try {
            $productos = Producto::where('estadoproducto_id', 2)->with(['categorias', 'clasificacion', 'estadoproducto'])->get();
            $response = $productos;
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
        $validator = Validator::make
        ($request->all(),
        [
            'name' => 'required|min:4',
            'description' => 'required|min:15',
            'price' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }

        try{
            $producto = new Producto();
            $producto->name = $request->input('name');
            $producto->description = $request->input('description');
            $producto->price = $request->input('price');

            //$clasificacion = $request->input('clasificacion_id');
            $clasificacion =  Clasificacion::find($request->input('clasificacion_id'));
            $producto->clasificacion()->associate($clasificacion->id);

            //$estado = $request->input('estadoproducto_id');
            $estado =  Estadoproducto::find($request->input('estadoproducto_id'));
            $producto->estadoproducto()->associate($estado->id);

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $nombreImagen = time() . "foto." . $file->getClientOriginalExtension();
                $imageUpload = Image::make($file->getRealPath());
                $path = 'images/';
                $imageUpload->save(public_path($path) . $nombreImagen);
                $producto->photo = $nombreImagen;
                $producto->pathImagen = url($path) . "/" . $nombreImagen;
            }

            //Guardar en la base de datos
            if($producto->save()){

                //Solo es necesario con la imagen
                $categorias = $request->input('categoria_id');

                //Solo es necesario con la imagen
                if (!is_array($request->input('categoria_id'))) {
                    //Formato array relación muchos a muchos
                    $categorias = explode(',',$request->input('categoria_id'));
                }

                //Usar solo este para formulario sin imagen
                if(is_null($request->input('categoria_id'))){
                    $producto->categorias()->attach($categorias);
                }

                $response= "Producto creado con éxito ";
                return response()->json($response, 201);
            } else {
                $response = [
                    'msg' => 'Error durante la creación'
                ];
                return response()->json($response, 404);
            }
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $producto = Producto::where('id', $id)->with(['categorias', 'clasificacion', 'estadoproducto'])->first();
            $response = $producto;
            return response()->json($response, 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        //
    }
}
