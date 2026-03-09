<?php

namespace App\Http\Controllers;

use App\Models\aprendices;
use App\Models\bitacora;
use App\Models\eps;
use App\Models\fichacaracterizacion;
use App\Models\instructor;
use App\Models\rolesadministrativos;
use App\Models\tipodocumentos;
use App\Models\User;
use App\Notifications\PasswordEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $instructores = instructor::paginate(50);
        return view('Instructor.index', compact('instructores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $eps =  eps::all();
        $documento = tipodocumentos::all();
        return view('Instructor.create', compact('eps','documento'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tbl_tipo_documentos_NIS' => 'required',
            'Numdoc' => 'required|numeric|digits_between:5,10|unique:tbl_instructor,Numdoc',
            'Nombres' => 'required|string|max:100|min:2|regex:/^[\pL\s]+$/u',
            'Apellidos' => 'required|string|max:100|min:2|regex:/^[\pL\s]+$/u',
            'Direccion' => 'nullable|string|max:100|min:2|regex:/^[\pL0-9\s\.#-]+$/u',
            'Telefono' => 'required|numeric|digits_between:10,50|unique:tbl_instructor,Telefono',
            'Correo_Institucional' => 'required|string|email|min:10|max:50|ends_with:.com|unique:tbl_instructor,Correo_Institucional',
            'Correo_Personal' => 'required|string|email|min:10|max:50|ends_with:.com|unique:tbl_instructor,Correo_Personal',
            'Sexo' => 'required|numeric',
            'FechaNac' => 'required|date|date_format:Y-m-d|before_or_equal:today',
            'tbl_eps_NIS' => 'required',
        ],
            [
                'tbl_tipo_documentos_NIS.required' => 'El tipo de documento es obligatorio',

                'Numdoc.required' => 'El número de documento es obligatorio',
                'Numdoc.numeric' => 'El número de documento debe ser numérico',
                'Numdoc.digits_between' => 'El número debe estar entre 5 y 20 dígitos',
                'Numdoc.unique' => 'El número de documento ya existe',

                'Nombres.required' => 'El nombres es obligatorio',
                'Nombres.max' => 'El nombre no puede exceder los 100 caracteres',
                'Nombres.min' => 'El nombre no puede contener menos de 2 caracteres',
                'Nombres.regex' => 'El nombre no puede contener números',

                'Apellidos.required' => 'El apellidos es obligatorio',
                'Apellidos.max' => 'El apellidos no puede exceder los 100 caracteres',
                'Apellidos.min' => 'El apellidos no puede contener menos de 2 caracteres',
                'Apellidos.regex' => 'El apellidos no puede contener números',

                'Direccion.max' => 'El dirección no puede exceder los 100 caracteres',
                'Direccion.min' => 'El dirección no puede contener menos de 2 caracteres',
                'Direccion.regex' => 'El apellidos no puede contener números',

                'Telefono.required' => 'El número teléfono es obligatorio',
                'Telefono.numeric' => 'El número teléfono debe ser numérico ',
                'Telefono.digits_between' => 'El número de teléfono debe estar entre 10 y 50 dígitos incluyendo espacios y signos',
                'Telefono.unique' => 'El numero ya se encuentra registrado en el sistema',

                'Correo_Institucional.required' => 'El correo es obligatorio',
                'Correo_Institucional.email' => 'El correo debe ser valido',
                'Correo_Institucional.unique' => 'El correo ya se encuentra registrado en el sistema',
                'Correo_Institucional.min' => 'El correo debe tener al menos 11 caracteres',
                'Correo_Institucional.max' => 'El correo debe tener al menos 50 caracteres',
                'Correo_Institucional.ends_with' => 'El correo debe terminar con el formato correcto, .com',

                'Correo_Personal.required' => 'El correo es obligatorio',
                'Correo_Personal.email' => 'El correo debe ser valido',
                'Correo_Personal.unique' => 'El correo ya se encuentra registrado en el sistema',
                'Correo_Personal.min' => 'El correo debe tener al menos 11 caracteres',
                'Correo_Personal.max' => 'El correo debe tener al menos 50 caracteres',
                'Correo_Personal.ends_with' => 'El correo debe terminar con el formato correcto, .com',

                'Sexo.required' => 'El sexo es obligatorio',

                'FechaNac.required' => 'La fecha de nacimiento es obligatoria',
                'FechaNac.before_or_equal' => 'La fecha de nacimiento no puede ser mayor a la fecha actual',
                'tbl_eps_NIS.required' => 'La eps es obligatoria',
            ]);

        DB::beginTransaction();

        try {




            $instructor =  instructor::create([
                'tbl_tipo_documentos_NIS' => $request->tbl_tipo_documentos_NIS,
                'Numdoc' => $request->Numdoc,
                'Nombres' => $request->Nombres,
                'Apellidos' => $request->Apellidos,
                'Direccion' => $request->Direccion,
                'Telefono' => $request->Telefono,
                'Correo_Institucional' => $request->Correo_Institucional,
                'Correo_Personal' => $request->Correo_Personal,
                'Sexo' => $request->Sexo,
                'FechaNac' => $request->FechaNac,
                'tbl_eps_NIS' => $request->tbl_eps_NIS,
            ]);

            $password = Str::random(8);
            $passwordEncript = Hash::make($password);

            User::create(
                [
                    'name' => $request->Nombres,
                    'email' => $request->Correo_Institucional,
                    'password' => $passwordEncript,
                    'tbl_roles_administrativos_NIS' =>5
                ]
            );


                DB::commit();

             $instructor->notify(new  PasswordEmail($instructor->Correo_Institucional, $instructor->Nombres, $instructor->pellidos, $password));

                return back()->with('success', 'El instructor se ha registrado correctamente');

            } catch (\Exception $e) {
                DB::rollBack();
                return back()->with('error', 'Error al registrar el instructor'. $e->getMessage());
            }
        }



    /**
     * Display the specified resource.
     */
    public function show($NIS)
    {
        $instructor = instructor::findOrFail($NIS);
        return view('Instructor.show', compact('instructor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($NIS)
    {

        $instructor = instructor::findOrFail($NIS);
        $documento = tipodocumentos::all();
        $eps = eps::all();

        return view('Instructor.edit', compact('instructor', 'documento', 'eps'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $NIS)
    {

        $request->validate([
            'tbl_tipo_documentos_NIS' => 'required',
            'Numdoc' => 'required|numeric|digits_between:5,10|unique:tbl_instructor,Numdoc,' . $NIS . ',NIS',
            'Nombres' => 'required|string|max:100|min:2|regex:/^[\pL\s]+$/u',
            'Apellidos' => 'required|string|max:100|min:2|regex:/^[\pL\s]+$/u',
            'Direccion' => 'nullable|string|max:100|min:2|regex:/^[\pL0-9\s\.#-]+$/u',
            'Telefono' => 'required|numeric|digits_between:10,50|unique:tbl_instructor,Telefono,' . $NIS . ',NIS',
            'Correo_Institucional' => 'required|string|email|min:10|max:50|ends_with:.com|unique:tbl_instructor,Correo_Institucional,' . $NIS . ',NIS',
            'Correo_Personal' => 'required|string|email|min:10|max:50|ends_with:.com|unique:tbl_instructor,Correo_Personal,' . $NIS . ',NIS',
            'Sexo' => 'required|numeric',
            'FechaNac' => 'required|date|date_format:Y-m-d|before_or_equal:today',
            'tbl_eps_NIS' => 'required',


        ],
        [

            'tbl_tipo_documentos_NIS.required' => 'El tipo de documento es obligatorio',

            'Numdoc.required' => 'El número de documento es obligatorio',
            'Numdoc.numeric' => 'El número de documento debe ser numérico',
            'Numdoc.digits_between' => 'El número debe estar entre 5 y 20 dígitos',
            'Numdoc.unique' => 'El número de documento ya existe',

            'Nombres.required' => 'El nombres es obligatorio',
            'Nombres.max' => 'El nombre no puede exceder los 100 caracteres',
            'Nombres.min' => 'El nombre no puede contener menos de 2 caracteres',
            'Nombres.regex' => 'El nombre no puede contener números',

            'Apellidos.required' => 'El apellidos es obligatorio',
            'Apellidos.max' => 'El apellidos no puede exceder los 100 caracteres',
            'Apellidos.min' => 'El apellidos no puede contener menos de 2 caracteres',
            'Apellidos.regex' => 'El apellidos no puede contener números',

            'Direccion.max' => 'El dirección no puede exceder los 100 caracteres',
            'Direccion.min' => 'El dirección no puede contener menos de 2 caracteres',
            'Direccion.regex' => 'El apellidos no puede contener números',

            'Telefono.required' => 'El número teléfono es obligatorio',
            'Telefono.numeric' => 'El número teléfono debe ser numérico ',
            'Telefono.digits_between' => 'El número de teléfono debe estar entre 10 y 50 dígitos incluyendo espacios y signos',
            'Telefono.unique' => 'El numero ya se encuentra registrado en el sistema',

            'Correo_Institucional.required' => 'El correo es obligatorio',
            'Correo_Institucional.email' => 'El correo debe ser valido',
            'Correo_Institucional.unique' => 'El correo ya se encuentra registrado en el sistema',
            'Correo_Institucional.min' => 'El correo debe tener al menos 11 caracteres',
            'Correo_Institucional.max' => 'El correo debe tener al menos 50 caracteres',
            'Correo_Institucional.ends_with' => 'El correo debe terminar con el formato correcto, .com',

            'Correo_Personal.required' => 'El correo es obligatorio',
            'Correo_Personal.email' => 'El correo debe ser valido',
            'Correo_Personal.unique' => 'El correo ya se encuentra registrado en el sistema',
            'Correo_Personal.min' => 'El correo debe tener al menos 11 caracteres',
            'Correo_Personal.max' => 'El correo debe tener al menos 50 caracteres',
            'Correo_Personal.ends_with' => 'El correo debe terminar con el formato correcto, .com',

            'Sexo.required' => 'El sexo es obligatorio',

            'FechaNac.required' => 'La fecha de nacimiento es obligatoria',
            'FechaNac.before_or_equal' => 'La fecha de nacimiento no puede ser mayor a la fecha actual',
            'tbl_eps_NIS.required' => 'La eps es obligatoria',

        ]);
        DB::beginTransaction();

        try {

            $instructor = instructor::findOrFail($NIS);
           $instructor->update([
                'tbl_tipo_documentos_NIS' => $request->tbl_tipo_documentos_NIS,
                'Numdoc' => $request->Numdoc,
                'Nombres' => $request->Nombres,
                'Apellidos' => $request->Apellidos,
                'Direccion' => $request->Direccion,
                'Telefono' => $request->Telefono,
                'Correo_Institucional' => $request->Correo_Institucional,
                'Correo_Personal' => $request->Correo_Personal,
                'Sexo' => $request->Sexo,
                'FechaNac' => $request->FechaNac,
                'tbl_eps_NIS' => $request->tbl_eps_NIS
            ]);

            DB::commit();
            return redirect()->route('Instructores.index')->with('success', 'El instructor se ha actualizado correctamente');

        }catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Error al actualizar el instructor');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($NIS)
    {
        DB::beginTransaction();

        try {

            $instructor = instructor::findOrFail($NIS);
            $instructor->delete();
            DB::commit();
            return back()->with('success', 'El instructor se ha eliminado correctamente');

        }catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Error al eliminar el instructor');
        }
    }

    public function  VerBitacora()
    {
       $instructor  = Auth::user()->instructor->users_id;

        $aprendiz = aprendices::with('ficha_caracterizacion')
            ->whereRelation('ficha_caracterizacion', 'tbl_instructor_NIS', $instructor)
            ->paginate(10);

        return view('Bitacora.Bitacoras.bitacoras_aprendiz', compact('aprendiz'));



    }

    public function programa_asignado()
    {
        $fichas = Auth::user()->instructor->ficha;

        return view('Instructor.Programa_asignado.programa_asignado', compact('fichas'));

    }

    public function Programa_aprendices($NIS)
    {
        $ficha = fichacaracterizacion::where('NIS', $NIS)->first();
        $aprendiz = aprendices::where('tbl_ficha_caracterizacion_NIS', $NIS)->paginate(10);

        return view('Instructor.Programa_asignado.aprendis_asignado', compact('ficha','aprendiz'));

    }

    public function Aprendices_documentacion($NIS)
    {


    }



}
