<?php

namespace App\Http\Controllers;
use App\Http\Middleware\CheckRol;
use App\Models\aprendices;
use App\Models\instructor;
use Illuminate\Database\QueryException;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {



        $usuario = Auth::user();

        $aprendiz = $usuario->aprendiz;
        $instructor = $usuario->instructor;
        $rol = $usuario->roles;


        $rolesAdministrativos = ['administrador', 'super_administrador', 'auxiliar', 'jefe_inmediato'];

        $rolAdministrativo = $rol && in_array($rol->nombre, $rolesAdministrativos) ? $rol : null;


        return view('perfil.perfil', compact('usuario', 'aprendiz', 'instructor', 'rol', 'rolAdministrativo'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $usuario = User::findOrFail($id);
        return view('perfil.edit', compact('usuario'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {


        $id = Auth::user()->id;

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|ends_with:.com|unique:users,email,' . $id . ',id',

        ],[
            'name.required' => 'Este campo es obligatorio',
            'email.required' => 'Este campo es obligatorio',
            'email.email' => 'Ingrese un correo válido',
            'email.ends_with' => 'El correo debe terminar en .com',
            'email.unique' => 'Este correo ya está registrado',

        ]);

        DB::beginTransaction();

        try {


            $usuario = user::findOrFail($id);

            $usuario->update([
                'name' =>$request->name,
                'email' => $request->email
            ]);

            DB::commit();

            return back()->with('success', 'Actualizado correctamente');

        }catch (QueryException $e){
            DB::rollBack();
            return back()->with('error', 'Error al actualizar los datos. Intente nuevamente.');
        }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public  function  editPassword()
    {

        $usuario = Auth::user();
        return view('perfil.auth.password', compact('usuario'));
    }


    public  function  updatePassword(Request $request, $id)
    {

        $request->validate([
            'current_password'      => 'required',
            'password'              => 'required|min:8|confirmed',
            'password_confirmation' => 'required',
        ], [
            'current_password.required'      => 'La contraseña actual es obligatoria.',
            'password.required'              => 'La nueva contraseña es obligatoria.',
            'password.min'                   => 'La contraseña debe tener al menos 8 caracteres.',
            'password.confirmed'             => 'Las contraseñas no coinciden.',
            'password_confirmation.required' => 'Debes confirmar la nueva contraseña.',
        ]);

        DB::beginTransaction();

        try {

            $usuario = Auth::user(); // ← usuario logueado


            // Verifica que la contraseña actual sea correcta
            if (!Hash::check($request->current_password, $usuario->password)) {
                return back()->withErrors([
                    'current_password' => 'La contraseña actual no es correcta.'
                ]);
            }

            $usuario->update([
                'password' => Hash::make($request->password)
            ]);

            DB::commit();

            return  back()->with('success', 'La contraseña se ha actualizado correctamente.');
        }catch (QueryException $e){
            DB::rollBack();
            return back()->with('error', 'Error al actualiza la contraseña');

        }






    }

    public function datosAprendiz()
    {
        $usuario = Auth::user();
        $aprendiz = $usuario->aprendiz;
        return view('perfil.aprendiz.datos_personales', compact('usuario', 'aprendiz'));


    }

        public  function updateAprendiz(Request $request, $NIS)
        {


            $aprendiz = Auth::user()->aprendiz;

            $request->validate([
                'Direccion' => 'nullable|string|min:2|max:200',
                'Telefono' => [ 'required', 'numeric','digits_between:1,20', 'unique:tbl_aprendices,Telefono,' . $aprendiz->NIS . ',NIS'],
                'Correo_Personal' => ['required', 'string', 'email', 'min:10', 'max:50', 'ends_with:.com', 'unique:tbl_aprendices,Correo_Personal,' . $aprendiz->NIS . ',NIS'],
            ], [

                'Direccion.required' => 'La dirección es obligatoria.',
                'Direccion.string' => 'La dirección debe ser un texto válido.',
                'Direccion.min' => 'La dirección debe tener al menos 2 caracteres.',
                'Direccion.max' => 'La dirección no puede superar los 200 caracteres.',


                'Telefono.required' => 'El teléfono es obligatorio.',
                'Telefono.numeric' => 'El teléfono debe contener solo números.',
                'Telefono.digits_between' => 'El teléfono debe tener entre 7 y 20 dígitos.',
                'Telefono.unique' => 'Este número de teléfono ya está registrado.',


                'Correo_Personal.required' => 'El correo personal es obligatorio.',
                'Correo_Personal.string' => 'El correo debe ser un texto válido.',
                'Correo_Personal.email' => 'Debes ingresar un correo electrónico válido.',
                'Correo_Personal.min' => 'El correo debe tener al menos 10 caracteres.',
                'Correo_Personal.max' => 'El correo no puede superar los 50 caracteres.',
                'Correo_Personal.ends_with' => 'El correo debe terminar en .com',
                'Correo_Personal.unique' => 'Este correo ya está registrado.',

            ]);



            DB::beginTransaction();

            try {



                $aprendiz->update([
                    'Direccion' => $request->Direccion,
                    'Telefono' => $request->Telefono,
                    'Correo_Personal' => $request->Correo_Personal,
                ]);

                DB::commit();

                return back()->with('success', 'Actualizado correctamente');


            }catch (Exception $e){
                DB::rollBack();

            return back()->with('error', 'Error al actualizar los datos. Intente nuevamente.');

            }

            }



            //Metodo para la vista del formulario del instructor

    public function datosInstructor()
    {
        $usuario = Auth::user();


        $instructor = $usuario->instructor;
       return view('perfil.instructor.datos_personales', compact('usuario', 'instructor'));
    }

    public  function updateInstructor(Request $request, $NIS)
    {

        $instructor = Auth::user()->instructor;

        $request->validate([
            'Direccion' => 'nullable|string|min:2|max:200',
            'Telefono' => [ 'required', 'numeric','digits_between:10,20', 'unique:tbl_instructor,Telefono,' . $instructor->NIS . ',NIS'],
            'Correo_Personal' => ['required', 'string', 'email', 'min:10', 'max:50', 'ends_with:.com', 'unique:tbl_instructor,Correo_Personal,' . $instructor->NIS . ',NIS'],
        ], [

            'Direccion.string' => 'La dirección debe ser un texto válido.',
            'Direccion.min' => 'La dirección debe tener al menos 2 caracteres.',
            'Direccion.max' => 'La dirección no puede superar los 200 caracteres.',


            'Telefono.required' => 'El teléfono es obligatorio.',
            'Telefono.numeric' => 'El teléfono debe contener solo números.',
            'Telefono.digits_between' => 'El teléfono debe tener entre 10 y 20 dígitos con signos + y numeros.',
            'Telefono.unique' => 'Este número de teléfono ya está registrado.',


            'Correo_Personal.required' => 'El correo personal es obligatorio.',
            'Correo_Personal.string' => 'El correo debe ser un texto válido.',
            'Correo_Personal.email' => 'Debes ingresar un correo electrónico válido.',
            'Correo_Personal.min' => 'El correo debe tener al menos 10 caracteres.',
            'Correo_Personal.max' => 'El correo no puede superar los 50 caracteres.',
            'Correo_Personal.ends_with' => 'El correo debe terminar en .com',
            'Correo_Personal.unique' => 'Este correo ya está registrado.',

        ]);


        DB::beginTransaction();

        try {
            $instructor->update([
                'Direccion' => $request->Direccion,
                'Telefono' => $request->Telefono,
                'Correo_Personal' => $request->Correo_Personal,
            ]);

            DB::commit();
        return back()->with('success', 'Actualizado correctamente');

        }catch (Exception $e){
            DB::rollBack();
            return back()->with('error', 'Error al actualizar los datos. Intente nuevamente.');
        }

    }




}
