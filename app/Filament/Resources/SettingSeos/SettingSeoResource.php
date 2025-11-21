<?php

namespace App\Filament\Resources\SettingSeos;

use App\Filament\Resources\SettingSeos\Pages\CreateSettingSeo;
use App\Filament\Resources\SettingSeos\Pages\EditSettingSeo;
use App\Filament\Resources\SettingSeos\Pages\ListSettingSeos;
use App\Filament\Resources\SettingSeos\Schemas\SettingSeoForm;
use App\Filament\Resources\SettingSeos\Tables\SettingSeosTable;
use App\Models\SettingSeo;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SettingSeoResource extends Resource
{
    protected static ?string $model = SettingSeo::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedMagnifyingGlass;

    protected static ?string $recordTitleAttribute = 'meta_title';
    protected static string|\UnitEnum|null $navigationGroup = 'Settings';

    public static function form(Schema $schema): Schema
    {
        return SettingSeoForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SettingSeosTable::configure($table);
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
            'index' => ListSettingSeos::route('/'),
            'create' => CreateSettingSeo::route('/create'),
            'edit' => EditSettingSeo::route('/{record}/edit'),
        ];
    }
}
