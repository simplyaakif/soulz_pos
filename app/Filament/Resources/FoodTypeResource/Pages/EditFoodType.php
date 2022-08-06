<?php

namespace App\Filament\Resources\FoodTypeResource\Pages;

use App\Filament\Resources\FoodTypeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFoodType extends EditRecord
{
    protected static string $resource = FoodTypeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
