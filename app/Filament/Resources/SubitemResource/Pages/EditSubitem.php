<?php

namespace App\Filament\Resources\SubitemResource\Pages;

use App\Filament\Resources\SubitemResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSubitem extends EditRecord
{
    protected static string $resource = SubitemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
