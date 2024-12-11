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
        Schema::create('prestamos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('ejemplar_id')->constrained('ejemplares');
            $table->foreignId('cliente_id')->constrained();
            $table->timestamp('fecha_hora');
            $table->dateTime('fecha_devolucion')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestamos');
    }
};
