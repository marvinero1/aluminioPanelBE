<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CalculoVidrio extends Model{

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

    protected $fillable = [ 'user_id',
                            'numero1',
                            'numero2',
                            'piezas',
                            'hoja_calculo_id'];
}
