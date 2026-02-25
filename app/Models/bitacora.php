<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class bitacora extends Model
{

    protected $table = 'tbl_bitacora';
    protected $incremental = true;
    protected $primaryKey = 'id';
    public $timestamps  = true;

    protected $fillable = [
        'file',
        'users_id'

    ];

    public function Usuarios(){
        return $this->belongsTo(User::class,'users_id');
}


}
