<?php

namespace App\Filament\User\Resources\Fridges\Pages;

use App\Filament\User\Resources\Fridges\FridgeResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFridges extends ListRecords
{
    protected static string $resource = FridgeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
