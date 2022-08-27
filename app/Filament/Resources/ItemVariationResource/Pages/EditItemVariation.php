<?php

    namespace App\Filament\Resources\ItemVariationResource\Pages;

    use App\Filament\Resources\ItemVariationResource;
    use Filament\Pages\Actions\DeleteAction;
    use Filament\Resources\Pages\EditRecord;

    class EditItemVariation extends EditRecord {

        protected static string $resource = ItemVariationResource::class;

        protected function getActions(): array
        {
            return [
                DeleteAction::make(),
            ];
        }
    }
