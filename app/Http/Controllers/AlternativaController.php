<?php

namespace App\Http\Controllers;

use App\Models\alternativa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AlternativaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $alternativa = alternativa::paginate(5);

        return view('alternativa.index', compact('alternativa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('alternativa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([


            'nombre'      => 'required|string|min:2|max:150|regex:/^[\pL\s]+$/u',
            'descripcion' => 'nullable|string|min:2|max:1000',
            'estado'      => 'required|integer|between:0,1',
            'password'      => 'required|string|min:8|max:150'


        ], [

            'nombre.required'      => 'El campo nombre es obligatorio.',
            'nombre.string'        => 'El nombre debe ser una cadena de texto.',
            'nombre.min'           => 'El nombre debe tener al menos 2 caracteres.',
            'nombre.max'           => 'El nombre no puede superar los 150 caracteres.',
            'nombre.regex' => 'El nombre solo puede contener letras y espacios.',


            'descripcion.min'      => 'La descripción debe tener al menos 2 caracteres.',
            'descripcion.max'      => 'La descripción es demasiado larga.',


            'estado.required'      => 'El estado es obligatorio.',
            'estado.integer'       => 'El estado debe ser un valor numérico.',
            'estado.between'       => 'El estado debe ser 0 (Inactivo) o 1 (Activo).',


            'password.required'       => 'El campo password es obligatorio.',
            'pasword.min'           => 'El password  debe tener al menos 8 caracteres.',
            'pasword.max'           => 'El password  debe tener los 150 caracteres.',

        ]);



        DB::beginTransaction();


        try {

         //   $passwordBcr = bcrypt($request['password']);

            $alternativa = alternativa::create([
                'nombre' => $request['nombre'],
                'descripcion' => $request['descripcion'],
                'estado' => $request['estado'],
                'password' => Hash::make($request['password'])
                // 'password' => bcrypt($request['estado']),
              //  'password' => $passwordBcr,

            ]);

            DB::commit();

            return back()->with('success', 'La alternativa se creó completamente');
        } catch (\Throwable $th) {
            DB::rollBack();

            return back()->with('error', 'Ocurrió error al procesar la solicitud');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $alternativa = alternativa::findOrFail($id);

        return view('alternativa.ver', compact('alternativa'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $alternativa = alternativa::findOrFail($id);
        return view('alternativa.alternativa-editar', compact('alternativa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $request->validate(
            [
                'nombre'      => 'required|string|min:2|max:150|regex:/^[\pL\s]+$/u',
                'descripcion' => 'nullable|string|min:2|max:1000',
                'estado'      => 'required|integer|between:0,1',

            ],

            [

                'nombre.required'      => 'El campo nombre es obligatorio.',
                'nombre.string'        => 'El nombre debe ser una cadena de texto.',
                'nombre.min'           => 'El nombre debe tener al menos 2 caracteres.',
                'nombre.max'           => 'El nombre no puede superar los 150 caracteres.',
                'nombre.regex'         => 'El nombre solo puede contener letras y espacios.',


                'descripcion.min'      => 'La descripción debe tener al menos 2 caracteres.',
                'descripcion.max'      => 'La descripción es demasiado larga.',


                'estado.required'      => 'El estado es obligatorio.',
                'estado.integer'       => 'El estado debe ser un valor numérico.',
                'estado.between'       => 'El estado debe ser 0 (Inactivo) o 1 (Activo).',


            ]
        );

        DB::beginTransaction();

        try {

            $alternativa = alternativa::findOrFail($id);

                $alternativa->update([
                'nombre' => $request->nombre,
                'estado' => $request->estado,
                'descripcion' => $request->descripcion

            ]);

            DB::commit();

            return redirect()->route('Alternativa.Index')->with('success', 'La alternativa se actualizó completamente');
        } catch (\Exception $e) {

            DB::rollBack();

            return back()->with('error', 'Ocurrió error al procesar la solicitud');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::beginTransaction();

        try {
            $alternativa = alternativa::findOrFail($id);
            $alternativa->delete();

            DB::commit();

            return back()->with('success', 'Eliminado con éxito');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Error al eliminar');
        }
    }
}
