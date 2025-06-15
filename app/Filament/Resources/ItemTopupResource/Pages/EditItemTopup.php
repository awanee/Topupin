<?php

namespace App\Filament\Resources\ItemTopupResource\Pages;

use App\Filament\Resources\ItemTopupResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditItemTopup extends EditRecord
{
    protected static string $resource = ItemTopupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
