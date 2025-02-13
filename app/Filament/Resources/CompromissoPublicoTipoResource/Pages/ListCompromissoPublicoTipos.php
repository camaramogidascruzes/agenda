<?php

namespace App\Filament\Resources\CompromissoPublicoTipoResource\Pages;

use App\Filament\Resources\CompromissoPublicoTipoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCompromissoPublicoTipos extends ListRecords
{
    protected static string $resource = CompromissoPublicoTipoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
