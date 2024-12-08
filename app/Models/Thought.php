<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Thought extends Model
{
    /** @use HasFactory<\Database\Factories\ThoughtFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'content',
        'is_anonymous'
    ];

    protected $attributes = [
        'is_anonymous' => true,
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function votes(): HasMany
    {
        return $this->hasMany(Vote::class);
    }

    public function replies(): HasMany
    {
        return $this->hasMany(Reply::class);

    }

    public function categories(): HasMany
    {
        return $this->hasMany(Category::class);

    }

    public function reports(): HasMany
    {
        return $this->hasMany(Report::class);

    }

    public function thought_categories(): HasMany
    {
        return $this->hasMany(Thought_Category::class);

    }
}

