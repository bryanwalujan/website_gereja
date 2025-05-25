<?php

namespace App\Filament\ChurchAdmin\Resources;

use App\Filament\ChurchAdmin\Resources\WorkshopRegistrationResource\Pages;
use App\Filament\ChurchAdmin\Resources\WorkshopRegistrationResource\RelationManagers;
use App\Models\WorkshopRegistration;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class WorkshopRegistrationResource extends Resource
{
    protected static ?string $model = WorkshopRegistration::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationLabel = 'Daftar Pendaftar';
    protected static ?string $pluralLabel = 'Daftar Pendaftar';
    protected static ?string $navigationGroup = 'Workshop';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('workshop_id')
                    ->relationship('workshop', 'topic')
                    ->required()
                    ->label('Workshop'),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->label('Nama'),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255)
                    ->label('Email'),
                Forms\Components\TextInput::make('phone')
                    ->tel()
                    ->maxLength(255)
                    ->label('No. Telepon'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(function () {
                return WorkshopRegistration::query()
                    ->whereHas('workshop', function (Builder $query) {
                        $query->where('church_id', Auth::guard('church_admin')->user()->church_id);
                    });
            })
            ->columns([
                Tables\Columns\TextColumn::make('workshop.topic')
                    ->label('Workshop')
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->label('No. Telepon')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->label('Tanggal Pendaftaran'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('workshop_id')
                    ->relationship('workshop', 'topic')
                    ->label('Filter by Workshop'),
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
            'index' => Pages\ListWorkshopRegistrations::route('/'),
            'create' => Pages\CreateWorkshopRegistration::route('/create'),
            'edit' => Pages\EditWorkshopRegistration::route('/{record}/edit'),
        ];
    }
}