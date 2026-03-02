<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class planseguimientos extends Model
{

    public $timestamps = true;
    protected $table = 'tbl_plan_seguimientos';
    protected $primaryKey = 'NIS';

    protected $fillable = [
        'NIS',
        'Observaciones'

    ];
}
