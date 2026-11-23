<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Unguarded;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Unguarded]
class Request extends Model
{
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
