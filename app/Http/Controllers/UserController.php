<?php

namespace App\Http\Controllers;

use App\User;
use Session;
use File;
use DB;
use Image;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $name = $request->get('buscarpor');
        
        $user = User::where('name','like',"%$name%")->where('role', 'user')
        ->latest()
        ->paginate(10);
        
        return view('user.index', compact('user'));
    }

    public function index1(Request $request)
    {
        return view('user.profile');
    }

    public function importadoras(Request $request)
    {
        $name = $request->get('buscarpor');

        $user = User::where('name','like',"%$name%")
        ->where('role', 'empresa')
        ->latest()
        ->paginate(10);
        
        return view('user.importadoras', compact('user'));
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
        //dd($request);
        $request->validate([
            'name' => 'required',
            'apellido' => 'required', 
            'direccion' => 'nullable',
            'telefono' => 'required',
            'pais' => 'nullable',
            'ciudad' => 'nullable',
            'whatsapp' => 'nullable',
            'email' => 'required',
            'subscripcion' => 'required',
            'password' => 'required|string|min:6',
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
            'email' => $request->email,
            'role' => $request->role,
            'subscripcion' => $request->subscripcion,
            'password' => Hash::make($request->password),
            
        ]); 
        
        session::flash('message','Usuario Registrado Exisitosamente!');
        return redirect('/login')->with("message", "Usuario creado exitosamente!");  
    }
    public function store1(Request $request){   
        //dd($request);
        $request->validate([
            'name' => 'required',
            'apellido' => 'nullable', 
            'direccion' => 'nullable',
            'telefono' => 'required',
            'pais' => 'nullable',
            'ciudad' => 'nullable',
            'whatsapp' => 'nullable',
            'nit' => 'required',
            'email' => 'required',
            'password' => 'required|string|min:6',
            'role'=>'required',
        ]);
      

        User::create([
            'name' => $request->name,
            'apellido' => $request->apellido,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
            'pais' => $request->pais,
            'ciudad' => $request->ciudad,
            'whatsapp' => $request->whatsapp,
            'nit' => $request->nit,
            'email' => $request->email,
            'role' => $request->role,
            'subscripcion' => $request->subscripcion,
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
    public function show(Request $request, $id){
       $user = User::findOrFail($id);
       return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        return view('user.update', ['user' =>User::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){   
        $user = User::find($id);
       
        DB::beginTransaction();

        $requestData = $request->all();

        $mensaje = "Usuario Actualizado correctamente :3";

        if($request->imagen){
            $data = $request->imagen;
            $file = file_get_contents($request->imagen);
            $info = $data->getClientOriginalExtension(); 
            $extension = explode('images/user', mime_content_type('images/user'))[0];
            $image = Image::make($file);
            $fileName = rand(0,10)."-".date('his')."-".rand(0,10).".".$info; 
            $path  = 'images/user';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $img = $path.'/'.$fileName; 
            if($image->save($img)) {
                $archivo_antiguo = $user->imagen;
                $requestData['imagen'] = $img;
                $mensaje = "Usuario Actualizado correctamente :3";
                if ($archivo_antiguo != '' && !File::delete($archivo_antiguo)) {
                    $mensaje = "Usuario Actualizado. error al eliminar la imagen";
                }
            }else{
                $mensaje = "Error al guardar la imagen";
            }
        }
       
        if($user->update($request)){
            DB::commit();
        }else{
            DB::rollback();
        }

        Session::flash('message',$mensaje);
             return redirect()->route('user.index');
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

    public function subscripcion(Request $request, $id){ 
        $user = User::find($id);

        $request->validate([
            'subscripcion' => 'required',
            
        ]);

        $user->subscripcion = $request->get('subscripcion');
        
        $user->fecha_inicio = $request->get('fecha_inicio');
        $user->fecha_fin = $request->get('fecha_fin');
        
        $user->update(); 

        Session::flash('message','Subscripcion Exisitosamente!');
        return redirect()->route('user.index');
    } 

    public function updatepassword(Request $request, $id){   
        $user = User::find($id);
        
        $request->validate([
            
            'email' => 'required',
            'password' => 'required|string|min:6|confirmed',
            
        ]);

        //dd($request);
        User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        
        session::flash('message','Usuario Editado Exisitosamente!');
        return redirect('/login')->with("message", "Usuario Editado exitosamente!"); 
    }
}
