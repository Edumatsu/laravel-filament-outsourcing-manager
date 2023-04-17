<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PdvResource\Pages;
use App\Models\Pdv;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Card;
class PdvResource extends Resource
{
    protected static ?string $model = Pdv::class;

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
                        ->maxLength(18)
                        ->required()
                        ->mask(fn(TextInput\Mask $mask) => $mask->pattern('00.000.000/0000-00')),
                        Toggle::make('active')->inline(),
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
                    ->limit('18')
                    ->formatStateUsing(fn (string $state): string => 
                        preg_replace("/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/", "\$1.\$2.\$3/\$4-\$5", $state)
                    ),
                ToggleColumn::make('active'),
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
            'index' => Pages\ListPdvs::route('/'),
            'create' => Pages\CreatePdv::route('/create'),
            'edit' => Pages\EditPdv::route('/{record}/edit'),
        ];
    }    
}
