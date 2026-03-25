<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\rolesadministrativos;
use App\Models\User;
use App\Notifications\EnviarEmail;
use App\Notifications\UserPasswordNotification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterUserController extends Controller
{
    public function index(){

        $usuarios = User::paginate();
        return view('usuarios.auth.index', compact('usuarios'));

    }


    public function create(){

        $roles = rolesadministrativos::all();
        return view('usuarios.auth.create', compact('roles'));
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required|string|max:255|regex:/^[\pL\s\-]+$/u',
            'email' => 'required|email|unique:users',
            'tbl_roles_administrativos_NIS' => 'required'

        ],
        [
            'name.required' => 'El campo nombre es obligatorio',
            'name.regex' => 'El campo nombre debe ser un texto',
            'name.max' => 'El campo nombre no puede superar los 255 caracteres',

            'email.required' => 'El campo email es obligatorio',
            'email.email' => 'El campo email debe ser un correo valido',
            'email.unique' => 'El email ya existe',

            'tbl_roles_administrativos_NIS.required' => 'El campo rol es obligatorio',
        ]);

        DB::beginTransaction();

        try {

            $password = Str::random(8);

            $usuario = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($password),
                'tbl_roles_administrativos_NIS' => $request->tbl_roles_administrativos_NIS,
            ]);


            $usuario->notify(new UserPasswordNotification($usuario->name, $usuario->email, $password));

            DB::commit();

            return back()->with('success', 'El usuario se ha creado correctamente');
        }catch (\Exception $e){
            DB::rollBack();
            return $e->getMessage();
        }

    }

    public function show(){

    }

    public function edit($id){
        $usuario = User::findOrFail($id);
        $roles = rolesadministrativos::all();
        return view('usuarios.auth.edit', compact('usuario', 'roles'));

    }

    public function update(Request $request, $id){

        $request->validate([
            'name' => 'required|string|max:255|regex:/^[\pL\s\-]+$/u',
            'email' => 'required|email|unique:users,email,' . $id,
            'tbl_roles_administrativos_NIS' => 'required'

        ],
            [
                'name.required' => 'El campo nombre es obligatorio',
                'name.regex' => 'El campo nombre debe ser un texto',
                'name.max' => 'El campo nombre no puede superar los 255 caracteres',

                'email.required' => 'El campo email es obligatorio',
                'email.email' => 'El campo email debe ser un correo valido',
                'email.unique' => 'El email ya existe',

                'tbl_roles_administrativos_NIS.required' => 'El campo rol es obligatorio',
            ]);

        DB::beginTransaction();

        try {


            $usuario = User::findOrFail($id);

            $usuario->update([
                'name' => $request->name,
                'email' => $request->email,
                'tbl_roles_administrativos_NIS' => $request->tbl_roles_administrativos_NIS,
            ]);

            DB::commit();
            return redirect()->route('usuarios.index')->with('success', 'El usuario se ha actualizado correctamente');

        }catch (\Exception $e){
            DB::rollBack();
            return with('error', 'Error al actualizar el usuario');
        }

    }
    public function destroy(){

    }
}
