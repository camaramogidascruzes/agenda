<?php

namespace App\Filament\Resources\CompromissoPublicoResource\Pages;

use App\Filament\Resources\CompromissoPublicoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCompromissoPublicos extends ListRecords
{
    protected static string $resource = CompromissoPublicoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
