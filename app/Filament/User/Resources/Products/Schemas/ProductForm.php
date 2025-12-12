<?php

namespace App\Filament\User\Resources\Products\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('category_id')
                    ->required()
                    ->numeric(),
                TextInput::make('quantity')
                    ->required()
                    ->numeric()
                    ->default(1),
                TextInput::make('unit'),
                DateTimePicker::make('expires_at'),
                DateTimePicker::make('arrived'),
                TextInput::make('fridge_id')
                    ->required()
                    ->numeric(),
            ]);
    }
}
