<?php

namespace App\Filament\Resources\Banners\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;

class BannersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image_url')
                    ->label('Gambar')
                    ->circular()
                    ->size(50),

                TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                TextColumn::make('subtitle')
                    ->label('Subjudul')
                    ->searchable()
                    ->limit(30)
                    ->toggleable(),

                SelectColumn::make('position')
                    ->label('Posisi')
                    ->options([
                        'top' => 'Top',
                        'sidebar' => 'Sidebar',
                        'footer' => 'Footer',
                        'popup' => 'Popup',
                    ])
                    ->selectablePlaceholder(false),

                TextColumn::make('order_index')
                    ->label('Urutan')
                    ->sortable()
                    ->alignCenter(),

                IconColumn::make('is_active')
                    ->label('Status')
                    ->boolean()
                    ->alignCenter(),

                TextColumn::make('start_date')
                    ->label('Mulai')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('end_date')
                    ->label('Berakhir')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('position')
                    ->label('Posisi')
                    ->options([
                        'top' => 'Top',
                        'sidebar' => 'Sidebar',
                        'footer' => 'Footer',
                        'popup' => 'Popup',
                    ]),

                TernaryFilter::make('is_active')
                    ->label('Status Aktif')
                    ->placeholder('Semua')
                    ->trueLabel('Aktif')
                    ->falseLabel('Tidak Aktif'),
            ])
            ->defaultSort('order_index', 'asc')
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
