<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hoja_calculo_perfil extends Model
{
    protected $auditTimestamps = true;
    protected $auditStrict = true;
    protected $auditThreshold = 100;

    protected $auditEvents = [
        'created',
        'saved',
        'deleted',
        'restored',
        'updated'
    ];

    protected $fillable = ['user_id',
                           'estado',
                           'nombre_cliente',
                           'celular',
                           'suma_m2',
                           'descripcion',
                            ];

     
}