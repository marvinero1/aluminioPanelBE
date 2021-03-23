<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormaPago extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];
    
    public function pago(){
        return $this->belongsTo(Pago::class);
    }
}