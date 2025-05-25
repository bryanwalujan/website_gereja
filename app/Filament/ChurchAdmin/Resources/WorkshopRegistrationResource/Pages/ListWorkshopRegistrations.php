<?php

namespace App\Filament\ChurchAdmin\Resources\WorkshopRegistrationResource\Pages;

use App\Filament\ChurchAdmin\Resources\WorkshopRegistrationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWorkshopRegistrations extends ListRecords
{
    protected static string $resource = WorkshopRegistrationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
