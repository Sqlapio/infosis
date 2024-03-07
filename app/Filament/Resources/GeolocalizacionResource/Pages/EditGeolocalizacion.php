<?php

namespace App\Filament\Resources\GeolocalizacionResource\Pages;

use App\Filament\Resources\GeolocalizacionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGeolocalizacion extends EditRecord
{
    protected static string $resource = GeolocalizacionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
