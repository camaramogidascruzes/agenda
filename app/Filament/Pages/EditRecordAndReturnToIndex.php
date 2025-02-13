<?php

namespace App\Filament\Pages;

use Filament\Resources\Pages\EditRecord;

class EditRecordAndReturnToIndex extends EditRecord
{
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
