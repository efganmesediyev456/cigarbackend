<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Category;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\RichEditor;


class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Create Banner')->tabs([
                    Forms\Components\Tabs\Tab::make('Azerbaijani')->schema([
                        Forms\Components\TextInput::make('name_az')->required(),
                        Forms\Components\TextInput::make('subtitle_az')->required(),
                        Forms\Components\TextInput::make('made_in_az')->required(),
                        Forms\Components\TextInput::make('size_az')->required(),
                        Forms\Components\TextInput::make('inbox_az')->required(),
                        Forms\Components\TextInput::make('smoking_time_az')->required(),
                        Forms\Components\TextInput::make('consist_az')->required(),
                        RichEditor::make('description_az'),
                        Forms\Components\Checkbox::make('status_az'),
                    ]),
                    Forms\Components\Tabs\Tab::make('English')->schema([
                        Forms\Components\TextInput::make('name_en'),
                        Forms\Components\TextInput::make('subtitle_en'),
                        Forms\Components\TextInput::make('made_in_en'),
                        Forms\Components\TextInput::make('size_en'),
                        Forms\Components\TextInput::make('inbox_en'),
                        Forms\Components\TextInput::make('smoking_time_en'),
                        Forms\Components\TextInput::make('consist_en'),
                        RichEditor::make('description_en'),
                        Forms\Components\Checkbox::make('status_en'),

                    ]),
                    Forms\Components\Tabs\Tab::make('Russian')->schema([
                        Forms\Components\TextInput::make('name_ru'),
                        Forms\Components\TextInput::make('subtitle_ru'),
                        Forms\Components\TextInput::make('made_in_ru'),
                        Forms\Components\TextInput::make('size_ru'),
                        Forms\Components\TextInput::make('inbox_ru'),
                        Forms\Components\TextInput::make('smoking_time_ru'),
                        Forms\Components\TextInput::make('consist_ru'),
                        RichEditor::make('description_ru'),
                        Forms\Components\Checkbox::make('status_ru'),

                    ])
                ]),
                Forms\Components\Group::make()->schema([
                    Forms\Components\Section::make('Image Upload')->schema([
                        Forms\Components\FileUpload::make('product_image')->disk('public')->directory('product_image'),
                        Forms\Components\TextInput::make('price')
                            ->numeric(),
                        Forms\Components\TextInput::make('strength')
                            ->numeric(),
                        Forms\Components\Section::make('Parent Category')->schema([
                            Forms\Components\Select::make('category_id')->options(Category::all()->pluck('name_az','id')),
                        ]),
                    ]),
                ])
            ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name_az'),
                Tables\Columns\ImageColumn::make('product_image'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
