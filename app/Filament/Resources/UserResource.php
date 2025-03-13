<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\OtherModel;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;
    protected static ?string $recordTitleAttribute = 'name';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static function search(string $modelName, string $search): array
    {
        return $modelName::where('name', 'like', "%{$search}%")
            ->limit(3)
            ->get()
            ->mapWithKeys(fn ($model) => [
                "$modelName.$model->id" => $model->name,
            ])
            ->toArray();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->columns(1)
            ->schema([
                Forms\Components\ViewField::make('choices')
                    ->view('Choices'),
                Forms\Components\Select::make('Hybrid')
                    ->view('hybrid')
                    ->label('Hybrid')
                    ->searchable()
                    ->getOptionLabelUsing(function ($value): ?string {
                        [$modelName, $modelId] = explode('.', $value);
                        return $modelName::find($modelId)?->name;
                    })
                    ->getSearchResultsUsing(fn (string $search) => [
                        'user' => self::search(User::class, $search),
                        'other' => self::search(OtherModel::class, $search),
                    ]),
                Forms\Components\Select::make('Filament')
                    ->label('Filament')
                    ->searchable()

                    // ->options([
                    //     'user' => self::search(User::class, 'ba'),
                    //     'other' => self::search(OtherModel::class, 'ba'),
                    // ])

                    ->getOptionLabelUsing(function ($value): ?string {
                        [$modelName, $modelId] = explode('.', $value);
                        return $modelName::find($modelId)?->name;
                    })
                    ->getSearchResultsUsing(fn (string $search) => [
                        'user' => self::search(User::class, $search),
                        'other' => self::search(OtherModel::class, $search),
                    ])
            ]);
   }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
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
}
