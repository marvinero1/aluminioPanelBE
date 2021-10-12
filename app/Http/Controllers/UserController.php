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
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $name = $request->get('buscarpor');
        
        $user = User::where('name','like',"%$name%")->where('role', 'user')
        ->latest()
        ->paginate(10);
        
        return view('user.index', compact('user'));
    }

    public function vendedores(Request $request)
    {
        $name = $request->get('buscarpor');

        $user = User::where('name','like',"%$name%")
        ->where('role', 'vendedor')
        ->latest()
        ->paginate(10);
        
        return view('user.vendedor', compact('user'));
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


    public function getImportadora(){
        return User::all()->where('role', 'empresa');

         
    }

    public function usuariosStorage(Request $request, $id){
        $user = User::where('email', '=', $id)->first();

        return response()->json($user, 200);
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

    public function login(Request $request){
        
        $this->validate($request, [
            'email' => 'required|email|exists:users,email',
            // 'username' => 'required|exists:users,username',
            'password' => 'required'
        ]);


        $user = User::whereEmail($request->email)->first();

        $sub =$user->subscripcion;

        if (!is_null($user)) {
            if ($sub == 'true') {
               if(Hash::check($request->password, $user->password)){
                $token = $user->createToken('personal')->accessToken;
           
                return response()->json(['res' => true, 'token' => $token, 'message' => "Bienvenido al sistema"]);  
                } 
                return $msg = "No cuenta con Subscripción";
            }
            
        } else
            return response()->json(['res' => false, 'message' => "No cuenta con Subscripción"]);
    }

    public function logout(){
        $user = auth()->user();
        $user->tokens->each(function ($token, $key){
            $token->delete();
        });
        return response()->json(['res' => true, 'message' => "Adios"]);
    }
    // public function userdata(Request $request){
    //      return response()->json($request->user());
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){   
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
            'registrado' => 'nullable',
            'imagen' => 'nullable',
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
            'registrado' => $request->registrado,
            'imagen' => 'images/default-person.jpg',
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
            'registrado' => 'nullable',
            'email' => 'required',
            'password' => 'required|string|min:6',
            'imagen' => 'nullable',
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
            'imagen' => 'images/default-person.jpg',
            'registrado' => $request->registrado,
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

        $imagen = null;
        $user = User::findOrFail($id);
        $mensaje = 'Usuario Editado Exitosamente!!!';

        DB::beginTransaction();
        $requestData = $request->all();

        if($request->imagen == ''){
            unset($requestData['imagen']);
        }

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

        if($user->update($requestData)){
            DB::commit();
        }else{
            DB::rollback();
        }

        Session::flash('message',$mensaje);
            return redirect()->route('user.index');
    }


    public function updateImagenIonic(Request $request, $id){
        $imagen = null;
        $user = User::findOrFail($id);
        $mensaje = 'Usuario Editado Exitosamente!!!';

        DB::beginTransaction();
        $requestData = $request->all();

        if($request->imagen == ''){
            unset($requestData['imagen']);
        }

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

        if($user->update($requestData)){
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
    public function destroy($id){
        
        $user = User::find($id);
        $user->delete();

        Session::flash('message','Usuario Eliminado Exitosamente!');
        return redirect()->route('user.index');
    }

    public function convertVendedor(Request $request, $id){ 

        $user = User::find($id);

        $request->validate([
            'role' => 'required',
            
        ]);

        $user->role = $request->get('role');
        
        $user->update(); 

        Session::flash('message','Se dio permisos de Vendedor Exisitosamente!');
        return redirect()->route('user.index');
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
        //$user = User::find($id);

        //dd($request);
        $request->validate([
            'email' => 'required',
            'password' => 'required|min:6',
            
        ]);
        
        
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->password)]);
        
        session::flash('message','Usuario Editado Exisitosamente!');
        return redirect()->route('user.index');
    }

    public function updatepasswordIonic(Request $request, $id){  

        $user = User::find($id);

        $request->validate([
            'email' => 'required',
            'password' => 'required|min:6', 
        ]);

        $user->password = $request->get('password');

        $user->update(['password'=> Hash::make($request->password)]); 
       
        // User::find($id)->update(['password'=> Hash::make($request->password)]);

        return response()->json(['res' => true, 'message' => "Password Actualizado"]);
    }

    public function viewRegisUsuario(){
        return view('user.register_usuario');
    }

    public function viewRegisEmpresa(){
        return view('user.register_empresa');
    }

    public function viewRegisVendedor(){
        return view('user.register_vendedor');
    }
}
