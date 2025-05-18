<?php

namespace App\Filament\Resources\ChurchAdminResource\Pages;

use App\Filament\Resources\ChurchAdminResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditChurchAdmin extends EditRecord
{
    protected static string $resource = ChurchAdminResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
