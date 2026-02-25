<?php

namespace App\Http\Controllers;
use Illuminate\Database\QueryException;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Facades\DB;

class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $usuario = User::where('id', Auth::user()->id)->firstOrFail();
        return view('perfil.perfil', compact('usuario'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {


        $id = Auth::user()->id;

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|ends_with:.com|unique:users,email,' . $id . ',id',

        ],[
            'name.required' => 'Este campo es obligatorio',
            'email.required' => 'Este campo es obligatorio',
            'email.email' => 'Ingrese un correo válido',
            'email.ends_with' => 'El correo debe terminar en .com',
            'email.unique' => 'Este correo ya está registrado',

        ]);

        DB::beginTransaction();

        try {


            $usuario = user::findOrFail($id);

            $usuario->update([
                'name' =>$request->name,
                'email' => $request->email
            ]);

            DB::commit();

            return redirect()->back()->with('success', 'Actualizado correctamente');

        }catch (QueryException $e){
            return back()->with('error', 'Error al actualizar los datos. Intente nuevamente.');
            DB::rollBack();
        }catch (\Exception $e){
            return back()->with('error', 'Error al actualizar los datos. Intente nuevamente.');
            DB::rollBack();

        }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
