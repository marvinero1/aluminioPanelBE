<?php

namespace App\Http\Controllers;

use App\Producto;
use App\Categoria;
use App\subcategoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use File;
use DB;
use Image;
use Session;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getProducto(){
        return Producto::latest()->get();
    }

    public function getProductoImportadora(Request $request)
    {
        $nombre = $request->get('buscarpor');

        $producto = Producto::where('nombre','like',"%$nombre%")
        ->where('producto.importadora', '=', Auth::user()->name)->paginate(10);
         
        //dd( $producto );
        return view('pedidoRealizado.index', compact('pedidoRealizado'));
    }

    // public function getProductoImportadora(){
    //     $nombre = $request->get('buscarpor');

    //     $producto = Producto::where('nombre','like',"%$nombre%")
    //     ->where('productos.importadora', '=', '')->get();
    //     $producto = Producto::where('nombre','like',"%$nombre%")
    //     ->join('contacts', 'productos.importadora', '=', 'contacts.user_id')
    //     ->join('orders', 'productos.id', '=', 'orders.user_id')
    //     ->select('productos.*', 'contacts.phone', 'orders.price')
    //     ->get();
         
    //     dd( $producto );
    //     return view('mi-pedido.index', compact('producto'));
    // }

    public function showProducto($id){
        return Producto::findOrFail($id);
    }

    public function getProductoNovedad(){
        return Producto::all()->where('novedad', 'true');
    }

    public function getMyProducts(Request $request, $id){

        $producto = Producto::where('productos.user_id', '=', $id)->get();

        return response()->json($producto, 200);
    }


    public function getMyProducto(Request $request, $id){

        $producto = Producto::findOrFail($id);

        return response()->json($producto, 200);
    }

     public function misProductos(Request $request){
        $nombre = $request->get('buscarpor');
         
        $producto = Producto::where('nombre','like',"%$nombre%")->
        where('user_id', '=' ,Auth::user()->id)->paginate(10);
        return view('productos.my-products', compact('producto'));
     }
   

    public function index(Request $request)
    {
        $nombre = $request->get('buscarpor');
        $categoria = Categoria::all();
        $subcategoria = subcategoria::all();
        
        $producto = Producto::where('nombre','like',"%$nombre%")->latest()->paginate(10);
        
        return view('productos.index', compact('producto','categoria','subcategoria'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $categoria = Categoria::all();
        $subcategoria = subcategoria::all();

        return view('productos.create', compact('categoria','subcategoria'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $imagen = null;
        $mensaje= 'Producto Registrado correctamente';
        //dd($request);
        // $data = $request->imagen;
        // dd($data);

        // $request->validate([
        //     'nombre' => 'required',
        //     'estado' => 'required',
        //     'imagen' => 'nullable|image',
        //     'precio' => 'required',
        //     'medida' => 'required',
        //     'tipo_medida' => 'required',
        //     'puntuacion'  => 'nullable',
        //     'descripcion'  => 'nullable',
        //     'importadora' => 'required',
        //     'categorias_id' => 'required',
        //     'subcategorias_id' => 'required',
        // ]);
        
        DB::beginTransaction();
        
        $requestData = $request->all();
        $color = $requestData['color'];
        $disponibilidad = $requestData['disponibilidad'];
        $requestData['disponibilidad'] = implode(', ', $disponibilidad);
        $requestData['color'] = implode(', ', $color);

     
        //dd($disponibilidad);
        
        if($request->imagen != null){
           
            $data = $request->imagen;
        
            $file = file_get_contents($request->imagen);
            $info = $data->getClientOriginalExtension(); 
            $extension = explode('images/productos', mime_content_type('images/productos'))[0];
            $image = Image::make($file);
            $fileName = rand(0,10)."-".date('his')."-".rand(0,10).".".$info; 
            $path  = 'images/productos';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $img = $path.'/'.$fileName; 
             
            if($image->save($img)) {
                $requestData['imagen'] = $img;
               
                $mensaje = "Producto Registrado correctamente";    
            }else{
                $mensaje = "Error al guardar la imagen";
            }
        }else{
            $url = "GOASDS";
            $requestData['imagen'] = $url;
            $mensaje = "Producto Registrado Correctamente Sin Imagen";
        }
        $producto = Producto::create($requestData);

        if($producto){
            DB::commit();
        }else{
            DB::rollback();
        }

        Session::flash('message',$mensaje);
            return redirect()->route('productos.index'); 

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto = Producto::findOrFail($id);
        $categoria = Categoria::all();

        return view('productos.show', compact('producto','categoria')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = Producto::find($id);

        $producto->delete();

        Session::flash('message','Producto eliminado exitosamente!');
        return redirect()->route('productos.index'); 
    }

    public function addNovedad(Request $request, $id){ 
        
        $producto = Producto::find($id);

        $request->validate([
            'novedad' => 'required',
        ]);

        $producto->novedad = $request->get('novedad');
        
        $producto->update(); 

        Session::flash('message','Novedad Agregada Exisitosamente!');
        return redirect()->route('novedad.index');
    }
}
