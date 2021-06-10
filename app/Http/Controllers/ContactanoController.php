<?php

namespace App\Http\Controllers;

use App\Contactano;
use Session;
use Illuminate\Http\Request;

class ContactanoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $contactano = Contactano::all();
        return view('contactanos.index',compact('contactano'));
    }

    public function getContactosIonic(){
        return Contactano::all();
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
        $request->validate([
            'nombre' => 'required',
            'ciudad' => 'required',
            'telefono' => 'required',
            'whatsapp' => 'nullable',
        ]);
        
        Contactano::create([
            'nombre' => $request->nombre,
            'ciudad' => $request->ciudad,
            'telefono' => $request->telefono,
            'whatsapp' => $request->whatsapp,
        ]);
        
        Session::flash('message','Contacto creado exisitosamente!');
        return redirect()->route('contacto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contactano  $contactano
     * @return \Illuminate\Http\Response
     */
    public function show(Contactano $contactano)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contactano  $contactano
     * @return \Illuminate\Http\Response
     */
    public function edit(Contactano $contactano)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contactano  $contactano
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contactano $contactano)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contactano  $contactano
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contactano = Contactano::findOrFail($id);

        $contactano->delete();

        Session::flash('message','Contacto eliminado exitosamente!');
        return redirect()->route('contacto.index');
    }

    public function contactgetLPZ(){
        $contactano = Contactano::where('contactanos.ciudad', '=', 'La-Paz')->get();

        return response()->json($contactano, 200);
    }

    public function contactgetCBBA(){
        $contactano = Contactano::where('contactanos.ciudad', '=', 'Cochabamba')->get();

        return response()->json($contactano, 200);
    }
    public function contactgetSTCZ(){
        $contactano = Contactano::where('contactanos.ciudad', '=', 'Santa-Cruz')->get();

        return response()->json($contactano, 200);
    }
    public function contactgetOR(){
        $contactano = Contactano::where('contactanos.ciudad', '=', 'Oruro')->get();

        return response()->json($contactano, 200);
    }
    public function contactgetPOT(){
        $contactano = Contactano::where('contactanos.ciudad', '=', 'Potosi')->get();

        return response()->json($contactano, 200);
    }
    public function contactgetSUC(){
        $contactano = Contactano::where('contactanos.ciudad', '=', 'Sucre')->get();

        return response()->json($contactano, 200);
    }
    public function contactgetTAR(){
        $contactano = Contactano::where('contactanos.ciudad', '=', 'Tarija')->get();

        return response()->json($contactano, 200);
    }
    public function contactgetBENI(){
        $contactano = Contactano::where('contactanos.ciudad', '=', 'Beni')->get();

        return response()->json($contactano, 200);
    }
    public function contactgetPANDO(){
        $contactano = Contactano::where('contactanos.ciudad', '=', 'Pando')->get();

        return response()->json($contactano, 200);
    }

                                 
}
