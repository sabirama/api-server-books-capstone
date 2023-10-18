<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illumintae\Database\Eloquent\Relations\HasOne;

class BookDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'body',
        'author_id'
    ];

    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }

    public function author(): HasOne
    {
        return $this->hasOne(Book::class);
    }

    public function genre(): HasMany
    {
        return $this->hasMany(Book::class);
    }
}
