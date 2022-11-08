<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //HU5 - Visualizar usuarios
    public function index(){
        $users = DB::table('users')
            ->whereNotIn('type', ['Cliente'])
            ->paginate(4);
        return view('usuario/usuarios_index')->with('users', $users);
    }

    //HU8 - Recargar y buscar usuario
    public function search(Request $request){
        $texto =trim($request->get('busqueda'));
        $users = DB::table('users')
            ->where('name', 'like', '%'.$texto.'%')
            ->whereNotIn('type', ['Cliente'])
            ->paginate(4);
        return view('usuario/usuarios_index')->with('users', $users);
    }

    public function create()
    {
        return view('usuario.usuarios_create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string','min:3', 'max:70'],
            'email' => ['required', 'string', 'email', 'max:70', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'type' => ['required'],
            'address' => ['required', 'string','min:3', 'max:250'],
            'telephone' => ['required', 'numeric','min:2', 'max:99999999'],
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
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
            'telephone.min' => '¡Ingresa tu número de teléfono completo!',
            'telephone.max' => '¡Ingresa tu número de teléfono completo, sin exceder el límite!',

            'image.required' => '¡Debes cargar una imagen!',
            'image.image' => '¡Debes seleccionar una imagen!',
            'image.mimes' => '¡Debes seleccionar una imagen en el formato correcto!'
        ]);

        $input = $request->all();
        $password = $request->input('password');
        $input['password'] = bcrypt($password);

        if ($image = $request->file('image')) {
            $destinationPath = 'images/uploads';
            $file_name = $image->getClientOriginalName();
            $profileImage = $file_name ;
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        User::create($input)->assignRole($request->input('type'));
        return redirect()->route("usuarios.index")->with("exito", "Se creó exitosamente el usuario");
    }

    //HU32 - Ver usuario
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view("usuario.usuarios_show")->with("user", $user);
    }

    //HU33 - Perfil de usuario
    public function profile()
    {
        $user = auth()->user();
        return view("profile")->with("user", $user);
    }

    //HU35 - Información del sistema
    public function info(){
        return view('information');
    }

    //H30 - Editar usuario
    public function edit_profile(Request $request, $id)
    {
        $user = User::findOrFail($id);
        return view("usuario.usuarios_edit")->with("user", $user);
    }

    //H30 - Editar usuario
    public function edit(Request $request, $id)
    {
        $user = User::findOrFail($id);
        return view("usuario.usuarios_edit")->with("user", $user);
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
        $users = User::findOrFail($id);
        $this->validate($request, [
            'name' => ['required', 'string','min:3', 'max:70'],
            'email' => ['required', 'string', 'email', 'max:70', Rule::unique('users')->ignore($users->id),],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'type' => ['required'],
            'address' => ['required', 'string','min:3', 'max:250'],
            'telephone' => ['required', 'numeric','min:2', 'max:99999999']
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
            'telephone.min' => '¡Ingresa tu número de teléfono completo!',
            'telephone.max' => '¡Ingresa tu número de teléfono completo, sin exceder el límite!',
        ]);

        $input = $request->all();
        if ($image = $request->file('image')) {
            $destinationPath = 'images/uploads/';
            $file_name = $image->getClientOriginalName();
            $profileImage = $file_name ;
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }

        $users->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
        $users->assignRole($request->input('type'));

        return redirect()->route("usuarios.index")->with("exito", "Se editó exitosamente el usuario");
    }

    //HU6 - Eliminar usuario
    public function destroy(User $user){
        $user->delete();
        return redirect()->route("usuarios.index")->with("error", "Se eliminó exitosamente el usuario.");
    }
}
