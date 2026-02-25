<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class centroformacion extends Model
{
    protected $table = 'tbl_centro_formacion';

    protected $primaryKey = 'NIS';

    public $incrementing = false;

    protected $fillable = [
        'NIS',
        'Codigo',
        'Denominacion',
        'Direccion',
        'Observaciones',
        'tbl_regional_NIS'
    ];


    public function regional (){
        return $this->belongsTo(regional::class, 'tbl_regional_NIS');
    }

    public function ficha_caracterizacion(){
        return $this->hasMany(fichacaracterizacion::class, 'tbl_ficha_caracterizacion', 'NIS');
    }


}
