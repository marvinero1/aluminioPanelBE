<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
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
                    ];

    public function categoria(){
        return $this->hasOne(Categoria::class,'id');
    }

    public function subcategoria(){
        return $this->hasMany(subcategoria::class,'id');
    }
}
