<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;
    protected static ?string $navigationIcon = 'heroicon-o-user';
    protected static ?string $navigationGroup = 'Configurações';

    protected static ?string $slug = 'usuario';

    protected static ?string $recordTitleAttribute = 'nome';

    protected static ?string $modelLabel = 'Usuário';

    protected static ?string $pluralModelLabel = 'Usuários';

    protected static ?int $navigationSort = 0;

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
                Tables\Columns\TextColumn::make('name')
                    ->label('Nome')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('username')
                    ->label('Username')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('roles.name')
                    ->label('Função')
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    private static function getMainForm() :Forms\Components\Section
    {
        return Forms\Components\Section::make()
            ->schema(
                [
                    TextInput::make('name')
                        ->label('Nome')
                        ->required()
                        ->maxLength(255),
                    TextInput::make('username')
                        ->label('Username')
                        ->required()
                        ->readOnlyOn('edit')
                        ->unique(ignoreRecord: true)
                        ->validationMessages([
                            'unique' => 'username já cadastrado.',
                        ])
                        ->maxLength(255),
                    TextInput::make('email')
                        ->label('Email')
                        ->unique(ignoreRecord: true)
                        ->email()
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('password')
                        ->label('Senha')
                        ->password()
                        ->required((fn (?User $record) => $record === null))
                        ->maxLength(255),
                    Forms\Components\Select::make('roles')
                        ->label('Função')
                        ->relationship('roles', 'name')
                        ->preload()
                        ->searchable()
                ])
            ->columns(2)
            ->columnSpan(['lg' => fn (?User $record) => $record === null ? 3 : 2]);
    }

    public static function getRegisterForm(): Section
    {
        return Forms\Components\Section::make()
            ->schema([
                Forms\Components\Placeholder::make('created_at')
                    ->label('Criado em')
                    ->content(fn (User $record): ?string => $record->created_at?->diffForHumans()),

                Forms\Components\Placeholder::make('updated_at')
                    ->label('Ùltima Modificação')
                    ->content(fn (User $record): ?string => $record->updated_at?->diffForHumans()),
            ])
            ->columnSpan(['lg' => 1])
            ->hidden(fn (?User $record) => $record === null);
    }
}
