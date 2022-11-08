<?php

namespace App\Http\Controllers;

use App\Models\Reparacion;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReparacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reparaciones = Reparacion::select('reparacions.id','reparacions.fecha_entrada','reparacions.fecha_salida',
            'reparacions.costo_reparacion', 'reparacions.hora_salida','reparacions.marca','reparacions.modelo','a.name as cliente','a.telephone as telefono')
            ->join("users as a", "reparacions.cliente_id", "=", "a.id")
            ->orderBy('fecha_salida','ASC')
            ->orderBy('hora_salida','ASC')
            ->paginate(5);

        return view('reparacion.reparaciones_index')->with('reparaciones', $reparaciones);
    }

    //H49 - Recargar y buscar reparación
    public function search(Request $request){
        $texto =trim($request->get('busqueda'));
        $reparaciones = DB::table('reparacions')
            ->join('users', 'users.id', '=', 'reparacions.cliente_id')
            ->select('reparacions.id','reparacions.fecha_entrada','reparacions.fecha_salida', 'reparacions.marca',
                'reparacions.modelo', 'reparacions.costo_reparacion', 'reparacions.hora_salida', 'users.name as cliente', 'users.telephone as telefono')
            ->Where('name', 'LIKE', '%'. $texto. '%')
            ->orWhere('fecha_entrada', 'LIKE', '%'. $texto. '%')
            ->orWhere('fecha_salida', 'LIKE', '%'. $texto. '%')
            ->orWhere('hora_salida', 'LIKE', '%'. $texto. '%')
            ->orderBy('fecha_salida','ASC')
            ->orderBy('hora_salida','ASC')
            ->paginate(5);

        return view('reparacion.reparaciones_index', compact('reparaciones', 'texto'));
    }

    //H48 - Registrar reparación
    public function create()
    {
        $usuarios = User::where('type', '=', 'cliente')->get();
        return view('reparacion.reparaciones_create')->with('usuarios', $usuarios);
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
            'fecha_entrada' => ['required'],
            'fecha_salida' => ['required'],
            'hora_salida' => ['required', 'string'],
            'marca' => ['required', 'string', 'min:2', 'max:40'],
            'modelo' => ['required', 'string', 'max:40'],
            'descripcion' => ['required', 'string', 'min:2', 'max:255'],
            'costo_reparacion'=>  ['required','numeric','min:1','max:999999999'],
            'cliente_id' => ['required'],
        ], [
            'fecha_entrada.required' => '¡Debes seleccionar una fecha!',
            'fecha_salida.required' => '¡Debes seleccionar una fecha de entrega!',

            'hora_salida.required' => '¡Debes ingresar una hora de entrega!',
            'hora_salida.string' => '¡Debes ingresar una hora correcta, verifica la información!',

            'marca.required' => '¡Debes ingresar la marca!',
            'marca.string' => '¡Debes ingresar una marca, verifica la información!',
            'marca.min' => '¡Debes ingresar un minimo de 2 letras!',
            'marca.max' => '¡Has excedido el limite máximo de 40 letras!',

            'modelo.required' => '¡Debes ingresar el modelo!',
            'modelo.string' => '¡Debes ingresar el modelo, verifica la información!',
            'modelo.max' => '¡Has excedido el limite máximo de 40 letras!',

            'descripcion.required' => '¡Debes ingresar una descripción!',
            'descripcion.string' => '¡Debes ingresar una descripción, verifica la información!',
            'descripcion.min' => '¡Debes ingresar un minimo de 3 letras!',
            'descripcion.max' => '¡Has excedido el limite máximo de 255 letras!',

            'costo_reparacion.numeric' => '¡Solo se permiten números!',
            'costo_reparacion.required' => '¡Debes especificar un costo de reparación!',
            'costo_reparacion.min' => '¡El costo de la reparación debe ser superior a L. 0.00!',
            'costo_reparacion.max' => '¡El costo de la reparación es muy excesivo!',

            'cliente_id.required' => '¡Debes seleccionar un cliente!',
        ]);

        $input = $request->all();

        Reparacion::create($input);
        return redirect()->route("reparaciones.index")->with("exito", "Se creó exitosamente la reparación");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reparacion = Reparacion::find($id);
        return view('reparacion.reparaciones_show', compact('reparacion'));
    }

    //H45 - Editar reparaciones
    public function edit(Request $request, $id)
    {
        $reparacion = Reparacion::findOrFail($id);
        $usuarios = User::all();
        return view('reparacion.reparaciones_edit', compact('usuarios'))->with('reparacion', $reparacion);
    }

    public function update(Request $request, $id)
    {
        $reparaciones = Reparacion::findOrFail($id);

        $this->validate($request, [
            'fecha_entrada' => ['required'],
            'fecha_salida' => ['required'],
            'hora_salida' => ['required', 'string', 'min:8', 'max:8'],
            'marca' => ['required', 'string', 'min:2', 'max:40'],
            'modelo' => ['required', 'string', 'max:40'],
            'descripcion' => ['required', 'string', 'min:2', 'max:255'],
            'costo_reparacion'=>  ['required','numeric','min:1','max:999999999'],
            'cliente_id' => ['required'],
        ], [
            'fecha_entrada.required' => '¡Debes seleccionar una fecha!',
            'fecha_salida.required' => '¡Debes seleccionar una fecha de entrega!',

            'hora_salida.required' => '¡Debes ingresar una hora de entrega!',
            'hora_salida.string' => '¡Debes ingresar una hora correcta, verifica la información!',
            'hora_salida.min' => '¡Verifica que sea el formato de hora correcto, ejemplo: 02:00 PM!',
            'hora_salida.max' => '¡Verifica que sea el formato de hora correcto, ejemplo: 05:00 PM!',

            'marca.required' => '¡Debes ingresar la marca!',
            'marca.string' => '¡Debes ingresar una marca, verifica la información!',
            'marca.min' => '¡Debes ingresar un minimo de 2 letras!',
            'marca.max' => '¡Has excedido el limite máximo de 40 letras!',

            'modelo.required' => '¡Debes ingresar el modelo!',
            'modelo.string' => '¡Debes ingresar el modelo, verifica la información!',
            'modelo.max' => '¡Has excedido el limite máximo de 40 letras!',

            'descripcion.required' => '¡Debes ingresar una descripción!',
            'descripcion.string' => '¡Debes ingresar una descripción, verifica la información!',
            'descripcion.min' => '¡Debes ingresar un minimo de 3 letras!',
            'descripcion.max' => '¡Has excedido el limite máximo de 255 letras!',

            'costo_reparacion.numeric' => '¡Solo se permiten números!',
            'costo_reparacion.required' => '¡Debes especificar un costo de reparación!',
            'costo_reparacion.min' => '¡El costo de la reparación debe ser superior a L. 0.00!',
            'costo_reparacion.max' => '¡El costo de la reparación es muy excesivo!',

            'cliente_id.required' => '¡Debes seleccionar un cliente!',
        ]);;

        $reparaciones -> fecha_entrada=$request->input('fecha_entrada');
        $reparaciones -> fecha_salida=$request->input('fecha_salida');
        $reparaciones -> hora_salida=$request->input('hora_salida');
        $reparaciones -> marca=$request->input('marca');
        $reparaciones -> modelo=$request->input('modelo');
        $reparaciones -> descripcion=$request->input('descripcion');
        $reparaciones -> costo_reparacion=$request->input('costo_reparacion');
        $reparaciones -> cliente_id=$request->input('cliente_id');

        $reparaciones->update();
        return redirect()->route('reparaciones.index')->with('exito', '¡La reparación ha sido actualizada con exito!');
    }

    //H46 - Eliminar reparación
    public function destroy(Reparacion $reparacion){
        $reparacion->delete();
        return redirect()->route("reparaciones.index")->with("error", "Se eliminó exitosamente la reparación.");
    }
}
