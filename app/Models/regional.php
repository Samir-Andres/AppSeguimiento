<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class regional extends Model
{
    protected $table = 'tbl_regional';

    protected $primaryKey = 'NIS';

    public $incrementing = false;

    protected $fillable = [
        'NIS',
        'Codigo',
        'Denominacion',
        'Observacaiones'
    ];

    public function centro_formacion(){
        return $this->hasMany(centroformacion::class, 'tbl_centro_formacion', 'NIS');
    }
}
