<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class subtiposalternativa extends Model
{
    protected $table = 'tbl_subtipos_alternativa';

    protected $primaryKey = 'id';

    public $incrementing = false;

    protected $fillable = [
        'id',
        'nombre',
        'descripcion',
        'estado',
        'tbl_alternativa_id'
    ];


    // Un subtipo pertenece a una alternativa
    public function alternativa()
    {
        return $this->belongsTo(alternativa::class, 'tbl_alternativa_id');
    }
    
}
