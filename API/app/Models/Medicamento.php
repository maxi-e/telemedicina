<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{
    use HasFactory;

    public function detallerecetas(){
        return $this->hasMany(DetalleReceta::class,'id');
    }

}
