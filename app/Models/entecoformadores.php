<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class entecoformadores extends Model
{
    protected $table = 'tbl_ente_coformadores';

    protected $primaryKey = 'NIS';

    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'NIS',
        'tbl_tipo_documentos_NIS',
        'Numdoc',
        'Razon_Social',
        'Direccion',
        'Telefono',
        'Correo_Institucional'
    ];

    public function tbl_tipodocumento(){
        return $this->belongsTo(tipodocumentos::class,'tbl_tipo_documentos_NIS',);
    }
}
