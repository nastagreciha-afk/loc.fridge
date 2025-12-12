<?php

namespace App\Filament\User\Resources\Fridges\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class FridgeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('user_id')
                    ->required()
                    ->numeric(),
                TextInput::make('name')
                    ->required(),
                TextInput::make('location'),
            ]);
    }
}
