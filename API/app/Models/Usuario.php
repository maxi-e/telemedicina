<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    public function paciente(){
        return $this->hasMany(Paciente::class,'id');
    }
    
    public function medico(){
        return $this->hasMany(Medico::class,'id');
    }

}
