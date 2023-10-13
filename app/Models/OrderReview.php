<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderReview extends Model
{
    use HasFactory;

     protected $fillable = [
        'user_id',
        'order_id',
        'body',
        'rate'
    ];

    public function user(): BelongsTo
    {
        return $this->hasOne(User::class);
    }

    public function order(): BelongsTo
    {
        return $this->hasOne(Order::class);
    }
}
