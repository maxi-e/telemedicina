<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallerecetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detallerecetas', function (Blueprint $table) {
            $table->id();
            $table->string('indicacion');
            $table->string('cantidad');
            $table->foreignId('id_receta')
            ->nullable()
            ->constrained('recetas')
            ->cascadeOnUpdate()
            ->nullOnDelete();
            $table->foreignId('id_medicamento')
            ->nullable()
            ->constrained('medicamentos')
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
        Schema::dropIfExists('detallerecetas');
    }
}
