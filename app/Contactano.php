<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contactano extends Model
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

    protected $fillable = ['nombre',
                           'ciudad',
                           'telefono',
                            'whatsapp',
                    ];
}
