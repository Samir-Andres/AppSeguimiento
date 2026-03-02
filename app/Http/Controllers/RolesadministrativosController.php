<?php

namespace App\Http\Controllers;

use App\Models\entecoformadores;
use App\Models\rolesadministrativos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RolesadministrativosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $roles = rolesadministrativos::paginate(5);
        return view('Roles_administrativos.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Roles_administrativos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'nombre' => 'required|string|max:50|min:5|regex:/^[a-zA-Z\s]+$/u',
            'descripcion' => 'nullable|string|max:100|min:5|regex:/^[a-zA-Z\s]+$/u',

        ],
        [
            'nombre.required' => 'El campo nombre es obligatorio',
            'nombre.max' => 'El campo nombre no puede superar los 50 caracteres',
            'nombre.regex' => 'El campo nombre debe ser una cadena de texto',
            'nombre.min' => 'El campo nombre debe tener mínimo 5 caracteres',

            'descripcion.regex' => 'El campo descripción debe ser una cadena de texto',
            'descripcion.max' => 'El campo descripción no puede superar los 100 caracteres',
            'descripcion.min' => 'El campo descripción no debe ser menor que 5 caracteres',
        ]);

        DB::beginTransaction();

        try {

            $rol = rolesadministrativos::create($request->all());
            DB::commit();

            return back()->with('success', 'El rol se ha creado correctamente');

        }catch (\Exception $e){
            DB::rollBack();

            return back()->with('error', 'No se ha podido crear el rol');
        }


    }
    public function show($NIS)
    {
        $rol = rolesadministrativos::findOrFail($NIS);
        return view('Roles_administrativos.show', compact('rol'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($NIS)
    {
        $rol = rolesadministrativos::findOrFail($NIS);

        return view('Roles_administrativos.edit', compact('rol'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $NIS)
    {
        $request->validate([
            'nombre' => 'required|string|max:50|min:5|regex:/^[a-zA-Z\s]+$/u',
            'descripcion' => 'nullable|string|max:100|min:5|regex:/^[a-zA-Z\s]+$/u',
        ],
        [
            'nombre.required' => 'El campo nombre es obligatorio',
            'nombre.max' => 'El campo nombre no puede superar los 50 caracteres',
            'nombre.regex' => 'El campo nombre debe ser una cadena de texto',
            'nombre.min' => 'El campo nombre debe tener mínimo 5 caracteres',

            'descripcion.regex' => 'El campo descripción debe ser una cadena de texto',
            'descripcion.max' => 'El campo descripción no puede superar los 100 caracteres',
            'descripcion.min' => 'El campo descripción no debe ser menor que 5 caracteres',

        ]);

        DB::beginTransaction();

        try {

            $rol = rolesadministrativos::findOrFail($NIS);

            $rol->update($request->all());
            DB::commit();
            return redirect()->route('Rolesadministrativos.index')->with('success', 'El rol se ha actualizado correctamente');

        }catch (\Exception $e){
            DB::rollBack();
            return back()->with('error', 'El rol no se ha podido actualizar');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($NIS)
    {
        DB::beginTransaction();

        try {

            $rol = rolesadministrativos::findOrFail($NIS);
            $rol->delete();
            DB::commit();
            return redirect()->route('Rolesadministrativos.index')->with('success', 'El rol se ha eliminado correctamente');
        }catch (\Exception $e){
            DB::rollBack();

            return back()->with('error', 'El rol no se ha podido eliminar');
        }
    }
}
