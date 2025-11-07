<?php

namespace App\Filament\Resources\Banners\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Textarea;

class BannerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Judul Banner')
                    ->required()
                    ->maxLength(150)
                    ->columnSpanFull(),

                Textarea::make('subtitle')
                    ->label('Subjudul / Tagline')
                    ->maxLength(255)
                    ->rows(2)
                    ->columnSpanFull(),

                FileUpload::make('image_url')
                    ->label('Gambar Banner')
                    ->image()
                    ->directory('banners')
                    ->visibility('public')
                    ->imageEditor()
                    ->columnSpanFull(),

                TextInput::make('link_url')
                    ->label('Tautan Tujuan')
                    ->url()
                    ->maxLength(255)
                    ->placeholder('https://example.com')
                    ->columnSpanFull(),

                Select::make('position')
                    ->label('Posisi Banner')
                    ->options([
                        'top' => 'Top (Atas)',
                        'sidebar' => 'Sidebar (Samping)',
                        'footer' => 'Footer (Bawah)',
                        'popup' => 'Popup',
                    ])
                    ->default('top')
                    ->required()
                    ->native(false),

                TextInput::make('order_index')
                    ->label('Urutan Tampil')
                    ->numeric()
                    ->default(0)
                    ->required(),

                Toggle::make('is_active')
                    ->label('Status Aktif')
                    ->default(true)
                    ->inline(false),

                DateTimePicker::make('start_date')
                    ->label('Tanggal Mulai')
                    ->native(false)
                    ->seconds(false)
                    ->displayFormat('d/m/Y H:i'),

                DateTimePicker::make('end_date')
                    ->label('Tanggal Berakhir')
                    ->native(false)
                    ->seconds(false)
                    ->displayFormat('d/m/Y H:i'),
            ]);
    }
}
