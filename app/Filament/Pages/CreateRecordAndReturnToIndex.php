<?php

namespace App\Filament\Pages;

use Filament\Resources\Pages\CreateRecord;

class CreateRecordAndReturnToIndex extends CreateRecord
{
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
