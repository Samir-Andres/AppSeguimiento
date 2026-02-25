<?php

namespace App\Http\Controllers;


use App\Models\alternativa;
use App\Models\programaformacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use  Illuminate\Validation\Validator;


class ProgramaformacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $programaformacion = programaformacion::all();

        //  dd($programaformacion);
        return view('Programas_Formacion.index', compact('programaformacion'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Programas_Formacion.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'Codigo' => 'required|integer|unique:tbl_programas_formacion,Codigo',
            'Denominacion' => 'required|string|min:2|max:200',
            'Observaciones' => 'nullable|string|min:2|max:200',
        ], [
            'Codigo.required' => 'El campo código es obligatorio.',
            'Codigo.unique' => 'Este código ya existe.',
            'Codigo.integer' => 'El campo código debe ser un número.',

            'Denominacion.required' => 'El campo denominación es obligatorio.',
            'Denominacion.min' => 'La denominación debe tener al menos 2 caracteres.',

            'Observaciones.required' => 'El campo observaciones es obligatorio.',
            'Observaciones.min' => 'La observación debe tener al menos 2 caracteres.',
            'Observaciones.string' => 'La observación debe ser una cadena de texto.',
        ]);

        try {
            DB::beginTransaction();

            $programaformacion = programaformacion::create([

                    'Codigo' => $request['Codigo'],
                    'Denominacion' => $request['Denominacion'],
                    'Observacaiones' => $request['Observacaiones']

                ]
            );
            DB::commit();

            return redirect()->route('ProgramaFormacion.index')->with('success', 'La alternativa se creó completamente');


        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Ocurrió error al procesar la solicitud');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show($NIS)
    {
        $programa = programaformacion::findOrFail($NIS);

        return view('Programas_Formacion.show', compact('programa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($NIS)
    {
        $programa = programaformacion::findOrFail($NIS);
        return view('Programas_Formacion.edit', compact('programa'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $NIS)
    {
        $request->validate([
            'Codigo' => 'required|integer|unique:tbl_programas_formacion,Codigo,' . $NIS . ',NIS',
            'Denominacion' => 'required|string|min:2|max:200',
            'Observaciones' => 'nullable|string|min:2|max:200',
            ], [
            'Codigo.required' => 'El campo código es obligatorio.',
            'Codigo.unique' => 'Este código ya existe.',
            'Codigo.integer' => 'El campo código debe ser un número.',

            'Denominacion.required' => 'El campo denominación es obligatorio.',
            'Denominacion.min' => 'La denominación debe tener al menos 2 caracteres.',

            'Observaciones.required' => 'El campo observaciones es obligatorio.',
            'Observaciones.min' => 'La observación debe tener al menos 2 caracteres.',
            'Observaciones.string' => 'La observación debe ser una cadena de texto.',
        ]);

        DB::beginTransaction();

        try {
            $programa = programaformacion::findOrFail($NIS);

            $programa->update([
                'Codigo' => $request->Codigo,
                'Denominacion' => $request->Denominacion,
                'Observacaiones' => $request->Observacaiones
            ]);

            DB::commit();


            return redirect()->route('ProgramaFormacion.index')->with('success', 'El programa se actualizó correctamente');

        } catch (\Exception $e) {
            DB::rollBack();
            return  back()->with('error', 'El programa no se pudo actualizar');

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($NIS)
    {
        DB::beginTransaction();

        try {
            $programa = programaformacion::findOrFail($NIS);
            $programa->delete();
            DB::commit();
            return back()->with('success', 'Eliminado con éxito');
        }catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Eror al eliminar el programa');
        }
    }
}
