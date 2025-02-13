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
        Schema::create('compromissos_publicos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tipo_id')->nullable()->constrained('compromisso_publico_tipos')->nullOnDelete();
            $table->date('data');
            $table->time('hora');
            $table->string('assunto');
            $table->string('local');
            $table->longText('participantes')->nullable();
            $table->longText('descricao')->nullable();
            $table->boolean('houve_recebido')->default(false);
            $table->longText('descricao_recebido')->nullable();
            $table->boolean('houve_viagem_custeio_privado')->default(false);
            $table->longText('descricao_viagem_custeio_privado')->nullable();
            $table->boolean('houve_ausencia')->default(false);
            $table->string('substitudo_ausencia')->nullable();
            $table->string('período_ausencia')->nullable();
            $table->timestamps();

            $table->index('tipo_id', 'tipo' );
            $table->index(['data', 'hora'], 'datahora' );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compromissos_publicos');
    }
};
