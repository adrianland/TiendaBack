<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Http\Requests\CreateProductoRequest;
use App\Http\Requests\UpdateProductoRequest;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $producto = Producto::all();
        return $producto;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductoRequest $request)
    {
        $input = $request->all();

        $producto = Producto::create($input);
        $productId = Producto::all()->last()->id;
       
        return response()->json(["res" => true, "message" => "Registrado correctamente!", "productId" => $productId], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto = Producto::findOrFail($id);
        return response()->json($producto, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductoRequest $request, $id)
    {
        $producto = Producto::findOrFail($id);
        
        $input = $request->all();
        $producto->update($input);
        return response()->json(["res" => true, "message" => "Actualizado correctamente!", "productId" => $id], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Producto::destroy($id);
        return response()->json(["res" => true, "message" => "Eliminado correctamente!"], 200);
    }

    public function setImagen(Request $request, $id)
    {
        
        $producto = Producto::find($id);
        $producto->imagen = $this->cargarImagen($request->imagen, $id);
        $producto->save();
        return response()->json(["res" => true, "message" => "Imagen cargada correctamente!"], 200);
    }

    private function cargarImagen($file, $id){
        $nombreArchivo = time() . "_{$id}." . $file->getClientOriginalExtension();
        $file->move(public_path('imagenes'), $nombreArchivo);
        return $nombreArchivo;
    }
}
