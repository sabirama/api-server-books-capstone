<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_options_id',
        'address',
        'price_total'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function orderItem(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function orderReview(): HasMany
    {
        return $this->hasMany(OrderReview::class);
    }

    public function address(): HasOne
    {
        return $this->hasOne(Address::class);
    }

    public function paymentOptions(): HasOne
    {
        return $this->hasOne(paymentOptions::class);
    }

}
