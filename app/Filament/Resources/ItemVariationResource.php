<?php

    namespace App\Filament\Resources;

    use App\Filament\Resources\ItemVariationResource\Pages;
    use App\Models\Item;
    use App\Models\ItemVariation;
    use Filament\Forms\Components\Placeholder;
    use Filament\Forms\Components\Select;
    use Filament\Forms\Components\TextInput;
    use Filament\Resources\Form;
    use Filament\Resources\Resource;
    use Filament\Resources\Table;
    use Filament\Tables\Columns\TextColumn;

    class ItemVariationResource extends Resource {

        protected static ?string $model = ItemVariation::class;

        protected static ?string $slug = 'item-variations';

        protected static ?string $recordTitleAttribute = 'title';
        protected static ?string $navigationGroup = 'Item Management';

        protected static ?string $navigationIcon = 'heroicon-o-view-list';


        public static function form(Form $form): Form
        {
            return $form->schema([
                Select::make('item_id')
                ->options(Item::all()->pluck('title','id'))
                ->searchable()
                ->label('Item'),
                                     TextInput::make('title')->required(),

                                     TextInput::make('price')->required(),

                                     TextInput::make('short_description')->required(),

                                     Placeholder::make('created_at')->label('Created Date')->content(fn(?ItemVariation $record): string => $record?->created_at?->diffForHumans() ?? '-'),

                                     Placeholder::make('updated_at')->label('Last Modified Date')->content(fn(?ItemVariation $record): string => $record?->updated_at?->diffForHumans() ?? '-'),
                                 ]);
        }

        public static function table(Table $table): Table
        {
            return $table->columns([
                                       TextColumn::make('item.title')->label('Item'),

                                       TextColumn::make('title')->searchable()->sortable(),

                                       TextColumn::make('price')->suffix(' Rs') ,

                                       TextColumn::make('short_description'),
                                   ]);
        }

        public static function getPages(): array
        {
            return [
                'index'  => Pages\ListItemVariations::route('/'),
                'create' => Pages\CreateItemVariation::route('/create'),
                'edit'   => Pages\EditItemVariation::route('/{record}/edit'),
            ];
        }

        public static function getGloballySearchableAttributes(): array
        {
            return ['title'];
        }
    }
