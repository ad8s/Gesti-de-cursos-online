<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'password', 'is_admin'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'is_admin' => 'boolean',
            'password' => 'hashed',
        ];
    }

    public function createdCategories(): HasMany
    {
        return $this->hasMany(Category::class);
    }

    public function createdCourses(): HasMany
    {
        return $this->hasMany(Course::class);
    }

    public function courses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class)->withPivot('enrolled_at')->withTimestamps();
    }

    public function isAdmin(): bool
    {
        return (bool) $this->is_admin;
    }

    public function isOwner(mixed $resource): bool
    {
        if ($this->isAdmin()) {
            return true;
        }

        if ($resource instanceof self) {
            return $this->is($resource);
        }

        $resourceUserId = data_get($resource, 'user_id') ?? data_get($resource, 'owner_id');

        return (int) $resourceUserId === $this->getKey();
    }
}
