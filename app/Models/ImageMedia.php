<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\User;
use App\Models\Book;
use App\Models\BookReview;
use App\Models\OrderReview;

class ImageMedia extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_path',
        'image_name',
        'image_type',
        'associated_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }

    public function bookReview(): BelongsTo
    {
        return $this->belongsTo(BookReview::class);
    }

    public function orderReview(): BelongsTo
    {
        return $this->belongsTo(OrderReview::class);
    }
}
