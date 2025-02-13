<?php

namespace Database\Seeders;

use App\Models\CompromissoPublicoTipo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompromissoPublicoTipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CompromissoPublicoTipo::factory()->create([
            'nome' => 'Sessão Ordinária'
        ]);
        CompromissoPublicoTipo::factory()->create([
            'nome' => 'Audiência Pública'
        ]);
        CompromissoPublicoTipo::factory()->create([
            'nome' => 'Evento'
        ]);
        CompromissoPublicoTipo::factory()->create([
            'nome' => 'Reunião'
        ]);
        CompromissoPublicoTipo::factory()->create([
            'nome' => 'Audiência'
        ]);
        CompromissoPublicoTipo::factory()->create([
            'nome' => 'Despacho Interno'
        ]);
    }
}
