<?php

namespace App\Http\Controllers;

use App\Models\Producto  ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $buscar = trim( $request->get('buscar_producto'));
        $productos=DB::table('productos')->select('id', 'descripcion', 'codigo', 'existencia', 'prec_venta',
         'categoria', 'impuesto')->where('descripcion', 'like', '%'.$buscar.'%')
         ->Where('descripcion', 'LIKE', '%'. $buscar. '%')
         ->orWhere('categoria', 'LIKE', '%'. $buscar. '%')
         ->orWhere('codigo', 'LIKE', '%'. $buscar. '%')->paginate(10);
        return view('producto.producto_index', compact('productos', 'buscar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('producto.productos_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $crearprod = new Producto();

        $crearprod->descripcion = $request->input('descripcion');
        $crearprod->codigo = $request->input('codigo');
        $crearprod->existencia = $request->input('existencia');
        $crearprod->prec_venta = $request->input('prec_venta');
        $crearprod->categoria = $request->input('categoria');
        $crearprod->impuesto = $request->input('impuesto');
        //$crearprod->imagen_producto = $request->input('imagen_producto');
        if($request->hasFile('imagen_producto')){
            $imagen = $request->file('imagen_producto');
            $extention = $imagen->getClientOriginalExtension();
            $filname = time().'.'.$extention;
            $imagen->move('imagenes/', $filname);
            $crearprod->imagen_producto = $filname;
        }

        $crearprod->save();

        return redirect()->route('productos.index')->with('realizado', '¡El producto ha sido creado con exito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $verproducto = Producto::find($id);
        return view('producto.productos_show', compact('verproducto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    // Editar Producto
    public function edit($id)
    {
    $producto = Producto::findOrFail($id);
     return view('producto.productos_update')->with('producto',$producto);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */

     //Guardar Producto Editado
    public function update(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);

        //Validar

      /* $request ->validate([
            'descripcion'=>'required|alpha',
            'codigo'=>'required|alpha|numeric',
            'existencia'=>'alpha',
            'prec_venta'=>'numeric',
            'categoria'=>'alpha',
            'impuesto'=>'numeric'
        ]);*/

        //Formulario
        $producto -> descripcion=$request->input('descripcion');
        $producto -> codigo=$request->input('codigo');
        $producto -> existencia=$request->input('existencia');
        $producto -> prec_venta=$request->input('prec_venta');
        $producto -> categoria=$request->input('categoria');
        $producto -> impuesto=$request->input('impuesto');

       //Salvamos
        $creado = $producto->save();
        if($creado){
           return redirect()->route('productos.index')
           ->with('mensaje','El producto fue modificado exitosamente.');
          }//fin if
         else{

        }//fin else
    }


    /**
     * Remove the specified resource from storage.
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        Producto::destroy($id);
        return redirect()->route('productos.index');
    }



    public function index_inventario(Request $request)
    {
        $buscar = trim( $request->get('buscar_producto'));
        $productos=DB::table('productos')->select('id', 'descripcion', 'codigo', 'existencia', 'prec_venta',
         'categoria', 'impuesto')->where('descripcion', 'like', '%'.$buscar.'%')
         ->Where('descripcion', 'LIKE', '%'. $buscar. '%')
         ->orWhere('categoria', 'LIKE', '%'. $buscar. '%')
         ->orWhere('codigo', 'LIKE', '%'. $buscar. '%')->paginate(10);
        return view('Inventario.Inventario_index', compact('productos', 'buscar'));
    }
}
