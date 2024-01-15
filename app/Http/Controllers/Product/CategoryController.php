<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::all();    
        return view('categories.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(

            ['name' => 'required|min:3',
             'description' => 'min:3'
            ]
        );

       
        $request['state'] = 1;

        $category = Category::create($request->all());
        return redirect()->route('admin.categorias.index', $category)->with('mensaje','La categoria ha sido registrada exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $categories)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {

        $request->validate(

            ['name' => 'required|min:3',
            'description' => 'min:3'
           ]
        );
        
        $category->update($request->all());
        
        dd($category);
       
        
        //return view('categories.edit', compact('category'));
        //redirect()->route('admin.categorias.edit', $category)->with('mensaje','La categoria ha sido actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Category $categories)
    {
        //$categories->delete();
        //return redirect()->route('admin.categories.index')->with('mensaje','La categoria ha sido eliminado exitosamente');

        $category = Producto::findOrFail($categories->id);
        $category->delete();
    }
}
