<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class instructor extends Model
{
    protected $table = 'tbl_instructor';

    protected $primaryKey = 'NIS';

    public $incrementing = false;

    protected $fillable = [
        'NIS',
        'Numdoc',
        'Nombres',
        'Apellidos',
        'Direccion',
        'Telefono',
        'Correo_Institucional',
        'Correo_Personal',
        'Sexo',
        'FechaNac',
        'tbl_tipo_documentos_NIS',
        'tbl_eps_NIS',
        'tbl_roles_administrativos_NIS'
    ];


    public function tipo_documentos(){
        return $this->belongsTo(tipodocumentos::class, 'tbl_tipo_documentos_NIS');
    }

    public function eps(){
        return $this->belongsTo(eps::class, 'tbl_eps_NIS');
    }

    public function roles_administrativos(){
        return $this->belongsTo(rolesadministrativos::class, 'tbl_roles_administrativos_NIS');
    }


}
