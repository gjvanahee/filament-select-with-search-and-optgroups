<?php

namespace App\Filament\Resources\OtherModelResource\Pages;

use App\Filament\Resources\OtherModelResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditOtherModel extends EditRecord
{
    protected static string $resource = OtherModelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
