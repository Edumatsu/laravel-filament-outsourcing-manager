<?php

namespace App\Filament\Resources\PromoterResource\Pages;

use App\Filament\Resources\PromoterResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePromoter extends CreateRecord
{
    protected static string $resource = PromoterResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
