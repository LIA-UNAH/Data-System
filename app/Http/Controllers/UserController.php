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

        session()->put('exito', 'El usuaio ha sido eliminado con éxito.');
        return redirect()->back()->withInput();
    }
}
