<?php

namespace App\Filament\Resources;

use App\Filament\Resources\YearsOldResource\Pages;
use App\Filament\Resources\YearsOldResource\RelationManagers;
use App\Models\YearsOld;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class YearsOldResource extends Resource
{
    protected static ?string $model = YearsOld::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Years Old Page')->tabs([
                    Forms\Components\Tabs\Tab::make('Azerbaijani')->schema([
                        Forms\Components\TextInput::make('page_title_az')->required(),
                        Forms\Components\TextInput::make('content1_az')->required(),
                        Forms\Components\TextInput::make('content2_az')->required(),
                    ]),
                    Forms\Components\Tabs\Tab::make('English')->schema([
                        Forms\Components\TextInput::make('page_title_en'),
                        Forms\Components\TextInput::make('content1_en'),
                        Forms\Components\TextInput::make('content2_en'),
                    ]),
                    Forms\Components\Tabs\Tab::make('Russian')->schema([
                        Forms\Components\TextInput::make('page_title_ru'),
                        Forms\Components\TextInput::make('content1_ru'),
                        Forms\Components\TextInput::make('content2_ru'),
                    ])
                ])
            ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('page_title_az'),
                Tables\Columns\TextColumn::make('content1_az'),
                Tables\Columns\TextColumn::make('content2_az'),

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
            'index' => Pages\ListYearsOlds::route('/'),
            'create' => Pages\CreateYearsOld::route('/create'),
            'edit' => Pages\EditYearsOld::route('/{record}/edit'),
        ];
    }
}
