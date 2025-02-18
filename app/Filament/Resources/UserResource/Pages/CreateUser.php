<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Pages\CreateRecordAndReturnToIndex;
use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecordAndReturnToIndex
{
    protected static string $resource = UserResource::class;
}
