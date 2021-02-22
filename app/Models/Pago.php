<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pago extends Model
{   
    use HasFactory,SoftDeletes;

    protected $guarded = [];
   
    public function pedido(){
        return $this->hasMany(Pedido::class);
    }

    public function forma(){
        return $this->hasOne(FormaPago::class);
    }
}
