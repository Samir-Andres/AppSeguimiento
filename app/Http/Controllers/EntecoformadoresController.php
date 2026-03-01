<?php

namespace App\Http\Controllers;

use App\Models\entecoformadores;
use App\Models\tipodocumentos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EntecoformadoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ente = entecoformadores::paginate();
        return view('Ente_coformadores.index', compact('ente'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tipo = tipodocumentos::all();
        return view('Ente_coformadores.create', compact('tipo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tbl_tipo_documentos_NIS' => 'required|exists:tbl_tipo_documentos,NIS',
            'Numdoc' => 'required|numeric|digits_between:5,10|unique:tbl_ente_coformadores,Numdoc',
            'Razon_Social' => 'required|string|min:4|max:100|regex:/^[\pL\s\-]+$/u',
            'Direccion' => 'nullable|string|min:2|max:100',
            'Telefono' => 'required|string|min:10|max:50|regex:/^[0-9]+$/',
            'Correo_Institucional' => 'required|string|min:2|max:100|unique:tbl_ente_coformadores|email|ends_with:.com',
        ],
        [

            'tbl_tipo_documentos_NIS.required' => 'El tipo de documento es obligatorio',
            'Numdoc.required' => 'El numero de documento es obligatorio',
            'Numdoc.numeric' => 'El numero de documento tiene que ser numérico',
            'Numdoc.digits_between' => 'El numero de documento no debe ser mayor a 10 ni menor que 5',
            'Numdoc.unique' => 'El numero de documento ya existe',

            'Razon_Social.required' => 'La razón social es obligatoria',
            'Razon_Social.regex' => 'La razón social debe ser una cadena de texto',
            'Razon_Social.min' => 'La razón social debe tener al menos 4 caracteres',
            'Razon_Social.max' => 'la razón social debe tener como maximo 100 caracteres',

            'Telefono.required' => 'El número de teléfono es obligatorio',
            'Telefono.min'      => 'El teléfono debe tener al menos 10 dígitos.',
            'Telefono.max'      => 'El teléfono no puede tener más de 50 dígitos.',
            'Telefono.regex'    => 'El campo teléfono solo debe contener números.',
            'Telefono.unique' => 'El número de teléfono ya existe',

            'Correo_Institucional.required' => 'El correo institucional es obligatorio',
            'Correo_Institucional.email' => 'El correo institucional debe ser un formato valido',
            'Correo_Institucional.ends_with' => 'El correo institucional debe terminar con el formato correcto, .com',
            'Correo_Institucional.unique' => 'El correo institucional ya existe',
        ]);

        DB::beginTransaction();



        try {

            $entecoformadores = entecoformadores::create([
                'tbl_tipo_documentos_NIS' => $request->tbl_tipo_documentos_NIS,
                'Numdoc' => $request->Numdoc,
                'Razon_Social' => $request->Razon_Social,
                'Direccion' => $request->Direccion,
                'Telefono' => $request->Telefono,
                'Correo_Institucional' => $request->Correo_Institucional
            ]);

            DB::commit();

            return back()->with('success', 'Ente coformador creado correctamente');
        }catch (\Exception $e){
            DB::rollback();
            return back()->with('error', 'Ocurrió un error al crear el registro');

        }
    }

    /**
     * Display the specified resource.
     */
    public function show($NIS)
    {
        $ente = entecoformadores::findOrFail($NIS);
        return view('Ente_coformadores.show', compact('ente'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($NIS)
    {
        $tipo = tipodocumentos::all();
        $ente = entecoformadores::findOrFail($NIS);
        return view('Ente_coformadores.edit', compact('ente', 'tipo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $NIS)
    {
        $request->validate([
            'tbl_tipo_documentos_NIS' => 'required|exists:tbl_tipo_documentos,NIS',
            'Numdoc' => 'required|numeric|digits_between:5,10|unique:tbl_ente_coformadores,Numdoc,' . $NIS . ',NIS',
            'Razon_Social' => 'required|string|min:4|max:100|regex:/^[\pL\s\-]+$/u',
            'Direccion' => 'nullable|string|min:2|max:100',
            'Telefono' => 'required|string|min:10|max:50|regex:/^[0-9]+$/',
            'Correo_Institucional' => 'required|string|min:2|max:100|email|ends_with:.com|unique:tbl_ente_coformadores,Correo_Institucional,' . $NIS . ',NIS',
        ],
            [
                'tbl_tipo_documentos_NIS.required' => 'El tipo de documento es obligatorio',
                'Numdoc.required' => 'El número de documento es obligatorio',
                'Numdoc.numeric' => 'El número de documento tiene que ser numérico',
                'Numdoc.digits_between' => 'El número de documento no debe ser mayor a 10 ni menor que 5',
                'Numdoc.unique' => 'El número de documento ya existe',
                'Razon_Social.required' => 'La razón social es obligatoria',
                'Razon_Social.regex' => 'La razón social debe ser una cadena de texto',
                'Telefono.required' => 'El número de teléfono es obligatorio',
                'Telefono.regex' => 'El campo teléfono solo debe contener números.',
                'Correo_Institucional.required' => 'El correo institucional es obligatorio',
                'Correo_Institucional.email' => 'El correo institucional debe ser un formato válido',
                'Correo_Institucional.ends_with' => 'El correo debe terminar en .com',
                'Correo_Institucional.unique' => 'El correo institucional ya existe',
            ]);

        DB::beginTransaction();
        try {
            $ente = entecoformadores::findOrFail($NIS);

            $ente->update([
                'tbl_tipo_documentos_NIS' => $request->tbl_tipo_documentos_NIS,
                'Numdoc' => $request->Numdoc,
                'Razon_Social' => $request->Razon_Social,
                'Direccion' => $request->Direccion,
                'Telefono' => $request->Telefono,
                'Correo_Institucional' => $request->Correo_Institucional
            ]);

            DB::commit();
            return redirect()->route('Entecoformadores.index')->with('success', 'Ente coformador actualizado correctamente');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Ocurrió un error al actualizar el registro');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($NIS)
    {
        DB::beginTransaction();

        try {

            $ente = entecoformadores::findOrFail($NIS);
            $ente->delete();

            DB::commit();
            return back()->with('success', 'Ente coformador eliminado correctamente');
        }catch (\Exception $e){
            DB::rollback();
            return back()->with('error', 'Error al eliminar el ente coformador');
        }
    }
}
