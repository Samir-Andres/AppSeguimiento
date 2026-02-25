<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class alternativa extends Model
{
    protected $table = 'tbl_alternativa';
    protected $primaryKey = 'id';
    protected $timestamp = false;
    protected $fillable = [
     'id',
     'nombre',
     'descripcion',
     'estado',
     'password'
    ];

    /*
    protected $casts = [
        'password' => 'hashed',
    ];..
*/
    // Una alternativa tiene muchos subtipos
    public function subtipos_alternativa() {
    return $this->hasMany(subtiposalternativa::class, 'tbl_subtipos_alternativa', 'id');
}


}
