<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;


use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('usuario/usuarios_index')->with('users', $users);
    }

    //Metodo destroy para eliminar H6
    public function destroy(User $user){
        // Se usa una busque rapida que se genera en la ruta parra solo aplicar el metodo delete
        // del modelo usuario
        $user->delete();

        session()->put('suce', 'Eliminado con exito.');
        return redirect()->back()->withInput();
    }
}
