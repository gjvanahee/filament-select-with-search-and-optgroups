<?php

namespace App\Filament\Resources\OtherModelResource\Pages;

use App\Filament\Resources\OtherModelResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListOtherModels extends ListRecords
{
    protected static string $resource = OtherModelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
