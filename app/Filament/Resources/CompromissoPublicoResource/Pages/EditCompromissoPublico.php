<?php

namespace App\Filament\Resources\CompromissoPublicoResource\Pages;

use App\Filament\Pages\EditRecordAndReturnToIndex;
use App\Filament\Resources\CompromissoPublicoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCompromissoPublico extends EditRecordAndReturnToIndex
{
    protected static string $resource = CompromissoPublicoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
