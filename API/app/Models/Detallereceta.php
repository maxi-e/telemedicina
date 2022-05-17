<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detallereceta extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function receta(){
        return $this->belongsTo(Receta::class,'id_receta');
    }

    public function medicamento(){
        return $this->belongsTo(Medicamento::class,'id_medicamento');
    }
}
