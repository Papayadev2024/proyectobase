<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Category;

class ProductoController extends Controller
{

    public function deleteProducto(Producto $producto)
    {
        $producto = Producto::findOrFail($producto->id);
        $producto->delete();
       
    }


    public function updateDestacado(Request $request)
    {
        // Lógica para manejar la solicitud AJAX
        //return response()->json(['mensaje' => 'Solicitud AJAX manejada con éxito']);
        $producto = Producto::findOrFail($request->id);
        $producto->update([
            $request->field => $request->status
        ]);
        
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
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(

            ['name' => 'required|min:3',
            'price' => 'required|numeric',
            'stock' => 'required|integer'
            ]
        );

        $categoria = Category::where('id', $request->category)->first();

    
        // if (!$categoria) {
        //     $categoria = Category::create(['name' => $request->category]);
          
        // }
        
        $producto = Producto::create([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'category_id' => $categoria->id, 
            'type_id' => 1
        ]);

        
        //$producto = Producto::create($request->all());
        return redirect()->route('admin.productos.index', $producto)->with('mensaje','El producto ha sido registrado exitosamente');
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
    public function edit($id)
    {
        //$producto = Producto::all();  
        $producto = Producto::findOrFail($id);
        $categories = Category::all();
        //return view('products.edit', compact('producto'));
        return view('products.edit', compact('producto', 'categories'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        $request->validate(

            ['name' => 'required|min:3',
            'price' => 'required|numeric',
            'stock' => 'required|integer'
            ]
        );

        $categoria = Category::where('id', $request->category)->first();
        
        $producto = Producto::findOrFail($producto->id);

        // $producto = update([
        //     'name' => $request->name,
        //     'price' => $request->price,
        //     'stock' => $request->stock,
        //     'category_id' => $categoria->id, 
        //     'type_id' => 1
        // ]);

        $producto->update($request->all());
       
        return redirect()->route('admin.productos.edit', $producto)->with('mensaje','El producto ha sido actualizado exitosamente');
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


    