<?php

namespace App\Filament\User\Resources\Products\Schemas;

use App\Models\Product;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('product_id')
                    ->required()
                    ->relationship('product', 'name')
                    ->preload()
                    ->searchable()
                ->afterStateUpdated(function ($state, callable $set) {
                    $product = Product::find($state);
                    $set('category_name', $product?->category?->name);
                    $set('unit', $product?->unit);
                }),
                TextInput::make('category_name')
                    ->label('Категория')
                    ->disabled()
                    ->dehydrated(false),

                TextInput::make('quantity')
                    ->required()
                    ->numeric()
                    ->default(1),

                TextInput::make('unit')
                    ->disabled(),

                DateTimePicker::make('expires_at'),
                DateTimePicker::make('arrived'),

                Select::make('fridge_id')
                    ->label('Fridge')
                    ->relationship('fridge', 'name')
                    ->searchable()
                    ->required(),
            ]);
    }
}
