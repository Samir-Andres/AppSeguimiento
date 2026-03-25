<?php

namespace App\Http\Controllers;

use App\Mail\Contactanos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactanosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('contactanos');
    }

   public function Informacion(Request $request){

        $request->validate([
            'Nombres' => 'required|string|max:255|min:3',
            'email' => 'required|string|email|max:255',
            'Telefono' => 'required|numeric|digits_between:9,10',
            'Asunto' => 'required|string|max:255|min:3',
        ],[
            'Nombres.required' => 'El nombres es requerido',
            'Nombres.string' => 'El nombres debe contener solo letras',
            'Nombre.max' => 'El nombres debe contener como maximo 100 caracteres',
            'Nombre.min' => 'El nombres debe contener mínimo 3 caracteres',

            'email.required' => 'El correo es requerido',
            'email.ends_with' => 'El correo debe terminar con el formato correcto, .com',

            'Telefono.required' => 'El teléfono es requerido',
            'Telefono.numeric' => 'El teléfono es numérico',
            'Telefono.digits_between' => 'El teléfono debe estar entre 9 a 10 digitos',


            'Asunto.required' => 'El asunto es requerido',
            'Asunto.string' => 'El asunto debe contener solo letras',
            'Asunto.max' => 'El asunto debe contener como maximo 255 caracteres',
            'Asunto.min' => 'El asunto debe contener como minimo 3 caracteres',
        ]);

        Mail::to('samirandres296@gmail.com')->send(new Contactanos($request->all()));


       return redirect()->route('contactanos.index')->with('info', 'Mensaje enviado exitosamente');


   }
}
