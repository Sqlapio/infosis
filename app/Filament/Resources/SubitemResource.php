<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubitemResource\Pages;
use App\Filament\Resources\SubitemResource\RelationManagers;
use App\Models\Subitem;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SubitemResource extends Resource
{
    protected static ?string $model = Subitem::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('descripcion')->required(),
                Select::make('item_id')
                    ->relationship('get_subitems', 'descripcion')
                    ->searchable()
                    ->preload()
                    ->required(),
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
            'index' => Pages\ListSubitems::route('/'),
            'create' => Pages\CreateSubitem::route('/create'),
            'edit' => Pages\EditSubitem::route('/{record}/edit'),
        ];
    }
}
