<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class eps extends Model
{
    protected $table = 'tbl_eps';

    protected $primaryKey = 'NIS';

    public $incrementing = false;

    public $timestamps = false;

    protected $fillable = [
        'NIS',
        'Numdoc',
        'Denominacion',
        'Observaciones'
    ];


    public function aprendices(){
        return $this->hasMany(aprendices::class, 'tbl_aprendices', 'NIS');
    }

    public function instructor(){
        return $this->hasMany(instructor::class, 'tbl_instructor', 'NIS');
    }

}
