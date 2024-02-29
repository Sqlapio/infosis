<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubitemResource\Pages;
use App\Filament\Resources\SubitemResource\RelationManagers;
use App\Models\Subitem;
use Filament\Forms;
use Filament\Tables\Grouping\Group;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class SubitemResource extends Resource
{
    protected static ?string $model = Subitem::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'SubItems';

    protected static ?string $navigationGroup = 'Mentenimientos';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('descripcion')

                    ->required(),
                Select::make('item_id')
                    ->relationship('get_items', 'descripcion')
                    ->label('Item padre')
                    ->searchable()
                    ->preload()
                    ->required(),
                TextInput::make('porcentaje')
                    ->prefix('%')
                    ->numeric()
                    ->minValue(1)
                    ->maxValue(100)
                    ->required(),
                TextInput::make('responsable')->default(Auth::user()->name)->disabled()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('get_items.descripcion')
                    ->searchable()
                    ->sortable()
                    ->label('Item principal'),
                TextColumn::make('descripcion')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('porcentaje'),
                TextColumn::make('created_at')
                    ->searchable()
                    ->sortable()
                    ->datetime(),
            ])
            ->groups([
                Group::make('get_items.descripcion')->label('Item'),
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
