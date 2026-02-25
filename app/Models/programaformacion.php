<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class programaformacion extends Model
{
    protected $table = 'tbl_programas_formacion';

    protected $primaryKey = 'NIS';
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'NIS',
        'Codigo',
        'Denominacion',
        'Observaciones'
    ];

    public function ficha_caracterizacion(){
        return $this->hasMany(fichacaracterizacion::class, 'tbl_ficha_caracterizacion', 'NIS');
    }



}
