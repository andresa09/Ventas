<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('home');
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
        $productId = is_numeric($request->input('id')) ? $request->input('id') : 1; // Use 1 as the default product ID if 'id' is not numeric or not present in the request
        $productName = $request->input('nombre_producto') ?: 'example'; // Use 'example' as the default product name if 'nombre_producto' is not present in the request
        $productDescription = $request->input('descripcion_producto') ?: 'No description'; // Use 'No description' as the default product description if 'descripcion_producto' is not present in the request
        $productQuantity = is_numeric($request->input('cantidad_producto')) ? $request->input('cantidad_producto') : 1; // Use 1 as the default product quantity if 'cantidad_producto' is not numeric or not present in the request
        $productPrice = is_numeric($request->input('precio_unitario')) ? $request->input('precio_unitario') : 20.20; // Use 20.20 as the default product price if 'precio_unitario' is not numeric or not present in the request
        $productIva = is_numeric($request->input('iva')) ? $request->input('iva') : 0; // Use 0 as the default product iva if 'iva' is not numeric or not present in the request

        Cart::add([
            'id' => $productId,
            'name' => $productName,
            'price' => $productPrice,
            'quantity' => $productQuantity,
            'attributes' => [
                'description' => $productDescription,
                'iva' => $productIva,
            ],
        ]);

        return back();
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        return view('cart.show', compact('cartItems'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function remove(Request $request)
    {
    Cart::remove($request->id);
    return back();
    }
}
