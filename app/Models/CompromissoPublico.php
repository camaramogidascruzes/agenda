<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompromissoPublico extends Model
{
    /** @use HasFactory<\Database\Factories\CompromissoPublicoFactory> */
    use HasFactory;

    protected $table = 'compromissos_publicos';

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

}
