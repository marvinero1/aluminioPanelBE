<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class calculadoraHistorial extends Model
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

    protected $fillable = [	'nombre_cliente',
    					   	'celular',
    					   	'descripcion',
                        	'precio',
                        	'total_suma',
                            'suma_m2',
                            'hoja_calculo_id',
                    		'user_id',];
}