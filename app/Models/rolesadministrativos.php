<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class rolesadministrativos extends Model
{
    protected $table = 'tbl_roles_administrativos';
    protected $primaryKey = 'NIS';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'NIS',
        'nombre',
        'descripcion'
    ];


    public function user(){
        return $this->hasMany(User::class, 'users');
    }
}
