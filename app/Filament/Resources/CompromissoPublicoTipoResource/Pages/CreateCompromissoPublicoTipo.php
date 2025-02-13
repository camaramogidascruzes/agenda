<?php

namespace App\Filament\Resources\CompromissoPublicoTipoResource\Pages;

use App\Filament\Pages\CreateRecordAndReturnToIndex;
use App\Filament\Resources\CompromissoPublicoTipoResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCompromissoPublicoTipo extends CreateRecordAndReturnToIndex
{
    protected static string $resource = CompromissoPublicoTipoResource::class;
}
