<?php

namespace App\Filament\ChurchAdmin\Resources\ChurchResource\Pages;

use App\Filament\ChurchAdmin\Resources\ChurchResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditChurch extends EditRecord
{
    protected static string $resource = ChurchResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
