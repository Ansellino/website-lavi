<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'user_id', // If you are keeping user_id // The single text field for "tags"
        'price', // The single text field for "price"
        'image',
    ];

    // Add favorites relationship
    public function favoritedBy(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'favorites')->withTimestamps();
    }

    public function getFavoritesCountAttribute(): int
    {
        return $this->favoritedBy()->count();
    }

    // Check if post is favorited by user
    public function isFavoritedBy(?User $user): bool
    {
        if (!$user) {
            return false;
        }
        return $this->favoritedBy()->where('user_id', $user->id)->exists();
    }

    // Add favorite
    public function favorite(User $user): void
    {
        if (!$this->isFavoritedBy($user)) {
            $this->favoritedBy()->attach($user->id);
        }
    }

    // Remove favorite
    public function unfavorite(User $user): void
    {
        $this->favoritedBy()->detach($user->id);
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            $post->slug = Str::slug($post->title);
        });

        static::updating(function ($post) {
            $post->slug = Str::slug($post->title);
        });
    }
}
