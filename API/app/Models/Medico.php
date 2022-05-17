<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;
    
    public function usuario(){
        return $this->belongsTo(Usuario::class,'id');
    }

    public function recetas(){
        return $this->hasMany(Receta::class,'id');
    }
}
