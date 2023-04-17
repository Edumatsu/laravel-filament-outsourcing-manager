<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PromoterResource\Pages;
use App\Models\Promoter;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Card;

class PromoterResource extends Resource
{
    protected static ?string $model = Promoter::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    TextInput::make('name')
                        ->maxLength(50)
                        ->required(),
                    TextInput::make('document')
                        ->maxLength(14)
                        ->required()
                        ->mask(fn(TextInput\Mask $mask) => $mask->pattern('000.000.000-00')),
                    DatePicker::make('birthday')->required()
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('name')->limit('50'),
                TextColumn::make('document')
                    ->limit('14')
                    ->formatStateUsing(fn (string $state): string => 
                    preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $state)
                    ),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPromoters::route('/'),
            'create' => Pages\CreatePromoter::route('/create'),
            'edit' => Pages\EditPromoter::route('/{record}/edit'),
        ];
    }    
}
