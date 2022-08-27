<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FoodTypeResource\Pages;
use App\Filament\Resources\FoodTypeResource\RelationManagers;
use App\Models\FoodType;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FoodTypeResource extends Resource
{
    protected static ?string $model = FoodType::class;

    protected static ?string $navigationIcon = 'heroicon-o-database';
    protected static ?string $navigationGroup = 'Item Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('short')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('short'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFoodTypes::route('/'),
            'create' => Pages\CreateFoodType::route('/create'),
            'edit' => Pages\EditFoodType::route('/{record}/edit'),
        ];
    }
}
