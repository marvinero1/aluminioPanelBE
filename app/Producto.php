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
                        'imagen',
                        'precio',
                        'alto',
                        'color',
                        'ancho',
                        'tipo_medida',
                        'puntuacion',
                        'descripcion',
                        'confirmacion',
                        'importadora',
                        'categorias_id',
                        'user_id',
                        'subcategorias_id',
                        'favoritos_id',
                    ];

    public function categoria(){
        return $this->hasOne(Categoria::class,'id','categorias_id');
    }

    public function subcategoria(){
        return $this->hasOne(subcategoria::class,
            'id','subcategorias_id');
    }

}
