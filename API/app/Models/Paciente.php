<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    public function usuario(){
        return $this->belongsTo(Usuario::class,'id_usuario');
    }

    public function recetas(){
        return $this->hasMany(Receta::class,'id');
    }
}
