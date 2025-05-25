<?php

namespace App\Filament\ChurchAdmin\Resources;

use App\Filament\ChurchAdmin\Resources\ChurchResource\Pages;
use App\Models\Church;
use App\Models\Workshop;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;
use Illuminate\Support\Facades\Auth;

class ChurchResource extends Resource
{
    protected static ?string $model = Church::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office';
    protected static ?string $navigationLabel = 'Data Gereja';
    protected static ?string $pluralLabel = 'Gereja';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->label('Nama Gereja'),
                Forms\Components\Textarea::make('about_us')
                    ->maxLength(65535)
                    ->label('Tentang Kami')
                    ->columnSpanFull(),
                Forms\Components\Select::make('region')
                    ->options([
                        'Jawa' => 'Jawa',
                        'Kalimantan-Sumatra' => 'Kalimantan-Sumatra',
                        'Sulawesi-Papua' => 'Sulawesi-Papua',
                    ])
                    ->required()
                    ->label('Regional'),
                Forms\Components\Textarea::make('vision')
                    ->maxLength(65535)
                    ->label('Visi')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('mission')
                    ->maxLength(65535)
                    ->label('Misi')
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('church_image')
                    ->image()
                    ->directory('church_images')
                    ->maxSize(2048)
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/gif'])
                    ->label('Gambar Gereja')
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('pastor_image')
                    ->image()
                    ->directory('pastor_images')
                    ->maxSize(2048)
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/gif'])
                    ->label('Gambar Gembala')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('address')
                    ->maxLength(65535)
                    ->label('Alamat')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('maps')
                    ->maxLength(65535)
                    ->label('Google Maps URL/Embed')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('phone')
                    ->tel()
                    ->maxLength(255)
                    ->label('No. Telepon'),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255)
                    ->label('Email'),
                Forms\Components\Textarea::make('worship_schedule')
                    ->maxLength(65535)
                    ->label('Jadwal Ibadah')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('student_target')
                    ->numeric()
                    ->minValue(0)
                    ->label('Target Murid/Tahun'),
                Forms\Components\TextInput::make('congregation_count')
                    ->numeric()
                    ->minValue(0)
                    ->label('Jumlah Jemaat'),
                Forms\Components\Textarea::make('prayer_points')
                    ->maxLength(65535)
                    ->label('Doa Pokok')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('established_year')
                    ->numeric()
                    ->minValue(1800)
                    ->maxValue(date('Y'))
                    ->label('Tahun Berdiri'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(function () {
                return Church::where('id', Auth::guard('church_admin')->user()->church_id);
            })
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->label('Nama Gereja'),
                Tables\Columns\TextColumn::make('about_us')
                    ->limit(50)
                    ->tooltip(fn ($record) => $record->about_us)
                    ->label('Tentang Kami'),
                Tables\Columns\TextColumn::make('region')
                    ->sortable()
                    ->label('Regional'),
                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->label('Email'),
                Tables\Columns\TextColumn::make('phone')
                    ->label('No. Telepon'),
                Tables\Columns\TextColumn::make('congregation_count')
                    ->label('Jumlah Jemaat'),
                Tables\Columns\TextColumn::make('established_year')
                    ->label('Tahun Berdiri'),
                Tables\Columns\ImageColumn::make('church_image')
                    ->label('Gambar Gereja')
                    ->disk('public'),
                Tables\Columns\ImageColumn::make('pastor_image')
                    ->label('Gambar Gembala')
                    ->disk('public'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('Dibuat Pada'),
                Tables\Columns\TextColumn::make('workshops_count')
                    ->label('Jumlah Workshop')
                    ->getStateUsing(fn ($record) => Workshop::where('church_id', $record->id)->count()),
                Tables\Columns\TextColumn::make('view_workshops')
                    ->label('Lihat Workshop')
                    ->url(fn ($record) => "/church-admin/workshops?tableFilters[region][value]={$record->region}")
                    ->color('primary'),
            ])
            ->filters([
                //
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
            'index' => Pages\ListChurches::route('/'),
            'edit' => Pages\EditChurch::route('/{record}/edit'),
        ];
    }
}