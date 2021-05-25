<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class carrito_detalle extends Model
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
    
    protected $fillable = [ 'cantidad_pedido',
                            'importadora',
                            'nombre',
                            'imagen',
                            'precio',
                            'color',
                            'ancho',
                            'alto',
                            'codigo',
                            'descripcion',
                            'tipo_medida',
                            'carro_id',
                            'categorias_id',
                            'subcategorias_id',

                        ];

}
