<?php

namespace App\Filament\ChurchAdmin\Resources;

use App\Filament\ChurchAdmin\Resources\WorkshopResource\Pages;
use App\Models\Workshop;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

class WorkshopResource extends Resource
{
    protected static ?string $model = Workshop::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';
    protected static ?string $navigationLabel = 'Jadwal Workshop';
    protected static ?string $pluralLabel = 'Workshop';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Hidden::make('church_id')
                    ->default(fn () => Auth::guard('church_admin')->user()->church_id),
                Forms\Components\Select::make('region')
                    ->options([
                        'Jawa' => 'Jawa',
                        'Kalimantan-Sumatra' => 'Kalimantan-Sumatra',
                        'Sulawesi-Papua' => 'Sulawesi-Papua',
                    ])
                    ->required()
                    ->label('Regional'),
                Forms\Components\TextInput::make('location')
                    ->required()
                    ->maxLength(255)
                    ->label('Lokasi'),
                Forms\Components\DatePicker::make('date')
                    ->required()
                    ->label('Tanggal'),
                Forms\Components\TextInput::make('speaker')
                    ->required()
                    ->maxLength(255)
                    ->label('Pembicara'),
                Forms\Components\TextInput::make('topic')
                    ->required()
                    ->maxLength(255)
                    ->label('Topik'),
                Forms\Components\FileUpload::make('speaker_photo')
                    ->image()
                    ->directory('workshop_speaker_photos')
                    ->maxSize(2048)
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/gif'])
                    ->label('Foto Pembicara')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(function () {
                return Workshop::where('church_id', Auth::guard('church_admin')->user()->church_id);
            })
            ->columns([
                Tables\Columns\TextColumn::make('region')
                    ->sortable()
                    ->label('Regional'),
                Tables\Columns\TextColumn::make('location')
                    ->label('Lokasi'),
                Tables\Columns\TextColumn::make('date')
                    ->date()
                    ->sortable()
                    ->label('Tanggal'),
                Tables\Columns\TextColumn::make('speaker')
                    ->label('Pembicara'),
                Tables\Columns\TextColumn::make('topic')
                    ->limit(50)
                    ->tooltip(fn ($record) => $record->topic)
                    ->label('Topik'),
                Tables\Columns\ImageColumn::make('speaker_photo')
                    ->label('Foto Pembicara')
                    ->disk('public'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('region')
                    ->options([
                        'Jawa' => 'Jawa',
                        'Kalimantan-Sumatra' => 'Kalimantan-Sumatra',
                        'Sulawesi-Papua' => 'Sulawesi-Papua',
                    ])
                    ->label('Filter by Regional'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    //
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListWorkshops::route('/'),
            'edit' => Pages\EditWorkshop::route('/{record}/edit'),
            'create' => Pages\CreateWorkshop::route('/create'),
        ];
    }
}