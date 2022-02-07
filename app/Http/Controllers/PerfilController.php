<?php

namespace App\Http\Controllers;

use App\Perfil;
use App\barra;
use App\Corte;
use DB;
use Session;
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

     public function getHistorialCalculos($id, $hoja_id){
        $perfil = Perfil::where('perfils.user_id', '=', $id)
        ->where('perfils.hoja_id', '=', $hoja_id)->get();

        return response()->json($perfil, 201); 
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

        $numberRepeteat;

        $barra = barra::where('barras.perfil_id', '=', $id)->get();

        $linea20 = array("2001", "2002", "2005", "2009","2010","2011");

        $linea25 = array("2501", "2502", "2504", "2505","2507", "2509","2510","5008");

        $cortesName = array("Corte 1", "Corte 2", "Corte 3", "Corte 4","Corte 5", "Corte 6","Corte 7","Corte 8","Corte 9",
        "Corte 10","Corte 11","Corte 12");
        
        foreach($perfil as $perfils){ //aca el elperfil (barra al)categorias junto a el corte
           
            $repetecion = $perfils->repeticion;
            $ancho_barra = $perfils->ancho;
            $alto_barra = $perfils->alto;
            $linea = $perfils->linea;
            $combinacion = $perfils->combinacion;

            $hoja_id = $perfils->hoja_id;
            // echo($hoja_id);

            $largo_predeterminado = 6;

            $numberRepeteat = $ancho_barra * $repetecion;

            $division = $numberRepeteat / $largo_predeterminado;

            $totalmtsbarra = $division * $largo_predeterminado;
 
            $ancho_barra; 
            $alto_barra;
            $linea;
            $combinacion;
            $linea_familia;
        }

                
        $barraArray = [];

        foreach($barra as $barras){ //aca el elperfil (barra al)categorias junto a el corte
           
            $categorias = $barras->fam_linea;
            $recorte_resta = $barras->resta;
            $linea = $barras->linea;
            $nombre = $barras->nombre;
            $largos =  $barras->largo;  
            $piezas = $barras->piezas;
            $cate_json = json_encode($categorias.'-'.$nombre).",";
            $piezas_repeticiones = $piezas * $repetecion;
            $piezas_div = $piezas_repeticiones / 10;
            // echo $piezas_div;

            $largosArray= array($largos);
            
            $resumen = ""."\n"."Para la barra ".$cate_json."Se necesitara la cantidad de ".$division." barras de ".$largo_predeterminado." metros.\n";

            // echo $resumen;

            for ($i=0; $i < 4; $i++) { 
                $b = json_encode($largosArray);
                // echo ($b.',');   
            }
            
            $barraArray = ['name' => [$categorias],'data' => [intval($largo_predeterminado)]]; 

            $barraArrayLargo = ['data' => [$largosArray]];

            $data = json_encode($barraArray);
            $dataCortes = json_encode($barraArrayLargo);

            // echo $cate_json;           
        }

        
        return view('cortadoraperfil.combinacion1', compact('perfil','perfil_id','barra','repetecion','ancho_barra',
            'alto_barra','linea','combinacion','largo_predeterminado','cate_json','largos','resumen',
            'division','totalmtsbarra','data','barraArray','cortesName','barraArrayLargo','dataCortes','resta',
            'piezas_repeticiones','piezas_div','piezas','hoja_id'));
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
    public function update(Request $request, $id){

        //  dd($request);
        $mensaje = "Precio Unitario Editado Exitosamente!!!";

        $perfil = Perfil::findOrFail($id);
        $perfil->update($request->all());

        if($perfil){
            DB::commit();
        }else{
            DB::rollback();
        }

        Session::flash('message',$mensaje);
        return back()->withInput();

        // $request->all();
        // $barra = barra::find($id);

        // $barra::update();
        
        // return back()->withInput();
    }

    public function updatePerfil(Request $request, $id){
        $perfil = Perfil::findOrFail($id);
        $hoja_id =$request->get('hoja_id'); 
        $estado = $request->get('estado');

        $perfil->estado = $estado;

        $perfil->update();
        return redirect()->route('hojaCalculo.show',$hoja_id);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $perfil = Perfil::find($id);

        $perfil->delete();

        Session::flash('message','Combinacion Eliminado Exitosamente!');
        return back()->withInput();
    }


    public function deletePerfil($id){
        $perfil = Perfil::find($id);
        $perfil->delete();
        return response()->json($perfil, 200);
    }

    public function actualizarPerfil(Request $request, $id){
        
        $perfil = Perfil::findOrFail($id);
        $perfil->update($request->all());

        return response()->json($perfil, 200);
    }

    public function HistorialDelete($id){

        $perfil = Perfil::findOrFail($id);
        $perfil->delete();

        return response()->json($perfil, 200);     
    }


}
