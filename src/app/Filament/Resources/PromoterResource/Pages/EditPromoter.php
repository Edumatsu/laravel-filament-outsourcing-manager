<?php

namespace App\Filament\Resources\PromoterResource\Pages;

use App\Filament\Resources\PromoterResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPromoter extends EditRecord
{
    protected static string $resource = PromoterResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
