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
       
        $request->all();
        $largo = $request->largo;
        $perfil_id = $request->perfil_id;
        $hoja_id = $request->hoja_id;
        $largoMilesima = $largo * 1000;
        $piezas2005= 4;
        $division = $largoMilesima / 2;

        $piezaResta = $division - 8;
        $piezaResta1 = $piezaResta * 2;

        // dd($piezaResta1);
      
        // 1er ancho primero dividir entre 2,
        // 2da a cada pieza restarle 8, 
        // del total de 4 piezas. el total seria 

       $data = [
                ["linea"=>"L-20", "fam_linea"=>"2001","lado"=>"X1","nombre"=>"Riel_Inferior","resta"=>"12","piezas"=>"1",
                "largo"=>$largo, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id],

                ["linea"=>"L-20", "fam_linea"=>"2002","lado"=>"X2","nombre"=>"Riel_Superior","resta"=>"12","piezas"=>"1",
                "largo"=>$largo, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id],

                ["linea"=>"L-20", "fam_linea"=>"2005","lado"=>"X4","nombre"=>"Zocalo","resta"=>"8","piezas"=>$piezas2005,
                "largo"=>$largo, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id],

                ["linea"=>"L-20", "fam_linea"=>"2009","lado"=>"X3","nombre"=>"Jamba","resta"=>"0","piezas"=>"2",
                "largo"=>$largo, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id],

                ["linea"=>"L-20", "fam_linea"=>"2010","lado"=>"X5","nombre"=>"Pierna","resta"=>"28","piezas"=>"2",
                "largo"=>$largo, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id],

                ["linea"=>"L-20", "fam_linea"=>"2011","lado"=>"X6","nombre"=>"Enganche","resta"=>"28","piezas"=>"1",
                "largo"=>$largo, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id]
        ];


        // $data = json_encode($data);

        // dd($data);

         barra::insert($data);
       
        // barra::create([
        //     'linea' => $request->linea,
        //     'fam_linea' => $request->fam_linea,
        //     'lado' => $request->lado,
        //     'largo' => $request->largo,
        //     'nombre' => $request->nombre,
        //     'resta' => $request->resta,
        //     'piezas' => $request->piezas,
        //     'hoja_id'=> $request->hoja_id,
        //     'perfil_id' => $request->perfil_id,

        // ]);
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
