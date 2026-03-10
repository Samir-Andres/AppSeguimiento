<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class bitacora extends Model
{

    protected $table = 'tbl_bitacora';
    protected $incremental = true;
    protected $primaryKey = 'id';
    public $timestamps  = true;

    protected $fillable = [
        'id',
        'file',
        'estado',
        'users_id',
        'tbl_aprendices_NIS'
    ];

    public function Usuarios(){
        return $this->belongsTo(User::class,'users_id');
}

public function aprendiz(){
        return $this->belongsTo(aprendices::class,'tbl_aprendices_NIS', 'NIS');
}


}
