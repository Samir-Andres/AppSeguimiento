<?php

namespace App\Http\Controllers;

use App\Models\alternativa;
use App\Models\bitacora;
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
        $bitacora =  Bitacora::paginate();
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
        ]);

        $archivo = $request->file('file');

        $documento = 'Doc_' . Auth::id() . '_' . time() . '.' . $archivo->getClientOriginalExtension();

        $archivo->move(public_path('Documentos/bitacoras'), $documento);

        DB::beginTransaction();

        try {

            bitacora::create([
                'file' => $documento,
                'users_id' => Auth::id(),
            ]);

            DB::commit();

            return redirect()->route('Bitacoras.index')->with('success', 'La bitácora ha sido creada correctamente');

        }catch (\Exception $e){
            DB::rollBack();
            return  $e->getMessage();
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(bitacora $bitacora)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(bitacora $bitacora)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, bitacora $bitacora)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(bitacora $bitacora)
    {
        //
    }
}
