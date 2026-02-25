<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class aprendices extends Model
{
    protected $table = 'tbl_aprendices';

    protected $primaryKey = 'NIS';

    public $incrementing = false;

    public $timestamps = false;

    protected $fillable = [
        'NIS',
        'tbl_tipo_documentos_NIS',
        'Numdoc',
        'Nombres',
        'Apellidos',
        'Direccion',
        'Telefono',
        'Correo_Institucional',
        'Correo_Personal',
        'Sexo',
        'FechaNac',
        'tbl_eps_NIS',
        'tbl_ficha_caracterizacion_NIS'
    ];


    // Un aprendiz pertene a
    public function tipos_documentos()
    {
        return $this->belongsTo(tipodocumentos::class, 'tbl_tipo_documentos_NIS');
    }
    public function eps()
    {
        return $this->belongsTo(eps::class, 'tbl_eps_NIS');
    }
    public function ficha_caracterizacion()
    {
        return $this->belongsTo(fichacaracterizacion::class, 'tbl_ficha_caracterizacion_NIS');
    }


}
