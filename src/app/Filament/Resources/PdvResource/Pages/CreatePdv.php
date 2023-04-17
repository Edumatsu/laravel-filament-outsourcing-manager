<?php

namespace App\Filament\Resources\PdvResource\Pages;

use App\Filament\Resources\PdvResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePdv extends CreateRecord
{
    protected static string $resource = PdvResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
