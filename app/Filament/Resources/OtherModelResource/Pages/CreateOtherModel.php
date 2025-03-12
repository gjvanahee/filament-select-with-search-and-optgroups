<?php

namespace App\Filament\Resources\OtherModelResource\Pages;

use App\Filament\Resources\OtherModelResource;
use Filament\Resources\Pages\CreateRecord;

class CreateOtherModel extends CreateRecord
{
    protected static string $resource = OtherModelResource::class;

    protected function getHeaderActions(): array
    {
        return [

        ];
    }
}
