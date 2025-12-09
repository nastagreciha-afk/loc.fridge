<?php

namespace App\Filament\Resources\Fridges\Pages;

use App\Filament\Resources\Fridges\FridgeResource;
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
