<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource\RelationManagers;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Create Category')->tabs([
                    Forms\Components\Tabs\Tab::make('Azerbaijani')->schema([
                        Forms\Components\TextInput::make('name_az')->required(),
                    ]),
                    Forms\Components\Tabs\Tab::make('English')->schema([
                        Forms\Components\TextInput::make('name_en'),
                    ]),
                    Forms\Components\Tabs\Tab::make('Russian')->schema([
                        Forms\Components\TextInput::make('name_ru'),
                    ])
                ]),
                Forms\Components\Group::make()->schema([
                    Forms\Components\Section::make('Parent Category')->schema([
                        Forms\Components\Select::make('parent_id')->options(Category::all()->pluck('name_az','id')),
                    ]),
                    Forms\Components\Checkbox::make('show_footer'),
                    Forms\Components\Checkbox::make('show_home_page'),
                    Forms\Components\Checkbox::make('show_header'),

                ])
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name_az'),
                Tables\Columns\TextColumn::make('parent.name_az')
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('parent')->label('children larini tap')->relationship('parent','name_az')->multiple()->preload(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            RelationManagers\ChildrenRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}
