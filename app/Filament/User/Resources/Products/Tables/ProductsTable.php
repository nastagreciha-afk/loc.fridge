<?php

namespace App\Filament\User\Resources\Products\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProductsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('product.name')->label('Продукт'),
                TextColumn::make('product.category.name')->label('Категория'),
                TextColumn::make('quantity')->label('Количество'),
                TextColumn::make('product.unit')->label('Ед.'),
                TextColumn::make('expires_at')->dateTime()->label('Срок годности'),
                TextColumn::make('arrived')->dateTime()->label('Прибытие'),
                TextColumn::make('fridge.name')->label('Холодильник'),

            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
