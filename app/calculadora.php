<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class calculadora extends Model
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
    					   'numero1',
    					   'numero2',
                        'resultado',
                        
                    ];
}
