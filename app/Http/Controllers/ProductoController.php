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
        $productos = DB::table('productos')
            ->join('categorias', 'categorias.id', '=', 'productos.id_categoria')
            ->select('productos.id','productos.codigo', 'productos.marca','productos.modelo','productos.descripcion',
                'productos.existencia', 'productos.prec_venta_may', 'productos.prec_venta_fin','productos.prec_compra','productos.id_categoria', 'categorias.name')
            ->paginate(5);
        return view('producto.productos_index')->with('productos', $productos);
    }

    public function search(Request $request){
        $texto =trim($request->get('busqueda'));
        $productos = DB::table('productos')
            ->join('categorias', 'categorias.id', '=', 'productos.id_categoria')
            ->select('productos.id','productos.codigo', 'productos.marca','productos.modelo','productos.descripcion',
                'productos.existencia', 'productos.prec_venta_may', 'productos.prec_venta_fin','productos.prec_compra','productos.id_categoria', 'categorias.name')
            ->Where('name', 'LIKE', '%'. $texto. '%')
            ->orWhere('codigo', 'LIKE', '%'. $texto. '%')
            ->orWhere('marca', 'LIKE', '%'. $texto. '%')
            ->orWhere('modelo', 'LIKE', '%'. $texto. '%')->paginate(5);
        return view('producto.productos_index', compact('productos', 'texto'));
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
        $prec_compra = intval($request['prec_compra']);
        $prec_venta_may = intval($request['prec_venta_may']);
        $prec_venta_fin = intval($request['prec_venta_fin']);

        $request ->validate([
            'codigo'=>  ['required', 'string', 'min:15', 'max:15','unique:productos'],
            'marca' => ['required', 'string', 'min:3', 'max:40'],
            'modelo' => ['required', 'string','min:3', 'max:40'],
            'descripcion' => ['required', 'string', 'min:5', 'max:255'],
            'existencia' =>  ['numeric', 'min:0'],
            'prec_compra'=>  ['required','numeric','min:1','max:'.$prec_venta_may],
            'prec_venta_may'=>  ['required', 'numeric','min:'.$prec_compra , 'max:'. $prec_venta_fin],
            'prec_venta_fin'=>  ['required', 'numeric', 'min:'.$prec_venta_may, 'max:999999999'],
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
            'descripcion.min' => '¡Debes ingresar un minimo de 3 letras!',
            'descripcion.max' => '¡Has excedido el limite máximo de 255 letras!',

            'existencia.numeric' => '¡Solo se permite ingresar números!',
            'existencia.min' => '¡No se permite el ingreso de valores negativos!',

            'prec_compra.numeric' => '¡Solo se permiten números!',
            'prec_compra.required' => '¡Debes especificar un precio de compra!',
            'prec_compra.min' => '¡El precio de compra debe ser superior a L. 0.00!',
            'prec_compra.max' => '¡El precio de compra debe ser inferior al precio de venta mayorista!',

            'prec_venta_may.numeric' => '¡Solo se permiten números!',
            'prec_venta_may.required' => '¡Debes especificar un precio de venta por mayor!',
            'prec_venta_may.min' => '¡El precio de venta debe ser superior que precio de compra!',
            'prec_venta_may.max' => '¡El precio de venta debe ser inferior que precio de venta al detalle!',

            'prec_venta_fin.numeric' => '¡Solo se permiten números!',
            'prec_venta_fin.required' => '¡Debes especificar un precio de venta final!',
            'prec_venta_fin.min' => '¡El precio de venta debe ser superior que precio de venta al por mayor!',
            'prec_venta_fin.max' => '¡El precio de venta debe ser inferior que L. 999,999,998.99!',

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

        if ($image = $request->file('imagen_producto')) {
            $destinationPath = 'images/products/';
            $file_name = $image->getClientOriginalName();
            $profileImage = $file_name ;
            $image->move($destinationPath, $profileImage);
            $crearprod['imagen_producto'] = "$profileImage";
        }else{
            unset($crearprod['imagen_producto']);
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
        $categorias = Categoria::all();
        return view('producto.productos_edit', compact('categorias'))->with('producto', $producto);
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
        $prec_compra = intval($request['prec_compra']);
        $prec_venta_may = intval($request['prec_venta_may']);
        $prec_venta_fin = intval($request['prec_venta_fin']);
        $request ->validate([
            'codigo'=>  ['required', 'string', 'min:15', 'max:15',Rule::unique('productos')->ignore($productos->id)],
            'marca' => ['required', 'string', 'min:3', 'max:40'],
            'modelo' => ['required', 'string', 'max:40'],
            'descripcion' => ['required', 'string', 'min:5', 'max:255'],
            'existencia' =>  ['numeric', 'min:0'],
            'prec_compra'=>  ['required','numeric','min:1','max:'.$prec_venta_may],
            'prec_venta_may'=>  ['required', 'numeric','min:'.$prec_compra , 'max:'. $prec_venta_fin],
            'prec_venta_fin'=>  ['required', 'numeric', 'min:'.$prec_venta_may, 'max:999999999'],
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
            'modelo.max' => '¡Has excedido el limite máximo de 40 letras!',

            'descripcion.required' => '¡Debes ingresar una descripción!',
            'descripcion.string' => '¡Debes ingresar una descripción, verifica la información!',
            'descripcion.min' => '¡Debes ingresar un minimo de 3 letras!',
            'descripcion.max' => '¡Has excedido el limite máximo de 255 letras!',

            'existencia.numeric' => '¡Solo se permite ingresar números!',
            'existencia.min' => '¡No se permite el ingreso de valores negativos!',

            'prec_compra.numeric' => '¡Solo se permiten números!',
            'prec_compra.required' => '¡Debes especificar un precio de compra!',
            'prec_compra.min' => '¡El precio de compra debe ser superior a L. 0.00!',
            'prec_compra.max' => '¡El precio de compra debe ser inferior al precio de venta mayorista!',

            'prec_venta_may.numeric' => '¡Solo se permiten números!',
            'prec_venta_may.required' => '¡Debes especificar un precio de venta por mayor!',
            'prec_venta_may.min' => '¡El precio de venta debe ser superior que precio de compra!',
            'prec_venta_may.max' => '¡El precio de venta debe ser inferior que precio de venta al detalle!',

            'prec_venta_fin.numeric' => '¡Solo se permiten números!',
            'prec_venta_fin.required' => '¡Debes especificar un precio de venta final!',
            'prec_venta_fin.min' => '¡El precio de venta debe ser superior que precio de venta al por mayor!',
            'prec_venta_fin.max' => '¡El precio de venta debe ser inferior que L. 999,999,998.99!',

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

        if ($image = $request->file('imagen_producto')) {
            $destinationPath = 'images/products/';
            $file_name = $image->getClientOriginalName();
            $profileImage = $file_name ;
            $image->move($destinationPath, $profileImage);
            $productos['imagen_producto'] = "$profileImage";
        }else{
            unset($productos['imagen_producto']);
        }

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
        return redirect()->route('productos.index')->with('error','El producto fue eliminado exitosamente.');
    }


    public function index_inventario(Request $request)
    {
        $buscar = trim( $request->get('buscar_producto'));
        $productos = DB::table('productos')
            ->join('categorias', 'categorias.id', '=', 'productos.id_categoria')
            ->select('productos.id','productos.codigo', 'productos.marca','productos.modelo','productos.descripcion',
                'productos.existencia', 'productos.prec_venta_may', 'productos.prec_venta_fin','productos.prec_compra','productos.id_categoria', 'categorias.name')
            ->Where('name', 'LIKE', '%'. $buscar. '%')
            ->orWhere('codigo', 'LIKE', '%'. $buscar. '%')
            ->orWhere('marca', 'LIKE', '%'. $buscar. '%')
            ->orWhere('modelo', 'LIKE', '%'. $buscar. '%')->paginate(5);

        return view('Inventario.Inventario_index', compact('productos', 'buscar'));
    }
}
