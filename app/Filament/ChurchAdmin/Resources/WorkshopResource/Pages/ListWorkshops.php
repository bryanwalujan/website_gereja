<?php

namespace App\Filament\ChurchAdmin\Resources\WorkshopResource\Pages;

use App\Filament\ChurchAdmin\Resources\WorkshopResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWorkshops extends ListRecords
{
    protected static string $resource = WorkshopResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
