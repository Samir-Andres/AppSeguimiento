<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class entecoformadores extends Model
{
    protected $table = 'tbl_ente_coformadores';

    protected $primaryKey = 'id';

    public $incrementing = false;

    protected $fillable = [
        'NIS',
        'Tdoc',
        'Numdoc',
        'Razon_Social',
        'Direccion',
        'Telefono',
        'Correo_Institucional'
    ];
    
}
