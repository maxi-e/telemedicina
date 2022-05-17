<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function paciente(){
        return $this->belongsTo(Paciente::class,'id_paciente');
    }
    
    public function medico(){
        return $this->belongsTo(Medico::class,'id_medico');
    }

    public function detallerecetas(){
        return $this->hasMany(DetalleReceta::class,'id');
    }

}
