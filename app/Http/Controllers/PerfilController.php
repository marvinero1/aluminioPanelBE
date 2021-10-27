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

        $linea20 = array("2001", "2002", "2005", "2009","2010","2011");

        $linea25 = array("2501", "2502", "2504", "2505","2507", "2509","2510","5008");

       
        
        foreach($corte as $cortes){ //aca el elperfil (barra al)categorias junto a el corte
           
            $corte_1 = $cortes->corte_1;
            
            // $cortes_json = json_encode($corte_1);
            // echo $;  
        }

        foreach($perfil as $perfils){ //aca el elperfil (barra al)categorias junto a el corte
           
            $repetecion = $perfils->repeticion;
            $ancho_barra = $perfils->ancho;
            $alto_barra = $perfils->alto;
            $linea = $perfils->linea;
            $combinacion = $perfils->combinacion;


            // $cortes_json = json_encode($corte_1);
            // echo $ancho_barra;  
            $ancho_barra; 
            $alto_barra;
            $linea;
            $combinacion;
            $linea_familia;

            if ($linea == "L-20") {
                foreach($linea20 as $linea20s){
                   $linea20s.',';
                }
            } else {
                foreach($linea25 as $linea25s){
                    $linea25s.',';
                }
            }
            
        }
       
        return view('cortadoraperfil.combinacion1', compact('perfil','perfil_id','barra','corte','repetecion','ancho_barra',
            'alto_barra','linea','combinacion','linea20','linea25'));
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
    public function update(Request $request, Perfil $perfil){

        $request->all();
        $barra = barra::find($id);

        $barra::update();
        
        return back()->withInput();
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
