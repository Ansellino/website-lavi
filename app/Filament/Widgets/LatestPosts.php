<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\PostResource;
use App\Models\Post;
use Filament\Tables;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestPosts extends BaseWidget
{
    protected static ?int $sort = 2; // Sort order for widgets (optional)
    protected int | string | array $columnSpan = 'full'; // Full width

    public function table(Table $table): Table
    {
        return $table
            ->query(PostResource::getEloquentQuery()->latest()->limit(5))
            ->columns([
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('user.name'),
                SpatieMediaLibraryImageColumn::make('image') // Use a descriptive name
                ->collection('post-images'), // *MUST* match your collection name
                Tables\Columns\TextColumn::make('created_at')->dateTime(),
                ])
            ->paginated(false);
    }
}
