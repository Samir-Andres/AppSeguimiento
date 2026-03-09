<?php

namespace App\Http\Controllers;

use App\Models\tipodocumentos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TipodocumentosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipodocumentos = tipodocumentos::paginate(9);
        return view('Tipo_documentos.index', compact('tipodocumentos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Tipo_documentos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
           'Denominacion' => 'required|max:100|min:2',
           'Observaciones' => 'nullable|max:200|min:3',

       ],[
           'Denominacion.required' => 'El nombre es requerido',
           'Denominacion.min' => 'El nombre debe tener al menos 2 caracteres',
           'Denominacion.max' => 'El nombre no se debe exceder los 100 caracteres',

           'Observaciones.required' => 'La observación es requerida',
           'Observaciones.max' => 'La observación no debe exceder los 200 caracteres',
           'Observaciones.min' => 'La observación debe tener al menos 3 caracteres',
       ]);

       DB::beginTransaction();


        try {

            tipodocumentos::create([
                'Denominacion' => $request->Denominacion,
                'Observaciones' => $request->Observaciones,
            ]);

            DB::commit();

            return  back()->with('success', 'El tipo de documento se ha creado satisfactoriamente');

        }catch (\Exception $e){
            DB::rollBack();
            return back()->with('error','Error al crear el tipo de documento');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($NIS)
    {
        $tipo = tipodocumentos::findOrFail($NIS);

        return view('Tipo_documentos.show', compact('tipo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($NIS)
    {
        $tipo = tipodocumentos::findOrFail($NIS);
        return view('Tipo_documentos.edit', compact('tipo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $NIS)
    {
        $request->validate([
            'Denominacion' => 'required|max:100|min:2',
            'Observaciones' => 'nullable|max:200|min:3',
        ],
        [

            'Denominacion.required' => 'El nombre es requerido',
            'Denominacion.min' => 'El nombre debe tener al menos 2 caracteres',
            'Denominacion.max' => 'El nombre no se debe exceder los 100 caracteres',

            'Observaciones.required' => 'La observación es requerida',
            'Observaciones.max' => 'La observación no debe exceder los 200 caracteres',
            'Observaciones.min' => 'La observación debe tener al menos 3 caracteres',

        ]);
        DB::beginTransaction();

        try {

            $tipo = tipodocumentos::findOrFail($NIS);
            $tipo->update([
                'Denominacion' => $request->Denominacion,
                'Observaciones' => $request->Observaciones,
            ]);
            DB::commit();
            return  redirect()->route('TipoDocumentos.index')->with('success', 'El tipo de documento se ha actualizado satisfactoriamente');

        }catch (\Exception $e){
            DB::rollBack();
            return back()->with('error','Error al actualizar el tipo de documento');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($NIS)
    {
        DB::beginTransaction();

        try {

            $tipo = tipodocumentos::findOrFail($NIS);
            $tipo->delete();
            DB::commit();
            return back()->with('success', 'El tipo de documento se ha eliminado satisfactoriamente');

        }catch (\Exception $e){
            DB::rollBack();
            return back()->with('error','Error al eliminar el tipo de documento');
        }
    }
}
