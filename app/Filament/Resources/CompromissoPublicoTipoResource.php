<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CompromissoPublicoTipoResource\Pages;
use App\Filament\Resources\CompromissoPublicoTipoResource\RelationManagers;
use App\Models\CompromissoPublicoTipo;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CompromissoPublicoTipoResource extends Resource
{
    protected static ?string $model = CompromissoPublicoTipo::class;
    protected static ?string $navigationGroup = 'Configurações';
    protected static ?string $navigationIcon = 'heroicon-o-tag';
    protected static ?string $navigationLabel = 'Tipos de Compromissos';
    protected static ?string $slug = 'tiposcompromissopublico';
    protected static ?string $recordTitleAttribute = 'nome';
    protected static ?string $modelLabel = 'Tipo de Compromisso Público';
    protected static ?string $pluralModelLabel = 'Tipos de Compromissos Públicos';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                static::getMainForm(),
                static::getRegisterForm(),
            ])
            ->columns(3);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nome')
                    ->sortable()
                    ->searchable(),
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
            'index' => Pages\ListCompromissoPublicoTipos::route('/'),
            'create' => Pages\CreateCompromissoPublicoTipo::route('/create'),
            'edit' => Pages\EditCompromissoPublicoTipo::route('/{record}/edit'),
        ];
    }

    public static function getMainForm() : Section
    {
        return Forms\Components\Section::make()
            ->schema(
                [
                    TextInput::make('nome')
                        ->label('Nome')
                        ->required()
                        ->maxLength(255)
                        ->columnSpan(1),
                ])
            ->columns(2)
            ->columnSpan(['lg' => fn (?CompromissoPublicoTipo $record) => $record === null ? 3 : 2]);
    }

    public static function getRegisterForm(): Section
    {
        return Forms\Components\Section::make()
            ->schema([
                Forms\Components\Placeholder::make('created_at')
                    ->label('Criado em')
                    ->content(fn (CompromissoPublicoTipo $record): ?string => $record->created_at?->diffForHumans()),

                Forms\Components\Placeholder::make('updated_at')
                    ->label('Ùltima Modificação')
                    ->content(fn (CompromissoPublicoTipo $record): ?string => $record->updated_at?->diffForHumans()),
            ])
            ->columnSpan(['lg' => 1])
            ->hidden(fn (?CompromissoPublicoTipo $record) => $record === null);
    }
}
