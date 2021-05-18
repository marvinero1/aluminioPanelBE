<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorito extends Model
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

    protected $fillable = ['productos_id',
                        'user_id',
                        'nombre',
                        'imagen',
                        'precio',
                        'color',
                        'codigo',
                        'importadora',
                        'articulos_id',
                        ];


    public function productos(){
        return $this->belongsTo(Producto::class);
    }
}
