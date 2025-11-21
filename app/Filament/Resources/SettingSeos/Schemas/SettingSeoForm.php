<?php

namespace App\Filament\Resources\SettingSeos\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;

class SettingSeoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('meta_title')
                    ->label('Meta Title')
                    ->helperText('Judul halaman untuk SEO (maksimal 150 karakter)')
                    ->maxLength(150)
                    ->columnSpanFull(),

                Textarea::make('meta_description')
                    ->label('Meta Description')
                    ->helperText('Deskripsi halaman untuk SEO (maksimal 255 karakter)')
                    ->maxLength(255)
                    ->rows(3)
                    ->columnSpanFull(),

                Textarea::make('meta_keywords')
                    ->label('Meta Keywords')
                    ->helperText('Kata kunci SEO, pisahkan dengan koma (maksimal 255 karakter)')
                    ->maxLength(255)
                    ->rows(2)
                    ->columnSpanFull(),

                Select::make('robots')
                    ->label('Meta Robots')
                    ->helperText('Nilai meta robots untuk mengontrol indexing')
                    ->options([
                        'index, follow' => 'Index, Follow',
                        'index, nofollow' => 'Index, NoFollow',
                        'noindex, follow' => 'NoIndex, Follow',
                        'noindex, nofollow' => 'NoIndex, NoFollow',
                    ])
                    ->default('index, follow')
                    ->native(false)
                    ->columnSpanFull(),
            ]);
    }
}
