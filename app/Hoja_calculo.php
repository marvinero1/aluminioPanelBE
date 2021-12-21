<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hoja_calculo extends Model
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
                           'total',
                        ];

   
}
