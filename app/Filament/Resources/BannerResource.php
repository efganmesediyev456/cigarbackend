<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BannerResource\Pages;
use App\Filament\Resources\BannerResource\RelationManagers;
use App\Models\Banner;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use PHPUnit\Metadata\Group;

class BannerResource extends Resource
{
    protected static ?string $model = Banner::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Create Banner')->tabs([
                    Forms\Components\Tabs\Tab::make('Azerbaijani')->schema([
                        Forms\Components\TextInput::make('name_az')->required(),
                        Forms\Components\TextInput::make('button_title_az')->required(),
                        Forms\Components\TextInput::make('button_url_az')->required(),
                        Forms\Components\Checkbox::make('status_az'),

                    ]),
                    Forms\Components\Tabs\Tab::make('English')->schema([
                        Forms\Components\TextInput::make('name_en'),
                        Forms\Components\TextInput::make('button_title_en'),
                        Forms\Components\TextInput::make('button_url_en'),
                        Forms\Components\Checkbox::make('status_en'),

                    ]),
                    Forms\Components\Tabs\Tab::make('Russian')->schema([
                        Forms\Components\TextInput::make('name_ru'),
                        Forms\Components\TextInput::make('button_title_ru'),
                        Forms\Components\TextInput::make('button_url_ru'),
                        Forms\Components\Checkbox::make('status_ru'),

                    ])
                ]),
                Forms\Components\Group::make()->schema([
                   Forms\Components\Section::make('Image Upload')->schema([
                       Forms\Components\FileUpload::make('banner_image')->disk('public')->directory('banner_image'),
                       Forms\Components\FileUpload::make('banner_video')->disk('public')->directory('banner_video'),
                   ]),

               ])
            ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name_az'),
                Tables\Columns\ImageColumn::make('banner_image'),
                Tables\Columns\TextColumn::make('button_url_az'),
            ])
            ->filters([
                //
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBanners::route('/'),
            'create' => Pages\CreateBanner::route('/create'),
            'edit' => Pages\EditBanner::route('/{record}/edit'),
        ];
    }
}
