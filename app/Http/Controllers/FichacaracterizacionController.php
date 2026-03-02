<?php

namespace App\Http\Controllers;

use App\Models\centroformacion;
use App\Models\fichacaracterizacion;
use App\Models\instructor;
use App\Models\programaformacion;
use App\Models\regional;
use App\Notifications\InstructorEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FichacaracterizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ficha = fichacaracterizacion::paginate(5);
        return view('Ficha_Caracterizacion.index', compact('ficha'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $centro = centroformacion::all();
        $programa = programaformacion::all();
        $instructor = instructor::all();

        return view('Ficha_Caracterizacion.create', compact('centro', 'instructor', 'programa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Codigo' => 'required|numeric|digits_between:2,5|unique:tbl_ficha_caracterizacion,Codigo',
            'Denominacion' => 'required|string|max:200|min:5',
            'Cupos' => 'required|numeric|digits_between:1,2',
            'Fecha_Inicio' => 'required|date',
            'Fecha_Fin' => 'required|date|after:Fecha_Inicio',
            'Observaciones' => 'nullable|string|max:200|min:5',
            'tbl_centro_formacion_NIS' => 'required',
            'tbl_programas_formacion_NIS' => 'required',
            'tbl_instructor_NIS' => 'required',
        ],
        [
            'Codigo.required' => 'El código es obligatorio.',
            'Codigo.numeric' => 'El código debe ser numérico.',
            'Codigo.digits_between' => 'El código debe tener estar 2 a 5 caracteres.',
            'Codigo.unique' => 'El código ya se encuentra registrado en el sistema.',

            'Denominacion.required' => 'El denominación es obligatorio.',
            'Denominacion.string' => 'La denominación debe ser texto.',
            'Denominacion.max' => 'La denominación no puede ser mayor a 200 caracteres.',
            'Denominacion.min' => 'La denominación no puede ser menor a 5 caracteres.',

            'Cupos.required' => 'El cupos es obligatorio.',
            'Cupos.numeric' => 'El cupo debe ser numérico.',
            'Cupos.digits_between' => 'El cupo debe tener entre 1 y 2 caracteres.',

            'Fecha_Inicio.required' => 'La fecha de inicio es obligatoria.',
            'Fecha_Fin.required' => 'La fecha de fin es obligatoria.',
            'Fecha_Fin.after' => 'La fecha de fin debe ser mayor a la fecha inicial.',

            'Observaciones.string' => 'La observación debe ser una texto.',
            'Observaciones.max' => 'La observación no debe ser mayor a 200 caracteres.',
            'Observaciones.min' => 'La observación debe ser menor a 5 caracteres.',

            'tbl_centro_formacion_NIS' => 'El centro de formación es requerido.',
            'tbl_programas_formacion_NIS' => 'El programa de formación es requerido.',
            'tbl_instructor_NIS' => 'El instructor es requerido.',
        ]);

        DB::beginTransaction();

        try {

           $ficha = fichacaracterizacion::create($request->all());
            DB::commit();


            $ficha->load(['instructores', 'programa_formacion']);
            $ficha->instructores->notify(new InstructorEmail($ficha));

            return back()->with('success', 'La Ficha Caracterización fue registrada correctamente.');
        }catch (\Exception $e){
            DB::rollBack();
            return  $e->getMessage();
        }


    }

    /**
     * Display the specified resource.
     */
    public function show($NIS)
    {
        $ficha = fichacaracterizacion::findOrFail($NIS);
        return view('Ficha_caracterizacion.show', compact('ficha'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($NIS)
    {
        $ficha = fichacaracterizacion::findOrFail($NIS);
        $centro = centroformacion::all();
        $programa = programaformacion::all();
        $instructor = instructor::all();
        return view('Ficha_caracterizacion.edit', compact( 'ficha', 'centro', 'programa', 'instructor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $NIS)
    {
        $request->validate([
            'Codigo' => 'required|numeric|digits_between:2,5|unique:tbl_ficha_caracterizacion,Codigo,' . $NIS . ',NIS',
            'Denominacion' => 'required|string|max:200|min:5',
            'Cupos' => 'required|numeric|digits_between:1,2',
            'Fecha_Inicio' => 'required|date',
            'Fecha_Fin' => 'required|date|after:Fecha_Inicio',
            'Observaciones' => 'nullable|string|max:200|min:5',
            'tbl_centro_formacion_NIS' => 'required',
            'tbl_programas_formacion_NIS' => 'required',
            'tbl_instructor_NIS' => 'required',
        ],
            [
                'Codigo.required' => 'El código es obligatorio.',
                'Codigo.numeric' => 'El código debe ser numérico.',
                'Codigo.digits_between' => 'El código debe tener estar 2 a 5 caracteres.',
                'Codigo.unique' => 'El código ya se encuentra registrado en el sistema.',

                'Denominacion.required' => 'El denominación es obligatorio.',
                'Denominacion.string' => 'La denominación debe ser texto.',
                'Denominacion.max' => 'La denominación no puede ser mayor a 200 caracteres.',
                'Denominacion.min' => 'La denominación no puede ser menor a 5 caracteres.',

                'Cupos.required' => 'El cupos es obligatorio.',
                'Cupos.numeric' => 'El cupo debe ser numérico.',
                'Cupos.digits_between' => 'El cupo debe tener entre 1 y 2 caracteres.',

                'Fecha_Inicio' => 'La fecha de inicio es obligatoria.',
                'Fecha_Fin' => 'La fecha de fin es obligatoria.',
                'Fecha_Fin.after' => 'La fecha de fin debe ser mayor a la fecha inicial.',

                'Observaciones.string' => 'La observación debe ser una texto.',
                'Observaciones.max' => 'La observación no debe ser mayor a 200 caracteres.',
                'Observaciones.min' => 'La observación debe ser menor a 5 caracteres.',

                'tbl_centro_formacion_NIS' => 'El centro de formación es requerido.',
                'tbl_programas_formacion_NIS' => 'El programa de formación es requerido.',
                'tbl_instructor_NIS' => 'El instructor es requerido.',
            ]);

        DB::beginTransaction();

        try {

            $ficha = fichacaracterizacion::findOrFail($NIS);
            $ficha->update($request->all());
            DB::commit();
            return redirect()->route('Ficha_caracterizacion.index')->with('success', 'La ficha de caracterización fue actualizada correctamente.');

        }catch (\Exception $e){
            DB::rollBack();
            return  back()->with('error', 'Error al actualizar la ficha de caracterización.');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($NIS)
    {

        DB::beginTransaction();

        try {

            $ficha = fichacaracterizacion::findOrFail($NIS);
            $ficha->delete();
            DB::commit();
            return  back()->with('success', 'La Ficha caracterización fue eliminada correctamente.');
        }catch (\Exception $e){
            DB::rollBack();
            return back()->with('error', 'Error al eliminar la ficha caracterización.');
        }
    }
}
