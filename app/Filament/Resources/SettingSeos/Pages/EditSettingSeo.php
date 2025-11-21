<?php

namespace App\Filament\Resources\SettingSeos\Pages;

use App\Filament\Resources\SettingSeos\SettingSeoResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSettingSeo extends EditRecord
{
    protected static string $resource = SettingSeoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
