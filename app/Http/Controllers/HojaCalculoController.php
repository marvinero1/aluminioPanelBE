<?php

namespace App\Http\Controllers;

use App\Hoja_calculo;
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

     public function getHojaCalculo(Request $request, $id)
    {
        $hoja_calculo = Hoja_calculo::where('estado','false')
        ->where('hoja_calculos.user_id', '=', $id)
        ->first();

        return response()->json($hoja_calculo, 201);
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

     public function guardarHoja(Request $request)
    {
        
        $hoja_calculo = Hoja_calculo::create($request->all());
        return response()->json($hoja_calculo, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Hoja_calculo  $hoja_calculo
     * @return \Illuminate\Http\Response
     */
    public function show(Hoja_calculo $hoja_calculo)
    {
        //
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
