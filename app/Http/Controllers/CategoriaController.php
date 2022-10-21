<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = DB::table('categorias')->selectRaw('categorias.*,(SELECT COUNT(*) FROM productos WHERE productos.id_categoria = categorias.id) as produc')->paginate(3);
        return view('categoria/categorias_index')->with('categorias', $categorias);
    }

    public function search(Request $request){
        $texto =trim($request->get('busqueda'));
        $categorias = Categoria::where('name', 'like', '%'.$texto.'%')->paginate(3);
        return view('categoria/categorias_index')->with('categorias', $categorias);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categoria.categorias_create');
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
            'name' => ['required', 'string', 'min:2', 'max:20'],
            'description' => ['required', 'string', 'min:2', 'max:255'],
            'status' => ['required'],
        ], [
            'name.required' => '¡Debes ingresar el nombre de la categoria!',
            'name.string' => '¡Debes ingresar el nombre de la categoria, solo se permiten letras!',
            'name.min' => '¡Ingresa el nombre completo de la categoria, sin abreviaturas!',
            'name.max' => '¡Has excedido el limite máximo de 20 letras!',

            'description.required' => '¡Debes ingresar la descripción de la categoria!',
            'description.string' => '¡Debes ingresar la descripción, verifica la información!',
            'description.min' => '¡Ingresa la descripción completa, sin abreviaturas!',
            'description.max' => '¡Has excedido el limite máximo de 255 letras!',

            'status.required' => '¡Debes seleccionar un estado para la categoria!',
        ]);;

        $input = $request->all();
        Categoria::create($input);
        return redirect()->route("categorias.index")->with("exito", "Se creó exitosamente la categoria");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categoria = Categoria::findOrFail($id);
        return view("categoria.categorias_show")->with("categoria", $categoria);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria = Categoria::findOrFail($id);
        return view('categoria.categorias_edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $categorias = Categoria::findOrFail($id);

        $this->validate($request, [
            'name' => ['required', 'string', 'min:2', 'max:20', Rule::unique('categorias')->ignore($categorias->id),],
            'description' => ['required', 'string', 'min:2', 'max:255'],
            'status' => ['required'],
        ], [
            'name.required' => '¡Debes ingresar el nombre de la categoria!',
            'name.string' => '¡Debes ingresar el nombre de la categoria, solo se permiten letras!',
            'name.min' => '¡Ingresa el nombre completo de la categoria, sin abreviaturas!',
            'name.max' => '¡Has excedido el limite máximo de 20 letras!',

            'description.required' => '¡Debes ingresar la descripción de la categoria!',
            'description.string' => '¡Debes ingresar la descripción, verifica la información!',
            'description.min' => '¡Ingresa la descripción completa, sin abreviaturas!',
            'description.max' => '¡Has excedido el limite máximo de 255 letras!',

            'status.required' => '¡Debes seleccionar un estado para la categoria!',
        ]);;

        $input = $request->all();
        $categorias->update($input);

        return redirect()->route("categorias.index")->with("exito", "Se editó exitosamente la categoria");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return redirect()->route("categorias.index")->with("error", "Se eliminó exitosamente la categoria.");
    }

    public function cambioEstado(Categoria $categoria)
    {
        $categoria->delete();
        if ( $categoria->status == 0) {
            $categoria->status = 1;
        } else {
            $categoria->status = 0;
        }
        $categoria->save();

        return redirect()->route("categorias.index")->with("error", "Se cambio exitosamente el estado.");
    }


}
