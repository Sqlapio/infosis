<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GeolocalizacionResource\Pages;
use App\Filament\Resources\GeolocalizacionResource\RelationManagers;
use App\Models\Geolocalizacion;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GeolocalizacionResource extends Resource
{
    protected static ?string $model = Geolocalizacion::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('entrada')->required(),
                TextInput::make('latitud')->required(),
                TextInput::make('longitud')->required(),
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListGeolocalizacions::route('/'),
            'create' => Pages\CreateGeolocalizacion::route('/create'),
            'edit' => Pages\EditGeolocalizacion::route('/{record}/edit'),
        ];
    }
}
