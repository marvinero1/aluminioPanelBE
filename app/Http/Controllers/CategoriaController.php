<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\subcategoria;
use Illuminate\Http\Request;
use Session;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $nombre = $request->get('buscarpor');
        
        $categoria = Categoria::where('nombre','like',"%$nombre%")
        ->latest()->paginate(10);
        
        return view('categoria.index', ['categoria' => $categoria]);
    }

    public function getSubCategoria(){
        $subcategoria = subcategoria::all();
        return response()->json($subcategoria, 200);
         
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categoria.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'nullable',
            'user' => 'nullable',
        ]);
        
        Categoria::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'user' => $request->user,
        ]);
        
        Session::flash('message','Categoria creado exisitosamente!');
        return redirect()->route('categoria.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('categoria.edit', ['categoria' =>Categoria::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $request->all();
        
        $categoria = Categoria::find($id);

        $categoria->nombre = $request->get('nombre');
        $categoria->descripcion = $request->get('descripcion');

        $categoria->update(); 
        
        Session::flash('message','Categoria Editado Exisitosamente!');
        return redirect()->route('categoria.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $categoria = Categoria::findOrFail($id);

        $categoria->delete();

        Session::flash('message','Categoria eliminado exitosamente!');
        return redirect()->route('categoria.index');
    }
}
