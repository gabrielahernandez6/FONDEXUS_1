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
        Schema::create('procesos_juridicos', function (Blueprint $table) {
            $table->id();
            $table->string('radicado')->unique();
            $table->string('titulo');
            $table->text('descripcion')->nullable();
            $table->string('estado')->default('abierto');
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_fin')->nullable();
            $table->string('entidad')->nullable();
            $table->foreignId('responsable_user_id')->nullable()->constrained('users')->nullOnDelete();

            $table->string('documento_path')->nullable();
            $table->string('documento_nombre')->nullable();
            $table->string('documento_mime')->nullable();
            $table->unsignedBigInteger('documento_size')->nullable();

            $table->json('metadata')->nullable();
            $table->timestamps();

            $table->index('estado');
            $table->index('fecha_inicio');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('procesos_juridicos');
    }
};
