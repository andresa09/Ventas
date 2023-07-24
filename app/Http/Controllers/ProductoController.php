<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $producto=Producto::all();
        return view('productos.index', compact('producto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $producto=Producto::all();
        return view('productos.create', compact('producto'));
        
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

                $producto = new Producto();


                $producto->nombre_producto=$request->nombre_producto;
                $producto->descripcion_producto=$request->descripcion_producto;
                $producto->cantidad_producto=$request->cantidad_producto;
                $producto->precio_unitario=$request->precio_unitario;
                $producto->iva=$request->iva;
                $producto->users_id=\Illuminate\Support\Facades\Auth::user()->id;
                $producto->categoria_id = intval($request->categoria_id);

                $producto->save();
        
                return back()->with('success', 'Producto creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        //
        // Buscar el producto por su ID en la base de datos
        
        $productoActualizado = Producto::findOrFail($id);
        $categoria=Categoria::all();
        return view('productos.editar', compact('productoActualizado','categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    // Buscar el producto por su ID en la base de datos
    $producto = Producto::findOrFail($id);

    $producto->nombre_producto = $request->nombre_producto;
    $producto->descripcion_producto = $request->descripcion_producto;
    $producto->cantidad_producto = $request->cantidad_producto;
    $producto->precio_unitario = $request->precio_unitario;
    $producto->iva = $request->iva;
    $producto->categoria_id = $request->categoria_id;

    // Guardar los cambios en la base de datos
    $producto->save();
    $producto=Producto::all();

    return back()->with('success', 'Producto Actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $producto = Producto::findOrFail($id);
        $producto->delete();

        return back()->with('success_delete', 'Producto eliminado exitosamente');
    }
}
