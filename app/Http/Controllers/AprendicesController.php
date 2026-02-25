<?php

namespace App\Http\Controllers;

use App\Models\aprendices;
use App\Models\eps;
use App\Models\fichacaracterizacion;
use App\Models\tipodocumentos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class AprendicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $aprendices = aprendices::paginate();
        return view('Aprendices.index', compact('aprendices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $eps = eps::all();

        $documento = tipodocumentos::all();

        $ficha = fichacaracterizacion::all();

        return view('Aprendices.create', compact('eps', 'documento', 'ficha'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $atributos = [
            'tbl_tipo_documentos_NIS'       => 'tipo de Documento',
            'Numdoc'                        => 'número de Documento',
            'Nombres'                       => 'nombres',
            'Apellidos'                     => 'apellidos',
            'Direccion'                     => 'dirección de Residencia',
            'Telefono'                      => 'teléfono de Contacto',
            'Correo_Institucional'          => 'correo Institucional',
            'Correo_Personal'               => 'correo Personal',
            'Sexo'                          => 'género',
            'FechaNac'                      => 'fecha de Nacimiento',
            'tbl_eps_NIS'                   => 'EPS',
            'tbl_ficha_caracterizacion_NIS' => 'ficha de Caracterización',
        ];

        $mensajes = [
            'required' => 'El campo :attribute es obligatorio.',
            'numeric' => 'El campo :attribute debe ser un número.',
            'string' => 'El campo :attribute debe ser texto.',
            'max' => 'El campo :attribute no puede tener más de :max caracteres.',
            'date' => 'El campo :attribute debe ser una fecha válida.',
            'email' => 'El campo :attribute debe ser un correo electrónico válido.',
            'Correo_Personal.ends_with' => 'El :attribute debe terminar obligatoriamente en .com',
            'unique' => 'El :attribute ya se encuentra registrado en el sistema.',
        ];

        $v = validator::make($request->all(), [
            'tbl_tipo_documentos_NIS' => ['required', 'numeric'],
            'Numdoc' => ['required', 'numeric', 'digits_between:1,20', 'unique:tbl_aprendices'],
            'Nombres' => ['required', 'string', 'min:2', 'max:100'],
            'Apellidos' => ['required', 'string', 'min:2', 'max:100'],
            'Direccion' => ['required', 'string', 'min:2', 'max:200'],
            'Telefono' => ['required', ' numeric', 'digits_between:1,50', 'unique:tbl_aprendices,Telefono'],
            'Correo_Institucional' => ['required', 'string', 'email','min:10', 'max:50', 'unique:tbl_aprendices', 'ends_with:.com'],
            'Correo_Personal' => ['required', 'string', 'email', 'min:10', 'max:50', 'unique:tbl_aprendices', 'ends_with:.com'],
            'Sexo' => ['required', 'numeric'],
            'FechaNac' => ['required', 'date', 'date_format:Y-m-d', 'before_or_equal:today'],
            'tbl_eps_NIS' => ['required', 'numeric'],
            'tbl_ficha_caracterizacion_NIS' => ['required', 'numeric'],


        ], $mensajes, $atributos);


        if ($v->fails()) {
            return redirect()->back()->withErrors($v)->withInput();
        }


        DB::beginTransaction();

        try {

            $aprendiz = aprendices::create($v->validated());

            DB::commit();

            return back()->with('success', 'Aprendices creado correctamente');
        }catch (\Exception $e){
            DB::rollBack();

            return back()->with('error', 'Error al crear la aprendices');
        }


    }


    /**
     * Display the specified resource.
     */
    public function show($Aprendice)
    {
        $aprendiz = aprendices::with('eps')-> FindOrFail($Aprendice);
        return view('Aprendices.show', compact('aprendiz'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($Aprendice)
    {
        $documento = tipodocumentos::all();
        $eps = eps::all();
        $ficha = fichacaracterizacion::all();
        $aprendices = aprendices::FindOrFail($Aprendice);
        return view('Aprendices.edit', compact('aprendices', 'documento', 'eps', 'ficha'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $Aprendice)
    {
        $atributos = [
            'tbl_tipo_documentos_NIS'       => 'tipo de documento',
            'Numdoc'                        => 'número de documento',
            'Nombres'                       => 'nombres',
            'Apellidos'                     => 'apellidos',
            'Direccion'                     => 'dirección de residencia',
            'Telefono'                      => 'teléfono de contacto',
            'Correo_Institucional'          => 'correo institucional',
            'Correo_Personal'               => 'correo personal',
            'Sexo'                          => 'género',
            'FechaNac'                      => 'fecha de nacimiento',
            'tbl_eps_NIS'                   => 'EPS',
            'tbl_ficha_caracterizacion_NIS' => 'ficha de caracterización',


        ];

        $mensajes = [
            'required' => 'El campo :attribute es obligatorio.',
            'numeric' => 'El campo :attribute debe ser un número.',
            'string' => 'El campo :attribute debe ser texto.',
            'max' => 'El campo :attribute no puede tener más de :max caracteres.',
            'date' => 'El campo :attribute debe ser una fecha válida.',
            'email' => 'El campo :attribute debe ser un correo electrónico válido.',
            'Correo_Personal.ends_with' => 'El :attribute debe terminar obligatoriamente en .com',
            'unique' => 'El :attribute ya ha sido registrado.',
        ];



       $request->validate([
           'tbl_tipo_documentos_NIS' => ['required', 'numeric'],
           'Numdoc' => ['required', 'numeric', 'digits_between:1,20', 'unique:tbl_aprendices,Numdoc,' . $Aprendice. ',NIS'],
           'Nombres' => ['required', 'string', 'min:2', 'max:100'],
           'Apellidos' => ['required', 'string', 'min:2', 'max:100'],
           'Direccion' => ['required', 'string', 'min:2', 'max:200'],
           'Telefono' => ['required', ' numeric', 'digits_between:1,50', 'unique:tbl_aprendices,Telefono,' . $Aprendice. ',NIS'],
           'Correo_Institucional' => ['required', 'string', 'email','min:10', 'max:50','ends_with:.com', 'unique:tbl_aprendices,Correo_Institucional,' .$Aprendice . ',NIS' ],
           'Correo_Personal' => ['required', 'string', 'email', 'min:10', 'max:50', 'ends_with:.com', 'unique:tbl_aprendices,Correo_Personal,' .$Aprendice . ',NIS'],
           'Sexo' => ['required', 'numeric'],
           'FechaNac' => ['required', 'date', 'date_format:Y-m-d', 'before_or_equal:today'],
           'tbl_eps_NIS' => ['required', 'numeric'],
           'tbl_ficha_caracterizacion_NIS' => ['required', 'numeric'],

        ], $mensajes,$atributos);


       DB::beginTransaction();

        try {

            $aprendiz = aprendices::findOrFail($Aprendice);

            $aprendiz->update([

            'tbl_tipo_documentos_NIS'       => $request->tbl_tipo_documentos_NIS,
            'Numdoc'                        => $request->Numdoc,
            'Nombres'                       => $request->Nombres,
            'Apellidos'                     => $request->Apellidos,
            'Direccion'                     => $request->Direccion,
            'Telefono'                      => $request->Telefono,
           'Correo_Institucional'          =>$request->Correo_Institucional,
           'Correo_Personal'               =>$request->Correo_Personal,
           'Sexo'                          => $request->Sexo,
           'FechaNac'                      => $request->FechaNac,
           'tbl_eps_NIS'                   => $request->tbl_eps_NIS,
           'tbl_ficha_caracterizacion_NIS' => $request->tbl_ficha_caracterizacion_NIS,


           ]);

            DB::commit();
            return redirect()->route('Aprendices.index')->with('success', 'Actualizado correctamente');
        }catch (\Exception $e){
            DB::rollBack();
            return back()->with('error', 'Ocurrio un error al actualizar');

        }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($Aprendice)
    {
        DB::beginTransaction();

        try {

            $aprendiz = aprendices::findOrFail($Aprendice);
            $aprendiz->delete();
            DB::commit();
            return redirect()->route('Aprendices.index')->with('success', 'Eliminado correctamente');
        }catch (\Exception $e){
            DB::rollBack();
            return back()->with('error', 'Ocurrio un error al eliminar');
        }

    }
}
