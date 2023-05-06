<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Database\QueryException;


class UserController extends Controller
{
    //HU5 - Visualizar usuarios
    public function index(){
        $users = DB::table('users')
            ->whereNotIn('type', ['Cliente'])
            ->paginate(5);
        return view('usuario/usuarios_index')->with('users', $users);
    }

    //HU8 - Recargar y buscar usuario
    public function search(Request $request){
        $texto =trim($request->get('busqueda'));
        $users = DB::table('users')
            ->where('name', 'like', '%'.$texto.'%')
            ->whereNotIn('type', ['Cliente'])
            ->paginate(5);
        return view('usuario/usuarios_index')->with('users', $users);
    }

    public function create()
    {
        return view('usuario.usuarios_create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'min:3','max:40','regex:/^[a-zA-Z]+\s[a-zA-Z]+(\s[a-zA-Z]+)?(\s[a-zA-Z]+)?$/'],
            'email' => ['required', 'string', 'email', 'max:70', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'type' => ['required'],
            'address' => ['required', 'string','min:3', 'max:250'],
            'telephone' => ['required', 'numeric','min:2', 'max:99999999'],
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:10240'
        ], [
            'name.required' => '¡Debes ingresar tu nombre completo!',
            'name.regex' => '¡Debes ingresar de 2 a 4 nombres, sin incluir símbolos ni números!',
            'name.min' => '¡Ingresa tu nombre completo, sin abreviaturas!',
            'name.max' => '¡Has excedido el limite máximo de 40 letras!',

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

    public function profile_cliente()
    {
        $user = auth()->user();
        return view("profile_cliente")->with("user", $user);
    }

    //HU35 - Información del sistema
    public function info(){
        return view('information');
    }

    //H30 - Editar usuario
    public function edit(Request $request, $id)
    {
        $user = User::findOrFail($id);
        return view("usuario.usuarios_edit")->with("user", $user);
    }

    public function edit_profile(Request $request, $id)
    {
        $user = User::findOrFail($id);
        return view("profile_usuarios_edit")->with("user", $user);
    }

    public function edit_profile_cliente(Request $request, $id)
    {
        $user = User::findOrFail($id);
        return view("profile_cliente_edit")->with("user", $user);
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
            'name' => ['required', 'min:3','max:40','regex:/^[a-zA-Z]+\s[a-zA-Z]+(\s[a-zA-Z]+)?(\s[a-zA-Z]+)?$/'],
            'email' => ['required', 'string', 'email', 'max:70', Rule::unique('users')->ignore($users->id),],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'type' => ['required'],
            'address' => ['required', 'string','min:3', 'max:250'],
            'telephone' => ['required', 'numeric','min:2', 'max:99999999']
        ], [
            'name.required' => '¡Debes ingresar tu nombre completo!',
            'name.regex' => '¡Debes ingresar de 2 a 4 nombres, sin incluir símbolos ni números!',
            'name.min' => '¡Ingresa tu nombre completo, sin abreviaturas!',
            'name.max' => '¡Has excedido el limite máximo de 40 letras!',

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

    public function update_profile(Request $request, $id)
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

        return redirect()->route("usuarios.profile")->with("exito", "Se editó exitosamente el usuario");
    }

    public function update_profile_cliente(Request $request, $id)
    {
        $users = User::findOrFail($id);
        $this->validate($request, [
            'name' => ['required', 'string','min:3', 'max:70'],
            'email' => ['required', 'string', 'email', 'max:70', Rule::unique('users')->ignore($users->id),],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'type' => ['required'],
            'customer' => ['required'],
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
            'customer.required' => '¡Debes ingresar el tipo de cliente!',

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

        return redirect()->route("usuarios.profile_cliente")->with("exito", "Se editó exitosamente el usuario");
    }

    //HU6 - Eliminar usuario
    public function destroy(User $user){
        try {
            $user->delete();
            return redirect()->route("usuarios.index")->with("exito", "El usuario ha sido eliminado exitosamente del sistema.");
        } catch (QueryException $ex) {
            $errorCode = $ex->errorInfo[1];
            if ($errorCode == 1451) {
                $message = 'Lo siento, no se puede eliminar este usuario porque tiene registros asociados en la tabla de ventas. Si desea eliminar este usuario, primero debe eliminar todos los registros asociados en la tabla de ventas.';
                return view('usuario.usuarios_delete', compact('message'));
            } else {
                // Código para manejar otros errores aquí
            }
        }
    }
}
