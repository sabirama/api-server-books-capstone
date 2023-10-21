<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OrderItem extends Model
{
    use HasFactory;
     protected $fillable = [
        'order_details_id',
        'book_id',
        'quantity',
        'price_total'
    ];

    public function orderDetail(): BelongsTo
    {
        return $this->belongsTo(OrderDetails::class);
    }

    public function books(): HasMany
    {
        return $this->hasMany(Book::class);
    }
}
