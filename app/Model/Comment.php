<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    protected $fillable = [
        'post_id',
        'comment'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
}
