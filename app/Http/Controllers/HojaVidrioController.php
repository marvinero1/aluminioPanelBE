<?php

namespace App\Http\Controllers;

use App\HojaVidrio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HojaVidrioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $hojaVidrio = HojaVidrio::where('hoja_vidrios.user_id', '=', Auth::user()->id)->orderBy('created_at', 'desc')->get();

        return view('vidrios.hoja_vidrio', compact('hojaVidrio'));
    }

    public function getHojaCalculoVidrio(Request $request, $id){
        $hojaVidrio = HojaVidrio::where('estado','false')->where('hoja_vidrios.user_id', '=', $id)
        ->first();

        return response()->json($hojaVidrio, 201);
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

    public function guardarHojaVidrio(Request $request){
        $hojaVidrio = HojaVidrio::create($request->all());
        return response()->json($hojaVidrio, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HojaVidrio  $hojaVidrio
     * @return \Illuminate\Http\Response
     */
    public function show(HojaVidrio $hojaVidrio){

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HojaVidrio  $hojaVidrio
     * @return \Illuminate\Http\Response
     */
    public function edit(HojaVidrio $hojaVidrio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HojaVidrio  $hojaVidrio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HojaVidrio $hojaVidrio)
    {
        //
    }

    public function updateStatusHojaVidrio(Request $request, $id){
        
        $hojaVidrio = HojaVidrio::findOrFail($id);
        $hojaVidrio->update($request->all());

        return response()->json($hojaVidrio, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HojaVidrio  $hojaVidrio
     * @return \Illuminate\Http\Response
     */
    public function destroy(HojaVidrio $hojaVidrio)
    {
        //
    }
}
