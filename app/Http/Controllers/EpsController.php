<?php

namespace App\Http\Controllers;

use App\Models\alternativa;
use App\Models\eps;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EpsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eps = eps::all();
        return view('Eps.index', compact('eps'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Eps.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'Numdoc' => 'required|numeric|digits_between:4,20|unique:tbl_eps,Numdoc',
            'Denominacion' => 'required|string|max:100',
            'Observaciones' => 'nullable|string|max:100',
        ],
        [
            'Numdoc.required' => 'El numero de documento es requerido',
            'Numdoc.integer' => 'El numero de documento debe ser un entero',
            'Numdoc.digits_between' => 'El número de documento no debe ser menor a 4 ni mayor a 20',
            'Numdoc.unique' => 'El numero de documento ya existe',

            'Denominacion.string' => 'El denominacion debe ser una cadena de texto',
            'Denominacion.required' => 'La denominacion es requerida',
            'Denominacion.max' => 'La denominacion no puede ser mayor a 100',

            'Observaciones.max' => 'La observaciones no puede ser mayor a 100',
            'Observaciones.string' => 'El observacion debe ser una cadena de texto',
        ]);

        DB::beginTransaction();

        try {

            $eps = eps::create([

                'Numdoc' => $request['Numdoc'],
                'Denominacion' => $request['Denominacion'],
                'Observaciones' => $request['Observaciones'],


            ]);

            DB::commit();

            return back()->with('success', 'El eps se ha registrado correctamente');

        }catch (\Exception $e){
            DB::rollBack();

            return back()->with('error', 'Ocurrió error al procesar la solicitud');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show($NIS)
    {
        $eps = eps::findOrFail($NIS);

        return view('Eps.show', compact('eps'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($NIS)
    {

        $eps = eps::findOrFail($NIS);
        return view('Eps.edit', compact('eps'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $NIS)
    {

        $request->validate([
            'Numdoc' => 'required|numeric|digits_between:4,20|unique:tbl_eps,Numdoc,' . $NIS . ',NIS',
            'Denominacion' => 'required|string|max:100',
            'Observaciones' => 'nullable|string|max:100|regex:/^[\pL\s]+$/u',
        ],
        [
            'Numdoc.required' => 'El numero de documento es requerido',
            'Numdoc.integer' => 'El numero de documento debe ser un entero',
            'Numdoc.digits_between' => 'El número de documento no debe ser menor a 4 ni mayor a 20',
            'Numdoc.unique' => 'El numero de documento ya existe',

            'Denominacion.string' => 'El denominacion debe ser una cadena de texto',
            'Denominacion.required' => 'La denominacion es requerida',
            'Denominacion.max' => 'La denominacion no puede ser mayor a 100',

            'Observaciones.max' => 'La observaciones no puede ser mayor a 100',
            'Observaciones.regex' => 'El observacion debe ser una cadena de texto',
        ]);

        try {
            DB::beginTransaction();

            $eps = eps::findOrFail($NIS);

             $eps->update([
                'Numdoc' => $request['Numdoc'],
                'Denominacion' => $request['Denominacion'],
                'Observaciones' => $request['Observaciones'],
            ]);

             DB::commit();
             return redirect()->route('eps.index')->with('success', 'El eps se ha actualizado correctamente');

        }catch (\Exception $e){
            DB::rollBack();

            return back()->with('error', 'El eps se ha actualizado correctamente');

        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($NIS)
    {

        DB::beginTransaction();

        try {

            $eps = eps::findOrFail($NIS);
            $eps->delete();

            DB::commit();

            return back()->with('success', 'La eps se ha eliminado correctamente');

        }catch (\Exception $e){
            DB::rollBack();
            return back()->with('error', 'Ocurrió error al procesar la solicitud');
        }




    }
}
