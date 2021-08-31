<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Shelf extends Model
{
    use HasFactory;

    public function dictionary(): BelongsTo
    {
        return $this->belongsTo(Book::class, 'dictionary_book_id');
    }

    public function books(): HasMany
    {
        return $this->hasMany(Book::class);
    }
}
