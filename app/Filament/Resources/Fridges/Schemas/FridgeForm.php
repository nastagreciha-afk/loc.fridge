<?php

namespace App\Filament\Resources\Fridges\Schemas;

use App\Models\User;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class FridgeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name_user')
                    ->label('Имя владельца')
                    ->reactive()
                    ->afterStateUpdated(function ($state, callable $set) {
                        $user = \App\Models\User::where('name', $state)->first();

                        if ($user) {
                            $set('user_id', $user->id);
                            $set('owner_status', "Пользователь найден: {$user->name}");
                        } else {
                            $set('user_id', null);
                            $set('owner_status', "Пользователь с таким именем не найден");
                        }
            }),
                Section::make('Статус')
                    ->description('Проверка наличия пользователя')
                    ->schema([
                        TextEntry::make('owner_status')
                            ->default('Введите имя, чтобы найти пользователя')
                            ->label('Статус поиска')
                            ->hiddenLabel()
                            ->formatStateUsing(fn ($state) => $state ?? 'Введите имя пользователя')
                    ]),

                Hidden::make('user_id')->required(),
                Hidden::make('owner_status'),
                TextInput::make('location'),
                TextInput::make('name'),
            ]);
    }
}
