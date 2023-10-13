<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BookReview extends Model
{
    use HasFactory;

     protected $fillable = [
        'body',
        'rate'
    ];

    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }
}
