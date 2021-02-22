<?php

namespace App\Http\Controllers;
use App\User;
use Carbon\Carbon;
use App\Subscripcion;
use Illuminate\Http\Request;

class SubscripcionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $name = $request->get('buscarpor');
        
        $user = User::where('name','like',"%$name%")
        ->where('subscripcion', true)
        ->latest()
        ->paginate(10);
        // $mytime = Carbon::now();
        // echo $mytime->format('Y-m-d');
        
        return view('subscripcion.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mytime = Carbon::now();
        echo $mytime->format('Y-m-d');


        //echo $mytime->toDateTimeString('Y-m-d');
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
     * @param  \App\Subscripcion  $subscripcion
     * @return \Illuminate\Http\Response
     */
    public function show(Subscripcion $subscripcion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subscripcion  $subscripcion
     * @return \Illuminate\Http\Response
     */
    public function edit(Subscripcion $subscripcion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subscripcion  $subscripcion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subscripcion $subscripcion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subscripcion  $subscripcion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscripcion $subscripcion)
    {
        //
    }
}
