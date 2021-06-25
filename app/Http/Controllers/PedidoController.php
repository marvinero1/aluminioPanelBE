<?php

namespace App\Http\Controllers;

use App\Pedido;
use App\User;
use App\Carrito;
use App\carrito_detalle;
use File;
use DB;
use Session;
use Illuminate\Support\Facades\Storage;
use Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $importadora = $request->get('buscarpor');
        $user = User::all()->sortBy('name');

        $carrito = Carrito::where('importadora','like',"%$importadora%")
        ->where('carritos.importadora', '=', Auth::user()->name)
        ->where('carritos.confirmacion', '=', 'false')
        ->orderBy('created_at', 'desc')
        ->paginate(10);
         
        //dd( $producto );
        return view('pedidos.index', compact('carrito', 'user'));
    }

    public function getMisCotizacionesConfirmadas(Request $request)
    {
        $importadora = $request->get('buscarpor');
        $user = User::all()->sortBy('name');

        $pedido = Pedido::where('importadora','like',"%$importadora%")
        ->where('pedidos.importadora', '=', Auth::user()->name)
        ->where('pedidos.estado', '=', 'true')
        ->orderBy('created_at', 'desc')
        ->paginate(10);
         
        //dd( $producto );
        return view('pedidos.confirmadas', compact('pedido', 'user'));
    }

     
   
    public function getMisCotizaciones(Request $request, $id)
    {
        $pedido = Pedido::where('pedidos.user_id', '=', $id)
        ->orderBy('created_at', 'desc')
        ->get();

        return response()->json($pedido, 200);
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
        
       $requestData = $request->all(); 

      if($request->file('file')) {
         $file = $request->file('file');
         $filename = time().'_'.$file->getClientOriginalName();

        // File upload location
        $location = 'files/';

         // Upload file
        $img = $file->move($location,$filename);
        $requestData['file'] = $img;

        $pedido = Pedido::create($requestData);


        Session::flash('message','Cotizacion Enviada Exitosamente');
        Session::flash('alert-class', 'alert-success');

      }else{

        Session::flash('message','Cotizacion No Enviada.');
        Session::flash('alert-class', 'alert-danger');
      }
        return redirect()->route('pedido.index');
   }

    


    /**
     * Display the specified resource.
     *
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show(Pedido $pedido, $id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function edit(Pedido $pedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pedido $pedido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedido $pedido)
    {
        //
    }

    public function download(Request $request, $file){
        //$requestData = $request->all();
        //dd(json_encode($request->file));
        // if (Storage::disk('public')->exists("$request->file")) {
        //     $path = Storage::disk('public')->exists("$request->file");
        //     $content = file_get_contents($path);

        //     return response($content)->withHeader([
        //         'Content-Type'->mime_content_type($path)
        //     ]);
        // } 

        // return redirect('/404');
        if ($request->file) {
            $path = public_path($request->file);
            return response()->download($path);
        
        } 
        
        
    }

    
}
