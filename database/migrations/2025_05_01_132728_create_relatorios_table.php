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
    {Schema::create('relatorios', function (Blueprint $table) {
        $table->id();
        $table->foreignId('colaborador_id')->constrained('colaboradores')->onDelete('cascade');
        $table->enum('tipo', ['diario', 'semanal', 'mensal']);
        $table->date('data_inicio');
        $table->date('data_fim');
        $table->integer('total_horas');
        $table->integer('total_horas_extras');
        $table->integer('estado')->default(1);
        $table->dateTime('created_at')->useCurrent();
        $table->dateTime('updated_at')->useCurrent()->useCurrentOnUpdate();
    });
    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('relatorios');
    }
};
