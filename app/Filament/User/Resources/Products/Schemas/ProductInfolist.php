<?php

namespace App\Filament\User\Resources\Products\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ProductInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('product.name')
                    ->getStateUsing(fn ($record) => $record->product?->name ?? '-'),

                TextEntry::make('product.category.name')
                    ->getStateUsing(fn ($record) => $record->product?->category?->name ?? '-'),

                TextEntry::make('product.unit')
                    ->getStateUsing(fn ($record) => $record->product?->unit ?? '-'),

                TextEntry::make('fridge.name')
                    ->getStateUsing(fn ($record) => $record->fridge?->name ?? '-'),

            ]);
    }
}
