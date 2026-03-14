<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;

class aprendices extends Model
{

    use Notifiable;
    protected $table = 'tbl_aprendices';

    protected $primaryKey = 'NIS';

    public $incrementing = false;

    public $timestamps = false;

    protected $fillable = [
        'NIS',
        'tbl_tipo_documentos_NIS',
        'Numdoc',
        'Nombres',
        'Apellidos',
        'Direccion',
        'Telefono',
        'Correo_Institucional',
        'Correo_Personal',
        'Sexo',
        'FechaNac',
        'tbl_eps_NIS',
        'tbl_ficha_caracterizacion_NIS',
        'users_id'
    ];


    // Un aprendiz pertene a
    public function tipos_documentos()
    {
        return $this->belongsTo(tipodocumentos::class, 'tbl_tipo_documentos_NIS');
    }
    public function eps()
    {
        return $this->belongsTo(eps::class, 'tbl_eps_NIS');
    }
        public function ficha_caracterizacion()
    {
        return $this->belongsTo(fichacaracterizacion::class, 'tbl_ficha_caracterizacion_NIS');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function bitacora(){
        return $this->hasMany(bitacora::class, 'tbl_aprendices_NIS', 'NIS');
    }

    public function bitacoras_pendientes()
    {
        return $this->hasMany(bitacora::class, 'tbl_aprendices_NIS', 'NIS')
            ->where('estado', 'Creada');
    }

    public function bitacoras_aprobadas()
    {
        return $this->hasMany(bitacora::class, 'tbl_aprendices_NIS', 'NIS')
            ->where('estado', 'Aprobada');

    }

    public function routeNotificationForMail($notification)
    {

        return $this->Correo_Institucional;

    }

}
