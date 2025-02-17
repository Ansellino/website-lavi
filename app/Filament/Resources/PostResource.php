<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Models\Post;
use App\Models\User; // Import the User model
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form; // Import the Form class
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table; // Import the Table class
use Illuminate\Support\Str;

class PostResource extends Resource
{
    protected static?string $model = Post::class;

    protected static?string $navigationIcon = 'heroicon-o-document-text';

    public static function form(Form $form): Form // Use Form $form type hint
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->required()
                    ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),
                TextInput::make('slug')
                    ->disabled(),
                MarkdownEditor::make('content')
                    ->required(),
                Select::make('user_id')
                    ->label('Author')
                    ->relationship('author', 'name')
                    ->nullable(),
                TextInput::make('price')
                    ->numeric()
                    ->required(),
                FileUpload::make('image')
                    ->label('Images')
                    ->directory('Images')
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table // Use Table $table type hint
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->searchable(),
                TextColumn::make('slug'),
                TextColumn::make('author.name')
                    ->label('Author'),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(), // Added created_at
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable(), // Added updated_at
                TextColumn::make('price')
                    ->formatStateUsing(fn ($state) => 'Rp. '. number_format($state, 0, ',', '.')) // Format as IDR
                    ->sortable(),
            ])
            ->filters([
                //... any filters you need
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
            //... any relation managers you might have
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
