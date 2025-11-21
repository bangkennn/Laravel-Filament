<?php

namespace App\Filament\Resources\SettingSeos\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class SettingSeosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('meta_title')
                    ->label('Meta Title')
                    ->searchable()
                    ->limit(50)
                    ->wrap(),
                TextColumn::make('meta_description')
                    ->label('Meta Description')
                    ->searchable()
                    ->limit(50)
                    ->wrap(),
                TextColumn::make('robots')
                    ->label('Robots')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'index, follow' => 'success',
                        'noindex, nofollow' => 'danger',
                        default => 'warning',
                    }),
                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
                TextColumn::make('updated_at')
                    ->label('Diperbarui')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
