<?php

namespace App\Filament\User\Resources\Fridges\Schemas;

use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class FridgeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Hidden::make('user_id')->default(fn() => auth()->id())->required(),
                TextInput::make('name')
                    ->required(),
                TextInput::make('location'),
            ]);
    }
}
