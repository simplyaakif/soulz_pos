<?php

    namespace App\Filament\Resources\ItemVariationResource\Pages;

    use App\Filament\Resources\ItemVariationResource;
    use Filament\Pages\Actions\CreateAction;
    use Filament\Resources\Pages\ListRecords;

    class ListItemVariations extends ListRecords {

        protected static string $resource = ItemVariationResource::class;

        protected function getActions(): array
        {
            return [
                CreateAction::make(),
            ];
        }
    }
