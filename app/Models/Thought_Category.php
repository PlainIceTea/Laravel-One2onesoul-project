<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Thought_Category extends Model
{
    /** @use HasFactory<\Database\Factories\ThoughtCategoryFactory> */
    use HasFactory;

    // Tentukan factory yang digunakan
    protected static function newFactory()
    {
        return \Database\Factories\ThoughtCategoryFactory::new(); // Nama class factory baru
    }
    protected $fillable =[
        'thought_id',
        'category_id'
    ];

    public function categories(): HasMany
    {
        return $this->hasMany(Category::class);

    }

    public function thoughts(): HasMany
    {
        return $this->hasMany(Thought::class);

    }
}
