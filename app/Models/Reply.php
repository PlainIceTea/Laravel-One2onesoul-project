<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class reply extends Model
{
    /** @use HasFactory<\Database\Factories\ReplyFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'thought_id', 
        'content', 
        'is_anonymous'
    ];


    public function reply()
    {
        return $this->belongsTo(Reply::class, 'reply_id');
    }

    public function votes(): HasMany
    {
        return $this->hasMany(Vote::class);

    }

    public function reports(): HasMany
    {
        return $this->hasMany(Report::class);

    }
}
