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
    
    protected $fillable = ['nombre',
                        'codigo',
                        'estado',
                        'imagen',
                        'precio',
                        'alto',
                        'color',
                        'ancho',
                        'tipo_medida',
                        'puntuacion',
                        'descripcion',
                        'importadora',
                        'categorias_id',
                        'disponibilidad',
                        'subcategorias_id',
                        'favoritos_id',
                        'cantidad_pedido',
                        'user_id',
                    ];
}