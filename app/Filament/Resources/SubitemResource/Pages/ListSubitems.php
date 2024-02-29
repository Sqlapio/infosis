<?php

namespace App\Filament\Resources\SubitemResource\Pages;

use App\Filament\Resources\SubitemResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSubitems extends ListRecords
{
    protected static string $resource = SubitemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
