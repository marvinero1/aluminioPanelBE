<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class barra extends Model
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
    
    protected $fillable = ['linea',
                        'fam_linea',
                        'lado',
                        'largo',
                        'nombre',
                        'resta',
                        'piezas',
                        'perfil_id'];
}
