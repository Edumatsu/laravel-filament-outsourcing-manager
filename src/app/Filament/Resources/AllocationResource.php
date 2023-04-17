<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AllocationResource\Pages;
use App\Models\Allocation;
use App\Models\Promoter;
use App\Models\Pdv;
use Filament\Forms\Components\Card;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Tables;

class AllocationResource extends Resource
{
    protected static ?string $model = Allocation::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    TextInput::make('campaign')
                        ->maxLength(100)
                        ->required(),
                    DatePicker::make('date')->required(),
                    Select::make('promoter_id')
                        ->label('Promoter')
                        ->options(Promoter::all()->pluck('name', 'id'))
                        ->searchable(),
                    Select::make('pdv_id')
                        ->label('PDV')
                        ->options(Pdv::all()->pluck('name', 'id'))
                        ->searchable(),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('campaign')->limit('100'),
                TextColumn::make('promoter.name')->limit('50'),
                TextColumn::make('pdv.name')->limit('50'),
                TextColumn::make('date')->date(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAllocations::route('/'),
            'create' => Pages\CreateAllocation::route('/create'),
            'edit' => Pages\EditAllocation::route('/{record}/edit'),
        ];
    }    
}
