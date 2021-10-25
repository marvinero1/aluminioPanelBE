<?php

namespace App\Http\Controllers;

use App\Hoja_calculo;
use App\hoja_calculo_perfil;
use App\Perfil;
use Illuminate\Http\Request;

class HojaCalculoController extends Controller
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

    
    public function getHojaCalculo(Request $request, $id){

        $hoja_calculo = Hoja_calculo::where('estado','false')
        ->where('hoja_calculos.user_id', '=', $id)
        ->first();

        return response()->json($hoja_calculo, 201);
    }

    public function getHojaCalculoPerfil(Request $request, $id){

        $hoja_calculo_perfil = hoja_calculo_perfil::where('estado','false')
        ->where('hoja_calculo_perfils.user_id', '=', $id)
        ->first();

        return response()->json($hoja_calculo_perfil, 201);
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


    public function guardarCombinacion(Request $request){

       $request->validate([
            'alto' => 'required',
            'ancho' => 'required', 
            'combinacion' => 'nullable',
            'categoria' => 'required',
            'user_id' => 'required',           
        ]);

        dd($request);
      
        // User::create([
        //     'name' => $request->name,
        //     'apellido' => $request->apellido,
        //     'direccion' => $request->direccion,
        //     'telefono' => $request->telefono,
        //     'pais' => $request->pais,
        //     'ciudad' => $request->ciudad,
        //     'whatsapp' => $request->whatsapp,
        //     'email' => $request->email,
        //     'role' => $request->role,
        //     'registrado' => $request->registrado,
        //     'imagen' => 'images/default-person.jpg',
        //     'subscripcion' => $request->subscripcion,
        //     'password' => Hash::make($request->password),
            
        // ]); 
        
        // session::flash('message','Usuario Registrado Exisitosamente!');
        // return redirect('/login')->with("message", "Usuario creado exitosamente!");  
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

    public function guardarHoja(Request $request){
        
        $hoja_calculo = Hoja_calculo::create($request->all());
        return response()->json($hoja_calculo, 201);
    }

    public function guardarHojaCortadoraPerfil(Request $request){
        
        $hoja_calculo_perfil = hoja_calculo_perfil::create($request->all());
        return response()->json($hoja_calculo_perfil, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Hoja_calculo  $hoja_calculo
     * @return \Illuminate\Http\Response
     */
    public function show(Hoja_calculo $hoja_calculo, $id){

        $perfil = Perfil::where('perfils.hoja_id', '=', $id)->get();

        return view('cortadoraperfil.show', compact('perfil'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hoja_calculo  $hoja_calculo
     * @return \Illuminate\Http\Response
     */
    public function edit(Hoja_calculo $hoja_calculo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hoja_calculo  $hoja_calculo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function updateStatusHoja(Request $request, $id){
        
        $hoja_calculo = Hoja_calculo::findOrFail($id);
        $hoja_calculo->update($request->all());

        return response()->json($hoja_calculo, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hoja_calculo  $hoja_calculo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hoja_calculo $hoja_calculo)
    {
        //
    }
}
