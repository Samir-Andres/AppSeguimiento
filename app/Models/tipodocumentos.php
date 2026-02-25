<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tipodocumentos extends Model
{
    protected $table = 'tbl_tipo_documentos';

    protected $primaryKey = 'NIS';

    public $incrementing = false;

    protected $fillable = [
        'NIS',
        'Denominacion',
        'Observacaiones'
    ];

    public function aprendices (){
        return $this->hasMany(aprendices::class, 'tbl_aprendices', 'NIS');
    }

    public function instructor(){
        return $this->hasMany(instructor::class, 'tbl_instructor', 'NIS');
    }
    
}
