<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
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
    
    protected $fillable = ['alto',
                        'ancho',
                        'combinacion',
                        'categoria',
                        'hoja_id',
                        'linea',
                        'repeticion',
                        'user_id',
                    ];
}
