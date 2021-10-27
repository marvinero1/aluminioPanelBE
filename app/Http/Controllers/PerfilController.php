<?php

namespace App\Http\Controllers;

use App\Perfil;
use App\barra;
use App\Corte;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        
        $perfil = Perfil::where('perfils.id', '=', $id)->get();
        $perfil_id = $id;

        $barra = barra::where('barras.perfil_id', '=', $id)->get();

        $corte = Corte::get();
       
        


        foreach($corte as $cortes){ //aca el elperfil (barra al)categorias junto a el corte
           
            $corte_1 = $cortes->corte_1;
            
            // $cortes_json = json_encode($corte_1);
            // echo $;  
        }

        foreach($perfil as $perfils){ //aca el elperfil (barra al)categorias junto a el corte
           
            $repetecion = $perfils->repeticion;
            $ancho_barra = $perfils->ancho;
            $alto_barra = $perfils->alto;
            $linea = $perfils->categoria;
            $combinacion = $perfils->combinacion;


            // $cortes_json = json_encode($corte_1);
            // echo $ancho_barra;  
            $ancho_barra; 
            $alto_barra;
            $linea;
            $combinacion;
        }

        // foreach($barra as $barras){
           
        //     $categorias = $barras->categoria;
        //     $cate_json = json_encode($categorias).",";
        //     echo $cate_json;           
        // }

        return view('cortadoraperfil.combinacion1', compact('perfil','perfil_id','barra','corte','repetecion','ancho_barra',
            'alto_barra','linea','combinacion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function edit(Perfil $perfil)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perfil $perfil)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perfil $perfil)
    {
        //
    }
}
