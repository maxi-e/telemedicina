<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recetas', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->boolean('entregado');
            $table->foreignId('id_medico')
            ->nullable()
            ->constrained('medicos')
            ->cascadeOnUpdate()
            ->nullOnDelete();
            $table->foreignId('id_paciente')
            ->nullable()
            ->constrained('pacientes')
            ->cascadeOnUpdate()
            ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recetas');
    }
}
