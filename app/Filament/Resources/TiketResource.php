<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TiketResource\Pages;
use App\Filament\Resources\TiketResource\RelationManagers;
use App\Models\Layanan;
use App\Models\Mobil;
use App\Models\Pesanan;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TiketResource extends Resource
{
    protected static ?string $model = Pesanan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        $mobil = Mobil::all();
        $layanan = Layanan::all();
        $metodePembayaran = ['Cash', 'Transfer'];

        return $form
            ->schema([
                TextInput::make('nama'),
                TextInput::make('no_hp'),
                DatePicker::make('tanggal_keberangkatan'),
                TimePicker::make('jam_berangkat'),
                TextInput::make('Tujuan'),
                TextInput::make('Jumlah penumpang'),
                Select::make('mobil_id')->options($mobil->pluck('merk', 'id'))
                ->reactive()->afterStateUpdated(function (callable $set, $state) use ($layanan) {
                    $filteredLayanan = $layanan->where('mobil_id', $state)->pluck('nama_paket', 'id');
                    $set('layanan_id', null); 
                    $set('layananOptions', $filteredLayanan);
                }),
                Select::make('metode_pembayaran')->options($metodePembayaran),
                TextInput::make('nomor_kursi'),
                TextInput::make('titik_jemput'),
                TextInput::make('titik_antar'),
                Select::make('layanan_id')->options(
                    function (callable $get) {
                        return $get('layananOptions') ?? [];
                    }
                )->reactive()
                ->afterStateUpdated(function (callable $set, $state) use ($mobil) {
                    $selectedMobil = $mobil->firstWhere('id', $state);
                    $set('harga', $selectedMobil?->harga);
                }),
                TextInput::make("harga")->default(0),
                TextInput::make("total_tagihan")->default(0),
            ]);
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
            'index' => Pages\ListTikets::route('/'),
            'create' => Pages\CreateTiket::route('/create'),
            'edit' => Pages\EditTiket::route('/{record}/edit'),
        ];
    }
}
