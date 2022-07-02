<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;


use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //HU5 - Visualizar usuarios
    public function index(){
        $users = DB::table('users')->where('type', '=', 'cliente', 'not')
            ->paginate(10);
        return view('usuario/usuarios_index')->with('users', $users);
    }

    //HU8 - Recargar y buscar usuario
    public function search(Request $request){
        $texto =trim($request->get('busqueda'));
        $users = User::where('name', 'like', '%'.$texto.'%')->paginate(10);
        return view('usuario/usuarios_index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuario.usuarios_create');
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
            'name' => ['required', 'string','min:3', 'max:70'],
            'email' => ['required', 'string', 'email', 'max:70', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'type' => ['required'],
            'address' => ['required', 'string','min:3', 'max:250'],
            'telephone' => ['required', 'numeric','min:2', 'max:99999999'],
        ], [
            'name.required' => '¡Debes ingresar tu nombre completo!',
            'name.string' => '¡Debes ingresar tu nombre completo, solo se permiten letras!',
            'name.min' => '¡Ingresa tu nombre completo, sin abreviaturas!',
            'name.max' => '¡Has excedido el limite máximo de 70 letras!',

            'email.required' => '¡Debes ingresar tu correo electrónico!',
            'email.string' => '¡Debes ingresar tu correo electrónico, verifica la información!',
            'email.email' => '¡Debes ingresar un correo electrónico válido!',
            'email.max' => '¡Has excedido el limite máximo de 70 letras!',
            'email.unique' => '¡Debes ingresar un correo electrónico diferente!',

            'type.required' => '¡Debes ingresar el tipo de usuario!',

            'password.required' => '¡Debes ingresar una contraseña!',
            'password.confirmed' => '¡Debes confirmar tu contraseña!',
            'password.min' => '¡Debes ingresar una contraseña segura!',

            'address.required' => '¡Debes ingresar tu dirección!',
            'address.string' => '¡Debes ingresar tu dirección, verifica la información!',
            'address.min' => '¡Ingresa tu dirección completa, sin abreviaturas!',
            'address.max' => '¡Has excedido el limite máximo de 250 letras!',

            'telephone.required' => '¡Debes ingresar tu número de teléfono!',
            'telephone.numeric' => '¡Debes ingresar tu teléfono, solo se permiten números!',
            'telephone.min' => '¡Ingresa tu número teléfono completo!',
            'telephone.max' => '¡Ingresa tu número teléfono completo, sin exceder el límite!',
        ]);

        $users = new User();
        $users->name = $request->input("name");
        $users->email = $request->input("email");
        $users->password = $request->input("password");
        $users->type = $request->input("type");
        $users->address = $request->input("address");
        $users->telephone = $request->input("telephone");
        $users->save();

        return redirect()->route("usuarios.index")->with("exito", "Se creó exitosamente el usuario");
    }

    public function update(Request $request, $id)
    {
        $users = User::findOrFail($id);
        $users->name = $request->input('name');
        $users->email = $request->input('email');
        $users->address = $request->input('address');
        $users->telephone = $request->input('telephone');
        $users->save();

        session()->put('exito', 'Editado con exito.');
        return redirect()->back()->withInput();
    }

    //HU6 - Eliminar usuario
    public function destroy(User $user){
        // Se usa una busqueda rapida que se genera en la ruta para solo aplicar el metodo delete del modelo usuario
        $user->delete();
        return redirect()->route("usuarios.index")->with("error", "Se eliminó exitosamente el usuario.");

        //session()->put('exito', 'El usuaio ha sido eliminado con éxito.');
        //return redirect()->back()->withInput();
    }
}
