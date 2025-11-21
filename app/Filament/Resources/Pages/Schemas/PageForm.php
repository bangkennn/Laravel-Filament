<?php

namespace App\Filament\Resources\Pages\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\DateTimePicker;
use Filament\Schemas\Components\Utilities\Set;
use Illuminate\Support\Str;

class PageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Judul Halaman')
                    ->required()
                    ->maxLength(150)
                    ->live(onBlur: true)
                    ->afterStateUpdated(function (Set $set, ?string $state): void {
                        $set('slug', Str::slug((string) $state));
                    })
                    ->columnSpanFull(),

                TextInput::make('slug')
                    ->label('Slug')
                    ->required()
                    ->maxLength(150)
                    ->rules(['alpha_dash'])
                    ->unique(ignoreRecord: true)
                    ->helperText('URL-friendly version (contoh: about-us, privacy-policy)')
                    ->columnSpanFull(),

                FileUpload::make('featured_image')
                    ->label('Gambar Utama')
                    ->image()
                    ->directory('pages')
                    ->visibility('public')
                    ->imageEditor()
                    ->columnSpanFull(),

                RichEditor::make('content')
                    ->label('Konten Halaman')
                    ->helperText('Isi konten halaman (HTML/Markdown)')
                    ->columnSpanFull(),

                TextInput::make('meta_title')
                    ->label('Meta Title')
                    ->helperText('Judul SEO halaman (maksimal 150 karakter)')
                    ->maxLength(150)
                    ->columnSpanFull(),

                Textarea::make('meta_description')
                    ->label('Meta Description')
                    ->helperText('Deskripsi SEO (maksimal 255 karakter)')
                    ->maxLength(255)
                    ->rows(3)
                    ->columnSpanFull(),

                Textarea::make('meta_keywords')
                    ->label('Meta Keywords')
                    ->helperText('Kata kunci SEO, pisahkan dengan koma (maksimal 255 karakter)')
                    ->maxLength(255)
                    ->rows(2)
                    ->columnSpanFull(),

                Toggle::make('is_published')
                    ->label('Terbitkan Halaman')
                    ->default(false)
                    ->inline(false),

                DateTimePicker::make('published_at')
                    ->label('Tanggal Publikasi')
                    ->native(false)
                    ->seconds(false)
                    ->displayFormat('d/m/Y H:i')
                    ->helperText('Kosongkan untuk publikasi langsung'),
            ]);
    }
}
