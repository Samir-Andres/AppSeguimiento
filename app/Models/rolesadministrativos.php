<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class rolesadministrativos extends Model
{
    protected $table = 'tbl_roles_administrativos';
    protected $primaryKey = 'NIS';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'NIS',
        'nombre',
        'descripcion'
    ];


    public function instructor(){
        return $this->hasMany(instructor::class, 'tbl_instructor', 'NIS');
    }
}
