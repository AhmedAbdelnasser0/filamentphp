<?php
namespace App\Filament\Resources;

use App\Models\Product;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\Table;
use Filament\Tables;
use App\Filament\Resources\ProductResource\Pages;
use Filament\Forms\Components\Select;
use App\Models\Category;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                TextInput::make('name')->required(),
                FileUpload::make('photo'),
                TextInput::make('price')->required(),
                TextInput::make('quantity')->required(),
                TextInput::make('variants'),
                TextInput::make('category.name'),
                TextInput::make('slug')->unique()->required(),
                Select::make('category_id')
                    ->options(
                        Category::pluck('name', 'id')->toArray()
                    )
                    ->required(),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\ImageColumn::make('photo'),
                Tables\Columns\TextColumn::make('price'),
                Tables\Columns\TextColumn::make('quantity'),
                Tables\Columns\TextColumn::make('variants'),
                Tables\Columns\TextColumn::make('category.name'),
                Tables\Columns\TextColumn::make('slug'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
