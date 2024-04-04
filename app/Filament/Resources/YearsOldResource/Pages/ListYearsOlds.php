<?php

namespace App\Filament\Resources\YearsOldResource\Pages;

use App\Filament\Resources\YearsOldResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListYearsOlds extends ListRecords
{
    protected static string $resource = YearsOldResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
