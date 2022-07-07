<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produc = Producto::select('id','descripcion', 'codigo',
        'existencia',
        'prec_venta',
        'categoria',
        'impuesto')->paginate(10);
        return view('producto.producto_index')->with('productos', $produc);
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
        

        $crearprod->save();

        return redirect()->route('productos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
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

        $request ->validate([
            'descripcion'=>'required|alpha',
            'codigo'=>'required|alpha|numeric',
            'existencia'=>'alpha',
            'prec_venta'=>'numeric',
            'categoria'=>'alpha',
            'impuesto'=>'numeric'
        ]);

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
            return redirect()->route('producto.producto.index')
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
    
    public function destroy(Producto $producto)
    {
        //
    }
}
