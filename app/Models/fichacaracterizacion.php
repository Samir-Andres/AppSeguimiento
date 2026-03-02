<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class fichacaracterizacion extends Model
{
    protected $table = 'tbl_ficha_caracterizacion';

    protected $primaryKey = 'NIS';

    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'NIS',
        'Codigo',
        'Denominacion',
        'Cupos',
        'Fecha_Inicio',
        'Fecha_Fin',
        'Observacaiones',
        'tbl_centro_formacion_NIS',
        'tbl_programas_formacion_NIS',
        'tbl_instructor_NIS'
    ];


    public function aprendices(){
        return $this->hasMany(aprendices::class, 'tbl_ficha_caracterizacion_NIS', 'NIS');
    }

    public function centro_formacion(){
        return $this->belongsTo(centroformacion::class, 'tbl_centro_formacion_NIS');

    }
    public function programa_formacion(){
        return $this->belongsTo(programaformacion::class, 'tbl_programas_formacion_NIS');

    }
    public function instructores(){
        return $this->belongsTo(instructor::class, 'tbl_instructor_NIS');
    }


}
