<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $buscar = trim( $request->get('buscar_texto'));
        $proveedores =DB::table('proveedors')->select('id','nombre_proveedor',
        'rtn_proveedor','telefono_proveedor','direccion_proveedor','contacto_proveedor','telefono_contacto_proveedor')
        ->where('nombre_proveedor', 'like', '%'.$buscar.'%')
        ->orWhere('rtn_proveedor', 'LIKE', '%'. $buscar. '%')
        ->orWhere('contacto_proveedor', 'LIKE', '%'. $buscar. '%')
        ->orWhere('telefono_proveedor', 'LIKE', '%'. $buscar. '%')
        ->orWhere('telefono_contacto_proveedor', 'LIKE', '%'. $buscar. '%')
        ->paginate(5);
        return view('proveedor.proveedores_index', compact('proveedores', 'buscar'));// ESTAS 2 VARIABLES SON LAS QUE SE INICIALIZARON ARRIBA
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proveedor = Proveedor::all();
        return view('proveedor.proveedores_create', compact('proveedor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre_proveedor' => ['required', 'string','min:3', 'max:70'],
            'rtn_proveedor' => ['required', 'string','min:16', 'max:16'],
            'telefono_proveedor' => ['required', 'numeric','min:2', 'max:99999999'],
            'direccion_proveedor' => ['required', 'string','min:3', 'max:250'],
            'contacto_proveedor' => ['required', 'string','min:3', 'max:70'],
            'telefono_contacto_proveedor' => ['required', 'numeric','min:2', 'max:99999999'],
        ], [
            'nombre_proveedor.required' => '¡Debes ingresar tu nombre completo!',
            'nombre_proveedor.string' => '¡Debes ingresar tu nombre completo, solo se permiten letras!',
            'nombre_proveedor.min' => '¡Ingresa tu nombre completo, sin abreviaturas!',
            'nombre_proveedor.max' => '¡Has excedido el limite máximo de 70 letras!',

            'rtn_proveedor.required' => '¡Debes ingresar tu nombre completo!',
            'rtn_proveedor.string' => '¡Debes ingresar tu RTN, solo se permiten números separados por guión!',
            'rtn_proveedor.min' => '¡Has ingresado menos de 16 valores!',
            'rtn_proveedor.max' => '¡Has ingresado más de 16 valores!',

            'telefono_proveedor.required' => '¡Debes ingresar un número de teléfono!',
            'telefono_proveedor.numeric' => '¡Debes ingresar un teléfono, solo se permiten números!',
            'telefono_proveedor.min' => '¡Ingresa tu número un teléfono completo!',
            'telefono_proveedor.max' => '¡Ingresa tu número un teléfono completo, sin exceder el límite!',

            'direccion_proveedor.required' => '¡Debes ingresar tu dirección!',
            'direccion_proveedor.string' => '¡Debes ingresar tu dirección, verifica la información!',
            'direccion_proveedor.min' => '¡Ingresa tu dirección completa, sin abreviaturas!',
            'direccion_proveedor.max' => '¡Has excedido el limite máximo de 250 letras!',

            'contacto_proveedor.required' => '¡Debes ingresar tu nombre completo!',
            'contacto_proveedor.string' => '¡Debes ingresar tu nombre completo, solo se permiten letras!',
            'contacto_proveedor.min' => '¡Ingresa tu nombre completo, sin abreviaturas!',
            'contacto_proveedor.max' => '¡Has excedido el limite máximo de 70 letras!',

            'telefono_contacto_proveedor.required' => '¡Debes ingresar un número de teléfono!',
            'telefono_contacto_proveedor.numeric' => '¡Debes ingresar un teléfono, solo se permiten números!',
            'telefono_contacto_proveedor.min' => '¡Ingresa tu número un teléfono completo!',
            'telefono_contacto_proveedor.max' => '¡Ingresa tu número un teléfono completo, sin exceder el límite!',
        ]);

        $proveedor = new Proveedor();
        $proveedor->nombre_proveedor = $request->input('nombre_proveedor');
        $proveedor->rtn_proveedor = $request->input('rtn_proveedor');
        $proveedor->telefono_proveedor = $request->input('telefono_proveedor');
        $proveedor->direccion_proveedor = $request->input('direccion_proveedor');
        $proveedor->contacto_proveedor = $request->input('contacto_proveedor');
        $proveedor->telefono_contacto_proveedor = $request->input('telefono_contacto_proveedor');
        $proveedor->save();
        return redirect()->route('proveedor.index')->with('realizado', '¡El proveedor ha sido creado con exito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        return view("proveedor.proveedores_show")->with("proveedor", $proveedor);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proveedor=Proveedor::FindOrFail($id);
        return view('proveedor.proveedores_edit', compact('proveedor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nombre_proveedor' => ['required', 'string','min:3', 'max:70'],
            'rtn_proveedor' => ['required', 'string','min:16', 'max:16'],
            'telefono_proveedor' => ['required', 'numeric','min:2', 'max:99999999'],
            'direccion_proveedor' => ['required', 'string','min:3', 'max:250'],
            'contacto_proveedor' => ['required', 'string','min:3', 'max:70'],
            'telefono_contacto_proveedor' => ['required', 'numeric','min:2', 'max:99999999'],
        ], [
            'nombre_proveedor.required' => '¡Debes ingresar el nombre de la empresa!',
            'nombre_proveedor.string' => '¡Debes ingresar el nombre completo de la empresa, solo se permiten letras!',
            'nombre_proveedor.min' => '¡Ingresa el nombre completo de la empresa, sin abreviaturas!',
            'nombre_proveedor.max' => '¡Has excedido el limite máximo de 70 letras!',

            'rtn_proveedor.required' => '¡Debes ingresar el RTN!',
            'rtn_proveedor.string' => '¡Debes ingresar el RTN, solo se permiten números separados por guión!',
            'rtn_proveedor.min' => '¡Has ingresado menos de 16 valores!',
            'rtn_proveedor.max' => '¡Has ingresado más de 16 valores!',

            'telefono_proveedor.required' => '¡Debes ingresar un número de teléfono para la empresa!',
            'telefono_proveedor.numeric' => '¡Debes ingresar un teléfono, solo se permiten números!',
            'telefono_proveedor.min' => '¡Ingresa tu número un teléfono completo!',
            'telefono_proveedor.max' => '¡Ingresa tu número un teléfono completo, sin exceder el límite!',

            'direccion_proveedor.required' => '¡Debes ingresar la dirección de la empresa!',
            'direccion_proveedor.string' => '¡Debes ingresar la dirección, verifica la información!',
            'direccion_proveedor.min' => '¡Ingresa tu dirección completa, sin abreviaturas!',
            'direccion_proveedor.max' => '¡Has excedido el limite máximo de 250 letras!',

            'contacto_proveedor.required' => '¡Debes ingresar tu nombre completo!',
            'contacto_proveedor.string' => '¡Debes ingresar tu nombre completo, solo se permiten letras!',
            'contacto_proveedor.min' => '¡Ingresa tu nombre completo, sin abreviaturas!',
            'contacto_proveedor.max' => '¡Has excedido el limite máximo de 70 letras!',

            'telefono_contacto_proveedor.required' => '¡Debes ingresar un número de teléfono!',
            'telefono_contacto_proveedor.numeric' => '¡Debes ingresar un teléfono, solo se permiten números!',
            'telefono_contacto_proveedor.min' => '¡Ingresa tu número un teléfono completo!',
            'telefono_contacto_proveedor.max' => '¡Ingresa tu número un teléfono completo, sin exceder el límite!',
        ]);

        $proveedor=Proveedor::findOrfail($id);
        $proveedor->nombre_proveedor =$request->input('nombre_proveedor');
        $proveedor->rtn_proveedor = $request->input('rtn_proveedor');
        $proveedor->telefono_proveedor = $request->input('telefono_proveedor');
        $proveedor->direccion_proveedor = $request->input('direccion_proveedor');
        $proveedor->contacto_proveedor = $request->input('contacto_proveedor');
        $proveedor->telefono_contacto_proveedor = $request->input('telefono_contacto_proveedor');

        $proveedor->save();
        return redirect()->route("proveedor.index")->with("realizado", "Se editó exitosamente el proveedor");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proveedor = Proveedor::find($id);

        if ($proveedor->compra()->exists()) {
            return redirect()->route('proveedor.index')->with("error", "No se puede eliminar el proveedor porque tiene compras asociadas.");
        }

        Proveedor::destroy($id);
        return redirect()->route('proveedor.index')->with("error", "Se eliminó exitosamente el proveedor.");
    }


}
