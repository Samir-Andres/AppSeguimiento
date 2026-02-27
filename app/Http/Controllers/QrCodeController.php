<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrCodeController extends Controller
{
    public function index()
    {

        $ruta = route('Bitacoras.index');
        $qrCode = QrCode::size(250)
        ->color(79, 70, 229)
        ->margin(1)
        ->generate($ruta);

        return view('Bitacora.qr', compact('qrCode'));
    }

}
