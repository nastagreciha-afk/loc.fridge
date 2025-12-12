<?php

namespace App\Filament\User\Resources\Fridges;

use App\Filament\User\Resources\Fridges\Pages\CreateFridge;
use App\Filament\User\Resources\Fridges\Pages\EditFridge;
use App\Filament\User\Resources\Fridges\Pages\ListFridges;
use App\Filament\User\Resources\Fridges\Pages\ViewFridge;
use App\Filament\User\Resources\Fridges\Schemas\FridgeForm;
use App\Filament\User\Resources\Fridges\Schemas\FridgeInfolist;
use App\Filament\User\Resources\Fridges\Tables\FridgesTable;
use App\Models\Fridge;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class FridgeResource extends Resource
{
    protected static ?string $model = Fridge::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCube;

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

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('user_id', auth()->id());
    }

    public static function getPages(): array
    {
        return [
            'index' => ListFridges::route('/'),
            'create' => CreateFridge::route('/create'),
            'edit' => EditFridge::route('/{record}/edit'),
            'view' => ViewFridge::route('/{record}'),
        ];
    }
}
