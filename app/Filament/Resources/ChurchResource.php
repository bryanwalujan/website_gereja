<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ChurchResource\Pages;
use App\Filament\Resources\ChurchResource\RelationManagers;
use App\Models\Church;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ChurchResource extends Resource
{
    protected static ?string $model = Church::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('region')
                    ->required(),
                Forms\Components\Textarea::make('about_us')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('vision')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('mission')
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('church_image')
                    ->image()
                    ->required(),
                Forms\Components\FileUpload::make('pastor_image')
                    ->image()
                    ->required(),
                Forms\Components\TextInput::make('pastor_name')
                    ->label('Nama Pendeta')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('address')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('maps')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('phone')
                    ->tel()
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('worship_schedule')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('student_target')
                    ->numeric()
                    ->default(null),
                Forms\Components\TextInput::make('congregation_count')
                    ->numeric()
                    ->default(null),
                Forms\Components\Textarea::make('prayer_points')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('established_year'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('region'),
                Tables\Columns\ImageColumn::make('church_image'),
                Tables\Columns\ImageColumn::make('pastor_image'),
                Tables\Columns\TextColumn::make('pastor_name')
                    ->label('Nama Pendeta')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('student_target')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('congregation_count')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('established_year'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListChurches::route('/'),
            'create' => Pages\CreateChurch::route('/create'),
            'edit' => Pages\EditChurch::route('/{record}/edit'),
        ];
    }
}