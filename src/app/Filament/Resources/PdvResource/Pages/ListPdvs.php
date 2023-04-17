<?php

namespace App\Filament\Resources\PdvResource\Pages;

use App\Filament\Resources\PdvResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPdvs extends ListRecords
{
    protected static string $resource = PdvResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
