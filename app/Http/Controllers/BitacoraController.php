<?php

namespace App\Http\Controllers;

use App\Models\alternativa;
use App\Models\aprendices;
use App\Models\bitacora;
use App\Notifications\BitacoraEmail;
use App\Notifications\SeguimientoBitacoraEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class BitacoraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bitacora =  Bitacora::where('users_id', Auth::id())->paginate(10);
        return view('Bitacora.index', compact('bitacora'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $user = Auth::user();
        return view('Bitacora.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf|max:2048',
        ],[
            'file.required' => 'El archivo es requerido',
            'file.mimes' => 'El archivo debe ser pdf',
        ]);

        $archivo = $request->file('file');

        $documento = 'Doc_' . Auth::id() . '_' . time() . '.' . $archivo->getClientOriginalExtension();

        $archivo->move(public_path('Documentos/bitacoras'), $documento);

        DB::beginTransaction();

        try {

          $bitacora =  bitacora::create([
                'file' => 'Documentos/bitacoras/' . $documento,
                'users_id' => Auth::id(),
            ]);

            $user = Auth::user();
            $user->notify(new BitacoraEmail($user->name, $user->email, $user->created_at));

            $aprendiz = aprendices::where('users_id', Auth::id())->first();

            if($aprendiz && $aprendiz->ficha_caracterizacion && $aprendiz->ficha_caracterizacion->instructores){

                $intructor = $aprendiz->ficha_caracterizacion->instructores;

                $intructor->notify( new SeguimientoBitacoraEmail($aprendiz, $bitacora ));

            }


            DB::commit();
            return redirect()->route('Bitacoras.index')->with('success', 'La bitácora ha sido creada correctamente');
        }catch (\Exception $e){
            DB::rollBack();
            return $e->getMessage();
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(bitacora $bitacora)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
       $bitacora = bitacora::findOrFail($id);

        return view('Bitacora.edit', compact('bitacora'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {



        $request->validate([
            'file' => 'mimes:pdf|max:2048',

        ],
        [
             'file.mimes' => 'El archivo debe ser pdf',
             'file.max' => 'El archivo no debe ser mayor a 2mb',
        ]
        );

        DB::beginTransaction();

        try {

            $bitacora = bitacora::findOrFail($id);

            if ($request->hasFile('file')) {

                $rutaAntigua = public_path($bitacora->file);

                if (file_exists($rutaAntigua) && !empty($bitacora->file) ) {
                    unlink($rutaAntigua);
                }

                $archivo = $request->file('file');

                $documento = 'Doc_' . Auth::id() . '_' . time() . '.' . $archivo->getClientOriginalExtension();
                $archivo->move(public_path('Documentos/bitacoras'), $documento);

               $bitacora->update([
                    'file' => 'Documentos/bitacoras/' . $documento,
                ]);

            }


            DB::commit();

            return back()->with('success', 'Archivo actualizado correctamente');

        }catch (\Exception $e){
            DB::rollBack();
            return back()->with('error', 'Error al actualizar');

        }



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        DB::beginTransaction();

        try {

            $bitacora = bitacora::findOrFail($id);

            $ruta = public_path($bitacora->file);

            $bitacora->delete();
            DB::commit();

            if (file_exists($ruta) && !empty($bitacora->file)) {
                unlink($ruta);
            }

            return back()->with('success', 'Bitácora eliminada correctamente');
        }catch (\Exception $e){
            DB::rollBack();
            return back()->with('error', 'Error al borrar la bitácora');
        }

    }

    public function download($id)
    {
        $bitacora = bitacora::findOrFail($id);

        $ruta = public_path($bitacora->file);

        if (file_exists($ruta)) {
            return response()->download($ruta);
        }

        return back()->with('error', 'No existe el archivo');

    }

}
