<?php

namespace App\Http\Controllers;

use App\subcategoria;
use App\Categoria;
use Session;
use Illuminate\Http\Request;

class SubcategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $nombre = $request->get('buscarpor');
        $categoria = Categoria::all();
        $subcategoria = subcategoria::where('nombre','like',"%$nombre%")->latest()->get();
        
        return view('sub-categoria.index', compact('categoria','subcategoria'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $categoria = Categoria::all();
        return view('sub-categoria.create', compact('categoria'));
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
        
        subcategoria::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'categorias_id' => $request->categorias_id,
            'user' => $request->user,
        ]);
        
        Session::flash('message','Sub-Categoria creado exisitosamente!');
        return redirect()->route('sub-categoria.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\subcategoria  $subcategoria
     * @return \Illuminate\Http\Response
     */
    public function show(subcategoria $subcategoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\subcategoria  $subcategoria
     * @return \Illuminate\Http\Response
     */
    public function edit(subcategoria $subcategoria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\subcategoria  $subcategoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, subcategoria $subcategoria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\subcategoria  $subcategoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(subcategoria $subcategoria)
    {
        //
    }
}
