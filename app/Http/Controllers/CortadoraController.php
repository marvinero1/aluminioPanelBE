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

        $hoja_calculo_perfil = hoja_calculo_perfil::where('hoja_calculo_perfils.user_id', '=', Auth::user()->id)->orderBy('created_at', 'desc')->get();

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
            $restaRecorte =  $ancho - $resta;
            $fam_linea = $perfilBarrass->fam_linea;
            $perfil_id = $perfilBarrass->perfil_id;
                                  
                $data = [["Codigo"=>$fam_linea],["Nombre"=>$nombre],["Medida Descuento"=>$restaRecorte],["Piezas Cortar"=>$piezas]];
                // echo json_encode($perfilBarrass);
        }


        $perfil = Perfil::where('perfils.hoja_id', '=', $id)->get();
        $perfil_id = $id;

        $barra = barra::where('barras.hoja_id', '=', $id)->get();

        $barra2001 = barra::where('barras.hoja_id', '=', $id)->where('barras.fam_linea','=','2001')->get();
        $barra2002 = barra::where('barras.hoja_id', '=', $id)->where('barras.fam_linea','=','2002')->get();
        $barra2005 = barra::where('barras.hoja_id', '=', $id)->where('barras.fam_linea','=','2005')->get();
        $barra2009 = barra::where('barras.hoja_id', '=', $id)->where('barras.fam_linea','=','2009')->get();
        $barra2010 = barra::where('barras.hoja_id', '=', $id)->where('barras.fam_linea','=','2010')->get();
        $barra2011 = barra::where('barras.hoja_id', '=', $id)->where('barras.fam_linea','=','2011')->get();

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
      
                    $restaRecorte =  $ancho - $resta;

                    // echo count($barra);
                    // echo "<p>$fam_linea => $nombre => $restaRecorte => $piezas</p>";            
                }
        }  
     
        return view('cortadoraperfil.ventanas', compact('perfil','barra','ancho_barra','fam_linea','nombre','division','perfilBarras','repeteciones','perfil_id','data','restaRecorte','piezas','l','barra','barra2001','barra2002','barra2005','barra2009','barra2010','barra2011'));
    }


    public function cotizacion($id){

      $mt2Total=0;
      $mt2Total25=0;

        $perfilBarras = DB::table('hoja_calculo_perfils')
            ->join('perfils', 'hoja_calculo_perfils.id', '=', 'perfils.hoja_id')
            ->join('barras', 'hoja_calculo_perfils.id', '=', 'barras.hoja_id')
            ->select('hoja_calculo_perfils.*', 'perfils.*', 'barras.*')
            ->get();

        $id_hoja = $id; 

        $hoja_calculo_perfil = hoja_calculo_perfil::findOrFail($id);


        $perfil = Perfil::where('perfils.hoja_id', '=', $id)->get();

        $perfilL20 = Perfil::where('perfils.hoja_id', '=', $id)->where('perfils.linea','=',
          'L-20')->get();


        $perfilL25 = Perfil::where('perfils.hoja_id', '=', $id)->where('perfils.linea','=',
          'L-25')->get();

        $barraL20Alto = Perfil::where('perfils.hoja_id','=',$id)->where('perfils.linea', '=', 'L-20')->sum('alto');
        $barraL20Ancho = Perfil::where('perfils.hoja_id', '=', $id)->where('perfils.linea', '=', 'L-20')->sum('ancho');


        $barraL25Alto = Perfil::where('perfils.hoja_id', '=', $id)->where('perfils.linea', '=', 'L-25')->sum('alto');
        $barraL25Ancho = Perfil::where('perfils.hoja_id', '=', $id)->where('perfils.linea', '=', 'L-25')->sum('ancho');

        
        // echo $barraL20Alto, '*' ,$barraL20Ancho,'=';
        $totalmt2 = $barraL20Alto * $barraL20Ancho;
        // echo number_format($totalmt2,3)."<hr>";



        // echo $barraL25Alto, '*' ,$barraL25Ancho,'=';
        $totalmt225 = $barraL25Alto * $barraL25Ancho;
        // echo number_format($totalmt225,3)."<hr>";


        // $t1 = $totalmt2 + $totalmt225;
        
        // echo "Total =".  $t1;
        
        // echo json_encode($barraL20Alto.','.$barraL20Ancho.",".$totalmt2);

        foreach ($perfilL20 as $perfilL20s) {
          $alto = $perfilL20s->alto;
          $ancho = $perfilL20s->ancho;

          $mt2 = $alto * $ancho;

          
          $mt2Total += $mt2; 

          // echo $mt2Total;
        }


        foreach ($perfilL25 as $perfilL25s) {
          $alto25 = $perfilL25s->alto;
          $ancho25 = $perfilL25s->ancho;

          $mt2 = $alto25 * $ancho25;

          $mt2Total25 += $mt2; 

          echo $mt2Total25;
        }
        
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
            $restaRecorte =  $ancho - $resta;

            $fam_linea = $perfilBarrass->fam_linea;
            $perfil_id = $perfilBarrass->perfil_id;
            $metros2 = $ancho * $alto;
        }

          $totalTotal = 0;
            
            foreach($perfil as $perfils){
                $mt2 = $perfils->alto * $perfils->ancho;
                $precio = $perfils->precio;
                $total = $mt2 * $precio;

                 $totalTotal +=  $total;
            }

         return view('cortadoraperfil.cotizacion', compact('hoja_calculo_perfil','perfilBarras','id_hoja','metros2','nombre_cliente','celular','barraL20Alto','barraL20Ancho','barraL25Ancho','barraL25Alto','totalmt225','descripcion','mt2','perfil','totalTotal','total','mt2Total','totalmt2','mt2Total25'));
    }

    public function precioEditCortadora($id){
       $perfilBarras = DB::table('hoja_calculo_perfils')
            ->join('perfils', 'hoja_calculo_perfils.id', '=', 'perfils.hoja_id')
            ->join('barras', 'hoja_calculo_perfils.id', '=', 'barras.hoja_id')
            ->select('hoja_calculo_perfils.*', 'perfils.*', 'barras.*')
            ->get();

        $id_hoja = $id; 

        $hoja_calculo_perfil = hoja_calculo_perfil::findOrFail($id);

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
            $restaRecorte =  $ancho - $resta;

            $fam_linea = $perfilBarrass->fam_linea;
            $perfil_id = $perfilBarrass->perfil_id;
            $metros2 = $ancho * $alto;
        }

          $totalTotal = 0;
            
            foreach($perfil as $perfils){
                $mt2 = $perfils->alto * $perfils->ancho;
                $precio = $perfils->precio;
                $total = $mt2 * $precio;

                 $totalTotal +=  $total;
            }

         return view('cortadoraperfil.precio', compact('hoja_calculo_perfil','perfilBarras','id_hoja','metros2','nombre_cliente','celular',
            'descripcion','mt2','perfil','totalTotal','total'));
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
