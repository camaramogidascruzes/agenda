<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CompromissoPublicoResource\Pages;
use App\Filament\Resources\CompromissoPublicoResource\RelationManagers;
use App\Models\CompromissoPublico;
use App\Models\CompromissoPublicoTipo;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CompromissoPublicoResource extends Resource
{
    protected static ?string $model = CompromissoPublico::class;
    protected static ?string $navigationIcon = 'heroicon-o-clock';
    protected static ?string $navigationLabel = 'Compromisso Públicos';
    protected static ?string $slug = 'compromissopublico';
    protected static ?string $recordTitleAttribute = 'assunto';
    protected static ?string $modelLabel = 'Compromisso Público';
    protected static ?string $pluralModelLabel = 'Compromissos Públicos';

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
                TextColumn::make('hora')
                    ->label('Hora')
                    ->Time(),
                TextColumn::make('assunto')
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
            ])
            ->defaultSort('hora','desc')
            ->groups(['data'])
            ->defaultGroup('data')
            ->paginated([50, 100, 'all']);
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
            'index' => Pages\ListCompromissoPublicos::route('/'),
            'create' => Pages\CreateCompromissoPublico::route('/create'),
            'edit' => Pages\EditCompromissoPublico::route('/{record}/edit'),
        ];
    }

    public static function getMainForm() : Section
    {
        return Forms\Components\Section::make()
            ->schema(
                [
                    Select::make('tipo_id')
                        ->label('Tipo')
                        ->options(CompromissoPublicoTipo::all()->pluck('nome', 'id'))
                        ->columnSpan(2),
                    DatePicker::make('data')
                        ->label('Data')
                        ->default(now()),
                    TimePicker::make('hora')
                        ->label('Hora')
                        ->default(now()),
                    TextInput::make('assunto')
                        ->label('Assunto')
                        ->required()
                        ->maxLength(255)
                        ->columnSpan(2),
                    TextInput::make('local')
                        ->label('Local')
                        ->required()
                        ->datalist(['Câmara Municipal de Mogi das Cruzes'])
                        ->maxLength(255)
                        ->columnSpan(2),
                    RichEditor::make('descricao')
                        ->label('Descrição')
                        ->toolbarButtons([
                            'bold',
                            'bulletList',
                            'h2',
                            'h3',
                            'italic',
                            'orderedList',
                            'redo',
                            'strike',
                            'underline',
                            'undo',
                        ])
                        ->columnSpan(['sm' => 1 , 'md' => '2']),
                    Textarea::make('participantes')
                        ->label('Participantes')
                        ->rows(5)
                        ->columnSpan(2),
                ])
            ->columns(2)
            ->columnSpan(['lg' => fn (?CompromissoPublico $record) => $record === null ? 3 : 2]);
    }

    public static function getRegisterForm(): Section
    {
        return Forms\Components\Section::make()
            ->schema([
                Forms\Components\Placeholder::make('created_at')
                    ->label('Criado em')
                    ->content(fn (CompromissoPublico $record): ?string => $record->created_at?->diffForHumans()),

                Forms\Components\Placeholder::make('updated_at')
                    ->label('Ùltima Modificação')
                    ->content(fn (CompromissoPublico $record): ?string => $record->updated_at?->diffForHumans()),
            ])
            ->columnSpan(['lg' => 1])
            ->hidden(fn (?CompromissoPublico $record) => $record === null);
    }
}
