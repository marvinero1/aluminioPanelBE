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
                        'estado',
                        'repeticion',
                        'descripcion',
                        'user_id',
                        'precio',
                    ];

    public function barra(){
        return $this->belongsTo(barra::class,'id','perfil_id');
    }

    public function hoja_perfil(){
        return $this->hasOne(hoja_calculo_perfil::class,'id');
    }
}
