<?php

namespace App\Filament\User\Resources\Products;

use App\Filament\User\Resources\Products\Pages\CreateProduct;
use App\Filament\User\Resources\Products\Pages\EditProduct;
use App\Filament\User\Resources\Products\Pages\ListProducts;
use App\Filament\User\Resources\Products\Pages\ViewProduct;
use App\Filament\User\Resources\Products\Schemas\ProductForm;
use App\Filament\User\Resources\Products\Schemas\ProductInfolist;
use App\Filament\User\Resources\Products\Tables\ProductsTable;
use App\Models\FridgeProduct;
use App\Models\Product;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class ProductResource extends Resource
{
    protected static ?string $model = FridgeProduct::class;
    protected static ?string $recordTitleAttribute = null;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::AcademicCap;



    public static function form(Schema $schema): Schema
    {
        return ProductForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ProductInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProductsTable::configure($table);
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
            ->with(['product', 'product.category', 'fridge'])
            ->whereHas('fridge', fn ($q) => $q->where('user_id', auth()->id()));
    }
    public static function getPages(): array
    {
        return [
            'index' => ListProducts::route('/'),
            'create' => CreateProduct::route('/create'),
            'edit' => EditProduct::route('/{record}/edit'),
            'view' => ViewProduct::route('/{record}'),
        ];
    }
}
