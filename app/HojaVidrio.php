<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HojaVidrio extends Model
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

    protected $fillable = ['estado',
                           'nombre_cliente',
                           'celular',
                           'ancho_lamina',
                           'alto_lamina',
                           'suma_m2',
                           'descripcion',
                           'user_id',
                        ];
}
