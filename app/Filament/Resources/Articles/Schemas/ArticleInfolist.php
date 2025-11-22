<?php

namespace App\Filament\Resources\Articles\Schemas;

use Filament\Schemas\Schema;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ImageEntry;

class ArticleInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('title')
                    ->label('Judul Artikel'),
                TextEntry::make('slug')
                    ->label('Slug'),
                TextEntry::make('excerpt')
                    ->label('Ringkasan'),
                ImageEntry::make('featured_image')
                    ->label('Gambar Utama')
                    ->circular()
                    ->defaultImageUrl(url('/images/placeholder.png')),
                TextEntry::make('content')
                    ->label('Konten')
                    ->html()
                    ->columnSpanFull(),
                TextEntry::make('meta_title')
                    ->label('Meta Title'),
                TextEntry::make('meta_description')
                    ->label('Meta Description'),
                TextEntry::make('meta_keywords')
                    ->label('Meta Keywords'),
                TextEntry::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'published' => 'success',
                        'draft' => 'warning',
                        default => 'gray',
                    }),
                TextEntry::make('published_at')
                    ->label('Tanggal Terbit')
                    ->dateTime('d/m/Y H:i'),
                TextEntry::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d/m/Y H:i'),
                TextEntry::make('updated_at')
                    ->label('Diperbarui')
                    ->dateTime('d/m/Y H:i'),
            ]);
    }
}
