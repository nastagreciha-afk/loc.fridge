<?php

namespace App\Filament\User\Resources\Fridges\Pages;

use App\Filament\User\Resources\Fridges\FridgeResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewFridge extends ViewRecord
{
    protected static string $resource = FridgeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
