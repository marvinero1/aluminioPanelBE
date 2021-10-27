<?php

namespace App\Http\Controllers;

use App\barra;
use Illuminate\Http\Request;

class BarraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

         
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
    public function store(Request $request){

        $request->validate([
            'categoria' => 'required',
            'lado' => 'required',
            'largo' => 'required',
            'nombre' => 'required',
            'perfil_id' => 'required',

        ]);
        
        barra::create([
            'categoria' => $request->categoria,
            'lado' => $request->lado,
            'largo' => $request->largo,
            'nombre' => $request->nombre,
            'perfil_id' => $request->perfil_id,

        ]);
        return back()->withInput();
        // Session::flash('message','Categoria creado exisitosamente!');
        // return redirect()->route('categoria.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\barra  $barra
     * @return \Illuminate\Http\Response
     */
    public function show(barra $barra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\barra  $barra
     * @return \Illuminate\Http\Response
     */
    public function edit(barra $barra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\barra  $barra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, barra $barra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\barra  $barra
     * @return \Illuminate\Http\Response
     */
    public function destroy(barra $barra)
    {
        //
    }
}
