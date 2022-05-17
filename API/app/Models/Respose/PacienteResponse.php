<?php

namespace App\Models;

use App\Models\Paciente as ModelsPaciente;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Paciente extends ModelsPaciente
{
    use HasFactory;

    //protected $usuarios = new Usuario();
    
    // public function usuarios(){
    //     return $this->belongsTo(Usuario::class,'id_usuario');
    // }
}
