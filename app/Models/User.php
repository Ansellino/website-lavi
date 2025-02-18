<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail; // If you're using email verification
use Filament\Models\Contracts\FilamentUser; // Import
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles; // Import

class User extends Authenticatable implements FilamentUser // Implement
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles; // Use the trait

    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin', // Ensure 'is_admin' is fillable
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'is_admin' => 'boolean', // Cast to boolean
    ];

    public function favorites(): BelongsToMany
    {
        return $this->belongsToMany(Post::class, 'favorites')->withTimestamps();
    }
    public function canAccessPanel(Panel $panel): bool
    {
         return $this->hasRole('super_admin') || $this->is_admin;
    }

    // Optional: If you also want to give super admins access to *everything*
    // even without specific permissions, you can override the hasPermissionTo method:

    public function hasPermissionTo($permission, $guardName = null): bool
    {
        if ($this->hasRole('super_admin')) {
            return true; // Super admins bypass permission checks
        }
        return parent::hasPermissionTo($permission, $guardName);
    }
}
