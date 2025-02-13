<?php

namespace App\Filament\Resources\CompromissoPublicoResource\Pages;

use App\Filament\Pages\CreateRecordAndReturnToIndex;
use App\Filament\Resources\CompromissoPublicoResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCompromissoPublico extends CreateRecordAndReturnToIndex
{
    protected static string $resource = CompromissoPublicoResource::class;
}
