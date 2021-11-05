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

        $numberRepeteat;

        $barra = barra::where('barras.perfil_id', '=', $id)->get();

        $corte = Corte::get();

        $linea20 = array("2001", "2002", "2005", "2009","2010","2011");

        $linea25 = array("2501", "2502", "2504", "2505","2507", "2509","2510","5008");

        $cortesName = array("Corte 1", "Corte 2", "Corte 3", "Corte 4","Corte 5", "Corte 6","Corte 7","Corte 8","Corte 9",
        "Corte 10","Corte 11","Corte 12");


       
        
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

            $largo_predeterminado = 6;

            $numberRepeteat = $ancho_barra * $repetecion;

            $division = $numberRepeteat / $largo_predeterminado;

            $totalmtsbarra = $division * $largo_predeterminado;

            // echo $division;

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

        if ($totalmtsbarra > $largo_predeterminado) {
            
        }
        
        $barraArray = [];
        foreach($barra as $barras){ //aca el elperfil (barra al)categorias junto a el corte
           
            $categorias = $barras->fam_linea;
            $linea = $barras->linea;
            $nombre = $barras->nombre;
            $largos =  $barras->largo;  
            $cate_json = json_encode($categorias.'-'.$nombre).",";

            $largosArray= array($largos);

             // echo $barras;

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

            // print_r($dataCortes);




            // echo $cate_json;           
        }

        // for ($i=0; $i <= $division; $i++) {
        //     foreach($barra as $barras){ //aca el elperfil (barra al)categorias junto a el corte

        //     $categorias = $barras->fam_linea;
        //     $nombre = $barras->nombre;

        //     $catess = $categorias.', '.$nombre.",";
            
        //     $cate_json = json_encode($categorias.', '.$nombre).",";

        //     $a = array($categorias,);

            

        //     rsort($a);

        //     // $catessjson = json_encode($catessArray);                        

        //     echo json_encode($a);                

        //     // $a = [$categorias.', '.$nombre];

        //     // sort($a,);
                   
        //     }
        // }

         // $place = ['name' => $barra, 'data' =>$totalmtsbarra];
         //        $obj = (object) $place;
         //        //var_dump($obj);
         //        $er = json_encode($obj);
         //        echo $er;

       
        return view('cortadoraperfil.combinacion1', compact('perfil','perfil_id','barra','corte','repetecion','ancho_barra',
            'alto_barra','linea','combinacion','linea20','linea25','largo_predeterminado','cate_json','largos','resumen',
            'division','totalmtsbarra','data','barraArray','cortesName','barraArrayLargo','dataCortes','linea'));
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
