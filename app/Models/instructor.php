<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class instructor extends Model
{

    use Notifiable;
    protected $table = 'tbl_instructor';

    protected $primaryKey = 'NIS';

    public $incrementing = false;

    public $timestamps = false;

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



    public  function  ficha_caractetizacion_Nis()
    {
        return $this->hasMany(fichacaracterizacion::class, 'tbl_ficha_caracterizacion', 'NIS');

    }

    public  function routeNotificationForMail($notification){

        return $this->Correo_Institucional;
    }

    public function user()

{
    return $this->hasOne(User::class, 'users_id', 'id');

}


}
