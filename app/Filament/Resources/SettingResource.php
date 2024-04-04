<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SettingResource\Pages;
use App\Filament\Resources\SettingResource\RelationManagers;
use App\Models\Category;
use App\Models\Setting;
use Filament\Forms;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Create Banner')->tabs([
                    Forms\Components\Tabs\Tab::make('Azerbaijani')->schema([
                        Forms\Components\TextInput::make('home_story_block_title_az')->required(),
                        Forms\Components\TextInput::make('home_story_block_subtitle_az')->required(),
                        Forms\Components\TextInput::make('site_created_by_az')->required(),
                        Forms\Components\TextInput::make('sll_site_reserved_az')->required(),
                    ]),
                    Forms\Components\Tabs\Tab::make('English')->schema([
                        Forms\Components\TextInput::make('home_story_block_title_en'),
                        Forms\Components\TextInput::make('home_story_block_subtitle_en'),
                        Forms\Components\TextInput::make('site_created_by_en'),
                        Forms\Components\TextInput::make('sll_site_reserved_en'),

                    ]),
                    Forms\Components\Tabs\Tab::make('Russian')->schema([
                        Forms\Components\TextInput::make('home_story_block_title_ru'),
                        Forms\Components\TextInput::make('home_story_block_subtitle_ru'),
                        Forms\Components\TextInput::make('site_created_by_ru'),
                        Forms\Components\TextInput::make('sll_site_reserved_ru'),

                    ])
                ]),
                Forms\Components\Group::make()->schema([
                    Forms\Components\Section::make('Site Sosial Media')->schema([
                        Forms\Components\FileUpload::make('site_logo')->disk('public')->directory('site_logo'),
                        Forms\Components\TextInput::make('facebook'),
                        Forms\Components\TextInput::make('whatsapp'),
                        Forms\Components\TextInput::make('instagram'),
                    ]),
                ])
            ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('home_story_block_title_az'),
                Tables\Columns\TextColumn::make('home_story_block_subtitle_az'),
                Tables\Columns\ImageColumn::make('site_logo'),

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
            'index' => Pages\ListSettings::route('/'),
            'create' => Pages\CreateSetting::route('/create'),
            'edit' => Pages\EditSetting::route('/{record}/edit'),
        ];
    }
}
