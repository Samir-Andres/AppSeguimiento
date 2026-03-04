<?php

namespace App\Http\Controllers;

use App\Models\regional;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegionalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $regionales = regional::paginate(5);
        return view('regional.index', compact('regionales'));
    }


    public function ConsultarRegional(){

        return view('regional.Consultar');
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
    public function show(regional $regional)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(regional $regional)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, regional $regional)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(regional $regional)
    {
        //
    }

    public function buscar(Request $request)
    {
        if ($request->ajax()) {

            $salida = "";

            $regionales = DB::table("tbl_regional")
                ->where('Denominacion', 'LIKE', '%' . $request->buscar . '%')
                ->orwhere('Codigo', 'LIKE', '%' . $request->buscar . '%')
                ->paginate(10);

            if ($regionales->count() > 0) {

                foreach ($regionales as $regional) {

                    $observacion = !empty(trim($regional->Observaciones))
                        ? $regional->Observaciones
                        : "<span class='text-gray-400 italic'>No tiene información</span>";

                    $salida .= "<tr class='bg-white border-b hover:bg-gray-50'>" .
                        "<td class='px-6 py-3 whitespace-nowrap'' >" . $regional->NIS . "</td>" .
                        "<td class='px-6 py-3 whitespace-nowrap'>" . $regional->Codigo . "</td>" .
                        "<td class='px-6 py-3 whitespace-nowrap''>" . $regional->Denominacion . "</td>" .
                        "<td class='px-6 py-3 whitespace-nowrap'>" . $observacion . "</td>" .
                        "</tr>";
                }

            } else {

                $salida .= "<tr>
                <td colspan='4' class='text-center mt-3 p-4'>No hay resultados</td>
            </tr>";
            }

            return response($salida);
        }
    }

}
