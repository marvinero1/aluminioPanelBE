<?php

namespace App\Http\Controllers;

use App\Cortadora;
use App\Categoria;
use App\barra;
use App\hoja_calculo_perfil;
use App\Perfil;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Session;

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

    public function updateStatusHojaCortadora(Request $request, $id){

        $hoja_calculo_perfil = hoja_calculo_perfil::findOrFail($id);
        $hoja_calculo_perfil->update($request->all());

        return response()->json($hoja_calculo_perfil, 200);
    }

    public function cortadoraInfoGeneral($id){
        $barra = barra::where('barras.hoja_id', '=', $id)->get();
     

        return view('cortadoraperfil.info', compact('barra','barra_perfil_id'));

    }

    public function cortadoraInfoVentanas($id){

        $perfilBarras = DB::table('hoja_calculo_perfils')
            ->join('perfils', 'hoja_calculo_perfils.id', '=', 'perfils.hoja_id')
            ->join('barras', 'hoja_calculo_perfils.id', '=', 'barras.hoja_id')
            ->select('hoja_calculo_perfils.*', 'perfils.*', 'barras.*')
            ->get();



        foreach($perfilBarras as $perfilBarrass){
            $nombre = $perfilBarrass->nombre;
            $resta = $perfilBarrass->resta;
            $piezas = $perfilBarrass->piezas;
            $ancho = $perfilBarrass->ancho;
            $anchoMilesima = $ancho * 1000;
            $restaRecorte =  $anchoMilesima - $resta;

            $fam_linea = $perfilBarrass->fam_linea;
            $perfil_id = $perfilBarrass->perfil_id;
            
                                        
                $data = [["Codigo"=>$fam_linea],["Nombre"=>$nombre],["Medida Descuento"=>$restaRecorte],["Piezas Cortar"=>$piezas]];
        
                // echo json_encode($perfilBarrass);
                
        }



        $perfil = Perfil::where('perfils.hoja_id', '=', $id)->get();
        $perfil_id = $id;

        $barra = barra::where('barras.hoja_id', '=', $id)->get();



       foreach($perfil as $perfils){
        $id_perfil =  $perfils->id;
      
        $repeteciones = $perfils->repeticion;
        $ancho_barra = $perfils->ancho;
        $largo_predeterminado = 6;

        $numberRepeteat = $ancho_barra * $repeteciones;

        $division = $numberRepeteat / $largo_predeterminado;

        
       }      
       $repeteciones = +$repeteciones;

        $l = $perfils->sum('repeticion');
         // echo $l;

       foreach ($barra as $barras){
            $barra_perfil_id = $barras->perfil_id;
                if($id_perfil == $barra_perfil_id){
                    $fam_linea = $barras->fam_linea;
                    $nombre = $barras->nombre;
                    $ancho = $barras->largo;
                    $resta = $barras->resta;
                    $piezas = $barras->piezas;

                    $anchoMilesima = $ancho * 1000;

                    $restaRecorte =  $anchoMilesima - $resta;

                    
                    // echo count($barra);
                     
                    // echo "<p>$fam_linea => $nombre => $restaRecorte => $piezas</p>";
                    
                    
                           
                }
        }  
        
        
     
        return view('cortadoraperfil.ventanas', compact('perfil','barra','ancho_barra','fam_linea','nombre','division','perfilBarras','repeteciones','perfil_id','data','restaRecorte','piezas','l'));
    }


    public function cotizacion($id){

        $perfilBarras = DB::table('hoja_calculo_perfils')
            ->join('perfils', 'hoja_calculo_perfils.id', '=', 'perfils.hoja_id')
            ->join('barras', 'hoja_calculo_perfils.id', '=', 'barras.hoja_id')
            ->select('hoja_calculo_perfils.*', 'perfils.*', 'barras.*')
            ->get();

        $id_hoja = $id;

        $perfil = Perfil::where('perfils.hoja_id', '=', $id)->get();

        foreach($perfilBarras as $perfilBarrass){
            $id = $perfilBarrass->id; 
            $nombre_cliente = $perfilBarrass->nombre_cliente;
            $celular =$perfilBarrass->celular;
            $descripcion = $perfilBarrass->descripcion;
            $mt2 = $perfilBarrass->suma_m2;
            $resta = $perfilBarrass->resta;
            $piezas = $perfilBarrass->piezas;
            $ancho = $perfilBarrass->ancho;
            $alto = $perfilBarrass->alto;
            $anchoMilesima = $ancho * 1000;
            $restaRecorte =  $anchoMilesima - $resta;

            $fam_linea = $perfilBarrass->fam_linea;
            $perfil_id = $perfilBarrass->perfil_id;
            $metros2 = $ancho * $alto;

        }


         return view('cortadoraperfil.cotizacion', compact('perfilBarras','id_hoja','metros2','nombre_cliente','celular',
            'descripcion','mt2','perfil'));
    }

    public function getPerfiilCombinacion($id){
        
    }


    public function updateHojaPerfil(Request $request, $id){

        $requestData = $request->all();

        $hoja_calculo_perfil = hoja_calculo_perfil::findOrFail($id);

        $hoja_calculo_perfil->nombre_cliente = $request->get('nombre_cliente');
        $hoja_calculo_perfil->celular = $request->get('celular');
        $hoja_calculo_perfil->precio = $request->get('precio');
        $hoja_calculo_perfil->suma_m2 = $request->get('suma_m2');
        $hoja_calculo_perfil->descripcion = $request->get('descripcion');


        $hoja_calculo_perfil->update();
        
        Session::flash('message','Hoja de Calculo Para Cortadora de Perfil de Aluminio Editado Exisitosamente!');
        return back()->withInput();
        
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

    public function destroyHojaPerfil($id){
        $hoja_calculo_perfil = hoja_calculo_perfil::find($id);

        $hoja_calculo_perfil->delete();

        Session::flash('message','Hoja de Calculo para Perfil de Aluminio eliminado exitosamente!');
        return back()->withInput();
    }
}
