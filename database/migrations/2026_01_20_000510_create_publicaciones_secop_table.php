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
        Schema::create('publicaciones_secop', function (Blueprint $table) {
            $table->id();
            $table->foreignId('proceso_juridico_id')->nullable()->constrained('procesos_juridicos')->nullOnDelete();
            $table->string('secop_id')->unique();
            $table->string('fuente')->nullable();
            $table->string('titulo');
            $table->text('url');
            $table->date('fecha_publicacion')->nullable();
            $table->decimal('valor', 18, 2)->nullable();
            $table->string('entidad')->nullable();
            $table->string('estado')->nullable();
            $table->json('payload')->nullable();
            $table->timestamps();

            $table->index('fecha_publicacion');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publicaciones_secop');
    }
};
