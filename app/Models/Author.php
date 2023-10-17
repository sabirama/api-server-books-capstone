<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Author extends Model
{
    use HasFactory;

     protected $fillable = [
        'pen_name',
        'first_name',
        'last_name',
        'details'
    ];

    public function books(): HasMany
    {
        return $this->hasMany(BookDetails::class);
    }
}
