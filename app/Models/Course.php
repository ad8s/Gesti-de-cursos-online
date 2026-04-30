<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

#[Fillable(['category_id', 'description', 'ends_at', 'is_published', 'level', 'slug', 'starts_at', 'title', 'user_id'])]
class Course extends Model
{
    use HasFactory;

    protected function casts(): array
    {
        return [
            'ends_at' => 'datetime',
            'is_published' => 'boolean',
            'starts_at' => 'datetime',
        ];
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function students(): BelongsToMany
    {
        return $this->belongsToMany(User::class)->withPivot('enrolled_at')->withTimestamps();
    }
}
