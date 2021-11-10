<?php

namespace App\Http\Controllers;

use App\Cortadora;
use App\Categoria;
use App\barra;
use App\hoja_calculo_perfil;
use App\Perfil;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CortadoraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('cortadora.index');
    }

    public function cortadoraPerfil(){

        $hoja_calculo_perfil = hoja_calculo_perfil::where('hoja_calculo_perfils.user_id', '=', Auth::user()->id)->get();

        return view('cortadoraperfil.index', compact('hoja_calculo_perfil'));

    }

    public function cortadoraInfoGeneral($id){
        $barra = barra::where('barras.hoja_id', '=', $id)->get();
     

        return view('cortadoraperfil.info', compact('barra','barra_perfil_id'));

    }

    public function cortadoraInfoVentanas($id){

        $perfil = Perfil::where('perfils.hoja_id', '=', $id)->get();
        $perfil_id = $id;

        $barra = barra::where('barras.hoja_id', '=', $id)->get();


       foreach($perfil as $perfils){
        $repeteciones = $perfils->repeticion;
        // echo($repeteciones);
       }       
        
         foreach($barra as $barras){
            $nombre = $barras->nombre; 
            $linea = $barras->linea; 
            $fam_linea = $barras->fam_linea; 

            $ancho_barra = $barras->largo;

            $nombre = json_encode($nombre);
            echo($nombre);
         }
     
        return view('cortadoraperfil.ventanas', compact('perfil','barra','ancho_barra','fam_linea','nombre' ));
    }

     public function getPerfiilCombinacion($id){
        
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
     * @param  \App\Cortadora  $cortadora
     * @return \Illuminate\Http\Response
     */
    public function show(Cortadora $cortadora)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cortadora  $cortadora
     * @return \Illuminate\Http\Response
     */
    public function edit(Cortadora $cortadora)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cortadora  $cortadora
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cortadora $cortadora)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cortadora  $cortadora
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cortadora $cortadora)
    {
        //
    }
}
