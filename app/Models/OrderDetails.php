<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class OrderDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_options_id',
        'address_id',
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function paymentOptions(): HasOne
    {
        return $this->hasOne(paymentOptions::class);
    }

    public function address(): HasOne
    {
        return $this->hasOne(Address::class);
    }
}
