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
        $ancho = $request->ancho;
        $alto = $request->alto;
        $linea = $request->linea;
        $perfil_id = $request->perfil_id;
        $hoja_id = $request->hoja_id;
        $combinacion = $request->combinacion;
       

        // dd($combinacion);
      
        // 1er ancho primero dividir entre 2,
        // 2da a cada pieza restarle 8, 
        // del total de 4 piezas. el total seria 


        // PARA 20

        if ($combinacion == 'combinacion1' and  $linea == 'L-20') {

            $largoMilesima = $ancho * 1000;
            $altoMilesima = $alto * 1000;
            $piezas2005= 4;
            $division = $largoMilesima / 2;
            $restaJamba = 0;

            $piezaResta = $division - 8;
            $piezaResta1 = $piezaResta * 2;
            $piezaResta2 = $altoMilesima - 28;
            $piezaResta3 = $largoMilesima - 12;

            // PARA LINEA 20
            // DOS HOJAS 
            // RESTAR 79, DESPUES DIVIDIR ENTRE 2

            $restaZocalo = $largoMilesima - 79;
            $restaZocalo = $restaZocalo / 2;

            $data = [
                ["linea"=>$linea, "fam_linea"=>"2001","lado"=>"X1","nombre"=>"Riel_Superior","resta"=>"12","restado"=>$piezaResta3,"piezas"=>"1",
                 "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id],

                ["linea"=>$linea, "fam_linea"=>"2002","lado"=>"X2","nombre"=>"Riel_Inferior","resta"=>"12","restado"=>$piezaResta3,"piezas"=>"1",
                 "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id],

                ["linea"=>$linea, "fam_linea"=>"2005","lado"=>"X4","nombre"=>"Zocalo","resta"=>"79","restado"=>$restaZocalo,"piezas"=>$piezas2005,
                 "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id],

                ["linea"=>$linea, "fam_linea"=>"2009","lado"=>"X3","nombre"=>"Jamba","resta"=>"0","restado"=>$altoMilesima,"piezas"=>"2",
                 "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id],

                ["linea"=>$linea, "fam_linea"=>"2010","lado"=>"X5","nombre"=>"Pierna","resta"=>"28","restado"=>$piezaResta2,"piezas"=>"2",
                 "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id],

                ["linea"=>$linea, "fam_linea"=>"2011","lado"=>"X6","nombre"=>"Enganche","resta"=>"28","restado"=>$piezaResta2,"piezas"=>"2",
                 "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id]
            ];

             barra::insert($data);

        }elseif($combinacion == 'combinacion4' and  $linea == 'L-20'){
            //Tres Hojas
            $largoMilesima = $ancho * 1000;
            $altoMilesima = $alto * 1000;
            $piezas2005 = 6;
            $division = $largoMilesima / 3;

            $piezaResta = $division - 8;
            $piezaResta1 = $piezaResta * 3;
            $piezaResta2 = $altoMilesima - 28;
            $piezaResta3 = $largoMilesima - 12;

            // PARA LINEA 20
            // TRES HOJAS
            // RESTAR 80, DIVIDO ENTRE 3,

            $restaZocalo = $largoMilesima - 80;
            $restaZocalo = $restaZocalo / 3;

             $data = [
                ["linea"=>$linea, "fam_linea"=>"2001","lado"=>"X1","nombre"=>"Riel_Superior","resta"=>"12","restado"=>$piezaResta3,
                "piezas"=>"1","ancho"=>$ancho, "alto"=>$alto,"perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id],

                ["linea"=>$linea, "fam_linea"=>"2002","lado"=>"X2","nombre"=>"Riel_Inferior","resta"=>"12","restado"=>$piezaResta3,"piezas"=>"1",
                "ancho"=>$ancho, "alto"=>$alto,"perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id],

                ["linea"=>$linea, "fam_linea"=>"2005","lado"=>"X4","nombre"=>"Zocalo","resta"=>"80","restado"=>$restaZocalo,"piezas"=>$piezas2005,
                "ancho"=>$ancho, "alto"=>$alto,"perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id],

                ["linea"=>$linea, "fam_linea"=>"2009","lado"=>"X3","nombre"=>"Jamba","resta"=>"0","restado"=>$altoMilesima,"piezas"=>"2",
                "ancho"=>$ancho, "alto"=>$alto,"perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id],

                ["linea"=>$linea, "fam_linea"=>"2010","lado"=>"X5","nombre"=>"Pierna","resta"=>"28","restado"=>$piezaResta2,"piezas"=>"2",
                "ancho"=>$ancho, "alto"=>$alto,"perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id],

                ["linea"=>$linea, "fam_linea"=>"2011","lado"=>"X6","nombre"=>"Enganche","resta"=>"28","restado"=>$piezaResta2,"piezas"=>"4",
                "ancho"=>$ancho, "alto"=>$alto,"perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id]
            ];

            barra::insert($data);
        }if($combinacion == 'combinacion5' and  $linea == 'L-20') {
            // Cuatro Hojas
            $largoMilesima = $ancho * 1000;
            $altoMilesima = $alto * 1000;
            $piezas2005= 6;
            $division = $largoMilesima / 4;

            $piezaResta = $division - 8;
            $piezaResta1 = $piezaResta * 3;
            $piezaResta2 = $altoMilesima - 28;
            $piezaResta3 = $largoMilesima - 12;

            // PARA LINEA 20
            // CUATRO HOJAS
            // RESTAR 147, DIVIDO ENTRE 4,
            $restaZocalo = $largoMilesima - 147;
            $restaZocalo = $restaZocalo / 4;


             $data = [
                ["linea"=>$linea, "fam_linea"=>"2001","lado"=>"X1","nombre"=>"Riel_Superior","resta"=>"12","restado"=>$piezaResta3, "piezas"=>"1",
                 "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id],

                ["linea"=>$linea, "fam_linea"=>"2002","lado"=>"X2","nombre"=>"Riel_Inferior","resta"=>"12","restado"=>$piezaResta3, "piezas"=>"1",
                 "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id],

                ["linea"=>$linea, "fam_linea"=>"2005","lado"=>"X4","nombre"=>"Zocalo","resta"=>"8","restado"=>$restaZocalo,"piezas"=>"8",
                 "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id],

                ["linea"=>$linea, "fam_linea"=>"2009","lado"=>"X3","nombre"=>"Jamba","resta"=>"0","restado"=>$altoMilesima,"piezas"=>"2",
                "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id],

                ["linea"=>$linea, "fam_linea"=>"2010","lado"=>"X5","nombre"=>"Pierna","resta"=>"28","restado"=>$piezaResta2,"piezas"=>"4",
                 "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id],

                ["linea"=>$linea, "fam_linea"=>"2011","lado"=>"X6","nombre"=>"Enganche","resta"=>"28","restado"=>$piezaResta2,"piezas"=>"4",
                 "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id],

                ["linea"=>$linea, "fam_linea"=>"2521","lado"=>"X","nombre"=>"Union","resta"=>"28","restado"=>$piezaResta2,"piezas"=>"1",
                 "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id]
            ];

            barra::insert($data);// PARA 25
        }if ($combinacion == 'combinacion1' and  $linea == 'L-25') {

            $largoMilesima = $ancho * 1000;
            $largoMilesimaAlto = $alto * 1000;
            $piezas2005= 4;
            $division = $largoMilesima / 2;
            $restaJamba = 0;

            $piezaResta = $division - 8;
            $piezaResta1 = $piezaResta * 2;
            $piezaResta2 = $largoMilesimaAlto - 31;
            $piezaResta3 = $largoMilesima - 16;

           // PARA LA LINEA 25 SOLO ZOCALO
            // PARA EL DE DOS HOJAS 106 LUEGO DIVIR EN DOS ZOCALO

            $restaZocalo = $largoMilesima - 106;
            $restaZocalo = $restaZocalo / 2;

            $restaEnganche = $largoMilesimaAlto - 31;
            $restaEnganche = $restaEnganche / 2;



            $data = [
                ["linea"=>$linea, "fam_linea"=>"2501","lado"=>"X1","nombre"=>"Riel_Superior","resta"=>"16","restado"=>$piezaResta3,"piezas"=>"1",
                 "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id],

                ["linea"=>$linea, "fam_linea"=>"2502","lado"=>"X2","nombre"=>"Riel_Inferior","resta"=>"16","restado"=>$piezaResta3,"piezas"=>"1",
                 "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id],

                ["linea"=>$linea, "fam_linea"=>"2505","lado"=>"X4","nombre"=>"Zocalo","resta"=>"106","restado"=>$restaZocalo,"piezas"=>"2",
                 "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id],

                ["linea"=>$linea, "fam_linea"=>"2509","lado"=>"X3","nombre"=>"Jamba","resta"=>"0","restado"=>$largoMilesimaAlto,"piezas"=>"2",
                 "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id],

                ["linea"=>$linea, "fam_linea"=>"2510","lado"=>"X5","nombre"=>"Pierna","resta"=>"31","restado"=>$piezaResta2,"piezas"=>"2",
                 "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id],

                ["linea"=>$linea, "fam_linea"=>"2507","lado"=>"X6","nombre"=>"Enganche","resta"=>"31","restado"=>$piezaResta2,"piezas"=>"2",
                 "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id],

                 ["linea"=>$linea, "fam_linea"=>"2504","lado"=>"X7","nombre"=>"Cabezal","resta"=>"106","restado"=>$restaZocalo, "piezas"=>"2",
                 "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id] 
            ];

             barra::insert($data);

        }if ($combinacion == 'combinacion4' and  $linea == 'L-25') {

             //Tres Hojas
            $largoMilesima = $ancho * 1000;
            $altoMilesima = $alto * 1000;
            $piezas2005 = 6;
            $division = $largoMilesima / 3;

            $piezaResta = $division - 8;
            $piezaResta1 = $piezaResta * 3;
            $piezaResta2 = $altoMilesima - 31;
            $piezaResta3 = $largoMilesima - 16;

            // PARA LINEA 25
            // TRES HOJAS
            // RESTAR 118, DIVIDO ENTRE 3 a zocalo,

            $restaZocalo = $largoMilesima - 118;
            $restaZocalo = $restaZocalo / 3;

             $data = [
                ["linea"=>$linea, "fam_linea"=>"2501","lado"=>"X1","nombre"=>"Riel_Superior","resta"=>"16","restado"=>$piezaResta3,
                "piezas"=>"1","ancho"=>$ancho, "alto"=>$alto,"perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id],

                ["linea"=>$linea, "fam_linea"=>"2502","lado"=>"X2","nombre"=>"Riel_Inferior","resta"=>"16","restado"=>$piezaResta3,"piezas"=>"1",
                "ancho"=>$ancho, "alto"=>$alto,"perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id],

                ["linea"=>$linea, "fam_linea"=>"2505","lado"=>"X4","nombre"=>"Zocalo","resta"=>"118","restado"=>$restaZocalo,"piezas"=>"3",
                "ancho"=>$ancho, "alto"=>$alto,"perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id],

                ["linea"=>$linea, "fam_linea"=>"2509","lado"=>"X3","nombre"=>"Jamba","resta"=>"0","restado"=>$altoMilesima,"piezas"=>"2",
                "ancho"=>$ancho, "alto"=>$alto,"perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id],

                ["linea"=>$linea, "fam_linea"=>"2510","lado"=>"X5","nombre"=>"Pierna","resta"=>"31","restado"=>$piezaResta2,"piezas"=>"2",
                "ancho"=>$ancho, "alto"=>$alto,"perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id],

                ["linea"=>$linea, "fam_linea"=>"2507","lado"=>"X6","nombre"=>"Enganche","resta"=>"31","restado"=>$piezaResta2,"piezas"=>"4",
                "ancho"=>$ancho, "alto"=>$alto,"perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id],

                 ["linea"=>$linea, "fam_linea"=>"2504","lado"=>"X7","nombre"=>"Cabezal","resta"=>"118","restado"=>$restaZocalo, "piezas"=>"3",
                 "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id] 
            ];

             barra::insert($data);

        }if($combinacion == 'combinacion5' and  $linea == 'L-25') {
            // Cuatro Hojas
            $largoMilesima = $ancho * 1000;
            $altoMilesima = $alto * 1000;
            $piezas2005= 6;
            $division = $largoMilesima / 4;

            $piezaResta = $division - 8;
            $piezaResta1 = $piezaResta * 3;
            $piezaResta2 = $altoMilesima - 31;
            $piezaResta3 = $largoMilesima - 16;

            // PARA LINEA 20
            // CUATRO HOJAS
            // RESTAR 147, DIVIDO ENTRE 4,
            $restaZocalo = $largoMilesima - 200;
            $restaZocalo = $restaZocalo / 4;


             $data = [
                ["linea"=>$linea, "fam_linea"=>"2501","lado"=>"X1","nombre"=>"Riel_Superior","resta"=>"16","restado"=>$piezaResta3, "piezas"=>"1",
                 "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id],

                ["linea"=>$linea, "fam_linea"=>"2502","lado"=>"X2","nombre"=>"Riel_Inferior","resta"=>"16","restado"=>$piezaResta3, "piezas"=>"1",
                 "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id],

                ["linea"=>$linea, "fam_linea"=>"2505","lado"=>"X4","nombre"=>"Zocalo","resta"=>"200","restado"=>$restaZocalo,"piezas"=>"4",
                 "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id],

                ["linea"=>$linea, "fam_linea"=>"2509","lado"=>"X3","nombre"=>"Jamba","resta"=>"0","restado"=>$altoMilesima,"piezas"=>"2",
                "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id],

                ["linea"=>$linea, "fam_linea"=>"2510","lado"=>"X5","nombre"=>"Pierna","resta"=>"31","restado"=>$piezaResta2,"piezas"=>"4",
                 "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id],

                ["linea"=>$linea, "fam_linea"=>"2507","lado"=>"X6","nombre"=>"Enganche","resta"=>"31","restado"=>$piezaResta2,"piezas"=>"4",
                 "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id],

                ["linea"=>$linea, "fam_linea"=>"2521","lado"=>"X","nombre"=>"Union","resta"=>"31","restado"=>$piezaResta2,"piezas"=>"1",
                 "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id],

                ["linea"=>$linea, "fam_linea"=>"2504","lado"=>"X7","nombre"=>"Cabezal","resta"=>"200","restado"=>$restaZocalo, "piezas"=>"4",
                 "ancho"=>$ancho, "alto"=>$alto, "perfil_id"=>$perfil_id,"hoja_id"=>$hoja_id]
            ];

            barra::insert($data);
        }
        

      return back()->withInput();

        // PARA LINEA 20
        // DOS HOJAS 
        // -79, DESPUES DIVIDIR ENTRE 2
        // TRES HOJAS -80, DIVIDO ENTRE 3,
        // CUATRO HOJAS 147, DIVIDIO ENTRE 4.

        // PARA LA LINEA 25 SOLO ZOCALO
        // PARA EL DE DOS HOJAS 106 LUEGO DIVIR EN DOS ZOCALO
        // TRES HOJAS 118 LUEGO DIVIDIR EN 3
        // CUATRO HOJAS 200 DIVIDIR ENTRE 4


        // TRES HOJAS
        // copiar lo mismo 
        // lo que cambia es el numero de piezas,
        // Riel inferiro = 1,
        // Riel_Superior = 1,
        // zocalo = 6 dividir entre 3, -8 formula arriba
        // jamba = sin restar nada sigue 2,
        // pierna = 2 piezas se conserva,
        // enganche = 4 piezas resta 28,
        // PRIMERO SE RESTA LUEGO SE DIVIDE
        // CUATRO HOJAS
        // Riel inferiro = 1,
        // Riel_Superior = 1,
        // zocalo = 6 dividir entre 4, -8 formula arriba
        // jamba = sin restar nada sigue 2,
        // pierna = 4 piezas se conserva,
        // enganche = 4 piezas resta 28,
        // 5008=union 4 hojas recorte=-28,piezas 1, descontar a la altura 
        // pierna y enganche igual a altura 

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
