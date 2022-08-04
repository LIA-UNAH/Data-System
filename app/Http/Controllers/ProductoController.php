<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
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
        $productos = Producto::paginate(10);
        return view('producto.productos_index')->with('productos', $productos);
    }

    public function search(Request $request){
        $texto =trim($request->get('busqueda'));
        $productos = Producto::where('nombre', 'like', '%'.$texto.'%')->paginate(10);
        return view('producto/productos_index')->with('productos', $productos);
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
        $request ->validate([
            'nombre' => ['required', 'string', 'min:5', 'max:80'],
            'descripcion' => ['required', 'string', 'min:5', 'max:80'],
            'codigo'=>  ['required', 'string', 'min:5', 'max:9'],
            'existencia' =>  ['numeric'],
            'prec_venta'=>  ['required', 'numeric', 'min:0'],
            'prec_compra'=>  ['required', 'numeric', 'min:0'],
            'categoria'=>  ['required', 'string', 'min:5', 'max:80'],
            'imagen_producto' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ],[
            'nombre.required' => '¡Debes ingresar nombre!',
            'nombre.string' => '¡Debes ingresar un nombre, verifica la información!',
            'nombre.min' => '¡Debes ingresar un minimo de 5 letras!',
            'nombre.max' => '¡Has excedido el limite máximo de 80 letras!',

            'descripcion.required' => '¡Debes ingresar una descripción!',
            'descripcion.string' => '¡Debes ingresar una descripción, verifica la información!',
            'descripcion.min' => '¡Debes ingresar un minimo de 5 letras!',
            'descripcion.max' => '¡Has excedido el limite máximo de 80 letras!',

            'codigo.required' => '¡Debes ingresar un código!',
            'codigo.string' => '¡Debes ingresar un código, verifica la información!',
            'codigo.min' => '¡Debes ingresar al menos 5 dígitos!',
            'codigo.max' => '¡Has excedido el limite máximo de 9 dígitos!',
            'codigo.unique' => '¡Debes ingresar un código diferente!',

            'existencia.numeric' => '¡Solo se permiten números!',

            'prec_venta_fin.numeric' => '¡Solo se permiten números!',
            'prec_venta_fin.required' => '¡Debes ingresar un precio de venta!',
            'prec_venta_fin.min' => '¡Debes ingresar un precio de venta mínimo de 0!',

            'prec_venta_may.numeric' => '¡Solo se permiten números!',
            'prec_venta_may.required' => '¡Debes ingresar un precio de venta!',
            'prec_venta_may.min' => '¡Debes ingresar un precio de venta mínimo de 0!',

            'prec_compra.numeric' => '¡Solo se permiten números!',
            'prec_compra.required' => '¡Debes ingresar un precio de compra!',
            'prec_compra.min' => '¡Debes ingresar un precio de compra mínimo de 0!',

            'imagen_producto.required' => '¡Debes cargar una imagen!',
            'imagen_producto.image' => '¡Debes seleccionar una imagen!',
            'imagen_producto.mimes' => '¡Debes seleccionar una imagen en el formato correcto!'
        ]);

        $crearprod = new Producto();

        $crearprod->nombre = $request->input('nombre');
        $crearprod->modelo = $request->input('modelo');
        $crearprod->descripcion = $request->input('descripcion');
        $crearprod->codigo = $request->input('codigo');
        $crearprod->existencia = $request->input('existencia');
        $crearprod->prec_compra = $request->input('prec_compra');
        $crearprod->prec_venta_fin = $request->input('prec_venta_fin');
        $crearprod->prec_venta_may = $request->input('prec_venta_may');
        $crearprod->id_categoria = $request->input('id_categoria');
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
     return view('producto.productos_edit')->with('producto',$producto);
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

            'nombre' => ['required', 'string', 'min:5', 'max:80'],
            'descripcion' => ['required', 'string', 'min:5', 'max:80'],
            'codigo'=>  ['required', 'string', 'min:5', 'max:9'],
            'existencia' =>  ['numeric'],
            'prec_venta'=>  ['required', 'numeric', 'min:0'],
            'prec_compra'=>  ['required', 'numeric', 'min:0'],
            'categoria'=>  ['required', 'string', 'min:5', 'max:80'],
            'imagen_producto' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ],[

            'nombre.required' => '¡Debes ingresar nombre!',
            'nombre.string' => '¡Debes ingresar un nombre, verifica la información!',
            'nombre.min' => '¡Debes ingresar un minimo de 5 letras!',
            'nombre.max' => '¡Has excedido el limite máximo de 80 letras!',

            'descripcion.required' => '¡Debes ingresar una descripción!',
            'descripcion.string' => '¡Debes ingresar una descripción, verifica la información!',
            'descripcion.min' => '¡Debes ingresar un minimo de 5 letras!',
            'descripcion.max' => '¡Has excedido el limite máximo de 80 letras!',

            'codigo.required' => '¡Debes ingresar un código!',
            'codigo.string' => '¡Debes ingresar un código, verifica la información!',
            'codigo.min' => '¡Debes ingresar al menos 5 dígitos!',
            'codigo.max' => '¡Has excedido el limite máximo de 9 dígitos!',
            'codigo.unique' => '¡Debes ingresar un código diferente!',

            'existencia.numeric' => '¡Solo se permiten números!',

            'prec_venta.numeric' => '¡Solo se permiten números!',
            'prec_venta.required' => '¡Debes ingresar un precio de venta!',
            'prec_venta.min' => '¡Debes ingresar un precio de venta mínimo de 0!',


            'prec_compra.numeric' => '¡Solo se permiten números!',
            'prec_compra.required' => '¡Debes ingresar un precio de compra!',
            'prec_compra.min' => '¡Debes ingresar un precio de compra mínimo de 0!',

            'categoria.required' => '¡Debes ingresar una categoría!',
            'categoria.string' => '¡Debes ingresar una categoría, verifica la información!',
            'categoria.min' => '¡Debes ingresar un minimo de 5 letras!',
            'categoria.max' => '¡Has excedido el limite máximo de 80 letras!',

            'imagen_producto.required' => '¡Debes cargar una imagen!',
            'imagen_producto.image' => '¡Debes seleccionar una imagen!',
            'imagen_producto.mimes' => '¡Debes seleccionar una imagen en el formato correcto!'
        ]);

        //Formulario
        $producto -> nombre=$request->input('nombre');
        $producto -> descripcion=$request->input('descripcion');
        $producto -> codigo=$request->input('codigo');
        $producto -> existencia=$request->input('existencia');
        $producto -> prec_compra=$request->input('prec_compra');
        $producto -> prec_venta=$request->input('prec_venta');
        $producto -> categoria=$request->input('categoria');
            //edit imagen del producto
            if($request->hasFile('imagen_producto'))
        {
            $ubicacion = 'imagenes/'.$producto->imagen_producto;
            if(File::exists($ubicacion)){
                File::delete($ubicacion);
            }
            $imagen = $request->file('imagen_producto');
            $extention = $imagen->getClientOriginalExtension();
            $filname = time().'.'.$extention;
            $imagen->move('imagenes/', $filname);
            $producto->imagen_producto = $filname;
        }
        //Salvamos
        $producto->update();

        return redirect()->route('productos.index')->with('realizado', '¡El producto ha sido actualizado con exito!');
    }


    /**
     * Remove the specified resource from storage.
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        Producto::destroy($id);
        return redirect()->route('productos.index')
        ->with('error','El producto fue eliminado exitosamente.');
    }


    public function index_inventario(Request $request)
    {
        $buscar = trim( $request->get('buscar_producto'));
        $productos=DB::table('productos')->select('id', 'modelo','nombre','descripcion', 'codigo', 'existencia', 'prec_venta_may',
        'prec_venta_fin','prec_compra','id_categoria')->where('descripcion', 'like', '%'.$buscar.'%')
         ->Where('nombre', 'LIKE', '%'. $buscar. '%')
         ->orWhere('descripcion', 'LIKE', '%'. $buscar. '%')
         ->orWhere('codigo', 'LIKE', '%'. $buscar. '%')->paginate(5);
        return view('Inventario.Inventario_index', compact('productos', 'buscar'));
    }
}
