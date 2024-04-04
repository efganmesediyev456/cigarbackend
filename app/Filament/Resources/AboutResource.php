<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AboutResource\Pages;
use App\Filament\Resources\AboutResource\RelationManagers;
use App\Models\About;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AboutResource extends Resource
{
    protected static ?string $model = About::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Create About')->tabs([
                    Forms\Components\Tabs\Tab::make('Azerbaijani')->schema([
                        Forms\Components\TextInput::make('vision_az')->required(),
                        Forms\Components\TextInput::make('mission_az')->required(),
                        Forms\Components\RichEditor::make('content_az')->required()

                    ]),
                    Forms\Components\Tabs\Tab::make('English')->schema([
                        Forms\Components\TextInput::make('vision_en'),
                        Forms\Components\TextInput::make('mission_en'),
                        Forms\Components\RichEditor::make('content_en'),

                    ]),
                    Forms\Components\Tabs\Tab::make('Russian')->schema([
                        Forms\Components\TextInput::make('vision_ru'),
                        Forms\Components\TextInput::make('mission_ru'),
                        Forms\Components\RichEditor::make('content_ru'),

                    ])
                ]),
                Forms\Components\Group::make()->schema([
                    Forms\Components\Section::make('Image Upload')->schema([
                        Forms\Components\FileUpload::make('image1')->disk('public')->directory('image1'),
                        Forms\Components\FileUpload::make('image2')->disk('public')->directory('image2'),
                        Forms\Components\FileUpload::make('video')->disk('public')->directory('video'),
                    ]),

                ])
            ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListAbouts::route('/'),
            'create' => Pages\CreateAbout::route('/create'),
            'edit' => Pages\EditAbout::route('/{record}/edit'),
        ];
    }
}
