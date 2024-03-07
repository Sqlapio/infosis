<?php

namespace App\Filament\Resources\GeolocalizacionResource\Pages;

use App\Filament\Resources\GeolocalizacionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGeolocalizacions extends ListRecords
{
    protected static string $resource = GeolocalizacionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
