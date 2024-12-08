<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Report extends Model
{
    /** @use HasFactory<\Database\Factories\ReportFactory> */
    use HasFactory;

    protected $fillable = [
        'content_type',
        'content_id',
        'user_id',
        'reason',
    ];

    public function reply()
    {
        return $this->belongsTo(Reply::class);
    }

    public function thought()
    {
        return $this->belongsTo(Thought::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
