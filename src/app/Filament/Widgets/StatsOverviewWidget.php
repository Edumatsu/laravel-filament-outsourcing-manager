<?php
 
namespace App\Filament\Widgets;
 
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use App\Models\Allocation;
use App\Models\Promoter;
use App\Models\Pdv;
 
class StatsOverviewWidget extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Promoters', Promoter::query()->count()),
            Card::make('PDVs', Pdv::query()->count()),
            Card::make('Allocations', Allocation::query()->count()),
        ];
    }
}