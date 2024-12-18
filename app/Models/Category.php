<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;

    protected $fillable = ['name'];


    public function thought_categories(): HasMany
    {
        return $this->hasMany(Thought_Category::class);

    }

    public function thoughts(): HasMany
    {
        return $this->hasMany(Thought::class);

    }
}
