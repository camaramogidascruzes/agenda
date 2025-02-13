<?php

namespace App\Filament\Resources\CompromissoPublicoTipoResource\Pages;

use App\Filament\Pages\EditRecordAndReturnToIndex;
use App\Filament\Resources\CompromissoPublicoTipoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCompromissoPublicoTipo extends EditRecordAndReturnToIndex
{
    protected static string $resource = CompromissoPublicoTipoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
