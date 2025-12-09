<?php

namespace App\Filament\Resources\Fridges;

use App\Filament\Resources\Fridges\Pages\CreateFridge;
use App\Filament\Resources\Fridges\Pages\EditFridge;
use App\Filament\Resources\Fridges\Pages\ListFridges;
use App\Filament\Resources\Fridges\Pages\ViewFridge;
use App\Filament\Resources\Fridges\Schemas\FridgeForm;
use App\Filament\Resources\Fridges\Schemas\FridgeInfolist;
use App\Filament\Resources\Fridges\Tables\FridgesTable;
use App\Models\Fridge;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class FridgeResource extends Resource
{
    protected static ?string $model = Fridge::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Fridge';

    public static function form(Schema $schema): Schema
    {
        return FridgeForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return FridgeInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FridgesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListFridges::route('/'),
            'create' => CreateFridge::route('/create'),
            'view' => ViewFridge::route('/{record}'),
            'edit' => EditFridge::route('/{record}/edit'),
        ];
    }
}
