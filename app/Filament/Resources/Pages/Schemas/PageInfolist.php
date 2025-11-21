<?php

namespace App\Filament\Resources\Pages\Schemas;

use Filament\Schemas\Schema;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\IconEntry;

class PageInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('title')
                    ->label('Judul Halaman'),
                TextEntry::make('slug')
                    ->label('Slug'),
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
                IconEntry::make('is_published')
                    ->label('Status Publikasi')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('danger'),
                TextEntry::make('published_at')
                    ->label('Tanggal Publikasi')
                    ->dateTime('d/m/Y H:i'),
                TextEntry::make('creator.name')
                    ->label('Dibuat Oleh'),
                TextEntry::make('updater.name')
                    ->label('Diperbarui Oleh'),
                TextEntry::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d/m/Y H:i'),
                TextEntry::make('updated_at')
                    ->label('Diperbarui')
                    ->dateTime('d/m/Y H:i'),
            ]);
    }
}
