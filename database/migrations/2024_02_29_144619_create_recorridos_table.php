<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('recorridos', function (Blueprint $table) {
            $table->id();
            $table->integer('item_id');
            $table->string('descripcion');
            $table->string('operatividad');
            $table->string('fecha_reporte');
            $table->string('area')->default('8.820');
            $table->string('total_personal');
            $table->string('observaciones')->default('Sin observaciones relevantes');
            $table->string('responsable');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recorridos');
    }
};
