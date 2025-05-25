<?php

namespace App\Filament\ChurchAdmin\Resources\WorkshopResource\Pages;

use App\Filament\ChurchAdmin\Resources\WorkshopResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWorkshop extends EditRecord
{
    protected static string $resource = WorkshopResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
