<?php

namespace App\Http\Controllers;

use App\User;
use Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('user.index');
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
            'name' => 'required',
            'apellido' => 'required', 
            'direccion' => 'nullable',
            'telefono' => 'required',
            'pais' => 'nullable',
            'ciudad' => 'nullable',
            'whatsapp' => 'nullable',
            'nombre_empresa' => 'nullable',
            'nit' => 'nullable',
            'email' => 'required',
            'password'=>'required',
            'role'=>'required',
        ]);

        //dd($request);
        User::create([
            'name' => $request->name,
            'apellido' => $request->apellido,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
            'pais' => $request->pais,
            'ciudad' => $request->ciudad,
            'whatsapp' => $request->whatsapp,
            'nombre_empresa' => $request->nombre_empresa,
            'nit' => $request->nit,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);
        
        session::flash('message','Usuario Registrado Exisitosamente!');
        return redirect('/login')->with("message", "Usuario creado exitosamente!");  
    }
    public function store1(Request $request)
    {   //dd($request);
        $request->validate([
            'name' => 'required',
            'apellido' => 'nullable', 
            'direccion' => 'nullable',
            'telefono' => 'required',
            'pais' => 'nullable',
            'ciudad' => 'nullable',
            'whatsapp' => 'nullable',
            'nombre_empresa' => 'nullable',
            'nit' => 'nullable',
            'email' => 'required',
            'password'=>'required',
            'role'=>'required',
        ]);

        //dd($request);
        User::create([
            'name' => $request->name,
            'apellido' => $request->apellido,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
            'pais' => $request->pais,
            'ciudad' => $request->ciudad,
            'whatsapp' => $request->whatsapp,
            'nombre_empresa' => $request->nombre_empresa,
            'nit' => $request->nit,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);
        
        session::flash('message','Empresa Registrado Exisitosamente!');
        return redirect('/login')->with("message", "Empresa creado exitosamente!");  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      
        return view('user.edit', ['user' =>User::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
