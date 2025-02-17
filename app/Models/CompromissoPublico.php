<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CompromissoPublico extends Model
{
    /** @use HasFactory<\Database\Factories\CompromissoPublicoFactory> */
    use HasFactory;

    protected $table = 'compromissos_publicos';

    protected $with = ['tipo'];
    protected $fillable = [
        'tipo_id',
        'data',
        'hora',
        'assunto',
        'local',
        'descricao',
        'participantes',
        'houve_recebido',
        'descricao_recebido',
        'houve_viagem_custeio_privado',
        'descricao_viagem_custeio_privado',
        'houve_ausencia',
        'substitudo_ausencia',
        'periodo_ausencia',
    ];

    protected function casts(): array
    {
        return [
            'data' => 'date',
        ];
    }

    public function tipo(): BelongsTo
    {
        return $this->belongsTo(CompromissoPublicoTipo::class, 'tipo_id');
    }

}
