<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ChurchAdminResource\Pages;
use App\Models\ChurchAdmin;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ChurchAdminResource extends Resource
{
    protected static ?string $model = ChurchAdmin::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationLabel = 'Admin Gereja';
    protected static ?string $pluralLabel = 'Admin Gereja';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('church_id')
                    ->relationship('church', 'name')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->label('Nama Gereja'),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->label('Nama Admin'),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->unique(table: ChurchAdmin::class, ignoreRecord: true)
                    ->maxLength(255)
                    ->label('Email'),
                Forms\Components\TextInput::make('password')
                    ->password()
                    ->required(fn ($livewire) => $livewire instanceof Pages\CreateChurchAdmin)
                    ->minLength(8)
                    ->maxLength(255)
                    ->dehydrated(fn ($state) => filled($state))
                    ->label('Password'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('church.name')
                    ->searchable()
                    ->sortable()
                    ->label('Nama Gereja'),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->label('Nama Admin'),
                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->label('Email'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('Dibuat Pada'),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListChurchAdmins::route('/'),
            'create' => Pages\CreateChurchAdmin::route('/create'),
            'edit' => Pages\EditChurchAdmin::route('/{record}/edit'),
        ];
    }
}