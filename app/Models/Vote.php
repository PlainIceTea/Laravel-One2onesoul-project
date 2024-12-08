<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    /** @use HasFactory<\Database\Factories\VoteFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'thought_id', 
        'reply_id'
    ];

    public function thought()
    {
        return $this->belongsTo(Thought::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->belongsTo(Reply::class);
    }

    
}
