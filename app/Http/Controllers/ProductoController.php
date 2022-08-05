<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto  ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;


class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $productos = Producto::paginate(5);
        return view('producto.productos_index')->with('productos', $productos);
    }

    public function search(Request $request){
        $texto =trim($request->get('busqueda'));
        $productos = Producto::where('nombre', 'like', '%'.$texto.'%')->paginate(5);
        return view('producto/productos_index')->with('productos', $productos);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('producto.productos_create', compact('categorias'));
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
            'codigo'=>  ['required', 'string', 'min:15', 'max:15','unique:productos'],
            'marca' => ['required', 'string', 'min:5', 'max:40'],
            'modelo' => ['required', 'string', 'min:5', 'max:40'],
            'descripcion' => ['required', 'string', 'min:5', 'max:255'],
            'existencia' =>  ['numeric', 'min:0'],
            'prec_compra'=>  ['required', 'numeric', 'min:0', 'max:99999999'],
            'prec_venta_may'=>  ['required', 'numeric', ],
            'prec_venta_fin'=>  ['required', 'numeric'],
            'id_categoria'=>  ['required'],
            'imagen_producto' => 'required|image|mimes:jpg,png,jpeg,gif,svg,webp|max:2048'
        ],[
            'codigo.required' => '¡Debes ingresar un código!',
            'codigo.string' => '¡Debes ingresar un código, verifica la información!',
            'codigo.min' => '¡Debes ingresar 15 dígitos!',
            'codigo.max' => '¡Has excedido el limite máximo es de 15 dígitos!',
            'codigo.unique' => '¡Debes ingresar un código diferente!',

            'marca.required' => '¡Debes ingresar la marca!',
            'marca.string' => '¡Debes ingresar una marca, verifica la información!',
            'marca.min' => '¡Debes ingresar un minimo de 5 letras!',
            'marca.max' => '¡Has excedido el limite máximo de 40 letras!',

            'modelo.required' => '¡Debes ingresar el modelo!',
            'modelo.string' => '¡Debes ingresar el modelo, verifica la información!',
            'modelo.min' => '¡Debes ingresar un minimo de 5 letras!',
            'modelo.max' => '¡Has excedido el limite máximo de 40 letras!',

            'descripcion.required' => '¡Debes ingresar una descripción!',
            'descripcion.string' => '¡Debes ingresar una descripción, verifica la información!',
            'descripcion.min' => '¡Debes ingresar un minimo de 5 letras!',
            'descripcion.max' => '¡Has excedido el limite máximo de 255 letras!',

            'existencia.numeric' => '¡Solo se permite ingresar números!',
            'existencia.min' => '¡No se permite el ingreso de valores negativos!',

            'prec_compra.numeric' => '¡Solo se permiten números!',
            'prec_compra.required' => '¡Debes especificar un precio de compra!',
            'prec_compra.min' => '¡Debes especificar un precio de compra mayor que L. 0.00!',
            'prec_venta_fin.max' => '¡Debes especificar un precio de compra, superior a los precios de venta!',

            'prec_venta_may.numeric' => '¡Solo se permiten números!',
            'prec_venta_may.required' => '¡Debes especificar un precio de venta por mayor!',

            'prec_venta_fin.numeric' => '¡Solo se permiten números!',
            'prec_venta_fin.required' => '¡Debes especificar un precio de venta final!',

            'categoria.required' => '¡Debes seleccionar una categoria!',

            'imagen_producto.required' => '¡Debes cargar una imagen!',
            'imagen_producto.image' => '¡Debes seleccionar una imagen!',
            'imagen_producto.mimes' => '¡Debes seleccionar una imagen en el formato correcto!'
        ]);

        $crearprod = new Producto();
        $crearprod->codigo = $request->input('codigo');
        $crearprod->marca = $request->input('marca');
        $crearprod->modelo = $request->input('modelo');
        $crearprod->descripcion = $request->input('descripcion');
        $crearprod->existencia = $request->input('existencia');
        $crearprod->prec_compra = $request->input('prec_compra');
        $crearprod->prec_venta_may = $request->input('prec_venta_may');
        $crearprod->prec_venta_fin = $request->input('prec_venta_fin');
        $crearprod->id_categoria = $request->input('id_categoria');

        if($request->hasFile('imagen_producto')){
            $imagen = $request->file('imagen_producto');
            $extention = $imagen->getClientOriginalExtension();
            $filname = time().'.'.$extention;
            $imagen->move('images/products', $filname);
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
    public function update(Request $request, $id)
    {
        $productos = Producto::findOrFail($id);
        $request ->validate([
            'codigo'=>  ['required', 'string', 'min:15', 'max:15',Rule::unique('productos')->ignore($productos->id)],
            'marca' => ['required', 'string', 'min:5', 'max:40'],
            'modelo' => ['required', 'string', 'min:5', 'max:40'],
            'descripcion' => ['required', 'string', 'min:5', 'max:255'],
            'existencia' =>  ['numeric', 'min:0'],
            'prec_compra'=>  ['required', 'numeric', 'min:0'],
            'prec_venta_may'=>  ['required', 'numeric', 'min:prec_compra'],
            'prec_venta_fin'=>  ['required', 'numeric', 'min:prec_venta_may'],
            'id_categoria'=>  ['required'],
            'imagen_producto' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ],[
            'codigo.required' => '¡Debes ingresar un código!',
            'codigo.string' => '¡Debes ingresar un código, verifica la información!',
            'codigo.min' => '¡Debes ingresar 15 dígitos!',
            'codigo.max' => '¡Has excedido el limite máximo es de 15 dígitos!',
            'codigo.unique' => '¡Debes ingresar un código diferente!',

            'marca.required' => '¡Debes ingresar la marca!',
            'marca.string' => '¡Debes ingresar una marca, verifica la información!',
            'marca.min' => '¡Debes ingresar un minimo de 5 letras!',
            'marca.max' => '¡Has excedido el limite máximo de 40 letras!',

            'modelo.required' => '¡Debes ingresar el modelo!',
            'modelo.string' => '¡Debes ingresar el modelo, verifica la información!',
            'modelo.min' => '¡Debes ingresar un minimo de 5 letras!',
            'modelo.max' => '¡Has excedido el limite máximo de 40 letras!',

            'descripcion.required' => '¡Debes ingresar una descripción!',
            'descripcion.string' => '¡Debes ingresar una descripción, verifica la información!',
            'descripcion.min' => '¡Debes ingresar un minimo de 5 letras!',
            'descripcion.max' => '¡Has excedido el limite máximo de 255 letras!',

            'existencia.numeric' => '¡Solo se permite ingresar números!',
            'existencia.min' => '¡No se permite el ingreso de valores negativos!',

            'prec_compra.numeric' => '¡Solo se permiten números!',
            'prec_compra.required' => '¡Debes especificar un precio de compra!',
            'prec_compra.min' => '¡Debes ingresar un precio de compra mínimo de L 0.00!',

            'prec_venta_may.numeric' => '¡Solo se permiten números!',
            'prec_venta_may.required' => '¡Debes especificar un precio de venta por mayor!',
            'prec_venta_may.min' => '¡El precio de venta al por mayor no debe ser menor que el de precio compra!',

            'prec_venta_fin.numeric' => '¡Solo se permiten números!',
            'prec_venta_fin.required' => '¡Debes especificar un precio de venta final!',
            'prec_venta_fin.min' => '¡El precio de venta al detalle no debe ser menor que el precio de mayorista!',

            'categoria.required' => '¡Debes seleccionar una categoria!',

            'imagen_producto.required' => '¡Debes cargar una imagen!',
            'imagen_producto.image' => '¡Debes seleccionar una imagen!',
            'imagen_producto.mimes' => '¡Debes seleccionar una imagen en el formato correcto!'


        ]);

        $productos -> codigo=$request->input('codigo');
        $productos -> marca=$request->input('marca');
        $productos -> modelo=$request->input('modelo');
        $productos -> descripcion=$request->input('descripcion');
        $productos -> existencia=$request->input('existencia');
        $productos -> prec_compra=$request->input('prec_compra');
        $productos -> prec_venta_may=$request->input('prec_venta_may');
        $productos -> prec_venta_fin=$request->input('prec_venta_fin');
        $productos -> id_categoria=$request->input('id_categoria');

        if($request->hasFile('imagen_producto')) {
            $ubicacion = 'imagenes/'.$productos->imagen_producto;
            if(File::exists($ubicacion)){
                File::delete($ubicacion);
            }
            $imagen = $request->file('imagen_producto');
            $extention = $imagen->getClientOriginalExtension();
            $filname = time().'.'.$extention;
            $imagen->move('imagenes/', $filname);
            $productos->imagen_producto = $filname;
        }
        //Salvamos
        $productos->update();

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
