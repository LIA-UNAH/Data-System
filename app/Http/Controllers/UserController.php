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
        $users = User::all();
        return view('usuario/usuarios_index')->with('users', $users);
    }

    //HU8 - Recargar y buscar usuario
    public function search(Request $request){
        $texto =trim($request->get('busqueda'));
        $users = User::where('name', 'like', '%'.$texto.'%')->get();

        return view('usuario/usuarios_index')->with('users', $users);
    }

    //HU6 - Eliminar usuario
    public function destroy(User $user){
        // Se usa una busqueda rapida que se genera en la ruta para solo aplicar el metodo delete del modelo usuario
        $user->delete();

        session()->put('exito', 'El usuaio ha sido eliminado con éxito.');
        return redirect()->back()->withInput();
    }
}
