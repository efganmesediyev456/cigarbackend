<?php

namespace App\Filament\Resources\YearsOldResource\Pages;

use App\Filament\Resources\YearsOldResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditYearsOld extends EditRecord
{
    protected static string $resource = YearsOldResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
