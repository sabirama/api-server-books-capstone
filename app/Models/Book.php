<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Book extends Model
{
    use HasFactory;

     protected $fillable = [
        'title',
        'detail',
        'author',
        'genre',
        'price'
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }

    public function orderItem(): BelongsTo
    {
        return $this->belongsTo(OrderItem::class);
    }

    public function genres(): HasMany
    {
        return $this->hasMany(Genre::class);
    }

    public function bookReviews(): HasMany
    {
        return $this->hasMany(BookReview::class);
    }

}
