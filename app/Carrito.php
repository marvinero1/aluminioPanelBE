<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
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
    
    protected $fillable = [ 'estado',
                            'descripcion',
                            'importadora',
                            'confirmacion',
                            'user_id',
                        ];

    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }
}
