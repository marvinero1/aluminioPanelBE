<?php

namespace App\Http\Controllers;

use App\barra;
use App\Perfil;
use Illuminate\Support\Facades\DB;
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

    public function confirmacionBlade($id){
        return view('cortadoraperfil.confirmacion', ['perfil' =>Perfil::findOrFail($id)]);
         
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
       
        $data = $request->all();
        // dd($data);
        $ancho = $request->ancho;
        $alto = $request->alto;
        $linea = $request->linea;
        $perfil_id = $request->perfil_id;
        $hoja_id = $request->hoja_id;
        $combinacion = $request->combinacion;
        $repeticion = $request->repeticion;

        
        $results = DB::select('select * from barras where perfil_id = :perfil_id', ['perfil_id' => $perfil_id]);

        // dd($results);

        if (count($results) > 0){
            echo("Existe conjunto de barras");

            // dd($results);
            $deleted = DB::delete('delete from barras where perfil_id = :perfil_id', ['perfil_id' => $perfil_id]);

            if ($combinacion == 'combinacion1' and  $linea == 'L-20') {

            $piezas2005= 4;
            $division = $ancho / 2;
            $restaJamba = 0;

            $piezaResta = $division - 0.008;
            $piezaResta1 = $piezaResta * 2;
            $piezaResta2 = $alto - 0.026;
            $piezaResta3 = $ancho - 0.012;

            // PARA LINEA 20
            // DOS HOJAS 
            // RESTAR 79, DESPUES DIVIDIR ENTRE 2

            $restaZocalo = $ancho + 0.006;            
            $restaZocaloDivision = $restaZocalo / 2;
            // dd($restaZocaloDivision); 

            $data = [
                ["linea"=>$linea, "fam_linea"=>"2001","lado"=>"X1","nombre"=>"Riel_Superior","resta"=>"12","restado"=>$piezaResta3,"piezas"=>"1",
                 "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id,"repeticion"=>$repeticion],

                ["linea"=>$linea, "fam_linea"=>"2002","lado"=>"X2","nombre"=>"Riel_Inferior","resta"=>"12","restado"=>$piezaResta3,"piezas"=>"1",
                 "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id,"repeticion"=>$repeticion],

                ["linea"=>$linea, "fam_linea"=>"2005","lado"=>"X4","nombre"=>"Zocalo","resta"=>"79","restado"=>$restaZocaloDivision,"piezas"=>$piezas2005,
                 "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id,"repeticion"=>$repeticion],

                ["linea"=>$linea, "fam_linea"=>"2009","lado"=>"X3","nombre"=>"Jamba","resta"=>"0","restado"=>$alto,"piezas"=>"2",
                 "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id,"repeticion"=>$repeticion],

                ["linea"=>$linea, "fam_linea"=>"2010","lado"=>"X5","nombre"=>"Pierna","resta"=>"28","restado"=>$piezaResta2,"piezas"=>"2",
                 "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id,"repeticion"=>$repeticion],

                ["linea"=>$linea, "fam_linea"=>"2011","lado"=>"X6","nombre"=>"Enganche","resta"=>"28","restado"=>$piezaResta2,"piezas"=>"2",
                 "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id,"repeticion"=>$repeticion]
            ];

            barra::insert($data);

        }elseif($combinacion == 'combinacion4' and  $linea == 'L-20'){
            //Tres Hojas
            $piezas2005 = 6;
            $division = $ancho / 3;

            $piezaResta = $division - 0.008;
            $piezaResta1 = $piezaResta * 0.003;
            $piezaResta2 = $alto - 0.026;
            $piezaResta3 = $ancho - 0.012;

            // PARA LINEA 20
            // TRES HOJAS
            // RESTAR 80, DIVIDO ENTRE 3,

            $restaZocalo = $ancho + 0.030;
            $restaZocalo = $restaZocalo / 3;

             $data = [
                ["linea"=>$linea, "fam_linea"=>"2001","lado"=>"X1","nombre"=>"Riel_Superior","resta"=>"12","restado"=>$piezaResta3,
                "piezas"=>"1","ancho"=>$ancho, "alto"=>$alto,"perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id,"repeticion"=>$repeticion],

                ["linea"=>$linea, "fam_linea"=>"2002","lado"=>"X2","nombre"=>"Riel_Inferior","resta"=>"12","restado"=>$piezaResta3,"piezas"=>"1",
                "ancho"=>$ancho, "alto"=>$alto,"perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id,"repeticion"=>$repeticion],

                ["linea"=>$linea, "fam_linea"=>"2005","lado"=>"X4","nombre"=>"Zocalo","resta"=>"80","restado"=>$restaZocalo,"piezas"=>$piezas2005,
                "ancho"=>$ancho, "alto"=>$alto,"perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id,"repeticion"=>$repeticion],

                ["linea"=>$linea, "fam_linea"=>"2009","lado"=>"X3","nombre"=>"Jamba","resta"=>"0","restado"=>$alto,"piezas"=>"2",
                "ancho"=>$ancho, "alto"=>$alto,"perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id,"repeticion"=>$repeticion],

                ["linea"=>$linea, "fam_linea"=>"2010","lado"=>"X5","nombre"=>"Pierna","resta"=>"28","restado"=>$piezaResta2,"piezas"=>"2",
                "ancho"=>$ancho, "alto"=>$alto,"perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id,"repeticion"=>$repeticion],

                ["linea"=>$linea, "fam_linea"=>"2011","lado"=>"X6","nombre"=>"Enganche","resta"=>"28","restado"=>$piezaResta2,"piezas"=>"4",
                "ancho"=>$ancho, "alto"=>$alto,"perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id,"repeticion"=>$repeticion]
            ];

            barra::insert($data);
        }if($combinacion == 'combinacion5' and  $linea == 'L-20') {
            // Cuatro Hojas
            $piezas2005= 6;
            $division = $ancho / 4;

            $piezaResta = $division - 0.08;
            $piezaResta1 = $piezaResta * 0.03;
            $piezaResta2 = $alto - 0.026;
            $piezaResta3 = $ancho - 0.012;

            // PARA LINEA 20
            // CUATRO HOJAS
            // RESTAR 147, DIVIDO ENTRE 4,
            $restaZocalo = $ancho + 0.024;
            $restaZocalo = $restaZocalo / 4;

             $data = [
                ["linea"=>$linea, "fam_linea"=>"2001","lado"=>"X1","nombre"=>"Riel_Superior","resta"=>"12","restado"=>$piezaResta3, "piezas"=>"1",
                 "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id,"repeticion"=>$repeticion],

                ["linea"=>$linea, "fam_linea"=>"2002","lado"=>"X2","nombre"=>"Riel_Inferior","resta"=>"12","restado"=>$piezaResta3, "piezas"=>"1",
                 "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id,"repeticion"=>$repeticion],

                ["linea"=>$linea, "fam_linea"=>"2005","lado"=>"X4","nombre"=>"Zocalo","resta"=>"8","restado"=>$restaZocalo,"piezas"=>"8",
                 "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id,"repeticion"=>$repeticion],

                ["linea"=>$linea, "fam_linea"=>"2009","lado"=>"X3","nombre"=>"Jamba","resta"=>"0","restado"=>$alto,"piezas"=>"2",
                "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id,"repeticion"=>$repeticion],

                ["linea"=>$linea, "fam_linea"=>"2010","lado"=>"X5","nombre"=>"Pierna","resta"=>"28","restado"=>$piezaResta2,"piezas"=>"4",
                 "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id,"repeticion"=>$repeticion],

                ["linea"=>$linea, "fam_linea"=>"2011","lado"=>"X6","nombre"=>"Enganche","resta"=>"28","restado"=>$piezaResta2,"piezas"=>"4",
                 "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id,"repeticion"=>$repeticion],

                ["linea"=>$linea, "fam_linea"=>"5008","lado"=>"X","nombre"=>"Union","resta"=>"28","restado"=>$piezaResta2,"piezas"=>"1",
                 "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id,"repeticion"=>$repeticion]
            ];

             // dd($data);

            barra::insert($data);
        // PARA 25
        }if ($combinacion == 'combinacion1' and  $linea == 'L-25') {

            $piezas2005= 4;
            $division = $ancho / 2;
            $restaJamba = 0;

            $piezaResta = $division - 0.008;
            $piezaResta1 = $piezaResta * 0.002;
            $piezaResta2 = $alto - 0.032;
            $piezaResta3 = $ancho - 0.016;

            // dd($piezaResta3);
            
           // PARA LA LINEA 25 SOLO ZOCALO
            // PARA EL DE DOS HOJAS 106 LUEGO DIVIR EN DOS ZOCALO

            $restaZocalo = $ancho + 0.012;
            $restaZocalo = $restaZocalo / 2;

            $restaEnganche = $ancho - 0.031;
            $restaEnganche = $restaEnganche / 2;

            $data = [
                ["linea"=>$linea, "fam_linea"=>"2501","lado"=>"X1","nombre"=>"Riel_Superior","resta"=>"16","restado"=>$piezaResta3,"piezas"=>"1",
                 "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id,"repeticion"=>$repeticion],

                ["linea"=>$linea, "fam_linea"=>"2502","lado"=>"X2","nombre"=>"Riel_Inferior","resta"=>"16","restado"=>$piezaResta3,"piezas"=>"1",
                 "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id,"repeticion"=>$repeticion],

                ["linea"=>$linea, "fam_linea"=>"2505","lado"=>"X4","nombre"=>"Zocalo","resta"=>"106","restado"=>$restaZocalo,"piezas"=>"2",
                 "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id,"repeticion"=>$repeticion],

                ["linea"=>$linea, "fam_linea"=>"2509","lado"=>"X3","nombre"=>"Jamba","resta"=>"0","restado"=>$alto,"piezas"=>"2",
                 "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id,"repeticion"=>$repeticion],

                ["linea"=>$linea, "fam_linea"=>"2510","lado"=>"X5","nombre"=>"Pierna","resta"=>"31","restado"=>$piezaResta2,"piezas"=>"2",
                 "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id,"repeticion"=>$repeticion],

                ["linea"=>$linea, "fam_linea"=>"2507","lado"=>"X6","nombre"=>"Enganche","resta"=>"31","restado"=>$piezaResta2,"piezas"=>"2",
                 "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id,"repeticion"=>$repeticion],

                 ["linea"=>$linea, "fam_linea"=>"2504","lado"=>"X7","nombre"=>"Cabezal","resta"=>"106","restado"=>$restaZocalo, "piezas"=>"2",
                 "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id,"repeticion"=>$repeticion] 
            ];

             barra::insert($data);

        }if ($combinacion == 'combinacion4' and  $linea == 'L-25') {

             //Tres Hojas
            $piezas2005 = 6;
            $division = $ancho / 3;

            $piezaResta = $division - 0.008;
            $piezaResta1 = $piezaResta * 0.003;
            $piezaResta2 = $alto - 0.032;
            $piezaResta3 = $ancho - 0.016;

            // PARA LINEA 25
            // TRES HOJAS
            // RESTAR 118, DIVIDO ENTRE 3 a zocalo,

            $restaZocalo = $ancho + 0.050;
            $restaZocalo1 = $restaZocalo / 3;

             $data = [
                ["linea"=>$linea, "fam_linea"=>"2501","lado"=>"X1","nombre"=>"Riel_Superior","resta"=>"16","restado"=>$piezaResta3,
                "piezas"=>"1","ancho"=>$ancho, "alto"=>$alto,"perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id,"repeticion"=>$repeticion],

                ["linea"=>$linea, "fam_linea"=>"2502","lado"=>"X2","nombre"=>"Riel_Inferior","resta"=>"16","restado"=>$piezaResta3,"piezas"=>"1",
                "ancho"=>$ancho, "alto"=>$alto,"perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id,"repeticion"=>$repeticion],

                ["linea"=>$linea, "fam_linea"=>"2505","lado"=>"X4","nombre"=>"Zocalo","resta"=>"118","restado"=>$restaZocalo1,"piezas"=>"3",
                "ancho"=>$ancho, "alto"=>$alto,"perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id,"repeticion"=>$repeticion],

                ["linea"=>$linea, "fam_linea"=>"2509","lado"=>"X3","nombre"=>"Jamba","resta"=>"0","restado"=>$alto,"piezas"=>"2",
                "ancho"=>$ancho, "alto"=>$alto,"perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id,"repeticion"=>$repeticion],

                ["linea"=>$linea, "fam_linea"=>"2510","lado"=>"X5","nombre"=>"Pierna","resta"=>"31","restado"=>$piezaResta2,"piezas"=>"2",
                "ancho"=>$ancho, "alto"=>$alto,"perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id,"repeticion"=>$repeticion],

                ["linea"=>$linea, "fam_linea"=>"2507","lado"=>"X6","nombre"=>"Enganche","resta"=>"31","restado"=>$piezaResta2,"piezas"=>"4",
                "ancho"=>$ancho, "alto"=>$alto,"perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id,"repeticion"=>$repeticion],

                 ["linea"=>$linea, "fam_linea"=>"2504","lado"=>"X7","nombre"=>"Cabezal","resta"=>"0.050","restado"=>$restaZocalo1, "piezas"=>"3",
                 "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id,"repeticion"=>$repeticion] 
            ];

             barra::insert($data);

        }if($combinacion == 'combinacion5' and  $linea == 'L-25') {
            // Cuatro Hojas
            $piezas2005= 6;
            $division = $ancho / 4;

            $piezaResta = $division - 0.008;
            $piezaResta1 = $piezaResta * 0.003;
            $piezaResta2 = $alto - 0.032;
            $piezaResta3 = $ancho - 0.016;

            // PARA LINEA 25
            // CUATRO HOJAS
            // SUMAR 0.040, DIVIDO ENTRE 4,
            $restaZocalo9 = $ancho + 0.040;
            $restaZocalo = $restaZocalo9 / 4;


             $data = [
                ["linea"=>$linea, "fam_linea"=>"2501","lado"=>"X1","nombre"=>"Riel_Superior","resta"=>"16","restado"=>$piezaResta3, "piezas"=>"1",
                 "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id,"repeticion"=>$repeticion],

                ["linea"=>$linea, "fam_linea"=>"2502","lado"=>"X2","nombre"=>"Riel_Inferior","resta"=>"16","restado"=>$piezaResta3, "piezas"=>"1",
                 "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id,"repeticion"=>$repeticion],

                ["linea"=>$linea, "fam_linea"=>"2505","lado"=>"X4","nombre"=>"Zocalo","resta"=>"200","restado"=>$restaZocalo,"piezas"=>"4",
                 "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id,"repeticion"=>$repeticion],

                ["linea"=>$linea, "fam_linea"=>"2509","lado"=>"X3","nombre"=>"Jamba","resta"=>"0","restado"=>$alto,"piezas"=>"2",
                "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id,"repeticion"=>$repeticion],

                ["linea"=>$linea, "fam_linea"=>"2510","lado"=>"X5","nombre"=>"Pierna","resta"=>"31","restado"=>$piezaResta2,"piezas"=>"4",
                 "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id,"repeticion"=>$repeticion],

                ["linea"=>$linea, "fam_linea"=>"2507","lado"=>"X6","nombre"=>"Enganche","resta"=>"31","restado"=>$piezaResta2,"piezas"=>"4",
                 "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id,"repeticion"=>$repeticion],

                ["linea"=>$linea, "fam_linea"=>"2521","lado"=>"X","nombre"=>"Union","resta"=>"31","restado"=>$piezaResta2,"piezas"=>"1",
                 "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id,"repeticion"=>$repeticion],

                ["linea"=>$linea, "fam_linea"=>"2504","lado"=>"X7","nombre"=>"Cabezal","resta"=>"200","restado"=>$restaZocalo, "piezas"=>"4",
                 "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id,"repeticion"=>$repeticion]
            ];

            barra::insert($data);
        }

            return redirect()->action(
                 [BarraController::class, 'confirmacionBlade'], ['id' => $perfil_id]
             );
        }else{
            echo("Es nueva creacion");

            if ($combinacion == 'combinacion1' and  $linea == 'L-20') {

            $piezas2005= 4;
            $division = $ancho / 2;
            $restaJamba = 0;

            $piezaResta = $division - 0.008;
            $piezaResta1 = $piezaResta * 2;
            $piezaResta2 = $alto - 0.026;
            $piezaResta3 = $ancho - 0.012;

            // PARA LINEA 20
            // DOS HOJAS 
            // RESTAR 79, DESPUES DIVIDIR ENTRE 2

            $restaZocalo = $ancho + 0.006;            
            $restaZocaloDivision = $restaZocalo / 2;
            // dd($restaZocaloDivision); 

            $data = [
                ["linea"=>$linea, "fam_linea"=>"2001","lado"=>"X1","nombre"=>"Riel_Superior","resta"=>"12","restado"=>$piezaResta3,"piezas"=>"1",
                 "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id,"repeticion"=>$repeticion],

                ["linea"=>$linea, "fam_linea"=>"2002","lado"=>"X2","nombre"=>"Riel_Inferior","resta"=>"12","restado"=>$piezaResta3,"piezas"=>"1",
                 "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id,"repeticion"=>$repeticion],

                ["linea"=>$linea, "fam_linea"=>"2005","lado"=>"X4","nombre"=>"Zocalo","resta"=>"79","restado"=>$restaZocaloDivision,"piezas"=>$piezas2005,
                 "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id,"repeticion"=>$repeticion],

                ["linea"=>$linea, "fam_linea"=>"2009","lado"=>"X3","nombre"=>"Jamba","resta"=>"0","restado"=>$alto,"piezas"=>"2",
                 "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id,"repeticion"=>$repeticion],

                ["linea"=>$linea, "fam_linea"=>"2010","lado"=>"X5","nombre"=>"Pierna","resta"=>"28","restado"=>$piezaResta2,"piezas"=>"2",
                 "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id,"repeticion"=>$repeticion],

                ["linea"=>$linea, "fam_linea"=>"2011","lado"=>"X6","nombre"=>"Enganche","resta"=>"28","restado"=>$piezaResta2,"piezas"=>"2",
                 "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id,"repeticion"=>$repeticion]
            ];

            barra::insert($data);

        }elseif($combinacion == 'combinacion4' and  $linea == 'L-20'){
            //Tres Hojas
            $piezas2005 = 6;
            $division = $ancho / 3;

            $piezaResta = $division - 0.008;
            $piezaResta1 = $piezaResta * 0.003;
            $piezaResta2 = $alto - 0.026;
            $piezaResta3 = $ancho - 0.012;

            // PARA LINEA 20
            // TRES HOJAS
            // RESTAR 80, DIVIDO ENTRE 3,

            $restaZocalo = $ancho + 0.030;
            $restaZocalo = $restaZocalo / 3;

             $data = [
                ["linea"=>$linea, "fam_linea"=>"2001","lado"=>"X1","nombre"=>"Riel_Superior","resta"=>"12","restado"=>$piezaResta3,
                "piezas"=>"1","ancho"=>$ancho, "alto"=>$alto,"perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id,"repeticion"=>$repeticion],

                ["linea"=>$linea, "fam_linea"=>"2002","lado"=>"X2","nombre"=>"Riel_Inferior","resta"=>"12","restado"=>$piezaResta3,"piezas"=>"1",
                "ancho"=>$ancho, "alto"=>$alto,"perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id,"repeticion"=>$repeticion],

                ["linea"=>$linea, "fam_linea"=>"2005","lado"=>"X4","nombre"=>"Zocalo","resta"=>"80","restado"=>$restaZocalo,"piezas"=>$piezas2005,
                "ancho"=>$ancho, "alto"=>$alto,"perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id,"repeticion"=>$repeticion],

                ["linea"=>$linea, "fam_linea"=>"2009","lado"=>"X3","nombre"=>"Jamba","resta"=>"0","restado"=>$alto,"piezas"=>"2",
                "ancho"=>$ancho, "alto"=>$alto,"perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id,"repeticion"=>$repeticion],

                ["linea"=>$linea, "fam_linea"=>"2010","lado"=>"X5","nombre"=>"Pierna","resta"=>"28","restado"=>$piezaResta2,"piezas"=>"2",
                "ancho"=>$ancho, "alto"=>$alto,"perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id,"repeticion"=>$repeticion],

                ["linea"=>$linea, "fam_linea"=>"2011","lado"=>"X6","nombre"=>"Enganche","resta"=>"28","restado"=>$piezaResta2,"piezas"=>"4",
                "ancho"=>$ancho, "alto"=>$alto,"perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id,"repeticion"=>$repeticion]
            ];

            barra::insert($data);
        }if($combinacion == 'combinacion5' and  $linea == 'L-20') {
            // Cuatro Hojas
            $piezas2005= 6;
            $division = $ancho / 4;

            $piezaResta = $division - 0.08;
            $piezaResta1 = $piezaResta * 0.03;
            $piezaResta2 = $alto - 0.026;
            $piezaResta3 = $ancho - 0.012;

            // PARA LINEA 20
            // CUATRO HOJAS
            // RESTAR 147, DIVIDO ENTRE 4,
            $restaZocalo = $ancho + 0.024;
            $restaZocalo = $restaZocalo / 4;

             $data = [
                ["linea"=>$linea, "fam_linea"=>"2001","lado"=>"X1","nombre"=>"Riel_Superior","resta"=>"12","restado"=>$piezaResta3, "piezas"=>"1",
                 "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id,"repeticion"=>$repeticion],

                ["linea"=>$linea, "fam_linea"=>"2002","lado"=>"X2","nombre"=>"Riel_Inferior","resta"=>"12","restado"=>$piezaResta3, "piezas"=>"1",
                 "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id,"repeticion"=>$repeticion],

                ["linea"=>$linea, "fam_linea"=>"2005","lado"=>"X4","nombre"=>"Zocalo","resta"=>"8","restado"=>$restaZocalo,"piezas"=>"8",
                 "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id,"repeticion"=>$repeticion],

                ["linea"=>$linea, "fam_linea"=>"2009","lado"=>"X3","nombre"=>"Jamba","resta"=>"0","restado"=>$alto,"piezas"=>"2",
                "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id,"repeticion"=>$repeticion],

                ["linea"=>$linea, "fam_linea"=>"2010","lado"=>"X5","nombre"=>"Pierna","resta"=>"28","restado"=>$piezaResta2,"piezas"=>"4",
                 "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id,"repeticion"=>$repeticion],

                ["linea"=>$linea, "fam_linea"=>"2011","lado"=>"X6","nombre"=>"Enganche","resta"=>"28","restado"=>$piezaResta2,"piezas"=>"4",
                 "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id,"repeticion"=>$repeticion],

                ["linea"=>$linea, "fam_linea"=>"5008","lado"=>"X","nombre"=>"Union","resta"=>"28","restado"=>$piezaResta2,"piezas"=>"1",
                 "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id,"repeticion"=>$repeticion]
            ];

             // dd($data);

            barra::insert($data);
        // PARA 25
        }if ($combinacion == 'combinacion1' and  $linea == 'L-25') {

            $piezas2005= 4;
            $division = $ancho / 2;
            $restaJamba = 0;

            $piezaResta = $division - 0.008;
            $piezaResta1 = $piezaResta * 0.002;
            $piezaResta2 = $alto - 0.032;
            $piezaResta3 = $ancho - 0.016;

            // dd($piezaResta3);
            
           // PARA LA LINEA 25 SOLO ZOCALO
            // PARA EL DE DOS HOJAS 106 LUEGO DIVIR EN DOS ZOCALO

            $restaZocalo = $ancho + 0.012;
            $restaZocalo = $restaZocalo / 2;

            $restaEnganche = $ancho - 0.031;
            $restaEnganche = $restaEnganche / 2;

            $data = [
                ["linea"=>$linea, "fam_linea"=>"2501","lado"=>"X1","nombre"=>"Riel_Superior","resta"=>"16","restado"=>$piezaResta3,"piezas"=>"1",
                 "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id,"repeticion"=>$repeticion],

                ["linea"=>$linea, "fam_linea"=>"2502","lado"=>"X2","nombre"=>"Riel_Inferior","resta"=>"16","restado"=>$piezaResta3,"piezas"=>"1",
                 "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id,"repeticion"=>$repeticion],

                ["linea"=>$linea, "fam_linea"=>"2505","lado"=>"X4","nombre"=>"Zocalo","resta"=>"106","restado"=>$restaZocalo,"piezas"=>"2",
                 "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id,"repeticion"=>$repeticion],

                ["linea"=>$linea, "fam_linea"=>"2509","lado"=>"X3","nombre"=>"Jamba","resta"=>"0","restado"=>$alto,"piezas"=>"2",
                 "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id,"repeticion"=>$repeticion],

                ["linea"=>$linea, "fam_linea"=>"2510","lado"=>"X5","nombre"=>"Pierna","resta"=>"31","restado"=>$piezaResta2,"piezas"=>"2",
                 "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id,"repeticion"=>$repeticion],

                ["linea"=>$linea, "fam_linea"=>"2507","lado"=>"X6","nombre"=>"Enganche","resta"=>"31","restado"=>$piezaResta2,"piezas"=>"2",
                 "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id,"repeticion"=>$repeticion],

                 ["linea"=>$linea, "fam_linea"=>"2504","lado"=>"X7","nombre"=>"Cabezal","resta"=>"106","restado"=>$restaZocalo, "piezas"=>"2",
                 "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id,"repeticion"=>$repeticion] 
            ];

             barra::insert($data);

        }if ($combinacion == 'combinacion4' and  $linea == 'L-25') {

             //Tres Hojas
            $piezas2005 = 6;
            $division = $ancho / 3;

            $piezaResta = $division - 0.008;
            $piezaResta1 = $piezaResta * 0.003;
            $piezaResta2 = $alto - 0.032;
            $piezaResta3 = $ancho - 0.016;

            // PARA LINEA 25
            // TRES HOJAS
            // RESTAR 118, DIVIDO ENTRE 3 a zocalo,

            $restaZocalo = $ancho + 0.050;
            $restaZocalo1 = $restaZocalo / 3;

             $data = [
                ["linea"=>$linea, "fam_linea"=>"2501","lado"=>"X1","nombre"=>"Riel_Superior","resta"=>"16","restado"=>$piezaResta3,
                "piezas"=>"1","ancho"=>$ancho, "alto"=>$alto,"perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id,"repeticion"=>$repeticion],

                ["linea"=>$linea, "fam_linea"=>"2502","lado"=>"X2","nombre"=>"Riel_Inferior","resta"=>"16","restado"=>$piezaResta3,"piezas"=>"1",
                "ancho"=>$ancho, "alto"=>$alto,"perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id,"repeticion"=>$repeticion],

                ["linea"=>$linea, "fam_linea"=>"2505","lado"=>"X4","nombre"=>"Zocalo","resta"=>"118","restado"=>$restaZocalo1,"piezas"=>"3",
                "ancho"=>$ancho, "alto"=>$alto,"perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id,"repeticion"=>$repeticion],

                ["linea"=>$linea, "fam_linea"=>"2509","lado"=>"X3","nombre"=>"Jamba","resta"=>"0","restado"=>$alto,"piezas"=>"2",
                "ancho"=>$ancho, "alto"=>$alto,"perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id,"repeticion"=>$repeticion],

                ["linea"=>$linea, "fam_linea"=>"2510","lado"=>"X5","nombre"=>"Pierna","resta"=>"31","restado"=>$piezaResta2,"piezas"=>"2",
                "ancho"=>$ancho, "alto"=>$alto,"perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id,"repeticion"=>$repeticion],

                ["linea"=>$linea, "fam_linea"=>"2507","lado"=>"X6","nombre"=>"Enganche","resta"=>"31","restado"=>$piezaResta2,"piezas"=>"4",
                "ancho"=>$ancho, "alto"=>$alto,"perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id,"repeticion"=>$repeticion],

                 ["linea"=>$linea, "fam_linea"=>"2504","lado"=>"X7","nombre"=>"Cabezal","resta"=>"0.050","restado"=>$restaZocalo1, "piezas"=>"3",
                 "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id,"repeticion"=>$repeticion] 
            ];

             barra::insert($data);

        }if($combinacion == 'combinacion5' and  $linea == 'L-25') {
            // Cuatro Hojas
            $piezas2005= 6;
            $division = $ancho / 4;

            $piezaResta = $division - 0.008;
            $piezaResta1 = $piezaResta * 0.003;
            $piezaResta2 = $alto - 0.032;
            $piezaResta3 = $ancho - 0.016;

            // PARA LINEA 25
            // CUATRO HOJAS
            // SUMAR 0.040, DIVIDO ENTRE 4,
            $restaZocalo9 = $ancho + 0.040;
            $restaZocalo = $restaZocalo9 / 4;


             $data = [
                ["linea"=>$linea, "fam_linea"=>"2501","lado"=>"X1","nombre"=>"Riel_Superior","resta"=>"16","restado"=>$piezaResta3, "piezas"=>"1",
                 "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id,"repeticion"=>$repeticion],

                ["linea"=>$linea, "fam_linea"=>"2502","lado"=>"X2","nombre"=>"Riel_Inferior","resta"=>"16","restado"=>$piezaResta3, "piezas"=>"1",
                 "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id,"repeticion"=>$repeticion],

                ["linea"=>$linea, "fam_linea"=>"2505","lado"=>"X4","nombre"=>"Zocalo","resta"=>"200","restado"=>$restaZocalo,"piezas"=>"4",
                 "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id,"repeticion"=>$repeticion],

                ["linea"=>$linea, "fam_linea"=>"2509","lado"=>"X3","nombre"=>"Jamba","resta"=>"0","restado"=>$alto,"piezas"=>"2",
                "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id,"repeticion"=>$repeticion],

                ["linea"=>$linea, "fam_linea"=>"2510","lado"=>"X5","nombre"=>"Pierna","resta"=>"31","restado"=>$piezaResta2,"piezas"=>"4",
                 "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id,"repeticion"=>$repeticion],

                ["linea"=>$linea, "fam_linea"=>"2507","lado"=>"X6","nombre"=>"Enganche","resta"=>"31","restado"=>$piezaResta2,"piezas"=>"4",
                 "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id,"repeticion"=>$repeticion],

                ["linea"=>$linea, "fam_linea"=>"2521","lado"=>"X","nombre"=>"Union","resta"=>"31","restado"=>$piezaResta2,"piezas"=>"1",
                 "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id,"repeticion"=>$repeticion],

                ["linea"=>$linea, "fam_linea"=>"2504","lado"=>"X7","nombre"=>"Cabezal","resta"=>"200","restado"=>$restaZocalo, "piezas"=>"4",
                 "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id,"repeticion"=>$repeticion]
            ];

            barra::insert($data);
        }

             return redirect()->action(
                 [BarraController::class, 'confirmacionBlade'], ['id' => $perfil_id]
             );
        }
        // 1er ancho primero dividir entre 2,
        // 2da a cada pieza restarle 8, 
        // del total de 4 piezas. el total seria 

        // PARA 20

        

        // return redirect()->action(
        //     [BarraController::class, 'confirmacionBlade'], ['id' => $perfil_id]
        // );

        // PARA LINEA 20
        // DOS HOJAS 
        // -79, DESPUES DIVIDIR ENTRE 2
        // TRES HOJAS -80, DIVIDO ENTRE 3,
        // CUATRO HOJAS 147, DIVIDIO ENTRE 4.

        // PARA LA LINEA 25 SOLO ZOCALO
        // PARA EL DE DOS HOJAS 106 LUEGO DIVIR EN DOS ZOCALO
        // TRES HOJAS 118 LUEGO DIVIDIR EN 3
        // CUATRO HOJAS 200 DIVIDIR ENTRE 4

        // $data = json_encode($data);    
               
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
