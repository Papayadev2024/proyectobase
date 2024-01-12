<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{

    public function updateDestacado(Request $request)
    {
        // Lógica para manejar la solicitud AJAX
        //return response()->json(['mensaje' => 'Solicitud AJAX manejada con éxito']);
        $producto = Producto::findOrFail($request->id);
        $producto->update([

            "destacado" => $request->status
        ]);
        
        //return $request->id;
        
        
        //return response()->json(['html' => $html]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::all();    
        return view('products.index', compact('productos'));
    }


    
    /**
     * Show the form for creating a new resource.
     */


    public function create()
    {
        
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(

            ['nombre' => 'required|min:3',
            'precio' => 'required|numeric',
            'categoria' => 'required',
            'stock' => 'required|integer'
            ]
        );

        $producto = Producto::create($request->all());
        return redirect()->route('admin.productos.index', $producto)->with('mensaje','El producto ha sido registrado exitosamente');;
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        return view('products.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        //$producto = Producto::all();  
        $producto = Producto::findOrFail($id);
        return view('products.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        
        $request->validate(

            ['nombre' => 'required|min:3',
            'precio' => 'required|numeric',
            'categoria' => 'required',
            'stock' => 'required|integer'
            ]
        );

        $producto->update($request->all());
       
        return redirect()->route('admin.productos.edit', $producto)->with('mensaje','El producto ha sido actualizado exitosamente');;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('admin.productos.index')->with('mensaje','El producto ha sido eliminado exitosamente');
    }
}
