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
        
        $contactano = Contactano::all();
        return response()->json($contactano, 200);
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
}
