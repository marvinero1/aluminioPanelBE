<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    
    
    public function categoria(){
        return $this->hasOne(Categoria::class,'id');
    }
}
