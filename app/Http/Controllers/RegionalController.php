<?php

namespace App\Http\Controllers;

use App\Models\regional;
use Illuminate\Http\Request;

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
}
