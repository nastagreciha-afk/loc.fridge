<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Tiptap\Nodes\Text;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
             Section::make('Main Information')
                 ->schema([
                     TextInput::make('name')
                         ->label('Название')
                         ->required()
                         ->maxLength(255),

                     Select::make('category_id')
                         ->label('Категория')
                         ->relationship('category', 'name')
                         ->searchable()
                         ->required(),


                     TextInput::make('unit')
                         ->label('Единица измерения')
                         ->maxLength(255)
                         ->nullable(),
                 ])
                 ->columns(2),
            ]);
    }
}
